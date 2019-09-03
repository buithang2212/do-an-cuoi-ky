  <?php ob_start(); ?>  <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <script src="../javascript/myjs.js"></script>
    <link rel="stylesheet" href="../css/mycss.css">
    <link rel="stylesheet" href="../css/hover.css">


  </head>


<?php include'../sql/connect.php' ?> 
<?php include'../sql/cart-function.php' ?> 
<?php include'sendmail.php' ?>
<?php session_start(); ?>

<?php $user=isset($_SESSION['user_login'])? $_SESSION['user_login'] :''; ?>
  <body style=" background-color: #ffffff;">
    <a id="goTop" class="goTop" href="#" title="Về đầu trang"></a>
    <section style="background-color: #8A8A8A">
      <div class="container">
        <div class="pull-right">
          <div class="section-top">
            <ul class="list-inline">
              <li><a href="newws.php">Tin Tức</a></li>
              <li><a href="lienhe.php">Khách hàng phản hồi</a></li>
              <?php if ($user) {  ?>
               
                <li class="dropdown active" style="color: red;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:blue;"><?php echo $user['user_name'] ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                
                <li><a href="#modal-orderdetails"   data-toggle="modal" style="color:  green;">Xem đơn hàng</a></li>
                <li><a href="#modal-changepass" data-toggle="modal" style="color:  green;">Thay đổi mật khẩu</a></li>
                <li><a href="view_order.php"  style="color:  green;">Tùy chỉnh khác</a></li>
                <li><a href="logout.php" style="color: red;">Thoát</a></li>
                </ul>
                </li>
              <?php }else{ ?>         
               <li>
                <a data-toggle="modal" href='#modal-signin'>Đăng nhập</a>/<a data-toggle="modal" href='#modal-signup'>Đăng ký</a>/<a data-toggle="modal"  href="#modal-forgot" style="color: blue;">Quên mật khẩu?</a>              
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <nav class="navbar navbar-inverse" style="border-radius: 0px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse text-center">
          <div class="navbar-brand"><a href="index.php"><span class="glyphicon glyphicon-home" style="color: white"></span></a></div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Trang chủ</a></li>
            <!-- <li><a href="gioithieu.php">Giới thiệu</a></li> -->
            <li><a href="newws.php">Tin tức</a></li>
            <li><a href="lienhe.php">Liên hệ</a></li>
            <li class="pull-right">
            <?php if (tong_san_pham()=='') {?>
            <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"> 
              </span>Giỏ hàng</a></li>
            <?php }else{ ?>
            <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"> 
              </span>Giỏ hàng <span class="badge badge-notify"><?php echo tong_san_pham(); ?></span></a>
            <?php } ?>
          </div><!--/.nav-collapse <--> </-->
        </div>
      </nav>
      <?php include 'modal.php' ?>

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1724467977847233";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>