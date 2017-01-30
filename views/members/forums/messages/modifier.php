<?php
$breadcrumb->display()?>
<div class="container" style="">
    <h1><?= $title;?></h1>
    <?php
    $titleBtn = "Modifier un message";
    ?>
    <form enctype="multipart/form-data"  role="form" method="post"
          action="<?= Visitor::getRootPage().'/members/forums/messages/modifier.php?id='.$post->getId();?>">
            <?php
            if($post->getTopic()->getCreator()->getId() == Visitor::getInstance()->getUser()->getId()) {
                if (isset($announce)) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-10">
                        <div class="form-group">
                            <select tabindex="1" class="selectpicker form-control input-lg" required="required"
                                    id="announceType" name="announceType">
                                <?php
                                $type = $announce->getType()->getId();
                                ?>
                                <option disabled selected>Type d'annonce</option>
                                <option value="1" <?= $type==1 ? "selected=selected" : ""?>>Remplacement</option>
                                <option value="2" <?= $type==2 ? "selected=selected" : ""?>>Praticien</option>
                                <option value="3" <?= $type==3 ? "selected=selected" : ""?>>Assitanat</option>
                                <option value="4" <?= $type==4 ? "selected=selected" : ""?>>Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-10">
                        <div class="form-group">
                            <input required="required" type="text" name="title" id="title"
                                   class="form-control input-lg" placeholder="Titre de l'annonce" tabindex="2"
                                   value="<?= $announce->getTitle(); ?>"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
                        <div class="form-group">
                            <input required="required" type="text" name="town" id="town"
                                   class="form-control input-lg" placeholder="Ville" tabindex="3"
                                   value="<?= $announce->getTown(); ?>"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <input required="required" type="text" name="postalCode" id="postalCode"
                                   class="form-control input-lg" placeholder="Code postal" tabindex="4"
                                   value="<?= $announce->getPostalCode(); ?>"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
                        <div class="form-group">
                            <div required="required" class='input-group date input-group-lg' id="date">
                                <input data-date-format="DD/MM/YYYY" tabindex="5" type='text' id='date'
                                       name='date' placeholder="Date de début" class="form-control input-lg"
                                       value="<?= $announce->getDate()->format("d/m/Y")?>"
                                />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 12px">
                        <div class="form-group">
                            <label><input tabindex="6" type="checkbox"
                                    <?php /*if($user->getHasSigned() && $editing) echo "checked=checked"; */ ?>
                                          name="signed" id="signed"> &nbsp;Dès que possible</label>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
                        <div class="form-group">
                            <input required="required" type="text" name="duration" id="duration"
                                   class="form-control input-lg" placeholder="Durée" tabindex="7"
                                   value="<?= $announce->getDuration(); ?>"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 12px">
                        <div class="form-group">
                            <label><input tabindex="8" type="checkbox"
                                    <?php /*if($user->getHasSigned() && $editing) echo "checked=checked"; */ ?>
                                          name="indeterminatedDuration" id="indeterminatedDuration"> &nbsp;Durée
                                indeterminée</label>
                        </div>
                    </div>
                    <div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;">
                    </div>
                    <?php
                } else {
                    echo '
            <div class="row" style="width: 80%; margin: auto;">
                <div class="form-group">
                    <input required="required" type="text" name="title" id="title"
                           class="form-control input-lg" placeholder="Titre" tabindex="3"
                           value="' . (isset($post) && $post->getTopic() != null ? $post->getTopic()->getTitle() : '') . '"
                    >
                </div>
            </div>
            <div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;">
                <div class="form-group">
            <input type="text" name="subtitle" id="subtitle"
                   class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="3"
                   value="' . (isset($post) && $post->getTopic() != null ? $post->getTopic()->getSubtitle() : '') . '"

            </div>';
                }
            }
        ?>
</div>

<?php
include(Visitor::getRootPath().'/views/members/forums/createPost.php');
?>
</form>
</div>