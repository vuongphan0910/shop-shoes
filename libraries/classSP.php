<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "classDB.php";
class sp extends DB{
	function ListCL(){
		$sql="select * from chungloai order by ThuTu";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}//ListCL()

	function ListLoai_inCL($idCL){
		$sql="select * from loaisp where idCL=$idCL order by ThuTu";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}//List loaisptrongcl

	function ListTin_TrongLoai($idCLa,$idLoai,$page,$limit,&$tongdong){
		$vitri=($page-1)*$limit;
		$sql="select * from sanpham where AnHien=1 And (idLoai=$idLoai AND idCL=$idCLa) Group by TenSP order by NgayCapNhat DESC Limit $vitri,$limit ";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		$sql="select count(*) as sosp from sanpham where AnHien=1 And (idLoai=$idLoai AND idCL=$idCLa) Group by TenSP";
		$rs=$this->db->query($sql);
		$tongdong=$rs->num_rows;
		 
		if(!$kq) die($this->db->error);
		return $kq;
	}//List loaisptrongcl

	function Phantrang($baseUrL,$tongdong,$page,$limit,$offset){
		if($tongdong<$limit||$tongdong<=0)
			return "";
		$totalPages=ceil($tongdong/$limit);
		$from=$page-$offset;
		$to=$page+$offset;
		if($from<=0)
		{
			$from=1;
			$to=$offset*2;
		}
		if($to>$totalPages)
		{
			$to=$totalPages;
		}
		$links="<ul class='pagination'>";
		for($i=$from;$i<=$to;$i++){
			if($i==$page)
				$links=$links."<li><span>$i</span></a><li>";
			else
				$links=$links."<li><a href='$baseUrL/$i/'>$i</a><li>";
		}//for
		$links=$links."</ul>";
		return $links;
	}

	function Blog($sotin){
		$sql="select * from tin where AnHien=1 Order By rand() limit 0,$sotin";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
		}//end blog()

		function SP_new($sosp){
			$sql="select * from sanpham  where AnHien=1 Group by TenSP Order By NgayCapNhat DESC limit 0,$sosp";
			$kq=$this->db->query($sql);
			if(!$kq) die($this->db->error);
			return $kq;
		}

		function SP_BanChay($sosp){
			$sql="select * from sanpham where AnHien=1 Order By SoLanMua DESC limit 0,$sosp";
			$kq=$this->db->query($sql);
			if(!$kq) die($this->db->error);
			return $kq;
		}//end SP_BanChay

		function ChiTietSP($idSP){
			$sql="select * from sanpham where idSP=$idSP";
			$kq=$this->db->query($sql);
			return $kq;
		}
		
		function SP_LQ($idLoai){
			$sql="select * from sanpham where idloai=$idLoai group by TenSP order by rand() limit 0,8";
			$kq=$this->db->query($sql);
			return $kq;
		}
		
		function Cart($action,$idSP){
			$k=count($_SESSION['giohang']);
			if($action=='add'){		
				if(isset($_GET['sl']))
					{$sl=$_GET['sl'];}
				else $sl=1;
	 			$flag=0;//kt co san phan trong gio hang hay chua .
	 			for($i=0;$i<$k;$i++){
	 				if($_GET['idSP']==$_SESSION['giohang'][$i]['idSP']){
	 					$flag=1;
	 					$_SESSION['giohang'][$i]['sl']+=$sl;
	 				}	
	 			}
	 			if($flag==0){
	 				$sql="select * from sanpham where idSP=$idSP";
	 				$kq=$this->db->query($sql);
	 				if(!$kq) die($this->db->error);
	 				$row=$kq->fetch_array();
	 				$_SESSION['giohang'][$k]['urlHinh']=$row['urlHinh'];
	 				$_SESSION['giohang'][$k]['idSP']=$row['idSP'];
	 				$_SESSION['giohang'][$k]['sl']=$sl ;
	 				$_SESSION['giohang'][$k]['gia']=$row['Gia'];
	 				$_SESSION['giohang'][$k]['TenSP']=$row['TenSP'];
	 				$_SESSION['giohang'][$k]['Size']=$row['Size'];
	 			}
	 		}//add gio hang
	 		if($action=='remove'){
	 			$idSP=$_GET['idSP'];
	 			
	 			for($i=$idSP;$i<count($_SESSION['giohang'])-1;$i++)
	 			{
	 				$j=$i+1;
	 				$_SESSION['giohang'][$i]=$_SESSION['giohang'][$j];
	 			}
	 			$k=count($_SESSION['giohang'])-1;
	 			unset($_SESSION['giohang'][$k]);
	 		}
	 		if($action=='update'){
	 			$k=count($_SESSION['giohang']);
	 			for($i=0;$i<$k;$i++)
	 			{
	 				if(($_SESSION['giohang'][$i]['sl']!=$_POST['sl_'.$i])||
	 					($_SESSION['giohang'][$i]['sl']=$_POST['sl_'.$i]))
	 				{
	 					unset($_SESSION['giohang'][$i]['sl']);
	 					$_SESSION['giohang'][$i]['sl']=$_POST['sl_'.$i];
				//header("location:datbao.php");
	 				}
	 			}
	 		}
	 	}
	 	
