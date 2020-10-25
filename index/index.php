<?php
if(!is_dir($path))
{
	 echo "<meta http-equiv=\"refresh\" content=\"0;url=../\">";
	 exit();
}
$dir=getDir($path);
echo "项目<br>";
foreach($dir as $software) //遍历数组并输出
{
	echo "<a href=\"/?path=".$_GET['path']."/".$software."\">".$software."</a>";
	if($_COOKIE['write']==$cookie&&$software!="")
	{
		echo "&nbsp;&nbsp;<a href=\"/?path=".$_GET['path']."/".$software."&del=".$_COOKIE['write']."\">删除此项目</a>";
	}
	echo "<br>";
}
$filename=getFile($path);
echo "文件<br>";
foreach($filename as $software) //遍历数组并输出
{
	echo "<a href=\"/?file=".$_GET['path']."/".$software."\" target=\"_blank\">".$software."</a>";
		if($_COOKIE['write']==$cookie&&$software!="")
	{
		echo "&nbsp;&nbsp;<a href=\"/?file=".$_GET[''].$_GET['file']."/".$software."&del=".$_COOKIE['write']."\">删除此文件</a>";
	}
	echo "<br>";
}
?>
