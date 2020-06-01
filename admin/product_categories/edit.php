<?php require_once('../functions/login_check.php');
require_once('../../connection/connection.php'); ?>
<?php
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "EDIT"){
  $sql= "UPDATE product_categories SET category=:category, updated_at=:updated_at where product_categoryID=:product_categoryID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":product_categoryID", $_POST['product_categories'], PDO::PARAM_INT);
  $sth ->bindParam(":category", $_POST['category'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->execute();

  // print_r($sql);
  // echo '這是sql'.'<br>';
  // print_r($_POST);
  // echo '這是post'.'<br>';
  // print_r($sth);
  // echo '這是STH'.'<br>';
   header('Location: list.php');
}  else{
    $query = $db->query("SELECT * FROM product_categories WHERE product_categoryID =".$_GET['categoryID']);
    $product_categories = $query->fetch(PDO::FETCH_ASSOC);
} 
?>
<!DOCTYPE html>
<html>

    <?php require_once('../layouts/head.php'); ?>
  <style>
    .ck-editor__editable_inline {
  min-height: 300px;
}
  </style>
    <body style="">
        <?php require_once('../layouts/navbar.php'); ?>  

        <div class="py-4">
          <div class="container">
            <div class="row">
               <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                    <h1>商品分類管理</h1>
                    </div>
                    <div class="card-body">
                    <ul class="breadcrumb mb-2">
                      <li class="breadcrumb-item"> <a href="#">首頁</a> </li>
                      <li class="breadcrumb-item"><a href="#">商品分類管理</a></li>
                      <li class="breadcrumb-item active">編輯</li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12 my-3"><a class="btn btn-primary" href="list.php">回上一頁</a></div>
                    </div>
                  <form id="EditForm" class="text-right" method="post" action="edit.php">
                    <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">品名</label>
                                                <div class="col-10">
                    <input type="text" class="form-control" id="name" name="category" value="<?php echo $product_categories['category']; ?>"> </div>
                    <input type="hidden" name="EditForm" value="EDIT">
                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="product_categories" value="<?php echo $_GET['categoryID']; ?>">
                </div>
                <button a href="list.php" class="btn mr-3 btn-primary">取消並回上一頁</button>
                <button type="submit" class="btn btn-secondary">確定送出</button>
              </form>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('../layouts/footer.php'); ?>
</body>

</html>