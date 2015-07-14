<?php
/**
 * Created by PhpStorm.
 * User: McWilliam
 * Date: 20-Jun-15
 * Time: 8:13 PM
 */
include "IntConn.php";
if (isset($_POST['sbmt'])) {
    //extract($_POST);
    $fname = $_GET['QuestionTA'];
    $sname = $_GET['AnswerTA'];
    $email = $_GET['Category'];

    include "intConn.php";

    $checkUser = "select * from Users WHERE email='$email'";
    $chkQry = mysqli_query($conn, $checkUser);
    $chk = mysqli_num_rows($chkQry);
    if ($chk > 0) {
        echo "<script>alert('This Email is Associated with another Account. Please Login or change the Email')</script>";

    } else {
        $qry = $conn->stmt_init();
        $q = "insert into users(First_Name,Surname,Email,Password,EducLevel) values(?,?,?,?,?)";
        $qry->prepare($q);
        $qry->bind_param('sssss', $fname, $sname, $email, $password,$Edulvl);
        $qry->execute() or die("Query error: " . $qry->error);
        $_SESSION['$email'];
        header("location:main.php");

    }

}
?>
<html>
<head>
    <title>Add Question</title>
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
        <h2 style="text-align: center">Add Question</h2>
        <form method="get" action="AddQuestion.php">
            <center>
                <table boder="0">
                    <tr>
                        <td>Question : </td><td><textarea name="QuestionTA" placeholder="What is....." ></textarea></td>
                    </tr>
                    <tr>
                        <td>Answer : </td><td><textarea name="AnswerTA" placeholder="What is....." ></textarea></td>
                    </tr>
                    <tr>
                        <td>Category : </td><td><select name="Category" style="width: 130px;
                                                             background: rgba(255,255,255,0.23);
                                                             border: 1px solid #000080;
                                                             -moz-border-radius: 5px;
                                                             -webkit-border-radius: 5px;
                                                             border-radius: 5px;
                                                             padding: 5px 5px 5px 5px;
                                                             color: black";>
                                <option>Biology</option>
                                <option>Calculus</option>
                                <option>Chemistry</option>
                                <option>Physics</option>
                                <option>Programming</option>
                                <option>Satistics</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><button type="reset">Opps!</button></td><td><button type="submit" name="sbmt">Add Question</button></td>
                    </tr>
                </table>

            </center>
        </form>
    </div></center>
</body>
</html>