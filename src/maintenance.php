<?php
require_once('classes/Visitor.php');
require_once('config/server.php');

if(!MAINTENANCE) {
    header('Location: '.Visitor::getRootPage().'/index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site innaccessible pour maintenance</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">
    <link href="style/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="style/css/afmck.css" rel="stylesheet">
    <link href="style/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="style/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="style/css/tooltip-viewport.css" rel="stylesheet">
    <link href="style/css/multi-upload.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid" style="text-align: center">
    <h1>Le site afmck.Fr est actuellement en maintenance</h1>
    <p><img src="style/img/logo.jpg" /></p>
    <p>Le site web est actuellement indisponible afin d'effectuer une maintenance.<br/> Merci de revenir un peu plus tard, nous essayons de faire nos actions le plus rapidement possible</p>
    <p>Merci de votre patience</p>
</div>

</body>
</html>