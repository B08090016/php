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
        //設定刪除資料的 SQL 指令
        $sql="delete from user where id='{$_GET["id"]}'";
        #echo $sql;
        //執行 SQL 指令並檢查是否成功
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";// 刪除失敗
        }else{
            echo "使用者刪除成功";// 刪除成功
        }
        //3秒後跳轉回使用者列表頁
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>