<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width, initial-scale=1.0">
	<title>Biryani Khansama</title>
	<link rel="icon" href="img/favicon.png" type="image/x-icon"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/contactos.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
</head>
<body>

		<!-- Modal -->
		<div class="modal fade " id="LoginModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content ">
					<div class="modal-header  ">
						<h5 class="modal-title mx-auto " id="exampleModalLabel">Sign In</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form >
							<table align=center cellpadding=10px>
								<tr><td><td>Phone No: </td><td><span  class=" prenumber" id="basic-addon1">+91</span><span><input type=text name=phone placeholder="Enter Phone No:"></span></td></tr>
								<tr><td><td>Password: </td><td><input type=password class=passwordlength name=password placeholder="Enter Password:"></td></tr>

							</table>
							<div class="buttoncenter">
									<button type="submit" class="loginbutton">Log In</button>
								</div>
						</form>
					</div>
					<div class="modal-footer">
						<div class=" mx-auto">
					<small > Not a member? <strong><a href="#" data-toggle="modal" data-target="#signupmodel" data-dismiss="modal">Sign Up</a></strong></small>
					</div>
				</div>
				</div>
			</div>
		</div>


		<div class="modal fade " id="signupmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content ">
					<div class="modal-header  ">
						<h5 class="modal-title mx-auto " id="exampleModalLabel">Sign Up</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form >
							<table align=center cellpadding=10px>
								<tr><td><td>Name: </td><td><input type=text class=passwordlength  name=name placeholder="Enter Your Name:" required></td></tr>
								<tr><td><td>Phone No: </td><td><span  class=" prenumber" id="basic-addon1">+91</span><span><input type=text name=phone placeholder="Enter Phone No:" required></span></td></tr>
								<tr><td><td>Password: </td><td><input type=password class=passwordlength name=password placeholder="Enter Password:" required></td></tr>
								<tr><td><td>Retype Password: </td><td><input type=password class=passwordlength name=repassword placeholder="Retype Password:" required></td></tr>
								<tr><td><td>Email Id: </td><td><input type=email class=passwordlength name=email placeholder="Enter Your Email:" required></td></tr>

							</table>
							<div class="buttoncenter">
									<button type="submit" class="loginbutton">Register</button>
								</div>
						</form>
					</div>
					<div class="modal-footer">
						<div class=" mx-auto">
					<small >Already a member? <strong><a href="#" data-toggle="modal" data-target="#LoginModel" data-dismiss="modal">Log In</a></strong></small>
					</div>
				</div>
				</div>
			</div>
		</div>

	<div class="container-fluid">
		<div class="col-md-12 contact">
			<nav>
				<div class="row">
					<div class="col-md-3 brand">
						<img src="img/logo.png" alt="img" class="img-fluid">
					</div>
					<div class="col-md-9 list">
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="menu.php">MENU</a></li>
							<li><a href="your_order.php">YOUR ORDER</a></li>
							<?php
				if(!empty($_SESSION["loggedin"])){
					echo'<li><a class="btn btn-danger" href="logout.php">Logout</a></li>';
				}
				else{
					echo '<li><button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#LoginModel">Login</button></li>';
				}
				?>
							<li>
							<a href="#" class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-shopping-cart"></i>
							</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<div id="shopping-cart">
											<div class="txt-heading" align="center">
												 <h4>Shopping Cart</h4>
												 <?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>

<table cellpadding="10" cellspacing="1">
<form action="checkout.php" method="post">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<!--<th><strong>Action</strong></th>-->
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["item_id"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "Rs ".$item["price"]; ?></td>
				<!--<td><a onClick="cartAction('remove','<?php echo $item["item_id"]; ?>')" class="btnRemoveAction cart-action">Remove Item</a></td>-->
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		
		}
		?>

<tr>
<td><button onclick="function1()" class="btn btn-success">CheckOut</button></td>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "Rs ".$item_total; ?></td>

</tr>
</tbody>
</form>
</table>

    <?php
}?>
												 <button id="btnEmpty" class="cart-action btn-danger" onClick="cartAction('empty','');">Empty Cart</button>
											 </div>
											<div id="cart-item">

											</div>
										</div>
										
									</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			
			
		 	<div class="main-part">
<div class="items" align="center">	
<br>
<p style="font-size: 25px;color:red">Enter Your Delivery Address</p>
<table cellpadding="5px">
<form method="post" action="payment.php">
<tr><td>
Address Line 1 </td></tr>
<tr><td>
<input type="text" name="al1" required></td></tr>
<tr><td>Addresss Line 2</td></tr>
<tr><td><input type="text" name="al2" required></td></tr>
<?php  if(empty($_SESSION["loggedin"])){ ?>
<tr><td>Phone No</td></tr>
<tr><td><input type="text" name="phno" required></td></tr><?php }?>
<tr><td>
Offer Code (if any) </td></tr>
<tr><td>
<input type="text" name="offer"></td><td><p style="color: red">Offer Code Invalid or Expired</p></td></tr>
<tr><td>Payment Otion</td></tr>
<tr><td><input type="radio" name="payment" value="COD" required>Cash On Delivery</td></tr>
<!--<tr><td><input type="radio" name="payment" value="Online">Online Payment</td></tr>-->
<tr><td><input type="radio" name="payment" value="Paytm">Paytm</td></tr>
<br>
<br>
</table>
<br>

<tr><td><Button type="Submit" class="btn-danger">Continue</Button></td></tr>
</form>
<br>
<?php
	$item_ids="";
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>
<br>
<p style="font-size: 25px;color:red">Cart Items</p>
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<!--<th><strong>Action</strong></th>-->
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["item_id"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "Rs ".$item["price"]; ?></td>
				<!--<td><a onClick="cartAction('remove','<?php echo $item["item_id"]; ?>')" class="btnRemoveAction cart-action">Remove Item</a></td>-->
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		$_SESSION["final_price"]=$item_total;
		$item_ids=$item_ids.$item["item_id"]."-";
		$_SESSION["item_ids"]=$item_ids;
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "Rs ".$item_total; ?></td>

</tr>
</tbody>

</table>

    <?php
}
?>
</div>

		 		<h3 class="text-center">CONTACT</h3>
			 	<h1 class="text-center">INFORMATION</h1>
			 	<hr>
			 	<div class="row">
			 		<div class="col-md-3 mx-auto text-center box1 wow animated fadeInUp">
			 			<i class="fas fa-map-marker-alt"></i>
			 			<h2>OUR ADDRESS</h2>
			 			<p>22 Royal Street, Sundance Avenue</p>
			 			<p>Near Juhu Beach, Mumbai</p>
			 			<p>235161, India</p>
			 		</div>
			 		<div class="col-md-3 mx-auto text-center box2 wow animated fadeInUp" style="animation-delay: 0.3s;">
			 			<i class="fas fa-phone"></i>
			 			<h2>OUR PHONES</h2>
			 			<p>Phone: 9687426304</p>
			 			<p>Mobile: +91 999999999</p>
			 			<p>Fax: +91 916-415-4545</p>
			 		</div>
			 		<div class="col-md-3 mx-auto text-center box3 wow animated fadeInUp" style="animation-delay: 0.6s;">
			 			<i class="fas fa-clock"></i>
			 			<h2>OPENING HOURS</h2>
			 			<p>Mon - Fri : 08:00 am - 10:00 pm</p>
	    				<p>Sat : 09:00 am - 11:00 pm</p>
	    				<p>Sun : 11:00 am - 12:00 pm</p>
			 		</div>
			 	</div>
		 	</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>












