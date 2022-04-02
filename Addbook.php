<?php
    session_start();
    $author=$_POST['author'];
    $book=$_POST['book'];
    $type=$_POST['type'];
    $edition=$_POST['edition'];

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
    $bookId=generateBid($con);
    $qy="INSERT INTO books VALUES('$bookId','$author','$book','$type','$edition','available')";
    $res=mysqli_query($con,$qy);
    if($res)
    {
        echo '<script type="text/javascript">';
		header('refresh:0; url=http://localhost/7058/manage.php');
        echo  'alert("book added successfully....")';
		
        echo '</script>';
    }
    else
    {
        echo '<script type="text/javascript">';
        echo  'alert("something went wrong")';
        echo '</script>';
    }
    function generateBid($con){
        $id=000;
        $qy="SELECT COUNT(bookId) FROM books;";
        $result=mysqli_query($con,$qy);
        $row=mysqli_fetch_assoc($result);
        $c=$row["COUNT(bookId)"];
        $c=$c+1;
        $c=str_pad($c,5,'0',STR_PAD_LEFT);
        $c=strval($c);
        return "lib_bId@".$c;
    }
?>