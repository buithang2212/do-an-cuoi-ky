<?php  include'../sql/connect.php' ?>

<?php 
$sql="select * from feedback order by status,id_fe DESC ";
$res=mysqli_query($conn,$sql);

 ?>
	<div class="col-md-10">
		

	<table class="table ">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Nười phản hồi</th>
								<th style="color: green ;text-align: center;">Tình trạng</th>
								<th style="color: red ;text-align: center;">Tùy chỉnh</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					if ($res) {
							while($row = mysqli_fetch_assoc($res)) {
								 // echo '<pre>';
								 // print_r($row);
								 // echo '</pre>';
					?>
								<tr>
									<td><?php echo $row['id_fe']; ?></td>
									<td><?php echo $row['name_fe']; ?></td>
									<?php 
									if ($row['status']) {?>
									<td style="text-align: center; color: blue;">Đã xem</td>
									<?php }else{ ?>
									<td style="text-align: center; color: red;">Chưa xem</td>
									<?php } ?>
									<td style="text-align: center;"><a style="color: blue;" href="index.php?module=feedback&action=confirm&id=<?php echo $row['id_fe'] ?>" >| XEM |</a></td>
								</tr>
					<?php	}
						}
					 ?>
							

						</tbody>
					</table>

             
	</div>

<?php include 'footer.php'; ?>
