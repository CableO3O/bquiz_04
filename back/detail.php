<?php
$order=$Orders->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color: red;"><?=$order['no'];?></span>的詳細資料</h2>

<table class="all">
        <tr>
            <td class="tt ct">會員帳號</td>
            <td class="pp">
                <?= $order['acc']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <?= $order['name']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><?= $order['email']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><?= $order['addr']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><?= $order['tel']; ?></td>
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
    $cart=unserialize($order['cart']);
    foreach ($cart as $id => $qt) {
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
    }
        ?>
</table>
    <div class="all ct tt">總價:<?=$order['total'];?>元</div>
    <div class="ct"><button onclick="location.href='back.php'">返回</button></div>