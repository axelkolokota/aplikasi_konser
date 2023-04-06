<?php
    require "func_peminjam.php";

    $id =   $_GET["id_penonton"];

    if (delete($id) > 0) {
        echo "
        <script>
            alert ('data dihapus');
            document.location.href ='data_peminjam.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert ('data tidak dihapus');
            document.location.href ='data_peminjam.php';
        </script>
        ";
    }
?>