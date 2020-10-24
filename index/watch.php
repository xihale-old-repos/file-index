<?php
$filename=$_GET['file'];
$path=$files_in.$_GET['path'];
if($filename!=""&&file_exists($path.$filename)){
	$fp=fopen($path.$filename,"r");
	$file=fread($fp,filesize($path.$filename));
	$file=strtr($file,array("<"=>"&lt;",">"=>"&gt;"));
	echo "<pre>\n".$file."</pre>";
	fclose($fp);
	exit();
}
else if($filename!=""){
	echo "<script>alert(\"".$filename."不存在!\")</script>";
}
?>