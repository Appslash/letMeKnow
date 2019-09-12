<?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 30-08-2019
 * Time: 20:47
 */
?>
<!DOCTYPE html>
<html>
<head>
<title>Let Me Know</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<script src="js/w3.js"></script>
<script src="js/functions.js"></script>
    <?php
    if(isset($_GET['username']))
    {
        echo '<meta property="og:title" content="'.$_GET['username'].' asks, Let Me Know, by AppSlash">
    <meta property="og:description" content="Send an anonymous feedback to '.$_GET['username'].'.">';
    }
    else
    {
        echo '<meta property="og:title" content="Let Me Know by AppSlash">
    <meta property="og:description" content="Get anonymous feedbacks about you.">';
    }
    ?>

    <meta property="og:image" content="https://www.appslash.org/applications/letmeknow/images/logo.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        .w3-allerta {
            font-family: "Allerta Stencil", Sans-serif;
        }
    </style>

</head>
<body class="w3-cuslbl">

<div id="coverPage" class="w3-container w3-display-middle w3-center">
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <p class="w3-animate-bottom">Want to know what others think about you ?<br>Give them a chance to say anonymously.</p>
    <button onclick="createprofile()" class="w3-btn w3-round-xxlarge w3-cusdbl w3-padding w3-allerta w3-animate-left"><i class="fa fa-plus"></i> &nbsp;Create your feedback link</button><br>
    <p class="w3-animate-bottom">OR</p>
    <button class="w3-btn w3-round-xxlarge w3-cusblk w3-padding w3-allerta w3-animate-right"><i class="fa fa-comment"></i> &nbsp;Give a feedback to someone</button>
</div>

<div id="createPage" class="w3-display-middle w3-center" hidden>
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <p class="w3-animate-bottom">Lets start !!!</p>
    <input id="usernameInput" class="w3-input w3-round-xxlarge" style="text-align: center;"  placeholder="Your preferred username" type="text" onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/, '')" required  />
    <p id="usernameError" class="w3-left-align w3-animate-top" style="margin-top: -3px;font-size: small;display: none" ><i class="fa fa-warning"></i>&nbsp;&nbsp;Username already in use</p>
    <input id="emailInput" class="w3-input w3-round-xxlarge w3-margin-top" style="text-align: center;"  placeholder="Your Email" type="email" required  />
    <p id="emailError" class="w3-left-align w3-animate-top" style="margin-top: -3px;font-size: small;display: none;"></p>
<div class="w3-row w3-margin-top">
    <div class="w3-col m4 s4">
    <img id="captchaImage" class="w3-round " src="captcha_code.php"/>
    </div>
        <div class="w3-col m4 s4 ">
    <input id="captchaInput" class="w3-input w3-round-xxlarge" style="text-align: center;width: 200px"  placeholder="Enter code you see here" type="text" onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/, '')" required  />
    <p id="captchaError" class="w3-animate-top" style="margin-top: -3px;font-size: small;display: none;width: 200px">Invalid captcha</p>
        </div>
</div>
    <br>
    <button onclick="validateInfo()" style="min-width: 300px" class="w3-btn w3-round-xxlarge w3-cusdbl w3-padding w3-allerta w3-animate-left">Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button><br><br>
    <button onclick="backCreate2Cover()" class="w3-btn w3-round-xxlarge w3-cusblk w3-padding w3-allerta w3-animate-left"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</button>
</div>

<div id="otpverifyPage" class="w3-container w3-display-middle w3-center" hidden>
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <p class="w3-animate-bottom">We sent a 4-digit code to your email verify it here</p>
    <input id="otpInput" maxlength="4" minlength="4" class="w3-input w3-round-xxlarge w3-wide" style="text-align: center;"  placeholder="4 digit code" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" required  />
    <p id="otpError" class="w3-left-align w3-animate-top" style="margin-top: -3px;font-size: small"><i class="fa fa-warning"></i>&nbsp;&nbsp;Invalid Code</p>
    <br>
    <button onclick="verifyemailcode()" style="min-width: 300px" class="w3-btn w3-round-xxlarge w3-cusdbl w3-padding w3-allerta w3-animate-left"><i class="fa fa-plus"></i> &nbsp;Create your feedback link</button><br><br>
    <button onclick="backOtpverify2Create()" class="w3-btn w3-round-xxlarge w3-cusblk w3-padding w3-allerta w3-animate-left"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</button>
</div>

<div id="idCreatedPage" class="w3-container w3-display-middle w3-center" hidden>
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <i class="fa fa-check w3-text-cusdbl w3-animate-zoom w3-xxxlarge"></i>
    <p class="w3-animate-bottom">Your #LetMeKnow Id is <b id="newUsername">APPSLASH</b></p>
    <p id="copysnip" class="w3-card">https://www.appslash.org/applications/letmeknow/index.php?username=appslash</p>
    <p class="w3-animate-fading1" style="font-size: small">Share to receive feedbacks</p>

        <a id="facebook" target="_blank" class="w3-btn w3-round-xxlarge w3-cusblk"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</a><br><br>
        <a id="whatsapp" target="_blank" class="w3-btn w3-round-xxlarge w3-cusblk"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;WhatsApp</a><br><br>

        <button onclick="copycat()" class="w3-btn w3-round-xxlarge w3-cusblk"><i class="fa fa-copy"></i>&nbsp;&nbsp;Copy Link</button>
</div>

<div class="w3-display-bottommiddle w3-center">
    <i id="loaderIcon" class="fa fa-spinner w3-xxlarge w3-spin w3-margin-bottom w3-hide"></i>
    <br>
    <a href="http://www.appslash.org" style="text-decoration: none" class=" w3-small w3-animate-fading">Powered By AppSlash</a>
    <br>
    <a target="_blank" href="https://www.appslash.org"><i class="fa fa-globe w3-large"></i></a>&nbsp;&nbsp;&nbsp;
    <a target="_blank" href="https://www.facebook.com/TeamAppslash"><i class="fa fa-facebook w3-large"></i></a>&nbsp;&nbsp;&nbsp;
    <a target="_blank" href="https://twitter.com/teamappslash"><i class="fa fa-twitter w3-large"></i></a>&nbsp;&nbsp;&nbsp;
    <a target="_blank" href="https://www.instagram.com/teamappslash/"><i class="fa fa-instagram w3-large"></i></a>&nbsp;&nbsp;&nbsp;
</div>



</body>
</html>

