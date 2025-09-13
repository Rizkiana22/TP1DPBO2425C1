<?php
class Pembeli {
    // atribut
    private $id;
    private $nama;
    private $alamat;
    private $telp;
    private $gambar;

    // constructor
    public function __construct($id, $nama, $alamat, $telp, $gambar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->telp = $telp;
        $this->gambar = $gambar;
    }

    // GETTER
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getAlamat() { return $this->alamat; }
    public function getTelp() { return $this->telp; }
    public function getGambar() { return $this->gambar; }

    // SETTER
    public function setNama($nama) { $this->nama = $nama; }
    public function setAlamat($alamat) { $this->alamat = $alamat; }
    public function setTelp($telp) { $this->telp = $telp; }
    public function setGambar($gambar) { $this->gambar = $gambar; }
}
