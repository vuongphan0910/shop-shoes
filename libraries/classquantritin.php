<?php
require_once "classDB.php";
class quantritin extends DB {
	function Detail_user($u,$p){
		$u=$this->db->escape_string($u);
		$p=$this->db->escape_string($p);
		$p=md5($p);
		$sql="select * from users where Email='$u' And Password='$p'";
		$kq=$this->db->query($sql);
		if($kq->num_rows==0)
			return false;
		else return $kq->fetch_assoc();
					}//end detail_user

					function DangNhap(){
			//$error=array();
						$u=trim($_POST['username']);
						$p=trim($_POST['pass']);
						$kq=$this->Detail_user($u,$p);
						if($kq){
							$_SESSION['login_id']=$kq['idUser'];
							$_SESSION['login_user']=$kq['Email'];
							$_SESSION['login_pass']=$kq['Password'];
							$_SESSION['login_hoten']=$kq['HoTen'];
							$_SESSION['login_group']=$kq['idGroup'];
							if(isset($_POST['rem'])==true)
							{
								setcookie("un",$_POST['username'],time()+60*60*24*7);
								setcookie("pw",$_POST['pass'],time()+60*60*24*7);
								setcookie("id",$_SESSION['login_id'],time()+60*60*24*7);
								setcookie("ht",$_SESSION['login_hoten'],time()+60*60*24*7);
							}
							else{
								setcookie("un",$_POST['username'],time()-1);
								setcookie("pw",$_POST['pass'],time()-1);
								setcookie("id",$_SESSION['login_id'],time()-1);
								setcookie("ht",$_SESSION['login_hoten'],time()-1);
							}
							if(strlen($_SESSION['back'])>0)
							{
								$back =$_SESSION['back'];
								unset ($_SESSION['back']);
								header("location:$back");
							}
							else header("location:index.php");
						}
						else
						{ 
					//	$error=;
							$_SESSION['error']="<p class='alert alert-warning'>Tên Đăng Nhập Hoặc Mật Khẩu Của Bạn Không Đúng !</p>";
							header("location:login.php");
						}
			}//end Function DangNhap()

			function checkLogin(){
				//session_start();
				if(!isset($_SESSION['login_id']))
				{
					//$_SESSION['error']='Bạn Chưa Đăng Nhập';
					$_SESSION['back']=$_SERVER['REQUEST_URL'];
					header('location:login.php');
					exit();
				}
				else if($_SESSION['login_id']!=1)
				{
					$_SESSION['error']='Bạn Không Có Quyền Truy Cập Trang Này';
					$_SESSION['back']=$_SERVER['REQUEST_URL'];
					header('location:login.php');
					exit();
				}
			}//End Function CheckLogin();

			function changeTitle($str){
				$str = $this->stripUnicode($str);
				$str = str_replace("?","",$str);
				$str = str_replace("&","",$str);
				$str = str_replace("'","",$str);
				$str = str_replace('"',"",$str);
				$str = str_replace("\\","",$str);
				$str = str_replace(":","",$str);
				$str = str_replace("%","",$str);
				$str = str_replace("+","",$str);
				$str = str_replace("-","",$str);
				$str = trim($str);		
				while (strpos($str,'  ')>0) $str = str_replace("  "," ",$str);
				$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
			// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
				$str = str_replace(" ","-",$str);	
				return $str;
			}//end  changeTitle
			
			function stripUnicode($str){
				if(!$str) return false;
				$unicode = array(
					'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
					'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
					'd'=>'đ',
					'D'=>'Đ',
					'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
					'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
					'i'=>'í|ì|ỉ|ĩ|ị',	  
					'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
					'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
					'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
					'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
					'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
					'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
					'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
				);
				foreach($unicode as $khongdau=>$codau) {
					$arr = explode("|",$codau);
					$str = str_replace($arr,$khongdau,$str);
				}
				return $str;
			}//end stripUnicode()

			/*************************Chung Loai****************************/
			function ThemCL(&$loi){
				$thanhcong=true;
				$TenCL=$_POST['TenCL'];
				$ThuTu=$_POST['ThuTu'];
				$AnHien=$_POST['AnHien'];
				settype($ThuTu,"int");
				settype($AnHien,"int");
				$TenCL=$this->db->escape_string(trim(strip_tags($TenCL)));
				if($TenCL==NULL){
					$thanhcong=false;
					$loi['tencl']='Vui Lòng Nhập Tên Thể Loại';
				}
				else if($this->CheckChungLoai($TenCL)==false){
					$thanhcong=false;
					$loi['tencl']='Tên Thể Loại Đã Tồn Tại';
				}
				if($thanhcong==true){
					$sql="insert into chungloai values(NULL, '$TenCL', $ThuTu,$AnHien) ";
					$kq=$this->db->query($sql);
					if(!$kq) die($this->db->error);
				}//thanh cong
				return $thanhcong;
			}// End ThemTheLoai

