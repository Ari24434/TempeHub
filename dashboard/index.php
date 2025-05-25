<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TempeHub</title>
    <link rel="stylesheet" href="style.css?v=<?= time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class ="d-flex">
    <?php 
    include "../koneksi.php";
    include "komponen/sidebar.php";
    ?>
    <main class="w-100">
    <?php
        switch($_GET ['menu'] ?? 0){
            case 1 :
                include __DIR__ . "/komponen/produk.php";
                break;
            case 2 :
                include __DIR__ . "/komponen/order.php";
                break;
            case 3 :
                include __DIR__ . "/komponen/customers.php";
                break;
            default;
            include __DIR__ . "/komponen/beranda-dashboard.php";
            break;
        }
    ?>
    </main>
</body>
</html>