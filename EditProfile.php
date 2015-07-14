<?php
session_start();
include "intConn.php";
@$username=$_SESSION[username];
$usrDetails="select * from Users where Username='$username'";
$result=$conn->query($usrDetails)or die("The problem is:".$conn->error);
if($result->num_rows>0)
{
    while($rec=$result->fetch_assoc())
    {
        $fname=$rec['First_Name'];
        $surname=$rec['Surname'];
        $username=$rec['Username'];
        $email=$rec['Email'];
        $EducLevel=$rec['EducLevel'];
        $QstnAskedPnt=$rec['QuestionAskedPnt'];
        $QstnAnsweredPnt=$rec['QuestionAnsweredPnt'];
        $badge=$rec['Badge'];
        $rep=$rec['Reputation'];
        $profilePhoto=$rec['ProfilePhoto'];
        //echo"<center>Welcome $fname $surname</center>";
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>AskWilly?-<?php echo$fname;?></title>
    <LINK rel="stylesheet" type="text/css" href="Style.css"/>


    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="fullscreen-bg">
    <video loop muted autoplay poster="VideoFrame.JPG" class="fullscreen-bg__video">
        <source src="bg4.webm" type="video/webm">
    </video>
</div>
<center>

    <div id="askwillyProfile">
        <ul id="menu" style="text-align: left;">
            <li><a href="index.html">Home</a>
            <li><a href="DashBoard.php">DashBoard</a>
            <li><a href="profile.php">Profile</a>
        </ul>
        <h1>Edit Profile</h1>
        <div id="profilePicture" style="width: 110px;height:110px;float:center ; background-color: #ffffff;">
            <img src="Users/DefaultProfilePicture.png" style="width: 110px;height:110px;"/>
        </div>
        <div style="font-size: medium; padding-left: 2rem;">
            <form action="Upload.php" method="post" enctype="multipart/form-data">
                Select Profile Image:
                <input type="file" name="photoToUpload" id="fileToUpload"><br/>
                <input type="submit" value="Upload Image" name="submitPhoto"  style="display: block;
    width: 20%;
    padding: .4rem;
    border: none;
    margin-top: 0rem;
    margin-left: 0rem;
    font-size: 1.3rem;
    background: rgba(255,255,255,0.23);
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    transition: .3s background;">
            </form>
        </div>
        <form method="post" action="EditProfile.php">
        <div style="float: left; text-align: left; margin-left: 1rem;">
            <table border="0">
                <tr><td>First Name : </td><td><input name="fname" type="text" value="<?php echo$fname;?>"style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td></tr>
                <tr><td>Last Name : </td><td><input name="sname" type="text" value="<?php echo$surname;?>"style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td></tr>
                <tr><td>Username : </td><td><input name="usrName" type="text" value="<?php echo$username;?>" readonly style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/><span>*To Change Your Username, Send an Email to the Admin With reasons</span></td></tr>
                <tr><td>Email : </td><td><input name="email" type="text" value="<?php echo$email;?>"style="width: 200px;
    background: rgba(255,255,255,0.23);
    border: 1px solid #000080;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    color: #ffffff;"/></td></tr>
                <tr><td>Specialization : </td><td><select name="spec" value=""style="width: 130px;
                                                             background: rgba(255,255,255,0.23);
                                                             border: 1px solid #000080;
                                                             -moz-border-radius: 5px;
                                                             -webkit-border-radius: 5px;
                                                             border-radius: 5px;
                                                             padding: 5px 5px 5px 5px;
                                                             color: black";/>
                        <option>Biologist</option>
                        <option>Physicist</option>
                        <option>Programmer</option>
                        <option>Mathematician</option>
                        <option>Statistics</option>
                        <option>Chemistry</option></td></tr>
                <tr><td>Educational Level : </td><td><select name="educLevel" style="width: 130px;
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
                        </select></td></tr>


            </table>
            <center><input type="submit" name="UpdateProfile" value="Update Profile" style="display: block;
    width: 80%;
    padding: .4rem;
    border: none;
    margin-top: 2rem;
    margin-left: 15rem;
    font-size: 1.3rem;
    background: rgba(255,255,255,0.23);
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    transition: .3s background;"/></center>

        </div>


    </div>
    </form>
</center>
</body>
</html>


