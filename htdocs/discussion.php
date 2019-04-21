<?php
    echo "<hr>";
    echo 
        '
            <h1 style = "color: green">
                Discussion Corner
            </h1>
            <br>
        ';

        if(!isset($_POST['anyanswer']))
        {   
             // echo 
             //    '   
             //        <form action = "index.php?query=discussion" method = POST>
             //            <div style="width: 70%; height:100px">
             //                <div style = "float: left;height:50px;">
             //                    <h3 style = "color: red">
             //                        By: Abhinav
             //                    </h3>
                                
             //                </div>
             //                <div style = "float: left; position:relative">
             //                    Discussion thread'.$i.' My areca palm is turing yellow, what to do?
             //                </div>
             //                <div style = "float: right; position:relative">
             //                    <input type = "text" name = "answer'.$i.'">
             //                    <br>
             //                    <input type = "submit" value = "Respond">
             //                    <input type = "text" name = "anyanswer" value = "yes" hidden = true>
             //                </div>
             //            </div>
             //            <br>
             //        </form>
             //    ';
            $conn=mysqli_connect("sql307.epizy.com","epiz_23513917","L9eIPqKsKjdjTN","epiz_23513917_plant_database");
                        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            $q = 'SELECT DISTINCT question_id, question, asked_by FROM question_table;';
            $result = mysqli_query($conn, $q);
            while($row = $result->fetch_assoc())
            {
                echo
                    '<form action = "index.php?query=discussion" method = POST>
                        <div style="width: 70%; height:100px">
                            <div style = "float: left;height:50px;">
                                <h3 style = "color: red">
                                    By: '.$row['asked_by'].'
                                </h3>
                                
                            </div>
                            <div style = "float: left; position:relative;margin-left:50px">
                                '.$row['question'].'
                            </div>
                            <div style = "float: right; position:relative">
                                <textarea name = "answer"> </textarea> 
                                <br>
                                <input type = "text" name = "anyanswer" value = "yes" hidden = true>
                                <input type = "text" name = "question_id" value = "'.$row['question_id'].'" hidden = TRUE">
                                <input type = "submit" value = "Respond">
                            </div>
                        </div>
                    </form>
                    <form action = "index.php?query=discussion" method = POST>
                        <input type = "text" name = "view-answer" value = "yes" hidden = TRUE>
                        <input tyep = "text" name = "question_id" value = "'.$row['question_id'].'" hidden = TRUE>
                        <input type = "submit" value = "View-answer">
                    </form>

                    <br>
                    '
                    ;
                
            }

            // $q = 'SELECT asked_by, question FROM question_table';
            // $result = mysqli_query($con,$q);
            // $rowcount = mysqli_num_rows($result);
            // echo $rowcount;
            // while($rowcount>0)
            // {
            //     $rowcount = $rowcount - 1;
            //     $row = $result->fetch_assoc();
            //     echo $rowcount;
            //     echo "<br>";
            //     // echo 
            //     // '   
            //     //      <form action = "index.php?query=discussion" method = POST>
            //     //        <div style="width: 70%; height:100px">
            //     //              <div style = "float: left;height:50px;">
            //     //                  <h3 style = "color: red">
            //     //                      By: '.$row['asked_by'].'
            //     //                  </h3>
                                
            //     //              </div>
            //     //              <div style = "float: left; position:relative">
            //     //                  '.$row['question'].'
            //     //              </div>
            //     //              <div style = "float: right; position:relative">
            //     //                  <textarea name = "answer"> </textarea>
            //     //                  <br>
            //     //                  <input type = "submit" value = "Respond">
            //     //                  <input type = "text" name = "anyanswer" value = "yes" hidden = true>
            //     //              </div>
            //     //          </div>
            //     //          <br>
            //     //      </form>
            //     // ';
            // }
        }
        else
        {
            // for($i=0;$i<10;++$i)
            // {
            //     if(isset($_POST['answer'.$i]))
            //     {
            //         echo 
            //         '   
            //             Answer to Question'.$i.' is -'.$_POST['answer'.$i].'
            //         ';
            //     }
            // }
        }
?>