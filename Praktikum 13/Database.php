<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'db_praktik';
    private $username = 'root';
    private $password = '';
    public $conn; // Properti untuk menyimpan objek koneksi

    // Method untuk mendapatkan koneksi database
    public function getConnection() {
        $this->conn = null; // Set koneksi ke null dulu

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
            // (Opsional) Set character set
            // $this->conn->set_charset("utf8");
        } catch (Exception $e) {
            // Handle error koneksi, misalnya dengan menampilkan pesan atau logging
            // Untuk produksi, jangan die() dengan pesan error teknis
            die("Error Koneksi Database: " . $e->getMessage());
        }
        return $this->conn;
    }

    // Method untuk menutup koneksi (opsional, karena PHP otomatis menutup saat script selesai)
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>