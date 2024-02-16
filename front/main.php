    <?php
    $type = $_GET['type'] ?? 0;
    $nav = '';
    $goods = null;
    if ($type == 0) {
        $nav = "全部商品";
        $goods = $Goods->all(['sh' => 1]);
    } else {
        $t = $Type->find($type);
        if ($t['big_id'] == 0) {
            $nav = $t['name'];
            $goods = $Goods->all(['sh' => 1, 'big' => $t['id']]);
        } else {
            $b = $Type->find($t['big_id']);
            $nav = $b['name'] . ">" . $t['name'];
            $goods = $Goods->all(['sh' => 1, 'mid' => $t['id']]);
        }
    }
    ?>
    <h1><?= $nav; ?></h1>
    <style>
        .item {
            width: 80%;
            height: 160px;
            background: #EFCA85;
            margin: 5px;
            display: flex;
            margin: 5px auto;
        }

        .item .img {
            width: 33%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #999;
        }

        .item .info {
            width: 67%;
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
    <?php
    foreach ($goods as $good) {
    ?>
        <!-- table版 -->
        <!-- <table style="width: 100%;">
    <tr style="text-align:center;">
        <td rowspan="4"  class="pp" style="width: 40%;"><img style="width:200px;height:150px;margin-top:20px;margin-bottom:20px;" src="./img/<?= $good['img']; ?>" alt=""></td>
        <td class="tt"><?= $good['name']; ?></td>
    </tr>
    <tr>
        <td class="pp">
            價錢:<?= $good['price']; ?>
            <span>
                <a href="" style="float:right"><img src="./icon/0402.jpg" alt=""></a>
            </span>
        </td>
    </tr>
    <tr>
        <td class="pp">規格:<?= $good['spec']; ?></td>
    </tr>
    <tr>
        <td class="pp">簡介:<?= mb_substr($good['intro'], 0, 30); ?>...</td>
    </tr>
</table> -->
        <!-- div版 -->
        <div class="item">
            <div class="img">
                <img src="./img/<?= $good['img']; ?>" alt="" style="width: 80%;height:130px">
            </div>
            <div class="info">
                <div class="ct tt"><?= $good['name']; ?></div>
                <div>
                    價錢:<?= $good['price']; ?>
                    <span>
                        <a href="" style="float:right"><img src="./icon/0402.jpg" alt=""></a>
                    </span>
                </div>
                <div>規格:<?= $good['spec']; ?></div>
                <div>簡介:<?= mb_substr($good['intro'], 0, 30); ?>...</div>
            </div>
        </div>
    <?php
    }
    ?>