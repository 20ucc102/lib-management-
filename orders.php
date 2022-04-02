<!Doctype html>
<html lang="en">
<title>Lms:orders</title>
<body style="background-image: url(Image1.jpg);background-repeat: no-repeat; background-size: cover; height: 100%; width: 100%; z-index: -1;opacity: 0.8;">
    <h1 style="margin-left:30%;padding-top:5%;color:orange;">Select any book from the following</h1>
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
        <table>
        <tr>
            <th>bookId</th>
            <th>bookName</th>
            <th>Author name</th>
            <th>edition</th>
        </tr>
        <?php
            session_start();
            if(!isset($_POST['bookType']))
            {
                ?>
                <script type="text/javascript">
                alert("book type not selected..go back and try again");
            </script>
            <?php
                exit;
            }
            $bookType=$_POST['bookType'];
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
            $qy="SELECT bookId,bookName,authorName,edition from books WHERE type='$bookType' AND status='available'";
           $result=mysqli_query($con,$qy);
           $i=0;
           while($rows=mysqli_fetch_assoc($result))
           {
        ?>
            <tr>
                <td><?php echo $rows['bookId'];?></td>
                <td><?php echo $rows['bookName']; ?></td>
                <td><?php echo $rows['authorName'];?></td>
                <td><?php echo $rows['edition'];?></td>
            </tr>
            <?php
            $i=1;
            }
                if($i==0)
                {
                    ?><script type="text/javascript">
                    alert("No books available at the moment please try again after some time");
                    </script>
                    <?php
                }
            ?>
        </table>
        <br><br>
        <div style="border:2px solid;border-radius:12px;margin-left: 29%;margin-right:28%;font-size: 22px;background-color:orange;">
        <form action="orders1.php" method="POST">
            <label style="color:cornsilk;">Enter BookId from above id's:</label>
            <input  type="text" name="id"required></input><br>
            <label style="margin-left:18.8%;color:cornsilk;">Enter StudentId:</label>
            <input type="text"name="sid" required></input><br>
            <div style="margin-left:49%;">
                <button type="submit"style="background-color:blue;color:cornsilk;">submit</button>
                <a href="index.php">cancel</a>
            </div>
        </form>
    </div>
    </body>
</html>