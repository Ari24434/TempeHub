<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);

$_SESSION['checkout'] = [
    'nama' => $data['nama'],
    'email' => $data['email'],
    'telp' => $data['telp'],
    'alamat' => $data['alamat'],
    'pengiriman' => $data['pengiriman'],
    'ongkir' => (int) $data['ongkir'],
    'subtotal' => (int) $data['subtotal'],
    'total' => (int) $data['total']
];
