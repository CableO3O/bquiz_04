<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>
</div>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="tt ct">密碼</td>
        <td class="tt ct">管理</td>
    </tr>
    <?php
    $admins = $Admin->all();
    foreach ($admins as $admin) {
    ?>
        <tr>
            <td class="pp ct"><?= $admin['acc']; ?></td>
            <td class="pp ct"><?= str_repeat('*', mb_strlen($admin['pw'])); ?></td>
            <td class="pp ct">
                <?php
                if ($admin['acc'] == 'admin') {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <button onclick="location.href='?do=edit_admin&&id=<?= $admin['id']; ?>'">修改</button>
                    <button onclick="del('admin',<?= $admin['id']; ?>)">刪除</button>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>
<script>
    function del(table,id) {
	$.post("./api/del.php",{table,id},()=>{
		location.reload();
	})
}
</script>
