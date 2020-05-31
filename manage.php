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
    <div class="form-group">
        <h1 class="h1 header text-center">檔案管理練習</h1>
        <!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
        <form class="form-group" action="save_file.php" method="post" enctype="multipart/form-data">
            <input class="form-control-file" type="file" name="upload" id="img">
            <div class="input-group my-3">
                <label class="form-control col-3" for="note">檔案說明：</label>
                <input class="form-control col-9" type="text" name='note'>
            </div>
            <div class="input-group my-3">
                <label class="form-control col-3" for="album">欲上傳之相簿號碼：</label>
                <input class="form-control col-9" type="number" name='album'>
            </div>
            <input class="btn btn-outline-primary round-pill" type="submit" value="上傳">
        </form>

        <!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
        <table class="table-responsive text-white border rounded-lg p-2">
            <tr>
                <td>預覽</td>
                <td>像簿號碼</td>
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
                <tr class="">
                    <td><img class="img-thumbnail my-2" src='<?= $row['path']; ?>' style="width:200px;height:100px;"></td>
                    <td><?= $row['album']; ?></td>
                    <td><?= $row['path']; ?></td>
                    <td><?= $row['type']; ?></td>
                    <td><?= $row['note']; ?></td>
                    <td><?= $row['upload_time']; ?></td>
                    <td>
                        <div class="btn-group">
                            <!-- <a class="btn btn-outline-info rounded-pill text-nowrap" href="del_file.php?id=<?= $row['id']; ?>">刪除</a> -->
                            <!-- 改顆bootstrap按鈕變彈出視窗非常搞肛 -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-info rounded-pill text-nowrap" data-toggle="modal" data-target="#exampleModal">
                                刪除
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">確認刪除</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            是否確定刪除檔案？
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                            <a type="button" class="btn btn-primary" href="del_file.php?id=<?= $row['id']; ?>">確定</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <a class="btn btn-outline-info rounded-pill text-nowrap" href="update_file.php?id=<?= $row['id']; ?>">更新</a> -->


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-info rounded-pill text-nowrap" data-toggle="modal" data-target="#update">
                                更新
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="update" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="updateLabel">確認更新</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <!-- <img src="<?= $row['path']; ?>" style="width:200px;height:100px">
                                            <div class="form justify-content-center">
                                                <h1 class="h1 header text-center">更新資料</h1>
                                                <form class="form border p-3 justify-content-center" action="update_file.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
                                                    <input class="form-control-file" type="file" name="upload"><br>
                                                    <input class="form-control my-2" type="text" name='note' value="<?= $row['note']; ?>"><br>
                                                    <input class="form-control my-2" type="number" name='album' value="<?= $row['album']; ?>"><br>
                                                    <input type="hidden" name='id' value="<?= $row['id']; ?>">
                                                    <input class="form-control" name="submit" type="submit" value="更新">
                                                </form>
                                            </div> -->
                                            是否確定更新檔案？
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                            <a type="button" class="btn btn-primary" href="update_file.php?id=<?= $row['id']; ?>">確定</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <a href=""></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="index.php" class="btn btn-lg btn-outline-primary border-success rounded-pill m-2">回首頁</></a>


    </div>

    <!-- jQuery&Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>