<?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 09-09-2019
 * Time: 20:13
 */
function getDBConnection()
{
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'root';
    $dbName = 'application_letmeknow';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
}
