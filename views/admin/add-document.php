<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Ajouter un document</h1>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" required="" placeholder="Exemple: Comptabilité 2014-2015">
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
                <input type="text" name="tags" class="form-control" required="" id="tags" placeholder="Exemple: Comptabilité, Trésorerie">
                <p style="font-size: 10pt" class="help-block">Vous pouvez mettre plusieurs mots clés en les séparant par des virgules. Ceux-ci permettront ensuite de retrouver plus facilement ce document</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Document</label>
            <div class="col-sm-10">
                <input required="" type="file" style="padding-bottom: 50px;padding-top: 15px"class="form-control" id="inputEmail3" placeholder="Email">
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