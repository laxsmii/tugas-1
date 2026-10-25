<?php

class Buku {
    private $judul;
    private $penulis;
    private $stok;

    public function __construct($judul, $penulis, $stok) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->stok = $stok;
    }

    // getter
    public function getJudul() {
        return $this->judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function getStok() {
        return $this->stok;
    }

    // setter
    public function setStok($stok) {
        $this->stok = $stok;
    }

    public function tampilkanInfo() {
        echo "Judul: " . $this->judul . "<br>";
        echo "Penulis: " . $this->penulis . "<br>";
        echo "Stok: " . $this->stok . "<br>";
    }
}

class Anggota {
    private $nama;
    private $idAnggota;

    public function __construct($nama, $idAnggota) {
        $this->nama = $nama;
        $this->idAnggota = $idAnggota;
    }

    // getter
    public function getNama() {
        return $this->nama;
    }

    public function getIdAnggota() {
        return $this->idAnggota;
    }

    public function tampilkanInfo() {
        echo "Nama: " . $this->nama . "<br>";
        echo "ID Anggota: " . $this->idAnggota . "<br>";
    }
}

class Peminjaman {
    private $anggota;
    private $buku;
    private $tanggalPinjam;

    public function __construct($anggota, $buku, $tanggalPinjam) {
        $this->anggota = $anggota;
        $this->buku = $buku;
        $this->tanggalPinjam = $tanggalPinjam;
    }

    public function prosesPinjam() {
        if ($this->buku->getStok() > 0) {
            $this->buku->setStok($this->buku->getStok() - 1);
            echo $this->anggota->getNama() . " berhasil meminjam buku \"" . $this->buku->getJudul() . "\" pada " . $this->tanggalPinjam . ".<br>";
        } else {
            echo "Maaf, stok buku \"" . $this->buku->getJudul() . "\" habis.<br>";
        }
    }
}

// object
$buku1 = new Buku("Laut Bercerita", "Leila S. Chudori", 4);
$anggota1 = new Anggota("Ilasera", "A001");

echo "<b>Data Buku</b><br>";
$buku1->tampilkanInfo();

echo "<br><b>Data Anggota</b><br>";
$anggota1->tampilkanInfo();

echo "<br><b>Proses Peminjaman</b><br>";
$pinjam1 = new Peminjaman($anggota1, $buku1, "01-10-2026");
$pinjam1->prosesPinjam();

echo "<br><b>Data Buku Setelah Dipinjam</b><br>";
$buku1->tampilkanInfo();
