
    <section class="hero" id="beranda">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Tempe Berkualitas Langsung Dari Produsen</h1>
            <p class="lead mb-5 fw-bold">Pesan Tempe Segar Berkualitas Tinggi Untuk Kebutuhan Sehari-Hari Atau Bisnis Anda Secara Online Dengan Mudah Dan Cepat</p>
            <div class="d-flex justify-content-center">
                <a href="#produk" class="btn btn-light btn-lg me-3 fw-bold">Belanja Sekarang</a>
                <a href="?menu=4" class="btn btn-outline-dark btn-lg fw-bold t">Daftar Reseller</a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5">
        <div class="container" id="produk">
            <h2 class="text-center mb-5">Produk Kami</h2>
            <div class="row g-4" >
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempebiasaModal">
                            <span class="product-badge">Terlaris</span>
                            <div class="imgproduk">
                            <img src="FolderGambar/TempeBiasa.jpg" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tempe Biasa</h5>
                                <p class="card-text">Tempe berkualitas tinggi dengan kedelai pilihan, segar dan higienis.</p>
                                <p class="fw-bold text-primary mb-3">Rp 8.000</p>
                                <div class="d-flex">
                                    <button class="btn btn-primary flex-grow-1">Beli</button>
                                    <button class="btn btn-outline-primary ms-2"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempebiasaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-3">
                                <div class="wadah-gambar w-100">
                                    <img src="FolderGambar/TempeBiasa.jpg" class="card-img-top" alt="Tempe Original">
                                </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Biasa</h5>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6>Rp 8.000</h6>
                                            <div class="d-flex align-items-center quantity-input justify-content-end">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(-1)">-</button>
                                                <input type="number" id="quantity" class="form-control text-center mx-2 w-25" value="1" min="1">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(1)">+</button>
                                            </div>
                                        </div>
                                        <p class="card-text mt-3">Tempe berkualitas tinggi dengan kedelai pilihan, segar dan higienis.</p>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button type="button" class="btn btn-primary w-100 rounded-0">Beli</button>
                                        <button class="btn btn-outline-primary w-100 rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempebungkusdaunmodal">
                            <div class="imgproduk">
                            <img src="/FolderGambar/TempeDaun.jpg" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                    <h5 class="card-title">Tempe Bungkus Daun</h5>
                                    <p class="card-text">Tempe dari kedelai hitam dengan kandungan antioksidan tinggi. </p>
                                    <p class="fw-bold text-primary mb-3">Rp 12.000</p>
                                    <div class="d-flex">
                                        <button class="btn btn-primary flex-grow-1">Beli</button>
                                        <button class="btn btn-outline-primary ms-2"><i class="fas fa-cart-plus"></i></button>
                                    </div>
                                </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempebungkusdaunmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-3">
                                <div class="wadah-gambar w-100">
                                    <img src="/FolderGambar/TempeDaun.jpg" class="card-img-top" alt="Tempe Original">
                                </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Bungkus Daun</h5>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6>Rp 12.000</h6>
                                            <div class="d-flex align-items-center quantity-input justify-content-end">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(-1)">-</button>
                                                <input type="number" id="quantity" class="form-control text-center mx-2 w-25" value="1" min="1">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(1)">+</button>
                                            </div>
                                        </div>
                                        <p class="card-text mt-3">Tempe dari kedelai hitam dengan kandungan antioksidan tinggi. </p>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button type="button" class="btn btn-primary w-100 rounded-0">Beli</button>
                                        <button class="btn btn-outline-primary w-100 rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempemini">
                            <span class="product-badge">Baru</span>
                            <div class="imgproduk">
                            <img src="/FolderGambar/TempeMIni.jpg" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                    <h5 class="card-title">Tempe Mini </h5>
                                    <p class="card-text">Tempe gembus yang lembut, cocok untuk berbagai olahan masakan.</p>
                                    <p class="fw-bold text-primary mb-3">Rp 6.000</p>
                                    <div class="d-flex">
                                        <button class="btn btn-primary flex-grow-1">Beli</button>
                                        <button class="btn btn-outline-primary ms-2"><i class="fas fa-cart-plus"></i></button>
                                    </div>
                                </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempemini" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-3">
                                <div class="wadah-gambar w-100">
                                    <img src="/FolderGambar/TempeMIni.jpg" class="card-img-top" alt="Tempe Original">
                                </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Mini</h5>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6>Rp 6.000</h6>
                                            <div class="d-flex align-items-center quantity-input justify-content-end">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(-1)">-</button>
                                                <input type="number" id="quantity" class="form-control text-center mx-2 w-25" value="1" min="1">
                                                <button class="btn btn-outline-secondary btn-qty" onclick="changeQuantity(1)">+</button>
                                            </div>
                                        </div>
                                        <p class="card-text mt-3">Tempe gembus yang lembut, cocok untuk berbagai olahan masakan.</p>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button type="button" class="btn btn-primary w-100 rounded-0">Beli</button>
                                        <button class="btn btn-outline-primary w-100 rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempebulat">
                            <div class="imgproduk">
                            <img src="/FolderGambar/tempe bulat.jpg" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                    <h5 class="card-title">Tempe Bulat </h5>
                                    <p class="card-text">Tempe bulat ini mudah digunakan sebagai isian makanan ringan, gorengan, atau lauk praktis.</p>
                                    <p class="fw-bold text-primary mb-3">Rp 7.000</p>

                                    <div class="d-flex">
                                        <button class="btn btn-primary flex-grow-1">Beli</button>
                                        <button class="btn btn-outline-primary ms-2"><i class="fas fa-cart-plus"></i></button>
                                    </div>
                                </div>
                        </a>
                        </div>
                    </div>
                    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4" id="TentangKami">Sejarah Kami</h2>
                    <p>Tempe Triple "A" Didirikan pada tahun 2005, oleh Seorang Laki-laki dari Sumatera Selatan yang Bernama Imam Rosid, Perusahaan Tempe Triple "A" dimulai dari sebuah ide sederhana untuk memulai bisnis di industri penjualan dari pembuatan yang awal mula menggunakan teknologi manual menjadi lebih berkembang seperti sekarang untuk menghadirkan solusi digital berkualitas tinggi yang terjangkau bagi para pelaku usaha lokal.</p>
                    <p>Dalam perjalanan kami selama dua dekade, kami telah berhasil menumbuhkan tim yang kuat beranggotakan profesional terbaik di bidangnya dan selalu meningkatkan kualitas produk yang ada di Tempe Triple "A" sehingga meningkatkan kepercayaan pelanggan kepada perusahaan kami</p>
                    <p>Kami bangga dengan pencapaian kami dan tetap berkomitmen pada visi awal kami untuk mendukung pertumbuhan bisnis melalui solusi teknologi yang inovatif.</p>
                </div>
                <div class="col-lg-6">
                    <img src="/FolderGambar/sejarahperusahaan.jpg" alt="Sejarah Perusahaan" class="img-fluid rounded shadow">
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
                                    <img src="/FolderGambar/tempe bulat.jpg" class="card-img-top" alt="Tempe Original">
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
                                        <button type="button" class="btn btn-primary w-100 rounded-0">Beli</button>
                                        <button class="btn btn-outline-primary w-100 rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
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
            <h2 class="text-center mb-5">Keunggulan Kami</h2>
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
                    <h2 class="mb-4">Menjadi Reseller Tempe Gurih</h2>
                    <p class="lead mb-4">Dapatkan keuntungan sebagai reseller kami dengan harga khusus dan berbagai kemudahan dalam menjalankan bisnis.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Harga khusus reseller lebih murah</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Pembelian dalam jumlah besar</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Akses informasi stok secara real-time</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Dukungan pemasaran produk</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Daftar Sebagai Reseller</a>
                </div>
                <div class="col-md-6">
                    <img src="FolderGambar/reseller.jpg" class="img-fluid rounded shadow" alt="Menjadi Reseller">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Cara Pemesanan</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
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
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
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
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
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
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
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
            <h2 class="text-center mb-5">Ulasan Pelanggan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="/api/placeholder/60/60" class="rounded-circle me-3" alt="Customer">
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
                            <p class="card-text">"Tempe dari Tempe Gurih sangat segar dan berkualitas. Pemesanan juga mudah dan pengiriman cepat sampai rumah."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="/api/placeholder/60/60" class="rounded-circle me-3" alt="Customer">
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
                                <img src="/api/placeholder/60/60" class="rounded-circle me-3" alt="Customer">
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
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Siap Memesan Tempe Berkualitas?</h2>
            <p class="lead mb-4">Bergabunglah dengan ribuan pelanggan yang puas dengan produk dan layanan kami</p>
            <a href="#" class="btn btn-light btn-lg">Belanja Sekarang</a>
        </div>
    </section>

    <!-- Footer -->


