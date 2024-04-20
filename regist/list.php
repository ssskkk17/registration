<?php
mb_internal_encoding("utf8");
$pdo=new PDO("mysql:dbname=regist; host=localhost;", "root", "");
$stmt=$pdo->query("select * from regist_user order by id desc");

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント一覧画面</title>
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
            table {
                width: 100%;
            }
            table td {
                padding: 0auto;
            }
            footer {
                background-color: black;
                height: 50px;
                width: 100%;
                bottom: 0px;
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
            <h2>アカウント一覧</h2>
            <table border="1"cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>名前（姓）</th>
                    <th>名前（名）</th>
                    <th>カナ（姓）</th>
                    <th>カナ（名）</th><th>メールアドレス</th>
                    <th>性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th colspan="2">操作</th>
                </tr>
                    <?php echo "<tr>\n";
                    foreach($stmt as $row) {
                    echo "<td align='right'>"; echo $row['id']; echo "</td>";
                    echo "<td align='right'>"; echo $row['family_name']; echo "</td>";
                    echo "<td align='right'>"; echo $row['last_name']; echo "</td>";
                    echo "<td align='right'>"; echo $row['family_name_kana']; echo "</td>";
                    echo "<td align='right'>"; echo $row['last_name_kana']; echo "</td>";
                    echo "<td>"; echo $row['mail']; echo "</td>";
                    echo "<td align='center'>"; echo $row['gender']; echo "</td>";
                    echo "<td align='center'>"; if($row['authority']=="0") {echo "一般";} else {echo "管理者";} echo "</td>";
                    echo "<td align='center'>"; if($row['delete_flag']=="0") {echo "有効";} else {echo "無効";} echo "</td>";
                    echo "<td align='center'>"; echo $row['registered_time']; echo "</td>";
                    echo "<td align='center'>"; echo $row['update_time']; echo "</td>";
                    echo "<td align='center'>";
                    echo '<form method="post"action="delete.php">';
                    echo '<input type="submit"value="更新">';
                    echo "</form>";
                    echo "</td>";
                    echo "<td align='center'>";
                    echo '<form method="post"action="update.php">';
                    echo '<input type="submit"value="削除">';
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>\n";
                    }?>
            </table>
        </main>
        
        <footer>
        </footer>
    </body>
</html>