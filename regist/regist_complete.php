<?php 
if(empty($error)) {
    session_start();
    $passhash=password_hash($_SESSION['password'], PASSWORD_DEFAULT);
    date_default_timezone_set('Asia/Tokyo');
    if($_SESSION['authority']=="管理者") {
        $authority=1;
    } else {
        $authority=0;
    }
    $deleteflag='';
    if(!empty($deleteflag) && $deleteflag==0) {
        $deleteflag==0;//有効
    }
    if(!empty($deleteflag) && $deleteflag==1) {
        $deleteflag==1;//無効
    }
    $registered_time=date('Y-m-d h:i:s');
    $pdo = new PDO("mysql:dbname=regist;host=localhost;", "root", "");
    $pdo ->exec("insert into regist_user(family_name,last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time) values('".$_SESSION['familyname']."', '".$_SESSION['lastname']."', '".$_SESSION['kana_family']."', '".$_SESSION['kana_name']."', '".$_SESSION['mail']."', '$passhash', '".$_SESSION['gender']."', '".$_SESSION['postalcode']."', '".$_SESSION['pre']."', '".$_SESSION['shikutyouson']."', '".$_SESSION['banchi']."', '$authority', '$deleteflag', '$registered_time');");
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
            }</style>
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
<?php 
session_destroy();
?>