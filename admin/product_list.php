 <?php
 $kq=$qt->Product_List(); ?>
 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Sản Phẩm
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản Phẩm (CL/LSP/Anh)</th>
                                    <th>Size</th>
                                    <th>Giá</th>
                                    <th>Số Lượng Tồn Kho</th>
                                    <th>Trạng Thác</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $stt=0; while ($rowSP=$kq->fetch_array()) {$stt++;?>
                                  <tr align="center">
                                    <td><?=$stt;?></td>
                                    <td ><img src="<?="../upload/hinhchinh/".$rowSP['urlHinh']?>" alt="" style="width: 100px;margin-bottom: 5px;">
                                        <p style="color:#0A0A0A">Sản phẩm: <?php echo $rowSP['TenSP'];?></p>
                                        <p>Chủng loại :<?=$rowSP['TenCL']?>-<?=$rowSP['TenLoai']?></p>
                                    </td>
                                    <td><?=$rowSP['Size']?></td>
                                    <td><?=number_format($rowSP['Gia'],0,',','.').' VNĐ';?></td>
                                    <td><?=$rowSP['SoLuongTonKho']?></td>
                                    <td><?=$rowSP['AnHien']==1?'Hiện':'Ẩn'?></td>
                                    <td width="250px"><a href="?p=img_list&idSP=<?=$rowSP['idSP']?>" class="btn bg-blue waves-effect">List Hình Ảnh</a>&nbsp <a href="?p=pro_edit&idSP=<?=$rowSP['idSP']?>" class="btn bg-blue waves-effect">Cập Nhật</a>
                                        <a href="?p=pro_delete&idSP=<?=$rowSP['idSP']?>" class="btn bg-red waves-effect" onclick="return confirm('Bạn Có Chắc Muốn Xóa  Sản Phẩm Này ?');">Xóa</a> </td>
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