<?php  

ob_start();
require 'redirectToLoginIfNotLoggedIn.php';
require 'header.php';
require 'navbar.php';

//if not logged in go to login page
      
$printToPage = '<br><h3 style="text-align: center;">Welcome, '.$_SESSION["full_name"].'.<br><br> Employee Id: '.$_SESSION["username"].'<br> Roles: ';


      // foreach ($_SESSION['userRoles'] as $value) {
      //   $printToPage .= $value . " ";
      // }

      foreach ($_SESSION['userRoles'] as $value) {
        $printToPage .= $value . " ";
      }

      // foreach ($_SESSION as $theVal)
      //     $printToPage .= $theVal . " | ";

      $printToPage .= '</h3>';

      echo $printToPage; 
      
          //if admin
          // if ($_SESSION["role"] == 'admin')
          // {
          //   // echo 'admin - all'; 
          //   echo '
          //  <!DOCTYPE html>
          //  <html>
          //  <head>
          //  <meta charset="UTF-8">
          //  <meta name="google" content="notranslate"> 
          //  <meta http-equiv="Content-Language" content="en">
          //  </head>
          //  <body>
          //  <br>
          //  </body>
          //  </html> ';
          // }

      //if user
      // else if ($_SESSION["role"] == 'user')
      // {
      //   // echo 'user - all but add new user'; 
      //   echo '<!DOCTYPE html>
      //      <html>
      //      <head>
      //      <meta charset="UTF-8">
      //      <meta name="google" content="notranslate"> 
      //      <meta http-equiv="Content-Language" content="en">
      //      </head>
      //      <body>
      //      <br>
      //      </body>
      //      </html> ';
      // }

      // //if manager
      // else if ($_SESSION["role"] == 'manager')
      // {
      //   echo 'test';
      //   // echo 'manager - view only';
      // }

//  require 'Footer.html'; 
 ?>  
 </body>
 </html>
 