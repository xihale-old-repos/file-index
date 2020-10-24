<?php
$dir=$_POST['dir'];
$filename=($_POST['filename']);
$files=$_POST['files'];
if($_POST['zhuxiao']!="")
{
	setcookie($cookie_name,$cookie,time()-3600);
	?>
	<script>alert("注销成功")</script>
	<meta http-equiv="refresh" content="0;url=../write">
	<?php
}
if($_COOKIE['write']!=$cookie){
	exit();
}?>
<form action="index.php" method="post">
	<input type="text" name="dir" placeholder="项目名" value=<?php echo $dir?> />
	<input type="submit" value="创建" />
	<input type="submit" value="注销" name="zhuxiao" />
	<input type="text" name="filename" placeholder="文件名"/><br>
	<textarea style="height:800px;width:900px" placeholder="文件内容" name="files" /><?php echo $files ?></textarea>
</form>
<?php
if($dir!=''&&$dir!='/')
{
	if(!is_dir("../".$files_in.$dir))
	{
		$res=mkdir(iconv("UTF-8", "GBK","../".$files_in."/".$dir),0777,true); 
		if(!$res)
			echo "<script>alert(\"项目创建失败\")</script>";
		else
			echo "<script>alert(\"目录创建成功\")</script>";
	}
	else
	{
		echo "<script>alert(\"项目已存在\")</script>";
	}
}
if($filename!='')
{
	if(!file_exists(($file="../".$files_in."/".$dir."/".$filename)))
	{
		$fp=fopen($file,"w+");
		fwrite($fp,$files);
		fclose($fp);
		echo "<script>alert(\"文件创建成功\")</script>";
	}
	else 
	{
		echo "<script>alert(\"文件已存在\")</script>";
	}
}
?>