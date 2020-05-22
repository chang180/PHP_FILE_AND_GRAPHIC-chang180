<?php
include_once "base.php";

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
    }

    //$sub=explode('.',$_FILES['upload']['name']);
    //$sub[1];→副檔名

    $name = 'chang180'.date("Ymdhis") . $sub;


    move_uploaded_file($_FILES['upload']['tmp_name'], "imgs/" . $name);

    $data=[
        'filename'=>$name,
        'type'=>$_FILES['upload']['type'],
        'note'=>$_POST['note'],
        'path'=>'imgs/'.$name,
    ];
// echo "<pre>";
// print_r($data);
// echo "</pre>";

    // var_dump($data);
    save('file_info',$data);

    header("location:manage.php");
}
?>
