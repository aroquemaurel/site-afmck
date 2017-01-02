#!/usr/local/bin/php.ORIG.5_4
<?php
require_once('../begin.php');


/**
 * Script is executed by crontab of OVH every hours.
 *
 * It look on database if we have to send notification, if it's the case, we send the firsts NEWS_NB_MAILS mails
 */
//$topicsUser =
$topicuserRepo = $entityManager->getRepository('models\forum\TopicUser');
$topics = $topicuserRepo->findBy(array("askNotification" => true, "isNotified" => false, "isRead" => false), array());
$error = false;
foreach($topics as $topicuser) {
    $topic = $topicuser->getTopic();
    $user = $topicuser->getUser();
    $mailer = new Mailer();
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->Subject .= "Un nouveau message sur le sujet ".$topic->getTitle(); // TODO : subject title
    $mailer->Body = "Bonjour,<br/>Un utilisateur a répondu à un sujet que vous suivez.<br/>

            Pour aller sur le sujet concerné, cliquez <a href=\"http://afmck.fr/members/forums/sujets/voir.php?id=".$topic->getId()."\">ici</a><br/><br/>

            Si vous ne souhaitez plus recevoir de courriels concernant ce sujet, vous pouvez <a href=\"http://afmck.fr/members/forums/sujets/suivre.php?id=".$topic->getId()."&suivre=0\">arrêter de le suivre</a>";// TOTO text of message
    $mailer->CharSet = 'UTF-8';

    $mailer->addAddress($user->getMail(), $user->getFirstName()." ".$user->getLastName());

    if(!$mailer->send()) {
        echo $mailer->ErrorInfo;
        $error = true;
    } else {
        $topicuser->setNotified(true);
        $entityManager->persist($topicuser);
    }
}

$entityManager->flush();
if($error) {
    exit(-1);
} else {
    exit(0);
}
