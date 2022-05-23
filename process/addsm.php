<?php

include_once '../helpers/init.php';

//Add the principal
    if (isset($_POST['AddSM'])){
      $name = filter_var($_POST['SMName'], FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $password = $_POST['Password'];

      $stmt = $conn->query("SELECT * FROM supportmanager WHERE name='$name'");
      $stmt->execute();
      $num_rows = $stmt->fetchColumn();

      if ($num_rows>0) {
            // code...
            $_SESSION["message"] = "This Username already exists.";
            $_SESSION["msg_type"] = "danger";
            header('Location:../views/addSM.php');

          } else {
            // code...
            // TO REGISTER Member
            if (count($errors) == 0) {
              // code...
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);
              // prepare sql and bind parameters
               $stmt = $conn ->prepare("INSERT INTO supportmanager (name, email , password)
               VALUES (:name,:email,:password)");
               $stmt->bindParam(':name', $name);
               $stmt->bindParam(':email', $email);
               $stmt->bindParam(':password', $hashed_password);
               $stmt->execute();
               $_SESSION["message"] = "Account is created.";
               $_SESSION["msg_type"] = "success";

            }
            header('Location:../views/addSM.php');

          }

    }


$conn = null;
 ?>
