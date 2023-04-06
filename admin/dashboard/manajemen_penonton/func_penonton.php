<?php
    require "../connection.php";

    function query_view ($query_view) {
        global $conn;
        $result = mysqli_query ($conn, $query_view);
        $rows = [];

        while ( $row = mysqli_fetch_assoc($result)) {
            $rows [] = $row;
        }
        return $rows;
    }

    function add ($penonton) {
        global $conn;
        
        $nama           = htmlspecialchars($penonton['nama']);
        $email           = htmlspecialchars($penonton['email']);
        $hp           = htmlspecialchars($penonton['no_hp']);
        $tgldftr           = date('Y-m-d', strtotime($penonton['tgl_daftar']));
        $query = "INSERT INTO penonton VALUES ('', '$nama','$email', '$hp', '$tgldftr')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }


    function delete ($id_penonton){
        global $conn;
        mysqli_query( $conn, "DELETE FROM penonton WHERE id_penonton = $id_penonton");

        return mysqli_affected_rows($conn);
        
    }
    function update ($penonton) {
        global $conn;

        $id_penonton      = $penonton["id_penonton"];
        $nama           = htmlspecialchars($penonton['nama']);
        $email           = htmlspecialchars($penonton['email']);
        $hp           = htmlspecialchars($penonton['no_hp']);
        $tgldftr           = date('Y-m-d', strtotime($penonton['tgl_daftar']));


        $query = " UPDATE penonton SET 
        nama   =   '$nama',
        email   =   '$email',
        no_hp         =   '$hp',
        tgl_daftar       =   '$tgldftr' WHERE
        id_penonton      =    $id_penonton ";
        
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }
?>