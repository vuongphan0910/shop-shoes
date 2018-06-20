 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Chủng Loại
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
                   <?php if(isset($_SESSION['loi'])) { ?>
                      <div class="alert alert-danger">
                        <strong> <?php  echo $_SESSION['loi'];unset($_SESSION['loi']) ?></strong>
                    </div>
                <?php } ?>
                <?php if(isset($_SESSION['thanhcong'])) { ?>
                    <div class="alert alert-success">
                        <strong><?php  echo $_SESSION['thanhcong'];unset($_SESSION['thanhcong']) ?></strong>  
                    </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Chủng Loại</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $kq=$qt-> ListChungLoai();
                         $i=0;
                         while ($rowCL=$kq->fetch_array()) {
                            $i++;
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$rowCL['TenCL']?></td>
                                <td><?php echo $rowCL['AnHien']==1?'Hiện' : 'Ẩn'?></td>
                                <td align="center"><a href="?p=chungloai_edit&idCL=<?= $rowCL['idCL']?>"class="btn bg-blue waves-effect">Cập Nhật</a>&nbsp <a href="?p=chungloai_delete&idCL=<?= $rowCL['idCL']?>" title="" class="btn bg-red waves-effect" onclick="return confirm('Bạn Có Chắc Muốn Xóa Chủng Loại Sản Phẩm Này ?');">Xóa</a></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- #END# Basic Examples -->
</div>