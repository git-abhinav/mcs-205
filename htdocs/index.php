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
                <a href="https://peacelily.ml/?query=vip-user"> <b> VIP-Corner </b> </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=problems"> Problems </a>
                <br><br><br>
                <a href="https://peacelily.ml/?query=discussion"> Discussion </a>
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
                        }
                        else if($_GET['query'] == "problems")
                        {
                            echo '<hr>';
                            echo 
                            '
                                Problems page.
                            ';
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
                            echo '
                                <a href = "https://peacelily.ml/?query=view-portal"> Click for client area </a>
                            ';  
                            
                        }
                        else{
                            echo "Incorrect username or password";
                            echo "</h1>";
                            include("sign-in.php");
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
                        echo 'Question is asked by - '.$_POST['question_asked_by'];
                        echo "<br>";
                        echo 'Question is - '.$_POST['question'];
                        echo "<br>";
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
                        print "You pressed Button 2";
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
                        // echo $_POST['plant_name'];
                        // echo "<br>";
                        // echo $_POST['plant_price'];
                        // echo "<br>";
                        // echo $_POST['seller_name'];
                        // echo "<br>";
                        // echo '<img src = '.$_POST['image_url'].'" height="100" width="100">';
                        // echo 'Item type is : '.$_POST['item_type'];
                        // echo '<br><br>';
                        // echo "Hey Abhinav add new plant to the database";
                        $con=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        // $q = "SELECT * FROM username_password WHERE username = ".'"'.$u.'"'." and password = ".'"'.$p.'"';
                        $q = 'INSERT INTO plant_table(name, price, category, url, added_by) VALUES("'.$_POST['plant_name'].'", "'.$_POST['plant_price'].'", "'.$_POST['item_type'].'", "'.$_POST['image_url'].'", "'.$_SESSION['log-in-user'].'")';
                        // echo $q;
                        $result = mysqli_query($con, $q);
                        echo '<font style = "color: green">';
                        echo $_POST['plant_name']." added, under the name -".$_SESSION['log-in-user'];
                        echo '<font>';


                    }
                    $actual_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if($actual_url == "https://peacelily.ml/")
                    {
                        echo "<hr>";
                        echo "This is the home page";
                        echo "<br>";
                        $products=25;
                        $links = array(
                            "https://images-na.ssl-images-amazon.com/images/I/71agbaAe8OL._CR0,204,1224,1224_UX256.jpg",
                            "https://pics.davesgarden.com/pics/2008/12/15/critterologist/c3972d.jpg",
                            "https://images-na.ssl-images-amazon.com/images/I/71VGepIWH+L._CR0,204,1224,1224_UX256.jpg",
                            "https://www.fs.fed.us/wildflowers/beauty/columbines/images/multiple_columbines.jpg",
                            "https://images-na.ssl-images-amazon.com/images/I/7158e+kRwRL._CR0,204,1224,1224_UX256.jpg",
                            "https://www.gardenbythesea.org/site/assets/files/2071/mg_4638_nursery_succulents_sm.256x256.jpg",
                            "https://www.traditionalmedicinals.com/wp-content/uploads/2017/02/TM_PlantSelects_600x600_Licorice-256x256.jpg",
                            "https://pi.tedcdn.com/r/pf.tedcdn.com/images/playlists/talks-to-celebrate-spring_601287.jpg?quality=89&w=256",
                            "https://learn.livingdirect.com/wp-content/uploads/2016/03/plant-identifier-app.jpg"
                        );
                        $index = rand(1,8);
                        for($i=0;$i<$products;++$i)
                        {
                            $index = rand(0,5);
                            echo '



                                    <div style = "height: 120px; border: 1px solid black; width: 100px; float: left; margin-right: 10px; margin-top: 10px">

                                        <a href = "#"> 
                                            <img src = '.$links[$index].'
                                            height = "100px" width = "100px">
                                        </a>
                                        Price: ₹'.($index*100).'
                                    </div> 




                            ';
                        }
















                    }

                ?>
            </center>
        </div>

        <div class="bottom">
            <center>
                <?php
                    if($_SERVER[REQUEST_URI]!="/?query=discussion")
                    {
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
                    echo 'PeaceLily &copy; - made with ❤️ by Abhinav';
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
                    if(!isset($_SESSION['vip_loged_in']))
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
