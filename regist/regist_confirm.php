<?php
mb_internal_encoding("utf-8");
session_start();
if(!empty($_SESSION)) {
    $pdo = new PDO("mysql:dbname=regist;host=localhost;", "root", "");
    $pdo ->exec("insert into regist_user(family_name,last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, registered_time) values('".$_SESSION['join']['familyname']."', '".$_SESSION['join']['lastname']."', '".$_SESSION['join']['kana_family']."', '".$_SESSION['join']['kana_name']."', '".$_SESSION['join']['mail']."', '".$_SESSION['join']['password']."', '".$_SESSION['join']['gender']."', '".$_SESSION['join']['postalcode']."', '".$_SESSION['join']['pre']."', '".$_SESSION['join']['shikutyouson']."', '".$_SESSION['join']['banchi']."', '".$_SESSION['join']['authority']."', '$registered_time');");
    header('Location:http:regist_complete.php');
    session_destroy();
    exit();
}
?>
    
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>入力内容確認画面</title>
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
        main {
            margin: 0 auto;
        }
        form {
            margin: 0 auto;
            width: 500px;
        }
        form div {
            padding: 10px;
        }
        .button {
            text-align: center;
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
            <h1>アカウント登録確認画面</h1>
            <p>入力した内容はこちらでよろしいでしょうか。</p>
            よろしければ「送信」を押してください。
            <br>
            <form method="post"action="">
                <div>
                    <label>名前（姓）　　</label>
                    <?php echo htmlspecialchars($_SESSION['join']['familyname']); ?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <?php echo htmlspecialchars($_SESSION['join']['lastname']); ?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <?php echo htmlspecialchars($_SESSION['join']['kana_family']); ?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <?php echo htmlspecialchars($_SESSION['join']['kana_name']); ?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <?php echo htmlspecialchars($_SESSION['join']['mail']); ?>        
                </div>
                <div>
                    <label>パスワード　　</label>
                    <?php
                    $pass="password";
                    $pass_mask=str_pad("", strlen($pass), "●");
                    echo htmlspecialchars($_SESSION['join']['password']); ?>
                </div>
                <div>
                    <label>性別　　</label>
                    
                </div>
                <div>
                    <label>郵便番号　　</label>
                    
                </div>
                <div>
                    <label>住所（都道府県）　　</label>
                    
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    
                </div>
                <div>
                    <label>住所（番地）　　</label>
                    
                </div>
                <div>
                    <label>アカウント権限</label>
                    
                </div>
                <br>
                <div class="button">
                    <input type="submit"class="submit"value="送信">
                </div>
            </form>
        </main>
        <footer>
        </footer>
    </body>
</html>