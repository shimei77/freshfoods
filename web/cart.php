<?php 
session_start();
require_once('../connection/connection.php'); 
if(isset($_POST['quantity']) && $_POST['quantity'] != null){
    for($i = 0 ; $i < count($_SESSION['Cart']); $i++){
        $_SESSION['Cart'][$i]['product_name'] = $_POST['quantity'][$i];
    }
}
// echo "SESSION[Cart]= <br>";
// print_r($_SESSION['Cart']);
?>



<!DOCTYPE html>
<html lang="en">
<?php require_once('template/head.php'); ?>

<body class="goto-here">
	<?php require_once('template/navbar.php'); ?>
	<!-- *** NAVBAR END *** -->

	<!-- <div class="hero-wrap hero-bread" style="background-image: url('../images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div> -->

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<!-- <th>&nbsp;</th>
						        <th>&nbsp;</th> -->
									<th>刪除</th>
									<th>圖片</th>
									<th>產品名稱</th>
									<th>單價</th>
									<th>數量</th>
									<th>小計</th>
									<!-- <th colspan="2">小計</th> -->
								</tr>
							</thead>
							<tbody>
							<?php 
                                    $subtotal = 0;
                                    $total = 0;
                                    for($i = 0; $i < count($_SESSION['Cart']); $i++){ ?>
								<tr class="text-center">
									<td class="product-remove"><a href="delete.php?cart_id=<?php echo $i; ?>"><span class="ion-ios-close"></span></a></td>

									<td class="image-prod"><div class="img" style="background-image:url(../images/uploads/products/<?php echo $_SESSION['Cart'][$i]['pic']; ?>);"></div></td>
									<!-- <td>
										<a href="#">
											<img src="../images/uploads/products/<?php echo $_SESSION['Cart'][$i]['pic']; ?>" alt="White Blouse Armani">
										</a>
									</td> -->

									<td class="product-name">
										<h3><?php echo $_SESSION['Cart'][$i]['product_name']; ?></h3>
										<p>Far far away, behind the word mountains, far from the countries</p>
									</td>

									<td class="price">$NT<?php echo $_SESSION['Cart'][$i]['price']; ?></td>

									<td class="quantity">
										<div class="input-group mb-3">
											<input type="text" name="quantity" class="quantity form-control input-number" value=<?php echo $_SESSION['Cart'][$i]['quantity']; ?> min="1" max="100">
										</div>
									</td>

									<td class="total">$NT<?php $subtotal = $_SESSION['Cart'][$i]['price'] * $_SESSION['Cart'][$i]['quantity']; echo $subtotal; ?></td>
								</tr>
								<?php 
                                        $total += $subtotal;
                                        
                                        } 
                                        $_SESSION['TotalPrice'] = $total;
                                        ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col-lg-12 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>訂單總計</h3>
						<p class="d-flex">
							<span>商品總計</span>
							<span>$NT <?php echo $total ?></span>
						</p>
						<p class="d-flex">
							<span>Delivery</span>
							<span>$0.00</span>
						</p>
						<p class="d-flex">
							<span>Discount</span>
							<span>$0.00</span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>總金額</span>
							<span>$NT <?php echo $total ?></span>
						</p>
					</div>
					<p><a href="checkout.php" class="btn btn-primary py-3 px-4">我要結帳</a></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
					<span>Get e-mail updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<input type="text" class="form-control" placeholder="Enter email address">
							<input type="submit" value="Subscribe" class="submit px-3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- *** footer begin *** -->
	<?php require_once('template/footer.php'); ?>
	<!-- *** footer END *** -->


</body>

</html>