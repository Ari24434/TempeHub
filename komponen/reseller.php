
<section class="py-5">
        <div class="container" id="produk">
            <h2 class="text-center mb-5">Produk Khusus Reseller</h2>
            <div class="row g-4" >
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempebiasaModal">
                            <span class="product-badge">Terlaris</span>
                            <div class="imgproduk">
                            <img src="/FolderGambar/TempeBiasa2.png" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tempe Biasa</h5>
                                <p class="card-text">Tempe berkualitas tinggi dengan kedelai pilihan, segar dan higienis.</p>
                                <p class="fw-bold text-success mb-3">Rp 8.000</p>
                                <div class="d-flex">
                                    <button class="btn btn-success flex-grow-1">Beli</button>
                                    <button class="btn btn-outline-success ms-2"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempebiasaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-3">
                                <div class="wadah-gambar w-100">
                                    <img src="/FolderGambar/TempeBiasa2.png" class="card-img-top" alt="Tempe Original">
                                </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Biasa</h5>
                                        <form method="post"></form>
                                        <div class="d-flex align-items-center justify-content-between">
                                        <?php
                                        $harga_normal = 8000;
                                        ?>

                                        <div class="mt-3">
                                            <h5 id="hasilHarga"> <?= number_format($harga_normal, 0, ',', '.'); ?></h5>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <label for="paket">Pilih Paketan:</label>
                                            <select class="form-select w-50" id="paket">
                                                <option value="0" selected>Pilih Paketan</option>
                                                <option value="1">Paket 1</option>
                                                <option value="2">Paket 2</option>
                                            </select>
                                        </div>

                                        <script>
                                            const paketSelect = document.getElementById('paket');
                                            const hasilHarga = document.getElementById('hasilHarga');
                                            const hargaNormal = <?= $harga_normal; ?>;

                                            paketSelect.addEventListener('change', function () {
                                                let total = hargaNormal;

                                                if (this.value === "1") {
                                                    total = hargaNormal * 50;
                                                } else if (this.value === "2") {
                                                    total = hargaNormal * 100; // Atur sesuai kebutuhan
                                                }

                                                // Format ke format Rupiah
                                                hasilHarga.textContent = 'Total Harga: Rp. ' + total.toLocaleString('id-ID');
                                            });
                                        </script>
                                        </div>
                                        <p class="card-text mt-3">Paket 1 <br>
                                            Isi 50 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br><br>
                                            Paket 2 <br>
                                            Isi 100 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success rounded-0">Beli</button>
                                <button class="btn btn-outline-success rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempebiasaModal1">
                            <div class="imgproduk">
                            <img src="/FolderGambar/TempeDaun2.png" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tempe Bungkus Daun</h5>
                                <p class="card-text">Tempe dari kedelai hitam dengan kandungan antioksidan tinggi.</p>
                                <p class="fw-bold text-success mb-3">Rp 12.000</p>
                                <div class="d-flex">
                                    <button class="btn btn-success flex-grow-1">Beli</button>
                                    <button class="btn btn-outline-success ms-2"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempebiasaModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-3">
                                <div class="wadah-gambar w-100">
                                    <img src="/FolderGambar/TempeDaun2.png" class="card-img-top" alt="Tempe Original">
                                </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Bungkus Daun</h5>
                                        <form method="post"></form>
                                        <div class="d-flex align-items-center justify-content-between">
                                        <?php
                                        $harga_normal1 = 12000;
                                        ?>

                                        <div class="mt-3">
                                            <h5 id="hasilHarga1"> <?= number_format($harga_normal1, 0, ',', '.'); ?></h5>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <label for="paket">Pilih Paketan:</label>
                                            <select class="form-select w-50" id="paket1">
                                                <option value="0" selected>Pilih Paketan</option>
                                                <option value="1">Paket 1</option>
                                                <option value="2">Paket 2</option>
                                            </select>
                                        </div>

                                        <script>
                                            const paketSelect1 = document.getElementById('paket1');
                                            const hasilHarga1 = document.getElementById('hasilHarga1');
                                            const hargaNormal1 = <?= $harga_normal1; ?>;

                                            paketSelect1.addEventListener('change', function () {
                                                let total1 = hargaNormal1;

                                                if (this.value === "1") {
                                                    total1 = hargaNormal1 * 50;
                                                } else if (this.value === "2") {
                                                    total1 = hargaNormal1 * 100; // Atur sesuai kebutuhan
                                                }

                                                // Format ke format Rupiah
                                                hasilHarga1.textContent = 'Total Harga: Rp. ' + total1.toLocaleString('id-ID');
                                            });
                                        </script>
                                        </div>
                                        <p class="card-text mt-3">Paket 1 <br>
                                            Isi 50 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br><br>
                                            Paket 2 <br>
                                            Isi 100 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success rounded-0">Beli</button>
                                <button class="btn btn-outline-success rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempeMini">
                            <span class="product-badge">Baru</span>
                            <div class="imgproduk">
                            <img src="/FolderGambar/TempeMini2.png" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tempe Mini</h5>
                                <p class="card-text">Tempe gembus yang lembut, cocok untuk berbagai olahan masakan.</p>
                                <p class="fw-bold text-success mb-3">Rp 6.000</p>
                                <div class="d-flex">
                                    <button class="btn btn-success flex-grow-1">Beli</button>
                                    <button class="btn btn-outline-success ms-2"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempeMini" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-3">
                                <div class="wadah-gambar w-100">
                                    <img src="/FolderGambar/TempeMini2.png" class="card-img-top" alt="Tempe Original">
                                </div>
                                <div class="modal-kontent w-100">
                                    <div class="text d-flex flex-column">
                                        <h5 class="card-title">Tempe Mini</h5>
                                        <form method="post"></form>
                                        <div class="d-flex align-items-center justify-content-between">
                                        <?php
                                        $harga_normal2 = 6000;
                                        ?>

                                        <div class="mt-3">
                                            <h5 id="hasilHarga2"> <?= number_format($harga_normal2, 0, ',', '.'); ?></h5>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <label for="paket2">Pilih Paketan:</label>
                                            <select class="form-select w-50" id="paket2">
                                                <option value="0" selected>Pilih Paketan</option>
                                                <option value="1">Paket 1</option>
                                                <option value="2">Paket 2</option>
                                            </select>
                                        </div>

                                        <script>
                                            const paketSelect2 = document.getElementById('paket2');
                                            const hasilHarga2 = document.getElementById('hasilHarga2');
                                            const hargaNormal2 = <?= $harga_normal2; ?>;

                                            paketSelect2.addEventListener('change', function () {
                                                let total = hargaNormal2;

                                                if (this.value === "1") {
                                                    total = hargaNormal2 * 50;
                                                } else if (this.value === "2") {
                                                    total = hargaNormal2 * 100; // Atur sesuai kebutuhan
                                                }

                                                // Format ke format Rupiah
                                                hasilHarga2.textContent = 'Total Harga: Rp. ' + total.toLocaleString('id-ID');
                                            });
                                        </script>
                                        </div>
                                        <p class="card-text mt-3">Paket 1 <br>
                                            Isi 50 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br><br>
                                            Paket 2 <br>
                                            Isi 100 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success rounded-0">Beli</button>
                                <button class="btn btn-outline-success rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="card h-100">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#tempebulat">
                            <div class="imgproduk">
                            <img src="/FolderGambar/TempeBulat2.png" class="card-img-top" alt="Tempe Original">   
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tempe Bulat</h5>
                                <p class="card-text">Tempe bulat ini mudah digunakan sebagai isian makanan ringan, gorengan, atau lauk praktis.</p>
                                <p class="fw-bold text-success mb-3">Rp 7.000</p>
                                <div class="d-flex">
                                    <button class="btn btn-success flex-grow-1">Beli</button>
                                    <button class="btn btn-outline-success ms-2"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="modal fade" id="tempebulat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
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
                                        <form method="post"></form>
                                        <div class="d-flex align-items-center justify-content-between">
                                        <?php
                                        $harga_normal3 = 7000;
                                        ?>

                                        <div class="mt-3">
                                            <h5 id="hasilHarga3"> <?= number_format($harga_normal3, 0, ',', '.'); ?></h5>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <label for="paket3">Pilih Paketan:</label>
                                            <select class="form-select w-50" id="paket3">
                                                <option value="0" selected>Pilih Paketan</option>
                                                <option value="1">Paket 1</option>
                                                <option value="2">Paket 2</option>
                                            </select>
                                        </div>

                                        <script>
                                            const paketSelect3 = document.getElementById('paket3');
                                            const hasilHarga3 = document.getElementById('hasilHarga3');
                                            const $harga_normal3 = <?= $harga_normal3; ?>;

                                            paketSelect3.addEventListener('change', function () {
                                                let total = $harga_normal3;

                                                if (this.value === "1") {
                                                    total = $harga_normal3 * 50;
                                                } else if (this.value === "2") {
                                                    total = $harga_normal3 * 100; // Atur sesuai kebutuhan
                                                }

                                                // Format ke format Rupiah
                                                hasilHarga3.textContent = 'Total Harga: Rp. ' + total.toLocaleString('id-ID');
                                            });
                                        </script>
                                        </div>
                                        <p class="card-text mt-3">Paket 1 <br>
                                            Isi 50 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br><br>
                                            Paket 2 <br>
                                            Isi 100 Biji tempe biasa <br>
                                            Standar, ± 200 Gram per biji <br>
                                            100% Kedelai pilihan, Tanpa pengawet <br>
                                            Diproses hiegenis, fermentasi optimal, siap di olah <br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success rounded-0">Beli</button>
                                <button class="btn btn-outline-success rounded-0"><i class="fas fa-cart-plus"></i> Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
               