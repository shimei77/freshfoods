<?php session_start(); ?>
<?php require_once('../../connection/connection.php'); ?>
<?php
$limit = 5;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page =1;
}
$start_from = ($page-1) * $limit;
// $categoryID=$_GET['categoryID'];
$query = $db->query("SELECT * FROM products WHERE product_categoryID = ".$_GET['categoryID']." ORDER BY productID DESC LIMIT ".$start_from.",".$limit);
$all_products = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r($all_products);


// $query = $db->query("SELECT * FROM products ORDER BY productID DESC");
// $all_products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<?php require_once('../layouts/head.php'); ?>

<body style="">
  <?php require_once('../layouts/navbar.php'); ?>
  
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>商品管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="../product_categories/list.php">首頁</a> </li>
                <li class="breadcrumb-item active">商品管理</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="create.php?categoryID=<?php echo $_GET['categoryID'];?>">新增一筆</a></div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">圖片</th>
                      <th scope="col">品名</th>
                      <th scope="col">價格</th>
                      <th scope="col">描述</th>
                      <th scope="col" width="20%">操作</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($all_products as $products){  ?>
                    <tr>
                      <td><img src="../../images/uploads/products/<?php echo $products['picture']; ?>" width="50" alt="<?php echo $products['picture']; ?>"></td>
                      <td><?php echo $products['name']; ?></td>
                      <td><?php echo $products['price']; ?></td>
                      <td><?php echo $products['description']; ?></td> 
                      <td><a class="btn btn-secondary" href="edit.php?productID=<?php echo $products['productID'] ;?>&&categoryID=<?php echo $_GET['categoryID'];?>"> <i class="fa fa-pencil-square-o fa-fw"></i>&nbsp;編輯</a>
                          <a class="btn btn-secondary ml-2" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};"  href="delete.php?productID=<?php echo $products['productID'];?>&&categoryID=<?php echo $_GET['categoryID'];?>"><i class="fa fa-fw fa-trash-o"></i>&nbsp;刪除</a>
                          </td>
                    </tr>
                  <?php }  ?>
                  </tbody>
                </table>
              </div>



              <?php
                $query2 = $db->query("SELECT * FROM products WHERE product_categoryID = ".$_GET['categoryID']);
                $data = $query2->fetchAll(PDO::FETCH_ASSOC);
                $total_pages = ceil(count($data)/ $limit);

                // echo 'qqqqqqqqqqqqqqq';
                // $g=count($data);
                // echo '</br>' ;
                // echo 'g='.$g;
                // echo '</br>' ;
                // echo $total_pages;
                // print_r($total_pages);

              ?>
                  <ul class="pagination my-3 justify-content-center">
                    <li class="page-item"> 

                            <!-- 頁數超過1，上一頁可連結 -->
                            <?php if ($page == 1) { ?>
                                <a class="page-link disabled" href="">
                                <?php } else { ?>
                                    <a class="page-link" href="list.php?page=<?php echo $page - 1; ?>">
                                    <?php } ?>
                                    <span>«</span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                  </li>

                    <?php for ($i = 1; $i <= $total_pages; $i++){?>
                  <!-- 判斷目前是否在此頁 -->
                    <?php   if($page == $i){ ?>
                      <li class="page-item active"> 
                    <?php }else{ ?>
                      <li class="page-item"> 
                    <?php } ?>
                    <a class="page-link" href="list.php?categoryID=<?php echo $_GET['categoryID'];?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> </li>
                    <?php } ?>
                   
                    <li class="page-item"> 
                    <?php if ($page ==  $total_pages) { ?>
                                    <a class="page-link disabled" href="">
                                    <?php } else { ?>
                                        <a class="page-link" href="list.php?page=<?php echo $page + 1; ?>">
                                        <?php } ?>
                                        <span>»</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                  </li>
                  </ul>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../layouts/footer.php'); ?>

</body>

</html>