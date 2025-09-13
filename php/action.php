<?php
session_start(); // Memulai session untuk menyimpan data toko
require_once 'Toko.php'; // Memuat kelas Toko, Produk, Pembeli

$toko = isset($_SESSION['toko']) ? unserialize($_SESSION['toko']) : new Toko(); // Ambil data toko dari session atau buat baru

// ===== Produk =====
// jika form tambah produk disubmit
if (isset($_POST['tambah_produk'])) {
    $id = count($toko->getDaftarProduk()) + 1;
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = '';

    if (!empty($_FILES['gambar']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $gambar = $uploadDir . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }

    $toko->tambahProduk(new Produk($id, $nama, $harga, $stok, $gambar));
}

// jika hapus produk
if (isset($_GET['hapus_produk'])) {
    $toko->hapusProduk(intval($_GET['hapus_produk']));
}

// jika form update produk disubmit
if (isset($_POST['update_produk'])) {
    $id = $_POST['id_produk'];
    if (!empty($_FILES['gambar']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $gambar = $uploadDir . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    } else {
        $gambar = ''; // atau biarin kosong kalau gak update gambar
    }
    $toko->updateProduk($id, $_POST['nama_produk'], $_POST['harga'], $_POST['stok'], $gambar);
}

// ===== Pembeli =====
// jika form tambah pembeli disubmit
if (isset($_POST['tambah_pembeli'])) {
    $id = count($toko->getDaftarPembeli()) + 1;

    $gambar = '';
    if (!empty($_FILES['gambar']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $gambar = $uploadDir . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }

    $toko->tambahPembeli(new Pembeli($id, $_POST['nama_pembeli'], $_POST['alamat'], $_POST['telp'], $gambar));
}

// jika hapus pembeli
if (isset($_GET['hapus_pembeli'])) {
    $toko->hapusPembeli(intval($_GET['hapus_pembeli']));
}

// jika form update pembeli disubmit
if (isset($_POST['update_pembeli'])) {
    $id = $_POST['id_pembeli'];
    if (!empty($_FILES['gambar']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $gambar = $uploadDir . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }else{
        $gambar = ''; // atau biarin kosong kalau gak update gambar
    }

    $toko->updatePembeli($id, $_POST['nama_pembeli'], $_POST['alamat'], $_POST['telp'], $gambar);
}

// ===== TRANSAKSI =====
if (isset($_POST['tambah_transaksi'])) {
    $id = count($toko->getDaftarTransaksi()) + 1;
    $id_produk = $_POST['id_produk'];
    $id_pembeli = $_POST['id_pembeli'];
    $jumlah = intval($_POST['jumlah']);

    $produk = null;
    foreach ($toko->getDaftarProduk() as $p) {
        if ($p->getId() == $id_produk) {
            $produk = $p;
            break;
        }
    }

    $pembeli = null;
    foreach ($toko->getDaftarPembeli() as $b) {
        if ($b->getId() == $id_pembeli) {
            $pembeli = $b;
            break;
        }
    }

    if ($produk && $pembeli && $jumlah > 0 && $jumlah <= $produk->getStok()) {
        $trx = new Transaksi($id, $produk, $pembeli, $jumlah);
        $toko->tambahTransaksi($trx);
        $produk->setStok($produk->getStok() - $jumlah);
    }
}

if (isset($_GET['hapus_transaksi'])) {
    $toko->hapusTransaksi(intval($_GET['hapus_transaksi']));
}

if (isset($_POST['update_transaksi'])) {
    $id = $_POST['id_transaksi'];
    $jumlah = intval($_POST['jumlah']);

    foreach ($toko->getDaftarTransaksi() as $trx) {
        if ($trx->getId() == $id) {
            $produk = $trx->getProduk();
            // balikin stok lama
            $produk->setStok($produk->getStok() + $trx->getJumlah());

            if ($jumlah > 0 && $jumlah <= $produk->getStok()) {
                $trx->setJumlah($jumlah);
                $trx->hitungTotal();
                $produk->setStok($produk->getStok() - $jumlah);
            }
            break;
        }
    }
}

// Simpan ke session
$_SESSION['toko'] = serialize($toko);

// Balik ke index
header("Location: index.php");
exit;
