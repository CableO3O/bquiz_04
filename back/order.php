<h2 class="ct">訂單管理</h2>
<table class="all">
    <tr>
        <td class="tt ct">訂單編號</td>
        <td class="tt ct">金額</td>
        <td class="tt ct">會員帳號</td>
        <td class="tt ct">姓名</td>
        <td class="tt ct">下單時間</td>
        <td class="tt ct">操作</td>
    </tr>
    <?php
    $orders = $Orders->all();
    foreach ($orders as $order) {
    ?>
        <tr>
            <td class="pp ct">
                <a href="?do=detail&id=<?= $order['id']; ?>">
                    <?= $order['no']; ?>
                </a>
            </td>
            <td class="pp ct"><?= $order['total']; ?></td>
            <td class="pp ct"><?= $order['acc']; ?></td>
            <td class="pp ct"><?= $order['name']; ?></td>
            <td class="pp ct"><?= date("Y/m/d",strtotime($order['orderdate'])); ?></td>
            <td class="pp ct">
                <?php
                echo "<button onclick='del(&#39;orders&#39;,{$order['id']})'>刪除</button>";
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>