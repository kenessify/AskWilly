<?php
session_start();
if (isset($_POST['sbmt'])) {
    //extract($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "intConn.php";


    $checkUser = "select * from Users WHERE Username='$username' and password='$password'";
    $chkQry = mysqli_query($conn, $checkUser);
    $chk = mysqli_num_rows($chkQry);
    if ($chk > 0) {
        $_SESSION['username']=$username;
        header("location:profile.php");
    }
    else {
        echo "<script>alert('Incorrect Username or Password')</script>";
    }

}
?>
<html>
<head>
    <title>Login</title>
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
        <ul id="menu" style="text-align: left;">
            <li><a href="index.html">Home</a>
            <li><a href="DashBoard.php">DashBoard</a>
            <li><a href="profile.php">Profile</a>
        </ul>
        <h1 style="text-align: center">Enter Your Information Below</h1>
        <form method="post" action="Login.php">
            <center>
                <table boder="0">
                    <tr>
                        <td>Username : </td><td><input type="text" name="username" required placeholder="AskWilly" style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                    </tr>
                    <tr>
                        <td>Password : </td><td><input type="password" name="password" required placeholder="*********" style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td>
                    </tr>
                    <tr>
                        <td><button type="reset">Oops!</button></td><td><button type="submit" name="sbmt">Login</button></td>
                    </tr>
                </table>
                <h5 style="text-align: center">Not registered yet? <a href="SignUp.php">Sign Up</a> now and get more from askWilly</h5>
            </center>
        </form>
    </div></center>
</body>
</html>