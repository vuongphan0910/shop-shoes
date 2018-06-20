	<?php
  if(isset($_GET['idSP']))
    $idSP=$_GET['idSP'];
  if(isset($_POST['btn_addimg']))
  {
    if(isset($_POST['idSP']))
      $idSP=$_POST['idSP'];
    if(isset($_POST['num']))
     $num=$_POST['num'];
   $qt->Upload($num,$idSP);
   if(isset($_SESSION['idSP_add'])){
    unset($_SESSION['idSP_add']);
  }
  header("location:index.php?p=pro_add");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container-fluid">
  <!-- Basic Validation -->
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>Thêm Ảnh Sản Phẩm</h2>
        </div>
        <div class="body">
          <form action="" method="post">
           <div class="form-group form-float">
            <div class="form-line">
              <input type="text" class="form-control" name="txt_num" required>
              <input type="hidden" class="form-control" name="idSP" value="<?=$idSP?>">
              <label class="form-label">Nhập số lượng ảnh cần thêm</label>
              <input type="submit" name="btn_num" value="Thêm ảnh" />
            </div>
          </div>
        </form>
        <?php  if(isset($_POST['btn_num'])){?>
          <form action="" id="form_validation" method="POST" enctype='multipart/form-data'>
            <div class="form-group form-float" style="width: 50%;">
              <?php $num=$_POST['txt_num'] ;
              for($i=0;$i<$num;$i++){
                ?>
                <div class="form-line">
                  <input type='hidden' value='<?=$_POST['idSP']?>' name='idSP' />
                  <input type='hidden' value='<?=$_POST['txt_num']?>' name='num' />
                  <label class="form-label">urlHinh</label>
                  <input type='file' name='img[]'  required  /><br />
                </div>
              <?php }?>
            </div>
            <button class="btn btn-primary waves-effect" id='' name="btn_addimg" 
            type="submit">Thêm Ảnh Sản Phẩm</button>
          </form>
        <?php  }?>
      </div>
    </div>
  </div>
</div>
<!-- #END# Basic Validation -->
</div>



