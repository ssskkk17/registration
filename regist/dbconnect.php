<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
    <head>
        <style>
            .error {
                color: red;
                font-size: 30px;</style>
    }
    </head>
    <body>
        <div class="error">
            <?php
            try {
                $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
            } catch (PDOException $e) {
                echo 'エラーが発生したため、データベース登録できませんでした。'.$e->getMessage();
            }
            ?>
        </div>
    </body>