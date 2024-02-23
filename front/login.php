<h2>第一次購買</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">
<h2>會員登入</h2>
<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">驗證碼</td>
        <td class="pp">
        <?php
        // 數字驗證
        // $a=rand(10,99);
        // $b=rand(10,99);
        // $_SESSION['ans']=$a+$b;
        // echo $a . "+" . $b . "=";

        // 圖片驗證
    //    $_SESSION['ans']=code(5);
    //    $img=captcha($_SESSION['ans']);
        ?>
        <input type="text" name="ans" id="ans">
        <br>
        <img src="" alt="" id="captcha">
        <button type="button" onclick="captcha(5)">重新產生驗證碼</button>
    </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('mem')">確認</button>
</div>
<script>
    captcha(5);
    function login(table) { 
        $.get("./api/chk_ans.php",{ans:$("#ans").val()},(chk)=>{
            if (parseInt(chk)==0) {
                alert("驗證碼錯誤，請重新輸入")                
            }else{
                $.post("./api/chk_pw.php",{table,acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
                    if (parseInt(res)==0) {
                        alert("帳號或密碼錯誤，請重新輸入")
                    }else{
                        location.href="index.php";
                    }
                })
            }
        }
     )}
     function captcha(){
        $.get("./api/captcha.php",(img)=>{
            $("#captcha").attr("src",img);
        })
       
     }
</script>