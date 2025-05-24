<?php
    $koneksi= mysqli_connect("localhost","root","","toko_tempe");

    function isLoggedIn() {
    return isset($_SESSION['user']);
    }


    function daftar($daftar){
        global $koneksi;

        $username = $daftar["username"];
        $password = password_hash($daftar["password"], PASSWORD_DEFAULT);
        $email = $daftar["email"];
        
        $query = ("INSERT INTO akun_user (username, password, email, tipe_akun) 
        VALUES ('$username', '$password', '$email', 'biasa')") ;
        
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function tampilproduk($query){
        global $koneksi;

        $row = [];
        $result = mysqli_query($koneksi, $query);
        while ($rows = mysqli_fetch_assoc($result)){
            $row[] = $rows;
        }
        return $row;
    }

    function login($email, $password) {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM akun_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user['email']; 
            return true;
        }
    }
    return false;
}
    function tambahKeKeranjang($user_id, $product_id, $quantity) {
    global $koneksi;

    $query = $koneksi->prepare("SELECT qty FROM keranjang WHERE id_user = ? AND id_produk = ?");
    $query->bind_param("ii", $user_id, $product_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {

        $array = $result->fetch_assoc();
        $new_qty = $array['qty'] + $quantity;

        $update = $koneksi->prepare("UPDATE keranjnag SET qty = ? WHERE id_user = ? AND id_produk = ?");
        $update->bind_param("iii", $new_qty, $user_id, $product_id);
        $update->execute();

        return $update->affected_rows > 0;
    } else {

        $insert = $koneksi->prepare("INSERT INTO keranjang (id_user, id_produk, qty) VALUES (?, ?, ?)");
        $insert->bind_param("iii", $user_id, $product_id, $quantity);
        $insert->execute();

        return $insert->affected_rows > 0;
    }
}
    
?>