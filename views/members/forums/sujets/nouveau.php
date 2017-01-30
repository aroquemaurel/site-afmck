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
        ?>
        <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-10">
            <div class="form-group">
                <select tabindex="1" class="selectpicker form-control input-lg" required="required" id="announceType" name="announceType">
                    <option disabled selected>Type d'annonce</option>
                    <option value="1">Remplacement</option>
                    <option value="2">Praticien</option>
                    <option value="3">Assitanat</option>
                    <option value="4">Autre</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-10">
            <div class="form-group">
                <input required="required" type="text" name="title" id="title"
                       class="form-control input-lg" placeholder="Titre de l'annonce" tabindex="2"
                       value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                >
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
            <div class="form-group">
                <input required="required" type="text" name="town" id="town"
                       class="form-control input-lg" placeholder="Ville" tabindex="3"
                       value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                >
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">
                <input required="required" type="text" name="postalCode" id="postalCode"
                       class="form-control input-lg" placeholder="Code postal" tabindex="4"
                       value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                >
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
            <div class="form-group">
                <div required="required" class='input-group date input-group-lg' id="date">
                    <input data-date-format="DD/MM/YYYY" tabindex="5" type='text'  id='date'
                    name='date' placeholder="Date de début" class="form-control input-lg"
                           value=""
                    />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 12px">
            <div class="form-group">
                 <label><input tabindex="6" type="checkbox"
                 <?php /*if($user->getHasSigned() && $editing) echo "checked=checked"; */?>
                 name="signed" id="signed"> &nbsp;Dès que possible</label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
            <div class="form-group">
                <input required="required" type="text" name="duration" id="duration"
                       class="form-control input-lg" placeholder="Durée" tabindex="7"
                       value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                >
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 12px">
            <div class="form-group">
                <label><input tabindex="8" type="checkbox"
                        <?php /*if($user->getHasSigned() && $editing) echo "checked=checked"; */?>
                              name="indeterminatedDuration" id="indeterminatedDuration"> &nbsp;Durée indeterminée</label>
            </div>
        </div>
        <div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;">
        </div>
        <?php
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