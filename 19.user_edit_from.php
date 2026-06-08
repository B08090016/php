<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);// 關閉錯誤報告
    session_start();// 啟用 Session
    //檢查是否登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        //連線到資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        //查詢該 ID 的使用者舊資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        //解析查詢結果並存入 $row 陣列
        $row=mysqli_fetch_array($result);
        //輸出修改表單，並將舊資料預填在欄位中
        //資料以post方式傳送到 20.user_edit.php
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>