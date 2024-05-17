<?php
$id=$_POST['id'];
mb_internal_encoding("utf8");
$familyname=$_POST['familyname'];
$lastname=$_POST['lastname'];
$kana_family=$_POST['kana_family'];
$kana_name=$_POST['kana_name'];
$mail=$_POST['mail'];
if($_POST['gender']=="男") {
    $gender=0;
} else {
    $gender=1;
}
$postalcode=$_POST['postalcode'];
$pre=$_POST['pre'];
$address_1=$_POST['shikutyouson'];
$address_2=$_POST['banchi'];
if($_POST['authority']=="一般") {
    $authority=0;
} else {
    $authority=1;
}
$delete_flag=0;
date_default_timezone_set('Asia/Tokyo');
$update_time=date('Y-m-d h:i:s');
if(empty($_POST['password'])) {
    try {
        $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
        $pdo->exec("update regist_user set family_name='$familyname', last_name='$lastname', family_name_kana='$kana_family', last_name_kana='$kana_name', mail='$mail', gender='$gender', postal_code='$postalcode', prefecture='$pre', address_1='$address_1', address_2='$address_2', authority='$authority', delete_flag='$delete_flag', update_time='$update_time' where id=$id"); 
    } catch(PDOException) {
        header('Location:error.html');
        exit();
    }
}else{
    try {
        $passhash=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");$pdo->exec("update regist_user set family_name='$familyname', last_name='$lastname', family_name_kana='$kana_family', last_name_kana='$kana_name', mail='$mail', password='$passhash', gender='$gender', postal_code='$postalcode', prefecture='$pre', address_1='$address_1', address_2='$address_2', authority='$authority', delete_flag='$delete_flag', update_time='$update_time' where id=$id");
    } catch(PDOException) {
        header('location:error.html');
        exit();
    }
};
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント更新完了画面</title>
        <style>
            p {
                text-align: center;
                color: red;
                font-size: 50px;
            }
            form {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header></header>
        <main>
            <h1>アカウント更新完了画面</h1>
            <p>更新が完了しました。</p>
            <form method="post"action="index.php">
            <input type="submit"value="TOPに戻る">
            </form>
        </main>
        <footer></footer>
    </body>
</html>