<?php
include('../begin.php');

use utils\Link;
$title = 'Validation des incriptions';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Administration','#'), new Link('Validation des inscriptions', '#')));
$db = new DatabaseUser();
$users = $db->getUsersToValid();

include('../views/includes/head.php');
include('../views/admin/validRegister.php');
include('../views/includes/foot.php');
?>
