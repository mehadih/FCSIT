<?php
include_once '../helpers/init.php';


//This sends the complain to University level
if (isset($_POST['LevelUni'])) {
  $CASE_ID = $_POST['caseId'];
  // echo "CASE ID: ".$CASE_ID;

  $stmt = $conn->prepare("SELECT * FROM complain WHERE id=:id");
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $result = $stmt->fetch();
  // echo "<br>NAME: ".$result['complaintype'];
  $smleveltime= $result['submittime'];
  $submittime =date("Y-m-d H:i:s");
  // echo "Date: ".$olddate;
  $Status = 'Check email to know Status';
  $level = 'University';
  $stmt = $conn ->prepare("UPDATE complain SET submittime = :submittime,status=:status,smleveltime=:smleveltime,level=:level WHERE id=:id");
  $stmt->bindParam(':submittime', $submittime);
  $stmt->bindParam(':status', $Status);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':smleveltime', $smleveltime);

  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $_SESSION["message"] = "Complain Send to University Level.";
  $_SESSION["msg_type"] = "success";

  header('Location:https://support.unimas.my/index');
}

//This sends the complain to AICTE level
if (isset($_POST['LevelAICTE'])) {
  $CASE_ID = $_POST['caseId'];
  // echo "CASE ID: ".$CASE_ID;

  $stmt = $conn->prepare("SELECT * FROM complain WHERE id=:id");
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $result = $stmt->fetch();
  // echo "<br>NAME: ".$result['complaintype'];
  $universityleveltime= $result['submittime'];
  $submittime =date("Y-m-d H:i:s");
  // echo "Date: ".$olddate;
  $Status = 'Check email to know Status';
  $level = 'AICTE';
  $stmt = $conn ->prepare("UPDATE complain SET submittime = :submittime,status=:status,universityleveltime=:universityleveltime,level=:level WHERE id=:id");
  $stmt->bindParam(':submittime', $submittime);
  $stmt->bindParam(':status', $Status);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':universityleveltime', $universityleveltime);

  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $_SESSION["message"] = "Complain Send to CITDS Level.";
  $_SESSION["msg_type"] = "success";

  header('Location:https://https://support.unimas.my/index');
}

 ?>
