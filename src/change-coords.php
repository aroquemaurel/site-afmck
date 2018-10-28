<?php
use \database\DatabaseUser;
include('begin.php');

if(isset($_GET['key']) && isset($_GET['id']) && isset($_GET['lgt']) && isset($_GET['lat'])) {
    if(md5($_GET['id'].KEY_AJAX_PRATICIENS)) {
        $db = new DatabaseUser();
        $user = $db->getUserById($_GET['id']);
        $user->setLatitude($_GET['lat']);
        $user->setLongitude($_GET['lgt']);
        $user->commit();
    }
}
