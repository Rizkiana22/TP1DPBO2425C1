<?php
// Load definisi class TokoElektronik
require_once "TokoElektronik.php";

// Mulai session jika belum aktif (supaya data toko tersimpan di session)
if (session_status() === PHP_SESSION_NONE) session_start();

// Inisialisasi objek TokoElektronik di session
if (!isset($_SESSION['toko'])) {
    $_SESSION['toko'] = serialize(new TokoElektronik());
}
// Ambil objek toko dari session
$toko = unserialize($_SESSION['toko']);

// Direktori untuk menyimpan file upload (gambar produk)
$upload_dir = "uploads/";
// Buat folder uploads/ jika belum ada
if (!is_dir($upload_dir)) mkdir($upload_dir);

// Variabel untuk menampung produk yang sedang diedit
$edit_produk = null;
// Cek apakah user klik tombol Edit (bisa lewat POST atau GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $edit_produk = $toko->getProdukById($_POST['edit']); // ambil data produk berdasarkan id
} elseif (isset($_GET['edit'])) {
    $edit_produk = $toko->getProdukById($_GET['edit']); // ambil data produk dari GET
}

// Variabel hasil pencarian produk
$hasil_cari = null;

// Proses semua form yang dikirim user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ==== FITUR CARI ====
    if (isset($_POST['cari'])) {
        // Cari produk berdasarkan keyword (case-insensitive)
        $hasil_cari = $toko->cariProdukByNama($_POST['keyword'] ?? '');
    }

    // ==== FITUR HAPUS ====
    if (isset($_POST['hapus'])) {
        // Hapus produk berdasarkan id
        $toko->hapusProduk($_POST['id'] ?? '');
    }

    // ==== FITUR TAMBAH / UPDATE ====
    if (isset($_POST['tambah']) || isset($_POST['update'])) {
        $gambar_name = '';
        // Kalau user upload gambar baru, simpan ke folder uploads/
        if (!empty($_FILES['gambar']['name'])) {
            $gambar_name = time() . "_" . basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_dir . $gambar_name);
        }

        // Tambah produk baru
        if (isset($_POST['tambah'])) {
            $toko->tambahProduk(
                $_POST['id'], 
                $_POST['nama'], 
                $_POST['harga'], 
                $_POST['stok'], 
                $gambar_name
            );
        }
        // Update produk yang sudah ada
        if (isset($_POST['update'])) {
            // Kalau tidak upload gambar baru, $gambar_name = '' dihandle oleh updateProduk
            $toko->updateProduk(
                $_POST['id'], 
                $_POST['nama'], 
                $_POST['harga'], 
                $_POST['stok'], 
                $gambar_name
            );
        }
    }

    // Simpan kembali objek toko ke session agar perubahan tersimpan
    $_SESSION['toko'] = serialize($toko);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Toko Elektronik</title>
</head>
<body>
    <h2>Toko Elektronik</h2>
    <!-- Form  -->
    <form method="POST" enctype="multipart/form-data">
        <input type="number" name="id" placeholder="ID" required 
               value="<?= htmlspecialchars($edit_produk['id'] ?? '') ?>" 
               <?= $edit_produk ? 'readonly' : '' ?>>
        <input type="text" name="nama" placeholder="Nama Produk" required 
               value="<?= htmlspecialchars($edit_produk['nama'] ?? '') ?>">
        <input type="number" step="0.01" name="harga" placeholder="Harga" required 
               value="<?= htmlspecialchars($edit_produk['harga'] ?? '') ?>">
        <input type="number" name="stok" placeholder="Stok" required 
               value="<?= htmlspecialchars($edit_produk['stok'] ?? '') ?>">
        <input type="file" name="gambar">
        <?php if ($edit_produk): ?>
            <button type="submit" name="update">Update</button>
            <a href="index.php">Batal</a>
        <?php else: ?>
            <button type="submit" name="tambah">Tambah</button>
        <?php endif; ?>
    </form>

    <form method="POST">
        <input type="text" name="keyword" placeholder="Cari berdasarkan nama">
        <button type="submit" name="cari">Cari</button>
    </form>

    <!-- Menampilkan daftar produk -->
    <h3>Daftar Produk</h3>
    <table border="1">
        <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Gambar</th><th>Aksi</th></tr>
        <?php
        $list = $hasil_cari ?? $toko->getProduk();
        foreach ($list as $item):
            $gambar_html = !empty($item['gambar']) ? "<img src='uploads/".htmlspecialchars($item['gambar'])."' width='80'>" : "";
        ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['nama']) ?></td>
                <td><?= htmlspecialchars($item['harga']) ?></td>
                <td><?= htmlspecialchars($item['stok']) ?></td>
                <td><?= $gambar_html ?></td>
                <td>
                    <!-- tombol edit -->
                    <form method="POST" style="display:inline">
                        <input type="hidden" name="edit" value="<?= htmlspecialchars($item['id']) ?>">
                        <button type="submit">Edit</button>
                    </form>
                    <!-- tombol hapus -->
                    <form method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
                        <button type="submit" name="hapus">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
