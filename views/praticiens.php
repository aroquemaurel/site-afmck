    <?php 
use \database\DatabaseUser;
$breadcrumb->display()?>
    <div class="container-fluid">
        <div id="toc" class="toc"></div>
        <h1>Praticiens MDT</h1>

        <div class="introcarte">
        <p>
            Sur cette carte, vous pouvez avoir accès à une liste de praticiens adhérents à notre association et ayant
            signé une <a href="<?= Visitor::getRootPage();?>/AFMcK/charte.php" target="_blank">charte de bonne pratique</a>.
            <div class="bs-callout bs-callout-warning">
                <p>Seuls les adhérents à l'association ayant une formation de niveau D ou supérieur sont affichés sur cette carte</p>
            </div>
<?php
$nbPraticiens = 0;
$nbDLevel = 0;
$nbCertif = 0;
$nbDiplo = 0;
foreach($users as $addresses) {
    $nbPraticiens += count($addresses);
    foreach($addresses as $addr) {
        switch($addr->getLevelFormationString()) {
            case "D":
                ++$nbDLevel;
                break;
            case "Certifié":
                ++$nbCertif;
                break;
            case "Diplômé":
                ++$nbDiplo;
                break;
        }
    }
}
?>
<p>Il y a actuellement <?= count($users);?> cabinets, de <?= $nbPraticiens;?> praticiens, sur la carte.</p>
        <ul>
            <li><img src="<?= Visitor::getRootPage().'/style/img/markerclustered/pinLevelD.png'?>"/>&nbsp;&nbsp;<?=$nbDLevel?> niveaux D</li>
            <li><img src="<?= Visitor::getRootPage().'/style/img/markerclustered/pinCertif.png'?>"/>&nbsp;&nbsp;<?=$nbCertif?> certifiés</li>
            <li><img src="<?= Visitor::getRootPage().'/style/img/markerclustered/pinDiplome.png'?>"/>&nbsp;&nbsp;<?=$nbDiplo?> diplomés</li>
        </ul>

    </div><!-- fin de .introcarte -->
        <input id="pac-input" class="controls" type="text" placeholder="Rechercher un lieu">
        <div style="width: 700px; height: 500px" id="map-canvas"></div>

        <p>&nbsp;<br/>&nbsp;</p>

    </div>

<?php
$arrayAddress = '[';
$arrayUser = '[';
foreach($users as $addresses) {
    foreach ($addresses as $user) {
        if ($user->getAddress() != "") {
            $arrayAddress .= "\"" . str_replace(',', '', $user->getAddress() . " " . $user->getCp() . " " . $user->getTown()) . '",';
            $arrayUser .= "'<b>" . $user->getFirstName() . "</b>',";
        }
    }
}
$arrayUser = rtrim($arrayUser, ",");
$arrayUser .= ']';
$arrayAddress = rtrim($arrayAddress, ",");
$arrayAddress .= ']';
$script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3&libraries=places&key=AIzaSyCqSdPbxboWbBCwD2qWcj-nfpMxn14jqUk"></script>';
$script .='<script type="text/javascript" src="'.Visitor::getRootPage().'/style/js/markerclusterer.js"></script>';
$script .= '<script>MarkerClusterer.prototype.MARKER_CLUSTER_IMAGE_PATH_ = \''.Visitor::getRootPage().'/style/img/markerclustered/m'.'\'</script>';
    $script .= "<script>
    var map;
    var elevator;
    var myStyles =[
    {
        featureType: \"poi\",
        elementType: \"labels\",
        stylers: [
              { visibility: \"off\" }
        ]
    }
    ];
    var myOptions = {
        zoom: 5,
        styles: myStyles,
        center: new google.maps.LatLng(46.5865209, 1.2814561),
        	          mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($('#map-canvas')[0], myOptions);

    var addresses = ".$arrayAddress.";
    var users = ".$arrayUser.";
    var infoWindow = new google.maps.InfoWindow;
    var markers = new Array();
      // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));
google.maps.event.addListener(searchBox, 'places_changed', function() {
            //map.setZoom();
    var places = searchBox.getPlaces();
    map.setCenter(places[0].geometry.location);
    map.setZoom(12);
});
    var markerCluster;\n\t";

   // for (var x = 0; x < addresses.length; x++) {
    $script .= "            
    var pinColorD = 'fc7468';
    var pinColorCert = 'fefe57';
    var pinColorDipl = '34b946';
            var pinImage4 = new google.maps.MarkerImage(\"https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|\" + pinColorD,
                new google.maps.Size(21, 34),
                new google.maps.Point(0,0),
                new google.maps.Point(10, 34));
            var pinImage5 = new google.maps.MarkerImage(\"https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|\" + pinColorCert,
                new google.maps.Size(21, 34),
                new google.maps.Point(0,0),
                new google.maps.Point(10, 34));
            var pinImage6 = new google.maps.MarkerImage(\"https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|\" + pinColorDipl,
                new google.maps.Size(21, 34),
                new google.maps.Point(0,0),
                new google.maps.Point(10, 34));

            var pinShadow = new google.maps.MarkerImage(\"https://chart.apis.google.com/chart?chst=d_map_pin_shadow\",
                new google.maps.Size(40, 37),
                new google.maps.Point(0, 0),
                new google.maps.Point(12, 35));
";
   foreach($users as $addresses) {
       $someUser = $addresses[0];
       if ($someUser->getAddress() != "") {
           if($someUser->getLatitude() == "" || $someUser->getLongitude() == "" ) {
               $script .= "$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=" . addslashes($someUser->getAddress()." ".$someUser->getCp()." ".$someUser->getTown()) . "&sensor=false', null, function (data) {
               if(data.results[0] != null) {
                var p = data.results[0].geometry.location;\n";
               $key = md5($someUser->getId().KEY_AJAX_PRATICIENS);
               $script .= '$.ajax({url: "'.Visitor::getRootPage().'/change-coords.php?key='.$key.'&id='.$someUser->getId().'&lgt="+p.lng+"&lat="+p.lat,
                                     context: document.body}).done(function(){})}});';
               $db = new DatabaseUser();
               $u = $db->getUserById($someUser->getId());
               $someUser->setLongitude($u->getLongitude());
               $someUser->setLatitude($u->getLatitude());
           } else {
               $script .= "
            var latlng = new google.maps.LatLng(" . number_format($someUser->getLatitude(), 15, '.', '') . ", " . number_format($someUser->getLongitude(), 15, '.', '') . ");
            thereisAjax = false;
            addMarker(new google.maps.Marker({
                position : latlng,
				map : map,
                icon: pinImage".$someUser->getLevelFormation().",
                shadow: pinShadow,
				draggable: false,
				content :'";

               foreach ($addresses as $user) {
                   $script .= "<p><b>" . addslashes($user->getFirstName()) . " ".addslashes($user->getLastName())."</b><br/>".addslashes($user->getAddress()." <br/>".$user->getCp()." ".$user->getTown()).
                   "<br/>".$user->getPhonePro().""./*$user->getMail()*/""."<br/><br/>Niveau ".$user->getlevelFormationString()."</p>";
               }
               $script .= "'
               }));";
           }
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

        markerCluster = new MarkerClusterer(map, markers);


</script>";
    ?>
