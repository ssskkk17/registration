<?php
$id=$_GET['id'];
?>
<?php 
mb_internal_encoding("utf-8");
$pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
$stmt=$pdo->query("select * from regist_user where id=$id");
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除画面</title>
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
            form {
                margin: 0 auto;
                width: 500px;
            }
            form div {
                padding: 10px;
            }
            form label {
                display: inline-block;
                width: 150px;
                vertical-align: top;
            }
            footer {
                clear: both;
                background-color: black;
                height: 50px;
                width: 100%;
                bottom: 0px;
            }
            .send {
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
            <h1>アカウント削除画面</h1>
            <br>
            <form method="post"action="delete_confirm.php">
                <?php 
                while($row=$stmt->fetch()) {?>
                <div>
                    <label>名前（姓）　　</label>
                    <?php echo htmlspecialchars($row['family_name']); ?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <?php echo htmlspecialchars($row['last_name']); ?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <?php echo htmlspecialchars($row['family_name_kana']); ?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <?php echo htmlspecialchars($row['last_name_kana']); ?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <?php echo htmlspecialchars($row['mail']); ?>        
                </div>
                <div>
                    <label>パスワード　　</label>
                    <?php $pass=$row['password'];
                    echo str_repeat('●', strlen($pass)), PHP_EOL;
                    ?>
                </div>
                <div>
                    <label>性別　　</label>
                    <?php echo htmlspecialchars($row['gender']); ?>
                </div>
                <div>
                    <label>郵便番号　　</label>
                    <?php echo htmlspecialchars($row['postal_code']); ?>
                </div>
                <div>
                    <label>住所（都道府県）　　</label>
                    <?php echo htmlspecialchars($row['prefecture']); ?>
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    <?php echo htmlspecialchars($row['address_1']); ?>
                </div>
                <div>
                    <label>住所（番地）　　</label>
                    <?php echo htmlspecialchars($row['address_2']); ?>
                </div>
                <div>
                    <label>アカウント権限    </label>
                    <?php echo $row['authority'];?>
                </div>
                <?php };?>
                <br>
                <div class="send">
                    <input type="submit"class="button"name="confirm"value="確認する">
                </div>
            </form>
        </main>
        <footer>
        </footer>
    </body>
</html>