			function ListChungLoai(){
				$sql="select * from chungloai order by ThuTu ASC" ;
				$query=$this->db->query($sql);
				return $query;
			}//End ListTheLoai()

			function ListTheLoai_lang($lang){
				$sql="select * from theloai where lang='$lang'" ;
				$query=$this->db->query($sql);
				return $query;
			}//End ListTheLoai()

			function CheckChungLoai($TenCL){
				$sql="Select TenCL From chungloai where TenCL='$TenCL'";
				$kq=$this->db->query($sql) or die ($this->db->error());
				if($kq->num_rows>0)
					return false;
				else return true;
			}//end CheckChungLoai

			function Detail_Chungloai($idCL){
				$sql="select * from chungloai where idCL=$idCL";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}//end Detail_Theloai

			function Edit_CL($idCL){
				$TenCL=$_POST['TenCL'];
				$ThuTu=$_POST['ThuTu'];
				$AnHien=$_POST['AnHien'];
				settype($ThuTu,"int");
				settype($AnHien,"int");
				settype($idCL,"int");
				$TenCL=$this->db->escape_string(trim(strip_tags($TenCL)));
				$sql="update chungloai set TenCL='$TenCL', ThuTu=$ThuTu,AnHien=$AnHien where idCL=$idCL";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
			}//END Edit_CL

			function Delete_CL($idCL){
				settype($idCL,"int");
				$sql="SELECT COUNT(*) solsp FROM loaisp WHERE idCL=$idCL";
				$kq=$this->db->query($sql);
				$rs=$kq->fetch_row();
				if($rs[0]>0){
					$_SESSION['loi']='Chủng Loại Chứa Nhiều Loại SP, Không Thể Xóa ';
					header("location:index.php?p=chungloai_list");
					exit();
				}
				else{
					$sql="delete from chungloai where idCL=$idCL";
					$kq=$this->db->query($sql);
					if(!$kq) die($this->db->error);
					$_SESSION['thanhcong']='Chủng Loại Đã Được Xóa';
				}
     		}// end  Delete_CL
     		
     		/***************************Loai San Pham**********************************************/
     		function ListLoaiSP(){
     			$sql="select idLoai,TenLoai,loaisp.ThuTu,loaisp.AnHien,TenCL from loaisp,chungloai Where loaisp.idCL=chungloai.idCL order by loaisp.ThuTu" ;
     			$kq=$this->db->query($sql);
     			if(!$kq) die($this->db->error);
     			return $kq;
			}//End ListLoaiTin()

			function ThemLoaiSP(&$loi){
				$thanhcong=true;
				$idCL=$_POST['idCL'];
				$TenLSP=$_POST['TenLoai'];
				$ThuTu=$_POST['ThuTu'];
				$AnHien=$_POST['AnHien'];
				settype($ThuTu,"int");
				settype($AnHien,"int");
				settype($idCL,"int");
				$TenLSP=$this->db->escape_string(trim(strip_tags($TenLSP)));
				if($TenLSP==NULL){
					$thanhcong=false;
					$loi['tenlsp']='Vui Lòng Nhập Tên Loại Tin';
				}
				else if($this->CheckLoaiSP($TenLSP,$idCL)==false){
					$thanhcong=false;
					$loi['tenlsp']='Tên Thể Loại Đã Tồn Tại';
				}
				if($thanhcong==true){
					$sql="insert into loaisp values(NULL,$idCL, '$TenLSP' ,$ThuTu,$AnHien) ";
					$kq=$this->db->query($sql);
					if(!$kq) die($this->db->error);
				}//thanh cong
				return $thanhcong;
			}// End ThemLoaiTin

			function Edit_LoaiSP($idLoai){
				$idCL=$_POST['idCL'];
				$TenLoai=$_POST['TenLoai'];
				$ThuTu=$_POST['ThuTu'];
				$AnHien=$_POST['AnHien'];
				settype($ThuTu,"int");
				settype($AnHien,"int");
				settype($idCL,"int");
				$TenLoai=$this->db->escape_string(trim(strip_tags($TenLoai)));				
				$sql="update loaisp set  TenLoai='$TenLoai',ThuTu=$ThuTu,AnHien=$AnHien,idCL=$idCL where idLoai=$idLoai";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}// End EditLoaiTin

