<html>
    <head>
        <title>
            PeaceLily
        </title>

        <link rel="stylesheet" href="css/style.css">
        
        <link rel="icon" type="image/gif/png" href="icon/peacelily.png">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
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
        <h1>
            <center>
                𝓟𝓮𝓪𝓬𝓮𝓛𝓲𝓵𝔂
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
                <a href="#"> Buy plants </a>
                <br><br><br>
                <a href="#"> Buy Seeds </a>
                <br><br><br>
                <a href="#"> Buy Pots </a>
                <br><br><br>
                <a href="#"> Buy Compost </a>
                <br><br><br>
                <a href="#"> Buy Perlite </a>
                <br><br><br>
                <a href="#"> Buy Vermiculite </a>
                <br><br><br>
                <a href="#"> Buy Potting Mix</a>
                <br><br><br>
                <a href="#"> Buy Tools </a>
            </center>
        </div>
        <div class="right">
            <center>
                <h2>
                    𝓒𝓾𝓼𝓽𝓸𝓶𝓮𝓻 𝓒𝓸𝓻𝓷𝓮𝓻
                </h2>
                <hr>
                <br>
                <a href="#"> <b> VIP-Corner </b> </a>
                <br><br><br>
                <a href="#"> Problems </a>
                <br><br><br>
                <a href="#"> Discussion </a>
                <br><br><br>
                
                <hr>
                    <h2>
                        Buys & Sell
                    </h2>
                <hr>

                <br><br>
                <a href="#"> Gravels </a>
                <br><br><br>
                <a href="#"> Bottles </a>
            </center>
        </div>
        
        <div class="bottom">
            <center>
                <?php
                     $useragent = $_SERVER ['HTTP_USER_AGENT'];
                    echo "<br> <b> Your IP is : </b>".$_SERVER['REMOTE_ADDR']."</br>";
                ?>
                PeaceLily &copy; - made with ❤️ by Abhinav 
            </center>
        </div>

        <div class="main">
            <center>
                <?php
                    // includer method 
                	if(isset($_GET['query']))
                	{
                        echo '<br>';
                        $q = $_GET['query'];
                        echo 'You have selected : '.$q;
                        if($q == "sign-up")
                            include("sign-up.php");
                        // else if($1 == "sign-in")
                            // include
                        
                	}
                	else if(isset($_POST['username']))
                	{
                		echo "username is : ".$_POST['username'];
                		echo "<br>";
                		echo "password is : ".$_POST['password'];
                		$con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                		if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						$q = "INSERT INTO username_password(username, password) VALUES(".'"'.$_POST['username'].'"'.",".'"'.$_POST['password'].'"'.")";
						echo "<h1>"."Account Successfully Created :) "."</h1>";
						mysqli_query($con,$q);

                	}
                ?>
            </center>
        </div>
        <div class="sign">
            <center>
                <a href = "#"> Sign-In </a>
                <br><br>
                <a href = "https://peacelily.ml/?query=sign-up">
                    Sign-Up
                </a>
            </center>
        </div>
    </body>
</html>
