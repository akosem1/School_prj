
<form action="../project/ChangesManager.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="action" value="create_new_admin">
				<input type="hidden" name="permission" value="2">

		<label class="bold"> Id:
			<input type="text" name="id" placeholder="ID" required>
		</label>
		<label class="bold"> Password:
			<input type="text" name="password" placeholder="password" required>
		</label>		
		<label class="bold"> Name:
			<input type="text" name="name" placeholder="Name" required>
		</label>
		<label class="bold"> Last name:
			<input type="text" name="last_name" required>
		</label>
		<label class="bold"> Email:
			<input type="email" name="email" placeholder="email" required>
		</label>


		<label class="bold"> Phone:
			<input type="text" name="phone" placeholder="Phone" required>
		</label>
		<label class="bold"> Age:
			<input type="text" name="age" placeholder="2000/01/01" required>
		</label>
		<label>
			<input type="file" accept="image/*" name="pic">
		</label>
		
		<input type="submit" value="Create">
	</form>
