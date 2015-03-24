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

        </form>
    </div>
</div>