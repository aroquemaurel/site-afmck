<?php
$breadcrumb->display();
?>
<div class="container-fluid">
    <h1>Les newsletters de l'Institut McKenzie International</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="thumbnail with-caption toc" id="toc" style="text-align: left;margin-right: 300px; margin-top: -00px;">
    <img id="mini" alt="" style="text-align: center;margin:auto">
    <p id="description" style="font-size: 10pt"></p>
</div>

<h2>Vol 5</h2>
<h3>Français</h3>
<?php
$folder = Visitor::getRootPage()."/docs/members/kiosque/newsletters";
Image::miniLink($folder, "MDT World Press Newsletter_Vol5No1",
    "MDT World Press Newsletter Vol.5 N°1 <small>Anglais</small>");
?>
<h2>Vol 4</h2>
<h3>Anglais</h3>
<ul>
<?php
Image::miniLink($folder, "MDT World Press Newsletter_Vol4No3",
    "MDT World Press Newsletter Vol.4 N°3 <small>Anglais</small>");
Image::miniLink($folder, "MDT World Press Newsletter_Vol4No1",
    "MDT World Press Newsletter Vol.4 N°1 <small>Anglais</small>");
?>
</ul>
<h3>Français</h3>
<ul>
<?php
$folder = Visitor::getRootPage()."/docs/members/kiosque/newsletters";
Image::miniLink($folder, "MDT World Press Newsletter Vol.4 N3 Francais",
    "MDT World Press Newsletter Vol.4 N°3 <small>Français</small>");
Image::miniLink($folder, "MDT Newsletter_Vol 4 No 2-fr_AFMcK",
    "MDT World Press Newsletter Vol.4 N°2 <small>Français</small>");
Image::miniLink($folder, "MDT Newsletter_Vol 4 No 1-fr_AFMcK",
    "MDT World Press Newsletter Vol.4 N°1 <small>Français</small>");
?>
</ul>
<h3>Annexes</h3>
<ul>
<li><a href="<?= Visitor::getRootPage().'/docs/members/kiosque/newsletters/STartBackScreeningTool.zip';?>">STart Back Screening Tool Vol.4 N°3 <small>Français</small></a>
</ul>
<h2>Vol 3</h2>
<h3>Anglais</h3>
    <ul>
        <?php
        $folder = Visitor::getRootPage()."/docs/members/kiosque/newsletters";

        Image::miniLink($folder, "MDT Newsletter_Vol 3 No 4-gb_AFMcK",
            "MDT World Press Newsletter Vol.3 N°4 <small>Anglais</small>");
        Image::miniLink($folder, "MDT Newsletter_Vol 3 No 3-gb_AFMcK",
            "MDT World Press Newsletter Vol.3 N°3 <small>Anglais</small>");
        Image::miniLink($folder, "MDT Newsletter_Vol 3 No 2-gb_AFMcK",
            "MDT World Press Newsletter Vol.3 N°2 <small>Anglais</small>");
        ?>
    </ul>
<h3>Français</h3>
<ul>
<?php
Image::miniLink($folder, "MDT Newsletter_Vol 3 No 4-fr_AFMcK",
    "MDT World Press Newsletter Vol.3 N°4 <small>Français</small>");

Image::miniLink($folder, "MDT Newsletter_Vol 3 No 3-fr_AFMcK",
    "MDT World Press Newsletter Vol.3 N°3 <small>Français</small>");
Image::miniLink($folder, "MDT Newsletter_Vol 3 No 2-fr_AFMcK",
    "MDT World Press Newsletter Vol.3 N°2 <small>Français</small>");
Image::miniLink($folder, "MDT Newsletter_Vol 3 No 1-fr_AFMcK",
    "MDT World Press Newsletter Vol.3 N°1 <small>Français</small>");
?>
</ul>
<h2>Vol 2</h2>
<h3>Anglais</h3>
<ul>
<?php
Image::miniLink($folder, "MDT Newsletter_Vol 2 No 3_AFMcK",
    "MDT World Press Newsletter Vol.2 N°3 <small>Anglais</small>");

Image::miniLink($folder, "MDT Newsletter_Vol 2 No 2_AFMcK",
    "MDT World Press Newsletter Vol.2 N°2 <small>Anglais</small>");
?>
</ul>
<h3>Français</h3>
<ul>
<?php
Image::miniLink($folder, "MDT Newsletter_Vol 2 No 4-fr_AFMcK",
    "MDT World Press Newsletter Vol.2 N°4 <small>Français</small>");
Image::miniLink($folder, "MDT Newsletter_Vol 2 No 3-fr_AFMcK",
    "MDT World Press Newsletter Vol.2 N°3 <small>Français</small>");
?>
</ul>

<h2>Vol 1</h2>
<h3>Anglais</h3>
<ul>
<?php
Image::miniLink($folder, "MDT Newsletter_Vol 1 No 2_AFMcK",
    "MDT World Press Newsletter Vol.1 N°2 <small>Anglais</small>");
?>
</ul>
<h3>Français</h3>
<ul>
<?php
Image::miniLink($folder, "MDT Newsletter_Vol 1 No 1-fr_AFMcK",
    "MDT World Press Newsletter Vol.1 N°1 <small>Français</small>");
?>
</ul>


</div>
<?php
$script = Image::miniLinkJs();
?>
