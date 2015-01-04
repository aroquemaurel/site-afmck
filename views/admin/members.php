<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des adhérents</h1>
    <?php
    if($usersOk->getUsers() != array()) {
        echo '<h2>Comptes actifs</h2>';
        echo $usersOk->usersToString(true);
    }

    if($usersToActivate->getUsers() != array()) {
        echo '<h2>Comptes à activer</h2>';
        echo $usersToActivate->usersToString(false);
    }

    if($usersNotOk->getUsers() != array()) {
        echo '<h2>Comptes désactivés manuellement</h2>';
        echo $usersNotOk->usersToString(false);
    }
    ?>
</div>

<?php
$script = '<script>
$(document).ready(function(){
$("tr").hover(function() {
if($(this).closest(\'thead\').length == 0) {
    $("tr").removeClass("info");
    $(this).addClass("info");
    $("tr").css("cursor", "pointer" );
} else {
$("tr").css("cursor", "default" );
}
});
$("tr").click(function() {
if($(this).closest(\'thead\').length == 0) {
    window.location.href = $(this).attr("href");
    }
});
 });
</script>';