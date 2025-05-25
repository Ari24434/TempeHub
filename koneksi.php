<?php
    $koneksi= mysqli_connect("localhost","root","","toko_tempe");

    if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        return isset($_SESSION['user']);
    }
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

function loginUser($email, $password) {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM akun_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Kembalikan seluruh data user
            return [
                'status' => true,
                'user' => [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'tipe_akun' => $user['tipe_akun']
                ]
            ];
        } else {
            return ['status' => false, 'error' => 'Password salah'];
        }
    } else {
        return ['status' => false, 'error' => 'Email tidak ditemukan'];
    }
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

function tambahKeKeranjang($id_user, $id_produk, $qty = 1) {
    global $koneksi;

    // Cek apakah produk sudah ada di keranjang user
    $stmt = $koneksi->prepare("SELECT * FROM keranjang WHERE id_user = ? AND id_produk = ?");
    $stmt->bind_param("ii", $id_user, $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Produk sudah ada, update qty
        $row = $result->fetch_assoc();
        $new_qty = $row['qty'] + $qty;

        $update = $koneksi->prepare("UPDATE keranjang SET qty = ? WHERE id_keranjang = ?");
        $update->bind_param("ii", $new_qty, $row['id_keranjang']);
        $update->execute();
    } else {
        // Produk belum ada, insert baru
        $insert = $koneksi->prepare("INSERT INTO keranjang (id_user, id_produk, qty) VALUES (?, ?, ?)");
        $insert->bind_param("iii", $id_user, $id_produk, $qty);
        $insert->execute();
    }
    return true;
}

function getKeranjangByUser($koneksi, $id_user) {
    $query = "SELECT 
                k.id_keranjang,
                k.id_produk,
                k.qty,
                p.nama_produk,
                p.harga,
                p.foto_produk
              FROM keranjang k
              JOIN produk p ON k.id_produk = p.id_produk
              WHERE k.id_user = ?";
    
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    if (count($data) > 0) {
        return ['status' => true, 'data' => $data];
    } else {
        return ['status' => false, 'data' => []];
    }
}

function kosongkanKeranjang($koneksi, $id_user) {
    $query = "DELETE FROM keranjang WHERE id_user = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_user);
    return $stmt->execute();
}


