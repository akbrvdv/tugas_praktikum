<?php

class buah2 {
    public $nama;
    public $warna;
    public $bobot;

    function set_name($n) {
        $this->nama = $n;
    }

    public function set_color($n) {
        $this->warna = $n;
    } 

    function set_weight($n) {
        $this->bobot = $n;
    }
}

$mango = new buah2();
$mango->set_name('Mango');
$mango->set_color('Yellow');
$mango->set_weight('300');