<?php
/**
 * Created by PhpStorm.
 * User: TH
 * Date: 7/8/2015
 * Time: 9:40 AM
 */
include "intConn.php";
if(isset($_POST['UpdateProfile']))
{
    $updateUser="update users set Profilephoto where Username='$usr'";
}