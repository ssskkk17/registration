<?php
session_start();
if(!empty($_SESSION) && $_SESSION['authority']=="0") {
    header('Location:index.php');
}
?>
<?php
$id=$_POST['id'];
?>
<?php 
mb_internal_encoding("utf-8");
$pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
$stmt=$pdo->query("select * from regist_user where id=$id");
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除画面</title>
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
            form {
                margin: 0 auto;
                width: 500px;
            }
            form div {
                padding: 10px;
            }
            form label {
                display: inline-block;
                width: 150px;
                vertical-align: top;
            }
            footer {
                clear: both;
                background-color: black;
                height: 50px;
                width: 100%;
                bottom: 0px;
            }
            .send {
                text-align: center;
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
            <h1>アカウント削除画面</h1>
            <br>
            <form method="post"action="delete_confirm.php">
                <?php 
                while($row=$stmt->fetch()) {?>
                <div>
                    <label>名前（姓）　　</label>
                    <?php echo $row['family_name']; ?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <?php echo $row['last_name']; ?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <?php echo $row['family_name_kana']; ?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <?php echo $row['last_name_kana']; ?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <?php echo $row['mail']; ?>        
                </div>
                <div>
                    <label>性別　　</label>
                    <?php 
                     if($row['gender']=="0") {
                         echo "男";
                     } else {
                         echo "女";
                     }
                    ;?>
                </div>
                <div>
                    <label>郵便番号　　</label>
                    <?php echo $row['postal_code']; ?>
                </div>
                <div>
                    <label>住所（都道府県）　　</label>
                    <?php echo $row['prefecture']; ?>
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    <?php echo $row['address_1']; ?>
                </div>
                <div>
                    <label>住所（番地）　　</label>
                    <?php echo $row['address_2']; ?>
                </div>
                <div>
                    <label>アカウント権限    </label>
                    <?php 
                    if($row['authority']=="0") {
                        echo "一般";
                    } else {
                        echo "管理者";
                    };?>
                </div>
                <?php };?>
                <br>
                <div class="send">
                    <input type="submit"class="button"name="confirm"value="確認する">
                    <input type="hidden"value="<?php echo $_POST['id'];?>" name="id">
                    <input type="hidden"value="<?php echo $row['familyname'];?>" name="familyname">
                    <input type="hidden"value="<?php echo $row['lastname'];?>" name="lastname">
                    <input type="hidden"value="<?php echo $row['kana_family'];?>" name="kana_family">
                    <input type="hidden"value="<?php echo $row['kana_name'];?>" name="kana_name">
                    <input type="hidden"value="<?php echo $row['mail'];?>" name="mail">
                    <input type="hidden"value="<?php echo $row['password'];?>" name="password">
                    <input type="hidden"value="<?php echo $row['gender'];?>" name="gender">
                    <input type="hidden"value="<?php echo $row['postalcode'];?>" name="postalcode">
                    <input type="hidden"value="<?php echo $row['pre'];?>" name="pre">
                    <input type="hidden"value="<?php echo $row['shikutyouson'];?>" name="shikutyouson">
                    <input type="hidden"value="<?php echo $row['banchi'];?>" name="banchi">
                    <input type="hidden"value="<?php echo $row['authority'];?>" name="authority">
                </div>
            </form>
        </main>
        <footer>
        </footer>
    </body>
</html>