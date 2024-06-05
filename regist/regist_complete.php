<?php 
if(empty($error)) {
    $passhash=password_hash($_POST['password'], PASSWORD_DEFAULT);
    date_default_timezone_set('Asia/Tokyo');
    if($_POST['authority']=="管理者") {
        $authority=1;
    } else {
        $authority=0;
    }
    if($_POST['gender']=="男") {
        $gender=0;
    } else {
        $gender=1;
    }
    $deleteflag=0;
    $registered_time=date('Y-m-d h:i:s');
    try {
        $pdo = new PDO("mysql:dbname=regiaaaast;host=localhost;", "root", "");
        $pdo ->exec("insert into regist_user(family_name,last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time) values('".$_POST['familyname']."', '".$_POST['lastname']."', '".$_POST['kana_family']."', '".$_POST['kana_name']."', '".$_POST['mail']."', '$passhash', '$gender', '".$_POST['postalcode']."', '".$_POST['pre']."', '".$_POST['shikutyouson']."', '".$_POST['banchi']."', '$authority', '$deleteflag', '$registered_time');");
    } catch(PDOException) {
        $err=1;
        echo "<div class='err'>";
        echo "エラーが発生したため、DB登録できませんでした";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録完了画面</title>            
        <style>
            h1 {
                color: red;
                font-size: 100px;
                text-align: center;
            }
            .err {
                color: red;
            }
        </style>
    </head>
    <body>
        <header>
        </header>
        <main>
            <?php if(empty($err)) {echo "<p>";
                                    echo "アカウント登録完了画面";
                                    echo "</p>";
                                    echo "<h1>";
                                    echo "登録完了しました";
                                    echo "</h1>";}?>
            <form method="post"action="index.php">
                <input type="submit"class="submit"value="TOPページに戻る">
            </form>
            <form method="post"action="logout.php">
                <input type="submit"value="ログアウト">
            </form>
        </main>
        <footer>
        </footer>
    </body>
</html>