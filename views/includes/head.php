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


    <title><?php echo $title; ?> — Association française Mc Kenzie</title>
    <!-- Bootstrap and demo CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">
    <link href="style/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="style/css/afmck.css" rel="stylesheet">
    <!-- Yamm styles-->
    <link href="style/yamm3/yamm/yamm.css" rel="stylesheet">
    <link rel="shortcut icon" href="afmck-icone.ico" />
    <link href="style/tocify/src/stylesheets/jquery.tocify.css" rel="stylesheet">
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
<?php Visitor::getInstance()->displayMenu(); ?>
<div class="main">
<?php
if(isset($_SESSION['lastMessage'])) {
    echo $_SESSION['lastMessage'];
    unset($_SESSION['lastMessage']);
}
?>