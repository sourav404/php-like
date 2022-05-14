<?php
session_start();
if ($_SESSION['user'] == false) {
    header('Location: login.php');
}
include('conn.php');
$uid = $_SESSION['user'];
$id = $_POST['pid'];
$sql = "SELECT * FROM `like` WHERE uid = $uid AND pid = '$id'";
$q = mysqli_query($conn, $sql);
$num = mysqli_num_rows($q);

if ($num == 0) {
    $likesql = "INSERT INTO `like` (`pid`, `uid`) VALUES ('$id','$uid')";
    mysqli_query($conn, $likesql);
}

if ($num == 1) {
    $unlike = "DELETE FROM `like` WHERE uid = '$uid' AND pid = '$id'";
    mysqli_query($conn, $unlike);
}
