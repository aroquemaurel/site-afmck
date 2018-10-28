<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Changer d'avatar</h1>

    <div class="thumbnail" style="width: 150px; margin: auto;text-align: center">
    <img width="100px"; src="<?= Visitor::getInstance()->getUser()->getAvatar();?>"/>
        <p id="description">Avatar actuel</p>
    </div>
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file" class="col-sm-2 control-label">Nouvel avatar</label>
            <div class="col-sm-10">
                <input  id="file" name="file" required="" type="file" style="padding-bottom: 50px;padding-top: 15px" class="form-control">
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button style="margin-top: 10px; "type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Changer d'avatar</button>
            </div>
        </div>
    </form>
</div>