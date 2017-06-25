
<?php include '../project/SESSION_handler.php' ?>

<header dir="rtl">

<div class="container centered shadow bg">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h1>
				<img id="logo"  src="../img/logo.png" alt="LOGO">
				  High School To Technology
			</h1>
<nav>
	<?php 
		if ($_SESSION['permission_id'] == '' ) {
			echo '<div id="sessionCheck" style="display:none">';
		}
	?>

	<div id="sessionCheck" >
		<div id="links">
			<?php 
				echo ' <div class="sep">|</div>
					<a href="http://localhost/school_32/view/home.php?subject=school" class="bold_str">School</a>
				';
					if ($_SESSION['permission_id'] == '1' || $_SESSION['permission_id'] == '2') {
						echo ' <div class="sep">|</div>
							<a href="http://localhost/school_32/view/home.php?subject=administration" class="bold_str">Administration</a>
						';
					}		
			?>
		</div>
	
		<div class="sep">|</div>
		<div id="profile" dir="ltr">
			<span>wellcome</span>
			<div id="profile_name" class="bold_str"><?php echo $_SESSION['admin_name']; ?></div>
			<div id="profile_last_name" class="bold_str"><?php echo $_SESSION['admin_last_name']; ?></div>
			<span>, your login as: </span>
			<div id="permission_id" class="bold_str"><?php echo $_SESSION['permission_name']; ?></div>	
			<div id="profile_img">
				<?php 
					if (!$_SESSION['permission_id'] == ''){
					$email = $_SESSION['email'] ;
					$result = DB::getconnection()->query("SELECT id, img FROM admins WHERE email = '$email'  ");
						while ($row = $result->fetch_assoc()) {
							echo " <a href='?subject=administration&admin=show&id="
						    	. $row['id']
						    	.   "'> <div  class ='j "
						    	. $row['id']
						    	. "'>  " ; 
							echo "
								<img class='userPhotoHeader' alt='profile_img' src='../img/uploads/admins/"
								. $row['img']
								. "' >"
								. "</a>
								";
						}
					}
				 ?>
			</div>	
		</div>	
		<div class="sep">|</div>
		<div id="logout">
			<form action="../project/api.php" method="GET">
				<input type="submit" name="action" value="logout" class="btnDesigned">
			</form>					
		</div>
	</div>
		<?php echo '</div>'; ?>
</nav>

		</div>
	</div>
</div>

</header>

