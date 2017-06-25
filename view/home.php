<?php session_start();
include '../lib/DB.connect';
include 'viewList/couressList.file';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../css/css.css">

  <meta charset="UTF-8">
  <title>EMS - school tec</title>
</head>
<body>
  
<?php include '../view/in_all_pages/header.php'; ?>
<div class="container centered">



  <?php include '../project/msgAPI.php' ?>



  <div class="row bg" id="row"  >
    <div class="col-xs-12 col-md-6  shadow">
      <div class="row" id="row">
   
  <!-- selctor -->
        <?php 
          switch ($_GET['subject']) {
            case 'school':
              include 'viewList/studentsContainer.file' ;
              include 'viewList/couressContainer.file';
            break;
            case 'administration':
              include 'viewList/adminsContainer.file';
            break;

             default:
             # header("Location: ../view/home.php?subject=school");
    break;
          }

?>
        
      </div>  
    </div>  

    <div class="col-xs-12 col-md-6 mainCol  shadow">
      <main>
<?php include 'addselector.file'; ?>
<?php include 'switchapi.php' ?>


<div id="detailsAbuteSchool">
  <p>
Our college, opened especially for those who want to enter into the heart of high-tech.
With us every student receives the personal attention he needs and all the tools that will make him succeed in entering high-tech, coping with the difficulties, and winning.

  </p>
</div>


      </main>
    </div>
  </div>

</div>

<!-- <p id="printDisable">Print this document is NOT allowed</p> -->
<?php include '../view/in_all_pages/footer.php'; ?>
<?php include "../lib/counter.php"; ?>
<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>