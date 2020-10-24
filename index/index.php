<?php
$dir=getDir($path);
echo "项目<br>";
foreach($dir as $software) //遍历数组并输出
{
	echo "<a href=\"/?path=".$_GET['path'].$software."\">".$software."</a><br>";
}
$filename=getFile($path);
echo "文件<br>";
foreach($filename as $software) //遍历数组并输出
{
	echo "<a href=\"/?file=".$_GET['path']."/".$software."\" target=\"_blank\">".$software."</a><br>";
}
?>
