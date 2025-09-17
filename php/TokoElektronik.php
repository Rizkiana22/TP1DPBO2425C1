<?php
// membuat class
class TokoElektronik {
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $gambar;

    private $daftarProduk = []; // array untuk menyimpan class

    // constructor
    public function __construct($id = null, $nama = null, $harga = null, $stok = null, $gambar = null) {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->gambar = $gambar;
    }

    // ===== getter =====
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getHarga() { return $this->harga; }
    public function getStok() { return $this->stok; }
    public function getGambar() { return $this->gambar; }

    // ===== setter =====
    public function setId($id) { $this->id = $id; }
    public function setNama($nama) { $this->nama = $nama; }
    public function setHarga($harga) { $this->harga = $harga; }
    public function setStok($stok) { $this->stok = $stok; }
    public function setGambar($gambar) { $this->gambar = $gambar; }

    // === method === //

    // CREATE
    // method untuk menambahkan produk ke array
    public function tambahProduk($id, $nama, $harga, $stok, $gambar) {
        $produk = new TokoElektronik($id, $nama, $harga, $stok, $gambar);
        $this->daftarProduk[] = $produk;
    }

    // READ
    // method untuk menampilkan produk
    public function getProduk() {
        $result = [];
        foreach ($this->daftarProduk as $p) {
            $result[] = [
                'id'     => $p->getId(),
                'nama'   => $p->getNama(),
                'harga'  => $p->getHarga(),
                'stok'   => $p->getStok(),
                'gambar' => $p->getGambar()
            ];
        }
        return $result;
    }

    // SEARCH
    // method untuk mencari produk berdasarkan id
    public function getProdukById($id) {
        foreach ($this->daftarProduk as $p) {
            if ($p->getId() == $id) {
                return [
                    'id'     => $p->getId(),
                    'nama'   => $p->getNama(),
                    'harga'  => $p->getHarga(),
                    'stok'   => $p->getStok(),
                    'gambar' => $p->getGambar()
                ];
            }
        }
        return null;
    }

    // method untuk mencari produk berdasarkan nama
    public function cariProdukByNama($keyword) {
        $result = [];
        foreach ($this->daftarProduk as $p) {
            if (stripos($p->getNama(), $keyword) !== false) {
                $result[] = [
                    'id'     => $p->getId(),
                    'nama'   => $p->getNama(),
                    'harga'  => $p->getHarga(),
                    'stok'   => $p->getStok(),
                    'gambar' => $p->getGambar()
                ];
            }
        }
        return $result;
    }

    // UPDATE
    // method untuk mengubah produk di daftarProduk berdasarkan id
    public function updateProduk($id, $nama, $harga, $stok, $gambar) {
        foreach ($this->daftarProduk as $p) {
            if ($p->getId() == $id) {
                $p->setNama($nama);
                $p->setHarga($harga);
                $p->setStok($stok);
                if (!empty($gambar)) { // hanya update kalau ada upload baru
                    $p->setGambar($gambar);
                }
                return;
            }
        }
    }

    // DELETE
    // method untuk menghapus produk di daftarProduk
    public function hapusProduk($id) {
        foreach ($this->daftarProduk as $i => $p) {
            if ($p->getId() == $id) {
                unset($this->daftarProduk[$i]);
                $this->daftarProduk = array_values($this->daftarProduk);
                return;
            }
        }
    }

    function __destruct(){
    }
}
