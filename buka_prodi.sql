-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 04:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buka_prodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_evaluasi`
--

CREATE TABLE `data_evaluasi` (
  `id_pengusul` int(11) NOT NULL,
  `hasil_eval` varchar(255) NOT NULL,
  `hasil_eval_final` varchar(255) NOT NULL,
  `status_proposal` varchar(20) NOT NULL,
  `status_lampiran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_evaluasi`
--

INSERT INTO `data_evaluasi` (`id_pengusul`, `hasil_eval`, `hasil_eval_final`, `status_proposal`, `status_lampiran`) VALUES
(871, 'KKM Kelas 1 Sm 1 TP. 2018-2019 - gurujumi.blogspot.com.docx', 'KKM Kelas 1 Sm 1 TP. 2018-2019 - gurujumi.blogspot.com.docx', 'proses', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `data_input`
--

CREATE TABLE `data_input` (
  `id_pengusul` int(11) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `lampiran` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_input`
--

INSERT INTO `data_input` (`id_pengusul`, `jenjang`, `nama`, `proposal`, `lampiran`, `tanggal`, `status`) VALUES
(871, 'S1', 'Informatika', 'proposal-S1-Informatika.pdf', '3_ktp_kepala_12.pdf,1508107010042.pdf,1508107010008.pdf', '2018-10-21', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `nohp`) VALUES
('12', 'Aisyah', '098765432'),
('123', 'Ahmad', '765'),
('12300', 'Nia', '876'),
('1234567894', 'ama', '123'),
('1234567895', 'alia', '123'),
('12363', 'Aminah', '0976'),
('12373', 'Siti', '8766'),
('12375', 'Carles', '09876'),
('1414', 'Nura', '08123'),
('1508107010022', 'Nur Amalia Putri', '081212121212'),
('1515', 'putri', '08123'),
('1616', 'amalia', '123'),
('1717', 'nur', '123');

-- --------------------------------------------------------

--
-- Table structure for table `evaluator`
--

CREATE TABLE `evaluator` (
  `id_pengusul` int(11) NOT NULL,
  `nip_evaluator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluator`
--

INSERT INTO `evaluator` (`id_pengusul`, `nip_evaluator`) VALUES
(871, '1414');

-- --------------------------------------------------------

--
-- Table structure for table `file_lampiran`
--

CREATE TABLE `file_lampiran` (
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_lampiran`
--

INSERT INTO `file_lampiran` (`id_file`, `nama_file`, `file`) VALUES
(3, 'prodi', 'prodi.pdf'),
(4, 'Panduan penggunaan', 'panduan_penggunaan.pdf'),
(5, 'Panduan persayaratan dan prosedur', 'panduan_persyaratan_dan_prosedur.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `jenis` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`jenis`, `jenjang`) VALUES
('SARJANA', 'S1'),
('MAGISTER', 'S2'),
('DOKTOR', 'S3'),
('DIPLOMA III', 'D3'),
('PROFESI', 'profesi'),
('SPESIALIS', 'spesialis');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_status`
--

CREATE TABLE `rekap_status` (
  `id_pengusul` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_status`
--

INSERT INTO `rekap_status` (`id_pengusul`, `tanggal`, `status`) VALUES
(871, '2018-10-21', 'Unggah proposal'),
(871, '2018-10-21', 'Unggah lampiran'),
(871, '2018-10-21', 'Hasil evaluasi diterima'),
(871, '2018-10-21', 'Unggah ulang lampiran'),
(871, '2018-10-21', 'Siap diajukan'),
(871, '2018-10-21', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip_user` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip_user`, `email`, `pass`, `level_user`) VALUES
(5, '123', '', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(862, '123456', '123456@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'pengusul'),
(866, '12', '', '827ccb0eea8a706c4c34a16891f84e7b', 'reviewer'),
(867, '1414', '', '827ccb0eea8a706c4c34a16891f84e7b', 'evaluator'),
(868, '1515', '', '827ccb0eea8a706c4c34a16891f84e7b', 'evaluator'),
(869, '1616', '', '827ccb0eea8a706c4c34a16891f84e7b', 'evaluator'),
(870, '1717', '', '827ccb0eea8a706c4c34a16891f84e7b', 'evaluator'),
(871, '1508107010022', 'nuraa@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 'pengusul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_evaluasi`
--
ALTER TABLE `data_evaluasi`
  ADD KEY `id_pengusul` (`id_pengusul`);

--
-- Indexes for table `data_input`
--
ALTER TABLE `data_input`
  ADD KEY `id_pengusul` (`id_pengusul`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD KEY `id_pengusul` (`id_pengusul`);

--
-- Indexes for table `file_lampiran`
--
ALTER TABLE `file_lampiran`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `rekap_status`
--
ALTER TABLE `rekap_status`
  ADD KEY `id_pengusul` (`id_pengusul`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_lampiran`
--
ALTER TABLE `file_lampiran`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_evaluasi`
--
ALTER TABLE `data_evaluasi`
  ADD CONSTRAINT `data_evaluasi_ibfk_1` FOREIGN KEY (`id_pengusul`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `data_input`
--
ALTER TABLE `data_input`
  ADD CONSTRAINT `data_input_ibfk_1` FOREIGN KEY (`id_pengusul`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD CONSTRAINT `evaluator_ibfk_1` FOREIGN KEY (`id_pengusul`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `rekap_status`
--
ALTER TABLE `rekap_status`
  ADD CONSTRAINT `rekap_status_ibfk_1` FOREIGN KEY (`id_pengusul`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
