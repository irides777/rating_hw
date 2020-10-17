<?php
session_start();
include('dbconn.php');
$username = $_POST['username'];
$pswd = $_POST['pswd'];
$sql = "select password from users_lhy where username = '{$username}'";
$res = $conn->query($sql);
$res = $res->fetch_assoc()['password'];
if($pswd == $res){
    $_SESSION['username'] = $username;
    echo '<script language="JavaScript">alert("登陆成功");history.back()</script>';
    //header('location:index.php');
}
else{
    echo '<script language="JavaScript">alert("登陆失败");history.back();</script>';
}
?>
