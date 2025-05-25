<?php

if (!isset($_SESSION['user'])) {
    echo "Anda harus login untuk melihat keranjang.";
    exit;
}

$id_user = $_SESSION['user']['id_user'];
$result = getKeranjangByUser($koneksi, $id_user);
$produk_keranjang = $result['status'] ? $result['data'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['user']['id_user'];
    $id_produk = $_POST['id_produk'] ?? null;

    if ($id_produk) {
        $hapus = hapusKeranjangItem($koneksi, $id_user, $id_produk);

        if ($hapus) {
            echo "<script>alert('Produk berhasil dihapus'); window.location='index.php?menu=3';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal menghapus item.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('ID produk tidak ditemukan.'); window.history.back();</script>";
    }
}
?>
<div class="container py-5">
    <div class="d-flex gap-5 Order-detail">
        <div>
            <?php foreach($produk_keranjang as $produk) : ?>
             <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-2 mb-md-0 gambar-order">
                                <img src="/FolderGambar/<?= $produk["foto_produk"] ?>" class="rounded w-100 h-100 object-fit-contain" alt="Product Image">
                            </div>
                            <div class="col-md-4 mb-2 mb-md-0">
                                <h5 class="card-title"><?= $produk["nama_produk"] ?></h5>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="text" class="form-control form-control-sm text-center quantity-input" value="<?= $produk["qty"] ?>">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <h5 class="mb-0"><?= $produk["harga"] ?></h5>
                            </div>
                            <div class="col text-end">
                                <form method="POST" action="" onsubmit="return confirm('Yakin ingin menghapus produk ini dari keranjang?');">
                                    <input type="hidden" name="id_produk" value="<?= $produk["id_produk"] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
          </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-4">Total Harga Pesanan</h4>
                    </div>
                    <div class="card-body">
                       <?php
                        $total = 0;
                        foreach ($produk_keranjang as $item) {
                            $total += $item['harga'] * $item['qty'];
                        }
                        ?>
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong>Rp<?= number_format($total, 0, ',', '.') ?></strong>
                        </div>
                        <form action="?menu=5" method="post">
                            <button type="submit" class="btn btn-success w-100 fw-semibold">Beli</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  