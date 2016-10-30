<?php
require_once(Visitor::getInstance()->getRootPath().'/libs/PHPMailer/class.phpmailer.php');
require_once(Visitor::getInstance()->getRootPath().'/libs/PHPMailer/class.smtp.php');


class Mailer extends PHPMailer {
    public function __construct() {
        $this->IsSMTP();                                      // Set mailer to use SMTP
        $this->Host = 'ssl0.ovh.net';  // Specify main and backup SMTP servers
        $this->SMTPAuth = true;                               // Enable SMTP authentication
        $this->Username = 'maintenance@afmck.fr';                 // SMTP username
        $this->Password = 'mdt/support';                           // SMTP password
        //$this->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->Port = 5025;                                    // TCP port to connect to

        $this->From = 'maintenance@afmck.fr';

        $this->FromName = 'Association Française McKenzie'; // Display name

        $this->Subject = "[AFMcK] ";
    }

    public function send() {
        parent::send();
    }
}
