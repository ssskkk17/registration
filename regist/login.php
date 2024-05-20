<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
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
            h1 {
                padding-left: 15px;
            }
            form {
                text-align: center;
                margin: 30px;
                padding-top: 200px;
            }
            footer {
                background: black;
                width: 100%;
                height: 50px;
                position: fixed;
                bottom: 0px;
            }
            .submit {
                padding-top: 15px;
            }
        </style>
    </head>
    
    <body>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>D.I.Blogについて</li>
                <li>その他</li>
            </ul>
        </header>
        <main>
            <h1>ログイン画面</h1>
            <form method="post"action="index.php">
                <div>
                    <label>メールアドレス</label>
                    <input type="email"name="mail"maxlength="100"size="20">
                </div>
                <br>
                <br>
                <div>
                    <label>パスワード</label>
                    <input type="text"name="password"maxlength="10"size="20">
                </div>
                <div class="submit">
                    <input type="submit"name="login"value="ログイン">
                </div>
            </form>
        </main>
        <footer></footer>
    </body>
</html>