<?php

?>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<!-- 最新版本的 Bootstrap 核心 CSS 檔案 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/login.css">

</head>
<body>
    <div class="container">
        <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">管理員帳號</label>
            <br>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">密碼</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <br>
            <input type="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
        </form>
    </div>
</body>
</html>