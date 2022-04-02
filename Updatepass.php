<?php
    $mail=$_POST['mail'];
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $conpass=$_POST['conpass'];
    if($newpass != $conpass)
    {
        ?><script type="text/javascript">
        alert("passwords does not match");
    </script>
    <?php
    exit;
    }
    else if(strlen($newpass) >15)
    {
        ?><script type="text/javascript">
        alert("password's length is out of limits");
    </script>
    <?php
    exit;
    }
    else
    {
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
    $qy="SELECT * FROM managers WHERE  email='$mail' AND PASSWORD='$oldpass'";
    $result=mysqli_query($con,$qy);
    $i=0;
    while($rows=mysqli_fetch_assoc($result))
    {
        $i=1;
    }
    if($i==0)
    {
        ?><script type="text/javascript">
        alert("Email or password incorrect");
        </script>
        <?php
        exit;
    }
    else
    {
        $qy="UPDATE managers SET PASSWORD='$newpass' WHERE email='$mail'";
        mysqli_query($con,$qy);
        ?><script type="text/javascript">
        alert("password updated successfully");
        </script>
        <?php
    }
    }
?>