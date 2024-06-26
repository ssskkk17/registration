<?php
session_start();
if(!empty($_SESSION['mail']) && !empty($_SESSION['password'])) {
    echo $_SESSION['familyname'].$_SESSION['lastname'];
    echo "さん、ログインしました！";
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>D.I.Blog</title>
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
                text-align: center;
                line-height: 150%;
            }
            .main_container {
                clear: both;
                width: 100%;
            }
            h1 {
                color: red;
                font-size: 50px;
            }
            a {
                color: white;
            }
            .left {
                border: 3px solid red;
                float: left;
                height: 615px;
                width: 75%;
            }
            .right {
                border: 3px solid blue;
                float: right;
                height: 615px;
                width: 366px;
            }
            footer {
                background-color: black;
                color: white;
                height: 50px;
                width: 100%;
                position: fixed;
                bottom: 0px;
                text-align: center;
            }
        </style>
    </head>
    
    <body>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>D.I.Blogについて</li>
                <li>登録フォーム</li>
                <li>その他</li>
                <?php
                if(!empty($_SESSION) && $_SESSION['authority']=='1') {
                    echo "<li>";
                    echo "<a href='regist.php'>アカウント登録</a>";
                    echo "</li>";
                    echo "<li>";
                    echo "<a href='list.php'>アカウント一覧</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </header>
        <main>
            <div class="main_container">
                <div class="left">
                    <h1>*著作権侵害等のため、画像は省いています*</h1>
                    <h2>プログラミングに役立つ情報</h2>
                    <p>2017年1月15日</p>
                    <p>D.I.BlogはD.I.Worksが提供する演習課題です。</p>
                    <p>記事中身</p>
                    <div class="grey_box">
                        <div class="box_pic">
                            <p>ドメイン取得方法</p>
                        </div>
                        <div class="box_pic">
                            <p>快適な職場環境</p>
                        </div>
                        <div class="box_pic">
                            <p>Linuxの基礎</p>
                        </div>
                        <div class="box_pic">
                            <p>マーケティング入門</p>
                        </div>
                        <div class="box_pic">
                            <p>アクティブラーニング</p>
                        </div>
                        <div class="box_pic">
                            <p>CSSの効率的な勉強方法</p>
                        </div>
                        <div class="box_pic">
                            <p>リーダブルコードとは</p>
                        </div>
                        <div class="box_pic">
                            <p>HTML5の可能性</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <side>
            <div class="right">
                <h2>人気の記事</h2>
                <ul>
                    <li>PHPおすすめ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>いま人気のエディタtops</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h2>おすすめリンク</h2>
                <ul>
                    <li>ディーアイワークス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h2>カテゴリ</h2>
                <ul>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </side>
        <footer>
            <p>Copyright D.I.works|D.I.Blog is the one which provides A to Z about programming</p>
        </footer>
    </body>
</html>