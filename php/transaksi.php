<?php
class Transaksi {
    private $id;
    private $produk;
    private $pembeli;
    private $jumlah;
    private $totalHarga;

    public function __construct($id, Produk $produk, Pembeli $pembeli, $jumlah) {
        $this->id = $id;
        $this->produk = $produk;
        $this->pembeli = $pembeli;
        $this->jumlah = $jumlah;
        $this->totalHarga = $produk->getHarga() * $jumlah;
    }
    
    // SETTER
    public function setProduk(Produk $produk) { $this->produk = $produk; }
    public function setPembeli(Pembeli $pembeli) { $this->pembeli = $pembeli; }
    public function setJumlah($jumlah) { 
        $this->jumlah = $jumlah; 
        $this->totalHarga = $this->produk->getHarga() * $jumlah; // update total harga
    }
    public function setTotalHarga($totalHarga) { $this->totalHarga = $totalHarga; }

    // GETTER
    public function getId() { return $this->id; }
    public function getProduk() { return $this->produk; }
    public function getPembeli() { return $this->pembeli; }
    public function getJumlah() { return $this->jumlah; }
    public function getTotalHarga() { return $this->totalHarga; }
}
