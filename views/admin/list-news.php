<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des newsletter</h1>
    <p><a href="<?php echo Visitor::getInstance()->getRootPage()."/admin/add-news.php";?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;AJouter une news</button></a><br/><br/>
    </p>
    <?= viewers\NewsViewer::getHtmlNewsList($news, $page, $nbPages)?>
    </div>
