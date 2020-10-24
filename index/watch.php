<?php
header("content-type: text/html; charset=utf-8");
$filename=$_GET['file'];
$path=$files_in.$_GET['path'];
if($_GET['del']==$password)
{
	if($files_in==(strtr($path,array("/"=>"","\\"=>""))))
	{
		echo "<script>alert(\"根目录不许删除！\");</script>";
	}
	else if($filename!="")
	{
		if(unlink($fs=$path."/".$filename))
			echo "<script>alert(\"删除成功！\");</script>";
		else	
			echo "<script>alert(\"删除失败！".$fs."\");</script>";
	}
	else
	{
		if(deldir($fs=$path."/"))
			echo "<meta http-equiv=\"refresh\" content=\"0;url=../\"><script>alert(\"删除成功！\");</script>";
		else
			echo "<script>alert(\"删除失败！\");</script>";
	}
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
	echo "<script>alert(\"".$filename."不存在!\")</script>";
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
