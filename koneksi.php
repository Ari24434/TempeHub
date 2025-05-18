<?php
    $koneksi= mysqli_connect("localhost","root","","toko_tempe");


    function daftar($daftar){
        global $koneksi;

        $username = $daftar["username"];
        $password = $daftar["password"];
        $email = $daftar["email"];

        $query = ("INSERT INTO akun_user (username, password, email, tipe_akun) 
        VALUES ('$username', '$password', '$email', 'biasa')") ;
        
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
?>