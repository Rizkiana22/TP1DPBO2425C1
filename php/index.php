<?php
// Panggil definisi class TokoElektronik
require_once "Toko.php";

// Start session hanya jika belum aktif (supaya gak double session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Buat instance toko elektronik
$toko = new TokoElektronik();

// Direktori untuk menyimpan file upload (gambar produk)
$upload_dir = "uploads/";
if (!is_dir($upload_dir)) mkdir($upload_dir); // kalau folder belum ada, bikin baru

// Variabel untuk menampung produk yang sedang di-edit
$edit_produk = null;

// Cek apakah user klik tombol Edit (dikirim lewat POST atau GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    // Jika lewat POST (misalnya tombol edit berupa form)
    $edit_produk = $toko->getProdukById($_POST['edit']);
} elseif (isset($_GET['edit'])) {
    // Jika lewat GET (misalnya link ?edit=123)
    $edit_produk = $toko->getProdukById($_GET['edit']);
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

        // simpen gambar di lokal bukan url 
        // Kalau user upload gambar baru, simpan file ke folder uploads/
        if (!empty($_FILES['gambar']['name'])) {
            $gambar_name = time() . "_" . basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_dir . $gambar_name);
        }

        // Tambah produk baru
        if (isset($_POST['tambah'])) {
            $toko->tambahProduk(
                $_POST['id'] ?? '',
                $_POST['nama'] ?? '',
                $_POST['harga'] ?? 0,
                $_POST['stok'] ?? 0,
                $gambar_name
            );
        }

        // Update produk yang sudah ada
        if (isset($_POST['update'])) {
            // Kalau tidak upload gambar baru, $gambar_name = ''  dihandle oleh method updateProduk
            $toko->updateProduk(
                $_POST['id'] ?? '',
                $_POST['nama'] ?? '',
                $_POST['harga'] ?? 0,
                $_POST['stok'] ?? 0,
                $gambar_name
            );
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Toko Elektronik</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Toko Elektronik</h2>

    <!-- Form Tambah/Update -->
    <form method="POST" enctype="multipart/form-data">
        <input type="number" name="id" placeholder="ID" required value="<?php echo htmlspecialchars($edit_produk['id'] ?? ''); ?>" <?php echo $edit_produk ? 'readonly' : ''; ?>>
        <input type="text" name="nama" placeholder="Nama Produk" required value="<?php echo htmlspecialchars($edit_produk['nama'] ?? ''); ?>">
        <input type="number" step="0.01" name="harga" placeholder="Harga" required value="<?php echo htmlspecialchars($edit_produk['harga'] ?? ''); ?>">
        <input type="number" name="stok" placeholder="Stok" required value="<?php echo htmlspecialchars($edit_produk['stok'] ?? ''); ?>">
        <input type="file" name="gambar">
        <?php if ($edit_produk): ?>
            <button type="submit" name="update">Update</button>
            <a href="index.php">Batal</a>
        <?php else: ?>
            <button type="submit" name="tambah">Tambah</button>
        <?php endif; ?>
    </form>

    <!-- Form Cari -->
    <form method="POST">
        <input type="text" name="keyword" placeholder="Cari berdasarkan nama">
        <button type="submit" name="cari">Cari</button>
    </form>

    <!-- Tabel Produk -->
    <h3>Daftar Produk</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $list = $hasil_cari ?? $toko->getProduk();
        // menampilkan gambar
        foreach ($list as $item):
            $gambar_html = !empty($item['gambar']) ? "<img src='uploads/" . htmlspecialchars($item['gambar']) . "' alt='gambar'>" : "";
        ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['nama']) ?></td>
                <td>Rp<?= htmlspecialchars($item['harga']) ?></td>
                <td><?= htmlspecialchars($item['stok']) ?></td>
                <td><?= $gambar_html ?></td>
                <td>
                    <!--button edit-->
                    <form method="POST" style="display:inline">
                        <input type="hidden" name="edit" value="<?= htmlspecialchars($item['id']) ?>">
                        <button type="submit" class="btn-edit">Edit</button>
                    </form>

                    <!--button hapus-->
                    <form method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
                        <button type="submit" name="hapus" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>