<?php
session_start();

class TokoElektronik {
    // Property private untuk simpan daftar produk
    private $daftar_produk;

    // Konstruktor
    public function __construct() {
        if (!isset($_SESSION['daftar_produk'])) {
            $_SESSION['daftar_produk'] = [];
        }
        // Simpan referensi session ke property
        $this->daftar_produk = &$_SESSION['daftar_produk'];
    }

    // Mencari produk berdasarkan ID
    private function cariProduk($id, &$idx) {
        foreach ($this->daftar_produk as $i => $produk) {
            if ($produk['id'] == $id) {
                $idx = $i;
                return true;
            }
        }
        $idx = -1;
        return false;
    }

    // Menambahkan produk baru
    public function tambahProduk($id, $nama, $harga, $stok, $gambar) {
        $this->daftar_produk[] = [
            'id'    => $id,
            'nama'  => $nama,
            'harga' => $harga,
            'stok'  => $stok,
            'gambar'=> $gambar
        ];
    }

    // Mengambil semua produk
    public function getProduk() {
        return $this->daftar_produk;
    }

    // Update produk
    public function updateProduk($id, $nama, $harga, $stok, $gambar) {
        $idx = -1;
        if ($this->cariProduk($id, $idx)) {
            $this->daftar_produk[$idx]['nama']  = $nama;
            $this->daftar_produk[$idx]['harga'] = $harga;
            $this->daftar_produk[$idx]['stok']  = $stok;
            if ($gambar) {
                $this->daftar_produk[$idx]['gambar'] = $gambar;
            }
            return true;
        }
        return false;
    }

    // Hapus produk
    public function hapusProduk($id) {
        $idx = -1;
        if ($this->cariProduk($id, $idx)) {
            array_splice($this->daftar_produk, $idx, 1);
            return true;
        }
        return false;
    }

    // Cari produk berdasarkan nama
    public function cariProdukByNama($keyword) {
        // menggunakan metode array filter welllll
        return array_values(array_filter($this->daftar_produk, function ($produk) use ($keyword) {
            return stripos($produk['nama'], $keyword) !== false;
        }));
    }

    // Ambil produk berdasarkan ID
    public function getProdukById($id) {
        $idx = -1;
        if ($this->cariProduk($id, $idx)) {
            return $this->daftar_produk[$idx];
        }
        return null;
    }
}
?>
