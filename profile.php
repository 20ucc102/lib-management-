<?php
    session_start();
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $user='root';
    $pass='';
    $dbname='epiz_27160958_library';
    $host='localhost';
    
    $con=mysqli_connect($host,$user,$pass);
    if(!$con)
    {
        echo '<script type="text/javascript">';
        echo  'alert("Database not connected...go back and try again")';
        echo '</script>';
        exit;
    }
    mysqli_select_db($con,$dbname);
    $q ="SELECT * FROM managers WHERE email='$email' && PASSWORD='$password'";
    $result=mysqli_query($con,$q);
    if(!$result)
        echo 'error';
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        
        header('location:manage.php');
    }
    else 
    {
        echo '<script>alert("invalid username or password");</script>';
    }
?>