<?php
session_start();
if (isset($_POST['sbmt'])) {
    //extract($_POST);
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $usrName=$_POST['usrName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Edulvl = $_POST['educLevel'];

    include "intConn.php";



    $checkUser = "select * from Users WHERE email='$email'";
    $chkQry = mysqli_query($conn, $checkUser);
    $chk = mysqli_num_rows($chkQry);
    if ($chk > 0) {
        echo "<script>alert('This Email is Associated with another Account. Please Login or change the Email')</script>";

    } else {
        $qry = $conn->stmt_init();
        $q = "insert into users(First_Name,Surname,Username,Email,Password,EducLevel) values(?,?,?,?,?,?)";
        $qry->prepare($q);
        $qry->bind_param('ssssss', $fname, $sname,$usrName, $email, $password,$Edulvl);
        $qry->execute() or die("Query error: " . $qry->error);
        mkdir("Users/".$usrName, 0777);

        $_SESSION['email']=$email;
        header("location:profile.php");

    }

}
?>
<html>
<head>
    <title>SignUp</title>
    <LINK rel="stylesheet" type="text/css" href="Style.css"/>
</head>
    <body>
    <div class="fullscreen-bg">
        <video loop muted autoplay poster="VideoFrame.JPG" class="fullscreen-bg__video">
            <source src="bg2.webm" type="video/webm">
            <source src="bg.webm" type="video/webm">
        </video>
    </div >
    <center><div id="askwilly">
            <ul id="menu"style="text-align: left;">
                <li><a href="index.html">Home</a>
                <li><a href="DashBoard.php">DashBoard</a>
                <li><a href="profile.php">Profile</a>
            </ul>
        <h2 style="text-align: center">Enter Your Information Below</h2>
        <form method="post" action="SignUp.php">
            <center>
            <table boder="0">
                <tr>
                    <td>First Name : </td><td><input type="text" name="fname" required placeholder="John" style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                </tr>
                <tr>
                    <td>Last Name : </td><td><input type="text" name="sname" required placeholder="Doe" style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                </tr>
                <tr>
                    <td>Username : </td><td><input type="text" name="usrName" required placeholder="AskWilly" style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                </tr>
                <tr>
                    <td>Email : </td><td><input type="email" name="email" required placeholder="JohnDoe@example.com" style="width: 300px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                </tr>   
                <tr>
                    <td>Password : </td><td><input type="password" name="password" required placeholder="***********" style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                </tr>
                <tr>
                    <td>Retype Password: </td><td><input type="password" name="password" required" placeholder="***********" style="width: 200px;
                        background: rgba(255,255,255,0.23);
                        border: 1px solid #000080;
                        -moz-border-radius: 5px;
                        -webkit-border-radius: 5px;
                        border-radius: 5px;
                        padding: 5px 5px 5px 5px;
                        color: #ffffff;"/></td>
                </tr>
                <tr>
                    <td>Educational Level : </td><td><select name="educLevel" style="width: 130px;
                                                             background: rgba(255,255,255,0.23);
                                                             border: 1px solid #000080;
                                                             -moz-border-radius: 5px;
                                                             -webkit-border-radius: 5px;
                                                             border-radius: 5px;
                                                             padding: 5px 5px 5px 5px;
                                                             color: black";>
                    <option>High School</option>
                    <option>College</option>
                    <option>University</option>
                    <option>Employed</option>
                    <option>Unemployed</option>
                    <option>Others</option>
                </select></td>
                </tr>
                <tr>
                    <td><button type="reset">Opps!</button></td><td><button type="submit" name="sbmt">Register</button></td>
                </tr>
            </table>
                <h5>Already Registered? <a href="login.php">Login</a></h5>
            </center>
        </form>
        </div></center>
        </body>
</html>