<?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 08-09-2019
 * Time: 13:25
 */


session_start();
$response = (object) null;

$response->captchaValid="FALSE";
$response->emailValid="FALSE";
$response->usernameValid="FALSE";
$response->usernameMessage="Username already registered";
$response->emailMessage="Email already Registered";
$response->captchaMessage="Captcha Invalid";

if ($_SESSION["captcha_code"]===$_GET['captcha'])
    {
        $response->captchaValid="TRUE";
        include "functions.php";
        $conn=getDBConnection();
        $sqlA = "SELECT email from application_letmeknow_users where email = '".$_GET['email']."'";
        //$sqlB = "SELECT username from application_letmeknow_users where username = '".$_GET['username']."'";
        $resultA = $conn->query($sqlA);
        //$resultB = $conn->query($sqlB);

        if (!($resultA->num_rows > 0)) {
            $response->emailValid="TRUE";
            $sqlB = "SELECT username from application_letmeknow_users where username = '".$_GET['username']."'";
            $resultB = $conn->query($sqlB);
                if (!($resultB->num_rows > 0)) {
                    $response->usernameValid="TRUE";
                }
        }

        $conn->close();

    }
echo json_encode($response);
?>