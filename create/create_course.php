
<form action="../project/ChangesManager.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="action" value="create_new_course">
		<label class="bold"> Id:
			<input type="number" name="id" maxlength="4" placeholder="ID" required>
		</label>
		<label class="bold"> Name:
			<input type="text" name="name" placeholder="Name" required>
		</label>
		<label class="bold"> Length:
			<input type="number" name="length" maxlength="3" placeholder="Length" required>
		</label>

		<label class="bold"> Description:
			<input type="text" name="description" placeholder="Description" required>
		</label>

		<label>
			<input type="file" accept="image/*" name="pic">
		</label>
 
		<input type="submit" value="Create">
	</form>

