<html>
    <head>
        <title>
            PeaceLily
        </title>
        <?php
        session_start();
        ?>
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="icon" type="image/gif/png" href="icon/peacelily.png">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
        <style type="text/css" >
            body 
            {
                font-family : 'Ubuntu', sans-serif;
            }
            a
            {
             text-decoration: none;
            }
        </style>
    </head>
    <body>
        <?php
        	$correct_username = "";
        ?>
        <h1>
            <center>
                <a href = "https://peacelily.ml" style = "color: black"> 𝓟𝓮𝓪𝓬𝓮𝓛𝓲𝓵𝔂 </a>
            </center>
        </h1>
        <div class="top">
            <img src = "images/anime.gif" height="100%" style="float: left;">
            <img src = "images/anime.gif" height="100%" style="float:right;">
        </div>
        <div class="left">
            <center>
                <h2>
                    𝓒𝓪𝓽𝓮𝓰𝓸𝓻𝔂
                </h2>
                <hr>
                <br><br>
                <a href="https://peacelily.ml/?query=plants"> Buy plants </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=seeds"> Buy Seeds </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=pots"> Buy Pots </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=compost"> Buy Compost </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=perlite"> Buy Perlite </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=vermiculite"> Buy Vermiculite </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=potting_mix"> Buy Potting Mix</a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=tools"> Buy Tools </a>
            </center>
        </div>
        <div class="right">
            <center>
                <h2>
                    𝓒𝓾𝓼𝓽𝓸𝓶𝓮𝓻 𝓒𝓸𝓻𝓷𝓮𝓻
                </h2>
                <hr>
                <br>
                <a href="https://peacelily.ml/?query=vip-user"> 
                	<b> 
                		VIP-Corner 
                	</b> 
                </a>
                <br><br><br>
                <!-- <a href="https://peacelily.ml/?query=problems"> Problems </a> -->
                <a href="https://peacelily.ml/?query=discussion"> Discussion </a>
                <br><br><br>
                <hr>
                    <h2>
                        More
                    </h2>
                <hr>
                <br><br>
                <a href="#"> Gravels </a>
                <br><br><br>
                <a href="#"> Bottles </a>
            </center>
        </div>
        <div class="main">
            <center>
                <?php
                    if(isset($_GET['query']))			//for normal query string selection
                    {
                        if($_GET['query'] == 'sign-up')
                        {
                           include('sign-up.php');
                        }
                        else if($_GET['query'] == 'sign-in')
                        {
                            include('sign-in.php');
                        }
                        else if($_GET['query']=='view-portal')
                        {
                            if(isset($_SESSION['log-in-user']) && !isset($_SESSION['vip_loged_in']))
                            {
                                echo "<hr>";
                                echo "<h1> Greetings of the day - ".$_SESSION['log-in-user']."</h1>";
                                include('view-portal.php');
                            }
                            else 
                            {
                                echo '
                                    <h1> Firt get the session from the server </h1>
                                    <img src = "/403-Forbidden-Error.png">
                                ';
                            }
                        }
                        else if($_GET['query']=='vip-user')
                        {
                            if(!isset($_SESSION['vip_loged_in']))
                                include("vip.php");
                            else 
                            {
                                echo 
                                '
                                    <h2>
                                        <hr>
                                        Ask your question here.
                                        <form action = "index.php" method = POST>
                                            <input type = "text" name = "process_question" hidden = true value = "yes">
                                            <input type = "text" name = "question_asked_by" hidden = true value = '.$_SESSION['log-in-user'].'>
                                            <br>
                                            <input type = "text" name="question" required = true>
                                            <br><br>
                                            <input type = "submit" value = "Ask">
                                        </form>        
                                    <h2>
                                ';
                            } 
                        }
                        else if($_GET['query'] == "discussion")
                        {
                            include("discussion.php");
                            if(isset($_POST['answer']))
                            {
                            	// echo $_POST['answer'];
                            	// echo "<br>";
                            	// echo $_POST['question_id'];
                            	// echo "<br>";
                            	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
		                        if (mysqli_connect_errno())
									echo "Failed to connect to MySQL: " . mysqli_connect_error();

// 								UPDATE Customers
// SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
// WHERE CustomerID = 1;

								$q = 'UPDATE question_table SET answer = "'.$_POST['answer'].'"  WHERE question_id = "'.$_POST['question_id'].'"';
								// echo $q;
								$result = mysqli_query($con,$q);
								echo '
									<a href = "https://peacelily.ml/?query=discussion"> View Discussion </a>
								';

                            }
                            if(isset($_POST['view-answer']))
                            {
                            	// echo "View answer-".$_POST['question_id'];
                            	echo 
	                            	'
	                            		<font style="color:green">
	                            			<h2>	
	                            				Answer is :-
	                            			</h2>
	                            		</font>

	                            	';

	                            $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
		                        if (mysqli_connect_errno())
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								$q = 'SELECT answer FROM question_table WHERE question_id = "'.$_POST['question_id'].'"';
								$result = mysqli_query($con,$q);
								$row = $result->fetch_assoc();
								if($row['answer'])
									echo $row['answer'];
								else 
									echo "No Answer yet";




                            }

                        }
                        else if($_GET['query'] == "problems")
                        {
                            echo '<hr>';
                            echo 
                            '
                                Problems page.
                            ';
                        }
                        else if($_GET['query'] == 'orders')
                        {
                        	echo "<hr>";
                        	if($_SESSION['user_type'] == "Customer")
                        	{

                        		$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
		                        if (mysqli_connect_errno())
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								$q = 'SELECT * FROM order_table WHERE buyer_name = "'.$_SESSION['log-in-user'].'";';

								$result = mysqli_query($con,$q);

								

								while ($row = $result->fetch_assoc()) 
								{	
									$all_plants = mysqli_query($con,'SELECT name, url from plant_table WHERE plant_id = "'.$row['plant_id'].'"');
									$all_plants = $all_plants->fetch_assoc();
									echo 
									    '
									    	<h2>
									    		 Name - '.$all_plants['name'].' <img src = "'.$all_plants['url'].'" height = 100px width = 100px>
									    	<h2>
									    ';
									echo "<br>";
								}
							}
                        	else
                        	{
                        		echo '
                        			Sign in first
                        		';
                        		echo '<br>';
                        		include("sign-in.php");
                        	}
                        }


                        /*
                        <a href="https://peacelily.ml/?query=plants"> Buy plants </a>
                		<br><br><br>
		                <a href="https://peacelily.ml/?query=seeds"> Buy Seeds </a>
		                <br><br><br>
		                <a href="https://peacelily.ml/?query=pots"> Buy Pots </a>
		                <br><br><br>
		                <a href="https://peacelily.ml/?query=compost"> Buy Compost </a>
		                <br><br><br>
		                <a href="https://peacelily.ml/?query=perlite"> Buy Perlite </a>
		                <br><br><br>
		                <a href="https://peacelily.ml/?query=vermiculite"> Buy Vermiculite </a>
		                <br><br><br>
		                <a href="https://peacelily.ml/?query=potting_mix"> Buy Potting Mix</a>
		                <br><br><br>
		                <a href="https://peacelily.ml/?query=tools"> Buy Tools </a>
                        */

		                else if($_GET['query'] == "plants")
		                {
		                	echo "<hr>";
		                	echo '<h1>Plants</h1>';

		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."plants".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								if(!$row['name'])
				                {	
				                	echo "<h1>";
				                	echo "No item in this category";
									echo "</h1>";
								}
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
				                
														
							}



		                }
		                else if($_GET['query'] == "seeds")
		                {
		                	echo "<hr>";
		                	echo '<h1>Seeds</h1>';	

		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."seeds".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								if(!$row['name'])
				                {	
				                	echo "<h1>";
				                	echo "No item in this category";
									echo "</h1>";
								}
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
				                if(!$row['name'])
				                {	
				                	echo "<h1>";
				                	echo "No item in this category";
									echo "</h1>";
								}
														
							}

		                }
		                else if($_GET['query'] == "pots")
		                {
		                	echo "<hr>";
		                	echo '<h1>Pots</h1>';

		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."pots".'"';
							$flag = "unset";
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$flag = "set";
								$name = $row['name'];
								if($name=="");
				                {	
				                	echo "<h1>";
				                	echo "No item in this category";
									echo "</h1>";
								}
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
				                if($flag=="unset")
				                {	
				                	echo "<h1>";
				                	echo "No item in this category";
									echo "</h1>";
								}
														
							}

		                }
		                else if($_GET['query'] == "compost")
		                {
		                	echo "<hr>";
		                	echo '<h1>Compost</h1>';
		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."compost".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
														
							}

		                }
		                else if($_GET['query'] == "perlite")
		                {
		                	echo "<hr>";
		                	echo '<h1>Perlite</h1>';

		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."perlite".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
														
							}

		                }
		                else if($_GET['query'] == "vermiculite")
		                {
		                	echo "<hr>";
		                	echo '<h1>Vermiculite</h1>';

		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."Vermiculite".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
														
							}

		                }
		                else if($_GET['query'] == "potting_mix")
		                {
		                	echo "<hr>";
		                	echo '<h1>Potting Mix</h1>';
		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."potting_mix".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
														
							}

		                }
		                else if($_GET['query'] == "tools")
		                {
		                	echo "<hr>";
		                	echo '<h1>To`ols</h1>';
		                	$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
	                        if (mysqli_connect_errno())
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							$q = 'SELECT * FROM plant_table WHERE category = "'."tools".'"';
							$result = mysqli_query($con, $q);
							while($row = $result->fetch_assoc())
							{
								$name = $row['name'];
								$price = $row['price'];
								$link = $row['url'];
								$id = $row['plant_id'];
								echo '
				                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
				                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
				                                            <img src = '.$link.'
				                                            height = "100px" width = "100px">
				                                        </a>
				                                        Price: ₹'.$price.'
				                                    </div> 
				                            ';
														
							}

		                }
                    }
                    if(isset($_POST['process_sign_up']) == "yes")
                    {
                        echo '<h1> Creating account </h1> ';
                        echo '<hr>';
                        echo "<h2>"."Username is : ".$_POST['username']."<h2>";
                		echo "<h2>"."Password is : ".$_POST['password']."<h2>";

                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        $q = "INSERT INTO username_password(username, password, account_type) VALUES(".'"'.$_POST['username'].'"'.",".'"'.$_POST['password'].'", "'.$_POST['account_type'].'")';
                        echo "<h1>"."Account Successfully Created :) "."</h1>";
                        echo "<h2> Now Try log-in </h2>";
                        mysqli_query($con,$q);
                    }
                    else if(isset($_POST['process_sign_in']) == "yes")
                    {
                        $u = $_POST['username'];
                        $p = $_POST['password'];
                        echo "<hr>";
                        echo "<h1> Checking username and password in the database <h1> ";
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        $q = "SELECT * FROM username_password WHERE username = ".'"'.$u.'"'." and password = ".'"'.$p.'"';
                        $result = mysqli_query($con, $q);
                        if(mysqli_num_rows($result)>=1)
                        {
                            echo "<h1>Login credentials are correct</h1>";
                            echo "<h1>Creating session on the server <h1>";
                            $correct_username = $u;
                            $_SESSION['log-in-user'] = $u;
                            $row = $result->fetch_assoc();
                            $_SESSION['user_type'] = $row['account_type'];
                            // echo '<h1>'.$_SESSION['user_type'].'</h1>';
                            if($_SESSION['user_type'] == "Seller")
	                        {    
	                        	echo 
    	                        	'
    	                                <a href = "https://peacelily.ml/?query=view-portal"> Click for client area </a>
            	                    ';
            	            }
	                        if($_SESSION['user_type'] == "Customer")
	                        {	
	                        	echo 
     	                        	'
     	                        		<a href = "https://peacelily.ml?query=orders"> View Orders </a>
     	                        	'; 
     	                    } 
                            
                        }
                        else{
                            echo "Incorrect username or password";
                            echo "</h1>";
                            include("sign-in.php");
                            echo "</h1>";
                        }
                    }
                    else if($_POST['process-vip'] == "sign-up")
                    {
                        echo "<hr>";
                        $u = $_POST['vip-username'];
                        $p = $_POST['vip-password'];

                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        
                        $q = "INSERT INTO vip_table(username, password) VALUES(".'"'.$u.'"'.",".'"'.$p.'")';
                        echo "<h1>"."Account Successfully Created :) "."</h1>";
                        echo "<h2> Now Try log-in </h2>";
                        echo "<br>";
                        mysqli_query($con,$q);
                        echo '
                            <h2>
                                <form action = "index.php" method = "POST">
                                    Username <input type = "password" name = "vip-username" required = true>
                                    <br>
                                    Password <input type = "password" name = "vip-password" required = true>
                                    <input type = "text" name = "process-vip" value = "sign-in" hidden = true>
                                    <br><br>
                                    <input type = "submit" value = "Log-in">
                                </form>
                            <h2>
                        ';
                    }
                    else if($_POST['process-vip'] == "sign-in")
                    {
                        echo "<hr>";


                        // echo "Now process the sign in part";
                        $u = $_POST['vip-username'];
                        $p = $_POST['vip-password'];
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        $q = "SELECT * FROM vip_table WHERE username = ".'"'.$u.'"'." and password = ".'"'.$p.'"';
                        $result = mysqli_query($con, $q);
                        if(mysqli_num_rows($result)>=1)
                        {
                            echo "<h1>Login credentials are correct</h1>";
                            echo "<h1>Session created on the server<h1>";
                            header('Location: '."https://peacelily.ml/?query=vip-user");
                            $correct_username = $u;
                            $_SESSION['log-in-user'] = $u;
                            $_SESSION['vip_loged_in'] = $u;
                            
                        }
                        else{
                            echo 
                            '
                                <h2>
                                    <font style = "color: red"> 
                                        Incorrect username or password
                                        <br>
                                        Try again
                                        <br>
                                    </font>
                                    <form action = "index.php" method = "POST">
                                        Username <input type = "password" name = "vip-username" required = true>
                                        <br>
                                        Password <input type = "password" name = "vip-password" required = true>
                                        <input type = "text" name = "process-vip" value = "sign-in" hidden = true>
                                        <br><br>
                                        <input type = "submit" value = "Log-in">
                                    </form>
                                </h2>
                            ';                        
                        }
                    }
                    else if(isset($_POST['process_question']))
                    {
                        echo "<hr>";
                        // echo 'Question is asked by - '.$_POST['question_asked_by'];
                        // echo "<br>";
                        // echo 'Question is - '.$_POST['question'];
                        // echo "<br>";
                        echo '
                        	<font style = "color:green">
                        		<h1>
                        			Adding Question to discussion corner
                        			<br>
                        		</h1>
                        	</font>
                        	';
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						$q = 'INSERT INTO question_table(question, asked_by) VALUES("'.$_POST['question'].'", "'.$_SESSION['log-in-user'].'")';
						$result = mysqli_query($con,$q);
						echo "Question added";
						echo '
							<a href = "https://peacelily.ml/?query=discussion"> View Discussion </a>
						';
						// echo $q;

                    }

                    if($_REQUEST['btn_submit']=="Add products")
                    {
                        include("view-portal.php");
                        echo "<h2> Enter new product details </h2> ";
                        echo '  
                                <div allign = "left">
                                    <form action = "index.php" method = "POST">
                                        Enter plant name : <input type = "text" name = "plant_name" required = TRUE style = "margin-left: 4.5%">
                                        <br>
                                        Enter plant price : <input type = "number" name = "plant_price" requiered = TRUE style = "margin-left: 5%">
                                        <br>
                                        <h2> 
                                            Category <br>
                                        </h2>
                                        <div style = "text-allign: left">
                                            <input type = "text" name = "seller_name" value = '.$_SESSION['log-in-user'].' hidden = TRUE>
                                            <input type="radio" name="item_type" value="plants" checked> Plant <br>
                                            <input type="radio" name="item_type" value="seeds" > Seeds <br>
                                            <input type="radio" name="item_type" value="plots" > Pots <br>
                                            <input type="radio" name="item_type" value="compost" > Compost <br>
                                            <input type="radio" name="item_type" value="perlite" > Perlite <br>
                                            <input type="radio" name="item_type" value="vermicompost" > Vermicompost <br>
                                            <input type="radio" name="item_type" value="potting_mix" > Potting Mix <br>
                                            <input type="radio" name="item_type" value="tools" > Tools <br>
                                            <br>
                                        </div>
                                        Enter link of your image : <input type = "text" name = "image_url">
                                        <br><br>
                                        <input type="submit" value="Add item">
                                    </form>
                                </div>
                            ';
                    }
                    else if($_REQUEST['btn_submit']=="View Orders")
                    {
                        include("view-portal.php");
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						$q = 'SELECT * FROM order_table WHERE seller_name = "'.$_SESSION['log-in-user'].'";';
						$result = mysqli_query($con,$q);
						echo "<hr>";
						echo '

								<font style="col:green">
                                    <div style = "width:60%;height:10%">
                                        <div style = "width:30%;float:left">
                                            <font style = "color: black">
                                                <h3>Imgage</h3>
                                            </font>
                                        </div>
                                        <div style = "width:35%; text-allign:center;float:left">
                                            <font style = "color: black">
                                                <h3>Name</h3>
                                            </font>
                                        </div>
                                        <div style = "width:30%;float:left">
                                            <font style = "color: black">
                                                <h3>Address</h3>
                                            </font>
                                        </div>
                                    </div>
                                </font>
                                <br>

							';
						while($row = $result->fetch_assoc())
						{

							$all_plants = mysqli_query($con,'SELECT name, url from plant_table WHERE plant_id = "'.$row['plant_id'].'"');
							$all_plants = $all_plants->fetch_assoc();
							echo '

								<font style="col:green">
                                    <div style = "width:60%;height:10%">
                                        <div style = "width:30%;float:left">
                                            <font style = "color: black">
                                                <h3> <img src = "'.$all_plants['url'].'" height = 50px width = 50px></h3>
                                            </font>
                                        </div>
                                        <div style = "width:35%; text-allign:center;float:left">
                                            <font style = "color: black">
                                                <h3>'.$row['buyer_name'].'</h3>
                                            </font>
                                        </div>
                                        <div style = "width:30%;float:left">
                                            <font style = "color: black">
                                                <h3>'.$row['buyer_address'].'</h3>
                                            </font>
                                        </div>
                                    </div>
                                </font>
                                <br>
                                <br>


							';

						}


                        
                    }
                    else if($_REQUEST['btn_submit'] == "Your plants")
                    {
                        include('view-portal.php');
                        echo '<hr>';
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        $sql = '
                            SELECT name,price,url 
                            FROM  plant_table
                            WHERE added_by =  "'.$_SESSION['log-in-user'].'"
                        ';
                        $result = $con->query($sql);
                        if($result->num_rows > 0)
                        {
                            echo 
                            '
                                <font style="col:green">
                                    <div style = "width:60%;height:10%">
                                        <div style = "width:30%;float:left">
                                            <font style = "color: green">
                                                <h3>Name</h3>
                                            </font>
                                        </div>
                                        <div style = "width:35%; text-allign:center;float:left">
                                            <font style = "color: green">
                                                <h3>Price</h3>
                                            </font>
                                        </div>
                                        <div style = "width:30%;float:left">
                                            <font style = "color: green">
                                                <h3>Link</h3>
                                            </font>
                                        </div>
                                    </div>
                                </font>
                                <br>
                            ';
                            
                            while($row = $result->fetch_assoc())
                            {
                                echo '
                                    <div style = "width:60%;height:10%">
                                        <div style = "width:30%;float:left">
                                            '.$row['name'].'
                                        </div>
                                        <div style = "width:35%; text-allign:center;float:left">
                                            ₹'.$row['price'].'
                                        </div>
                                        <div style = "width:30%;float:left">
                                            <img src = '.$row['url'].' height = 40px width 40px>
                                        </div>
                                    </div>
                                    <br>
                                ';

                            }
                        }
                        else
                            echo "No record found";
                    }
                    if(isset($_POST['plant_name']))
                    {
                        include("view-portal.php");
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        $q = 'INSERT INTO plant_table(name, price, category, url, added_by) VALUES("'.$_POST['plant_name'].'", "'.$_POST['plant_price'].'", "'.$_POST['item_type'].'", "'.$_POST['image_url'].'", "'.$_SESSION['log-in-user'].'")';
                        $result = mysqli_query($con, $q);
                        echo '<font style = "color: green">';
                        echo $_POST['plant_name']." added, under the name -".$_SESSION['log-in-user'];
                        echo '<font>';
                    }
                    $actual_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if($actual_url == "https://peacelily.ml/")
                    {
                        echo "<hr>";
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						$q = 'SELECT * FROM plant_table';
						$result = mysqli_query($con, $q);
						while($row = $result->fetch_assoc())
						{
							$name = $row['name'];
							$price = $row['price'];
							$link = $row['url'];
							$id = $row['plant_id'];
							echo '
			                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">
			                                        <a href = "https://peacelily.ml/?id='.$id.'"> 
			                                            <img src = '.$link.'
			                                            height = "100px" width = "100px">
			                                        </a>
			                                        Price: ₹'.$price.'
			                                    </div> 
			                            ';
													
						}






						
                    }


                  	if(isset($_GET['id']))
                  	{
                  		echo "<hr>";
                  		$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						$q = 'SELECT * FROM plant_table WHERE plant_id = '.$_GET['id'];
						$result = mysqli_query($con, $q);
						$row = $result->fetch_assoc();
						echo 
						'
							<div style = "float:left">
								<img style = "padding: 20px"src = '.$row["url"].' height = 200px width = 200px>
							</div>
							<div style = "float:left;margin-left:10%">
								<h1>
										Name : '.$row['name'].'
										<br><br>
										Price : 
											<font style="color:green">₹'.$row['price'].'
											</font>
										<br>
								</h1>
								
							<div>
							Sold By : '.$row['added_by'].'
							<br>
						';
						if(!isset($_SESSION["log-in-user"]))
						{
							echo "Sign-In";
							echo "To buy";
							include("sign-in.php");
						}
						else
						{
							echo "<br><br>";
							echo '
								<a href = "https://peacelily.ml/?buy-now='.$row['plant_id'].'"> Buy now </a>
							';
						}

                  	}
                  	if(isset($_GET['buy-now']))
                  	{
                  		echo "<hr>";
                  		$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						$q = 'SELECT * FROM plant_table WHERE plant_id = '.$_GET['buy-now'];
						$result1 = mysqli_query($con, $q);
						$row1 = $result1->fetch_assoc();

						echo '
							<div style = "float:left">
								<img style = "padding: 20px"src = '.$row1["url"].' height = 200px width = 200px>
							</div>
						';



						echo "<br>";
						echo "<h1>".$row1['name']."</h1>";
						echo '
							<div style="margin-top:100px">
								<form action = "index.php" method = POST>
									Name : <input type = "text" name = "buyer_name" required = TRUE>
									<br>
									Contact : <input type = "number" name = "buyer_number" required = TRUE>
									<br>
									Address : <textarea name = "buyer_address"> </textarea>
									<input type = "text" name = "buyer_plant_id" value = '.$_GET['buy-now'].' hidden = TRUE>
									<input type = "text" name = "seller_name" value = '.$row1['added_by'].' hidden = TRUE>
									<br> 
									<input type ="text" value = "process-buyer-request" name ="process-buyer-request" hidden = TRUE>
									<input type = "text" name = "plant_id" value = '.$row1['plant_id'].' hidden = TRUE>
									<br>
									<input type = "submit" value = "Place Order">
								</form>
							</div>
						';
                  	}

                  	if(isset($_POST['process-buyer-request']))
                  	{
                  		echo "<hr>";
                  		$buyer_name    = $_POST['buyer_name'];
                  		$buyer_number  = $_POST['buyer_number'];
                  		$buyer_address = $_POST['buyer_address'];
                  		$seller_name   = $_POST['seller_name'];
                  		$plant_id      = $_POST['plant_id'];
                  		$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						$q = '
								INSERT INTO order_table
							  	(buyer_name, buyer_number, buyer_address, seller_name, plant_id) 
							  	VALUES("'.$_SESSION['log-in-user'].'", "'.$buyer_number.'", "'.$buyer_address.'", "'.$seller_name.'", "'.$plant_id .'")
							 ';
						// echo $q;
						$result1 = mysqli_query($con, $q);
						echo 
							'
								<font style = "color: green">
									<h1>
										Order placed
									</h1>
								</font>
							';
						echo '
							<a href = "https://PeaceLily.ml/?query=orders"> View Your Orders </a>
						';

                  	}

                ?>
            </center>
        </div>

        <div class="bottom1">
            <center>
                <?php
                    // if($_SERVER[REQUEST_URI]!="/?query=discussion")
                    // {
                    function getUserIpAddr()
                    {
                        if(!empty($_SERVER['HTTP_CLIENT_IP']))
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        else
                            $ip = $_SERVER['REMOTE_ADDR'];
                        return (string)$ip;
                    }
                    $a = getUserIpAddr();
                    $i = explode(",", $a);
                    // echo "<br> <b> Your IP 😉 : </b>".$i[0]."</br>";
                    // echo 'PeaceLily &copy; - made with ❤️ by Abhinav';

     //                $myfile = fopen("logs.txt", "a") or die("Unable to open file!");
					// $txt = "user id date";
					// fwrite($myfile, "\n". $txt);
					// fclose($myfile);


                	$myfile = fopen("ips.txt", "a") or die("Unable to open file!");
					$txt = $i[0];
					$txt = $txt." Time ".date('Y-m-d H:i:s')."\n";
					fwrite($myfile, $txt);
					fclose($myfile)

                    // }
                ?>
            </center>
        </div>
        <div class="sign">
            <center>
               <?php
                if( !isset($_SESSION['log-in-user']))
                {
                    echo '<a href = "https://peacelily.ml/?query=sign-in"> Sign-In </a>
                        <br><br>
                        <a href = "https://peacelily.ml/?query=sign-up">
                        Sign-Up
                        </a>';
                }
                else 
                {    
                    echo "<h2> 𝓗𝓲 ".str_repeat('&nbsp;', 2).$_SESSION['log-in-user']."</h2>";
                    if(!isset($_SESSION['vip_loged_in']))
                    {   
                    	if($_SESSION['user_type'] == "Seller") 
                        {
                        	echo 
                                '
                                    <a href = "https://peacelily.ml/?query=view-portal"> 
                                        <font style = "color: green">  
                                            View Portal 
                                        </font> 
                                    </a>
                                ';
                        }
                        else if($_SESSION['user_type'] == "Customer")
                        {
                        	echo 
                        	'
                        		<a href = "https://peacelily.ml?query=orders">
                        			<font style = "color: green">  
                                         Orders
                                    </font> 
                                </a>
                        	';
                        }

                    }
                    else 
                    {
                        echo '  
                            <font style = "color: green"> 
                                𝒫𝓇𝑒𝓂𝒾𝓊𝓂
                            </font>
                        ';
                    }
                    echo '<br> <br>';
                    echo '<a href = "https://peacelily.ml/?query=log-out"> 
                            Log Out
                          </a>';
                    if(isset($_GET['query']))
                    {
                        if($_GET['query']=="log-out")
                        {
                            // $_SESSION = array();
                            header('Location: '."https://peacelily.ml");
                            session_destroy();
                        }
                    }
                }
                ?>

            </center>
        </div>
    </body>
</html>
