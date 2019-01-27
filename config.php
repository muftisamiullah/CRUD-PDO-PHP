<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost"; 
$username   = "muftisamiullah"; //username of db
$password   = "letusc123";  //password of db
$dbname     = "testing";  //name of db
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
              );