<?php
mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=regist;host=localhost;", "root", "");
$pdo ->exec("insert into regist_user(id, family_name,last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time, update_time) values('".$_POST['familyname']."', '".$_POST['lastname']."', '".$_POST['kana_family']."', '".$_POST['kana_name']."', '".$_POST['mail']."', '".$_POST['password']."', '".$_POST['gender']."', '".$_POST['postalcode']."', '".$_POST['pre']."', '".$_POST['shikutyouson']."', '".$_POST['banchi']."', '".$_POST['']."');");
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録完了画面</title>
        <style></style>
    </head>
    <body>
        <header>
        </header>
        <main>
            <p>アカウント登録完了画面</p>
            <h1>登録完了しました</h1>
            <form method="post"action="index.html">
            <input type="submit"class="submit"value="TOPページに戻る">
            </form>
        </main>
        <footer>
        </footer>
    </body>
</html>