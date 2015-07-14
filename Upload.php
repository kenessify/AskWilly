<?php
/**
 * Created by PhpStorm.
 * User: TH
 * Date: 7/8/2015
 * Time: 8:58 AM
 */
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
        //echo"<center>Welcome $fname $surname</center>";
    }
}
$result->close();
$fp=fopen($_FILES['photoToUpload']['tmp_name'],"r");
if($fp){
    $content=fread($fp,$_FILES['photoToUpload']['size']);
    fclose($fp);
    $content= addslashes($content);
    //$content = base64_encode($content);
    $qry = $conn->stmt_init();
    $q ="update users set ProfilePhoto='$content' where Username='$username'";
    $qry->prepare($q);
    $qry->execute() or die("Query error: " . $qry->error);
    $qry->close();

    //echo"<script>alert('Image Uploaded Successfully');</script>";
    header("location:Profile.php");
}
/*
define("UPLOAD_DIR", "Users/");

if (!empty($_FILES["photoToUpload"])) {
    $myFile = $_FILES["photoToUpload"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR.$name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR. $name, 0777);
    header("location:EditProfile.php");
}*/