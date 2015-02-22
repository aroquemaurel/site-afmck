<?php
include('begin.php');

if(Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->getUser()->clearCookie();
    Visitor::getInstance()->removeUser();
    session_destroy();
    session_start();
    $_SESSION['lastMessage'] = Popup::deconnectionOk();
} else {
    $_SESSION['lastMessage'] = Popup::notConnected();
}
header('Location: ' . ($currentDir == 'members/' ? '../index.php' : 'index.php'));
