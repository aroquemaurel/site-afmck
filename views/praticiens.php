    <?php 
use \database\DatabaseUser;
$breadcrumb->display()?>
    <div class="container-fluid">
        <div id="toc" class="toc"></div>
        <h1>Praticiens MDT</h1>

        <div class="introcarte">
        <p>
            Sur cette carte, vous pouvez avoir accès à une liste de praticiens adhérents à notre association et ayant
            signé une <a href="<?php echo Visitor::getInstance()->getRootPage();?>/AFMcK/charte.php" target="_blank">charte de bonne pratique</a>.
            <div class="bs-callout bs-callout-warning">
                <p>Seuls les adhérents à l'association ayant une formation de niveau D ou supérieur sont affichés sur cette carte</p>
            </div>
<?php
$nbPraticiens = 0;
foreach($users as $addresses) {
$nbPraticiens += count($addresses);
}
?>
<p>Il y a actuellement <?php echo count($users);?> cabinets, de <?php echo $nbPraticiens;?> praticiens, sur la carte.</p>
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
    $script = '   <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&libraries=places&sensor=false"></script>';
//$script .='<script type="text/javascript" src="'.Visitor::getRootPage().'/style/js/markerclusterer.js"></script>';
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
    var markerCluster;";

   // for (var x = 0; x < addresses.length; x++) {

   foreach($users as $addresses) {
       $someUser = $addresses[0];
       if ($someUser->getAddress() != "") {
           if($someUser->getLatitude() == "" || $someUser->getLongitude() == "" ) {
               $script .= "$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=" . addslashes($someUser->getAddress()." ".$someUser->getCp()." ".$someUser->getTown()) . "&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location;";
               $key = md5($someUser->getId().' Vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres. Des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée... Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face je dirais, le miroir qui vous aide à avancer. Alors ça n’est pas mon cas, comme je disais là, puisque moi au contraire ');
               $script .= '$.ajax({url: "'.Visitor::getInstance()->getRootPage().'/change-coords.php?key='.$key.'&id='.$someUser->getId().'&lgt="+p.lng+"&lat="+p.lat,
                                     context: document.body}).done(function(){})});';
               $db = new DatabaseUser();
               $u = $db->getUserById($someUser->getId());
               $someUser->setLongitude($u->getLongitude());
               $someUser->setLatitude($u->getLatitude());
           } else {
               $script .= "
            var latlng = new google.maps.LatLng(" . $someUser->getLatitude() . ", " . $someUser->getLongitude() . ");
            thereisAjax = false;
            addMarker(new google.maps.Marker({
                position : latlng,
				map : map,
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
