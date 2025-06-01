CREATE TABLE t_dosen (
    idDosen INT AUTO_INCREMENT PRIMARY KEY,
    namaDosen VARCHAR(50),
    noHP VARCHAR(25)
);

-- 2. Tabel t_mahasiswa
CREATE TABLE t_mahasiswa (
    npm INT PRIMARY KEY,
    namaMhs VARCHAR(50),
    prodi VARCHAR(25),
    alamat VARCHAR(70),
    noHP VARCHAR(25)
);

-- 3. Tabel t_matakuliah
CREATE TABLE t_matakuliah (
    kodeMK VARCHAR(10) PRIMARY KEY, -- Biasanya kodeMK itu varchar, misal "MK001"
    namaMK VARCHAR(70),
    sks INT,
    jam INT
);kuliahkuliah