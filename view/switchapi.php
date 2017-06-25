<?php

  switch ($_GET['student']) {
    case 'show':
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
      $student_show = DB::getconnection()->query("
          SELECT id, name, phone, age, course_id, img
          FROM students 
          WHERE id = '$id' 
          ");
          while ($row = $student_show->fetch_assoc()) {
            echo "
            <div class= 'show_student'>
            <h2>Student:</h2>
            "; 

              foreach ($row as $key => $value) {
              echo "<span class='bold'> $key: </span> <span> $value </span> <br>";
              }
            echo "
              <img class='userPhotoBig' alt='user photo' src='../img/uploads/students/"
              . $row['img']
              . "' >
             
              ";
            echo " <a href='?subject=school&student=edit&id="
            . $row['id']
            . "'> <div  class ='edit_student"
            . $row['id']
            . "'> edit student </a>"; 

                   echo " <a href='?subject=school&student=delete&id="    . $row['id']  . "'> <div  class ='delete_student" . $row['id'] . "'> delete student  </a>" ; 
echo " </div>";

          }        
    break;

    case 'edit':

    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$edit_show = DB::getconnection()->query("
      SELECT id, name , phone, age
      FROM students 
      WHERE id = '$id' 
      ");

  echo 'edit Student number: ' . $id ;  

  echo "
    <form action='../project/ChangesManager.php' method='POST'>
    <input type='hidden' name='action' value='updateStudent'>
  ";
 
echo "<input type='hidden' name='old_id' value='". $id  ;  

echo "'>";
  while ($row = $edit_show->fetch_assoc()) {
    foreach ($row as $key => $value) {
      echo "
      <span class='bold'>$key: </span><input type='text' name='$key' placeholder='$value'><br>
      ";
    }
  }
echo '<apan class="bold">Course: </span>' . createSelect($courses, 'course');
  echo "<input type='file' accept='image/*' name='pic'>";
  echo "
  <input type='submit' value='save'>
  </form>
  ";

    break;

       case 'delete':
      
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

echo 'delete Student number: ' . $id  ." ?";  

  echo "
    <form action='../project/ChangesManager.php' method='POST'>
    <input type='hidden' name='action' value='delete_student'>
  ";
 
echo "<input type='hidden' name='old_id' value='". $id  ;  

echo "'>";

  echo "
  <input type='submit' value='delete'>
  </form>
  ";

    break;

  }

  switch ($_GET['course']) {
    case 'show':
  
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    $course_show = DB::getconnection()->query("
      SELECT id, name, length, img, description
      FROM courses 
      WHERE id = '$id' 
      ");

      while ($row = $course_show->fetch_assoc()) {
        echo "
        <div class= 'show_course'>
        <h2>Course:</h2>
        "; 

        foreach ($row as $key => $value) {
        echo "<span class='bold'> $key: </span> <span> $value </span> <br>";
         }
                     echo "
              <img class='userPhotoBig' alt='user photo' 
              src='../img/uploads/courses/"
              . $row['img']
              . "' >
              
              ";

      echo " <a href='?subject=school&course=edit&id="    . $row['id']  . "'> <div  class ='edit_course" . $row['id'] . "'> edit course  </a>" ; 

if ($_SESSION['permission_id'] == '1' || $_SESSION['permission_id'] == '2') {
       echo " <a href='?subject=school&course=delete&id="    . $row['id']  . "'> <div  class ='delete_course" . $row['id'] . "'> delete course  </a>" ; 
}else{
echo "<br><span class='permissionError'> delete course - You dont have a permission to delete Coures </span>";
}

       echo "</div>";

      $course_show = DB::getconnection()->query("
          SELECT id, name, img
          FROM students 
          WHERE course_id = '$id' 
          ");
     echo  " <h2>Students List:</h2>";
          while ($row = $course_show->fetch_assoc()) {
            echo "
            <a href='?subject=school&student=show&id="    . $row['id']  . "'>
            <div  class ='user_view " . $row['id'] . "'>
            <div class= 'show_student'>
            "; 

              foreach ($row as $key => $value) {
              echo "<span class='bold'> $key: </span> <span> $value </span> <br>";
              }
            echo "
              <img class='userPhoto' alt='user photo' src='../img/uploads/students/"
              . $row['img']
              . "' >
              </div> </div>   </a>
              <br>
              ";
                }

        }        
    break;

    case 'edit':

    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$edit_show = DB::getconnection()->query("
      SELECT id
      , name, length, description
      FROM courses 
      WHERE id = '$id' 
      ");

  echo "
    <form action='../project/ChangesManager.php' method='POST'>
    <input type='hidden' name='action' value='updateCourse'>
  ";

echo "<input type='hidden' name='old_course' value='". $id ;  
echo "'>";

  while ($row = $edit_show->fetch_assoc()) {
    foreach ($row as $key => $value) {
      echo "
      <span class='bold'>$key: </span><input type='text' name='$key' placeholder='$value'><br>
      ";
    }
  } 

  echo "
  <input type='submit' value='save'>
  </form>
  ";

    break;

    case 'delete':

    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

echo 'delete Course number: ' . $id   ." ?";  
  echo "
    <form action='../project/ChangesManager.php' method='POST'>
    <input type='hidden' name='action' value='delete_course'>
  ";
 
echo "<input type='hidden' name='old_id' value='". $id ;  
echo "'>";

  echo "
  <input type='submit' value='delete'>
  </form>
  ";

    break;
          } 


  switch ($_GET['admin']) {

case 'show':
  
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    $admin_show = DB::getconnection()->query("
      SELECT id, name, last_name, email ,phone, birthday, img, permission 
      FROM admins 
      JOIN permissions ON permissions.permission_id = admins.permission
      WHERE id = '$id' 
      ");
        while ($row = $admin_show->fetch_assoc()) {
                      echo "
            <div class= 'show_admin'>
            <h2>Admin:</h2>
            "; 

              foreach ($row as $key => $value) {
               echo "<span class='bold'> $key: </span> <span> $value </span> <br>";
              }
      
            echo "
              <img class='userPhotoBig' alt='user photo' src='../img/uploads/admins/"
              . $row['img']
              . "' >
              ";


  if ($id == '26549477') {
               
if ($_SESSION['permission_id'] == '1' ) {

            echo " <a href='?subject=school&admin=edit&id="
            . $row['id']
            . "'> <div  class ='edit_admin"
            . $row['id']
            . "'> edit admin </a>"
            ."</div>"
            ; 

}else{

echo "<br><span class='permissionError'> edit Admin - You dont have a permission to Edit </span>";
}

}else{
            echo " <a href='?subject=administration&admin=edit&id="
            . $row['id']
            . "'> <div  class ='edit_admin"
            . $row['id']
            . "'> edit admin </a>"
            ."</div>"
            ; 
}



    if ($id == '26549477') {

echo "<br><span class='permissionError'> delete Admin - You dont have a permission to Delete </span>";

}else{
                   echo " <a href='?subject=administration&admin=delete&id="
                   . $row['id'] 
                   . "'> <div  class ='delete_admin"
                   . $row['id']
                   . "'> delete admin  </a> "
                   . '</div>'
                   ; 
}

        }

  break;

case 'edit':

    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
 $edit_show = DB::getconnection()->query("
      SELECT id, phone, email, name, last_name, birthday, password
      FROM admins 
      WHERE id = '$id' 
      ");


  echo 'edit Admin number: ' . $id  ;  
  echo "
    <form action='../project/ChangesManager.php' method='POST'>
    <input type='hidden' name='action' value='updateAdmin'>

  ";
 
 echo "<input type='hidden' name='old_id' value='". $id  ;  
 echo "'>";

  while ($row = $edit_show->fetch_assoc()) {

    foreach ($row as $key => $value) {
      echo "
      <span class='bold'>$key: </span><input type='text' name='$key' placeholder='$value'><br>
      ";
    }
  }

  echo "
  <input type='submit' value='save'>
  </form>
  ";


   break;


case 'delete':

    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

echo 'delete Admin number: ' . $id   ." ?";  
  echo "
    <form action='../project/ChangesManager.php' method='POST'>
    <input type='hidden' name='action' value='delete_admin'>
  ";
 
echo "<input type='hidden' name='old_id' value='". $id  ;  
echo "'>";

  echo "
  <input type='submit' value='delete'>
  </form>
  ";


 break;

   }

?>
