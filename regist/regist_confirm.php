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
        main{
            text-align: center;
        }
        footer {
            background-color: black;
            height: 50px;
            width: 100%;
            position: fixed;
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
            <br>
            よろしければ「送信」を押してください。
            <br>
            <form method="post"action="regist_complete.php">
                <div>
                    <label>名前（姓）　　</label>
                    <?php echo $_POST['familyname'];?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <?php echo $_POST['lastname'];?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <?php echo $_POST['kana_family'];?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <?php echo $_POST['kana_name'];?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <?php echo $_POST['mail'];?>
                </div>
                <div>
                    <label>パスワード　　</label>
                    <?php $_POST['password'];?>
                </div>
                <div>
                    <label>性別　　</label>
                    <?php $_POST['gender'];?>
                </div>
                <div>
                    <label>郵便番号　　</label>
                    <?php $_POST['postalcode'];?>
                </div>
                <div>
                    <label>住所（都道府県）　　</label>
                    <?php $_POST['pre'];?>
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    <?php $_POST['shikutyouson'];?>
                </div>
                <div>
                    <label>住所（番地）　　</label>
                    <?php $_POST['banchi'];?>
                </div>
                <div>
                    <label>アカウント権限</label><?php $_POST[''];?>
                </div>
                <br>
                <br>
                <div>
                    <button type="button"onclick="history.back(-1)">前に戻る</button>
                    <input type="submit"class="submit"value="送信">
                </div>
            </form>
        </main>
        <footer>
        </footer>
    </body>
</html>