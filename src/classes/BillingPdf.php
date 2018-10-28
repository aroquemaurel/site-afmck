<?php
use models\User;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 22/02/15
 * Time: 23:12
 */

class BillingPdf extends PdfFile {
    private $user;
    public function __construct(User $user, $tresor=false) {
        $this->user = $user;
        $this->tresor = $tresor;
    }
    public function toHtml() {
        $content = "    <p style=\"\">
        <img src=\"" . Visitor::getRootPath() . "/style/img/logo.jpg\"
        style=\"position:absolute;margin-left:0px;margin-top:15px;width:100px\"/>
        <div style=\"position:absolute;margin-top:50px;margin-left: 150px;font-weight: bold; font-size: 12pt;\"class=\"titlePdf\">FACTURE SUITE À UNE ADHÉSION</div>
        </p>";

        $content .= "<div><b>ASSOCIATION FRANÇAISE McKENZIE</b><br/>
            Le Verlaine<br/>
            2 rue Charles Piot<br/>
            38 320 EYBENS<br/>
            www.afmck.fr<br/><br/>
            contact@afmck.fr<br/>
            secretariant@afmck.fr<br/>
            tresorerie@afmck.fr<br/>
            </div>";
        $content .= "<div style=\"text-align:right\"><b>".$this->user->getFirstName()." ".$this->user->getLastName()."</b><br/>".
        $this->user->getAddress()."<br/>"
            .$this->user->getComplementAddress().
            "<br/>".$this->user->getCp()." ".$this->user->getTown()."
            </div>";
        $content .= "<div style=\"margin-top: 150px\">Le ".date("d/m/Y")."<br/><br/></div>";
        $content .= "<div><b>Facture</b>
                Référence ".date("Y-m-d")."-".$this->user->getAdeliNumber()."</div><br/><br/>";
        $content .= "Désignation<br/><hr/>";
        $content .= "<table><tr><td style=\"width: 150px\">".date("d/m/Y")."</td><td style=\"width: 150px\">1 cotisation ".date("Y")."</td><td style=\"width: 150px\">".$this->user->getValuePaid()." EUR</td></tr></table><hr/>";
        $content .="<b>TOTAL: ".$this->user->getValuePaid()." EUR</b><br/><br/>";
        $content .= "Réglé par ".($this->user->getPayment()->toString());
        return $content;
    }

    public function generatePdf($str='') {
        parent::generatePdf(Visitor::getRootPath()."/docs/members/billing/".date("Y")."_".$this->user->getAdeliNumber().'.pdf');
    }

}
