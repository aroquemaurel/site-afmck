<?php
include('begin.php');
use utils\Link;

$title = 'Qui sommes nous ?';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Qui sommes nous ?','#')));
include('views/includes/head.php');
include('views/02b_afmck-quisomnous.php');
include('views/includes/foot.php');
?>
