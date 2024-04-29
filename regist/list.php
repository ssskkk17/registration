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
            h2 {
                padding-left: 70px;
            }
            table {
                width: 90%;
                margin: auto;
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
            <br>
            <br>
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
                <tr>
                    <?php
                    foreach($stmt as $row) {?>
                    <td align='right'><?php echo $row['id']?></td>
                    <td align='right'><?php echo $row['family_name']?></td>
                    <td align='right'><?php echo $row['last_name']?></td>
                    <td align='right'><?php echo $row['family_name_kana']?></td>
                    <td align='right'><?php echo $row['last_name_kana']?></td>
                    <td><?php echo $row['mail']?></td>
                    <td align='center'><?php if($row['gender']=="0") {echo "男";} else {echo "女";}?></td>
                    <td align='center'><?php if($row['authority']=="0") {echo "一般";} else {echo "管理者";}?></td>
                    <td align='center'><?php if($row['delete_flag']=="0") {echo "有効";} else {echo "無効";}?></td>
                    <td align='center'>
                        <?php $ts=strtotime($row['registered_time']);
                        echo date('Y/m/d', $ts);?>
                    </td>
                    <td align='center'><?php echo $row['update_time'];?></td>
                    <td align='center'>
                        <a href="delete.php?id=<?php echo $row['id']?>">
                            <input type="submit"value="削除">
                        </a>
                    </td>
                    <td align='center'>
                        <a href="update.php?id=<?php echo $row['id']?>">
                            <input type="submit"value="更新">
                        </a>
                    </td>
                </tr>
                <?php }; ?>
            </table>
        </main>
        <br>
        <footer>
        </footer>
    </body>
</html>