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

        <?php
        $correct_username = "";
        ?>
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
                    echo "<br> <b> Your IP 😉 : </b>".$i[0]."</br>";
                ?>
                PeaceLily &copy; - made with ❤️ by Abhinav 
            </center>
        </div>

        <div class="main">
            <center>



                <?php
                    if(isset($_GET['query']))
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
                            if(isset($_SESSION['log-in-user']))
                            {
                                echo "<h1> Greeting of the day - ".$_SESSION['log-in-user']."</h1>";
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
                    }
                    if(isset($_POST['process_sign_up']) == "yes")
                    {
                        // echo "Now process the sign up part";
                        echo '<h1> Creating account </h1> ';
                        echo '<hr>';
                        echo "<h2>"."Username is : ".$_POST['username']."<h2>";
                		echo "<h2>"."Password is : ".$_POST['password']."<h2>";

                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        $q = "INSERT INTO username_password(username, password) VALUES(".'"'.$_POST['username'].'"'.",".'"'.$_POST['password'].'"'.")";
                        echo "<h1>"."Account Successfully Created :) "."</h1>";
                        echo "<h2> Now Try log-in </h2>";
                        mysqli_query($con,$q);
                    }
                    else if(isset($_POST['process_sign_in']) == "yes")
                    {
                        // echo "Now process the sign in part";
                        $u = $_POST['username'];
                        $p = $_POST['password'];
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
                            echo '
                                <a href = "https://peacelily.ml/?query=view-portal"> Click for client area </a>
                            ';  
                            
                        }
                        else{
                            echo "Incorrect username or password";
                        }
                    }
                    if($_REQUEST['btn_submit']=="Add products")
                    {
                        include("view-portal.php");
                        echo "<br>";
                        echo "<h2> Enter new product details </h2> ";
                        echo "<br>"; 
                        echo '
                                    <form action = "index.php" method = "POST">
                                        Enter plant name : <input type = "text" name = "plant_name" required = TRUE>
                                        <br>
                                        Enter plant price : <input type = "number" name = "plant_price" requiered = TRUE>
                                        <br>
                                        <input type = "text" name = "seller_name" value = '.$_SESSION['log-in-user'].' hidden = TRUE>
                                        Enter link of your image : <input type = "text" name = "image_url">
                                        <br>
                                        <input type="submit" value="Submit">
                                    </form>
                            ';
                    }
                    else if($_REQUEST['btn_submit']=="View Orders")
                    {
                        include("view-portal.php");
                        print "You pressed Button 2";
                    }

                    if(isset($_POST['plant_name']))
                    {
                        include("view-portal.php");
                        echo $_POST['plant_name'];
                        echo "<br>";
                        echo $_POST['plant_price'];
                        echo "<br>";
                        echo $_POST['seller_name'];
                        echo "<br>";
                        echo '
                        <img src = '.$_POST['image_url'].'" height="100" width="100">
                        ';
                    }


                    if(!isset($_GET['query']))
                    {
                        echo "This is the home page";
                    }

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
                    echo '<a href = "https://peacelily.ml/?query=view-portal"> View Portal </a>';
                    echo '<br> <br>';
                    echo '<a href = "https://peacelily.ml/?query=log-out"> 
                            Log Out
                          </a>';
                    if(isset($_GET['query']))
                    {
                        if($_GET['query']=="log-out")
                        {
                            // $_SESSION = array();
                            session_destroy();
                        }
                    }
                }

                ?>
            </center>
        </div>
    </body>
</html>
