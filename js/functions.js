
function createprofile()
{
w3.hide('#coverPage');
w3.show('#createPage');
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