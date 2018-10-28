<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Outils de travail : Fiches d'exercices</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="thumbnail with-caption toc" id="toc"' style="margin-right: 300px; margin-top: 00px;">
    <img id="mini" alt="" style="text-align: center;margin:auto">
    <p id="description" style="font-size: 10pt"></p>
</div>
</div>
<?php $folder = Visitor::getRootPage().'/docs/members/fichesexercices'; ?>
<div class="bs-callout bs-callout-warning">
    <p>Vous avez uniquement accès aux fiches d'exercices disponible pour votre niveau de formation.
    </p>
    <p>Vous avez actuellement le <b>niveau <?= Visitor::getInstance()->getUser()->getLevelFormationString();?></b></p>
</div>


    <div style="height: 50px"></div>

</div>
</div>
<?php
$script = Image::miniLinkJs();
?>
