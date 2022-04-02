<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lms:managers</title>
<script type="text/javascript">
    document.getElementById('options').addEventListener('input', go);
function go() {
    let val = document.getElementById('options').value;
    let ele1 = document.getElementById('Add_Manager');
    let ele2 = document.getElementById('update_order');
    let ele3 = document.getElementById('Add_Book');
    if (val == 'AM') {
        ele1.style.display = "block";
        ele2.style.display = "none";
        ele3.style.display = "none";
        document.getElementById('Password').style.display = "none";
    }
    else if (val == 'OS') {
        ele2.style.display = "block";
        ele1.style.display = "none";
        ele3.style.display = "none";
        document.getElementById('Password').style.display = "none";
    }
    else {
        ele3.style.display = "block";
        ele2.style.display = "none";
        ele1.style.display = "none";
        document.getElementById('Password').style.display = "none";
    }
}
document.querySelector('.but').addEventListener('click', go1);
function go1() {
    let ele1 = document.getElementById('Add_Manager');
    let ele2 = document.getElementById('update_order');
    let ele3 = document.getElementById('Add_Book');
    ele2.style.display = "none";
    ele1.style.display = "none";
    ele3.style.display = "none";
    document.getElementById('Password').style.display = "block";
}
</script>
}
</head>
<style>
    *
{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
.instruction
{
    text-align: center;
    height: 60px;
    padding-top: 20px;
    color: gold;
    background-color: brown;
}
.drop_box
{
    height: 50px;
    text-align: center;
    padding-top: 10px;
    color: gold;
    background-color: brown;
    font-size: 20px;
    font-weight: bold;
}
#update_order
{
    display: none;
    height: 547px;
    font-size: 50px;
    text-align: center;
    padding-top: 200px;
    color: gold;
    background-color: #46000a;
    font-weight: bold;
    padding-right: 127px;
}
.form
{
    margin-bottom: 20px;
}
.status
{
    padding-left: 66px;
}
.uoi {
    position: absolute;
    top: 330px;
    left: 797px;
    width: 210px;
    height: 28px;
}

.update {
    background-color: blue;
    position: absolute;
    left: 1030px;
    top: 329px;
    height: 30px;
    width: 88px;
    border-radius: 10px;
}
#options2 {
    height: 29px;
    position: absolute;
    top: 404.5px;
    left: 782px;
}
#Add_Book
{
    display: none;
}
#Add_Manager
{
    display: none;
    margin-left: 580px;
}

    #Password
{
    display: none;
    height: 546px;
}
.but {
    background-color: blue;
    position: absolute;
    left: 1141px;
    top: 33px;
    height: 48px;
    border-radius: 21px;
    width: 146px;
    font-size: 15px;
    font-weight: bold;
    color: white;
}

.pass {
    display: inline-block;
    width: 800px;
    text-align: center;
    margin-left: 267px;
    margin-top: 152px;
    height: 250px;
    color: black;
    background-color: dodgerblue;
    border: 2px;
    border-radius: 14px;
}
.oldpass {
    margin-bottom: 30px;
    font-size: 40px;
    margin-left: -193px;
}

.newpass {
    margin-bottom: 30px;
    font-size: 40px;
    margin-left: -176px;
}
.confirmpass {
    font-size: 32px;
    margin-left: -248px;
}
.c1
{
    display: inline-block;
}
    </style>
