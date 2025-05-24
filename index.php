<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TempeHUB - Sistem Informasi Penjualan dan Distribusi Tempe</title>
    <link rel="stylesheet" href="style.css?v=<?= time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

 <?php
        session_start();
        include "koneksi.php";
        if (isLoggedIn()) {
            include 'komponen/header-login.php';
        } else {
            include 'komponen/header.php';
        }
        ?>
        <?php if (isset($_SESSION['login_success']) && $_SESSION['login_success']): ?>
        <script>
            alert('Anda berhasil login!');
        </script>
        <?php 
            unset($_SESSION['login_success']); // hapus agar tidak muncul lagi setelah refresh
        endif; 
        ?>

<?php
        switch($_GET ['menu'] ?? 0){
            case 1 :
                include __DIR__ . "/komponen/reseller.php";
                break;
            case 2 :
                include __DIR__ ."/komponen/profil.php";
                break;
            case 4 :
                include __DIR__ ."/komponen/daftar-reseller.php";
                break;
              case 3 :
                include __DIR__ ."/komponen/keranjang.php";
                break;
            default :
                include "komponen/beranda_tempe.php";
                 break;
        }
            include "komponen/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

    
