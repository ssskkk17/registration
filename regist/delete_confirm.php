<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除確認画面</title>
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
                font-size: 70px;
                text-align: center;
                padding-top: 100px;
            }
            .delete {
                float: left;
                padding-left: 600px;
            }
            .back {
                float: right;
                padding-right: 700px;
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
            <h1>アカウント削除確認画面</h1>
            <p>本当に削除してよろしいですか？</p>
            <br>
            <br>
            <form method="post"class="delete"action="delete_complete.php">
                <input type="submit"value="削除する">
                <input type="hidden"value="<?php echo $_POST['id'];?>" name="id">
                <input type="hidden"value="<?php echo $_POST['familyname'];?>" name="familyname">
                <input type="hidden"value="<?php echo $_POST['lastname'];?>" name="lastname">
                <input type="hidden"value="<?php echo $_POST['kana_family'];?>" name="kana_family">
                <input type="hidden"value="<?php echo $_POST['kana_name'];?>" name="kana_name">
                <input type="hidden"value="<?php echo $_POST['mail'];?>" name="mail">
                <input type="hidden"value="<?php echo $_POST['password'];?>" name="password">
                <input type="hidden"value="<?php echo $_POST['gender'];?>" name="gender">
                <input type="hidden"value="<?php echo $_POST['postalcode'];?>" name="postalcode">
                <input type="hidden"value="<?php echo $_POST['pre'];?>" name="pre">
                <input type="hidden"value="<?php echo $_POST['shikutyouson'];?>" name="shikutyouson">
                <input type="hidden"value="<?php echo $_POST['banchi'];?>" name="banchi">
                <input type="hidden"value="<?php echo $_POST['authority'];?>" name="authority">
            </form>
            <form method="post"class="back"action="delete.php">
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
                <input type="hidden"value="<?php echo $_POST['pre'];?>" name="pre">
                <input type="hidden"value="<?php echo $_POST['shikutyouson'];?>" name="shikutyouson">
                <input type="hidden"value="<?php echo $_POST['banchi'];?>" name="banchi">
                <input type="hidden"value="<?php echo $_POST['authority'];?>" name="authority">
            </form>
        </main>
        <footer></footer>
    </body>
</html>