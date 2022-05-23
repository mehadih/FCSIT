<?php
include_once '../helpers/init.php';


//This sends the complain to Support Manager
if (isset($_POST['nextLevelP'])) {
  $CASE_ID = $_POST['caseId'];
  // echo "CASE ID: ".$CASE_ID;

  $stmt = $conn->prepare("SELECT * FROM complain WHERE id=:id");
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $result = $stmt->fetch();
  // echo "<br>NAME: ".$result['complaintype'];
  $oldtime= $result['submittime'];
  $submittime =date("Y-m-d H:i:s");
  // echo "Date: ".$olddate;
  $level = 'SupportManager';
  $stmt = $conn ->prepare("UPDATE complain SET submittime = :submittime,oldtime=:oldtime,level=:level WHERE id=:id");
  $stmt->bindParam(':submittime', $submittime);
  $stmt->bindParam(':oldtime', $oldtime);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $_SESSION["message"] = "Complain Send to Support Manager.";
  $_SESSION["msg_type"] = "success";

  header('Location:../views/studentdashboard.php');
}
  if (isset($_POST['makereadp'])) {
    // code...
    $CASE_ID = $_POST['case_id'];
    $principalread = 'read';
    $stmt = $conn ->prepare("UPDATE complain SET smread = :smread WHERE id=:id");
    $stmt->bindParam(':smread', $smread);
    $stmt->bindParam(':id', $CASE_ID);
    $stmt->execute();
    header('Location:../views/smdashboard.php');

  }

  if (isset($_POST['responceP'])) {
    // code...
    $CASE_ID = $_POST['case_id'];
    $status = filter_var($_POST['complainStatus'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $stmt = $conn ->prepare("UPDATE complain SET status = :status, message =:message WHERE id=:id");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':id', $CASE_ID);
    $stmt->execute();
    header('Location:../views/smdashboard.php');

  }


 ?>
