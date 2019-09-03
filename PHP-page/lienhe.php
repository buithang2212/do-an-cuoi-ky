        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
          <meta name="description" content="">
          <meta name="author" content="">
          <link rel="icon" href="../img/favicon.ico">
          <title>Liên hệ</title>

          <?php  include 'header.php' ?>

          <div class="container">
            <ol class="breadcrumb">
             <li><a href="index.php">Trang Chủ </a></li>
             <li class="active">Liên Hệ</li>
           </ol>
           <?php 
           if (isset($_POST['feedback'])) {
            $namee=$_POST['namee'];
            $emaill=$_POST['emaill'];
            $phonee=$_POST['phonee'];
            $addrees=$_POST['addrees'];
            $contenn=$_POST['contenn'];
            $date_fe= date('y-m-d');
            $sql="insert into feedback (name_fe,email_fe,phone_fe,adsress_fe,conten,date_fe) values ('$namee','$emaill','$phonee','$addrees','$contenn','$date_fe')";
            //var_dump($sql);die();
            $res=mysqli_query($conn,$sql);
            if ($res) {
              echo"<script >alert('Phản hồi đã được gửi'); </script>";
            }

          }
          ?>
          <div class="col-md-6">


            <form action="" method="post" role="form">

             <div class="form-group">
              <label for="">Vui lòng nhập đầy đủ thông tin dưới đây, chúng tôi sẽ liên hệ với quý khác trong thời gian sớm nhất</label>
              <input type="text" class="form-control" id="name" name="namee" required="" placeholder="Họ tên *">
              <input type="email" class="form-control" id="mail" name="emaill" required="" placeholder="Email *">
              <input type="text" class="form-control" id="phone" name="phonee" pattern="[0-99-9]{10,12}" placeholder="Số điện thoại *">
              <input type="text" class="form-control" id="address" name="addrees" placeholder="Địa Chỉ ">
              <textarea style="height: 140px;" type="text" required="" name="contenn" class="form-control" id="content" placeholder="Nội dung *"></textarea>
            </div>



            <button type="submit" name="feedback" class="btn btn-primary" >Gửi cho chúng tôi</button>
            <br>
            <br>


          </form>



        </div>

        <div class="col-md-6">
          <h3 style="margin-top: 0px;">Công Ty Cổ Phần Nội Thất 2HTLC </h3>

          <div style="width: 100%; float: left;  border: 1px solid #E5E5E5;  padding: 5px; border-radius: 3px; text-align: left;">
            <span style="font-size: 18px;">
              <span style="color: red;">

                <strong>SĐT: 19001009</strong>
              </span>
            </span>
          </div>
          <div>
            <p>
              <span style="color:black;"><b>Thứ 2 - Thứ 7: 8h:00 - 20h:00 - Chủ Nhật: 8h: 00 - 17h: 00  </b></span>
            </p>
          </div>
          <p>Địa Chỉ: 238 Hoàng Quốc Việt,Cầu Giấy, Hà Nội.</p>
          <p>Email: bachkhoa-aptech@gmail.com</p>
          <p>Trang Web: Bachkhoa-aptech.com</p>
        </div>

        <div class="col-md-12">  
          <div>
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.658525935289!2d105.78126931541102!3d21.04634499255261!2m3!1f0!2fcontainer0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sBachkhoa-Aptech!5e0!3m2!1svi!2s!4v1495419849995" width="100%" height="400px" frameborder="0" style="border:0; padding-left: 15px;" allowfullscreen></iframe>
         </div>
       </div>
     </div>


     <?php include 'footer.php'; ?>