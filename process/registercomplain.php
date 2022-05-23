<?php
include_once '../helpers/init.php';

//Register the Complain
if (isset($_POST['submit'])) {
  $USER_ID = $_POST['USER_ID'];
  $name = filter_var($_POST['studentName'], FILTER_SANITIZE_STRING);
  $studentMatricNo = filter_var($_POST['studentMatricNo'], FILTER_SANITIZE_STRING);
  $department = filter_var($_POST['studentDepartment'], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST['studentContactNo'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['studentEmailID'], FILTER_SANITIZE_EMAIL);
  $complainType = filter_var($_POST['complainType'], FILTER_SANITIZE_STRING);
  $complain = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
  $status = 'Not Process Yet';
  $level = 'Staff';
  $readstatus = 'notread';
  $smread = 'not';
  // echo "NAME: ".$USER_ID;
  $folder ="../uploads/";

$image = $_FILES['image']['name'];

$path = $folder . $image ;

$target_file=$folder.basename($_FILES["image"]["name"]);


 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg', '3gp'); $filename=$_FILES['image']['name'];

$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) )

{

 $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
 $_SESSION["msg_type"] = "danger";

 header('Location:../views/registercomplain.php');
}

else{


  move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);

  $stmt = $conn ->prepare("INSERT INTO complain (user_id, name, matricno, department, contactno, email ,complaintype,image,description ,status,level,readstatus,smread)
  VALUES (:user_id, :name, :matricno, :department ,:contactno,:email,:complaintype,:image, :description ,:status,:level,:readstatus,:smread)");
  $stmt->bindParam(':user_id', $USER_ID);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':matricno', $studentMatricNo);
  $stmt->bindParam(':department', $department);
  $stmt->bindParam(':contactno', $phone);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':complaintype', $complainType);
  $stmt->bindParam(':image',$image);
  $stmt->bindParam(':description', $complain);
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':readstatus', $readstatus);
  $stmt->bindParam(':smread', $smread);

  $stmt->execute();
  $_SESSION["message"] = "Complain Registerd.";
  $_SESSION["msg_type"] = "success";

  header('Location:../views/registercomplain.php');

}

}

//DELETE THE Complain
if (isset($_POST['deleteComplain'])) {
  // code...
  $delete_id = $_POST['CASE_ID'];
  $stmt = $conn ->prepare("DELETE FROM complain WHERE id = :id");
  $stmt->bindParam(':id', $delete_id);
  $stmt->execute();

  //REDIRECT THE USER
  header("Location:../views/studentdashboard.php");
}

 ?>
