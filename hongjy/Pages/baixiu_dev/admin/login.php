<?php

//这里是物理路径 和http 请求相关的东西建议使用绝对路径
// 这阿里百秀的 项目就是当作玩一下。相当于一个自己的网站完整的小作品
// php不需要玩的很精通。能完成这个小项目就可以
// 将其他的东西作品 页面也都整理一下 做一个作品展示的页面
// 如果还想玩的话就可以完善一下这里的功能
require_once '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // var_dump($_SERVER);

  if (empty($_POST['email']) || empty($_POST['password'])) {
    # code...
    $message = '请输入用户名或者密码';
  } else {


    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(!$connection) {
      die('<h1>Connect Error('. mysqli_connect_errno().') '.mysqli_connect_error().'</h1>');
    }

    

    // mysql_query() 仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，如果查询执行不正确则返回 FALSE
    $result = mysqli_query($connection,sprintf("select * from users where email = '%s' limit 1", $email));

    
    if($result) {

      //返回根据从结果集取得的行生成的关联数组，如果没有更多行，则返回 false。 php 如果变量有数据 也会直接 就是true
      if($user = mysqli_fetch_assoc($result)){
        // var_dump($user);
          if($user['password'] == $password) {
            session_start();
            $_SESSION['current_logged_in_user_id'] = $user['id'];
            header('Location: /admin/index.php');
            exit;
          }
      }
      //var_dump($result);
      $message = '用户名和密码不匹配';
      mysqli_free_result($result);



    }else {
      $message = '用户名和密码不匹配';
    }
    mysqli_close($connection);
  }
}
?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/animate.css">
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap <?php echo $message ? ' animated shake' : ' ' ;?>" action="/admin/login.php" method="post" novalidate>
      <img class="avatar" src="/static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <?php if (isset($message)) :?>
      <div class="alert alert-danger">
        <strong>错误！</strong> <?php echo $message; ?>
      </div>
      <?php endif; ?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="邮箱" autofocus value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="密码">
      </div>
      <button type="submit" class="btn btn-primary btn-block" href="index.html">登 录</button>
    </form>
  </div>
</body>
</html>
