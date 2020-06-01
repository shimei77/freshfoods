<?php
 session_start();
require_once('../../connection/connection.php'); 

if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){

    //判斷是否有資料夾
    if (!file_exists('../../images')) {
      mkdir('../../images', 0755, true);
    }
      //圖片上傳程式碼
  if(isset($_FILES['picture']['name'])){
    $filename = $_FILES['picture']['name'];
    $file_path = "../../images/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $file_path);
  }else{
    $filename = null;
  }
  //end 圖片上傳程式碼

  $sql= "INSERT INTO products  (picture,name, description, price, product_categoryID,created_at) VALUES ( :picture, :name, :description, :price, :product_categoryID, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":product_categoryID", $_POST['product_categoryID'], PDO::PARAM_INT);
 $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();



header('Location: list.php?categoryID='.$_POST['product_categoryID']);
} ?>
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
              <h1>商品管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="#">首頁</a> </li>
                <li class="breadcrumb-item"><a href="#">商品管理</a></li>
                <li class="breadcrumb-item active">新增一筆</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="list.php?categoryID=<?php echo $_GET['categoryID']; ?>">回上一頁</a></div>
              </div>
              <form id="AddForm" class="text-right" method="post" action="create.php" enctype="multipart/form-data">
              <div class="form-group row"> <label for="picture" class="col-2 col-form-label">圖片</label>
                  <div class="col-10 text-left">
                    <img id="pic" src="" alt="" width="200" style="margin-bottom: 20px;">
                    <input type="file" class="form-control-file" id="picture" name="picture"> 
                  </div>
                </div>                
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">品名</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="name" name="name"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">價格</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="price" name="price"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">描述</label>
                  <div class="col-10">
                    <textarea rows="5" class="form-control" name="description" id="description"></textarea> </div>
                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="AddForm" value="INSERT">
                    <input type="hidden" name="product_categoryID" value="<?php echo $_GET['categoryID']; ?>">                    
                </div>
                <button type="submit" class="btn mr-3 btn-primary">取消並回上一頁</button><button type="submit" class="btn btn-secondary">確定送出</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('../layouts/footer.php'); ?>
  <script>
    $('#picture').change(function() {
    var file = $('#picture')[0].files[0];
    var reader = new FileReader;
    reader.onload = function(e) {
      $('#pic').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
  });
  $(function(){
      $( "#published_date" ).datepicker({
      dateFormat: "yy-mm-dd"
      });
  });
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'description' );

  ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
</body>

</html>