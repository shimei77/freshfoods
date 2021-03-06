<?php
session_start();
//print_r($_SESSION['Receiver']);
require_once('../connection/connection.php');
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div> -->

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-7 ftco-animate">
					<form method="post" action="checkout.php">
						<h1>結帳</h1>
						<h3>填寫收件者資料</h3>
						<div class="content">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label for="firstname">姓名</label>
										<input type="text" class="form-control" id="name" name='name'>
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label for="phone">行動電話</label>
										<input type="text" class="form-control" id="phone" name='phone'>
									</div>
								</div>
								<div class="col-sm-6  col-md-4">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" class="form-control" id="email" name='email'>
									</div>
								</div>
							</div>


							<!-- <div class="row"> -->
							<div id="twzipcode">
								<div class="row">
									<div class="col-sm-6 col-md-4">
										<div class="form-group">
											<label for="zip">郵遞區號</label>
											<input type="text" class="form-control" id="zipcode" name='zipcode'>
										</div>
									</div>
									<div class="col-sm-6 col-md-4">
										<div class="form-group">
											<label for="state">縣市</label>
											<select class="form-control" id="county" name='county'></select>
										</div>
									</div>
									<div class="col-sm-6 col-md-4">
										<div class="form-group">
											<label for="country">區域</label>
											<select class="form-control" id="district" name='district'></select>
										</div>
									</div>
								</div>

								<div class="col-sm-12  col-md-12">
									<div class="form-group">
										<label for="email">住址</label>
										<input type="text" class="form-control" id="address" name='address'>
									</div>
								</div>

							</div>
							<!-- /.row -->
						</div>

						<div class="box-footer">
							<!-- <div class="pull-left">
                                    <a href="cart.php" class="btn btn-primary"><i class="fa fa-chevron-left"></i>回購物車</a>
                                </div> -->
							<!-- <div class="pull-right">
								<button type="submit" class="btn btn-primary">下一步<i class="fa fa-chevron-right"></i>
								</button>
							</div> -->
						</div>
					</form>

				</div>
				<div class="col-xl-5">
					<div class="row mt-5 pt-3">
						<div class="col-md-12 d-flex mb-5">
							<div class="cart-detail cart-total p-3 p-md-4">
								<h3 class="billing-heading mb-4">訂單總計</h3>
								<p class="d-flex">
									<span>商品總計</span>
									<span>$NT <?php echo $_SESSION['TotalPrice']; ?></span>
								</p>
								<p class="d-flex">
									<span>Delivery</span>
									<span>$0.00</span>
								</p>
								<p class="d-flex">
									<span>Discount</span>
									<span>$3.00</span>
								</p>
								<hr>
								<p class="d-flex total-price">
									<span>總金額</span>
									<span>$NT <?php echo $_SESSION['TotalPrice']; ?></span>
								</p>
							</div>
						</div>
						<div class="col-md-12">
							<div class="cart-detail p-3 p-md-4">
								<h3 class="billing-heading mb-4">Payment Method</h3>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
											<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
										</div>
									</div>
								</div>
								<p><a href="order_success.php" class="btn btn-primary py-3 px-4">確定結帳</a></p>
							</div>
						</div>
					</div>
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section> <!-- .section -->

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

	<script src="../js/jquery.twzipcode.min.js"></script>
	<script>
		$(function() {
			$('#twzipcode').twzipcode();
			// $zipcode = $('input[name="zipcode"]').text();
			// $county = $('select[name="county"]').text();
			// $district = $('select[name="county"]').value();
			// if($zipcode == null) $zipcode = '106';
			// if($county == null) $county = '臺北市';
			// if($district == null) $district = '大安區';
			// $('#twzipcode').twzipcode({
			//     'zipcodeSel'  : ; // 此參數會優先於 countySel, districtSel
			//     'countySel'   : ;
			//     'districtSel' : ;
			// });
			$('#twzipcode').find('select[name="county"]').eq(1).remove();
			$('#twzipcode').find('select[name="district"]').eq(1).remove();
			$('#twzipcode').find('input[name="zipcode"]').eq(1).remove();
		});
	</script>


</body>

</html>