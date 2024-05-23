<?php 
mb_internal_encoding("utf8");
if($_POST) {
    if(empty($_POST['mail'])) {
        $error['mail']='blank';
    }
    if(empty($_POST['password'])) {
        $error['password']='blank';
    }
}
?>

<?php
$mail='';
$pass='';
if(!empty($_POST['mail'])) {
    $mail=$_POST['mail'];
}
if(!empty($_POST['password'])) {
    $pass=$_POST['password'];
}
try {
    $pdo=new PDO("mysql:dbname=regist; host=localhost;", "root", "");
    $stmt=$pdo->query("select * from regist_user where mail='$mail'");
    $row=$stmt->fetch();
    foreach($stmt as $row);
    $hash=$row['password'];
}catch(PDOException) {
    echo "<div class='err'>";
    echo "エラーが発生したためログイン情報を取得できません。";
    echo "</div>";
}
if(!empty($pass)) {
    if(password_verify($pass, $hash)) {
        session_start();
        $_SESSION['password']=$pass;
        $_SESSION['mail']=$mail;
        $_SESSION['familyname']=$row['family_name'];
        $_SESSION['lastname']=$row['last_name'];
        $_SESSION['authority']=$row['authority'];
        header('Location:index.php');
    }
    else {
        echo "<div class='wrong'>";
        echo "メールアドレスとパスワードの組み合わせが違います。もう一度入力してください。";
        echo "</div>";
    }
}
?>

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
            .wrong {
                color: red;
                font-size: 30px;
            }
            .err {
                color: red;
                font-size: 30px;
            }
            h1 {
                padding-left: 15px;
            }
            form {
                text-align: center;
                margin: 30px;
                padding-top: 200px;
            }
            p {
                color: red;
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
            <form method="post"action="">
                <div>
                    <label>メールアドレス</label>
                    <input type="email"name="mail"maxlength="100"size="20">
                    <p><?php if(!empty($error['mail'])){echo "メールアドレスが未入力です。入力してください。";}?></p>
                </div>
                <br>
                <br>
                <div>
                    <label>パスワード</label>
                    <input type="text"name="password"maxlength="10"size="20">
                    <p><?php if(!empty($error['password'])){echo "パスワードが未入力です。入力してください。";}?></p>
                </div>
                <div class="submit">
                    <input type="submit"name="login"value="ログイン">
                </div>
            </form>
        </main>
        <footer></footer>
    </body>
</html>