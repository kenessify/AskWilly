<?php
session_start();
include "intConn.php";
@$usrmail=$_SESSION[email];
$usrDetails="select * from Users where email='$usrmail'";
$result=$conn->query($usrDetails)or die("The problem is:".$conn->error);
if($result->num_rows>0)
{
    while($rec=$result->fetch_assoc())
    {
        $fname=$rec['First_Name'];
        $surname=$rec['Surname'];

       // echo"<center>Welcome $fname $surname</center>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <LINK rel="stylesheet" type="text/css" href="Style.css"/>

        <title>AskWilly</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <div class="fullscreen-bg">
            <video loop muted autoplay poster="VideoFrame.JPG" class="fullscreen-bg__video">
                <source src="bg1.webm" type="video/webm">
                <source src="bg.webm" type="video/webm">
            </video>
        </div>
        <div id="askwilly1">
            <form action="Logout.php" method="get">
                <button type="submit" name="Logout">Logout</button>
            </form>
            <form action="Profile.php" method="get">
                <button type="submit" name="Profile">Profile</button>
            </form>
        </div>

        <center><div id="askwilly">
            <h1 style="text-align: center; font-">                AskWilly            </h1>
            <p style="text-align: center">                Find all the answers to your questions            </p>
            <br/>



            <form action="Search.php" method="get">
                <h2 style="text-align: center">What would you like to know?</h2>
                <center>
                    <textarea name="Question" cols="50" rows="5" placeholder="How to write a HangMan Game using PHP Script... "></textarea><br/>
                    Category: <select name="category" style="width: 130px;
                                                             background: rgba(255,255,255,0.23);
                                                             border: 1px solid #000080;
                                                             -moz-border-radius: 5px;
                                                             -webkit-border-radius: 5px;
                                                             border-radius: 5px;
                                                             padding: 5px 5px 5px 5px;
                                                             color: darkgrey";>
                        <option>Biology</option>
                        <option>Calculus</option>
                        <option>Chemistry</option>
                        <option>Physics</option>
                        <option>Programming</option>
                        <option>Satistics</option>
                    </select>
                    <button type="submit" name="ask">AskWilly?</button>
                    <br/>

                </center>

            </form>
        </div></center>
    </body>
</html>