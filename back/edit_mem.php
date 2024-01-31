<h2 class="ct">編輯會員資料</h2>
<?php
$mems = $Mem->find($_GET['id']);
?>
<form action="./api/reg.php" method="post">

    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <?= $mems['acc']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <?= str_repeat("*", strlen($mems['name'])); ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">累積較易額</td>
            <td class="pp">
                685元
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?= $mems['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?= $mems['email']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="addr" value="<?= $mems['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?= $mems['tel']; ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $mems['id']; ?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="location.href='?do=mem'">
    </div>
</form>