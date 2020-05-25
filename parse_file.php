<?php

require_once "base.php";

// 建立資料夾，若沒有的話

if (!file_exists("doc/")) mkdir("doc/");

//  echo "建立資料夾成功";
// }else{
//  echo "資料夾已存在";
// }

// if(!empty($_FILES['doc']['tmp_name'])){

//     echo "上傳的暫存檔名及路徑：".$_FILES['doc']['tmp_name']."<br>";
//     echo "檔案類型：".$_FILES['doc']['type']."<br>";
//     echo "檔案原始名稱：".$_FILES['doc']['name']."<br>";

//     move_uploaded_file($_FILES['doc']['tmp_name'],"doc/".$_FILES['doc']['name']);
//     echo "檔案搬移位置在"."doc/".$_FILES['doc']['name'];

if ($_FILES['doc']['type'] == 'text/plain') {
    move_uploaded_file($_FILES['doc']['tmp_name'], 'doc/' . $_FILES['doc']['name']);
    $path = 'doc/' . $_FILES['doc']['name'];
    $file = fopen($path, "r+");

    // 先執行一次，跳過檔案的標題列
    $txt = fgets($file);
    $num = 1;

    while (!feof($file)) {
        $txt = fgets($file);
        $tmp = explode(",", $txt);

        // 判斷檔案最後一行是否為空行，否則就跳過
        if (count($tmp) == 4) {
            $content['subject'] = $tmp[0];
            $content['description'] = $tmp[1];
            $content['create_date'] = $tmp[2];
            $content['due_date'] = $tmp[3];
            save("todo", $content);
            // echo "已儲存" . $num . "筆資料";

            //['subject'=>$content[0]]
            $num++;
        }
    }

    fclose($file);
    to("text-import.php");
} else {
    echo "檔案類型錯誤!";
}
