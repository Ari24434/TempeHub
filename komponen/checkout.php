 <?php
 $id_user = $_SESSION['user']['id_user'];
$result = getKeranjangByUser($koneksi, $id_user);
$produk_keranjang = $result['status'] ? $result['data'] : [];
 ?>
 <div class="container my-5">
    <div class="row">
        <!-- Form Checkout -->
        <div class="col-lg-8">
            <form id="checkoutForm">
                <!-- Informasi Kontak -->
                <div class="form-section1">
                    <h5 class="mb-3"><i class="fas fa-user me-2"></i>Informasi Kontak</h5>
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                            <label for="firstName" class="form-label">Nama Lengkap</label>
                            <input name="username" type="text" class="form-control" value="<?= $_SESSION["user"]["username"] ?>" id="firstName" required>
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input name="email" type="email" class="form-control" id="email" value="<?= $_SESSION["user"]["email"] ?>" required>
                        </div>
                        <div class="col mb-3">
                            <label for="phone" class="form-label">Nomor Telepon *</label>
                            <input name="no-telp" type="tel" class="form-control" id="phone" required>
                        </div>
                    </div>
                </div>

                <!-- Alamat Pengiriman -->
                <div class="form-section1">
                    <h5 class="mb-3"><i class="fas fa-map-marker-alt me-2"></i>Alamat Pengiriman</h5>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Lengkap *</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>
                </div>

                <!-- Metode Pengiriman -->
                <div class="form-section1">
                    <h5 class="mb-3"><i class="fas fa-truck me-2"></i>Metode Pengiriman</h5>
                    <div class="d-flex gap-5">
                        <div class="w-100 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <label for="regular" class="form-check-label d-block mt-2">
                                        <input type="radio" class="form-check-input" name="shipping" id="regular" value="regular" checked>
                                        <div class="mt-2">
                                            <i class="fas fa-shipping-fast fa-2x text-primary mb-2"></i>
                                            <h6>Reguler</h6>
                                            <p class="text-muted small">Menjadi Prioritas</p>
                                            <strong>Rp 3000</strong>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <label for="express" class="form-check-label d-block mt-2">
                                        <input type="radio" class="form-check-input" name="shipping" id="express" value="express">
                                        <div class="mt-2">
                                            <i class="fas fa-bolt fa-2x text-warning mb-2"></i>
                                            <h6>Express</h6>
                                            <p class="text-muted small">Menjadi Prioritas</p>
                                            <strong>Rp 5.000</strong>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Catatan -->
                <div class="form-section1">
                    <h5 class="mb-3"><i class="fas fa-sticky-note me-2"></i>Catatan Tambahan</h5>
                    <textarea class="form-control" id="notes" rows="3" placeholder="Catatan untuk penjual (opsional)"></textarea>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="order-summary1">
                <h5 class="mb-4"><i class="fas fa-list-alt me-2"></i>Rincian Pesanan</h5>
                
                <!-- Product Items -->
                 <?php foreach($produk_keranjang as $produk) : ?>
                <div class="product-item1">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <img src="/FolderGambar/<?= $produk["foto_produk"] ?>"
                                    alt="Sepatu Nike" class="product-image1">
                        </div>
                        <div class="col-6">
                            <h6 class="mb-1"><?= $produk["nama_produk"] ?></h6>
                            <div class="mt-1">
                                <span class="badge bg-secondary"><?= $produk["qty"] ?></span>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <strong><?= $produk["harga"] ?></strong>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


                <!-- Price Breakdown -->
                <div class="price-breakdown1">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal (4 items)</span>
                        <?php
                        $total = 0;
                        foreach ($produk_keranjang as $item) {
                            $total += $item['harga'] * $item['qty'];
                        }
                        ?>
                        <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Ongkos Kirim</span>
                        <span id="shipping-cost">Rp 15.000</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fs-5 fw-bold">
                        <input type="hidden" name="total_subtotal" value="<?= $total ?>">
                        <input type="hidden" name="total_ongkir" id="input_ongkir" value="3000">
                        <input type="hidden" name="total_bayar" id="input_total" value="<?= $total + 3000 ?>">
                        <span>Total</span>
                        <span id="total-cost">Rp 2.348.170</span>
                    </div>
                </div>

                <!-- Promo Code -->
                <!-- Checkout Button -->
                <button id="pay-button" form="checkoutForm" class="btn btn-primary btn-checkout w-100 mt-4">
                    <i class="fas fa-shopping-bag me-2"></i>Proses Pembayaran
                </button>

                <!-- Security Info -->
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="fas fa-lock me-1"></i>
                        Pembayaran Anda dilindungi dengan enkripsi SSL
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
   <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('TRANSACTION_TOKEN_HERE');
        // customer will be redirected after completing payment pop-up
      });
    </script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const shippingRadios = document.querySelectorAll('input[name="shipping"]');
    const shippingCostDisplay = document.getElementById('shipping-cost');
    const totalCostDisplay = document.getElementById('total-cost');
    const subtotal = <?= $total ?>;

    function updateTotal() {
        let selected = document.querySelector('input[name="shipping"]:checked');
        let shippingCost = selected.value === 'express' ? 5000 : 3000;
        shippingCostDisplay.textContent = 'Rp ' + shippingCost.toLocaleString('id-ID');
        let total = subtotal + shippingCost;
        totalCostDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }

    shippingRadios.forEach(radio => {
        radio.addEventListener('change', updateTotal);
    });

    updateTotal();
});
</script>
