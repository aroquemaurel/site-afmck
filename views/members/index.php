<?php $breadcrumb->display()?>

<div class="container-fluid">
    <h1>Bienvenue sur le site de l'Association Française McKenzie</h1>
    <div id="news" class="hidden-xs hidden-md thumbnail with-caption news" style="margin-right: -10px;margin-top: -80px; width: 220px">
        <h2>Actualités</h2>
<h3>Lille 2015</h3>
<h3><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/journees/lille.php">Les interventions de Lille sont en lignes&nbsp;!</a></h3>
<hr/>
<h3>Communication Interne</h3>
<a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/divers/com-interne.php">Assemblée Générale 2015</a>
<hr/>
<h3>Nouvelle traduction !</h3>
<a href="http://afmck.fr/docs/members/kiosque/traduction/mini/KHAN_2009_Mecanotherapie.jpg">
<img width="100" src="http://afmck.fr/docs/members/kiosque/traduction/mini/KHAN_2009_Mecanotherapie.jpg" /></a>
Mécanothérapie. <small>Khan, Scott</small>
<hr/>
<a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/kiosque/fr/OTERO 2014 - Lombalgie prévalence des syndromes McKenzie - Kine la revue n 145.pdf"><img src="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/kiosque/fr/mini/OTERO 2014 - Lombalgie prévalence des syndromes McKenzie - Kine la revue n 145.jpg" width="100" /></a>
Lombalgie prévalence des syndromes McKenzie – Jacky OTERO<hr/>
<a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/kiosque/newsletters/MDT Newsletter_Vol 3 No 4-gb_AFMcK.pdf">
<img src="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/kiosque/newsletters/mini/MDT Newsletter_Vol 3 No 4-gb_AFMcK.jpg" width="100"/>
</a>
MDT WORLD PRESS Newsletter Vol 3 N°4
<hr/>
            <h3>Le logiciel Bilan MDT évolue : V1.6</h3>
            <p>Bilan Lombaire, Bilan Cervical, Bilan membres, Fiches de suivis, synthèses
            Editions en PDF des bilans
            et des fiches de suivis.
            </p>
        <h3>MDT World Press</h3>
        <p>Newsletter Vol3.N°2</p>
        <h3>Rapport d'étude</h3>
        <p>Cervicalgies,
            association entre centralisation et préférence directionnelle
            Traduction AFMcK</p>
        <h3>Article</h3>
        <p>Recovery of Motor Deficit
            Accompanying Sciatica
            (en anglais)</p>
    </div><!--/.well -->
<div style="padding-right: 80px;">
    <?php
        if(Visitor::getInstance()->getUser()->mustSignedChart()) {
            echo '<div class="alert alert-warning" role="alert">';
            echo "Vous êtes actuellement d'un niveau D ou supérieur et vous n'avez pas encore signé la charte, qui vous permettrai de figurer sur la carte des praticiens.<br/>
            Si vous souhaitez signer la charte, vous pouvez vous rendre sur cette <a href=\"".Visitor::getInstance()->getRootPage()."/members/signer-la-charte.php\">page</a>
 </div>";
        }
    ?>

