<?php
echo "<pre>";
print_r($_FILES);
echo "</pre><hr>";

echo $_FILES['upload']['name'];
date_default_timezone_set("Asia/Taipei");


// if(!empty($_FILES['upload']['tmp_name'])) 也可用這個判斷檔案上傳是否成功
if ($_FILES['upload']['error'] == 0) {
    // 自行設定檔案名稱，可避免收到檔案名稱超過系統限制的檔案

    switch ($_FILES['upload']['type']) {
        case "image/jpeg":
            $sub = '.jpg';
            break;
        case "image/png":
            $sub = '.png';
            break;
        case "image/gif":
            $sub = '.gif';
            break;
        default:
        header("location:upload.php");
    }

    //$sub=explode('.',$_FILES['upload']['name']);
    //$sub[1];→副檔名

    $name = date("Ymdhis") . $sub;


    move_uploaded_file($_FILES['upload']['tmp_name'], "imgs/" . $name);

    header("location:upload.php?filename=$name");
}

?>