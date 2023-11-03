CREATE DATABASE IF NOT EXISTS `pendaftaran_siswa`
USE pendaftaran_siswa;

CREATE TABLE IF NOT EXISTS calon_siswa (
    id INT NOT NULL AUTO_INCREMENT,  
    nama VARCHAR(64) NOT NULL,  
    alamat VARCHAR(255) NOT NULL,  
    jenis_kelamin VARCHAR(16) NOT NULL,  
    agama VARCHAR(16) NOT NULL,  
    sekolah_asal VARCHAR(64) NOT NULL,    
    PRIMARY KEY (id)
);

-- seed one data for example
INSERT INTO `calon_siswa` (`nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES ('Eko', 'Jl. Sudirman 123', 'Laki-laki', 'Islam', 'SDN 01 Bandung');
