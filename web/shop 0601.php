<?php
session_start();
require_once('../connection/connection.php');
$limit = 2;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page - 1) * $limit;
if ($_GET['categoryID']== 0){
	$query = $db->query("SELECT * FROM products  ORDER BY created_at DESC LIMIT " . $start_from . "," . $limit);
}else{
	$query = $db->query("SELECT * FROM products WHERE product_categoryID = " . $_GET['categoryID'] . " ORDER BY created_at DESC LIMIT " . $start_from . "," . $limit);
}

$products = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($products);
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('template/head.php'); ?>

<body class="goto-here">
	<?php require_once('template/navbar.php'); ?>
	<!-- *** NAVBAR END *** -->




	<section class="ftco-section">
		<div class="container">
			<!-- 產品分類開始 屆時用jquery控制-->
			<div class="row justify-content-center">
				<div class="col-md-10 mb-5 text-center">
					<ul class="product-category">
						<li><a href="shop.php?categoryID=0" class="active">All</a></li>
						<li><a href="shop.php?categoryID=1">蔬菜</a></li>
						<li><a href="shop.php?categoryID=2">水果</a></li>
						<li><a href="shop.php?categoryID=3">果汁</a></li>
						<li><a href="shop.php?categoryID=4">堅果</a></li>
					</ul>
				</div>
			</div>
			<!-- 產品分類結束 -->


			<!-- 產品顯示開始 -->
			<div class="row">
				<?php foreach ($products as $product) { ?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="product-single.php?productID=<?php echo $product['productID']; ?>" class="img-prod"><img class="img-fluid" src="../images/uploads/products/<?php echo $product['picture']; ?>" alt="Colorlib Template">
								<span class="status">30%</span>
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="product-single.php?productID=<?php echo $product['productID']; ?>"><?php echo $product['name']; ?></a> </h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="product-single.php?productID=<?php echo $product['productID']; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<!-- 產品顯示結束 -->


			<!-- 頁次處理開始 -->
			<?php
			$query2 = $db->query("SELECT * FROM products");
			$data = $query2->fetchAll(PDO::FETCH_ASSOC);
			$total_pages = ceil(count($data) / $limit);
			echo 'oao oao oao' ;
			echo 'total_pages='.$total_pages;
			?>

			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">


						<ul>
							<li>
								<?php if ($page == 1) { ?>
									<a class="disabled" href="">&lt;</a>
								<?php } else { ?>
									<a href="shop.php?page=<?php echo $page - 1; ?>">&lt;</a>
								<?php } ?>
							</li>

							<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
								<!-- 判斷目前是否在此頁 -->
								<?php if ($page == $i) { ?>
									<li class="active">
									<?php } else { ?>
									<li class="page-item">
									<?php } ?>
									<a href="shop.php?page=<?php echo $i; ?>&&categoryID=<?php echo $_GET['categoryID']; ?>"><?php echo $i; ?></a>
									</li>
								<?php } ?>

								<li>
									<?php if ($page ==  $total_pages) { ?>
										<a class="disabled" href="">&gt;</a>
									<?php } else { ?>
										<a href="shop.php?page=<?php echo $page + 1; ?>">&gt;</a>
									<?php } ?>
								</li>

						</ul>

					</div>
				</div>
			</div>
			<!-- 頁次處理結束 -->



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