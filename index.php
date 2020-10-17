<?php
session_start();
include('dbconn.php');
$sql = "select username,contents from comments_lhy order by id desc";
$comments = $conn->query($sql);
?>
<html>
    <head>
        <title>留言板</title>
        <meta charset="UTF-8">
        <style>
            .login{width:200px; float: left}
            .login_info{width:100%}
            .logout{width: 200px;float:left;}
            .add, .list{width: 800px;margin: 0 auto}
            textarea{width: 100%;height: 100px;margin-bottom: 10px}
            .username{float: left}
            .submit{float: right}
            .msg{border: solid 1px #cccccc;margin-top: 10px;padding: 5px}
        </style>
    </head>
    <body>
    <?php
        if(isset($_SESSION['username'])){
            echo '<p>已登录用户：' . $_SESSION['username'] . '</p>';
            echo '
                <form action="logout.php"> 
                    <button class="logout" type="submit" >登出</button>
                </form>';
        }
        else {
            echo '<div class="login">
                <form action="login.php", method="post">
                    <input name="username" class="login_info" type="text">
                    <input name="pswd" class="login_info" type="password">
                    <button class="login_info" type="submit">登录</button>
                </form>
            </div>';
        }
    ?>
        <div class="add">
            <form action="save.php", method="post">
                <textarea name="contents"></textarea>
                <?php
                if(!isset($_SESSION['username']))
                    echo '<input name="username" class="username" type="text">';
                ?>
                <input class="submit" type="submit" value="提交">
                <div style="clear:both"></div>
            </form>
        </div>
        <div class="list">
            <?php
            foreach ($comments as $values) {
            ?>
            <div class="msg">
                <p>用户：<?php echo $values['username']?></p>
                <p>留言：<?php echo $values['contents']?></p>
            </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>