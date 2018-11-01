<?php
session_start();

$_SESSION["name"]= "yamazaki";
$_SESSION["count"] += 1;
echo $_SESSION["count"];
?>