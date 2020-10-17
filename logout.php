<?php
session_start();
$_SESSION['username'] = NULL;
echo '<script language="JavaScript">alert("登出成功");history.back();</script>';
?>
