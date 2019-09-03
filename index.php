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
    <meta property="og:title" content="Let Me Know by AppSlash">
    <meta property="og:title" content="Get anonymous feedbacks about you.">
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

<div id="createPage" class="w3-container w3-display-middle w3-center" hidden>
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <p class="w3-animate-bottom">Lets start !!!</p>
    <input class="w3-input w3-round-xxlarge" style="text-align: center;"  placeholder="Your preferred username" type="text" onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/, '')" required  />
    <p class="w3-left-align w3-animate-top" style="margin-top: -3px;font-size: small"><i class="fa fa-warning"></i>&nbsp;&nbsp;Username already in use</p>
    <input class="w3-input w3-round-xxlarge w3-margin-top" style="text-align: center;"  placeholder="Your Email" type="email" required  />
    <p class="w3-left-align w3-animate-top" style="margin-top: -3px;font-size: small"><i class="fa fa-warning"></i>&nbsp;&nbsp;Email already registered</p>
    <br>
    <button onclick="verifyemailcode()" style="min-width: 300px" class="w3-btn w3-round-xxlarge w3-cusdbl w3-padding w3-allerta w3-animate-left">Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button><br>
</div>

<div id="otpverifyPage" class="w3-container w3-display-middle w3-center" hidden>
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <p class="w3-animate-bottom">We sent a 4-digit code to your email verify it here</p>
    <input maxlength="4" minlength="4" class="w3-input w3-round-xxlarge w3-wide" style="text-align: center;"  placeholder="4 digit code" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" required  />
    <p class="w3-left-align w3-animate-top" style="margin-top: -3px;font-size: small"><i class="fa fa-warning"></i>&nbsp;&nbsp;Invalid Code</p>
    <br>
    <button onclick="showIdCreated()" style="min-width: 300px" class="w3-btn w3-round-xxlarge w3-cusdbl w3-padding w3-allerta w3-animate-left"><i class="fa fa-plus"></i> &nbsp;Create your feedback link</button><br>
</div>

<div id="idCreatedPage" class="w3-container w3-display-middle w3-center" hidden>
    <img src="images/logo.png" style="width: 120px;height: auto" class="w3-animate-top">
    <h3 class="w3-text-cuswhi w3-allerta w3-animate-zoom">Let Me Know</h3>
    <i class="fa fa-check w3-text-cusdbl w3-animate-zoom w3-xxxlarge"></i>
    <p class="w3-animate-bottom">Your #LetMeKnow Id is <b>APPSLASH</b></p>
    <p class="w3-animate-fading" style="font-size: small">Share to receive feedbacks</p>
    <div class="w3-animate-top w3-center">
        <a class="w3-cell w3-btn w3-round-xxlarge w3-cusblk"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="w3-cell w3-btn w3-round-xxlarge w3-cusblk"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;WhatsApp</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="w3-cell w3-btn w3-round-xxlarge w3-cusblk"><i class="fa fa-copy"></i>&nbsp;&nbsp;Copy Link</a>
    </div>

</div>
<!--<header class="w3-container w3-red">-->
<!--    <h1>Header</h1>-->
<!--</header>-->
<!--<p>KUTTA KUTIYA</p>-->
<!--<footer class="w3-container w3-red w3-center">-->
<!--    <h5>Copyright &#9400; --><?php //echo date("Y"); ?><!-- AppSlash</h5>-->
<!--    <p>Footer information goes here</p>-->
<!--</footer>-->
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

