<?php
require('./dbconnect.php');
session_start();
if(!empty($_POST)) {
    if($_POST['familyname']=='') {
        $error['familyname']='blank';
    }
    if($_POST['lastname']=='') {
        $error['lastname']='blank';
    }
    if($_POST['kana_family']=='') {
        $error['kana_family']='blank';
    }
    if($_POST['kana_name']=='') {
        $error['kana_name']='blank';
    }
    if($_POST['mail']=='') {
        $error['mail']='blank';
    }
    if($_POST['password']=='') {
        $error['password']='blank';
    }
    if($_POST['gender']=='') {
        $error['gender']='blank';
    }
    if($_POST['postalcode']=='') {
        $error['postalcode']='blank';
    }
    if($_POST['pre']=='') {
        $error['pre']='blank';
    }
    if($_POST['shikutyouson']=='') {
        $error['shikutyouson']='blank';
    }
    if($_POST['banchi']=='') {
        $error['banchi']='blank';
    }
    if($_POST['authority']=='') {
        $error['authority']='blank';
    }
    if(empty($error)) {
        $_SESSION['join']=$_POST;
        header('Location:regist_confirm.php');
        exit();
    }
}   
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>regist画面</title>
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
        .error {
            color: red;
        }
        .button {
            text-align: center;
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
            <h2>アカウント登録画面</h2>
            <form method="post" action="">
                <div>
                    <label>名前（姓）　　</label>
                    <input type="text"class="text"size="20"name="familyname"maxlength="10"pattern="[\u4E00-\u9FFF\u3040-\u309F-]*">
                    <?php if($error['familyname']=='blank'): ?>
                    <p class="error">*名前（姓）を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>名前（名）　　</label>
                    <input type="text"class="text"size="20"name="lastname"maxlength="10">
                    <?php if($error['lastname']=='blank'): ?>
                    <p class="error">*名前（名）を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>カナ（姓）　　</label>
                    <input type="text"class="text"size="20"name="kana_family"maxlength="10">
                    <?php if($error['kana_family']=='blank'): ?>
                    <p class="error">*カナ（姓）を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>カナ（名）　　</label>
                    <input type="text"class="text"size="20"name="kana_name"maxlength="10">
                    <?php if($error['kana_name']=='blank'): ?>
                    <p class="error">*カナ（名）を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>メールアドレス　　</label>
                    <input type="text"class="text"size="20"name="mail"maxlength="100">
                    <?php if($error['mail']=='blank'): ?>
                    <p class="error">*メールアドレスを入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>パスワード　　</label>
                    <input type="password"name="password"maxlength="10">
                    <?php if($error['password']=='blank'): ?>
                    <p class="error">*パスワードを入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>性別</label>
                    <input type="radio"name="gender"checked>男
                    <input type="radio"name="gender">女
                    <?php if($error['gender']=='blank'): ?>
                    <p class="error">*性別を選択してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>郵便番号　　</label>
                    <input type="text"class="text"size="10"name="postalcode"maxlength="7">
                    <?php if($error['postalcode']=='blank'): ?>
                    <p class="error">*郵便番号を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>住所（都道府県）  </label>
                    <select class="dropdown"name="pre">
                        <option value=""selected></option>
                        <option>北海道</option>
                        <option>青森県</option>
                        <option>岩手県</option>
                        <option>宮城県</option>
                        <option>秋田県</option>
                        <option>山形県</option>
                        <option>福島県</option>
                        <option>茨城県</option>
                        <option>栃木県</option>
                        <option>群馬県</option>
                        <option>埼玉県</option>
                        <option>千葉県</option>
                        <option>東京都</option>
                        <option>神奈川県</option>
                        <option>新潟県</option>
                        <option>富山県</option>
                        <option>石川県</option>
                        <option>福井県</option>
                        <option>山梨県</option>
                        <option>長野県</option>
                        <option>岐阜県</option>
                        <option>静岡県</option>
                        <option>愛知県</option>
                        <option>三重県</option>
                        <option>滋賀県</option>
                        <option>京都府</option>
                        <option>大阪府</option>
                        <option>兵庫県</option>
                        <option>奈良県</option>
                        <option>和歌山県</option>
                        <option>鳥取県</option>
                        <option>島根県</option>
                        <option>岡山県</option>
                        <option>広島県</option>
                        <option>山口県</option>
                        <option>徳島県</option>
                        <option>香川県</option>
                        <option>愛媛県</option>
                        <option>高知県</option>
                        <option>福岡県</option>
                        <option>佐賀県</option>
                        <option>長崎県</option>
                        <option>熊本県</option>
                        <option>大分県</option>
                        <option>宮崎県</option>
                        <option>鹿児島県</option>
                        <option>沖縄県</option>
                    </select>
                    <?php if($error['pre']=='blank'): ?>
                    <p class="error">*都道府県を選択してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>住所（市区町村）　　</label>
                    <input type="text"class="text"size="20"name="shikutyouson"maxlength="10"pattern="[-\u4E00-\u9fff\u3040-\u309F~\uFF66-\uFF9F\u30A1-\u30F60-90-9_\s]*">
                    <?php if($error['shikutyouson']=='blank'): ?>
                    <p class="error">*住所（市区町村）を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>住所（番地）  </label>
                    <input type="text"class="text"size="20"name="banchi"maxlength="100"patttern="[-\u4E00-\u9fff\u3040-\u309F~\uFF66-\uFF9F\u30A1-\u30F60-90-9_\s]*">
                    <?php if($error['banchi']=='blank'): ?>
                    <p class="error">*住所（番地）を入力してください*</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>アカウント権限　　</label>
                    <select class="dropdown"name="authority">
                        <option value="0"selected>一般</option>
                        <option value="1">管理者</option>
                        <?php if($error['authority']=='blank'): ?>
                        <p class="error">*アカウント権限を選択してください*</p>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="button">
                <input type="submit"class="submit"value="確認する">
                </div>
            </form>
        </main>
        
        <footer>
        </footer>
    </body>
</html>