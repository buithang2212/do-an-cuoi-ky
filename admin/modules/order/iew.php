<?php include 'header.php'; ?>

      <div class="starter-template">
        <div class="lead">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Product list</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Created date</th>
								<th style="text-align:center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>12</td>
								<td>Samsung Galaxy s8</td>
								<td>20,000,000 d</td>
								<td>20/07/2016</td>
								<td align="center"> 
									<a href="product-view.php" class="btn btn-sm btn-primary">View</a>
									<a href="product-edit.php" class="btn btn-sm btn-success">Edit</a>
									<a href="product-delete.php" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


        </div>
      </div>
      
<?php include 'footer.php'; ?>