			function CheckLoaiSP($TenLoai,$idCL){
				$sql="Select TenLoai From loaisp where TenLoai='$TenLoai' and idCL=$idCL";
				$kq=$this->db->query($sql) or die ($this->db->error());
				if($kq->num_rows>0)
					return false;
				else return true;
			}//end CheckLoaTin

			function Detail_LoaiSP($idLoai){
				$sql="select * From loaisp where idLoai=$idLoai";
				$kq=$this->db->query($sql) or die ($this->db->error());
				return $kq;
			}

			function Delete_LoaiSP($idLoai){
				settype($idLoai,"int");
				$sql="SELECT COUNT(*) sosp FROM sanpham WHERE idLoai=$idLoai";
				$kq=$this->db->query($sql);
				$rs=$kq->fetch_row();
				if($rs[0]>0){
					$_SESSION['loi']='Loại SP Chứa Nhiều SP, Không Thể Xóa ';
					header("location:index.php?p=loaisp_list");
					exit();
				}
				else{
					$sql="delete from loaisp where idLoai=$idLoai";
					$kq=$this->db->query($sql) or die ($this->db->error());
					return $kq;
					$_SESSION['thanhcong']='Loại SP Đã Được Xóa';
				}
			}

			function LoaiTrongCL($idCL){
				settype($idCL,'int');
				$sql="select idLoai,TenLoai from loaisp where idCL=$idCL";
				$kq=$this->db->query($sql) or die ($this->db->error());
				return $kq;	
			}

			/*****************************Product*********************************/
			function Product_List(){
				$sql="Select TenSP,MoTa,Gia,Size,urlHinh,baiviet,SoLuongTonKho,sanpham.AnHien,NgayCapNhat,idSP,TenLoai,TenCL from sanpham ,loaisp,chungloai where sanpham.idLoai=loaisp.idLoai AND loaisp.idCL=chungloai.idCL order by idSP DESC";
				$kq=$this->db->query($sql) or die ($this->db->error());
				return $kq;
			}

			function Product_add(){
				$idCL=$_POST['idCL'];
				$idLoaiSP=$_POST['idLoaiSP'];
				$TenSP=$_POST['TenSP'];
				$TonKho=$_POST['TonKho'];
				$size=$_POST['size'];
				$gia=$_POST['gia'];
				//$urlHinh=$_POST['urlHinh'];
				$AnHien=$_POST['AnHien'];
				$baiviet=$_POST['baiviet'];
				settype($TonKho,"int");
				settype($idLoaiSP,"int");
				settype($idCL,"int");
				settype($gia,"int");
				settype($AnHien,"int");
				$TenSP=$this->db->escape_string(trim(strip_tags($TenSP)));
				if(isset($_FILES['urlHinh']))
					$target='../upload/hinhchinh/';
				$urlHinh=$_FILES['urlHinh']['name'];
				$target.=$urlHinh;
				if(move_uploaded_file($_FILES['urlHinh']['tmp_name'],$target)){
					$sql="insert into sanpham set  idLoai=$idLoaiSP,idCL=$idCL,TenSP='$TenSP',Gia=$gia,Size=$size,urlHinh='$urlHinh',baiviet='$baiviet',SoLuongTonKho=$TonKho,AnHien=$AnHien";
					$kq=$this->db->query($sql) or die ($this->db->error());
					$_SESSION['idSP_add']=$this->db->insert_id;
					return $kq;
				}
			}

			function Check_SP($TenSP,$size){
				$TenSP=$this->db->escape_string(trim(strip_tags($TenSP)));
				$sql="select TenSP from sanpham where TenSP='$TenSP' And Size =$size";
				$kq=$this->db->query($sql) or die ($this->db->error());
				if($kq->num_rows>0)
					return false;
				else return true; 
			}

			function Detail_SP($idSP){
				$sql="select * from sanpham where idSP=$idSP";
				$kq=$this->db->query($sql) or die ($this->db->error());
				return $kq;
			}

