
<form action="../project/ChangesManager.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="action" value="create_new_student">
		<label class="bold"> Id:
			<input type="text" name="id" placeholder="ID"  required>
		</label>
		<label class="bold"> Name:
			<input type="text" name="name" placeholder="Name" required>
		</label>
		<label class="bold"> Phone:
			<input type="text" name="phone" placeholder="Phone" required>
		</label>
		<label class="bold">Age:
			<input type="text" name="age" placeholder="2000/01/01" required>
		</label>

		<label class="bold"> Course:
			<?php echo createSelect($courses, 'course'); ?>
		</label>

				<label>
			<input type="file" accept="image/*" name="pic">
		</label>

		<input type="submit" value="Create">
	</form>
	
