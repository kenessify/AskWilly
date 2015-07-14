<?php
/**
 * Created by PhpStorm.
 * User: McWilliam
 * Date: 20-Jun-15
 * Time: 11:37 AM
 */
session_start();
extract($_GET);
$qstn=$_GET['Question'];
$category=$_GET['Category'];
include 'IntConn.php';
$qryInt=$conn->stmt_init();
$startTime=microtime(true);
$qry="SELECT Questions, Answers, Category, QAID FROM qa WHERE Questions LIKE ? AND Category LIKE ?";
//$qry="SELECT * FROM qa WHERE Questions LIKE ? AND Category=$category";
@$question.="%".$_GET['Question']."%";
$qryInt->prepare($qry);
$qryInt->bind_param("ss",$question,$category);
$qryInt->execute() or die("Query error: ".$qryInt->error);
$endTime=microtime(true);
$totalTime=round(($endTime-$startTime)*60,2);

$qryInt->store_result();
$qryInt->bind_result($Questions,$Answers,$Category, $QAID);

if($qryInt->num_rows>0)
{
    $nxt = "SearchDet.php?QAID=";
    echo'<form method="get" action="SearchDet.php"><center>';
    while($qryInt->fetch())
    {
        echo'<a href='.$nxt.$QAID.'><div style="font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;font-weight: 100;background: rgba(0,0,0,0.3);color: white;padding: 2rem;width: 23%;margin: 2rem;font-size: 1.2rem;display:inline-block;">
            <h3><strong>'.$Questions.'</strong></h3><br/>'.$Answers.'<br/>Category: '.$Category.'
            <input name="QAID" type="hidden" data-id='.$QAID.'></div></a>';
        //$_SESSION['Result']=$_GET['QAID'];
    /*    if(isset($_GET['view']))
        {
            $_SESSION['Result']=$_GET['QAID'];
            //header("location:SearchDet.php");
        }*/
    }
    echo'</center></form>';
}

echo '<br/>'.$qryInt->num_rows." record(s) found ($totalTime seconds).";
$qryInt->close();
$conn->close();
?>
<html>
<head>
    <LINK rel="stylesheet" type="text/css" href="Style.css"/>

    <title><?php echo $qstn;?> - AskWilly</title>
</head>
<body background="bg.jpg" style="background-repeat: no-repeat; center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">

</body>
</html>

