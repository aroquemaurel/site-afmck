<?php $breadcrumb->display()?>

<div class="container-fluid">
    <h1>Bienvenue sur le site de l'Association Française McKenzie</h1>
    <div id="news" class="hidden-xs hidden-md thumbnail with-caption news" style="margin-right: -10px;margin-top: -80px; width: 220px">
        <h2>Actualités</h2>
        <h3>Annonces de remplacement</h3>
        <p>Une <a href="<?php echo Visitor::getInstance()->getRootPage()."/members/travaux-association/annonces/ile-de-france.php";?>">nouvelle section</a> est arrivée, elle contiendra les annonces pour des recherches de remplacement !</p>
<h3>Newsletter Mckenzie International</h3>
<a href="http://afmck.fr/members/kiosque/newsletters-McKenzie.php">
<img width="100" src="http://afmck.fr/docs/members/kiosque/newsletters/mini/MDT%20World%20Press%20Newsletter_Vol4No1.jpg" /></a>
Vol.4 N°1 Anglais
<hr/>
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

    <?php
    echo '<div style="margin-bottom: -30px;">';
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/members/index.php'))->display();
    echo '</div>';
    foreach($news as $new) {
        echo '<div style="padding-right: 80px">';
        echo '<h2>'.$new->getTitle().'&nbsp;<small>'.$new->getSubtitle().'</small></h2>';
        echo '<p style="margin-top: -8px;margin-bottom:15px"><small>Posté le '.$new->getDate()->format('d / m / Y à H:i').' par '.$new->getAuthor()->getFirstName().' '.$new->getAuthor()->getLastname().'</small></p>';
        echo $new->getContent();
        echo '</div>';
    }
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/members/index.php'))->display();
    ?>
</div>
