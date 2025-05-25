<?php
session_start();
include '../koneksi.php';
require_once '../vendor/autoload.php';

\Midtrans\Config::$serverKey = 'SB-Mid-server-J8HsOi4G92jfmUrpznhC8e6I';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

header('Content-Type: application/json');

if (!isset($_POST['username'], $_POST['email'], $_POST['no-telp'], $_POST['ongkir'])) {
    echo json_encode(['error' => 'Data pelanggan tidak lengkap']);
    exit;
}


if (!isset($_SESSION['user'])) {
    echo json_encode(['error' => 'User tidak terautentikasi']);
    exit;
}

$id_user = $_SESSION['user']['id_user'];
$result = getKeranjangByUser($koneksi, $id_user);
$produk_keranjang = $result['status'] ? $result['data'] : [];

if (empty($produk_keranjang)) {
    echo json_encode(['error' => 'Keranjang belanja kosong']);
    exit;
}

$items = [];
$total = 0;
foreach ($produk_keranjang as $produk) {
    $items[] = [
        'id' => $produk['id_produk'],
        'price' => (int)$produk['harga'],
        'quantity' => (int)$produk['qty'],
        'name' => $produk['nama_produk']
    ];
    $total += $produk['harga'] * $produk['qty'];
}

$ongkir = isset($_POST['ongkir']) ? (int) $_POST['ongkir'] : 0;
$items[] = [
    'id' => 'ongkir',
    'price' => $ongkir,
    'quantity' => 1,
    'name' => 'Ongkos Kirim'
];

$gross = $total + $ongkir;
$order_id = uniqid('ORDER-');

$nama = trim($_POST['username']);
$email = trim($_POST['email']);
$phone = trim($_POST['no-telp']);

if (empty($nama) || empty($email) || empty($phone)) {
    echo json_encode(['error' => 'Data pelanggan tidak lengkap']);
    exit;
}

$transaction = [
    'transaction_details' => [
        'order_id' => $order_id,
        'gross_amount' => $gross
    ],
    'item_details' => $items,
    'customer_details' => [
        'first_name' => $nama,
        'email' => $email,
        'phone' => $phone
    ]
];

try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(['token' => $snapToken]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
