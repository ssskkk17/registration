<?php
session_start();
if(!empty($_SESSION) && $_SESSION['authority']=="0") {
    header('Location:index.php');
}
?>
<?php
mb_internal_encoding("utf8");
$pdo=new PDO("mysql:dbname=regist; host=localhost;", "root", "");
$familyname='';
$lastname='';
$kana_family='';
$kana_name='';
$mail='';
if(!empty($_POST['familyname'])) {
    $familyname=$_POST['familyname'];
}
if(!empty($_POST['lastname'])) {
    $lastname=$_POST['lastname'];
}
if(!empty($_POST['kana_family'])) {
    $kana_family=$_POST['kana_family'];
}
if(!empty($_POST['kana_name'])) {
    $kana_name=$_POST['kana_name'];
}
if(!empty($_POST['mail'])) {
    $mail=$_POST['mail'];
}
if(!empty($_POST['check'])) {
    if(isset($_POST['gender']) and $_POST['gender']==0 or $_POST['gender']==1) {
    $gender=$_POST['gender'];
    }
    if(isset($_POST['auth']) && $_POST['auth']==0 or $_POST['auth']==1) {
    $auth=$_POST['auth'];
    }
}
if(!empty($_POST['check'])) {
    if(isset($gender) && isset($auth)) {
        $stmt=$pdo->query("select * from regist_user where family_name LIKE '%$familyname%' AND last_name LIKE '%$lastname%' AND family_name_kana LIKE '%$kana_family%' AND last_name_kana LIKE '%$kana_name' AND mail LIKE '%$mail%' AND gender='$gender' AND authority='$auth' order by id desc");
    }elseif(isset($gender)) {
        $stmt=$pdo->query("select * from regist_user where family_name LIKE '%$familyname%' AND last_name LIKE '%$lastname%' AND family_name_kana LIKE '%$kana_family%' AND last_name_kana LIKE '%$kana_name' AND mail LIKE '%$mail%' AND gender='$gender' order by id desc");
    }elseif(isset($auth)) {
        $stmt=$pdo->query("select * from regist_user where family_name LIKE '%$familyname%' AND last_name LIKE '%$lastname%' AND family_name_kana LIKE '%$kana_family%' AND last_name_kana LIKE '%$kana_name' AND mail LIKE '%$mail%' AND authority='$auth' order by id desc");
    }else{
        $stmt=$pdo->query("select * from regist_user where family_name LIKE '%$familyname%' AND last_name LIKE '%$lastname%' AND family_name_kana LIKE '%$kana_family%' AND last_name_kana LIKE '%$kana_name' AND mail LIKE '%$mail%' order by id desc");
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント一覧画面</title>
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
            h2 {
                padding-left: 70px;
            }
            table {
                width: 90%;
                margin: auto;
            }
            table td {
                padding: 0auto;
                text-align: center;
            }
            .check {
                padding-right:10px;
                float: right;
                margin-right: 75px;
            }
            footer {
                background-color: black;
                height: 50px;
                width: 100%;
                position: fixed;
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
            <h2>アカウント一覧</h2>
            <form method="post"action="">
                <table class="firsttable"border="1"cellspacing="0">
                    <tr>
                        <th>名前（姓）</th>
                        <td><input type="text"size="20"name="familyname"></td>
                        <th>名前（名）</th>
                        <td><input type="text"size="20"name="lastname"></td>
                    </tr>
                    <tr>
                        <th>カナ（姓）</th>
                        <td><input type="text"size="20"name="kana_family"></td>
                        <th>カナ（名）</th>
                        <td><input type="text"size="20"name="kana_name"></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><input type="text"size="20"name="mail"></td>
                        <th>性別</th>
                        <td>
                            <input type="radio"name="gender"checked>未選択
                            <input type="radio"name="gender"value="0">男
                            <input type="radio"name="gender"value="1">女
                        </td>
                    </tr>
                    <tr>
                        <th>アカウント権限</th>
                        <td>
                            <select class="dropdown"name="auth">
                                <option selected>未選択</option>
                                <option value="0">一般</option>
                                <option value="1">管理者</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit"class="check"name="check"value="検索">
            </form>
            <br>
            <br>
            <?php
            if(!empty($_POST['check'])) {?>
            <table border="1"cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>名前（姓）</th>
                    <th>名前（名）</th>
                    <th>カナ（姓）</th>
                    <th>カナ（名）</th>
                    <th>メールアドレス</th>
                    <th>性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th colspan="2">操作</th>
                </tr>
                <tr>
                    <?php
                    foreach($stmt as $row) {?>
                    <td align='right'><?php echo $row['id']?></td>
                    <td align='right'><?php echo $row['family_name']?></td>
                    <td align='right'><?php echo $row['last_name']?></td>
                    <td align='right'><?php echo $row['family_name_kana']?></td>
                    <td align='right'><?php echo $row['last_name_kana']?></td>
                    <td><?php echo $row['mail']?></td>
                    <td align='center'><?php if($row['gender']=="0") {echo "男";} else {echo "女";}?></td>
                    <td align='center'><?php if($row['authority']=="0") {echo "一般";} else {echo "管理者";}?></td>
                    <td align='center'><?php if($row['delete_flag']=="0") {echo "有効";} else {echo "無効";}?></td>
                    <td align='center'>
                        <?php $ts=strtotime($row['registered_time']);
                        echo date('Y/m/d', $ts);?>
                    </td>
                    <td align='center'>
                        <?php if(!empty($row['update_time'])) {
                            $ts_2=strtotime($row['update_time']);
                            echo date('Y/m/d', $ts_2);}?>
                    </td>
                    <td align='center'>
                        <form method="post"action="delete.php">
                            <input type="submit"value="削除">
                            <input type="hidden"value="<?php echo $row['id'];?>" name="id">
                        </form>
                    </td>
                    <td align='center'>
                        <form method="post"action="update.php">
                            <input type="submit"value="更新">
                            <input type="hidden"value="<?php echo $row['id'];?>" name="id">
                        </form>
                    </td>
                </tr>
                <?php }; ?>
                <?php }; ?>
            </table>
        </main>
        <br>
        <footer>
        </footer>
    </body>
</html>