			function Product_edit($idSP){
				$idCL=$_POST['idCL'];
				$idLoaiSP=$_POST['idLoaiSP'];
				$TenSP=$_POST['TenSP'];
				$TonKho=$_POST['TonKho'];
				$size=$_POST['size'];
				$gia=$_POST['gia'];				
				$AnHien=$_POST['AnHien'];
				$baiviet=$_POST['baiviet'];
				settype($TonKho,"int");
				settype($idLoaiSP,"int");
				settype($idCL,"int");
				settype($gia,"int");
				settype($AnHien,"int");
				$TenSP=$this->db->escape_string(trim(strip_tags($TenSP)));
				if(isset($_FILES['hinh']['name'])&&$_FILES['hinh']['name']!=""){
					$target='../upload/hinhchinh/';
					$urlHinh=$_FILES['hinh']['name'];
					$target.=$urlHinh;
					move_uploaded_file($_FILES['hinh']['tmp_name'],$target);
				}
				else 
					$urlHinh=$_POST['urlHinh'];				
				$sql="update sanpham set idLoai=$idLoaiSP,idCL=$idCL,TenSP='$TenSP',Gia=$gia,Size=$size,urlHinh='$urlHinh',baiviet='$baiviet',SoLuongTonKho=$TonKho,AnHien=$AnHien where idSP=$idSP";
				$kq=$this->db->query($sql) or die ($this->db->error());
				return $kq;
			}

			function Product_del($idSP){
				$sql="delete from sanpham where idSP=$idSP";
				$kq=$this->db->query($sql) or die ($this->db->error());
				return $kq;
			}

			function Product_addIMG($idSP){
				for($i=1;$i<=3;$i++)
				{
					$sql="insert into sanpham_hinh values (NULL,$idSP,'{$_POST['urlHinh'.$i]}',$i,1)";
					$kq=$this->db->query($sql) or die ($this->db->error());
				}
			}

			function Upload($num,$idSP){
				for($i=0; $i< $num; $i++)
				{
					$url="../upload/hinhphu/".$_FILES['img']['name'][$i];
					$name=$_FILES['img']['name'][$i];
					if(move_uploaded_file($_FILES['img']['tmp_name'][$i],$url)==true){
						$sql="insert into sanpham_hinh (id_hinh,idSP,urlHinh,stt,anhien) values(NULL,$idSP,'$name',1,1)";
						$kq=$this->db->query($sql);
						if(!$kq) die($this->db->error);
					}
				}
			}
			/******************************Đơn Hàng*******************************/
			function DH_List(){
				$sql="select idDH,ThoiDiemDatHang,TenNguoiNhan,DTNguoiNhan,DiaChi,TongTien,idPTTT,idPTGH,DaXuLy,DaTraTien
				from donhang
				";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}

			function DH_xacnhan($idDH){
				$sql="select DaXuLy from donhang where idDH=$idDH";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				$rs=$kq->fetch_array();
				$XacNhan=$rs[0];
				if($XacNhan==0)
					$XacNhan=1;
				else
					$XacNhan=0;
				$sql="update donhang set DaXuLy=$XacNhan where idDH=$idDH";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return "images/AnHien_{$XacNhan}.jpg";
			}

			function DH_detail($idDH){
				$sql="Select * from donhangchitiet where  idDH=$idDH";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}

			function DH_delete($idDH){
				$sql="delete from donhang where idDH=$idDH";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				$sql_2="delete from donhangchitiet where idDH=$idDH";
				$kq=$this->db->query($sql_2);
				if(!$kq) die($this->db->error);
				return $kq;
			}
			function IMG_list($idSP){
				$sql="Select urlHinh from sanpham_hinh where idSP=$idSP or $idSP=-1";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}
			/********************BL************************/
			function BL_list(){
				$sql="select * from sanpham_comment order by ngay_comment DESC ";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}
			function BL_detail($idCM){
				$sql="select * from sanpham_comment where id_comment=$idCM";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;

			}
			function BL_edit($idCM){
				$noidung=$this->db->escape_string(trim(strip_tags($_POST['noidung'])));
				$anhien=$_POST['AnHien'];
				$sql="update sanpham_comment set noidung='$noidung',kiem_duyet=$anhien where id_comment=$idCM";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}
			function BL_del($idCM){
				$sql= "delete from sanpham_comment where id_comment=$idCM";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				$_SESSION['thanhcong']='Bình Luận Đã Được Xóa';
				return $kq;
			}

			function User_List(){
				$sql="Select * from users ";
				$kq=$this->db->query($sql);
				if(!$kq) die($this->db->error);
				return $kq;
			}
	}//End class Quantritin
	?>