<body>
    <div class="instruction">
        <h2 class="c1">Please Select one of the following</h2>
        <button class="but" id="Change_Pass" onclick="go1()">Change Password</button>
    </div>

    <div class="drop_box">
        <label>From here:</label>
        <select id="options" onchange="go()">
            <option value="Sel"  disabled selected hidden>SELECT</option>
            <option value="OS">Update Order Status</option>
            <option value="AM">Add Manager</option>
            <option value="AB">Add Book</option>
        </select>
        <a href="login.html">LogOut</a>
    </div>

    <div id="update_order">
       <div class="form">
           <form action="updateOrders.php" method="POST">
                <label>Student id:</label>
              <input class="uoi" name="sid" type="text">
               <button class="update" type="submit">submit</button>
            </form>
        </div>     
    </div>
    
    <div id="Password">
        <form action="Updatepass.php" method="POST">
        <div class="pass">
            <div style="font-size: 40px;">
                <label>EmailId:</label>
                <input type="text" placeholder="email" name="mail" style="height: 35px; width: 175px; border: none;border-radius: 12px;"></input>
            </div>
            <div class="oldpass">
                OLD PASSWORD : <input type="text" class="olpass" placeholder="old password" name="oldpass" style="height: 35px; width: 175px; border: none;border-radius: 12px;">
            </div>
            <div class="newpass">
                NEW PASSWORD : <input type="text" class="npass" placeholder="new password(max 15chars)" name="newpass" style="height: 35px; width: 175px; border: none;border-radius: 12px;">
            </div>
            <div class="confirmpass">
                CONFIRM PASSWORD : <input type="text" class="cpass" placeholder="confirm password" name="conpass" style="height: 35px; width: 175px; border: none;border-radius: 12px;">
            </div>
            <button style="margin-left: 75%;">submit</button>
        </div>
        </form>
    </div>

    <div id="Add_Manager">
        <div style="border: 2px;border-radius: 12px; margin-top: 40px ;margin-right: 550px;background-color:cyan;"><br>
            <form action="register.php" method="POST">
                <div style="margin-left: 5%;">
                <label style="color:red">FULL NAME</label><br>
                <input type="text" style="border: none;border-radius: 22px;height: 40px;" name="fullname" placeholder="fullname" style="color: blue;"></input>
                &emsp;&emsp;<br><br>
                <label style="color:red;">MOBILE</label><br>
                <input type="text" style="border: none;border-radius: 22px;height: 40px;" name="mobile" placeholder="mobile" style="color: blue;"/>
                <br>
                <br>
                <label style="color: red">DOB:</label>
               <br>
                <input type="text" name="dateofbirth"style="border: none;border-radius: 22px;height: 40px;" placeholder="yyyy-mm-dd" style="color: blue;"/>
                <br>
                <br>
                <label style="color: red;">EMAIL ID</label><br>
                <input type="text" name="email" placeholder="email example@x.com"style="border: none;border-radius: 22px;height: 40px;" style="color: blue;"/>
                <br>
                <br>
                <label style="color: red;">CHOOSE GENDER</label>
                <br>
                <input type="radio" name="gender" value="m">male</input>
                <br>
                <br>
                <input type="radio" name="gender" value="f">female</input>
                <br>
                <br>
                <input type="radio" name="gender" value="o">other</input>
                <br>
                <br>
                <button style="color: blue; border: none; border-radius: 12px;background-color: blue;color: cornsilk;height: 25px;" type="submit">register</button>
                </form>
            </div>
            </div>
    </div>

    <div id="Add_Book">
        <body style="background-image: url(image.jpg); background-repeat: no-repeat; background-size: cover; height: 100%; width: 100%; z-index: -1;opacity: 0.8;">
            <div style="margin-left:20%;padding-top: 5%;">
                <h1 style="font-size: 50px; color:black; font: bold;">Library Management System</h1>
                <form action="Addbook.php" method="POST">
                    <label style="font: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size: 35px;color:greenyellow;">Book Name:</label>
                    &emsp;&nbsp;&nbsp;
                    <input type="text" name="book" placeholder="Enter name of book" style="height: 35px;width: 495px;">
                    <br>
                    <label style="font: bold; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 35px; color:greenyellow;">Author Name:</label>
                    <input type="text"placeholder="Enter Author name" name="author" style="height: 35px;width: 495px;"></input>
                    <br>
                    <div class="type" style="font-size: 30px;color:olive">
                        <span style="font-size: 35px; color:forestgreen">Type: </span> 
        
                            <ul class="list" style="margin-left: 15%;">
                                <input type="radio"  name="type" value="Fiction" id="fic">
                                <label for="Fiction">Fiction</label><br>
                                <input type="radio"  name="type" value="Programming" id="cp">
                                 <label for="Programming">Programming</label><br>
                                 <input type="radio"  name="type" value="ocooking" id="cook">
                                <label for="Cooking">Cooking</label><br>
                                <input type="radio"  name="type" value="novels" id="novel">
                                <label for="novel">novels</label><br>
                                <input type="radio"  name="type" value="others" id="others">
                                <label for="others">others</label><br>
                            </ul>
                            <div >
                                <label style="font: bold; font-size: 35px;color: greenyellow;">Book Edition:</label>
                                <input type="text" name="edition"  style="height: 35px;width: 495px;"placeholder="Enter books Edition"></input>
                            </div><br>
                            <div style="margin-left: 50%;">
                                <button type="submit" style="color: dodgerblue;height: 30px;width: 80px;">Add Book</button>
                            </div>
                </form>
            <div >
                <a href="login.html" style="color: burlywood;">LogOut</button>
            </div>
            </div>
    </div>
    
</body>

</html>