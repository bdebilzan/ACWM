<?php
 
function OpenCon()
{ 
 $host = "localhost"; 
 $username = "root"; 
 $password = ""; 
 $database = "acwm";

 try
 {
     $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password); 
     
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     return $conn;
 }
 catch (PDOException $e)
 {
    //  echo "Connection failed: " . $e->getMessage();
    echo "There was an unknown error. Please contact IT.";
 }
}
 
function CloseConn() {
    $conn = null;
}
   
?>