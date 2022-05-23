<?php
$serevername = "localhost";
$username = "root";
$password = '';
$dbname = "FCSIT";
$errors = array();

try {
  $conn = new PDO("mysql:host=$serevername;dbname=FCSIT",$username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  // echo "YES";
  session_start();
  

} catch (PDOException $e) {
  echo "Connection Failed : ".$e->getMessage();
}
//Disconnect
// $conn = null;
 ?>
