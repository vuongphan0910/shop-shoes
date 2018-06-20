 <?php 
 $kq=$qt->DH_List();
 ?>
 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Danh Sách Đơn Hàng
                    </h2>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>idDH</th>
                                        <th>Tên Người Đặt Hàng</th>
                                        <th>Thời Điểm Đặt Hàng</th>
                                        <th>Địa Chỉ </th>
                                        <th>Số Điện Thoại</th>
                                        <th>Hình Thức Thanh Toán</th>
                                        <th>Xác Nhận Đơn Hàng</th>
                                        <th>Thao Tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($rowDH=$kq->fetch_array()) {?>
                                        <tr>
                                            <td><?=$rowDH['idDH']?></td>
                                            <td><?=$rowDH['TenNguoiNhan']?></td>
                                            <td><?=date('H:i:s - d/m/Y',strtotime($rowDH['ThoiDiemDatHang']));?></td>
                                            <td><?=$rowDH['DiaChi']?></td>
                                            <td><?=$rowDH['DTNguoiNhan']?></td>
                                            <td><?php echo $rowDH['idPTTT']=='cod'?'Trả Tiền Khi Giao Hàng':'Chuyển Khoản';?></td>
                                            <td><img src="images/AnHien_<?=$rowDH['DaXuLy']?>" class="xacnhan" alt="" idDH="<?=$rowDH['idDH']?>">
                                                <p class="tb<?=$rowDH['idDH']?>"></p></td>
                                                <td><a href="?p=dh_detail&idDH=<?=$rowDH['idDH']?>" class="btn bg-blue waves-effect">Chi Tiết Đơn Hàng</a><a href="?p=dh_del&idDH=<?=$rowDH['idDH']?>" class="btn bg-red waves-effect" onclick="return confirm('Bạn có chắc muốn xóa Đơn Hàng này ?')">Xóa Đơn Hàng</a></td>
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
        <script  type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
              $("img.xacnhan").click(function(){
                idDH=$(this).attr("idDH");
                obj=this;
                $.get({
                    url:'xacnhandh.php',
                    data:'idDH='+idDH,
                    //cache:false,
                    success:function(d){
                        obj.src=d;
                    }
                });
            })
          })
      </script>