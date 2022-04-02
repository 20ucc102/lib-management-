<?php
            $id=$_POST['sid'];
            $b_id=$_POST['id'];
            $user='root';
            $password='';
            $db='epiz_27160958_library';
            $host='localhost';
            $con=mysqli_connect($host,$user,$password);
            if(!$con)
            {
                ?>
                <script type="text/javascript">
                alert("error in database connectivity");
                </script>
                <?php
            }
            mysqli_select_db($con,$db);
            $qy0="SELECT * FROM students WHERE student_id='$id'";
            $results=mysqli_query($con,$qy0);
            if(!mysqli_fetch_assoc($results))
            {
                echo '<script type="text/javascript">';
                echo 'alert(student doesnt exist)';
                echo '</script>';
                exit;
            }
            $qy="SELECT * FROM books WHERE bookId='$b_id'";
            $result=mysqli_query($con,$qy);
            if(mysqli_fetch_assoc($result))
            {
                $qy="SELECT CURDATE();";
                $result=mysqli_query($con,$qy);
                while($rows=mysqli_fetch_assoc($result))
                {
                    $date=$rows["CURDATE()"];
                }
                $orderId=generateid($con);
                $qy1="INSERT INTO orders VALUES('$orderId','$id','$b_id','$date','placed',0.00)";
                mysqli_query($con,$qy1);
                ?><script type="text/javascript">
                alert("order placed successfully...");
            </script>
            <html>
                <h1 style="color:red;">order placed successfully</h1>
                <a href="index.php">click here to go back</a>
                </html>
            <?php
            }
            function generateid($con)
            {
                $id=000;
                $qy="SELECT COUNT(orderId) FROM orders;";
                $result=mysqli_query($con,$qy);
                $row=mysqli_fetch_assoc($result);
                if($row)
                {
                    $c=$row["COUNT(orderId)"];
                    $c=$c+1;
                    $c=str_pad($c,5,'0',STR_PAD_LEFT);
                    $c=strval($c);
                    return "lib_oId@".$c;
                }
            }
?>