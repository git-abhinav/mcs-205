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
                PeaceLily &copy; - made with ❤️ by Abhinav 
            </center>
        </div>
        <div class="main">
            <center>
                <?php 
                echo '
                    <style type="text/css">
                    .main a{
                        border:1px solid black;
                        float: left;
                        display: inline-block;
                        margin: 5%;
                    }
                    </style>
                ';
                
               echo "<center>";
               for($x=1;$x<=10;++$x)
               {
                   if($x <= 5)
                   {
                       echo '
                            <a href ="#">'.'
                            <img src = "images/cane.jpg" width = 100px height = 100px;>
                            '.' </a>
                       ';
                   }
                   else 
                   {
                       echo '
                            <a href ="#">'.'
                            <img src = "images/rubber.jpg" width = 100px height = 100px;>
                            '.' </a>
                       ';
                   }
               }
                echo "</center>";
                
                
  
                ?>
            </center>
        </div>
        <div class="sign">
            <center>
                <button>
                    Sign-In
                </button>
                <br><br>
                <button>
                    Sign-Up
                </button>
            </center>
        </div>
    </body>
</html>
