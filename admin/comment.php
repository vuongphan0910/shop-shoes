 <?php 
 $kq=$qt->BL_list();
 ?>
 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Bình Luận
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
                     <?php if(isset($_SESSION['thanhcong'])) { ?>
                            <div class="alert alert-success">
                                <strong><?php  echo $_SESSION['thanhcong'];unset($_SESSION['thanhcong']); ?></strong>  
                            </div>
                        <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Họ Tên</th>
                                    <th>Email</th>
                                    <th>Nội Dung</th>         
                                    <th>Ngày</th>
                                    <th>idSP</th>
                                    <th>Kiểm Duyệt</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php while($rowBL=$kq->fetch_array()){?>
                                  <tr>
                                    <td><?=$rowBL['hoten']?></td>
                                    <td><?=$rowBL['email']?></td>
                                    <td><?=$rowBL['noidung']?></td>
                                    <td><?=date('h:m:s d-m-Y',strtotime($rowBL['ngay_comment']))?></td>
                                    <td><?=$rowBL['idSP']?></td>
                                    <td><?=$rowBL['kiem_duyet']==1?'Hiện':'Ẩn'?></td>
                                    <td><a href="?p=cm_edit&idCM=<?=$rowBL['id_comment']?> " class="btn bg-blue waves-effect">Sửa BL</a>  <a href="?p=cm_del&idCM=<?=$rowBL['id_comment']?>" class="btn bg-red waves-effect" onclick="return confirm('Bạn có chắc muốn xóa bình luận này ?')">Xóa BL</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->

</div>