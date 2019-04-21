<?php
    echo '
        <hr>
        <h1>
             𝓥𝓘𝓟 - 𝓢𝓮𝓬𝓽𝓲𝓸𝓷
       </h1>
    ';
    echo '
        <h2>
            <font color="green"> Log in required </font>
            <br>
        </h2>
    ';
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
            
            <font color="green"> Create New </font>
            <br>
            <br>
            <form action = "index.php" method = "POST">
                Username <input type = "password" name = "vip-username" required = true>
                <br>
                Password <input type = "password" name = "vip-password" required = true>
                <input type = "text" name = "process-vip" value = "sign-up" hidden = true>
                <br><br>
                <input type = "submit" value = "Create">
            </form>


    ';
?>