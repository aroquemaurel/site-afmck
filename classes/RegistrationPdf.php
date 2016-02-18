<?php
class RegistrationPdf extends PdfFile {
    private $user;
    private $tresor;
    public function __construct(User $user, $tresor=false) {
        $this->user = $user;
        $this->tresor = $tresor;
    }
    public function toHtml() {
        $content = "    <p style=\"\">
        <img src=\"" . Visitor::getInstance()->getRootPath() . "/style/img/logo.jpg\"
        style=\"position:absolute;margin-left:0px;margin-top:15px;width:100px\"/>
        <div style=\"position:absolute;margin-top:50px;margin-left: 150px;font-weight: bold; font-size: 12pt;\"class=\"titlePdf\">FORMULAIRE D'INSCRIPTION À L'AFMCK</div>
        </p>";
        if(!$this->tresor) {
            $content .= "<p style=\"margin-top: -20px\">Sous l’impulsion de kinésithérapeutes certifiés McKenzie, l’Association Française McKenzie (AFMcK) a vu le jour à Paris le 06 Novembre 2010.  </p>
            Cette association a pour but:
            <ul style=\"list-style-type:none\">
            <li>— De faciliter les échanges et la pratique MDT : fiches d'exercices patients, logiciel de bilans,
                fiches de synthèse pour médecins et sécurité sociale, articles, journées de rencontres et d’études,
                nscription pour les adhérents détenant le niveau D sur le net...</li>
            <li>— De promouvoir la méthode McKenzie tant auprès du grand public que des professionnels de santé</li>
            <li>— De favoriser la recherche : par exemple mise en place d’études dans lesquelles les adhérents peuvent
            participer s'ils le souhaitent.</li>
            <li>— D'entamer des discussions avec les organismes nationaux (ordre, syndicats, CNAM, mutuelles) pour faire reconnaître
                et prendre en charge cette méthode.</li>
            </ul>
                <p style=\"\"> En étudiant, puis en pratiquant la méthode McKenzie, bien moins connue chez nous que dans les pays anglo-saxons,
            vous avez orienté votre travail dans une direction particulière et novatrice.
            </p>    <p style=\"\">
        Il est donc naturel que nous vous proposions de rejoindre notre association qui ne pourra que s'enrichir de
        l'addition de nos différentes expériences et sensibilités.
        </p>    <p style=\"\">
        A bientôt !
        </p>    <p style=\"\">
        P.S.: pour nous joindre = adresse mail: contact@afmck.fr ; site internet: www.afmck.fr<br/>
        En cas de changement de coordonnées et/ou de niveau de formation: secretariat@afmck.fr
        </p>    <p style=\"font-size: 6pt; text-align: left;\">
        Les informations recueillies sont nécessaires pour votre adhésion. Elles font l’objet d’un traitement
        informatique et sont destinées au secrétariat de l’association AFMcK.<br/>
        En application des articles 39 et suivants de la loi du 6 Janvier 1978 modifiée, vous bénéficiez d’un droit d’accès
         et de rectification s aux informations qui vous concernent.<br/>
         Si vous souhaitez exercer ce droit et obtenir communication des informations vous concernant, veuillez vous adresser à
         : tresorerie@afmck.fr
        </p>
        <p>Afin de régler votre adhésion, merci d'envoyer votre chèque, ainsi que cette fiche d'inscription à l'adresse suviante : <br/>
         Adeline BRAGUIER<br/>
        32, cours Albert Thomas<br/>
        69008 LYON</p>
        <div style=\"height:2px;border-bottom:1px solid black;\"></div>
        ";
        }
        $content .= $this->user->toHtml(true);
        return $content;
    }

    public function generatePdf($str='') {
        parent::generatePdf(Visitor::getInstance()->getRootPath()."/docs/members/registration/".($this->tresor ? "tresor/":"")
        .date('Y')."_".$this->user->getAdeliNumber().'.pdf');
    }


}

