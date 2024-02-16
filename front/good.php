    <?php
    $type=$_GET['type']??0;
    $nav='';
    $goods=null;
    if ($type==0) {
        $nav="全部商品";
        $goods=$Goods->all(['sh'=>1]);
    }else{
        $t=$Type->find($type);
        if ($t['big_id']==0) {
            $nav=$t['name'];
            $goods=$Goods->all(['sh'=>1,'big'=>$t['id']]);
        }else{
            $b=$Type->find($t['big_id']);
            $nav=$b['name'].">".$t['name'];
            $goods=$Goods->all(['sh'=>1,'mid'=>$t['id']]);
        }
    }
?>
<h1><?=$nav;?></h1>
<?php
foreach ($goods as $good) {
?>
<!-- <table style="width: 100%;">
    <tr style="text-align:center;">
        <td rowspan="4"  class="pp" style="width: 40%;"><img style="width:200px;height:150px;margin-top:20px;margin-bottom:20px;" src="./img/<?=$good['img'];?>" alt=""></td>
        <td class="tt"><?=$good['name'];?></td>
    </tr>
    <tr>
        <td class="pp">
            價錢:<?=$good['price'];?>
            <span>
                <a href="" style="float:right"><img src="./icon/0402.jpg" alt=""></a>
            </span>
        </td>
    </tr>
    <tr>
        <td class="pp">規格:<?=$good['spec'];?></td>
    </tr>
    <tr>
        <td class="pp">簡介:<?=mb_substr($good['intro'],0,30);?>...</td>
    </tr>
</table> -->
<div class="item">
    <div class="img">
        <img src="./img/<?=$good['img'];?>" alt="" style="width: 200px;height:150px">
    </div>
    <div class="imfo">
        <div class="ct tt"><?=$good['name'];?></div>
        <div>價錢:<?=$good['price'];?></div>
        <div>規格:<?=$good['spec'];?></div>
        <div>簡介:<?=mb_substr($good['intro'],0,30);?>...</div>
    </div>
</div>
<?php
}
?>