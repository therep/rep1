<?PHP
require_once("project.php");
require_once("project-security.php");

$g_loggedin = 0;

//phpinfo();

if(CheckLogin())
{
    $g_loggedin = 1;
}

ProjectMain();

?>

<!DOCTYPE html>
<html>
<head>
<body>
this is a change

<form name="projects" method="post" action="">
    
<H1 style="text-align:center;"><?php echo $g_current_project;?></H1>

<!-- resubmit project name for persistence -->
<input type="hidden" name="current_project" value="<?php echo $g_current_project ?>" />

    <a href="project-email.php">Email</a><br>
    <a href="talent-search.php">Search</a><br><br>

<!-- project names -->
<input type="submit" name="open_project" value="open project" />
<select name="project_names" >
    <option selected="selected"><?php echo $g_current_project; ?></option>
<?php
     foreach($g_project_names as $name)
     {
         echo "<option value=\"{$name}\">{$name}</option>\n";
     }
?>
</select> 
<br>

<!-- change project name -->
<input type="submit" name="change_project" value="change project name" />
<input type="text" name="change_project_name" value="new project name" /><br>

<!-- create new project -->
<input type="submit" name="new_project" value="create new project" />
<input type="text" name="new_project_name" value="enter new project name" /><br>

<!-- delete project -->
<input type="submit" name="delete_project" value="delete project" />

<br><br><br><br>

<!-- roles controls -->
<select name="roles" onchange="document.projects.submit();" >
    <option selected="selected"><?php echo $g_current_role; ?></option>
<?php
     foreach($g_project_info as $key=>$data)
     {
         echo "<option value=\"{$key}\">{$key}</option>\n";
     }
?>
</select> 
    
<br><br>

<!-- update current role text -->
<input type="submit" name="update_role" value="change role text" />
<input type="text" name="update_role_text" value="<?php echo $g_current_role ?>" /><br>

<!-- create new role -->
<input type="submit" name="create_role" value="create new role" />
<input type="text" name="new_role_text" value="enter new role title" /><br>

<!-- delete current role from project -->
<input type="submit" name="delete_role" value="delete role" /><br><br>

<!-- remove name from project role -->
<input type="submit" name="delete_name" value="delete name" />
<input type="text" name="delete_name_text" /><br><br>

<!-- import search results to current project -->
<input type="submit" name="import_search" value="import search results" /><br><br>

<!-- clear search results -->
<input type="submit" name="clear_search" value="clear search results" />

<H2>Actors</H2>
<?php
foreach($g_project_info[$g_current_role]['actors'] as $name)
{
    print "$name<br />";
}
?>

</body>
</html>
