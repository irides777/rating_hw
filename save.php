<?php
    session_start();
    include('dbconn.php');
    if(!isset($_SESSION['username'])){
        $_POST['username'] = '游客' . $_POST['username'];
    }
    else{
        $_POST['username'] = $_SESSION['username'];
    }
    $sql = "insert into comments_lhy(username,contents) values ('{$_POST['username']}','{$_POST['contents']}')";
    $conn->query($sql);
    header('location:index.php');
?>
