<h2>商品分類</h2>
<div class="ct">
    新增大分類<input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name='big' id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr class="tt">
            <td><?= $big['name']; ?></td>
            <td class="ct">
                <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
                <button onclick="del('type',<?=$big['id'];?>)">刪除</button>
            </td>
        </tr>
        <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr class="pp tt">
                <td class="ct"><?= $mid['name']; ?></td>
                <td class="ct">
                <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
                <button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
                </td>
            </tr>
    <?php
        }
    }

    ?>
</table>

<script>
    getTypes(0)

    function getTypes(big_id) {
        $.get("./api/get_types.php", {
            big_id
        }, (types) => {
            $("#bigs").html(types)
        })
    }

    function addType(type) {
        let name, big_id;
        switch (type) {
            case 'big':
                name = $("#big").val();
                big_id = 0;

                break;

            case 'mid':
                name = $("#mid").val();
                big_id = $("#bigs").val();
                break;
        }
        $.post("./api/save_type.php", {
            name,
            big_id
        }, () => {
            location.reload();
        })
    }
    function edit(dom,id) {
        let name=prompt("請輸入你要修改的分類名稱:",`${$(dom).parent().prev().text()}`)
        if (name!=null) {
            $.post("./api/save_type.php",{name,id},()=>{
                $(dom).parent().prev().text(name);
            })
        }
     }
</script>
<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_good'">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
$goods=$Goods->all();
foreach ($goods as $good) {
    ?>
    <tr class="pp">
        <td><?=$good['no'];?></td>
        <td><?=$good['name'];?></td>
        <td><?=$good['stock'];?></td>
        <td><?=($good['sh']==1)?"上架":"下架";?></td>
        <td>
            <button onclick="location.href='?do=edit_good&&id=<?=$good['id'];?>'">修改</button>
            <button onclick="del('goods',<?=$good['id'];?>)">刪除</button>
            <button onclick="sh(1,<?=$good['id'];?>)">上架</button>
            <button onclick="sh(0,<?=$good['id'];?>)">下架</button>
        </td>
    </tr>
    <?php
}
?>
</table>
<script>
    function sh(sh,id){
        $.post("./api/sh.php",{sh,id},()=>{
            location.reload();
        })
    }
</script>