<?php
    require "admin/connection.php";

    function query_view ($query_view) {
        global $conn;
        $result = mysqli_query ($conn, $query_view);
        $rows = [];

        while ( $row = mysqli_fetch_assoc($result)) {
            $rows [] = $row;
        }
        return $rows;
    }

    function add ($peminjam) {
        global $conn;
        
        $nama           = htmlspecialchars($peminjam['nama']);
        $email           = htmlspecialchars($peminjam['email']);
        $hp           = htmlspecialchars($peminjam['no_hp']);
        $tgldftr           = date('Y-m-d', strtotime($peminjam['tgl_daftar']));
        $query = "INSERT INTO penonton VALUES ('', '$nama','$email', '$hp', '$tgldftr')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }


    function delete ($id_penonton){
        global $conn;
        mysqli_query( $conn, "DELETE FROM penonton WHERE id_penonton = $id_penonton");

        return mysqli_affected_rows($conn);
        
    }
    function update ($peminjam) {
        global $conn;

        $id_penonton      = $peminjam["id_penonton"];
        $nama           = htmlspecialchars($peminjam['nama']);
        $email           = htmlspecialchars($peminjam['email']);
        $hp           = htmlspecialchars($peminjam['no_hp']);
        $tgldftr           = date('Y-m-d', strtotime($peminjam['tgl_daftar']));


        $query = " UPDATE tb_peminjam SET 
        nama   =   '$nama',
        email   =   '$email',
        no_hp         =   '$hp',
        tgl_daftar       =   '$tgldftr' WHERE
        id_penonton      =    $id_penonton ";
        
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }
?>