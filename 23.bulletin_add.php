<?php
    error_reporting(0);// 關閉錯誤報告
    session_start();// 啟用 Session
    //檢查是否登入
    if (!$_SESSION["id"]) {
        echo "請先登入";
        // 未登入，3秒後跳回登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        //設定新增佈告的 SQL 指令（將表單傳來的標題、內容、類型、時間寫入 bulletin 資料表）
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
       //執行 SQL 指令並檢查是否成功
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";// 執行失敗
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";// 執行成功
            // 3秒後跳轉到佈告列表頁
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>