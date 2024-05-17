<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <style>
            form {
                text-align: center;
                margin: 30px;
                padding-top: 200px;
            }
        </style>
    </head>
    
    <body>
        <header></header>
        <main>
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
                <input type="submit"name="login"value="ログイン">
            </form>
        </main>
        <footer></footer>
    </body>
</html>