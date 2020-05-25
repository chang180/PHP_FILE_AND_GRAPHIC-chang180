<?php

/****
 * 1.建立資料庫及資料表
 * 2.建立上傳圖案機制
 * 3.取得圖檔資源
 * 4.進行圖形處理
 *   ->圖形縮放
 *   ->圖形加邊框
 *   ->圖形驗證碼
 * 5.輸出檔案
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>圖形檔案處理</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body class="container">
    <h1 class="header">圖形處理練習</h1>
    <!---建立檔案上傳機制--->
    <form class="form" action="graphic2.php" method="post" enctype="multipart/form-data">
        <input class="form-control" type="file" name="pic"><br>
        <input class="form-control" type="text" name="note"><br>
        <input class="form-control" type="text" name="album"><br>
        <input class="form-control" type="submit" value="上傳">
    </form>

    <a class="btn btn-outline-success my-3" href="album2.php">查看相簿</a><br>

    <!----縮放圖形----->


    <!----圖形加邊框----->


    <!----產生圖形驗證碼----->



    <a class="btn btn-outline-primary" href="index.php">回首頁</a>

</body>

</html>