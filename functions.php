<?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 09-09-2019
 * Time: 20:13
 */

function EmailSendLetMeKnow($to,$subject,$message)
{
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From: 'Let Me Know' <letmeknow@appslash.org>". "\r\n" .
        "Reply-to: ".$to;
    mail($to,$subject,$message,$headers);
}

function getDBConnection()
{
    $dbHost = 'localhost';
    $dbUsername = 'AppSlashDBA';
    $dbPassword = 'AppSlash#DBA3306';
    $dbName = 'appsl2dg_AppSlashDB';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
}
