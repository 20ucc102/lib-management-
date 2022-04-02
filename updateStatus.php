<?php
session_start();
$id=$_POST['id'];
$status=$_POST['status'];

$user='root';
$pass='';
$db='epiz_27160958_library';
$host='localhost';

$con=mysqli_connect($host,$user,$pass);
if(!$con)
{
    echo '<script type="text/javascript">';
    echo  'alert("Database not connected...go back and try again")';
    echo '</script>';
    exit;
}
mysqli_select_db($con,$db);

if(strcmp($status,"returned")==0)
{
    $qy="Select date FROM orders where orderId='$id'";
    $result=mysqli_query($con,$qy);
    while($rows=mysqli_fetch_assoc($result))
    {
        $date=$rows["date"];
    }
    $qy="SELECT CURDATE();";
    $results=mysqli_query($con,$qy);
    while($row=mysqli_fetch_assoc($results))
    {
        $currdate=$row["CURDATE()"];
    }
    $start = strtotime($currdate);
    $end = strtotime($date);
    $days_between = ceil(abs($end - $start) / 86400);
    if($days_between > 15)
    {
        $count=$days_between-15;
        $due=$count*2;
        ?><script type="text/javascript">
        alert("There is due of <?php echo $due;?> rupees due to late submission of book,the book is ordered on <?php echo $date;?>");
    </script>
    <?php
        $qy="UPDATE orders SET orderstatus='$status',due='$due' where orderId='$id'";
        mysqli_query($con,$qy);
        $qy1="UPDATE books AS b INNER JOIN orders AS o ON b.bookId=o.b_id SET status='available' WHERE o.orderId='$id'";
        $res=mysqli_query($con,$qy1);
        if(!$res)
        {
            echo 'error';
        }
        ?><script type="text/javascript">
        alert("status updated successfully");
    </script>
    <html>
        <h1>Order status updated successfully</h1>
        <a href="manage.php">goback</a>
    </html>
    <?php
    }
    else
    {
        $qy="UPDATE orders SET orderstatus='$status' where orderId='$id'";
        mysqli_query($con,$qy);
        $qy1="UPDATE books AS b INNER JOIN orders AS o ON b.bookId=o.b_id SET status='available' WHERE o.orderId='$id'";
        $res=mysqli_query($con,$qy1);
        if(!$res)
        {
            echo 'error';
        }
        ?><script type="text/javascript">
        alert("status updated successfully");
    </script>
    <html>
        <h1>Order status updated successfully</h1>
        <a href="manage.php">goback</a>
    </html>
    <?php
    }
}
else
{
    $qy="UPDATE orders SET orderstatus='$status' where orderId='$id'";
        mysqli_query($con,$qy);
        ?><script type="text/javascript">
        alert("status updated successfully");
    </script>
    <html>
        <h1>Order status updated successfully</h1>
        <a href="manage.php">goback</a>
    </html>
    <?php
}
?>