<?php
include_once '../helpers/init.php';

if (!isset($_SESSION['USERNAME'])){
       header('Location:smlogin.php');
     }
     try {
             // FETCH DATA of student
             $USER_ID=$_SESSION['USER_ID'];
             $stmt = $conn->prepare("SELECT * FROM complain WHERE smread='not'AND level='SupportManager' ");
             $stmt->execute();
             // set the resulting array to associative
             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

           } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
           }
 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <link rel="stylesheet" href="../assests/css/style.css">

     <title>FCSIT Support</title>
       <link rel = "icon" href ="uploads/UNIMAS-logo.png" type = "image/x-icon">
   </head>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <span class="navbar-brand mb-0 h1">FCSIT Support</span>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
         </ul>
         <ul class="navbar-nav">
           <form class="form-inline" action="../process/smlogin.php" method="post">
            <button class="btn btn-dark my-2 my-sm-0" type="submit"name="logout">LOGOUT</button>
           </form>
         </ul>
     </div>

   </nav>
   <body>

    <div class="container-fluid">
      <?php require 'sub-views/smsidenav.php'; ?>
       <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
       <div id="main">

         <div class="container">
           <h3 class="display-4">Welcome <?php echo$_SESSION['USERNAME']; ?>.</h3>
           <hr>
           <h5 class="dispay-4">Complain Cases</h5>
           <div class="table-responsive">
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Complain Reg.NO.</th>
                   <th>Email</th>
                   <th>Complain Type</th>
                   <th>Submit Date</th>
                   <th>Status</th>
                   <th>Level</th>
                   <th>Action</th>
                   <th>View</th>
                 </tr>
               </thead>
               <tbody>
                 <?php try{
                  foreach ($stmt->fetchAll() as $key => $value) {
                 ?>
                 <tr>

                   <td><?php  echo $value['id']; ?></td>
                   <td><?php  echo $value['email']; ?></td>
                   <td><?php  echo $value['complaintype']; ?></td>
                   <td><?php  echo $value['submittime']; ?></td>
                   <td>
                     <?php  echo $value['status']; ?>
                    </td>

                      <td>
                        <?php  echo $value['level']; ?>
                      </td>
                    <td>
                        <form class="form-inline" action="../process/complainprocessSM.php" method="post">
                          <input type="hidden" name="case_id" value="<?php echo $value['id'] ?>" />
                        <button class="btn btn-success my-2 my-sm-0" type="submit"name="makereadp">Make Read</button>
                        </form
                    </td>
                    <td>
                      <a href="complainsmpage.php?id=<?php echo $value['id'];?>" class="btn btn-info">View</a>
                    </td>

                 </tr>
               </tbody>
             <?php }
             } catch (PDOException $e) {
               //throw $th;
               echo "Connection failed: " . $e->getMessage();

             }?>
             </table>
           </div>
         </div>
       </div>


    </div>

<script type="text/javascript">
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("main").style.marginLeft = "0";
        }
</script>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </body>
 </html>
