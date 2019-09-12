    <?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 08-09-2019
 * Time: 13:25
 */

session_start();
$response = (object) null;
include 'functions.php';
$response->captchaValid="FALSE";
$response->emailValid="FALSE";
$response->usernameValid="FALSE";
$response->usernameMessage="Username already registered";
$response->emailMessage="Email already Registered";
$response->captchaMessage="Captcha Invalid";

if ($_SESSION["captcha_code"]===$_GET['captcha'])
    {
        $response->captchaValid="TRUE";

        $conn=getDBConnection();
        $sqlA = "SELECT email from application_letmeknow_users where email = '".$_GET['email']."'";

        $resultA = $conn->query($sqlA);
        

        if (!($resultA->num_rows > 0)) {
            $response->emailValid="TRUE";
            $sqlB = "SELECT username from application_letmeknow_users where username = '".$_GET['username']."'";
            $resultB = $conn->query($sqlB);
                if (!($resultB->num_rows > 0)) {
                    $response->usernameValid="TRUE";
                    $_SESSION['email']=$_GET['email'];
                    $_SESSION['username']=$_GET['username'];
                    $_SESSION['otp']=rand(1000,9999);

                    EmailSendLetMeKnow($_GET['email'],'Your letmeknow verification code',
                        "<body style='text-align: center;background-color:#085BB9;color: #FFF6F1;'>
                            <br>
                            <img src=\"https://www.appslash.org/applications/letmeknow/images/logo.png\" style=\"width: 120px;height: auto\" class=\"w3-animate-top\">
                            <br>
                            <h1>Let Me Know</h1>
                            
                            <h3>Code to verify your email for registering to #letmeknow is <b>".$_SESSION['otp']."</b>.</h3>
                            <br>
                            Regards,<br><br>
                            LetMeKnow Team<br>
                            <a href='www.appslash.org' style='text-decoration: none;color: #ffffff'>AppSlash,IT-fying your goals.</a><br></body>");
                }
        }
        $conn->close();
    }
echo json_encode($response);
?>