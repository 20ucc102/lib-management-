<!Doctype html>
<title>Lms:OrderUpdate</title>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-image: url(Image1.jpg);background-repeat: no-repeat; background-size: cover; height: 100%; width: 100%; z-index: -1;opacity: 0.8;">
<style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black;
            
        } 
  
        td { 
             
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center;
            color:blue; 
            background-color: #E4F5D4;
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 
    <div style="padding-top:5%;">
        <table>
        <tr>
            <th>order_id</th>
            <th>student_id</th>
            <th>book_id</th>
            <th>Name</th>
            <th>CurrentStatus</th>
        </tr>
        
<?php
    session_start();

    $sid=$_POST['sid'];

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

    $qy="SELECT student_id,studentName,orderId,orderStatus,b_id FROM students AS s INNER JOIN orders AS o ON s.student_id=o.s_id WHERE o.s_id='$sid' AND o.orderStatus!='returned'";
    $result=mysqli_query($con,$qy);
    $i=0;
    while($rows=mysqli_fetch_assoc($result))
    {
        ?><tr>
        <td><?php echo $rows["orderId"];?></td>
        <td><?php echo $rows["student_id"];?></td>
        <td><?php echo $rows["b_id"];?></td>
        <td><?php echo $rows["studentName"];?></td>
        <td><?php echo $rows["orderStatus"];?></td>
    </tr>
        <?php
        $i=1;
    }
                if($i==0)
                {
                    ?><script type="text/javascript">
                    alert("No orders available with studentId <?php echo $sid;?>");
                    </script>
                    <?php
                }
    ?>
    </table>
</div>
<br>
    <div class="status" style="background-color:dodgerblue;margin-left:30%;margin-right:30%;border:2px;border-radius:12px;">
        <form action="updateStatus.php" method="POST">
            <label style="color: cornsilk;">orderId:</label><br>
        <input type="text"placeholder="Enter orderId" name="id" style="border:none;border-radius: 12px;height:30px;width:125px;"></input><br>
    <label class="stat" style="color: cornsilk;">OrderStatus:</label><br>
    <select id="options2" name="status" style="border:none;border-radius:12px;height:30px;width:100px;">
        <option value="" disabled selected hidden>orderStatus</option>
        <option value="placed">Order Placed</option>
        <option value="bookIssued">Book Issued</option>
        <option value="returned">Book Returned</option>
    </select><br>
    <button type="submit" style="margin-left:90%;border: none; border-radius:12px;background-color:blue;color:cornsilk;">submit</button> 
</form>
</div>
<?php   
?>

</body>
</html>