<?php if(isset($_POST['timkiem'])){
	$v=$_POST['searchkey'];
	//header('location: search.php');
	} ?>
<div class="row" style="padding-left: 50px">
	
<div class="search-bar">	
	<div class="form-search">
		<form action="search.php" method="post" name="search" class="form-inline" >
			<input type="text" class="form-control" name="searchkey" id="search-action1" placeholder="Tìm kiếm theo tên, thương hiệu,..." style="margin: 0px;">
			<button type="submit" class="btn btn-default search-action2" name="timkiem"><span class="glyphicon glyphicon-search"></span></button>
		</form>			
	</div>	
	<div class="hotline"><img src="../img/hotlinehome.png" alt="hotline"></div>		
</div>


</div>
