<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Ajouter une newsletter</h1>
    <div class="col-xs-14 col-sm-10 col-md-11 col-sm-offset-1 col-md-offset-2">
        <form role="form" method="post" action="<?php echo Visitor::getInstance()->getRootPage().'/admin/add-news.php';?>">
            <hr class="colorgraph">
            <div class="row">
                <div class="form-group">
                    <input required="required" type="text" name="title" id="title"
                           class="form-control input-lg" placeholder="Titre" tabindex="3"
                           value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                        >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input required="required" type="text" name="subtitle" id="subtitle"
                           class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="3"
                           value="<?php if(isset($news)) { echo $news->getSubtitle(); }?>"
                        >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <?php utils\Wysiwyg::display(isset($news) ? $news->getContent():""); ?>
                </div>
                </div>
            <hr class="colorgraph">
            <textarea style="visibility: hidden" id="hiddeninput" name="content"><?php if(isset($news)) { echo $news->getContent(); }?></textarea>
            <?php
            if(isset($news)) {
                echo '<input type="hidden" name="id" value="'.$news->getId().'"/>';
            }
            ?>
            <button id="submit" type="submit" style="margin: auto; width: 250px; "
                    class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>
                <?php echo (isset($news) ? "Modifier" : "Ajouter")." la news"?>
            </button>

        </form>
    </div>
</div>

<?php
$script = utils\Wysiwyg::getScriptSrc();
$script .= utils\Wysiwyg::getJsToolbar();
$script .= "
<script type=\"text/javascript\">
    $(function(){
        $('#submit').click(function () {
            var mysave = $('#editor').html();
            $('#hiddeninput').val(mysave);
        });
    });
</script>";
