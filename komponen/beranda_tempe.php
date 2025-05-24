<?php
$dataproduk = tampilproduk("SELECT * FROM produk");
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produk'], $_POST['quantity'])) {
            $user_id = $_SESSION['user']['id_user'];
            $product_id = (int)$_POST['id_produk'];
            $quantity = max(1, (int)$_POST['quantity']);

            if (tambahKeKeranjang($user_id, $product_id, $quantity)) {
                echo "
                <script> document.location.href = 'index.php?menu=3'; </script>
                ";
                exit;
            } else {
                $error = "Gagal menambah produk ke keranjang.";
            }
        }

?>
    <section class="hero" id="beranda">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Tempe Berkualitas Langsung Dari Produsen</h1>
            <p class="lead mb-5 fw-bold">Pesan Tempe Segar Berkualitas Tinggi Untuk Kebutuhan Sehari-Hari Atau Bisnis Anda Secara Online Dengan Mudah Dan Cepat</p>
            <div class="d-flex justify-content-center">
                <a href="#produk" class="btn btn-light btn-lg me-3 fw-bold">Belanja Sekarang</a>
                <a href="?menu=4" class="btn btn-outline-light btn-lg me-3 fw-bold">Daftar Reseller</a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5">
       <div class="container" id="produk">
    <h2 class="text-center mb-5 text-success">Produk Kami</h2>
    <div class="d-flex gap-4">
        <?php foreach ($dataproduk as $data): ?>
        <div class="card" style="width: 18rem;">
            <a type="button" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $data['id_produk']; ?>">
                <span class="product-badge">Terlaris</span>
                <div class="imgproduk">
                    <img src="/FolderGambar/<?php echo $data["foto_produk"]; ?>" class="card-img-top img-fluid w-100 h-100 object-fit-cover" alt="<?php echo $data["nama_produk"]; ?>">   
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data["nama_produk"]; ?></h5>
                    <p class="card-text desk"><?php echo $data["deskripsi"]; ?></p>
                    <p class="fw-bold text-success mb-3"><?php echo $data["harga"]; ?></p>
                </div>
            </a>
        </div>

        <!-- Modal unik per produk -->
        <div class="modal fade" id="modal_<?php echo $data['id_produk']; ?>" tabindex="-1" aria-labelledby="label_<?php echo $data['id_produk']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="label_<?php echo $data['id_produk']; ?>">Detail Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body d-flex gap-3">
                        <div class="wadah-gambar w-100">
                            <img src="/FolderGambar/<?php echo $data["foto_produk"]; ?>" class="card-img-top" alt="<?php echo $data["nama_produk"]; ?>">
                        </div>
                        <div class="modal-kontent w-100">
                            <div class="text d-flex flex-column">
                            <h5 class="card-title"><?php echo $data["nama_produk"]; ?></h5>
                            <div class="d-flex align-items-center justify-content-between">
                            <h6><?php echo $data["harga"]; ?></h6>
                            </div>
                                <p class="card-text mt-3"><?php echo $data["deskripsi"]; ?></p>
                            </div>
                            <div class="d-flex gap-2 mt-3">
                               <form action="" method="post">
                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                        <button type="button" class="border-0 bg-transparent text-danger" onclick="decrement()"><i class="fa-solid fa-minus"></i></button>
                                        <input name="quantity" type="number" id="quantity" value="1" min="1" class="form-control w-50 text-center" readonly>
                                        <button type="button" class="border-0 bg-transparent text-danger" onclick="increment()"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                                    <button type="submit" class="btn btn-success fw-semibold rounded-0 w-100 mt-3">Tambah ke Keranjang</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h2 class="mb-4 text-success" id="TentangKami">Sejarah Kami</h2>
            <p>Tempe Hub Didirikan pada tahun 2005, oleh Seorang Laki-laki dari Sumatera Selatan yang Bernama Imam Rosid, Perusahaan Tempe Hub dimulai dari sebuah ide sederhana untuk memulai bisnis di industri penjualan dari pembuatan yang awal mula menggunakan teknologi manual menjadi lebih berkembang seperti sekarang untuk menghadirkan solusi digital berkualitas tinggi yang terjangkau bagi para pelaku usaha lokal.</p>
            <p>Dalam perjalanan kami selama dua dekade, kami telah berhasil menumbuhkan tim yang kuat beranggotakan profesional terbaik di bidangnya dan selalu meningkatkan kualitas produk yang ada di Tempe Hub sehingga meningkatkan kepercayaan pelanggan kepada perusahaan kami</p>
            <p>Kami bangga dengan pencapaian kami dan tetap berkomitmen pada visi awal kami untuk mendukung pertumbuhan bisnis melalui solusi teknologi yang inovatif.</p>
        </div>
        <div class="col-lg-6 ratio-4x3">
            <img src="/FolderGambar/SejarahKami.jpg" alt="Sejarah Perusahaan" class="img-fluid rounded shadow object-fit-cover w-100 h-100">
        </div>
    </div>
