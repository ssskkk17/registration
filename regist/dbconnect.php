<?php
try {
    $pdo=new PDO("mysql:dbname=regist;host=localhost;", "root", "");
    
} catch (PDOException $e) {
    echo 'DB接続エラー:'.$e->getMessage();
    }
?>