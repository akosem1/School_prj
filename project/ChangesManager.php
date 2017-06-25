
<?php include '../lib/DB.connect';?>
 
<?php 
include '../lib/extends/ISavable.php';
include '../lib/extends/Course.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo 'Please send it by POST'; die();
}

switch ($_POST['action']) {
	case 'create_new_student':
	createStudent();
	header("Location: ../view/home.php?subject=school&msg=created");
		break;

	case 'create_new_admin':
	createAdmin();
	header("Location: ../view/home.php?subject=administration&msg=created");
		break;
	case 'create_new_course':
		createCourse();
		header("Location: ../view/home.php?subject=school&msg=created");
		break;	
	case 'updateStudent':
		updateStudent();
		header("Location: ../view/home.php?subject=school&msg=edited");
		break;	
	case 'updateCourse':
		updateCourse();
	 	header("Location: ../view/home.php?subject=school&msg=edited");
		break;	
	case 'updateAdmin':
		updateAdmin();
		header("Location: ../view/home.php?subject=school&msg=edited");
		break;	
	case 'delete_student':
		deleteStudent();
		header("Location: ../view/home.php?subject=school&msg=deleted");
		break;	
	case 'delete_course':
		deleteCourse();
		header("Location: ../view/home.php?subject=school&msg=deleted");
		break;	
	case 'delete_admin':
		deleteAdmin();
		header("Location: ../view/home.php?subject=administration&msg=deleted");
		break;	

	default:
		# code...
		break;
}

function createStudent() {

	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
	$course_id = filter_var($_POST['course_id'], FILTER_SANITIZE_STRING);
	
	$image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
	$target_dir = "../img/uploads/students/";
	
	savePic ('pic',$target_dir,$id);
	
	$FileExtension = substr($image, -4, 4);
	$new_file_name = $id . $FileExtension;

	$stmt = DB::getconnection()->prepare("
		INSERT INTO students (id, name, phone, age, course_id, img)
		VALUES (?, ?, ?, ?, ?, ?)
		");
		$stmt->bind_param('ssssis',  $id, $name, $phone, $age, $course_id, $new_file_name);
		$stmt->execute();
}

function createCourse() {

	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$length = filter_var($_POST['length'], FILTER_SANITIZE_STRING);
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	
	$image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
	$target_dir = "../img/uploads/courses/";
	
	savePic ('pic',$target_dir,$id);
	
	$FileExtension = substr($image, -4, 4);
	$new_file_name = $id . $FileExtension;
	
	$Course = new Course($id, $name, $length, $new_file_name, $description);
	$Course->save();
}

function createAdmin() {

	$permission = filter_var($_POST['permission'], FILTER_SANITIZE_STRING);
	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);

	$password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
 
	$image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
	$target_dir = "../img/uploads/admins/";
	
	savePic ('pic',$target_dir,$id);
	
	$FileExtension = substr($image, -4, 4);
	$new_file_name = $id . $FileExtension;

	$stmt = DB::getconnection()->prepare("
		INSERT INTO admins (id, password,  name, last_name, email ,phone, birthday, img, permission)
		VALUES (?, ?, ? ,?,?,?,?,?,?)
		");
	$stmt->bind_param('sssssissi', $id , $password,   $name , $last_name , $email ,$phone,$age, $new_file_name ,$permission);
	$stmt->execute();
}

function updateStudent(){

	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
	$getid = filter_var($_POST['old_id'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
	$course_id = filter_var($_POST['course_id'], FILTER_SANITIZE_STRING);
	
	$image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
	$target_dir = "../img/uploads/students/";
	
	savePic ('pic',$target_dir,$id);
	
	$FileExtension = substr($image, -4, 4);
	$new_file_name = $id . $FileExtension;

	$stmt = DB::getconnection()->prepare("UPDATE students SET id = ?, phone = ?, age = ?, name =?, course_id = ?, img = ?
         WHERE id = '$getid'  ");
        $stmt->bind_param('ssssis', $id, $phone, $age, $name, $course_id, $new_file_name);
        $stmt->execute();

}

function updateCourse(){

	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
	$getcourse = filter_var($_POST['old_course'], FILTER_SANITIZE_STRING);
	$length = filter_var($_POST['length'], FILTER_SANITIZE_STRING);
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	
	
	$stmt = DB::getconnection()->prepare("UPDATE courses SET id = ?, name = ?, length = ?, description = ?
	WHERE id = '$getcourse'  ");
		$stmt->bind_param('isis', $id, $name, $length, $description);
        $stmt->execute();
}

function updateAdmin(){
	
	$getid = filter_var($_POST['old_id'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
	$birthday = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
	$password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

	$stmt = DB::getconnection()->prepare("UPDATE admins SET id = ?, phone = ?, email = ?, name = ? , last_name = ? , birthday = ?, password = ?
	WHERE id = '$getid'  ");
        $stmt->bind_param('sssssss', $_POST['id'], $_POST['phone'], $_POST['email'], $_POST['name'], $_POST['last_name'], $_POST['birthday'], $password);
        $stmt->execute();
}

function deleteStudent(){
	$getid = filter_var($_POST['old_id'], FILTER_SANITIZE_STRING);
    $student_delete = DB::getconnection()->query("
        DELETE FROM 
        students 
        WHERE students.id = '$getid' 
      ");
}

function deleteCourse(){
	$getid = filter_var($_POST['old_id'], FILTER_SANITIZE_STRING);
    $course_delete = DB::getconnection()->query("
        DELETE FROM 
        courses 
        WHERE courses.id = '$getid' 
      ");
}

function deleteAdmin(){
	$getid = filter_var($_POST['old_id'], FILTER_SANITIZE_STRING);
    $admin_delete = DB::getconnection()->query("
        DELETE FROM 
        admins 
        WHERE admins.id = '$getid' 
      ");
}

function savePic ($pic, $target_dir,$id){

	$file_name = filter_var($_FILES[$pic]['name'], FILTER_SANITIZE_STRING);
	$FileExtension = substr($file_name, -4, 4);
	$new_file_name = $id . $FileExtension;


// $file_name_to_delete = $file_name . $FileExtension;
unlink ( $target_dir . $new_file_name );
    $target_file = $target_dir . $new_file_name;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES[$pic]['tmp_name'], $target_file );
   return  $new_file_name;  
};
