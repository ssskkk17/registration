<?php
mb_internal_encoding("utf8");
$id=$_POST['id'];
$update_time=date('Y-m-d h:i:s');
try {
    $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
    $pdo->exec("update regist_user set delete_flag='1', update_time='$update_time' where id=$id");
} catch(PDOException) {
    header('Location:error.html');
    exit();
};
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除完了画面</title>
        <style>
            header {
                background-color: black;
                height: 50px;
                width: 100%;
                position: relative;
            }
            header ul li {
                color: white;
                float: left;
                font-size: 20px;
                line-height: 50px;
                list-style-type: none;
                padding-left: 20px; 
            }
            p {
                color: red;
                font-size: 80px;
                text-align: center;
                padding-top: 100px;
            }
            footer {
                background-color: black;
                height: 50px;
                width: 100%;
                position: fixed;
                bottom: 0px;
            }
            form {
                text-align: center;
            }
        </style>
    </head>
    
    <body>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>D.IBlogについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        <main>
            <h1>アカウント削除完了画面</h1>
            <p>削除が完了しました。</p>
            <form method="post"action="index.html">
                <input type="submit"class="back"value="TOPへ戻る">
            </form>
        </main>
        <footer></footer>
    </body>
</html>