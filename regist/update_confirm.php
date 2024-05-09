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
            よろしければ「登録する」を押してください。
            <br>
            <form method="post"action="update_complete.php">
                <div>
                    <label>名前（姓）　　</label>
                    <?php echo htmlspecialchars($_POST['familyname']); ?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <?php echo htmlspecialchars($_POST['lastname']); ?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <?php echo htmlspecialchars($_POST['kana_family']); ?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <?php echo htmlspecialchars($_POST['kana_name']); ?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <?php echo htmlspecialchars($_POST['mail']); ?>        
                </div>
                <div>
                    <label>パスワード　　</label>
                    <?php $pass=$_POST['password'];
                    echo str_repeat('●', strlen($pass)), PHP_EOL;
                    ?>
                </div>
                <div>
                    <label>性別　　</label>
                    <?php echo htmlspecialchars($_POST['gender']); ?>
                </div>
                <div>
                    <label>郵便番号　　</label>
                    <?php echo htmlspecialchars($_POST['postalcode']); ?>
                </div>
                <div>
                    <label>住所（都道府県）　　</label>
                    <?php echo htmlspecialchars($_POST['pre']); ?>
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    <?php echo htmlspecialchars($_POST['shikutyouson']); ?>
                </div>
                <div>
                    <label>住所（番地）　　</label>
                    <?php echo htmlspecialchars($_POST['banchi']); ?>
                </div>
                <div>
                    <label>アカウント権限    </label>
                    <?php echo $_POST['authority'];
                    ?>
                </div>
                <br>
                <div class="send">
                    <input type="submit"name="send"value="更新する">
                </div>
                <input type="hidden"value="<?php echo $_POST['id'];?>" name="id">
                <input type="hidden"value="<?php echo $_POST['familyname'];?>" name="familyname">
                <input type="hidden"value="<?php echo $_POST['lastname'];?>" name="lastname">
                <input type="hidden"value="<?php echo $_POST['kana_family'];?>" name="kana_family">
                <input type="hidden"value="<?php echo $_POST['kana_name'];?>" name="kana_name">
                <input type="hidden"value="<?php echo $_POST['mail'];?>" name="mail">
                <input type="hidden"value="<?php echo $_POST['password'];?>" name="password">
                <input type="hidden"value="<?php echo $_POST['gender'];?>" name="gender">
                <input type="hidden"value="<?php echo $_POST['postalcode'];?>" name="postalcode">
                <input type="hidden"value="<?php echo $_POST['shikutyouson'];?>" name="shikutyouson">
                <input type="hidden"value="<?php echo $_POST['banchi'];?>" name="banchi">
                <input type="hidden"value="<?php echo $_POST['authority'];?>" name="authority">
            </form>
            <div class="back">
                <form method="post"action="update.php">
                    <input type="submit"value="前に戻る">
                    <input type="hidden"value="<?php echo $_POST['id'];?>" name="id">
                    <input type="hidden"value="<?php echo $_POST['familyname'];?>" name="familyname">
                    <input type="hidden"value="<?php echo $_POST['lastname'];?>" name="lastname">
                    <input type="hidden"value="<?php echo $_POST['kana_family'];?>" name="kana_family">
                    <input type="hidden"value="<?php echo $_POST['kana_name'];?>" name="kana_name">
                    <input type="hidden"value="<?php echo $_POST['mail'];?>" name="mail">
                    <input type="hidden"value="<?php echo $_POST['password'];?>" name="password">
                    <input type="hidden"value="<?php echo $_POST['gender'];?>" name="gender">
                    <input type="hidden"value="<?php echo $_POST['postalcode'];?>" name="postalcode">
                    <input type="hidden"value="<?php echo $_POST['shikutyouson'];?>" name="shikutyouson">
                    <input type="hidden"value="<?php echo $_POST['banchi'];?>" name="banchi">
                    <input type="hidden"value="<?php echo $_POST['authority'];?>" name="authority">
                </form>
            </div>
        </main>
        <footer>
        </footer>
    </body>
</html>