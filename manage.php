<?php

/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */

include_once "base.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body class="bg-dark text-white container">
    <div class="flex-column align-items-center justify-content-center">
        <h1 class="h1 header text-center">檔案管理練習</h1>
        <!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
        <form class="form border p-3 d-flex flex-column justify-content-center" action="save_file.php" method="post" enctype="multipart/form-data">
        <input class="form-control-file" type="file" name="upload" id="img">
        <input class="form-control my-2" type="text" name='note'>
        <input class="form-control" type="submit" value="上傳">
    </form>

    <!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
        <table class="table text-white border rounded-lg">
            <tr>
                <td>預覽</td>
                <td>檔名</td>
                <td>路徑</td>
                <td>類別</td>
                <td>說明</td>
                <td>上傳時間</td>
                <td>操作</td>
            </tr>
            <?php
            $all = all('file_info');
            foreach ($all as $row) {
            ?>
                <tr>
                    <td><img src='<?= $row['path']; ?>' style="width:200px;height:100px;"></td>
                    <td><?= $row['filename']; ?></td>
                    <td><?= $row['path']; ?></td>
                    <td><?= $row['type']; ?></td>
                    <td><?= $row['note']; ?></td>
                    <td><?= $row['upload_time']; ?></td>
                    <td>
                        <div class="btn-group">
                    <a class="btn btn-outline-info rounded-pill" href="del_file.php?id=<?=$row['id'];?>">刪除</a>
                    <a class="btn btn-outline-info rounded-pill" href="update_file.php?id=<?=$row['id'];?>">更新</a>
                    </div>
                    <a href=""></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
    </div>






</body>

</html>