<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AFMcK PRATICIENS MDT</title>
<link href="pgsvisit.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="afmck-icone.ico" />
<style type="text/css"></style>
</head>


<body>
<!-- TAG CRAWLPROTECT -->
<?php require_once("/home/afmck/www/crawlprotect/include/cppf.php"); ?>

<!-- Code Js Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Fin de Code Js Facebook -->


<div class="container">
<div class="header">
<!-- fin de .header --></div>

<div class="menuht">
  <?php include("ongletvisit.php"); ?></div><!-- fin de .menuht -->
  
<div class="titrpg"><h1>PRATICIENS MDT</h1></div>


  
  <div class="introcarte">
    <p>En cliquant sur le département de votre choix,<br />vous accéderez à une liste de praticiens adhérents à notre association<br />et ayant signé une <a href="02b_afmck-charte.php" target="_blank">charte de bonne pratique</a>.</p>
<h3>Selon leur niveau ils sont en cours de formation (Niveau C ou D),<br />formés (Certifiés) ou Instructeurs diplômés (DIP).</h3>
    </div><!-- fin de .introcarte -->
<div class="carte">
    <?php
    $mapChemin = 'france_map_3.0/'; // Chemin du dossier FranceMap relatif au ficher dans lequel vous faites l'include
            
    $urlExec = $_SERVER['PHP_SELF'];
    include($mapChemin.'map.php');
    ?>
    </div><!-- fin de .carte -->  
   




<div class="footer">
         <?php include("footervisit.php"); ?>
<!-- Fin de .footer --></div>

  <!-- Fin de .container --></div>
  
</body>
</html>


