<?php
$breadcrumb->display();
?>
<div class="container" style="">

    <form enctype="multipart/form-data"  role="form" method="post"
          action="<?= Visitor::getRootPage().'/members/forums/sujets/nouveau.php?forum='.$forum->getId();?>">
    <?php
    if($forum->getName() == FORUM_NAME_ANNOUNCES) {
        echo '<h1>Créer une petite annonce</h1>';
        $titleBtn = "Ajouter l'annonce";
        echo \viewers\AnnounceViewer::getCreateAnnouncementForm();
        include(Visitor::getRootPath().'/views/members/forums/createPost.php');

    } else {
            //echo '<h1>'.$title.'</h1>';
            ?>
            <div class="row" style="width: 80%; margin: auto;">
                <div class="form-group">
                    <input required="required" type="text" name="title" id="title"
                           class="form-control input-lg" placeholder="Titre" tabindex="9"
                           value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                    >
                </div>
            </div>
            <div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;">
                <div class="form-group">
                    <input type="text" name="subtitle" id="subtitle"
                           class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="10"
                           value="<?php if(isset($news)) { echo $news->getSubtitle(); }?>"
                    >
                </div>
            </div>

            <?php
            $titleBtn = "Créer le sujet";
            include(Visitor::getRootPath().'/views/members/forums/createPost.php');
        }
    ?>
    </form>
</div>
<?php
$script .= '<script src="' . Visitor::getRootPage() . '/style/js/moment.js"></script>';
$script .= '<script src="' . Visitor::getRootPage() . '/style/js/bootstrap-datetimepicker.js"></script>';
$script .= "
<script type=\"text/javascript\">
            $(function () {
                $('#formationDate').datetimepicker({
                					pickTime: false,
                					viewMode: 'days',
                					minViewMode: 'days'
                });
            });
            $('#signed').click(function () {
                if ($(this).prop('checked')) {
                    $('#myModal').collapse('show');
                }
            });
             $('#closeBtn').click(function() {
                 $('#myModal').collapse('hide');
                 $('#signed').attr('checked', false);
             });
             $('#acceptBtn').click(function() {
                 $('#myModal').collapse('hide');
             });
</script>";

?>