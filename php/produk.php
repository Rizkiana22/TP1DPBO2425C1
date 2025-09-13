<?php
class Produk {
    // atribut
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $gambar;

    // constructor
    public function __construct($id, $nama, $harga, $stok, $gambar = "") {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->gambar = $gambar;
    }

    // GETTER
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getHarga() { return $this->harga; }
    public function getStok() { return $this->stok; }
    public function getGambar() { return $this->gambar; }

    // SETTER
    public function setNama($nama) { $this->nama = $nama; }
    public function setHarga($harga) { $this->harga = $harga; }
    public function setStok($stok) { $this->stok = $stok; }
    public function setGambar($gambar) { $this->gambar = $gambar; }
}
