<?php $koneksi= mysqli_connect("localhost","root","","toko_tempe"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pelanggan</title>
    <style>
        .container { padding: 20px; }
        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }
        .orders-table th, .orders-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .orders-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h3 class="p-3">Daftar Customer</h3>
    <div class="recent-orders border">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Pelanggan</th>
                    <th>E-Mail</th>
                    <th>Alamat</th>
                    <th>Nomor Telpon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM akun_user";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_user']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
