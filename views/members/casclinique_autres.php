<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Cas clinique: Autres cas</h1>
    <div id="toc" class="toc">
    </div><!--/.well -->
    <div class="thumbnail with-caption toc" id="toc"' style="margin-right: 100px; margin-top: -80px;">
        <img id="mini" alt="" style="text-align: center;margin:auto">
        <p id="description" style="font-size: 10pt"></p>
        </div>
    </div>

    <ul>
        <?php
        $folder = Visitor::getInstance()->getRootPage().'/docs/cascliniques/';
        Image::miniLink($folder, 'Mlle T - Derangement thoracique superieur_AFMcK',
            'Étude du cas clinique de Mlle T, dérangement thoracique supérieur <small>Par Frédéric STEIMER</small>');
        Image::miniLink($folder, 'Bilan de Melle T_AFMcK',
            'Étude du cas clinique de Mlle T(2/2) <small>Par Frédéric STEIMER</small>');
        Image::miniLink($folder, 'Etude de cas World Presse VOL1 N°2_AFMcK',
            'Étude de cas World Press Vol.1N°2');
        ?>
    </ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php
$script = Image::miniLinkJs();