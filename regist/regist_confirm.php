<?php
require("./dbconnect.php");
$error=[];
session_start();
if($_POST['familyname']=='') {
    $error['familyname']='blank';
} else {
    $_SESSION['familyname']=$_POST['familyname'];
}

if($_POST['lastname']=='') {
    $error['lastname']='blank';
} else {
    $_SESSION['lastname']=$_POST['lastname'];
}

if($_POST['kana_family']=='') {
    $error['kana_family']='blank';
} else {
    $_SESSION['kana_family']=$_POST['kana_family'];
}

if($_POST['kana_name']=='') {
    $error['kana_name']='blank';
} else {
    $_SESSION['kana_name']=$_POST['kana_name'];
}

if($_POST['mail']=='') {
    $error['mail']='blank';
} else {
    $_SESSION['mail']=$_POST['mail'];
}

if($_POST['password']=='') {
    $error['password']='blank';
} else {
    $_SESSION['password']=$_POST['password'];
}

if($_POST['postalcode']=='') {
    $error['postalcode']='blank';
} else {
    $_SESSION['postalcode']=$_POST['postalcode'];
}

if($_POST['pre']=='') {
    $error['pre']='blank';
} else {
    $_SESSION['pre']=$_POST['pre'];
}

if($_POST['shikutyouson']=='') {
    $error['shikutyouson']='blank';
} else {
    $_SESSION['shikutyouson']=$_POST['shikutyouson'];
}

if($_POST['banchi']=='') {
    $error['banchi']='blank';
} else {
    $_SESSION['banchi']=$_POST['banchi'];
}
$_SESSION['gender']=$_POST['gender'];
$_SESSION['authority']=$_POST['authority'];
if(!empty($error)) {
    header('Location:regist.php');// リダイレクトされる
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
            <form method="post"action="regist_complete.php">
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
                    <?php echo htmlspecialchars($_POST['authority']); ?>
                </div>
                <br>
                <div class="send">
                    <input type="submit"name="send"value="送信"/>
                </div>
            </form>
            <form method="post"action="regist.php">
                <input type="submit"value="戻る"/>
            </form>
            <?php if(empty($error)) {
                $passhash=password_hash($_POST['password'], PASSWORD_DEFAULT);
                date_default_timezone_set('Asia/Tokyo');
                $registered_time=date('Y/m/d H:i:s');
                $pdo = new PDO("mysql:dbname=regist;host=localhost;", "root", "");
                $pdo ->exec("insert into regist_user(family_name,last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, registered_time) values('".$_POST['familyname']."', '".$_POST['lastname']."', '".$_POST['kana_family']."', '".$_POST['kana_name']."', '".$_POST['mail']."', '$passhash', '".$_POST['gender']."', '".$_POST['postalcode']."', '".$_POST['pre']."', '".$_POST['shikutyouson']."', '".$_POST['banchi']."', '".$_POST['authority']."', '$registered_time');");
            }
            ?>
        </main>
        <footer>
        </footer>
        
    </body>
</html>