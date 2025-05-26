<?php

require_once 'Manusia.php';
class Mahasiswa extends Manusia {
    protected $nim;
    protected $jurusan;
    protected $kelas;

    public function __construct($name) {
        $this->setName($name);
    }

    public function getNIM() {
        return $this->nim;
    }

    public function setNIM($nim) {
        return $this->nim = $nim;
    }

    public function getJurusan() {
        return $this->jurusan;
    }

    public function setJurusan($jurusan) {
        return $this->jurusan = $jurusan;
    }

    public function getKelas() {
        return $this->kelas;
    }

    public function setKelas($kelas) {
        return $this->kelas = $kelas;
    }
}