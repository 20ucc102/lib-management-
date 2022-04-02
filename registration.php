    <?php
    session_start();
    $fullname=$_POST['fullname'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $dateofbirth=$_POST['dateofbirth'];
    $gender=$_POST['gender'];
    $dbuser='root';
    $dbpass='';
    $db='epiz_27160958_library';
    $host='localhost';
    $con= mysqli_connect($host,$dbuser,$dbpass);
    if(!$con)
    {
        echo '<script type="text/javascript">';
        echo  'alert("Database not connected...go back and try again")';
        echo '</script>';
        exit;
    }
    mysqli_select_db($con,$db);
    $id=generateId($con);
    $s = "SELECT * FROM managers WHERE email='$email'";

    $result= mysqli_query($con,$s);
    $num= mysqli_num_rows($result);

    if($num==1)
    {
        echo '<script type="text/javascript">';
        echo  'alert("email id already taken...go back and try again")';
        echo '</script>';
        exit;
    }
    else
    {
        $reg="INSERT INTO students VALUES('$id','$fullname','$mobile','$email','$gender')";
        $in=mysqli_query($con,$reg);
        if($in)
        {
            ?><!Doctype html>
                <script type="text/javascript">
                    alert("Welocome,Your id is <?php echo($id);?>");
                </script>
                <h1 style="color:red;font:bolder;">WELCOME,YOUR student id is <?php echo($id);?></h1>
            </html>
            <?php
        }
        else
        {
            echo '<script type="text/javascript">';
            echo  'alert("Something went wrong...go back and try again")';
            echo '</script>';
            exit;
        }
    }
    function generateId($con)
    {
        $qy="SELECT COUNT(student_id) FROM students;";
        $result=mysqli_query($con,$qy);
        $rows=mysqli_fetch_assoc($result);
        $c=$rows["COUNT(student_id)"];
        $c=$c+1;
        $c=str_pad($c,5,'0',STR_PAD_LEFT);
        $c=strval($c);
        return "lib_SId@".$c;
    
    }
?>