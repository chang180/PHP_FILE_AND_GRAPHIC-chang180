<style>
    *{
        border:0;
        margin:0;
        box-sizing: border-box;
    }
    img{
        width:100%;
        height:17vh;
        border:3px solid blueviolet;
    }
    .container{
        display:flex;
        justify-content: space-around;
        align-items: center;
        width:80vw;
    }
    .frame {
        /* width:20vw;
        height:20vh; */
        border:1px 1px 5px #990;
        margin:10px;
        vertical-align: middle;
        align-items: center;
        padding:0 10px;
        border:2px solid #5ee;
    }
    </style>
<?="<div class='container'>";?>

<a href="?album=1">美食</a>
<a href="?album=2">旅遊</a>
<a href="?album=3">寵物</a>

<?php
include_once "base.php";

if(!empty($_GET['album'])){
    $album=['album'=>$_GET['album']];
}else{
    $album=[];
}


$image = all("file_info",$album);
// var_dump($image);

foreach ($image as $img) {
    // 至此必須課後再參考老師的範例檔案了
    // echo "<div class='frame'><a href='img/'<img src='thumb/" . $img['filename'] . "'></a></div>";
}
echo "</div>"
?>
<a class="btn btn-outline-primary" href="index.php">回首頁</a>