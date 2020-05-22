<?php

include_once "base.php";


// $id=$_GET['id'];
$file=find("file_info",$_GET['id']);

// 實際工作時也要把實體檔案刪除掉
unlink($file['path']);

del("file_info",$_GET['id']);

to("manage.php");

?>