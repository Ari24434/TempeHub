<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko_tempe");

function daftarReseller($koneksi, $postData, $fileData, $sessionUser) {
    if (!isset($sessionUser['id_user']) || $sessionUser['tipe_akun'] !== 'biasa') {
        return ['status' => false, 'message' => 'Anda tidak berhak mendaftar sebagai reseller.'];
    }
    $user_id = $sessionUser['id_user'];
    $nama_toko = trim($postData['nama'] ?? '');
    $no_hp = trim($postData['no_hp'] ?? '');
    $alamat = trim($postData['alamat'] ?? '');
    $setuju = isset($postData['setuju']);
    
    if (!$nama_toko || !$no_hp || !$alamat || !$setuju) {
        return ['status' => false, 'message' => 'Form tidak lengkap. Pastikan semua kolom diisi dan menyetujui syarat.'];
    }

    if (!isset($fileData['foto_ktp']) || $fileData['foto_ktp']['error'] !== UPLOAD_ERR_OK) {
        return ['status' => false, 'message' => 'Foto KTP wajib diupload.'];
    }

    $uploadDir = 'uploads/ktp/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileTmp = $fileData['foto_ktp']['tmp_name'];
    $fileName = basename($fileData['foto_ktp']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileExt, $allowedExt)) {
        return ['status' => false, 'message' => 'Format file KTP harus berupa gambar (jpg, jpeg, png, gif).'];
    }

    $newFileName = 'ktp_' . $user_id . '_' . time() . '.' . $fileExt;
    $uploadPath = $uploadDir . $newFileName;

    if (!move_uploaded_file($fileTmp, $uploadPath)) {
        $error = error_get_last();
        return ['status' => false, 'message' => 'Gagal mengupload foto KTP. Detail: ' . $error['message']];
    }

    // Update tipe akun
    $sqlUpdateUser = "UPDATE akun_user SET tipe_akun = 'reseller' WHERE id_user = ?";
    $stmtUser = $koneksi->prepare($sqlUpdateUser);
    $stmtUser->bind_param("i", $user_id);
    $stmtUser->execute();

    if ($stmtUser->affected_rows < 1) {
        $stmtUser->close();
        return ['status' => false, 'message' => 'Gagal mengubah jenis akun user.'];
    }
    $stmtUser->close();

    // Insert reseller
    $sqlInsertReseller = "INSERT INTO reseller (id_user, nama_toko, no_hp, alamat, foto_ktp) VALUES (?, ?, ?, ?, ?)";
    $stmtReseller = $koneksi->prepare($sqlInsertReseller);
    $stmtReseller->bind_param("issss", $user_id, $nama_toko, $no_hp, $alamat, $newFileName);
    $stmtReseller->execute();

    if ($stmtReseller->affected_rows < 1) {
        $stmtReseller->close();
        return ['status' => false, 'message' => 'Gagal menyimpan data reseller.'];
    }
    $stmtReseller->close();

    return ['status' => true, 'message' => 'Pendaftaran reseller berhasil!'];
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = daftarReseller($koneksi, $_POST, $_FILES, $_SESSION['user']);

    if ($result['status']) {
        $_SESSION['user']['tipe_akun'] = 'reseller';
        $message = "<div class='alert alert-success text-center'>{$result['message']}</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>{$result['message']}</div>";
    }
}
?>

<section class="py-5" id="daftar-sekarang">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card mb-5">
          <div class="card-header">
            <h3 class="text-center mb-0">Form Pendaftaran Reseller</h3>
          </div>
          <div class="card-body p-4">
            <?php if (!empty($message)) echo $message; ?>
            <form action="" method="POST" enctype="multipart/form-data" id="formReseller">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nama" class="form-label">Nama Toko<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap Toko Anda" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="foto_ktp" class="form-label">Foto KTP <span class="text-danger">*</span></label>
                  <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" accept="image/*" >
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="no_hp" class="form-label">Nomor HP Toko <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Contoh: 081234567890" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="alamat" class="form-label">Alamat Lengkap Toko<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap Toko Anda" required></textarea>
                </div>
              </div>
              <div class="mb-4 form-check text-center">
                <input type="checkbox" class="form-check-input" id="setuju" name="setuju" required>
                <label class="form-check-label text-center" for="setuju">
                  Saya setuju dengan <a class="link-success fw-semibold" href="#">syarat dan ketentuan</a> yang berlaku
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg my-5">Kirim Pendaftaran</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
