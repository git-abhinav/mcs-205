<html>
    <head>  
        <title>
            PeaceLily
        </title>
    </head>
    <body>
        <style type="text/css">
		input
		{
			background-color: #D8DEE1;
			margin-left: 5%;
		}
	    </style>    
        <?php
            echo '
                <form action = "/index.php" method = "POST">
                    <center>
					<h2> Username  : <input type="text" name="username" required> </h2>
					<h2> Password : <input type="password" name="password" required> </h2>
					<br>
					<input type="submit" value="Submit">
					</center>
                </form>
            ';
        ?>
    </body>
</html>