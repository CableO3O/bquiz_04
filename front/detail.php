<?php
$good=$Goods->find($_GET['id']);
?>
<style>
        .item {
            width: 80%;
            background: #EFCA85;
            display: flex;
            margin: 5px auto;
        }

        .item .img {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #999;
            padding: 5px;
            text-align: center;
        }

        .item .info {
            width: 40%;
            display: flex;
            flex-direction: column;
        }

        .info div {
            border: 1px solid #999;
            border-left: 0px;
            border-top: 0px;
            flex-grow: 1;
        }

        .info div:nth-child(1) {
            border-top: 1px solid #999;
        }
    </style>
<h2 class="ct"><?= $good['name']; ?></h2>
<div class="item">
    <div class="img">
        <a href="?id=<?= $good['id']; ?>">
            <img src="./img/<?= $good['img']; ?>" alt="" style="width: 90%;height:200px">
        </a>
    </div>
    <div class="info">
        <div>分類:
            <?=$Type->find($good['big'])['name'];?> > <?=$Type->find($good['mid'])['name'];?>
        </div>
        <div>編號:<?= $good['no']; ?></div>
        <div>價錢:<?= $good['price']; ?></div>
        <div>詳細說明:<?=$good['intro'];?>...</div>
        <div>庫存量:<?= $good['stock']; ?></div>
    </div>
</div>
<div class="tt ct">
    購買數量:
    <input type="number" name="1" style="width: 50px;">
    <img src="./icon/0402.jpg" alt="">
</div>