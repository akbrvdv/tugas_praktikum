<?php
class akunBank {
    protected $accountNumber;
    protected $jmlUang;
    protected $name;

    public function __construct($nomorAkun, $nominal) {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang = $nominal;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        return $this->name = $name;
    }

    public function tambahUang($jumlah) {
        $this->jmlUang += $jumlah;
    }

    public function kurangUang($jumlah) {
        if ($jumlah > $this->jmlUang) {
            echo "Saldo tidak cukup untuk dikurangi.\n";
        } else {
            $this->jmlUang -= $jumlah;
        }
    }
    
    public function getJumlahUang() {
        return $this->jmlUang;
    }

    public function hitungPajak() {
        return $this->jmlUang * 0.11;
    }
}


