<?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 04-09-2019
 * Time: 16:52
 */
session_start();
$response = (object) null;
include 'functions.php';
$response->otpValid="FALSE";
$response->otpMessage="Invalid code ";
$response->registerValid="FALSE";
if ($_SESSION["otp"]==$_GET['otp'])
{
    $response->otpValid="TRUE";
    $conn=getDBConnection();
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i:s');

    $sql = "Insert into application_letmeknow_users (username,email,lastping) values ('".$_SESSION['username']."','".$_SESSION['email']."','".$date."')";

        if ($conn->query($sql) === TRUE) {
        $response->registerValid="TRUE";
        $response ->username=$_SESSION['username'];
            EmailSendLetMeKnow($_SESSION['email'],'Welcome to #letmeknow by AppSlash',
                "<body style='text-align: center;background-color:#085BB9;color: #FFF6F1;'>
                            <br>
                            <img src=\"https://www.appslash.org/applications/letmeknow/images/logo.png\" style=\"width: 120px;height: auto\" class=\"w3-animate-top\">
                            <br>
                            <h1>Let Me Know</h1>
                            
                            <h3>Thanks for tuning to #letmeknow. Your username is <b>".$_SESSION['username']."</b>.</h3>
<h4>
    Share to receive anonymous feedback
<br><br><br>
    <a href='http://www.facebook.com/sharer.php?u=www.appslash.org/applications/letmeknow/index.php?username=".$_SESSION['username']."' style='padding: 10px; border-radius:10px;background-color: #081856;color: #FFF6F1;'> Facebook</a><br><br><br>
    
    <p style='color: #FFF6F1;' id='copysnip'>Or Share the link <br><br> https://www.appslash.org/applications/letmeknow/index.php?username=".$_SESSION['username']."</p>
    <br>
    
</h4>

<p>You can get your account deleted by clicking on <i>unsubscribe</i> when you get a feedback email from someone.</p>

                            Regards,<br><br>
                            LetMeKnow Team<br>
                            <a href='www.appslash.org' style='text-decoration: none;color: #ffffff'>AppSlash,IT-fying your goals.</a><br></body>");
    }

    $conn->close();
}
echo json_encode($response);
?>