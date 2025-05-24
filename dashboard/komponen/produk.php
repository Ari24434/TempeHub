    <div class="container-fluid">
        <div class="row p-3">
                <!-- Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manajemen Produk</h1>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col mb-3">
                        <div class="card stat-card primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Produk</h6>
                                        <h3 class="mb-0">350</h3>
                                    </div>
                                    <div class="icon-bg bg-light p-3 rounded">
                                        <i class="fas fa-box text-success"></i>
                                    </div>
                                </div>
                                <div class="mt-2">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card stat-card danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Stok Habis</h6>
                                        <h3 class="mb-0">150</h3>
                                    </div>
                                    <div class="icon-bg bg-light p-3 rounded">
                                        <i class="fas fa-times-circle text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Daftar Produk</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Id Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dataproduk = tampilproduk("SELECT * FROM produk");
                                    ?>
                                    <?php foreach ($dataproduk as $data): ?>
                                    <tr> 
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img src="/FolderGambar/<?= $data["foto_produk"] ?>" alt="Product Image" class="rounded" width="50">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0"><?= $data["nama_produk"] ?></h6>
                                                    <small class="text-muted"></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $data["id_produk"] ?></td>
                                        <td><?= $data["kategori"] ?></td>
                                        <td><?= $data["harga"] ?></td>
                                        <td><?= $data["stok"] ?></td>
                                        <td><span class="badge bg-success">Ada</span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

               