<?php
    //if( !isset($_SESSION['log-in-user']))

    if
    (
        isset
        (
            $_SESSION['log-in-user']
        )
    )
    {    
        echo "<h1> Your Account briefings </h1> <hr>";
        echo '

            <form action="./index.php">
                <input type="submit" name="btn_submit" value="Add products"/>
            '
            .str_repeat('&nbsp;', 10).
            '
                <input type="submit" name="btn_submit" value="View Orders"/>
            </form>
        ';
    }
    else 
        echo '
        <center> 
            <img src = "./403-Forbidden-Error.png"/>
        </center>
        ';
?>