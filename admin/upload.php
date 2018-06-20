<?php
require_once "../libraries/classquantritin.php";
$qt=new quantritin;
function upload(){
	for($i=0;$i<count($_FILES['upFile']['name']);$i++)
	{
		$link = $link.$_FILES['upFile']['name'][$i];
		if(move_uploaded_file($_FILES['upFile']['tmp_name'][$i],$link)==true)
		{
			$query = "INSERT INTO hinhanh VALUES('','$link','')";
			mysql_query($query) or die(mysql_error());
			echo "Upload thanh cong file: ".$_FILES['upFile']['name'][$i]."<br>";	
		}
	}
}
?>