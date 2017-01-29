<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Antoine de Roquemaurel">

	<meta content="True" name="HandheldFriendly">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="viewport" content="width=device-width">

    <title><?=$title; ?> — Association française Mc Kenzie</title>
    <!-- Bootstrap and demo CSS -->
    <link href="<?=Visitor::getRootPage() ?>/style/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage()?>/style/fonts/family-lato.css" rel="stylesheet" type="text/css" >
    <link href="<?=Visitor::getRootPage()?>/style/fonts/family-roboto.css" rel="stylesheet" type="text/css" >
    <link href="<?=Visitor::getRootPage() ?>/style/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="<?=Visitor::getRootPage() ?>/style/css/afmck.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage() ?>/style/css/afmck-forum.css" rel="stylesheet">

    <link href="<?=Visitor::getRootPage() ?>/style/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage() ?>/style/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage() ?>/style/css/tooltip-viewport.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage() ?>/style/css/multi-upload.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= Visitor::getRootPage()?>/style/css/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?=Visitor::getRootPage() ?>/style/js/html5shiv.min.js"></script>
      <script src="<?=Visitor::getRootPage() ?>/style/js/respond.min.js"></script>
    <![endif]-->

    <!-- Yamm styles-->
    <link href="<?=Visitor::getRootPage() ?>/style/yamm3/yamm/yamm.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage() ?>/afmck-icone.ico" rel="shortcut icon" />
    <link href="<?=Visitor::getRootPage() ?>/style/tocify/src/stylesheets/jquery.tocify.css" rel="stylesheet">
    <link href="<?=Visitor::getRootPage() ?>/style/wysiwyg/external/google-code-prettify/prettify.css" rel="stylesheet" />
    <link href="<?=Visitor::getRootPage()?>/style/fonts/font-awesome.css" rel="stylesheet" type="text/css" >
    <style>
        body {
            padding-top: 20px;
        }
        p {
            font-size: 16px;
        }
        .headerDoc {
            color: #005580;
        }
        @media (max-width: 767px) {
            #toc {
                position: relative;
                width: 100%;
                margin: 0px 0px 20px 0px;
            }
        }
    </style>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61573960-1', 'auto');
  ga('send', 'pageview');

</script>
<?php Visitor::getInstance()->displayMenu(); ?>
<div class="main">
<?php
if(isset($_SESSION['lastMessage'])) {
    echo $_SESSION['lastMessage'];
    unset($_SESSION['lastMessage']);
}
?>
