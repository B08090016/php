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
        //連線到資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
       //根據網址GET傳來的bid查詢該筆佈告資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        $row=mysqli_fetch_array($result);
        //預設單選鈕的勾選狀態為空字串
        $checked1="";
        $checked2="";
        $checked3="";
        //根據資料庫撈出來的類型，決定哪一個單選鈕要加上checked
        if ($row['type']==1)
            $checked1="checked";// 系上公告
        if ($row['type']==2)
            $checked2="checked";// 獲獎資訊
        if ($row['type']==3)
            $checked3="checked";// 徵才資訊
        //輸出修改佈告的 HTML 表單，並帶入原本的舊資料
            echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>