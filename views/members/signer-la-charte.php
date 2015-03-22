<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Je souhaite signer la charte</h1>
    <div class="alert alert-info">
    <p>Vous souhaitez signer la charte ? Vous êtes au bon endroit !</p>
    </div>

    <p>Afin de pouvoir être affiché sur la liste des praticiens, et de signer la charte, vous devez être adhérent à l'association, et d'un niveau D ou supérieur.</p>

    <p><a href="<?php echo Visitor::getInstance()->getRootPage()."/members/je-signe.php";?>">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i>
                &nbsp;Je signe la charte</button></a></p>


</div>
