<?php
$conn=new mysqli("localhost","McWilliam","oblivion","askwilly");
if ($conn->connect_error)
    die("Connection error:".$conn->connect_error);