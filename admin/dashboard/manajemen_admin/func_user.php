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

    function add ($wisata) {
        global $conn;
        
        $nama           = htmlspecialchars($wisata['username']);
        $pass      = htmlspecialchars($wisata['password']);
        
        $query = "INSERT INTO admin VALUES ('', '$nama','$pass')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

?>