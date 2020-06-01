<?php
// $query = $db->query("SELECT * FROM product_categories ORDER BY product_categoryID ASC");
// $product_categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>


   <!-- *** NAVBAR ***
_________________________________________________________ -->
<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 0970 235 598</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">freshfood@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5個工作日內發貨 &amp; 不滿意免費退貨</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../index.php">freshfoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			  <li class="nav-item"><a href="../index.php" class="nav-link">首頁</a></li>
			  <li class="nav-item active"><a href="shop.php?categoryID=0" class="nav-link">產品介紹</a></li>
	          <!-- <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">購買</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">購買</a>
              	<a class="dropdown-item" href="wishlist.php">願望清單</a>
                <a class="dropdown-item" href="product-single.php">詳細介紹</a>
                <a class="dropdown-item" href="cart.php">購物車</a>
                <a class="dropdown-item" href="checkout.php">結帳</a>
              </div>
            </li> -->
	          <li class="nav-item"><a href="about.php" class="nav-link">關於我們</a></li>
	          <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="contact.php" class="nav-link">連絡我們</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php  if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
	<!-- END nav -->
	<div class="hero-wrap hero-bread" style="background-image: url('../images/bg_1.jpg');">
      <!-- <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div> -->
    </div>