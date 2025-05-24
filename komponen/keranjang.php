<?php

// Cek apakah user login (gunakan session login kalian)
$id_user = $_SESSION['id_user'] ?? null;

if (!isset($_SESSION['id_user'])) {
    // Redirect ke login atau beri pesan error
    exit;
}
if (isset($_POST['keranjang'])) {
    $id_produk = (int)$_POST['id_produk'];
    $qty = (int)$_POST['qty'];

    // Cek apakah produk sudah ada di keranjang user
    $cek = $koneksi->prepare("SELECT * FROM keranjang WHERE id_user = ? AND id_produk = ?");
    $cek->bind_param("ii", $id_user, $id_produk);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        // Jika sudah ada, update qty
        $row = $result->fetch_assoc();
        $update = $koneksi->prepare("UPDATE keranjang SET qty = qty + ? WHERE id_keranjang = ?");
        $update->bind_param("ii", $qty, $row['id_keranjang']);
        $update->execute();
    } else {
        // Jika belum ada, insert baru
        $insert = $koneksi->prepare("INSERT INTO keranjang (id_user, id_produk, qty) VALUES (?, ?, ?)");
        $insert->bind_param("iii", $id_user, $id_produk, $qty);
        $insert->execute();
    }
}
?>

   <div class="container py-5">
    <div class="d-flex gap-5 Order-detail">
        <div>
             <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-2 mb-md-0 gambar-order">
                                <img src="/FolderGambar/TempeBiasa2.png" class="rounded w-100 h-100 object-fit-contain" alt="Product Image">
                            </div>
                            <div class="col-md-4 mb-2 mb-md-0">
                                <h5 class="card-title">Tempe Biasa</h5>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="text" class="form-control form-control-sm text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <h5 class="mb-0">8.000</h5>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
             <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-2 mb-md-0 gambar-order">
                                <img src="/FolderGambar/TempeDaun2.png" class="rounded w-100 h-100 object-fit-contain" alt="Product Image">
                            </div>
                            <div class="col-md-4 mb-2 mb-md-0">
                                <h5 class="card-title">Tempe Bungkus Daun</h5>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="text" class="form-control form-control-sm text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <h5 class="mb-0">12.000</h5>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
             <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-2 mb-md-0 gambar-order">
                                <img src="/FolderGambar/TempeMini2.png" class="rounded w-100 h-100 object-fit-contain" alt="Product Image">
                            </div>
                            <div class="col-md-4 mb-2 mb-md-0">
                                <h5 class="card-title">Tempe Mini</h5>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="text" class="form-control form-control-sm text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <h5 class="mb-0">6.000</h5>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
             <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-2 mb-md-0 gambar-order">
                                <img src="/FolderGambar/TempeBulat2.png" class="rounded w-100 h-100 object-fit-contain" alt="Product Image">
                            </div>
                            <div class="col-md-4 mb-2 mb-md-0">
                                <h5 class="card-title">Tempe Bulat</h5>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="text" class="form-control form-control-sm text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <h5 class="mb-0">7.000</h5>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
          </div>


                 <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-4">Total Harga Pesanan</h4>
                        </div>
                        <div class="card-body">
                             <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong>400.000</strong>
                         </div>
                          <button class="btn btn-success w-100 fw-semibold">Beli</button>
                        </div>
                    </div>
            </div>
        </div>

    </div>
   </div>
  