#!/usr/local/bin/php
<?php
require_once('../config.php');
require_once('../autoload.php');

/**
 * Script is executed by crontab of OVH every hours.
 *
 * It look on database if we have to send emails, if it's the case, we send the firsts NEWS_NB_MAILS mails
 */
$db = new DatabaseNews();
foreach($db->getFirstMailsToSend(NEWS_NB_MAILS) as $news) {
    $mailer = new Mailer();
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->Subject .= "".$news->getNews()->getTitle();

    $mailer->Body = $news->getNews()->getContent();
    //$mailer->addAddress($news->getUser()->getMail(), $news->getUser()->getFirstName()." ".$news->getUser()->getLastName());
    $mailer->addAddress("trash.dev.zero+afmck@gmail.com", "Test ".$news->getUser()->getFirstName()." ".$news->getUser()->getLastName());
    foreach($news->getNews()->getAttachments() as $attch) {
        $mailer->addAttachment(Visitor::getInstance()->getRootPath().'/docs/members/news/'.$attch->getPath());
    }
    if(!$mailer->send()) {
        echo $mailer->ErrorInfo;
    } else {
        $db->updateMailIsSend($news->getUser()->getId(), $news->getNews()->getId());
    }


    //echo $news->getUser()->getMail()."coucou\n";
}

exit(0);