<?php
session_start();
require '../koneksi.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['id_user'])) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
    exit;
}

$id_user = intval($data['id_user']);
$nama = $data['nama_lengkap'];
$email = $data['email'];
$no_telp = $data['no_telp'];
$alamat = $data['alamat'];
$catatan = $data['catatan'];
$metode_pengiriman = $data['metode_pengiriman'];
$ongkir = intval($data['ongkir']);
$subtotal = intval($data['subtotal']);
$total = intval($data['total']);
$order_id = $data['order_id'];
$status_pesanan = $data['transaction_status'];

// Simpan ke tabel pesanan
$stmt = $koneksi->prepare("INSERT INTO pesanan (id_user, nama_lengkap, email, no_telp, alamat, metode_pengiriman, ongkir, subtotal, total, catatan, status_pesanan, midtrans_order_id) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("isssssiiisss", $id_user, $nama, $email, $no_telp, $alamat, $metode_pengiriman, $ongkir, $subtotal, $total, $catatan, $status_pesanan, $order_id);

if (!$stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan pesanan']);
    exit;
}

$id_pesanan = $stmt->insert_id;

// Simpan ke tabel pesanan_detail
$query_stmt = $koneksi->prepare("SELECT k.*, p.nama_produk, p.harga 
                                 FROM keranjang k 
                                 JOIN produk p ON k.id_produk = p.id_produk 
                                 WHERE k.id_user = ?");
$query_stmt->bind_param("i", $id_user);
$query_stmt->execute();
$result = $query_stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $stmt_detail = $koneksi->prepare("INSERT INTO pesanan_detail (id_pesanan, id_produk, nama_produk, harga, qty) 
                                      VALUES (?, ?, ?, ?, ?)");
    $stmt_detail->bind_param("iisii", $id_pesanan, $row['id_produk'], $row['nama_produk'], $row['harga'], $row['qty']);
    $stmt_detail->execute();
}

// Hapus keranjang
$delete_stmt = $koneksi->prepare("DELETE FROM keranjang WHERE id_user = ?");
$delete_stmt->bind_param("i", $id_user);
$delete_stmt->execute();

echo json_encode(['status' => 'success']);
?>