<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Ma clé de déverrouillage</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="alert alert-warning">
        <p><b>Attention</b>&nbsp;Votre clé est strictement personnelle et ne doit pas être donnée à une tierce personne.</p>
    </div>

    <p>
        <b>Votre numéro ADELI:</b>&nbsp;&nbsp;<?php echo Visitor::getInstance()->getUser()->getAdeliNumber();?><br/>
        <b>Votre clé:&nbsp;</b><?php echo $license->getKey();?><br/>
        <b>Valable jusqu'au:&nbsp;</b><?php echo $license->getValidDate()->format("d / m / Y");?><br/>
    </p>
</div>