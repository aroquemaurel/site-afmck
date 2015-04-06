if(typeof speechi_frontend == "undefined") var speechi_frontend = new Object();

speechi_frontend.SWFObject = function(path, swf, id, c, w, h, pos) {
	var flashVerions = "8.0";
	this.isInternetExplorer = navigator.appName.indexOf("Microsoft") != -1;
	this.intervalID = 0;
	this.loaded2 = false;
	this.w0 = w;
	this.h0 = h;
	this.id = id;
	this.main_swf_id = "mainSWF" + this.id;
	this.extra_swf_id = "extraSWF" + this.id;
	speechi_frontend[this.id] = this;
	this.path = String(path);
	if (this.path.length > 0 && this.path.charAt(this.path.length-1) != "/") this.path += "/";
	if (typeof swf == "undefined" || swf == "") swf = "loader.swf";
	// create SWFObject
	this.so1 = new SWFObject(this.path + swf, this.main_swf_id, "100%", "100%", flashVerions, c, true);
	this.so1.addVariable("frontend_swf_id", this.id);
	this.so1.addVariable("frontend_path", this.path);
	if (typeof pos != "undefined" && pos != "") this.so1.addVariable("timecode", pos);
	this.so1.addParam("wmode", "opaque");
	this.so1.addParam("allowScriptAccess", "always");
	this.so2 = new SWFObject(this.path + "empty.swf", this.extra_swf_id, "100%", "100%", flashVerions);
	this.so2.addParam("wmode", this.isInternetExplorer ? "opaque" : "transparent");
}
speechi_frontend.SWFObject.prototype = {
	// SWFObject wrappers
	addVariable: function(name, value) {
		this.so1.addVariable(name, value);
	},
	write: function() {
		document.getElementById("mainContent" + this.id).style.height="100%";
		document.getElementById("extraContent" + this.id).style.height="100%";
		this.so1.write("mainContent" + this.id);
		this.so2.write("extraContent" + this.id);
		// store DIV and SWF document elements
		this.swf1 = this.isInternetExplorer ? window[this.main_swf_id] : document[this.main_swf_id];
		this.swf2 = this.isInternetExplorer ? window[this.extra_swf_id] : document[this.extra_swf_id];
		this.div1 = document.getElementById("mainDIV" + this.id);
		this.div2 = document.getElementById("extraDIV" + this.id);
	},
	// speechi methods
	init: function(w, h) {
		this.w1 = w;
		this.h1 = h;
	},
	loadMovie: function(url, x, y, w, h, c, framerate) {
		this.swf2.LoadMovie(0, url);
		this.x2 = x;
		this.y2 = y;
		this.w2 = w;
		this.h2 = h;
		this.swf2.bgcolor = this.div2.style.backgroundColor = c;
		this.loaded2 = true;
		this.resize();
		this.div2.style.visibility = "visible";
		delete this.movieFrames;
		if (!isNaN(framerate) && (framerate>0)) {
			this.intervalID = window.setInterval("speechi_frontend["+this.id+"].intervalHandler()", 1000/framerate/1.5);
		}
	},
	moveMovie: function(x, y, w, h) {
		this.x2 = x;
		this.y2 = y;
		this.w2 = w;
		this.h2 = h;
		this.resize();
	},
	unloadMovie: function(name, value) {
		if (this.intervalID) {
			window.clearInterval(this.intervalID);
			this.intervalID = 0;
		}
		this.loaded2 = false;
		this.div2.style.visibility = "hidden";
		this.swf2.LoadMovie(0, this.path + "empty.swf");
	},
	resize: function(name, value) {
		if (this.loaded2) {
			var cw = (typeof this.w0 == "undefined" ? document.body.clientWidth : this.w0);
			var ch = (typeof this.h0 == "undefined" ? document.body.clientHeight : this.h0);
			var scaleX = cw / this.w1;
			var scaleY = ch / this.h1;
			var x, y, scale;
			if (scaleX > scaleY) {
				scale = scaleY;
				x = (cw / scale - this.w1) / 2 + this.x2;
				y = this.y2;
			} else {
				scale = scaleX;
				x = this.x2; 
				y = (ch / scale - this.h1) / 2 + this.y2;
			}
			this.div2.style.left = (x * scale / cw * 100) + "%";
			this.div2.style.top = (y * scale / ch * 100) + "%";
			this.div2.style.width = (this.w2 * scale / cw * 100) + "%";
			this.div2.style.height = (this.h2 * scale / ch * 100) + "%";
		}
	},
	_getMovieFrames: function() {
		// check for current frame existance. Otherwise TGetProperty fails in IE. Return total and current frame   
		if (this.swf2.TCurrentFrame("/")>=0) 
			return (this.totalFrames = this.swf2.TGetProperty("/", 5)) + "," + (this.currentFrame = this.swf2.TGetProperty("/", 4));
	},
	getMovieFrames: function() {
		if (typeof this.movieFrames != "undefined") return this.movieFrames;
		return this._getMovieFrames();
	},
	intervalHandler: function() {
		this.movieFrames = this._getMovieFrames();
		if ((this.totalFrames > 1 && this.currentFrame == this.totalFrames) || this.totalFrames == 1) {
			window.clearInterval(this.intervalID);
			this.intervalID = 0;
		}
	}
}

function speechi_init(args) {
	var arg = args.split(",");
	var id = arg[0];
	var w = Number(arg[1]);
	var h = Number(arg[2]);
	speechi_frontend[id].init(w, h);
	return true;
}

function speechi_loadMovie(args) {
	var arg = args.split(",");
	var id = arg[0];
	var url = arg[1];
	var x = Number(arg[2]);
	var y = Number(arg[3]);
	var w = Number(arg[4]);
	var h = Number(arg[5]);
	var c = arg[6];
	var framerate = Number(arg[7]);
	speechi_frontend[id].loadMovie(url, x, y, w, h, c, framerate);
	return true;
}
function speechi_moveMovie(args) {
	var arg = args.split(",");
	var id = arg[0];
	var x = Number(arg[1]);
	var y = Number(arg[2]);
	var w = Number(arg[3]);
	var h = Number(arg[4]);
	speechi_frontend[id].moveMovie(x, y, w, h);
	return true;
}
function speechi_unloadMovie(args) {
	var id = args;
	speechi_frontend[id].unloadMovie();
	return true;
}
function speechi_getMovieFrames(args) {
	var id = args;
	return speechi_frontend[id].getMovieFrames();
}
function speechi_documentURL() {
	if(navigator.plugins && navigator.mimeTypes.length) return document.URL;
	else return "";
}


var speechi_SWFObject = speechi_frontend.SWFObject;
