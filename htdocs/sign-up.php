<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		/* input
		{
			background-color: #D8DEE1;
			margin-left: 5%;
		} */
	</style>
    <hr>
	<?php
		if(!isset($_POST['username']))
		{
				echo '
					<form action = "/index.php" method = "POST">
					<center>
					<h2> Username  : <input type="text" name="username" required> </h2>
					<h2> Password : <input type="password" name="password" required> </h2>
                    <input type = "text" name = "process_sign_up" value = "yes" hidden = "true">
					<input type="submit" value="Submit">
					</center>
					</form>
				';
		}
		else
		{
			echo "No do the storing part";
		}
	?>
</body>
</html>