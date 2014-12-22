<?php
include ('begin.php');
use utils\Link;

$title = 'Formation';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Formation','#')));
include('views/includes/head.php');
include('views/01c_meth-formation.php');
include('views/includes/foot.php');
?>