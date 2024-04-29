<?php
session_start();
$id=$_SESSION['id'];
mb_internal_encoding("utf8");
$familyname=$_SESSION['familyname'];
$lastname=$_SESSION['lastname'];
$kana_family=$_SESSION['kana_family'];
$kana_name=$_SESSION['kana_name'];
$mail=$_SESSION['mail'];
$passhash=password_hash($_SESSION['password'], PASSWORD_DEFAULT);
if($_SESSION['gender']=="男") {
    $gender=0;
} else {
    $gender=1;
}
$postalcode=$_SESSION['postalcode'];
$pre=$_SESSION['pre'];
$address_1=$_SESSION['shikutyouson'];
$address_2=$_SESSION['banchi'];
if($_SESSION['authority']=="一般") {
    $authority=0;
} else {
    $authority=1;
}
$delete_flag=0;
date_default_timezone_set('Asia/Tokyo');
$update_time=date('Y-m-d h:i:s');
try {
    $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
    $pdo->exec("update regist_user set family_name='$familyname', last_name='$lastname', family_name_kana='$kana_family', last_name_kana='$kana_name', mail='$mail, password='$passhash', gender='$gender', postal_code='$postalcode', prefecture='$pre', address_1='$address_1', address_2='$address_2', authority='$authority', delete_flag='$delete_flag', update_time='$update_time' where id=$id");
} catch(PDOException) {
    header('Location:error.html');
    exit();
};
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント更新完了画面</title>
        <style></style>
    </head>
    <body>
        <header></header>
        <main>
            <h1>アカウント更新完了画面</h1>
            <p>更新が完了しました。</p>
            <form method="post"action="index.html">
            <input type="submit"value="TOPに戻る">
            </form>
        </main>
        <footer></footer>
    </body>
</html>
<?php session_destroy();?>