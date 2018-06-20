  <?php
  $idCM=$_GET['idCM'];
  $kq=$qt->BL_detail($idCM) ;
  if($kq)
    $row=$kq->fetch_array();
if(isset($_POST['bl_edit']))
{
    $qt->BL_edit($idCM);
    echo "<script>document.location='index.php?p=comment'</script>";
    exit();
}
?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float: none">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Bình Luận
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        
                    </li>
                </ul>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="hoten">Họ Tên : </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="hoten" class="form-control" name="hoten" disabled value="<?=$row['hoten']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email">Email :</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="email" name="email" class="form-control" disabled  value="<?=$row['email']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email">Nội dung :</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="noidung" id="noidung" cols="30" rows="10"><?=$row['noidung']?></textarea>
                                    
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
                                    <input type="radio" id="AnHien_0" name="AnHien" class="form-control" value="0" <?php echo $row['kiem_duyet']==0?"checked":"" ?> >
                                    <label for="AnHien_0">Ẩn</label>
                                    <input type="radio" id="AnHien_1" name="AnHien" class="form-control" value="1" <?php echo $row['kiem_duyet']==1?"checked":"" ?> >
                                    <label for="AnHien_1">Hiện</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="bl_edit">Sửa bình luận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>