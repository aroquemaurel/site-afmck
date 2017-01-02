
<div class="navbar yamm navbar-default navbar-fixed-top" style="height:65px;background-color: #273f64;">
    <div class="container">
        <div class="navbar-header" style="float:left;">
            <button type="button" data-toggle="collapse"
                    data-target="#navbar-collapse-1"
                    class="navbar-toggle" style="margin-top: 30px; margin-left: -30px;">
                <img src="<?=Visitor::getRootPage() ?>/style/img/mobile-btn.png" width="30px"/>
            </button>
            <a href="<?= Visitor::getInstance()->isConnected() ?
                Visitor::getRootPage().'/members/index.php' :
                Visitor::getRootPage();
            ?>"
            class="navbar-brand">
                <img id="afmckLogo" style="margin-top: -10px"src="<?= Visitor::getRootPage() ?>/style/img/logo.png"
                     height="50px" alt="AFMcK" /></a>
        </div>

        <div id="navbar-collapse-1" class="navbar-collapse collapse"
             style="margin-top: 20px; margin-left: 40px;">
