<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


require_once \Visitor::getRootPath()."/vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = CONFIG == 'prod';
$config = Setup::createAnnotationMetadataConfiguration(array(\Visitor::getRootPath()."/classes/models"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'user' => USER,
    'password' => PASSWORD,
    'host' => HOST,
    'dbname'=> DBNAME,
    'charset' => 'utf8',
    'driverOptions' => array(
        1002 => 'SET NAMES utf8'
    )
);


// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
