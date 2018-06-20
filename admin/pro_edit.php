<?php
if(isset($_GET['idSP']))
    $idSP=$_GET['idSP'];
$kq=$qt->Detail_SP($idSP);
$rowSP=$kq->fetch_array();
if(isset($_POST['btn_editpro']))
{
    $qt->Product_edit($idSP);
    header("location:index.php?p=pro_list");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container-fluid">
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Sửa Sản Phẩm</h2>                     
                </div>
                <div class="body">
                    <form id="form_validation" method="post" enctype="multipart/form-data" >
                       <div class="row clearfix ">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"    >
                            <div class="form-line">
                                <select class="form-control show-tick" name="idCL" id="idCL"  > 
                                    <?php $listCL=$qt->ListChungLoai(); while($rowCL=$listCL->fetch_array()) { ?>
                                        <option value="<?=$rowCL['idCL']?>" <?=$rowCL['idCL']==$rowSP['idCL']?'selected':''?>><?=$rowCL['TenCL']?> 
                                    </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"  >
                        <select class="form-control show-tick" name="idLoaiSP" id="idLoaiSP"  >
                           <option>--- Chọn Loại Sản Phẩm ---</option>
                       </select>
                   </div>
               </div>
               <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" class="form-control" name="TenSP" id="TenSP" required value="<?=$rowSP['TenSP']?>">
                    <label class="form-label">Tên Sản Phẩm</label>
                    <b id="kq_sp"style="color: red"></b>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" class="form-control" name="size" id="size"  value="<?=$rowSP['Size']?>" required>
                    <label class="form-label">Size</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" class="form-control" name="TonKho" value="<?=$rowSP['SoLuongTonKho']?>" required>
                    <label class="form-label">Số Lượng Tồn Kho</label>
                </div>
            </div>

            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" class="form-control" name="gia"  value="<?=$rowSP['Gia']?>" required>
                    <label class="form-label">Giá Sản Phẩm</label>
                </div>
            </div> 
            <div class="form-group form-float" style="width: 50%;"> 
                <div class="form-line">
                   <img src="../upload/hinhchinh/<?=$rowSP['urlHinh']?>" alt="" style="width: 100px;margin-bottom: 5px;">
                   <input type="text" name="urlHinh" id="urlHinh" value="<?=$rowSP['urlHinh']?>"> 
                   <label class="form-label">urlHinh</label>
                   <input type="file" name="hinh" id='hinh' >
               </div>
           </div> 
           <div class="row clearfix"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="radio" id="AnHien_0" name="AnHien" class="form-control" value="0" <?=$rowSP['AnHien']==0?'checked':''?>>
                        <label for="AnHien_0">Ẩn</label>
                        <input type="radio" id="AnHien_1" name="AnHien" class="form-control" value="1"  <?=$rowSP['AnHien']==1?'checked':''?>>
                        <label for="AnHien_1">Hiện</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group form-float">
            <h4>Bài Viết Sản Phẩm</h4>
            <div class="form-line">
                <textarea name="baiviet"  id="ckeditor" cols="30" rows="5" class="form-control no-resize" required><?=$rowSP['baiviet']?></textarea>

            </div>
        </div> 
        <button class="btn btn-primary waves-effect" id='' name="btn_editpro"  type="submit">Sửa Sản Phẩm</button>
    </form>
</div>
</div>
</div>
</div>
<!-- #END# Basic Validation --> 
</div>
<script >
    $(document).ready(function(){
        lay_TL($('#idCL').val(),<?=$idSP?>);

        $("#idCL").change(function(){
         lay_TL($('#idCL').val(),<?=$idSP?>);
     });

        $('#size').blur(function(){
         $.get('check_sp.php',
            'TenSP='+$('#TenSP').val()+'&size='+$('#size').val(),
            function(d){
                $('#kq_sp').html(d);
            })
     });
    });
    function lay_TL(a,b){
        $.get(
            'layloaisp_edit.php',
            'idCL='+a+'&idSP='+b,
            function(html){
                $("#idLoaiSP").html(html);
            });
    } 
</script>


