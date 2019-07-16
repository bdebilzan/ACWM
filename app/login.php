<?php
ob_start();
require('header_login.html');
//error_reporting(E_ALL); 
//ini_set('display_errors', 1);
session_start();
include 'isdADValidation 5.php';
include 'db_connection.php';

//if logged in go to home page
if (isset($_SESSION['userRoles']))
{
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<!--form for log in-->
<div class="header">
    <h2 class="text-center">Login</h2> 
</div>
<form method = "post" action = "login.php" class="content">
    <div class="input-group"> 
            <input type="text" name = "logonName" placeholder = "Username">
    </div>
    <div class="input-group">
            <input type="password" name = "logonPass" placeholder = "Password">
    </div>
    <div class="input-group">
       <button type = "submit" name = "login" class = "btn">Login</button>
    </div>
</form>

<?php
//if form is submitted
if (isset($_POST['login'])) {
    $hostname = "localhost"; 
    $username1 = "root"; 
    $password1 = ""; 

try {
$dbh = new PDO("mysql:host=$hostname;dbname=acwm",$username1,$password1);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//if forms are not filled display error
 if (empty($_POST["logonName"]))
 {
    echo "<script type= 'text/javascript'>alert('Username is required');</script>";
 }

 else if (empty($_POST["logonPass"]))
 {
    echo "<script type= 'text/javascript'>alert('Password is required');</script>";
 }

//if forms are filled try to login
 else
 {
  //username and password gathered from form
  $username = ($_POST['logonName']);
  $password = ($_POST["logonPass"]);
  
  $_SESSION['username'] = $username;

  //query for employee id from user roles table
  $query = 
  "SELECT acwm.user_roles.employee_id 
  FROM acwm.user_roles
  JOIN acwm.application_roles 
  ON acwm.user_roles.ROLE_UID = acwm.application_roles.UID
  WHERE acwm.user_roles.EMPLOYEE_ID = $username";

  $stmt = $dbh->query($query);
  $employee_id = $stmt->fetch();

  $_SESSION['employee_id'] = $employee_id[0];

   //query for uid from application_information table
   $query2 = 
   "SELECT acwm.application_information.uid
   FROM acwm.application_information
   JOIN application_roles
   ON acwm.application_information.uid = application_roles.APPLICATION_UID
   JOIN acwm.user_roles
   on acwm.user_roles.ROLE_UID = acwm.application_roles.UID
   WHERE acwm.user_roles.EMPLOYEE_ID = $username";

   $stmt = $dbh->query($query2);
   $app_id = $stmt->fetch();

   $_SESSION['app_id'] = $app_id[0];

   //query for first name and last name of employee from my_intranet_db table
   $query3 = 
   "SELECT group_concat(concat(my_intranet_db.tblcarddata.fstrFirstName,' ', my_intranet_db.tblcarddata.fstrLastName) separator ';')
   FROM my_intranet_db.tblcarddata
   WHERE my_intranet_db.tblcarddata.fstrID = '$employee_id[0]'";

   $stmt = $dbh->query($query3);
   $name = $stmt->fetch();

   $_SESSION['full_name'] = $name[0];

  //get user roles
  isUser_isdADAuthorized(true);

 //if user has roles in system redirect to home page else display error
    if (isset($_SESSION["userRoles"]))
    {
        header("Location: home.php");
        exit();
    }
    else
    {
    echo "<script type= 'text/javascript'>alert('Incorrect username or password. Please try again.');</script>";
    exit();
    }
}
}

//catch block for errors
catch(PDOException $e)
{
    echo $e->getMessage();
    // echo "An unknown error occured. Please contact IT for support.";
}
}
// ob_end_flush();
?>
</body>
</html> 