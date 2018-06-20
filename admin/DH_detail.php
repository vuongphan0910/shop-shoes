 <?php 
 if(isset($_GET['idDH']))
    $idDH=$_GET['idDH'];
$kq=$qt->DH_detail($idDH);
$tong=0;
$tongcong=0;
?>
<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                     Chi Tiết Đơn Hàng 
                 </h2>
             </div>
             <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>IDĐH</th>
                                <th>ID Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng Đặt Mua</th>
                                <th>Giá</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rowCT=$kq->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?=$rowCT['idDH']?></td>
                                    <td><?=$rowCT['idSP']?></td>
                                    <td><?=$rowCT['TenSP']?></td>
                                    <td><?=$rowCT['SoLuong']?></td>
                                    <td><?=number_format($rowCT['Gia'],"0",',','.')." VND"?></td>
                                    <td><?=number_format($tong=$rowCT['SoLuong']*$rowCT['Gia'],"0",',','.')." VND";$tongcong+=$tong?></td>
                                </tr>
                            <?php } ?>
                            <tr ><td colspan="6"><p style="float: right">Tổng Cộng : <?=number_format($tongcong,"0",',','.')." VND";?></p><a href="?p=dh_list" class="btn bg-blue waves-effect" style="float: left">Quay Lại Danh Sách Đơn Hàng</a></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->

</div>