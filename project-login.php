<?php
require_once("project-security.php");

global $g_prev_url;

//set previous url for submit button and go back url
if (!isset($_POST['previous']))
{
    $g_prev_url = $_SERVER['HTTP_REFERER'];
}
else
{
    $g_prev_url = $_POST['previous'];
}
//added comment
if(isset($_POST['submitted']))
{
    if (Login()) 
    {
        RedirectToURL($g_prev_url);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
      <title>Dani's Projects Login</title>
</head>
<body>
<H1>Projects Login</H1>
<form id='login' action='project-login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username'  maxlength="50" />
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
<input type='submit' name='Submit' value='Submit' />
</fieldset>

<input type="hidden" name="previous" value="<?php echo $g_prev_url; ?>" />

</form>


<a href="<?php echo $g_prev_url; ?>" ><-Go Back</a>
<br>
<a href="project-chgpwd.php">Change Password</a>

</body>
</html>