	 	function LuuDonHang(){
	 		$hoten=$this->db->escape_string(trim(strip_tags( $_SESSION['DonHang']['hoten'])));
	 		$diachi=$this->db->escape_string(trim(strip_tags( $_SESSION['DonHang']['diachi'])));
	 		$email=$this->db->escape_string(trim(strip_tags( $_SESSION['DonHang']['email'])));
	 		$sdt=$this->db->escape_string(trim(strip_tags( $_SESSION['DonHang']['sdt'])));
	 		$pttt=$this->db->escape_string(trim(strip_tags( $_SESSION['DonHang']['payment'])));
	 		$ptgh=$this->db->escape_string(trim(strip_tags( $_SESSION['DonHang']['delivery'])));
	 		$TongTien=$_SESSION['DonHang']['tongtien'];
	 		if(!isset($_SESSION['DonHang']['idDH']))
	 		{
	 			$sql="insert into donhang set TongTien=$TongTien,TenNguoiNhan='$hoten',ThoiDiemDatHang=now(),
	 			DTNguoiNhan=$sdt,DiaChi='$diachi',idPTTT='$pttt',idPTGH='$ptgh'";
	 			$kq=$this->db->query($sql);
	 			if(!$kq) die($this->db->error);
	 			$_SESSION['DonHang']['idDH']=$this->db->insert_id;
	 		}
	 		else {
	 			$idDH=$_SESSION['DonHang']['idDH'];
	 			$sql="update donhang set TenNguoiNhan='$hoten',ThoiDiemDatHang=now(),
	 			DTNguoiNhan=$sdt,DiaChi='$diachi',idPTTT='$pttt',TongTien=$TongTien,idPTGH='$ptgh' where idDH=$idDH ";
	 			$kq=$this->db->query($sql);
	 			if(!$kq) die($this->db->error);
	 		}
	 	}//LuuDonHang

	 	function LuuChiTietDH(){
	 		$k=count($_SESSION['giohang']);
	 		$idDH=$_SESSION['DonHang']['idDH'];
	 		$sql="delete from donhangchitiet where idDH=$idDH";
	 		$this->db->query($sql);
	 		for($i=0;$i<$k;$i++){
	 			$idSP=$_SESSION['giohang'][$i]['idSP'];
	 			$TenSP=$_SESSION['giohang'][$i]['TenSP'];
	 			$sl=$_SESSION['giohang'][$i]['sl'];
	 			$gia=$_SESSION['giohang'][$i]['gia'];
	 			$sql="insert into donhangchitiet (idDH,idSP,TenSP,SoLuong,Gia) values ($idDH,$idSP,'$TenSP',$sl,$gia)";
	 			$this->db->query($sql);
	 		}
	 	}

	 	function Detail_SP($idSP){
	 		settype($idSP,"int");
	 		$sql="select * from sanpham where idSP=$idSP";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		return $kq;
	 	}

	 	function Lay_BL($idSP){
	 		settype($idSP,"int");
	 		$sql="select * from sanpham_comment where kiem_duyet=1 AND idSP=$idSP";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		return $kq;
	 	}

	 	function add_bl($idSP){
	 		$hoten=$_POST['hoten'];
	 		$email=$_POST['Email'];
	 		$noidung=$_POST['noidung'];
	 		$sql="insert into sanpham_comment set idSP=$idSP,hoten='$hoten',email='$email',noidung='$noidung',ngay_comment=now(),kiem_duyet=0";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		return $kq;
	 	}

	 	function IMG_SP($idSP){
	 		settype($idSP,"int");
	 		$sql="select * from sanpham_hinh where idSP=$idSP order by id_hinh limit 0,3";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		return $kq;
	 	}

	 	function Size_SP($TenSP){
	 		$TenSP=$this->db->escape_string(trim(strip_tags($TenSP)));
	 		$sql="select Size from sanpham where TenSP='$TenSP'";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		return $kq;
	 	}
	 	
	 	function search($tk,$page,$limit,&$tongdong){
	 		$tk=$this->db->escape_string(trim(strip_tags($tk)));
	 		$vitri=($page-1)*$limit;
	 		$sql="SELECT TenCL,TenSP,urlHinh,idSP,TenSP,Gia from sanpham,chungloai WHERE chungloai.idCL=sanpham.idCL AND ( TenCL like '%$tk%' or TenSP LIKE '%$tk%') Group by TenSP order by NgayCapNhat DESC Limit $vitri,$limit";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		$sql="SELECT TenCL,TenSP,urlHinh,idSP,TenSP,Gia from sanpham,chungloai WHERE chungloai.idCL=sanpham.idCL AND ( TenCL like '%$tk%' or TenSP LIKE '%$tk%') Group by TenSP";
	 		$rs=$this->db->query($sql);
	 		$tongdong=$rs->num_rows;
	 		
	 		if(!$kq) die($this->db->error);
	 		return $kq;
	 	}

	 	function LayidLoai($TenLoai){
	 		$sql="select idLoai from loaisp where TenLoai='$TenLoai'";
	 		$kq=$this->db->query($sql);
	 		if(!$kq) die($this->db->error);
	 		$row_kq=$kq->fetch_array();
	 		$idLT=$row_kq['idLoai'];
	 		return $idLT;
	 	}
	 	
	 }
	 ?>