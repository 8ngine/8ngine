<!DOCTYPE html>
<html>
<head>
	<title>Append to CSV File</title>
</head>
<body>
	<h1>Append to CSV File</h1>
	<form method="POST">
		<label for="name">Name:</label>
		<input type="text" name="name" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="phone">Phone:</label>
		<input type="tel" name="phone"><br>

		<button type="submit">Submit</button>
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			$data = array(
				array($name, $email, $phone)
			);

			$file = fopen('data.csv', 'a');
			foreach ($data as $row) {
				fputcsv($file, $row);
			}
			fclose($file);

			echo '<p>Data successfully added to CSV file.</p>';
		}
	?>
</body>
</html>
