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
        $EducLevel=$rec['EducLevel'];
        $QstnAskedPnt=$rec['QuestionAskedPnt'];
        $QstnAnsweredPnt=$rec['QuestionAnsweredPnt'];
        $badge=$rec['Badge'];
        $rep=$rec['Reputation'];
        $profilePhoto=$rec['ProfilePhoto'];
         //echo"<center>Welcome $fname $surname</center>";
       // header("Content-type: image/jpeg");
        //echo $profilePhoto;
    }
}
//if($row=mysqli_fetch_array($result)){
    //$profilePhoto=$row['ProfilePhoto'];
    //header("Content-type: image/JPEG");
    //echo $profilePhoto;
//}
?>
<!DOCTYPE html>
<html>
<head>
    <title>AskWilly?-<?php echo $fname;?></title>
    <LINK rel="stylesheet" type="text/css" href="Style.css"/>
    <LINK rel="stylesheet" type="text/css" href="tabcontent.css"/>
    <script src="tabcontent.js" type="text/javascript"></script>


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
        <p id="menu">
            <a href="index.html">Home</a>
            <a href="DashBoard.php">DashBoard</a>
            <a href="profile.php">Profile</a>
        </p>
<!--        <h1 style="text-align: center; font-">                Welcome to AskWilly            </h1>-->
<!--        <p style="text-align: center">                Find all the answers to your questions            </p>-->

        <div id="profilePicture" style="width: 100px;height:100px;float: left; background-color: #ffffff">
            <img src="" style="width: 100px;height:100px;"/>
        </div>
            <div style="float: left; text-align: left; margin-left: 1rem;">
                <?php
                    echo $fname." ".$surname;
                    echo"<br/>";
                    echo $username;
                    echo"<br/>";
                    echo $EducLevel;
                ?>
            </div>
            <div style="float: right; text-align: left;">
                <h2 style="margin-top:0rem;margin-bottom: 0rem; text-align: right;">Stats</h2>
                <hr/>
                Questions Answered : <?php echo$QstnAnsweredPnt; ?>
                <br/>
                Questions Asked : <?php echo$QstnAskedPnt; ?>
                <br/>
                Reputation : <?php echo$rep; ?>
                <br/>
                Badge : <?php echo $badge; ?>
            </div>
        <a href="EditProfile.php" class="edit">
            <p style="margin-top: 7rem;margin-left: 1rem; text-align: left;">Edit Profile</p>
        </a>
        <ul class="tabs" data-persist="true">
            <li class="selected"><a href="#Div1"><span>Recent Activities</span></a></li>
            <li class=""><a href="#Div2"><span>Questions Asked</span></a></li>
            <li class=""><a href="#Div3"><span>More Stuff Coming soon</span></a></li>

        </ul>
        <div class="tabcontents">
            <div id="Div1" style="display: block;">
                <li>Your recent activities will be listed here</li>
            </div>
            <div id="Div2" style="display: none;">
                <li>All Questions asked will be listed here.</li>
            </div>
            <div id="Div3" style="display: none;">
                <li>I will add More Stuff</li>
            </div>
        </div>

    </div>
</center>
</body>
</html>
