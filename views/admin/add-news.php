<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Ajouter une newsletter</h1>
    <div class="col-xs-14 col-sm-10 col-md-11 col-sm-offset-1 col-md-offset-2">
        <form role="form" method="post">
            <hr class="colorgraph">
            <div class="row">
                <div class="form-group">
                    <input required="required" type="text" name="title" id="title"
                           class="form-control input-lg" placeholder="Titre" tabindex="3"
                           value="<?php echo "";?>"
                        >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input required="required" type="text" name="subtitle" id="subtitle"
                           class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="3"
                           value="<?php echo "";?>"
                        >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <?php utils\Wysiwyg::display(); ?>
                </div>
                </div>
            <hr class="colorgraph">
            <textarea style="visibility: hidden" id="hiddeninput" name="content"></textarea>
            <button id="submit" type="submit" style="margin: auto; width: 250px; "
                    class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>
                <?php echo "Ajouter la news"?>
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