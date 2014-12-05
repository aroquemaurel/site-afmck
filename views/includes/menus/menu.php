<?php $prefix = (Visitor::getInstance()->getCurrentPath() == 'members' ? '..' : '.') ?>

<!-- Demo navbar -->
<div class="navbar yamm navbar-default navbar-fixed-top" style="height:110px;background-color: #273f64;">
    <div class="container">
        <div class="navbar-header" style="float:left">
            <button type="button" data-toggle="collapse"
                    data-target="#navbar-collapse-1"
                    class="navbar-toggle" style="margin-top: 30px">
                <img src="<?php echo Visitor::getInstance()->getRootPage() ?>/style/img/mobile-btn.png" width="30px"/></button>
            <a href="index.php" class="navbar-brand"><img style="margin-top: -10px"src="<?php echo Visitor::getInstance()->getRootPage() ?>/style/img/logo.png" height="100px"
                                                                                                        alt="AFMcK" /></a>
        </div>
        <div id="navbar-collapse-1" class="navbar-collapse collapse" style="margin-top: 60px; margin-left: 100px;">
