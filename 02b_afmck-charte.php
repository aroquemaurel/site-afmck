<?php
include('begin.php');
use utils\Link;

$title = 'Charte de l\'association';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Charte de l\'association','#')));
include('views/includes/head.php');
include('views/02b_afmck-charte.php');
include('views/includes/foot.php');
?>
