<?php 
include '../sql/connect.php';
session_start();
if (isset($_SESSION['admin_login'])) {
  header('location: index.php');
}


if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=md5($_POST['password']);


    $conn = mysqli_connect('localhost','root','','do_an_ky_1');
    mysqli_set_charset($conn,'utf8');
    $sql="select * from user where email='$email' AND password ='$password' AND status=2 limit 1";
    $res_user=mysqli_query($conn,$sql);


    if ($res_user) {
        $_SESSION['admin_login'] = mysqli_fetch_assoc($res_user);
        header('location:index.php');
    }else{ 
        echo"<script>alert('sai thông tin');</script>";

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login admin</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="post">
            <input type="email" name="email" placeholder="email" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
        <!-- <a href="" style="color: white"> -->
            
        <!-- quên mật khẩu?</a> -->
        <br>
        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
        <!-- login bootsnipp -->
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9155049400353686"
        data-ad-slot="9589048256"
        data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

</body>
</html>
