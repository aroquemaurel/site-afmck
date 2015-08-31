</div>
<footer>
    <div class="container-fluid">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p><b>Nous contacter</b><br/>
                AFMcK<br/>
                2 rue Charles PIOT<br/>
                38320 EYBENS<br/>
                contact@afmck.fr
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p><b>Inscriptions</b><br/>
                Anne-Marie GASTELLU-ETCHEGORRY<br/>
                27 av. du 10ème Dragon<br/>
                82000 Montauban<br/>
                tresorerie@afmck.fr
            </p>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-4">
            <p>
                … Et retrouvez nous aussi sur Facebook !
            </p>
            <!-- ~~ Bouton Facebook ~~ -->
            <div style="text-align: center;"class="fb-like fb_iframe_widget" data-href="http://www.afmck.fr" data-width="90" data-layout="button_count" data-action="like"
                 data-show-faces="true" data-share="true" fb-xfbml-state="rendered"
                 fb-iframe-plugin-query="action=like&amp;app_id=&amp;href=http%3A%2F%2Fwww.afmck.fr%2F&amp;layout=button_count&amp;locale=fr_FR&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;width=90"><span
                    style="vertical-align: bottom; width: 151px; height: 20px;"><iframe name="f3811aca8" width="90px" height="1000px" frameborder="0"
                                                                                        allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin"
                                                                                        src="http://www.facebook.com/plugins/like.php?action=like&amp;app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F7r8gQb8MIqE.js%3Fversion%3D41%23cb%3Df378fdf0e%26domain%3Dafmck.fr%26origin%3Dhttp%253A%252F%252Fafmck.fr%252Ff38a42555%26relation%3Dparent.parent&amp;href=http%3A%2F%2Fwww.afmck.fr%2F&amp;layout=button_count&amp;locale=fr_FR&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;width=90"
                                                                                        style="border: none; visibility: visible; width: 151px; height: 20px;" class=""></iframe></span></div>
        </div>
        <p><a href="#" class="back-to-top">Retour haut de page</a></p>
    </div>
</footer>
<!-- /container -->
<!-- Bootstrap core JavaScript-->
<!--<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<script src="<?php echo Visitor::getInstance()->getRootPage() ?>/style/js/jquery.js"></script>
<script src="<?php echo Visitor::getInstance()->getRootPage() ?>/style/tocify/libs/jqueryui/jquery-ui-1.9.1.custom.min.js"></script>
<script src="<?php echo Visitor::getInstance()->getRootPage() ?>/style/tocify/src/javascripts/jquery.tocify.js"></script>
<script src="<?php echo Visitor::getInstance()->getRootPage() ?>/style/js/bootstrap.min.js"></script>

<script>
    $(function() {
        var toc = $("#toc").tocify({
            selectors: "h2,h3"
        }).data("toc-tocify");
        if (toc) {
            toc.setOptions({showEffect: "fadeIn", scrollTo: 110});
        }
        $(".optionName").popover({trigger: "hover", hightlight: "true"});
    });

    $(function() {
        window.prettyPrint && prettyPrint()
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
            e.stopPropagation()
        })
    })
    $(document).ready(function(){
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.back-to-top').fadeIn(duration);
            } else {
                jQuery('.back-to-top').fadeOut(duration);
            }
        });

        jQuery('.back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
    if($('.carousel')) {
        $('.carousel').carousel({
            interval: 3000
        })
    }
</script>
<?php
if(isset($script)) {
    echo $script;
}
?>
</body>
</html>
