<?php
declare(strict_types = 1);
$breadcrumb->display()?>
<div class="container-fluid">
    <h1>Gestion des mots clés</h1>

    <form role="form" method="post">
        <input type="hidden" name="articles" />
    <table style="width: 100%" class="table table-hover forum-list">
        <tr>
            <th>Titre de l'article</th>
            <th>Chemin</th>
            <th>Mots clefs</th>
        </tr>
    <?php
    foreach($articles as $article) {
        echo '<tr>';
        echo '<td style="width: 250px;">'.$article->getTitle().'</td>';
        echo '<td style="font-size: 8pt; width: 300px;">'.$article->getPath().'</td>';
        echo '<td>';
        $nameArticle = 'article_'.$article->getId();
        echo '<div class="form-group">
                    <input type="text" name="'.$nameArticle.'" id="'.$nameArticle.'"
                           class="form-control input-mini"
                           value ="'.$article->getStringkeywords().'"
                               >
                </div>';

        echo '</td>';
        echo '</tr>';
    }
    ?>
    </table>
        <button id="submit" type="submit" style="margin: auto; width: 250px; "
                class="btn btn-primary btn-block btn-lg">
            <i class="glyphicon glyphicon-ok-sign"></i>
            Modifier les mots clés
        </button>

    </form>
<!-- TODO view -->
</div>

