<?php
    echo "<hr>";
    echo 
        '
            <h1 style = "color: green">
                Discussion Corner
            </h1>
            <br>
        ';

    for($i=0;$i<10;++$i)
    {
        if(!isset($_POST['anyanswer']))
        {    echo 
                '   
                    <form action = "index.php?query=discussion" method = POST>
                        <div style="width: 70%; height:100px">
                            <div style = "float: left;height:50px;">
                                <h3 style = "color: red">
                                    By: Abhinav
                                </h3>
                                
                            </div>
                            <div style = "float: left; position:relative">
                                Discussion thread'.$i.' My areca palm is turing yellow, what to do?
                            </div>
                            <div style = "float: right; position:relative">
                                <input type = "text" name = "answer'.$i.'">
                                <br>
                                <input type = "submit" value = "Respond">
                                <input type = "text" name = "anyanswer" value = "yes" hidden = true>
                            </div>
                        </div>
                        <br>
                    </form>
                ';
        }
        else
        {
            for($i=0;$i<10;++$i)
            {
                if(isset($_POST['answer'.$i]))
                {
                    echo 
                    '   
                        Answer to Question'.$i.' is -'.$_POST['answer'.$i].'
                    ';
                }
            }
        }
    }
?>