<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "muftisamiullah";
$password   = "letusc123";
$dbname     = "testing";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

