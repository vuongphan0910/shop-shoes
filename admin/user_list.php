<?php $kq=$qt->User_List(); ?>
 <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Quản Trị User
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Địa Chỉ</th>
                                            <th>SĐT</th>
                                            <th>Group</th>
                                        </tr>
                                    </thead>
                                   
                                   <tbody>
                                    <?php while($rowUser=$kq->fetch_array()){?>
                                      <tr>
                                            <td><?=$rowUser['HoTen']?></td>
                                            <td><?=$rowUser['Email']?></td>
                                            <td><?=$rowUser['DiaChi']?></td>
                                            <td><?=$rowUser['DienThoai']?></td>
                                            <td><?=$rowUser['idGroup']==1?'Admin':'User'?></td>
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