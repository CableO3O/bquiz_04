<h2 class="ct">填寫資料</h2>
<?php
$mems = $Mem->find($_SESSION['mem']);
?>
<form action="./api/order.php" method="post">

    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <?= $mems['acc']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" value="<?= $mems['name']; ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?= $mems['email']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?= $mems['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?= $mems['tel']; ?>"></td>
        </tr>
    </table>
    <table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $sum=0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $goods=$Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?=$goods['name'];?></td>
            <td><?=$goods['no'];?></td>
            <td><?=$qt;?></td>
            <td><?=$goods['price'];?></td>
            <td><?=$goods['price']*$qt;?></td>
        </tr>
    <?php
    $sum+=$goods['price']*$qt;
    }
    ?>
</table>
    <div class="all ct tt">總價:<?=$sum;?>元</div>
    <div class="ct">
        <input type="hidden" name="total" value="<?=$sum;?>">
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    </div>
</form>