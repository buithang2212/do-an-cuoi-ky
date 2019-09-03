<?php include'../sql/connect.php' ?>
<?php 
$id=isset($_GET['id']) ? $_GET['id']:0;

	

$sql="delete from user where user_id = $id AND status=1 ";
var_dump($sql);

 $res=mysqli_query($conn,$sql) ;
 if($res){
   echo '<script language="javascript" type="text/javascript"> 
                alert("Xóa Thành công");
                window.location = "index.php?module=user&action=list";
        </script>';
}
     

	
 ?>