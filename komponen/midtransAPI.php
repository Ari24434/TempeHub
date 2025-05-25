<?php
session_start();
require_once '../koneksi.php';
require_once '../vendor/autoload.php';

$id_user = $_SESSION['user']['id_user'];
$keranjang = getKeranjangByUser($koneksi, $id_user);

if (!$keranjang['status']) {
    echo json_encode(['error' => 'Keranjang kosong']);
    exit;
}

if (!isset($_POST['username'], $_POST['email'], $_POST['no-telp'], $_POST['alamat'], $_POST['total_ongkir'], $_POST['total_subtotal'], $_POST['total_bayar'])) {
    echo json_encode(['error' => 'Data tidak lengkap']);
    exit;
}

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['no-telp'];
$alamat = $_POST['alamat'];
$catatan = $_POST['catatan'];
$ongkir = (int)$_POST['total_ongkir'];
$subtotal = (int)$_POST['total_subtotal'];
$total = (int)$_POST['total_bayar'];

// Konfigurasi Midtrans
\Midtrans\Config::$serverKey = 'SB-Mid-server-J8HsOi4G92jfmUrpznhC8e6I';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Item produk
$items = [];
foreach ($keranjang['data'] as $produk) {
    $items[] = [
        'id' => $produk['id_produk'],
        'price' => (int)$produk['harga'],
        'quantity' => (int)$produk['qty'],
        'name' => $produk['nama_produk'],
    ];
}

// Tambah ongkir sebagai item
$items[] = [
    'id' => 'ONGKIR',
    'price' => $ongkir,
    'quantity' => 1,
    'name' => 'Ongkos Kirim'
];

// Detail transaksi
$order_id = 'ORDER-' . time();
$transaction_details = [
    'order_id' => $order_id,
    'gross_amount' => $total
];

// Detail pelanggan
$customer_details = [
    'first_name' => $username,
    'email' => $email,
    'phone' => $phone,
    'shipping_address' => [
        'address' => $alamat
    ]
];

// Param untuk Snap
$transaction = [
    'transaction_details' => $transaction_details,
    'item_details' => $items,
    'customer_details' => $customer_details
];

// Simpan data untuk digunakan nanti
$_SESSION['checkout'] = [
    'order_id' => $order_id,
    'alamat' => $alamat,
    'catatan' => $catatan,
    'total' => $total,
    'subtotal' => $subtotal,
    'ongkir' => $ongkir,
    'keranjang' => $keranjang['data']
];

// Ambil token
try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(['token' => $snapToken, 'order_id' => $order_id]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
