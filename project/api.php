<?php session_start();
include '../lib/DB.connect';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	switch ($_GET['action']) {
		case 'logout':
			logout();
			break;	

		default:
			# code...
			break;
	}
}

switch ($_POST['action']) {
	case 'login':
		login();
		break;

	default:
		# code...
		break;
}

function login() {
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$knkn = DB::getconnection()->query("
		SELECT password 
		FROM admins
		WHERE email = '$email'
	");
	while ($row = $knkn->fetch_assoc()) {
	$pass = $row['password'];
}

$stmt = DB::getconnection()->prepare("
	SELECT  
		admins.email as email,
		permissions.permission_id as permission_id,
		permissions.name_permission as name_permission,
		admins.name as admin_name,
		admins.last_name as admin_last_name
    FROM admins
	JOIN permissions ON permissions.permission_id = admins.permission
	where email = ?  
   	");

 	$stmt->bind_param('s', $email);
 	$stmt->execute();
	$stmt->bind_result($email, $permission_id,$permission_name,$admin_name,$admin_last_name);
 	$stmt->fetch();
 
if (password_verify($password, $pass)) {

	 	$_SESSION['email'] = $email;
	 	$_SESSION['permission_id'] = $permission_id;
	   	$_SESSION['permission_name'] =  $permission_name;
	   	$_SESSION['admin_name'] =  $admin_name;
	   	$_SESSION['admin_last_name'] =  $admin_last_name;


	 	header("Location: ../view/home.php?subject=school");
	 } else {
	 	header("Location: ../view/login.php?msg=errorx97151t");
	 }
}

function logout() {
	session_destroy();
	header("Location: /school_32/view/login.php");
}



 
