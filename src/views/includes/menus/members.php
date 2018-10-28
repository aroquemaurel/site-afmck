<?php include('menu.php') ?>
<ul class="nav navbar-nav">
    <!-- Classic list -->
    <li class="dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Travaux de l'association<b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu">
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/le-top-des-archives.php'?>">Le top des archives</a></li>
            <!--<li><a href="<?=Visitor::getRootPage().'/members/travaux-association/lannee-en-cours.php'?>">L'année en cours</a></li>-->
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/les-etudes-de-lassociation.php'?>">Les études de l'association</a></li>
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/les-fiches-bilan-et-exercices.php'?>">Les fiches bilan et d'exercices</a></li>
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/la-communication-sur-le-MDT.php'?>">La communication sur le MDT</a></li>
        </ul>
    </li>

    <li class="dropdown long-menu"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Outils de travail <b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu">
            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/logiciel-bilan-mdt.php">Le logiciel de bilan MDT</a></li>
            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/partenariats/materiel.php">Le materiel</a></li>
            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/partenariats/monsitekine.php">Votre site professionnel : monsitekine.com</a></li>
        </ul>
    </li>

    <li class="dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Kiosque
            <b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu">
        <li><a href="<?=Visitor::getRootPage();?>/members/kiosque/articles-scientifiques.php">Articles scientifiques</a></li>
        <li><a href="<?=Visitor::getRootPage();?>/members/kiosque/generalites-mdt.php">Généralités sur le MDT</a></li>
        <li><a href="<?=Visitor::getRootPage();?>/members/kiosque/newsletters-McKenzie.php">MDT World press</a></li>
        <li><a href="http://www.mckenzieinstitute.org/clinicians/research-and-resources/mdt-world-press/" target="_blank"><i span class="glyphicon glyphicon-globe"></i> Institut McKenzie</a></li>
        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" href="<?=Visitor::getRootPage();?>/members/certification.php">Certification</a></li>

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Annonces
                    <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu"> 
                    <li><a tabindex="-1" href="<?= Visitor::getRootPage()?>/members/forums/voir-forum.php?id=47"> Petites annonces</a></li>
                    <li><a href="<?= Visitor::getRootPage()?>/members/forums/sujets/nouveau.php?forum=47">Ajouter une petite annonce</a></li>
                    <li><a tabindex="-1" href="<?= Visitor::getRootPage()?>/members/forums/voir-categorie.php?id=9"> Actions locales</a></li>
                </ul>
            </li>

            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Association<b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/docs/members/charte des praticiens adherents AFMcK.pdf"> Charte AFMcK</a></li>
                    <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/members/divers/com-interne.php"> Communication Interne</a></li>
                </ul>
            </li>
    <li class="dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Forums
            <b class="caret"></b></a>        <ul class="dropdown-menu">
            <li><a href="<?= Visitor::getRootPage().'/members/forums/'?>"><b>Tous les forums</b></a></li>
            <?php
            $forumRepo = Visitor::getEntityManager()->getRepository('models\forum\Category');
            echo \viewers\forums\CategoryViewer::getLiCategoryList($forumRepo->findBy(array(), array('position' => 'ASC')))
            ?>
        </ul>
    </li>

    <?php
            include("connectionMenu.php");
            ?>
</ul>
    </div>
    </div>
</div>
