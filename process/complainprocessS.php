<?php
include_once '../helpers/init.php';

//Make Complain Read
if (isset($_POST['makeread'])) {
  $CASE_ID = $_POST['case_id'];
  $readstatus = 'read';
  $stmt = $conn ->prepare("UPDATE complain SET readstatus = :readstatus WHERE id=:id");
  $stmt->bindParam(':readstatus', $readstatus);
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  header('Location:../views/staffdashboard.php');

  // echo "ID: ".$CASE_ID;
}

//Action on complain by staff

if (isset($_POST['responce'])) {
  // code...
  $CASE_ID = $_POST['case_id'];
  $status = filter_var($_POST['complainStatus'], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  $stmt = $conn ->prepare("UPDATE complain SET status = :status, message =:message WHERE id=:id");
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':message', $message);
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  header('Location:../views/staffdashboard.php');

}

 ?>
