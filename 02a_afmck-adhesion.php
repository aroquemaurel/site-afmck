<?php
include('begin.php');
use utils\Link;

$title = 'Adhésions';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Adhésions','#')));
include('views/includes/head.php');
include('views/02a_afmck-adhesion.php');
include('views/includes/foot.php');
?>
