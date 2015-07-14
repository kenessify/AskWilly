<?php
/**
 * Created by PhpStorm.
 * User: McWilliam
 * Date: 01-Jul-15
 * Time: 10:33 AM
 */
session_start();
include 'IntConn.php';

?>
<html>
<head>
    <LINK rel="stylesheet" type="text/css" href="Style.css"/>

    <title><?php echo $qstn;?> - AskWilly</title>
</head>
<body>
<div class="fullscreen-bg">
    <video loop muted autoplay poster="VideoFrame.JPG" class="fullscreen-bg__video">
        <source src="bg10.webm" type="video/webm">
        <source src="bg.webm" type="video/webm">
    </video>
</div >
<div style="float: left">
<ul id="menu" style="text-align: left;"><li><a href="index.html">Home</a>
    <li><a href="DashBoard.php">DashBoard</a>
    <li><a href="profile.php">Profile</a>
</ul>
</div>

<?php
if(isset($_GET['QAID']))
{
    @$_SESSION['Result'] = $_GET['QAID'];
    $QAID = $_SESSION['Result'];
    echo $QAID;
    $qryInt=$conn->stmt_init();
    $qry="SELECT Questions, Answers, Category, QAID FROM qa WHERE QAID LIKE '$QAID'";
    $qryInt->prepare($qry);
    $qryInt->execute() or die("Server Error! Try again in few Minutes".$qryInt->error);
    $qryInt->store_result();
    $qryInt->bind_result($Questions,$Answers,$Category, $QAID);
    while($qryInt->fetch())
    {
        echo'<center><div style="font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;font-weight: 100;background: rgba(0,0,0,0.3);color: white;padding: 1rem;width: 50%;height:80%;margin: 2rem;font-size: 1.2rem;display:inline-block;">

            <h3><strong>'.$Questions.'</strong></h3><br/>'.$Answers.'<br/>Category: '.$Category.'</div></center>';
    }
}

?>
</body>
</html>