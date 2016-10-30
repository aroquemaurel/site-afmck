<?php
$breadcrumb->display()?>
<div class="container" style="">
    <h1><?php echo $title;?></h1>
    <form enctype="multipart/form-data"  role="form" method="post"
          action="<?php echo Visitor::getRootPage().'/members/forums/messages/masquer.php?id='.$post->getId();?>&masquer=1">
        <div class="row" style="width: 80%; margin: auto;">
            <div class="form-group">
                <input required="required" type="text" name="msg" id="msg"
                       class="form-control input-lg" placeholder="Motif" tabindex="3"
                       value=""
                />
            </div>
        </div>

        <div class="row" style="width: 80%; margin: auto;margin-top: 80px;">
        <div class="form-group">
            <button id="submit" type="submit" style="margin: auto; margin-top: -50px; width: 250px; "
                class="btn btn-primary btn-block btn-lg">
            <i class="glyphicon glyphicon-eye-close"></i>&nbsp;Masquer le message
            </button>
        </div>
        </div>
    </form>
    <div class="forum-post">
        <?php
        $user = Visitor::getInstance()->getUser();
        echo '<div class="author">
<div class="thumbnail" style="width: 110px; margin: auto;text-align: center">
                <img width="100px" src="'.$user->getAvatar().'"/></div>
                <p id="description" style="font-size: 10pt">'.
            $user->getFirstName().'<br/>'.$user->getLastName().
            '</p></div>';
        ?>
        <div class="message">
            <?php
           echo $post->getContent()
            ?>
        </div>
    </div>
</div>

<?php
?>
</form>
</div>