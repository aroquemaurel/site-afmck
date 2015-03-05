    <?php $breadcrumb->display()?>
    <div class="container-fluid">
        <div id="toc" class="toc"></div>
        <h1>Praticiens MDT</h1>

        <div class="introcarte">
        <p>En cliquant sur le département de votre choix,<br />vous accéderez à une liste de praticiens adhérents à notre association<br />et ayant signé une <a href="<?php echo Visitor::getInstance()->getRootPage();?>/AFMcK/charte.php" target="_blank">charte de bonne pratique</a>.</p>
            <div class="bs-callout bs-callout-warning">
                <p>Selon leur niveau ils sont en cours de formation (Niveau C ou D), formés (Certifiés) ou Instructeurs diplômés (DIP).</p>
            </div>
    </div><!-- fin de .introcarte -->
        <div style="width: 700px; height: 500px" id="map-canvas"></div>

        <p>&nbsp;<br/>&nbsp;</p>

    </div>

<?php
$arrayAddress = '[';
$arrayUser = '[';
foreach($users as $user) {
    if ($user->getAddress() != "") {
        $arrayAddress .= "\"".str_replace(',', '', $user->getAddress()." ".$user->getCp()." ".$user->getTown()) . '",';
        $arrayUser .= "'<b>".$user->getFirstName()."</b>',";
    }
}
$arrayUser = rtrim($arrayUser, ",");
$arrayUser .= ']';
$arrayAddress = rtrim($arrayAddress, ",");
$arrayAddress .= ']';
    $script = '   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>';
$script .='<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js"></script>';
    $script .= "<script>
    var map;
    var elevator;
    var myOptions = {
        zoom: 4,
        center: new google.maps.LatLng(46.5865209, 1.2814561),
        	          mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($('#map-canvas')[0], myOptions);

    var addresses = ".$arrayAddress.";
    var users = ".$arrayUser.";
    var infoWindow = new google.maps.InfoWindow;
    var markers = new Array();
    var markerCluster;
    var thereisAjax = false;";

   // for (var x = 0; x < addresses.length; x++) {
   foreach($users as $user) {
       if ($user->getAddress() != "") {

           $script .= "thereisAjax = true;$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=" . addslashes($user->getAddress()." ".$user->getCp()." ".$user->getTown()) . "&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location;
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            thereisAjax = false;
            addMarker(new google.maps.Marker({
                position : latlng,
				map : map,
				draggable: false,
				content : '<b>".$user->getFirstName()."</b>'
			}));
        });";
       }
   }

       $script .= "
		function addMarker(marker){
			google.maps.event.addListener(marker, 'click', function(){
				var latLng = marker.getPosition();
			    infoWindow.setContent(marker.content);
			    infoWindow.open(map, marker);
			});
			markers.push(marker);
		}

        setTimeout(function (){
            markerCluster = new MarkerClusterer(map, markers);
        }, 500); // How long do you want the delay to be (in milliseconds)?


</script>";
    ?>