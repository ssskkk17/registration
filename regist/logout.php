<?php
session_start();
session_destroy();
header("Location:login.php");
exit();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    </body>
</html>