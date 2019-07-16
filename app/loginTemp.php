
<?php
require('header_login.html');
session_start();

//if logged in go to home page
if (isset($_SESSION['userRoles']))
{
    header("Location: home.php");
    exit();
}

ob_start();
error_reporting(E_ALL); 
ini_set('display_errors', 1);
include 'isdADValidation 5.php';
include 'db_connection.php'?>
<!-- <div id="notloggedin"> -->
<div class="header">
    <h2 class="text-center">Login</h2> 
</div>
<form method = "post" action = "login.php" class="content">
    <div class="input-group"> 
        <!-- <label>Username</label> -->
            <input type="text" name = "logonName" placeholder = "Username">
    </div>
    <div class="input-group">
        <!-- <label>Password</label> -->
            <input type="password" name = "logonPass" placeholder = "Password">
    </div>
    <div class="input-group">
       <button type = "submit" name = "login" class = "btn">Login</button>
    </div>
    <!-- <p>
        Not yet a member? <a href = "register.php">Sign up</a>
    </p>     
    <p>
        <a href = "forgot_password.php">Forgot password?</a>
    </p> -->
    <!-- <div class="card border-dark mb-3" style="max-width: 18rem;">
        <div class="card-header">Login</div>
        <div class="card-body text-dark">
            <input type="text" name = "logonName" placeholder = "Username">
            <input type="password" name = "logonPass" placeholder = "Password">
            <button type = "submit" name = "login" class = "btn btn-success">Login</button>
        </div>
    </div> -->
</form>
<?php
// LOGIN USER
if (isset($_POST['login'])) {
    $hostname = "localhost"; 
    $username1 = "root"; 
    $password1 = ""; 

try {
$dbh = new PDO("mysql:host=$hostname;dbname=acwm",$username1,$password1);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

//ensure form fields are filled properly
 if (empty($_POST["logonName"]))
 {
    echo "<script type= 'text/javascript'>alert('Username is required');</script>";
 }

 else if (empty($_POST["logonPass"]))
 {
    echo "<script type= 'text/javascript'>alert('Password is required');</script>";
 }

 //*****start to include new code*****//
 
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

  //query for first name and last name of employee from my_intranet_db table
  $query2 = 
  "SELECT acwm.application_information.uid
  FROM acwm.application_information
  JOIN application_roles
  ON acwm.application_information.uid = application_roles.APPLICATION_UID
  JOIN acwm.user_roles
  on acwm.user_roles.ROLE_UID = acwm.application_roles.UID
  WHERE acwm.user_roles.EMPLOYEE_ID = $username";

$query3 = 
"SELECT group_concat(concat(my_intranet_db.tblcarddata.fstrFirstName,' ', my_intranet_db.tblcarddata.fstrLastName) separator ';')
FROM my_intranet_db.tblcarddata
WHERE my_intranet_db.tblcarddata.fstrID = '$employee_id[0]'";

$stmt = $dbh->query($query3);
$name = $stmt->fetch();

echo " namecheck " . $name[0] . " namecheck ";

$_SESSION['full_name'] = $name[0];

$stmt = $dbh->query($query2);
$app_id = $stmt->fetch();

$_SESSION['app_id'] = $app_id[0];

//get user roles
isUser_isdADAuthorized(true);

// $query3 = "SELECT getUserRoles($employee_id[0], '$app_id[0]')";


// $stmt = $dbh->query($query3);
// $userRoles = $stmt->fetch();

// $_SESSION['userRoles'] = explode(",", $userRoles[0]);

header("Location: home.php");
// exit();

// isUser_isdADValidation($_SESSION);

//   //check array
//   echo "check";
//   print_r($result1);

    // $decodedUserRoles = json_decode ( $userRoles, true );
    // $jsonUserRoles = explode ( ',', $decodedUserRoles [0] ['userroles'] );
    // if (count( $test ) > 0)
    // echo var_dump ( $jsonUserRoles );
    // exit();

  //make sure user in database
  //$query = "SELECT getUserRoles($username, );

//   $stmt = $dbh->prepare($query);
//   $stmt->execute([$username]);
//   $user = $stmt->fetch();

 //make sure user in database
// --   if ($stmt->rowCount() > 0)
// --   {
// --     $query = "SELECT * FROM roles WHERE username = ? and role = 'admin'";

// --     $stmt = $dbh->prepare($query);
// --     $stmt->execute([$username]);
// --     $user = $stmt->fetch();

// --     $username = $_SESSION["username"]; 
// --     $_SESSION["role"] = $user[1];  


 //form filled properly
//  else
//  {
//   $username = ($_POST['username']);
//   $password = ($_POST['password_1']);

//   //make sure user in database
//   $query = "SELECT * FROM roles WHERE username = ?";

//   $stmt = $dbh->prepare($query);
//   $stmt->execute([$username]);
//   $user = $stmt->fetch();

//     //make sure user in database
//   if ($stmt->rowCount() > 0)
//   {
//     $query = "SELECT * FROM roles WHERE username = ? and role = 'admin'";

//     $stmt = $dbh->prepare($query);
//     $stmt->execute([$username]);
//     $user = $stmt->fetch();

//     $_SESSION["username"] = $_POST["username"]; 
//     $_SESSION["role"] = $user[1];  

//         //get rid of comments
//         if($user[1] == 'admin')
//         {
//             header("Location: login_success.php");   //should redirect to login_success.php
//             exit();
//         } 
//         else if (true)
//         {
//             $query = "SELECT * FROM roles WHERE username = ? and role = 'user'";

//             $stmt = $dbh->prepare($query);
//             $stmt->execute([$username]);
//             $user = $stmt->fetch();

//             if ($stmt->rowCount() > 0)
//             {
//                 $_SESSION["username"] = $_POST["username"]; 
//                 $_SESSION["role"] = $user[1];  

//                 header("Location: login_success.php");   //should redirect to login_success.php
//                 exit();
//             }

//             $query = "SELECT * FROM roles WHERE username = ? and role = 'manager'";

//             $stmt = $dbh->prepare($query);
//             $stmt->execute([$username]);
//             $user = $stmt->fetch();

//             if ($stmt->rowCount() > 0)
//             {
//                 $_SESSION["username"] = $_POST["username"]; 
//                 $_SESSION["role"] = $user[1];  

//                 header("Location: login_success.php");   //should redirect to login_success.php
//                 exit();
//             }
//             else
//             {
//                 echo "<script type= 'text/javascript'>alert('Wrong credentials.');</script>";
//                 exit();
//             }
//         }
        }
        // else
        // {
        //      echo "<script type= 'text/javascript'>alert('Incorrect username or password. Please try again.');</script>";
        //      exit();
        // } 
    // }
}
catch(PDOException $e)
{
    // echo $e->getMessage();
    echo "An unkown error occured. Please contact IT for support.";
}
}
ob_end_flush();
?>

<!-- </div> -->

</body>
</html> 