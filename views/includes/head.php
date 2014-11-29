<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Antoine de Roquemaurel">

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

</head>
<body>
<?php Visitor::getInstance()->displayMenu(); ?><