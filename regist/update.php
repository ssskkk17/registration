<?php
if($_POST) {
    $error=[];
    if(empty($_POST['familyname'])) {
        $error['familyname']='blank';
    }
    if(empty($_POST['lastname'])) {
        $error['lastname']='blank';
    }
    if(empty($_POST['kana_family'])) {
        $error['kana_family']='blank';
    }
    if(empty($_POST['kana_name'])) {
        $error['kana_name']='blank';
    }
    if(empty($_POST['mail'])) {
        $error['mail']='blank';
    }
    if(empty($_POST['postalcode'])) {
        $error['postalcode']='blank';
    }
    if(empty($_POST['shikutyouson'])) {
        $error['shikutyouson']='blank';
    }
    if(empty($_POST['banchi'])) {
        $error['banchi']='blank';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>update画面</title>
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
        .error {
            color: red;
        }
        .button {
            height: 30px;
            width: 100px;
            border-style: solid;
            margin-left: 100px;
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
            <div class="main_container">
            <h2>アカウント登録画面</h2>
                <?php 
                $id=$_POST['id'];
                mb_internal_encoding("utf8");
                $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root","");
                $stmt=$pdo->query("select * from regist_user where id=$id");
                while($row=$stmt->fetch()){;?>
                <form method="post"action="<?php if(empty($error) && !empty($_POST['confirm'])) {echo 'update_confirm.php';}?>">
                    <div>
                        <label>名前（姓）　　</label>
                        <input type="text"class="text"size="20"name="familyname"maxlength="10"pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*"value="<?php if(!empty($_POST['familyname'])){echo $_POST['familyname'];} elseif(!empty($row['familyname'])){echo $row['familyname'];}?>">
                        <?php if(!empty($error['familyname']) && empty($_POST['familyname'])): ?>
                        <div class="error"><?php echo "*名前（姓）を入力してください*"; ?></div>
                        <?php endif; ?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <input type="text"class="text"size="20"name="lastname"maxlength="10"pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*"value="<?php if(!empty($_POST['lastname'])){echo $_POST['lastname'];} else {echo $row['last_name'];}?>">
                    <?php if(!empty($error['lastname']) && empty($_POST['lastname'])): ?>
                    <div class="error"><?php echo "*名前（名）を入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <input type="text"class="text"size="20"name="kana_family"maxlength="10"pattern="^[ァ-ンヴー]+$"value="<?php if(!empty($_POST['kana_family'])){echo $_POST['kana_family'];} else {echo $row['family_name_kana'];}?>">
                    <?php if(!empty($error['kana_family']) && empty($_POST['kana_family'])): ?>
                    <div class="error"><?php echo "*カナ（姓）を入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <input type="text"class="text"size="20"name="kana_name"maxlength="10"pattern="^[ァ-ンヴー]+$"value="<?php if(!empty($_POST['kana_name'])){echo $_POST['kana_name'];} else {echo $row['last_name_kana'];}?>">
                    <?php if(!empty($error['kana_name']) && empty($_POST['kana_name'])): ?>
                    <div class="error"><?php echo "*カナ（名）を入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <input type="email"class="text"size="20"name="mail"maxlength="100"pattern="^[-@a-zA-Z0-9]+$"value="<?php if(!empty($_POST['mail'])) {echo $_POST['mail'];} else {echo $row['mail'];}?>">
                    <?php if(!empty($error['mail']) && empty($_POST['mail'])): ?>
                    <div class="error"><?php echo "*メールアドレスを入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>パスワード　　</label>
                    <input type="password"name="password"maxlength="10"pattern="^[a-zA-Z0-9]+$"value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>">
                </div>
                <div>
                    <label>性別    </label>
                    <input type="radio"name="gender"value="男"<?php if(!empty($_POST['gender']) && $_POST['gender']=="男"){echo 'checked';} elseif($row['gender']=="0"){echo 'checked';}?>>男
                    <input type="radio"name="gender"value="女"<?php if(!empty($_POST['gender']) && $_POST['gender']=="女"){echo 'checked';} elseif($row['gender']=="1"){echo 'checked';}?>>女
                </div>
                <div>
                    <label>郵便番号　　</label>
                    <input type="text"class="text"size="10"name="postalcode"maxlength="7"pattern="\d*"value="<?php if(!empty($_POST['postalcode'])){echo $_POST['postalcode'];} else {echo $row['postal_code'];}?>">
                    <?php if(!empty($error['postalcode']) && empty($_POST['postalcode'])): ?>
                    <div class="error"><?php echo "*郵便番号を入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>住所（都道府県）  </label>
                    <select class="dropdown"name="pre">
                        <option value="北海道"<?php if(!empty($_POST['pre']) && $_POST['pre']=="北海道") {echo "selected";} elseif($row['prefecture']=="北海道") { echo "selected";}?>>北海道</option>
                        <option value="青森県"<?php if($row['prefecture']=="青森県") { echo "selected";}?>>青森県</option>
                        <option value="岩手県"<?php if($row['prefecture']=="岩手県") { echo "selected";}?>>岩手県</option>
                        <option value="宮城県"<?php if($row['prefecture']=="宮城県") { echo "selected";}?>>宮城県</option>
                        <option value="秋田県"<?php if($row['prefecture']=="秋田県") { echo "selected";}?>>秋田県</option>
                        <option value="山形県"<?php if($row['prefecture']=="山形県") { echo "selected";}?>>山形県 </option>
                        <option value="福島県"<?php if($row['prefecture']=="福島県") { echo "selected";}?>>福島県</option>
                        <option value="茨城県"<?php if($row['prefecture']=="茨城県") { echo "selected";}?>>茨城県</option>
                        <option value="栃木県"<?php if($row['prefecture']=="栃木県") { echo "selected";}?>>栃木県</option>
                        <option value="群馬県"<?php if($row['prefecture']=="群馬県") { echo "selected";}?>>群馬県</option>
                        <option value="埼玉県"<?php if($row['prefecture']=="埼玉県") { echo "selected";}?>>埼玉県</option>
                        <option value="千葉県"<?php if($row['prefecture']=="千葉県") { echo "selected";}?>>千葉県</option>
                        <option value="東京都"<?php if($row['prefecture']=="東京都") { echo "selected";}?>>東京都</option>
                        <option value="神奈川"<?php if($row['prefecture']=="神奈川") { echo "selected";}?>>神奈川</option>
                        <option value="新潟県"<?php if($row['prefecture']=="新潟県") { echo "selected";}?>>新潟県</option>
                        <option value="富山県"<?php if($row['prefecture']=="富山県") { echo "selected";}?>>富山県</option>
                        <option value="石川県"<?php if($row['prefecture']=="石川県") { echo "selected";}?>>石川県</option>
                        <option value="福井県"<?php if($row['prefecture']=="福井県") { echo "selected";}?>>福井県</option>
                        <option value="山梨県"<?php if($row['prefecture']=="山梨県") { echo "selected";}?>>山梨県</option>
                        <option value="長野県"<?php if($row['prefecture']=="長野県") { echo "selected";}?>>長野県</option>
                        <option value="岐阜県"<?php if($row['prefecture']=="岐阜県") { echo "selected";}?>>岐阜県</option>
                        <option value="静岡県"<?php if($row['prefecture']=="静岡県") { echo "selected";}?>>静岡県</option>
                        <option value="愛知県"<?php if($row['prefecture']=="愛知県") { echo "selected";}?>>愛知県</option>
                        <option value="三重県"<?php if($row['prefecture']=="三重県") { echo "selected";}?>>三重県</option>
                        <option value="滋賀県"<?php if($row['prefecture']=="滋賀県") { echo "selected";}?>>滋賀県</option>
                        <option value="京都府"<?php if($row['prefecture']=="京都府") { echo "selected";}?>>京都府</option>
                        <option value="大阪府"<?php if($row['prefecture']=="大阪府") { echo "selected";}?>>大阪府</option>
                        <option value="兵庫県"<?php if($row['prefecture']=="兵庫県") { echo "selected";}?>>兵庫県</option>
                        <option value="奈良県"<?php if($row['prefecture']=="奈良県") { echo "selected";}?>>奈良県</option>
                        <option value="和歌山県"<?php if($row['prefecture']=="和歌山県") { echo "selected";}?>>和歌山県</option>
                        <option value="鳥取県"<?php if($row['prefecture']=="鳥取県") { echo "selected";}?>>鳥取県</option>
                        <option value="島根県"<?php if($row['prefecture']=="島根県") { echo "selected";}?>>島根県</option>
                        <option value="岡山県"<?php if($row['prefecture']=="岡山県") { echo "selected";}?>>岡山県</option>
                        <option value="広島県"<?php if($row['prefecture']=="広島県") { echo "selected";}?>>広島県</option>
                        <option value="山口県"<?php if($row['prefecture']=="山口県") { echo "selected";}?>>山口県</option>
                        <option value="徳島県"<?php if($row['prefecture']=="徳島県") { echo "selected";}?>>徳島県</option>
                        <option value="香川県"<?php if($row['prefecture']=="香川県") { echo "selected";}?>>香川県</option>
                        <option value="愛媛県"<?php if($row['prefecture']=="愛媛県") { echo "selected";}?>>愛媛県</option>
                        <option value="高知県"<?php if($row['prefecture']=="高知県") { echo "selected";}?>>高知県</option>
                        <option value="福岡県"<?php if($row['prefecture']=="福岡県") { echo "selected";}?>>福岡県</option>
                        <option value="佐賀県"<?php if($row['prefecture']=="佐賀県") { echo "selected";}?>>佐賀県</option>
                        <option value="長崎県"<?php if($row['prefecture']=="長崎県") { echo "selected";}?>>長崎県</option>
                        <option value="熊本県"<?php if($row['prefecture']=="熊本県") { echo "selected";}?>>熊本県</option>
                        <option value="大分県"<?php if($row['prefecture']=="大分県") { echo "selected";}?>>大分県</option>
                        <option value="宮崎県"<?php if($row['prefecture']=="宮崎県") { echo "selected";}?>>宮崎県</option>
                        <option value="鹿児島県"<?php if($row['prefecture']=="鹿児島") { echo "selected";}?>>鹿児島県</option>
                        <option value="沖縄県"<?php if($row['prefecture']=="沖縄県") { echo "selected";}?>>沖縄県</option>
                    </select>
                        <?php if(!empty($error['pre']) && empty($_POST['pre'])): ?>
                        <div class="error"><?php echo "*都道府県を選択してください*"; ?></div>
                        <?php endif; ?>
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    <input type="text"class="text"size="20"name="shikutyouson"maxlength="10"pattern="^[^A-Za-z]+$"value="<?php if(!empty($_POST['shikutyouson'])) {echo $_POST['shikutyouson'];} else {echo $row['address_1'];}?>">
                    <?php if(!empty($error['shikutyouson']) && empty($_POST['shikutyouson'])): ?>
                    <div class="error"><?php echo "*住所（市区町村）を入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>住所（番地）  </label>
                    <input type="text"class="text"size="20"name="banchi"maxlength="100"patttern="^[^A-Za-z]+$"value="<?php if(!empty($_POST['banchi'])) {echo $_POST['banchi'];} else {echo $row['address_2'];}?>">
                    <?php if(!empty($error['banchi']) && empty($_POST['banchi'])): ?>
                    <div class="error"><?php echo "*住所（番地）を入力してください*"; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label>アカウント権限　　</label>
                    <select class="dropdown"name="authority">
                        <option value="一般"<?php if(!empty($_POST['authority']) && $_POST['authority']=="一般"){echo "selected";} elseif($row['authority']=="0"){echo "selected";}?>>一般</option>
                        <option value="管理者"<?php if(!empty($_POST['authority']) && $_POST['authority']=="管理者"){echo "selected";} elseif($row['authority']=="1"){echo "selected";}?>>管理者</option>
                    </select>
                </div>
                <br>
                <input type="submit"class="button"name="confirm"value="確認する">
                <input type="hidden"value="<?php echo $_POST['id'];?>" name="id">
            </form>
            </div>
            <?php };?>
        </main>
        <br>
        <footer>
        </footer>
    </body>
</html>