</div>
</section>
                <div class="modal fade" id="tempebulat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                         <div class="modal-body d-flex gap-3">
                         <div class="wadah-gambar w-100">
                                    <img src="/FolderGambar/TempeBulat2.png" class="card-img-top" alt="Tempe Original">
                         </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Bulat</h5>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6>Rp 10.000</h6>
                                            <div class="d-flex align-items-center quantity-input justify-content-end">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(-1)">-</button>
                                                <input type="number" id="quantity" class="form-control text-center mx-2 w-25" value="1" min="1">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(1)">+</button>
                                            </div>
                                        </div>
                                        <p class="card-text mt-3">Tempe tipis yang khusus untuk dibuat mendoan, lezat dan gurih. </p>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button type="button" class="btn btn-success w-100 rounded-0">Beli</button>
                                        <button class="btn btn-outline-success w-100 rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </section>

    <!-- Features -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 text-success">Keunggulan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>Kualitas Terjamin</h4>
                        <p>Tempe dibuat dengan kedelai pilihan dan proses produksi yang higienis untuk menjamin kualitas terbaik.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4>Pengiriman Cepat</h4>
                        <p>Kami menjamin tempe yang diantar masih segar dengan sistem pengiriman yang cepat dan tepat waktu.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h4>Pembayaran Mudah</h4>
                        <p>Berbagai pilihan metode pembayaran yang aman dan praktis untuk memudahkan transaksi Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reseller Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-4 text-success">Menjadi Reseller Tempe Hub</h2>
                    <p class="lead mb-4">Dapatkan keuntungan sebagai reseller kami dengan harga khusus dan berbagai kemudahan dalam menjalankan bisnis.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Harga khusus reseller lebih murah</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Pembelian dalam jumlah besar</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Akses informasi stok secara real-time</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Dukungan pemasaran produk</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="/FolderGambar/reseller.jpg" class="img-fluid rounded shadow" alt="Menjadi Reseller">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 text-success">Cara Pemesanan</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                                <h3 class="mb-0">1</h3>
                            </div>
                            <h5>Pilih Produk</h5>
                            <p class="text-muted">Pilih produk tempe yang Anda inginkan dan tambahkan ke keranjang belanja.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                                <h3 class="mb-0">2</h3>
                            </div>
                            <h5>Checkout</h5>
                            <p class="text-muted">Lakukan checkout dan pilih metode pengiriman yang sesuai dengan kebutuhan Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                                <h3 class="mb-0">3</h3>
                            </div>
                            <h5>Pembayaran</h5>
                            <p class="text-muted">Lakukan pembayaran melalui berbagai metode pembayaran yang tersedia dan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                                <h3 class="mb-0">4</h3>
                            </div>
                            <h5>Terima Pesanan</h5>
                            <p class="text-muted">Pesanan Anda akan segera diproses dan diantar ke alamat tujuan dengan cepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 text-success">Ulasan Pelanggan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <h5 class="mb-0">Khodijah</h5>
                                    <small class="text-muted">Pelanggan</small>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"Tempe dari Tempe Hub sangat segar dan berkualitas. Pemesanan juga mudah dan pengiriman cepat sampai rumah."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <h5 class="mb-0">Abdul Walid</h5>
                                    <small class="text-muted">Reseller</small>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"Sebagai reseller, saya sangat terbantu dengan sistem yang mudah dan harga khusus yang menguntungkan. Stok selalu tersedia!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <h5 class="mb-0">Siti Aisyah</h5>
                                    <small class="text-muted">Pelanggan</small>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="card-text">"Website yang sangat memudahkan saya untuk mendapatkan tempe berkualitas. Pembayarannya juga praktis dengan berbagai pilihan."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 bg-success text-white">
        <div class="container text-center">
            <h2 class="mb-4">Siap Memesan Tempe Berkualitas?</h2>
            <p class="lead mb-4">Bergabunglah dengan ribuan pelanggan yang puas dengan produk dan layanan kami</p>
        </div>
    </section>

        <script>
            function increment() {
            const input = document.getElementById("quantity");
            input.value = parseInt(input.value) + 1;
        }

        function decrement() {
            const input = document.getElementById("quantity");
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        </script>


