<?php
    require 'admin/connection.php';
    require 'func_penonton.php';
    $datapenonton = query_view ("SELECT * FROM penonton ORDER BY id_penonton DESC LIMIT 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h2>ID Tiket anda adalah : <span style="color: red;"> 
        <?php
        foreach ($datapenonton as $key) {
            echo $key['id_penonton'];
        }
        ?>
        </span>
    </h2><br>
    <a href="index.php">Kembali</a></center>
</body>
</html>