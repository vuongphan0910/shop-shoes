<?php 
if(isset($_GET['idSP']))
$idSP=$_GET['idSP'];
else $idSP=-1;
$kq=$qt->IMG_list($idSP) ?>
<div class="container-fluid">
            <!-- Image Gallery -->
            <div class="block-header">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <?php if($idSP!=-1){ ?>
                            <a href="?p=pro_img&idSP=<?=$idSP?>" class="btn bg-blue waves-effect  " class="" >Thêm Hình Ảnh</a>
                        </div>
                    <?php } ?>
                        <div class="body">
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <?php while ($d=$kq->fetch_array()) {
                                     ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="../upload/hinhphu/<?=$d['urlHinh']?>" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="../upload/hinhphu/<?=$d['urlHinh']?>">
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>