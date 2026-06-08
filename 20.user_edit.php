<?php

    error_reporting(0);// 關閉錯誤報告
    session_start();// 啟用 Session（檢查登入狀態）
    //檢查是否登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        //連線到資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        //執行更新指令
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            echo "修改錯誤";// 更新失敗
            // 3秒後跳回使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
            echo "修改成功，三秒鐘後回到網頁";// 更新成功
            // 3秒後跳回使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>