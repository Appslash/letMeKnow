function authenticate(Wresponse) {
    var emailError = document.getElementById("emailError");
    var usernameError = document.getElementById("usernameError");
    var captchaError = document.getElementById("captchaError");
var response=JSON.parse(Wresponse);

    if(response.captchaValid=="TRUE")
    {
        if(response.emailValid=="TRUE")
        {
            if(response.usernameValid=="TRUE")
            {
                w3.hide('#createPage');
                w3.show('#otpverifyPage');
            }
            else
            {
                usernameError.innerText=response.usernameMessage;
                usernameError.style.display="block";
            }
        }
        else
        {
            emailError.innerText=response.emailMessage;
            emailError.style.display="block";
        }

    }
    else
    {
        captchaError.innerText=response.captchaMessage;
        captchaError.style.display="block";
    }
}
function validateInfo()
{
    var username = document.getElementById("usernameInput").value;
    var email = document.getElementById("emailInput").value;
    var captcha = document.getElementById("captchaInput").value;
    var emailError = document.getElementById("emailError");
    var usernameError = document.getElementById("usernameError");
    var captchaError = document.getElementById("captchaError");
    if(ValidateEmail(email))
    {

        if(captcha)
        {
            if(username)
            {
               w3.getHttpData('verifyuser.php?captcha='+captcha+'&email='+email+'&username='+username,authenticate);
            }
            else
            {
                usernameError.innerText="Username is required";
                usernameError.style.display="block";
            }
        }
        else
        {
            captchaError.innerText="Captcha is required";
            captchaError.style.display="block";
        }
    }
    else
    {
        emailError.innerText="Invalid Email";
        emailError.style.display="block";
    }
}


function createprofile()
{
w3.hide('#coverPage');
w3.show('#createPage');
    document.getElementById('captchaImage').src='captcha_code.php';
    w3.hide('#emailError');
    w3.hide('#usernameError');
    w3.hide('#captchaError');

}

function verifyemailcode()
{
w3.hide('#createPage');
    w3.show('#otpverifyPage');
}
function showIdCreated()
{

    w3.hide('#otpverifyPage');
    w3.show("#idCreatedPage");
}
function backCreate2Cover()
{
    w3.hide('#createPage');
    w3.show('#coverPage');
}
function backOtpverify2Create()
{
    w3.hide('#otpverifyPage');
    w3.show('#createPage');
    document.getElementById('captchaImage').src='captcha_code.php';
    w3.hide('#emailError');
    w3.hide('#usernameError');
    w3.hide('#captchaError');


}

function ValidateEmail(mail)
{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
    {
        return (true)
    }

    return (false)
}