<?php
function scrs($str)
{
	return strtr($str,array("/"=>""," "=>"","\\"=>""));
}
header("content-type: text/html; charset=utf-8");
$filename=$_GET['file'];
$path=$files_in.$_GET['path'];
if($_GET['del']==$password||$_GET['del']==$cookie)
{
	if(scrs($_GET['path'])!=""&&scrs($path)==scrs($files_in))
	{
		echo "<script>alert(\"根目录不许删除！\");</script>";
	}
	else if($filename!=""&&file_exists($files_in.$filename))
	{
		if(!unlink($fs=$path."/".$filename))
			echo "<script>alert(\"删除失败！\");</script>";
	}
	else if(scrs($_GET['path']!=""))
	{
		if(!deldir($fs=$path."/"))
			echo "<script>alert(\"删除失败！\");</script>";
	}
}elseif($_GET['del']!=""){
		echo "<script>alert(\"您不是管理员或登录失效！\")</script>";
}
if($filename!=""&&file_exists($path.$filename)){
	$fp=fopen($path.$filename,"r");
	$file=fread($fp,filesize($path.$filename));
	$file=strtr($file,array("<"=>"&lt;",">"=>"&gt;"));
	echo "<pre>\n".$file."</pre>";
	fclose($fp);
	exit();
}
else if($filename!=""){
	echo "<meta http-equiv=\"refresh\" content=\"0;url=../\">";
	exit();
}	


//删除指定文件夹以及文件夹下的所有文件
function deldir($dir) {
   //先删除目录下的文件：
   $dh=opendir($dir);
   while ($file=readdir($dh)) {
      if($file!="." && $file!="..") {
         $fullpath=$dir."/".$file;
         if(!is_dir($fullpath)) {
            unlink($fullpath);
         } else {
            deldir($fullpath);
         }
      }
   }
   closedir($dh);
   //删除当前文件夹：
   if(rmdir($dir)) {
      return true;
   } else {
      return false;
   }
}
?>
