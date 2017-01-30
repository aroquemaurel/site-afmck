<?php
$breadcrumb->display();
$folder = Visitor::getRootPage()."/docs/members/kiosque";
?>
<div class="container-fluid">
    <h1>Articles sur les membres inférieurs</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="thumbnail with-caption toc" id="toc" style="text-align: left;margin-right: 300px; margin-top: -00px;">
        <img id="mini" alt="" style="text-align: center;margin:auto">
        <p id="description" style="font-size: 10pt"></p>
    </div>

</div>




<?php
$script = Image::miniLinkJs();
?>