<div class="alert alert-info">
Bienvenue sur le nouveau site de l'Association Française McKenzie !!<br/>
Ce site tout neuf vous permettra d'avoir prochainement de nouvelles fonctionnalités.<br/><br/>
Celui-ci étant tout jeune, il se peut que vous tombiez sur des problèmes, des bugs ou des incompréhensions…<br/> Si tel est le cas, merci d'envoyer un courriel à <a href="mailto:maintenance@afmck.fr">maintenance@afmck.fr</a>, votre aide nous est précieuse ! </div>

    <h2>Le MDT 2.0 est en marche !!!</h2>
    <h3>Congrès JFK et AFMcK 2015</h3>
    <p>
    JFK = Plus de 1200 participants !! 3 jours de congrès !! 175 intervenants de toutes nationalités et des interventions sur le MDT qui ont fait salle comble !
    </p>
    <p>Et pour nous ?? 110 participants !! 1,5 jours de communication avec des stars du MDT (Audrey Long, Stephen May, Hans Van Helvoirt) et des experts d'autres domaines (Blaise Dubois, Jean-François Esculier...) !! 14 conférences données à guichets fermés au nom de l'AFMcK…</p>

    <p>Waow ! Des chiffres qui font mal à la tête (presque autant que le gala du samedi soir pour certains...)<br/>
    Grâce à vous ce fut un super moment pour la profession, pour l'association et pour le MDT. On le sait maintenant : tous les regards sont tournés vers le MDT pour l'avenir alors à nous de jouer...
    Ce congrès a été un réel succès et tout le bureau de l'Afmck tient à vous remercier pour votre participation et votre soutien.<br/>
    Nous vous donnons d'ores et déjà rendez vous pour les prochaines échéances : le congrès de l'AFMcK 2016 à Montpellier et les JFK 2017 à Paris !!!</p>

    <p>Pour un congrès 2016 encore meilleur, n'oubliez pas de remplir et de nous faire parvenir le questionnaire de satisfaction  fourni dans votre livret de congrès (ou même un simple mail).</p>

    <h3>Assemblée Générale et Nouveau Bureau</h3>
    <p>Fin de mandat, obligations personnelles, envies diverses : L'AG a été l'occasion de renouveler le CA et le bureau : en effet si certains nous quittent (merci à eux pour le boulot fait jusque là), d'autres intègrent l'équipe (Bravo à eux) et d'autres restent à bord mais à des postes différents : pour y voir plus clair voilà la composition du nouveau bureau, voté à l'unanimité par le CA
        </p>

    <div class="bs-callout bs-callout-info">
    <table>
        <tr>
            <td>Flavio Bonnet (Paris 75)</td>
            <td>Président</td>
        </tr>
        <tr>
            <td>Frederic Fayolle (Aubignan 84)</td>
            <td>Trésorier adjoint</td>
        </tr>
        <tr>
            <td>Anne-Marie Gastellu-Etchegorry (Montauban 82)</td>
            <td>Trésorier</td>
        </tr>
        <tr>
            <td>Jacky Otero (Eybens 38)</td>
            <td>Vice-Président</td>
        </tr>
        <tr>
            <td>Wilfried Serres (Montpellier 34)</td>
            <td>Secrétaire adjoint</td>
        </tr>
        <tr>
            <td>Jonathan Vizzini (Nates 44)</td>
            <td>Secrétaire</td>
        </tr>
    </table>
    </div>
    <p>Les nouveaux membres du CA sont : Adeline Braguier (Lyon 69), Sylvain Peterlongo (Paris 75) et Leif Steene (Montreuil 93), et nous continuerons à profiter des avis et conseils avisés de Pierre Dhien (Grenoble 38) qui a du quitter le bureau pour des raisons administratives mais dont le point de vue est toujours apprécié.<br/>
    Vous retrouvez en PJ, le compte-rendu de l'AG</p>

    <h3>Référents Régionaux</h3>
    <p>Pour que les actions réalisées vous ressemblent le plus possible quoi de mieux que de les mener par vous-même ?<br/>
    Déjà entamé l'année dernière ce projet mérite d'être accéléré : l'objectif est d'essayer de mettre en place un référent régional, départemental ou local qui pourrait être le catalyseur de toutes vos initiatives et le relais idéal avec le bureau national…<br/>
    Certains ont déjà commencé : Carine Barazer à Brest, Romain-Brice Lomer à Rennes, , Thomas Regnier à Paris, Pierre Dhien à Grenoble, Wilfried Serres à Montpellier…</p>
    <p>D'autres veulent s'y mettre et vont avoir besoin de soutien : Victor Sawaya en Lorraine, Adeline Braguier à Lyon… <br/>
    L'association et les projets doivent rester les vôtres donc n'hésitez pas à manifester votre bonne volonté et nous nous ferons un plaisir de vous mettre en relation avec les personnes intéressées...<br/>
    Sachez que vous ne partez pas seuls et que le bureau et les autres référents régionaux sont tous prêts à partager et mettre en commun leurs idées et leurs expériences passées pour vous faciliter la tâche (organismes à contacter, diaporamas de présentation …)</p>

    <h3>Résultats « Evolution des symptômes et signes d'épaule suite à une prise en charge du rachis cervical en McKenzie/MDT » (Guillaume Neuville) en ligne !</h3>

    <p>Certains d'entre vous ont participé à cette étude, d'autres auraient bien aimé mais n'ont pas eu l'occasion, d'autres encore étaient intéressés mais ne se sentaient peut être pas assez prêts ou disponible....quoi qu'il en soit Guillaume a réussi à mener cette étude jusqu'à son terme et les résultats sont plutôt....intéressants
    (jugez vous même : <a href="http://www.afmck.fr/members/travaux-association/journees/lille">http://www.afmck.fr/members/travaux-association/journees/lille</a>)<br/>
    En suivant ce lien vous trouverez la présentation audio synchronisée avec le diaporama de Guillaume à Lille. Encore bravo et merci à lui pour cette belle aventure, on espère qu'elle sera la première d'une longue série !!</p>

    <h3>Bulletin d'adhésion</h3>
    <p>Qui dit nouvelle année dit renouvellement d'adhésion...vous trouverez également en PJ le formulaire de ré-adhésion, avec une grande nouveauté cette année :</p>

    <h4>Inscription en ligne</h4>
    <p>La possibilité de s'inscrire et d'adhérer directement en ligne sur</p>
    <div class="bs-callout bs-callout-info">
        <a href="http://www.afmck.fr/inscription.php">http://www.afmck.fr/inscription.php</a>
    </div>
    <p>A compter du 30 mars, l'accès au site sera individualisé avec un code d'accès personnel qui nécessite de vous inscrire directement sur le site avant cette date (en haut à droite). Votre identifiant sera votre numéro ADELI et vous choisissez votre mot de passe ! Une fois votre règlement reçu, votre inscription sera validée par nos trésoriers et vous pourrez naviguer en toute liberté.</p>

    <p>
    En cas de problème sur le site, un Email à maintenance@afmck.fr
    </p>

    <h3>Rappel des mails de contact</h3>
    <p>Question d'ordre général (activation du logiciel bilan, changement de coordonnées, de niveau MDT, organisation d'action locale)</p>
    <div class="bs-callout bs-callout-info">
        <a href="mailto:secretariat@afmck.fr">secretariat@afmck.fr</a>  ou <a href="mailto:contact@afmck.fr">contact@afmck.fr</a>
        </div>

    <p>Question d'ordre financier</p>
        <div class="bs-callout bs-callout-info">
            <a href="mailto:tresor@afmck.fr">tresor@afmck.fr</a>
        </div>
    <p>Question d'ordre technique sur le site ou le logiciel</p>
        <div class="bs-callout bs-callout-info">
            <a href="mailto:maintenance@afmck.fr">maintenance@afmck.fr</a>
        </div>

    <h3>Forum</h3>
    <p>N’oubliez cet outil d’échange entre praticien, qui permet à tous de progresser.</p>

    <div class="bs-callout bs-callout-info">
    <a href="http://afmck.forumactif.org/">http://afmck.forumactif.org/</a>
    </div>

    Le bureau de l'Afmck

</div>
</div>
