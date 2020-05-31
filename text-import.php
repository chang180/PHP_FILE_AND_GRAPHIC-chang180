<?php

/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body class="container">

    <h1 class="header">文字檔案匯入練習</h1>
    <!---建立檔案上傳機制--->

    <form action="parse_file.php" method="post" class="row form justify-content-center" enctype="multipart/form-data">
        <label class="form-control col-3" for="doc">欲匯入的檔案：</label>
        <input class="form-control col-9" type="file" name="doc">

        <input class="form-control btn btn-outline-danger" type="submit" value="匯入">
    </form>


    <!----讀出匯入完成的資料----->
    <?php
    include_once "base.php";
    $todo = all("todo", "", "", PDO::FETCH_ASSOC);
    ?>
    <table class="table border rounded my-2">
        <tr>
            <td>id</td>
            <td>subject</td>
            <td>description</td>
            <td>create_date</td>
            <td>due_date</td>
        </tr>
        <?php
        foreach ($todo as $t) {
        ?>
            <tr>
                <td><?= $t['id']; ?></td>
                <td><?= $t['subject']; ?></td>
                <td><?= $t['description']; ?></td>
                <td><?= $t['create_date']; ?></td>
                <td><?= $t['due_date']; ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
    <?php
    $newfile = fopen("todolist.txt", "w+");
    foreach ($todo as $t) {
        fwrite($newfile, implode(",", $t) . "\n");
    }
    fclose($newfile);

    ?>
    <a class="btn btn-outline-success" href="todolist.txt" download>下載</a>
    <a class="btn btn-outline-primary" href="index.php">回首頁</a>



</body>

</html>