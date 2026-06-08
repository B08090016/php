<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0);// 關閉錯誤報告
    session_start();// 啟用 Session 機制
    // 檢查有沒有登入（Session 裡有沒有 id）
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        // 3 秒後自動跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    // 已登入，顯示新增使用者的表單
    else{    
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>