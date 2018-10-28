<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 27/01/17
 * Time: 00:00
 */

namespace utils;


use models\notifications\Notification;
use models\notifications\NotificationType;
use models\User;
use Visitor;

class NotificationHelper
{
    public static $FORUM = 1;

    public static $ADMINISTRATION = 2;

    public static $NEWSLETTER = 3;

    public static $ARTICLES = 4;

    public static $ADHESIONS = 5;

    public static function getNotificationType(int $id) {
        $notifRepo = NotificationType::getRepo();
        return $notifRepo->find($id);
    }

    public static function getAllNotificationOfUser(User $user) {
        $notifRepo = Notification::getRepo();
        return $notifRepo->findBy(array("idUser" => $user->getId(), 'hasRead'=>false));
    }

}