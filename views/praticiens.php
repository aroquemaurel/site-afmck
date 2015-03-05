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
        <div style="width: 600px; height: 500px" id="map-canvas"></div>

        <p>&nbsp;<br/>&nbsp;</p>

    </div>

<?php
$arrayUsers = '[';
foreach($users as $user) {
    if ($user->getAddress() != "") {
        $arrayUsers .= "\"".str_replace(',', '', $user->getAddress()." ".$user->getCp()." ".$user->getTown()) . '",';
    }
}
$arrayUsers = rtrim($arrayUsers, ",");
$arrayUsers .= ']';
echo $arrayUsers;
    $script = '   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>';
    $script .= "<script>
 $(document).ready(function () {
    var map;
    var elevator;
    var myOptions = {
        zoom: 1,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: 'terrain'
    };
    map = new google.maps.Map($('#map-canvas')[0], myOptions);

    var addresses = ".$arrayUsers.";

    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
                position: latlng,
                map: map
            });

        });
    }

});
  </script>;";
    ?>