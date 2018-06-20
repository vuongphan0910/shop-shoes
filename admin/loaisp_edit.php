  <?php
  $rowLSP=null;
  if(isset($_GET['idLoai']))
    $idLoai=$_GET['idLoai'];
settype($idLoai,'int');
$kq=$qt->Detail_LoaiSP($idLoai);
$rowLSP=$kq->fetch_array();
    //$loi=array();
if(isset($_POST['lsp_edit']))
{
    $lsp=$qt->Edit_LoaiSP($idLoai); 
    echo "<script>document.location='index.php?p=loaisp_list'</script>";
    exit();
} 
?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float: none">
        <div class="card">
            <div class="header">
                <h2>
                    Cập Nhật Loại Sản Phẩm
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
               <form class="form-horizontal" method="post" action="">
                   <div class="row clearfix ">
                       <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="idCL">Tên Chủng Loại</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7"  >
                        <select class="form-control show-tick" name="idCL" id="idCL"> 
                            <?php $listCL=$qt->ListChungLoai(); while($rowCL=$listCL->fetch_array()) { ?>
                                <option value="<?=$rowCL['idCL']?>"<?=$rowLSP['idCL']==$rowCL['idCL']?'selected':''; ?> ><?=$rowCL['TenCL']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="TenLT">Tên Loại Sản Phẩm :</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="TenLoai" class="form-control" placeholder="Nhập Tên Loại Tin" name="TenLoai" minlength="3" maxlength="20" minlength="3" required
                                value="<?php echo $rowLSP['TenLoai'];
                                ?>"
                                >
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="ThuTu">Thứ Tự :</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập Thứ Tự Xuất Hiện" value="<?=$rowLSP['ThuTu']?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="AnHien">Ẩn Hiện :</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="radio" id="AnHien_0" name="AnHien" class="form-control" value="0" <?php if($rowLSP['AnHien']==0) echo "checked='checked'" ?>>
                                <label for="AnHien_0">Ẩn</label>
                                <input type="radio" id="AnHien_1" name="AnHien" class="form-control" value="1" <?php if($rowLSP['AnHien']==1) echo "checked='checked'" ?>>
                                <label for="AnHien_1">Hiện</label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?=$idLoai?>" name='idLoai' id='idLoai'>
                <div class="row clearfix">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="lsp_edit" >Cập Nhật Loại Sản Phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" charset="utf-8" async defer>

    $(document).ready(function(){


    }
</script>