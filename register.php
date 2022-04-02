<?php
    session_start();
    $fullname=$_POST['fullname'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $dateofbirth=$_POST['dateofbirth'];
    $gender=$_POST['gender'];
    $user='root';
    $password='';
    $dbname='epiz_27160958_library';
    $host='localhost';
     
     $con=mysqli_connect($host,$user,$password);
     if(!$con)
     {
        echo '<script type="text/javascript">';
        echo  'alert("Database not connected...go back and try again")';
        echo '</script>';
        exit;
    }
    mysqli_select_db($con,$dbname);
    $password=generatepassword($fullname);
    $qy="INSERT into managers VALUES('$fullname','$mobile','$gender','$email','$password','$dateofbirth')";
    mysqli_query($con,$qy);
    ?><script type="text/javascript">
    alert("Manager added successfully with password as <?php echo $password;?> change it after... ");
	header(url='http://localhost/7058/manage.php');
    </script>
    <?php
    function generatepassword($name)
    {
        $num_str = sprintf("%03d", mt_rand(1, 999));
        return 'user@'.$name.$num_str;
    }
?>