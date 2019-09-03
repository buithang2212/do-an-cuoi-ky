
<?php include'header.php' ?>

<?php 
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
$n=1;
 // $sql_restran="select * from tran"
  ?>

<div class="container">
  <div class="row ">
    <div class="col-md-8 ">
    <div class="cart-items">
    <?php if (tong_san_pham()=='') { ?><div style="text-align: center;"><h1><b>Giỏ hàng trống</b></h1></div>
      
   <?php }else{ ?>
    
      <div style="text-align: center;"><h1><b>Danh Sách Đơn Hàng</b></h1></div>
      <?php } ?>
    
        <?php if($cart) { foreach($cart as $c) { ?>

        <form action="update.php" method="post">
       <div class="cart-header">
         <div class="close1"><a href="insert_cart.php?action=delete&id=<?php echo $c['pro_id'] ?>" id="<?php echo $c['pro_id'] ?>"><img src="../img/close_1.png" alt=""></a> </div>
         <div class="cart-sec simpleCart_shelfItem">
            <div class="cart-item cyc">
               <img src="../uploads/<?php echo $c['image'] ?>" class="img-responsive" alt=""/>
            </div>
             <div class="cart-item-info">

            <h3><a href="#"><?php echo $c['pro_name'] ?></a><span>Mã sp: <?php echo $c['pro_id'] ?></span></h3>
            <ul class="qty">
              <li><p>Số Lượng: <input pattern="[0-9]" type="number" name="<?php echo $c['pro_id']; ?>" value="<?php echo $c['quantity'] ;?>"  min="1"  style="width: 10% ; border-radius: 4px ;border:1px solid gray; text-align: center;"  id="qtt-<?php echo $c['pro_id'] ?>" ></p>
              </li>
              

              
              
              

              <li><p>Giá gốc : <s><?php echo $c['price']; ?> VND</s></p></li>
              <li><p>Giá KM : <b><?php echo $c['sale_price']; ?>VND</b></p></li>
            </ul>
           
              <div style="float: right;">
             
               <!-- <a href="insert_cart.php?action=update&id=<?php echo $c['pro_id']?>"  data-id-="<?php echo $c['pro_id'] ?>" >Cập Nhật<img src="../img/uploads-icon.png" alt="" style="height: 25px;"></a>  -->
              </div>

            <div class="delivery">
            <?php $t= $c['quantity']*$c['sale_price']; ?>
               <span>Tổng GIá: <?php echo $t ?>VND</span>
               <div class="clearfix"></div>
                </div>  
             </div>
            
             <div class="clearfix"></div>
              
          </div>
          
       </div>

       <?php $n++; } } ?>
       <!-- <button type="submit">cập nhập</button> -->
        <input class="btn-sm btn-danger pull-right" type="submit" name="update1" value="Cập nhật"> 
       </form>
 
   
     
        <!-- //////////////// -->
        </div>    
     </div>
       <div class="col-md-4 cart-total" style="margin-top: 20px">
       
       <a class="continue" href="index.php">Tiếp tục mua hàng</a>
         <?php if($cart) { foreach($cart as $c) { ?>

       <div class="price-details">
         <h3>Chi tiết đơn hàng</h3>
         <span>Mã sp</span>
         <span class="total1"><?php echo($c['pro_id']) ?></span>
         <span>Tên sản phẩm</span>
         <span class="total1"><?php echo $c['pro_name'] ?></span>
         <span>Số lượng</span>
         <span class="total1"><?php echo $c['quantity'] ;?></span>
         <span>Tổng tiền</span>
         <span class="total1"><?php echo $t ?></span>
         <div class="clearfix"></div>        
       </div> 

       <?php $n++; } } ?>
       <ul class="total_price">
         <li class="last_price"> <h4>Tổng Tiền</h4></li>  
         <li class="last_price"><span><?php echo tong_tien(); ?>.vnđ</span></li>
         <div class="clearfix"> </div>
       </ul>
      
       
       <div class="">
       <?php if (tong_san_pham()=='') {?>
           <a class="order" href="cart.php" onclick="alert('vui lòng chọn sản phẩm')">Tiến Hành Thanh Toán</a>

         
       <?php }else{ ?>

       <a class="order" href="check-out.php" >Tiến Hành Thanh Toán</a> 
                       <?php } ?>

             </div>

      </div>
  </div>
</div>
<?php include'footer.php' ?>