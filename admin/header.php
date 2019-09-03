<?php 
// goi file connect database vao
ob_start();
include '../sql/connect.php';
if (!isset($_SESSION['admin_login'])) {
  header('location: login.php');
}

$admin = $_SESSION['admin_login'];


$sql_ad="select * from user where Email = '".$admin['Email']."' AND password = '".$admin['password']."' ";
$res_ad= mysqli_query($conn,$sql_ad);
$row_ad= mysqli_fetch_assoc($res_ad);
// _____________
$sql_order=("select * from orders where  orderstatus =1");
$res_order=mysqli_query($conn,$sql_order);
$count_order=mysqli_num_rows($res_order);
//echo $count_order;
$sql_news=("select * from news where  news_status =0");
$res_news=mysqli_query($conn,$sql_news);
$count_news=mysqli_num_rows($res_news);

//echo $count_order;
$sql_fe=("select * from feedback where  status =0");
$res_fe=mysqli_query($conn,$sql_fe);
$count_fe=mysqli_num_rows($res_fe);




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

   <!--  <nav class="navbar navbar-inverse fix-top">
     <div class="container">
      <div class="row">
         <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">ADMIN</a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li><a href="index.php?module=product&action=list">QL Sản phẩm</a></li>
           <li><a href="index.php?module=category&action=list">QL Danh Mục</a></li>
           <li><a href="index.php?module=news&action=list">QL Tin Tức</a></li>
           <li><a href="index.php?module=user&action=list">QL Người Dùng</a></li>
           <li><a href="index.php?module=transaction&action=list">QL Đơn hàng</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <li class="dropdown active">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="public/admin.jpg" alt="" style="height: 40px;border-radius: 25px "><?php echo $row_ad['user_name'] ?><b class="caret"></b></a>
             <ul class="dropdown-menu">
               <li><a href="index.php?module=user&action=change-pass">Thay đổi mật khẩu</a></li>
               <li><a href="logout.php">Thoát</a></li>
             </ul>
           </li>
         </ul>
       </div>/.nav-collapse
     </div>
      </div>
   </nav> -->

    <div class="container">

       <!-- Bootstrap -->
   <div class="col-md-2">
      <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="css/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="css/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <div class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class=" left_col">
          <div class="left_col scroll-view" >
            <div class=" " style="border: 0;background-color: red;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>SOFAVIET</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div>
              <ul class=""> <!-- class="profile_pic"> -->
                <li class="dropdown active">
              <a href="#" ><img src="public/admin.jpg" alt="" style="height: 40px;border-radius: 25px "><p style="color: red;">  <?php echo $row_ad['user_name']; ?></p></a>
              <!-- <ul class="dropdown-menu"> -->
                <li><a href="#modal-changepass"  data-toggle="modal">Thay đổi mật khẩu</a></li>
                <li><a href="logout.php">Thoát</a></li>
              <!-- </ul> -->
            </li>
            </ul>
              </div>
              <!-- <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $row_ad['user_name'] ?></h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h2 ><a href="index.php" style="color: Blue;">Quản lí chung</a></h2>
                <ul class="nav side-menu">
                  <li><a><i class="fa "></i>QL SẢN PHẨM <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?module=product&action=list">DANH SÁCH SP</a></li>
                      <li><a href="index.php?module=product&action=add">THÊM SP</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa "></i> QL NGƯỜI DÙNG <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?module=user&action=list">DS NGƯỜI DÙNG</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa "></i> QL DANH MỤC <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?module=category&action=list">DS Danh Mục</a></li>
                      <li><a href="index.php?module=category&action=add">Thêm Danh Mục</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa "></i> QL Tin Tức <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?module=news&action=list">DS Tin Tức</a></li>
                      <li><a href="index.php?module=news&action=add">Thêm tin</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa "></i> QL ĐƠN HÀNG <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?module=transaction&action=list">DS ĐƠN HÀNG</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa "></i>QL PHẢN HỒI <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?module=feedback&action=list">Xem Phản Hồi</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h2 style="color: Red;"><b>CẦN PHÊ DUYỆT</b></h2>
                <ul class="nav side-menu">
                <?php if ($count_order!==0) {?>
                  
                
                  <li><a href="index.php?module=transaction&action=list"><i class="fa "></i> ĐƠN HÀNG  <span class="badge" style="background-color: red;"><?php echo $count_order;?></span></a>
                    <?php } ?>
                    
                  </li>
                  <?php if ($count_news!==0) {?>
             
                  <li><a href="index.php?module=news"><i class="fa "></i> Tin tức <span class="badge" style="background-color: red;"><?php echo $count_news; ?></span></a>
                    
                  </li>
                    <?php } ?>
                    <?php if ($count_fe!==0) {?>
                  <li><a href="index.php?module=feedback&action=list"><i class="fa "></i>Phản hồi  <span class="badge" style="background-color: red;"><?php echo $count_fe; ?></span></a>
                    <?php } ?>
                  </li>                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

       
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="js/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="js/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="js/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="js/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="js/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="js/skycons.js"></script>
    <!-- Flot -->
    <script src="js/jquery.flot.js"></script>
    <script src="js/jquery.flot.pie.js"></script>
    <script src="js/jquery.flot.time.js"></script>
    <script src="js/jquery.flot.stack.js"></script>
    <script src="js/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="js/jquery.flot.orderBars.js"></script>
    <script src="js/jquery.flot.spline.min.js"></script>
    <script src="js/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="js/date.js"></script>
    <!-- JQVMap -->
    <script src="js/jquery.vmap.js"></script>
    <script src="js/jquery.vmap.world.js"></script>
    <script src="js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>

          

          




        
      </div>
    </div>
    </div>
   </div>
   </div>

   