<?php
require_once('classes/Visitor.php');

session_start();
if(Visitor::getInstance()->isConnected()) {
    session_destroy();
    session_start();
    $_SESSION['lastMessage'] = Popup::deconnectionOk();
} else {
    $_SESSION['lastMessage'] = Popup::notConnected();
}
header('Location: ' . Visitor::getInstance()->getLastPage());
