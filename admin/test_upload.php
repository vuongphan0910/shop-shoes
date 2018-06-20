<?php 
	if(isset($_GET['idSP']))
		$idSP=$_GET['idSP'];
 ?>
<form action="" method="post">
Enter your Image: <input type="text" name="txtnum" value="<?php if(isset($_POST['txtnum'])) echo $_POST['txtnum']; ?>" size="10" />
<input type="hidden" value="<?=$idSP?>" name="idSP" />
<input type="submit" name="ok_num" value="Accept" />
</form>
<?php
if(isset($_POST['ok_num']))
{
            $num=$_POST['txtnum'];
            echo "<hr />";
            echo "Ban dang chon $num file upload<br />";
            echo "<form action='doupload.php?file=$num' method='post' enctype='multipart/form-data'>";
            for($i=1; $i <= $num; $i++)
            {
                 echo "<input type='file' name='img[]'/><br />";
            }
             echo "<input type='hidden' value='{$_POST['idSP']}' name='idSP' />";
            echo "<input type='submit' name='ok_upload' value='Upload' />";
            echo "</form>";
}
?>