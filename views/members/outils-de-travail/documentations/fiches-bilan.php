<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Outils de travail : Fiches bilan</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <ul  style="float:left">
    <?php
        $folder = Visitor::getInstance()->getRootPage().'/docs/members/fichesbilan';
        Image::miniLink($folder, 'Bilan_Evaluation Rachis Lombaire_AFMcK', '<b>Fiche Bilan</b> Evaluation rachis lombaire');
        Image::miniLink($folder, 'Bilan_Evaluation Rachis Dorsal_AFMcK', '<b>Fiche Bilan</b> Evaluation rachis Dorsal');
        Image::miniLink($folder, 'Bilan-Evaluation Membres Inferieurs_AFMcK', '<b>Fiche Bilan</b> Membres inférieurs');
        Image::miniLink($folder, 'Bilan_Evaluation Rachis Cervical_AFMcK', '<b>Fiche Bilan</b> Evaluation rachis cervical');
        Image::miniLink($folder, 'Formulaire de suivi McKenzie_AFMcK', 'Fiche de suivi');
?>
    </ul>
    <div class="thumbnail with-caption toc" id="toc"' style="margin-right: 100px; margin-top: -80px;">
        <img id="mini" alt="" style="text-align: center;margin:auto">
        <p id="description" style="font-size: 10pt"></p>
        </div>
    </div>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div><!-- fin de .docformation -->
</div><!-- Fin de .casclinic -->
<?php
$script = Image::miniLinkJs();