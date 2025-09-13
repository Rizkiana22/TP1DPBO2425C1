<?php
session_start();
require_once 'Produk.php';
require_once 'Toko.php';

// Setup toko (pakai session)
if (!isset($_SESSION['toko'])) {
    $_SESSION['toko'] = serialize(new Toko());
}
$toko = unserialize($_SESSION['toko']);

// Handle aksi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // === PRODUK ===
    if ($action === 'add_produk') {
        $id = count($toko->getDaftarProduk()) + 1;
        $nama  = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok  = $_POST['stok'];
        $gambar = '';

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $gambar = $uploadDir . basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
        }

        $produk = new Produk($id, $nama, $harga, $stok, $gambar);
        $toko->tambahProduk($produk);
    } elseif ($action === 'delete_produk') {
        $toko->hapusProduk($_POST['id']);
    } elseif ($action === 'edit_produk') {
        $id    = $_POST['id'];
        $nama  = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok  = $_POST['stok'];
        $gambar = null;

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $gambar = $uploadDir . basename($_FILES['gambar']['tmp_name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
        }

        $toko->updateProduk($id, $nama, $harga, $stok, $gambar);
    }

    // === PEMBELI ===
    elseif ($action === 'add_pembeli') {
        $id = count($toko->getDaftarPembeli()) + 1;
        $nama   = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp   = $_POST['telp'];
        $gambar = null;

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $gambar = $uploadDir . basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
        }

        $toko->tambahPembeli(new Pembeli($id, $nama, $alamat, $telp, $gambar));
    } elseif ($action === 'delete_pembeli') {
        $toko->hapusPembeli($_POST['id']);
    } elseif ($action === 'edit_pembeli') {
        $id     = $_POST['id'];
        $nama   = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp   = $_POST['telp'];
        $gambar = null;

        $toko->updatePembeli($id, $nama, $alamat, $telp, $gambar);

        // === TRANSAKSI ===
    } elseif ($action === 'add_transaksi') {
        $id = count($toko->getDaftarTransaksi()) + 1;
        $produk = null;
        $pembeli = null;

        foreach ($toko->getDaftarProduk() as $p) {
            if ($p->getId() == $_POST['id_produk']) {
                $produk = $p;
                break;
            }
        }

        foreach ($toko->getDaftarPembeli() as $b) {
            if ($b->getId() == $_POST['id_pembeli']) {
                $pembeli = $b;
                break;
            }
        }

        if ($produk && $pembeli) {
            $jumlah = intval($_POST['jumlah']);
            if ($jumlah > $produk->getStok()) {
                $_SESSION['error'] = "Stok produk {$produk->getNama()} tidak mencukupi! (Sisa: {$produk->getStok()})";
            } elseif ($jumlah <= 0) {
                $_SESSION['error'] = "Jumlah transaksi harus lebih dari 0!";
            } else {
                $transaksi = new Transaksi($id, $produk, $pembeli, $jumlah);
                $toko->tambahTransaksi($transaksi);
                $produk->setStok($produk->getStok() - $jumlah);
                $_SESSION['success'] = "Transaksi berhasil ditambahkan.";
            }
        }
    }elseif ($action === 'add_transaksi') {
        $id = count($toko->getDaftarTransaksi()) + 1;
        $produk = null;
        $pembeli = null;

        foreach ($toko->getDaftarProduk() as $p) {
            if ($p->getId() == $_POST['id_produk']) {
                $produk = $p;
                break;
            }
        }

        foreach ($toko->getDaftarPembeli() as $b) {
            if ($b->getId() == $_POST['id_pembeli']) {
                $pembeli = $b;
                break;
            }
        }

        if ($produk && $pembeli) {
            $jumlah = intval($_POST['jumlah']);
            if ($jumlah > $produk->getStok()) {
                $_SESSION['error'] = "Stok produk {$produk->getNama()} tidak mencukupi! (Sisa: {$produk->getStok()})";
            } elseif ($jumlah <= 0) {
                $_SESSION['error'] = "Jumlah transaksi harus lebih dari 0!";
            } else {
                $transaksi = new Transaksi($id, $produk, $pembeli, $jumlah);
                $toko->tambahTransaksi($transaksi);
                $produk->setStok($produk->getStok() - $jumlah);
                $_SESSION['success'] = "Transaksi berhasil ditambahkan.";
            }
        }
    }elseif ($action === 'delete_transaksi') {
        $toko->hapusTransaksi($_POST['id_transaksi']);
        $_SESSION['success'] = "Transaksi berhasil dihapus.";
    }elseif ($action === 'edit_transaksi') {
        $id = $_POST['id_transaksi'];
        $jumlah = intval($_POST['jumlah']);

        foreach ($toko->getDaftarTransaksi() as $trx) {
            if ($trx->getId() == $id) {
                // balikin stok lama dulu
                $produk = $trx->getProduk();
                $produk->setStok($produk->getStok() + $trx->getJumlah());

                if ($jumlah <= 0) {
                    $_SESSION['error'] = "Jumlah transaksi harus lebih dari 0!";
                } elseif ($jumlah > $produk->getStok()) {
                    $_SESSION['error'] = "Stok produk {$produk->getNama()} tidak mencukupi! (Sisa: {$produk->getStok()})";
                } else {
                    $trx->setJumlah($jumlah);
                    $trx->hitungTotal(); // pastikan class Transaksi punya method ini
                    $produk->setStok($produk->getStok() - $jumlah);
                    $_SESSION['success'] = "Transaksi berhasil diupdate.";
                }
                break;
            }
        }
    }


    // Simpan kembali ke session
    $_SESSION['toko'] = serialize($toko);

    // Refresh halaman
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Manajemen Produk & Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Tambah Produk</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red;"><?= $_SESSION['error'];
                                unset($_SESSION['error']); ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <p style="color:green;"><?= $_SESSION['success'];
                                unset($_SESSION['success']); ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_produk">
        Nama: <input type="text" name="nama" required>
        Harga: <input type="number" name="harga" required>
        Stok: <input type="number" name="stok" required>
        Gambar: <input type="file" name="gambar">
        <button type="submit">Tambah</button>
    </form>

    <h2>Daftar Produk</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($toko->getDaftarProduk() as $i => $produk): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $produk->getNama() ?></td>
                <td><?= $produk->getHarga() ?></td>
                <td><?= $produk->getStok() ?></td>
                <td>
                    <?php if ($produk->getGambar()): ?>
                        <img src="<?= $produk->getGambar() ?>" width="50">
                    <?php endif; ?>
                </td>
                <td>
                    <!-- Hapus -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="delete_produk">
                        <input type="hidden" name="id" value="<?= $produk->getId() ?>">
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                    <!-- Edit -->
                    <form method="POST" enctype="multipart/form-data" style="display:inline;">
                        <input type="hidden" name="action" value="edit_produk">
                        <input type="hidden" name="id" value="<?= $produk->getId() ?>">
                        Nama: <input type="text" name="nama" value="<?= $produk->getNama() ?>" required>
                        Harga: <input type="number" name="harga" value="<?= $produk->getHarga() ?>" required>
                        Stok: <input type="number" name="stok" value="<?= $produk->getStok() ?>" required>
                        <input type="file" name="gambar">
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Pembeli</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_pembeli">
        Nama: <input type="text" name="nama" required>
        Alamat: <input type="text" name="alamat" required>
        Telp: <input type="text" name="telp" required>
        Gambar: <input type="file" name="gambar">
        <button type="submit">Tambah</button>
    </form>

    <h2>Daftar Pembeli</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($toko->getDaftarPembeli() as $i => $pembeli): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $pembeli->getNama() ?></td>
                <td><?= $pembeli->getAlamat() ?></td>
                <td><?= $pembeli->getTelp() ?></td>
                <td>
                    <?php if ($pembeli->getGambar()): ?>
                        <img src="<?= $pembeli->getGambar() ?>" width="50">
                    <?php endif; ?>
                </td>
                <td>
                    <!-- Hapus -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="delete_pembeli">
                        <input type="hidden" name="id" value="<?= $pembeli->getId() ?>">
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                    <!-- Edit -->
                    <form method="POST" enctype="multipart/form-data" style="display:inline;">
                        <input type="hidden" name="action" value="edit_pembeli">
                        <input type="hidden" name="id" value="<?= $pembeli->getId() ?>">
                        Nama: <input type="text" name="nama" value="<?= $pembeli->getNama() ?>" required>
                        Alamat: <input type="text" name="alamat" value="<?= $pembeli->getAlamat() ?>" required>
                        Telp: <input type="text" name="telp" value="<?= $pembeli->getTelp() ?>" required>
                        <input type="file" name="gambar">
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Transaksi</h2>
    <form method="POST">
        <input type="hidden" name="action" value="add_transaksi">
        Produk:
        <select name="id_produk" required>
            <?php foreach ($toko->getDaftarProduk() as $produk): ?>
                <option value="<?= $produk->getId() ?>">
                    <?= $produk->getNama() ?> (Rp<?= $produk->getHarga() ?>)
                </option>
            <?php endforeach; ?>
        </select>
        Pembeli:
        <select name="id_pembeli" required>
            <?php foreach ($toko->getDaftarPembeli() as $pembeli): ?>
                <option value="<?= $pembeli->getId() ?>"><?= $pembeli->getNama() ?></option>
            <?php endforeach; ?>
        </select>
        Jumlah: <input type="number" name="jumlah" min="1" required>
        <button type="submit">Tambah</button>
    </form>

    <h2>Daftar Transaksi</h2>
    <table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Produk</th>
        <th>Pembeli</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($toko->getDaftarTransaksi() as $trx): ?>
    <tr>
        <td><?= $trx->getId() ?></td>
        <td><?= htmlspecialchars($trx->getProduk()->getNama()) ?></td>
        <td><?= htmlspecialchars($trx->getPembeli()->getNama()) ?></td>
        <td><?= $trx->getJumlah() ?></td>
        <td>Rp<?= $trx->getTotalHarga() ?></td>
        <td>
            <!-- Form Delete -->
            <form method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus transaksi ini?');">
                <input type="hidden" name="action" value="delete_transaksi">
                <input type="hidden" name="id_transaksi" value="<?= $trx->getId() ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </table>



</body>

</html>