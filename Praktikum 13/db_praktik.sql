CREATE DATABASE IF NOT EXISTS db_praktik; -- Sesuai contoh di modul
USE db_praktik;

CREATE TABLE t_dosen (
    idDosen INT AUTO_INCREMENT PRIMARY KEY,
    namaDosen VARCHAR(50),
    noHP VARCHAR(25)
);

CREATE TABLE t_mahasiswa (
    npm INT PRIMARY KEY,
    namaMhs VARCHAR(50),
    prodi VARCHAR(25),
    alamat VARCHAR(70),
    noHP VARCHAR(25)
);

CREATE TABLE t_matakuliah (
    kodeMK VARCHAR(10) PRIMARY KEY, -- Mengubah ke VARCHAR sesuai umum
    namaMK VARCHAR(70),
    sks INT,
    jam INT -- Field jam ditambahkan berdasarkan modul 11
);db_praktik