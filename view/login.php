<?php session_start(); 
session_destroy();
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


<div class="container centered">
	
	<?php include 'in_all_pages/header.php'; ?>
	<?php include '../project/msgAPI.php' ?>

		    	<div class="row container centered shadow bg" >
		    		<div id="loginForm"   class="col-md-12 " >

<form action="../project/api.php" method="POST">
	
<input type="hidden" name="action" value="login">
	<label>Email:
		<input type="email" name="email" placeholder="email" required>
	</label>
	<label>Password:
		<input type="password" name="password" placeholder="password" required>
	</label>
	<label>
			<input type="submit" value="Get In">
	</label>


</form>
<!-- <label><a href="#" target="_blank">Forgot Password</a></label> -->
</div>
</div>


<!-- <?php include 'in_all_pages/footer.php'; ?> -->

</div>


</body>
</html>