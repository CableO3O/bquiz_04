<h2 class="ct">會員管理</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="tt ct">會員帳號</td>
        <td class="tt ct">註冊日期</td>
        <td class="tt ct">管理</td>
    </tr>
    <?php
    $Mems = $Mem->all();
    foreach ($Mems as $Mem) {
    ?>
        <tr>
            <td class="pp ct"><?= $Mem['name']; ?></td>
            <td class="pp ct"><?= $Mem['acc']; ?></td>
            <td class="pp ct"><?= $Mem['regdate']; ?></td>
            <td class="pp ct">
                <button onclick="location.href='?do=edit_mem&&id=<?= $Mem['id']; ?>'">修改</button>
                <button onclick="del('mem',<?= $Mem['id']; ?>)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>