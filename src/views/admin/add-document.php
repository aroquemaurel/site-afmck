<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Ajouter un document</h1>
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=Visitor::getRootPage()."/admin/add-document.php"?>">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" required="" placeholder="Exemple: Comptabilité 2014-2015">
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-sm-2 control-label">Catégorie</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select class="selectpicker form-control input-md" required="required" id="categoryId" name="categoryId">
                            <option disabled selected>Catégorie</option>
                            <?php
                            foreach ($categories as $cat) {
                                echo '<option value="'.$cat->getId().'">'.$cat->getName().'</option>';
                            }
                            echo '<option value="-1">Autre</option>';

                            ?>
                        </select>
                    </div>


                     <input type="text" name="category" class="form-control" id="category"/> 
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea id="description" name="description" required="" placeholder="Description plus longue du document" style="font-size: 10.5pt; width: 100%"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="tags" class="col-sm-2 control-label">Mots-clés</label>
            <div class="col-sm-10">
                <input type="text" name="tags" class="form-control" required="" id="tags" placeholder="Exemple: Compte-Rendu, Trésorerie">
                <p style="font-size: 10pt" class="help-block">Vous pouvez mettre plusieurs mots clés en les séparant par des virgules. Ceux-ci permettront ensuite de retrouver plus facilement ce document</p>
            </div>
        </div>
        <div class="form-group">
            <label for="file" class="col-sm-2 control-label">Document</label>
            <div class="col-sm-10">
                <input  id="file" name="file" required="" type="file" style="padding-bottom: 50px;padding-top: 15px" class="form-control">
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Ajouter le document</button>
            </div>
        </div>
    </form>
</div>

<?php
$script = "        <script type=\"text/javascript\">
        $('#category').hide();
            $('#categoryId').change(function(){
    if( $(this).val() == '-1'){
        $('#category').show();
    } else {
        $('#category').hide();
    }
});
</script>";
