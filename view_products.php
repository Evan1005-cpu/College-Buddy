<?php include 'connect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Products</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<?php include 'header.php'?>
	<div class="container">
		<section class="display_product">
			<table>
				<thead>
					<th>Sl No</th>
					<th>Product Image</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php
						$display_product=mysqli_query($conn,"Select * from `products`");
						if(mysqli_num_rows($display_product)>0){
							
							while($row=mysqli_fetch_assoc($display_product)){
								echo $row['image'];
								?>
					<tr>
						<td>1</td>
						<td><img src="images/<?php echo $row['image']?>" alt=<?php echo $row['name']?>></td>
						<td><?php echo $row['name']?></td>
						<td><?php echo $row['price']?></td>
						<td>
							<a href="" class="delete_product_btn"><i class="fas fa-trash"></i></a>
							<a href="" class="update_product_btn"><i class="fas fa-edit"></i></a>
						</td>
					</tr>
					<?php
							}
							
						}else{
							echo "No Products Available";
						}
					?>
					
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>