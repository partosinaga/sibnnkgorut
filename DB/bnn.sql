-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Okt 2019 pada 07.57
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_log`
--

CREATE TABLE `app_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `log_subject` varchar(255) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_log`
--

INSERT INTO `app_log` (`id`, `user_id`, `log_subject`, `log_date`, `remark`) VALUES
(1, 1, 'LOGIN', '2019-06-01 09:45:29', ''),
(2, 1, 'LOGIN', '2019-06-01 10:17:55', ''),
(3, 1, 'LOGIN', '2019-06-01 10:25:56', ''),
(4, 1, 'LOGIN', '2019-06-01 10:27:44', ''),
(5, 1, 'LOGIN', '2019-06-01 10:30:01', ''),
(6, 1, 'LOGIN', '2019-06-01 10:38:16', ''),
(7, 1, 'LOGIN', '2019-06-01 10:53:22', ''),
(8, 1, 'LOGIN', '2019-06-01 12:03:48', ''),
(9, 1, 'LOGIN', '2019-06-01 17:31:39', ''),
(10, 1, 'LOGIN', '2019-06-01 18:38:07', ''),
(11, 1, 'LOGIN', '2019-06-02 06:33:54', ''),
(12, 1, 'LOGIN', '2019-06-02 09:17:19', ''),
(13, 1, 'LOGIN', '2019-06-02 12:40:03', ''),
(14, 1, 'LOGIN', '2019-06-03 03:03:45', ''),
(15, 1, 'LOGIN', '2019-06-03 04:03:49', ''),
(16, 1, 'LOGIN', '2019-06-03 04:57:23', ''),
(17, 1, 'LOGIN', '2019-06-03 06:05:47', ''),
(18, 1, 'LOGIN', '2019-06-03 16:34:16', ''),
(19, 1, 'LOGIN', '2019-06-04 03:08:58', ''),
(20, 1, 'LOGIN', '2019-06-04 10:41:40', ''),
(21, 1, 'LOGIN', '2019-06-04 13:43:28', ''),
(22, 1, 'LOGIN', '2019-06-05 06:54:47', ''),
(23, 1, 'LOGIN', '2019-06-05 15:37:51', ''),
(24, 1, 'LOGIN', '2019-06-05 17:53:23', ''),
(25, 1, 'LOGIN', '2019-06-05 18:04:21', ''),
(26, 1, 'LOGIN', '2019-06-05 18:05:06', ''),
(27, 1, 'LOGIN', '2019-06-06 09:25:24', ''),
(28, 2, 'LOGIN', '2019-06-06 09:52:28', ''),
(29, 1, 'LOGIN', '2019-06-06 09:53:55', ''),
(30, 2, 'LOGIN', '2019-06-06 10:51:32', ''),
(31, 1, 'LOGIN', '2019-06-06 11:01:18', ''),
(32, 2, 'LOGIN', '2019-06-06 11:01:57', ''),
(33, 1, 'LOGIN', '2019-06-06 11:27:08', ''),
(34, 2, 'LOGIN', '2019-06-06 11:27:48', ''),
(35, 1, 'LOGIN', '2019-06-06 11:31:50', ''),
(36, 1, 'LOGIN', '2019-06-07 10:30:21', ''),
(37, 2, 'LOGIN', '2019-06-07 11:52:46', ''),
(38, 1, 'LOGIN', '2019-06-07 11:53:04', ''),
(39, 1, 'LOGIN', '2019-06-07 12:07:11', ''),
(40, 1, 'LOGIN', '2019-06-07 17:10:03', ''),
(41, 1, 'LOGIN', '2019-06-07 17:29:43', ''),
(42, 1, 'LOGIN', '2019-06-08 04:45:33', ''),
(43, 2, 'LOGIN', '2019-06-08 04:58:52', ''),
(44, 2, 'LOGIN', '2019-06-08 05:16:54', ''),
(45, 2, 'LOGIN', '2019-06-08 05:21:17', ''),
(46, 2, 'LOGIN', '2019-06-08 05:40:13', ''),
(47, 2, 'LOGIN', '2019-06-08 05:40:50', ''),
(48, 1, 'LOGIN', '2019-06-08 10:04:39', ''),
(49, 1, 'LOGIN', '2019-06-08 10:50:22', ''),
(50, 1, 'LOGIN', '2019-06-08 17:46:26', ''),
(51, 1, 'LOGIN', '2019-06-08 19:51:22', ''),
(52, 1, 'LOGIN', '2019-06-10 14:15:23', ''),
(53, 1, 'LOGIN', '2019-06-11 14:31:05', ''),
(54, 1, 'LOGIN', '2019-08-04 08:52:26', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_notification`
--

CREATE TABLE `email_notification` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_by` int(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `email_notification`
--

INSERT INTO `email_notification` (`id`, `email`, `created_by`, `date_created`) VALUES
(7, 'partosinaga1@gmail.com', 1, '2019-06-01 18:58:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `idPengaduan` int(255) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `idPengaduan`, `file_name`, `uploaded_on`, `status`) VALUES
(48, 8, '8_31052019.jpeg', '2019-05-31 19:09:41', '1'),
(49, 8, '8_310520191.jpeg', '2019-05-31 19:09:41', '1'),
(50, 8, '8_310520192.jpeg', '2019-05-31 19:09:41', '1'),
(51, 9, '9_01062019.png', '2019-06-01 08:37:35', '1'),
(52, 9, '9_010620191.png', '2019-06-01 08:37:35', '1'),
(53, 10, '10_01062019.png', '2019-06-01 12:02:29', '1'),
(54, 10, '10_01062019.jpeg', '2019-06-01 12:02:29', '1'),
(55, 10, '10_010620191.jpeg', '2019-06-01 12:02:29', '1'),
(56, 11, '11_02062019.png', '2019-06-02 08:25:08', '1'),
(58, 13, '13_02062019.jpeg', '2019-06-02 09:15:08', '1'),
(59, 13, '13_020620191.jpeg', '2019-06-02 09:15:08', '1'),
(60, 13, '13_020620192.jpeg', '2019-06-02 09:15:08', '1'),
(61, 14, '14_02062019.jpg', '2019-06-02 09:16:40', '1'),
(62, 15, '15_02062019.png', '2019-06-02 11:19:09', '1'),
(63, 15, '15_02062019.jpg', '2019-06-02 11:19:09', '1'),
(64, 15, '15_020620191.jpg', '2019-06-02 11:19:09', '1'),
(65, 15, '15_020620191.png', '2019-06-02 11:19:09', '1'),
(66, 15, '15_020620192.png', '2019-06-02 11:19:09', '1'),
(67, 15, '15_020620193.png', '2019-06-02 11:19:09', '1'),
(68, 15, '15_02062019.jpeg', '2019-06-02 11:19:09', '1'),
(69, 15, '15_020620191.jpeg', '2019-06-02 11:19:09', '1'),
(70, 15, '15_020620192.jpeg', '2019-06-02 11:19:09', '1'),
(71, 16, '16_03062019.jpg', '2019-06-03 06:07:56', '1'),
(72, 16, '16_03062019.png', '2019-06-03 06:07:56', '1'),
(73, 17, '17_07062019.PNG', '2019-06-07 12:12:26', '1'),
(74, 17, '17_070620191.PNG', '2019-06-07 12:12:26', '1'),
(75, 17, '17_070620192.png', '2019-06-07 12:12:26', '1'),
(76, 17, '17_070620193.png', '2019-06-07 12:12:26', '1'),
(80, 22, '22_08062019.png', '2019-06-08 19:26:28', '1'),
(81, 23, '23_08062019.png', '2019-06-08 19:29:10', '1'),
(82, 24, '24_08062019.png', '2019-06-08 19:34:06', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `laporan` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `tanggal`, `nama`, `ttl`, `alamat`, `pekerjaan`, `agama`, `nohp`, `email`, `laporan`) VALUES
(8, '2019-06-02 22:14:55', 'parto hartono sinaga', 'parapat, 26 juni 1996', 'jl sumbangsih v no.2', 'karyawan swasta', 'katolik', '085358399879', 'parto@sinaga.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. N'),
(9, '2019-06-02 02:14:48', 'eko putra sinaga', 'Medan, 26 mei 1995', 'JL.Langkat paling dalam', 'karyawan', 'islam', '085785699974', 'e@ko.sinaga', 'berikut ini uraian penjelasan aduan'),
(10, '2019-06-03 01:14:53', 'test nama', 'Jakarta, 26 Juni 1996', 'dummy address', 'dummy work', 'katolik', '0853568744458', 'asdf@hjkl.cc', 'dummy uraian'),
(11, '2019-06-02 20:14:38', 'parto hartono sinaga', 'Jakarta, 26 juni 1996', 'Jl.sumbangsih v no. 1', 'Karyawan swasta', 'katolik', '085358399879', 'partosinaga1@gmail.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(13, '2019-06-02 09:15:08', 'hotman paris', 'medan 10 mei 1988', 'permata hijau', 'lawyer', 'kristen', '085655877785', 'hotman@paris.cc', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(14, '2019-06-02 09:16:40', 'test nana', 'jakarta 25 juni 1995', 'test alamat', 'karyawan', 'islam', '085355877785', 'test@email.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(15, '2019-06-25 11:19:09', 'test', 'test 20 mei 1990', 'test', 'test', 'islam', '09876678866', 'test@mail', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n'),
(16, '2019-06-03 06:07:56', 'sinaga hartono parto', 'parapat, 26 juni 1996', 'jalan sisingamangaraja atas, aprapat', 'karyawan', 'katolik', '085358399879', 'parto@sinaga.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean\r\nmassa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec\r\nquam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec\r\npede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a,\r\nvenenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.\r\nVivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,\r\nconsequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.\r\nPhasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi\r\nvel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus\r\neget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.'),
(17, '2019-06-07 12:12:26', 'New users', 'emdan, 29 mei 1990', 'jalan silayang pandang', 'mahasiswa', 'islam', '08136555899965', 'new@user.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(22, '2019-06-08 19:26:28', 'nama', 'tempat medan 29 mei 1778', 'medan', 'nganggur', 'islam', '085165887455', 'e@mail.com', 'test '),
(23, '2019-06-08 19:29:10', 'test', 'teset jakarta 21 mei 1996', 'jakarta selatabn', 'kerja aja', 'kristen', '0821547855445', 'e@mail', 'test'),
(24, '2019-06-08 19:34:06', 'test', 'etst', 'alamamt', 'kerjr', 'islam', '08548554', 'e@mail', 'test '),
(25, '2019-06-08 19:36:43', 'sdf', 'sdf', 'sdf', 'sdf', 'katolik', '324', 'sdf@sdf', 'sdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peta_rawan`
--

CREATE TABLE `peta_rawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `keterangan` varchar(550) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(550) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `latitude` decimal(18,15) DEFAULT NULL,
  `longitude` decimal(18,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peta_rawan`
--

INSERT INTO `peta_rawan` (`id`, `nama`, `tgl_lahir`, `keterangan`, `foto`, `alamat`, `nik`, `agama`, `pekerjaan`, `jkel`, `kecamatan`, `latitude`, `longitude`) VALUES
(14, 'dummy', '2019-06-30', 'keterangan goes here', 'dummy1.png', 'alamat goes here', '001122334455', 'katolik', 'siswa', 'laki-laki', 'Biau', '0.792684171466249', '122.863329775695090'),
(15, 'dummy 2', '2019-06-19', 'keterangan dummy', 'dummy_2.jpg', 'alamat dummy', '998877445566', 'islam', 'PNS', 'Perempuan', 'Ponelo Kepulauan', '0.788048862150475', '122.869242556165790');

-- --------------------------------------------------------

--
-- Struktur dari tabel `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `useraccount`
--

INSERT INTO `useraccount` (`id`, `fullname`, `email`, `nohp`, `address`, `username`, `password`, `role`, `status`) VALUES
(1, 'super user', 'partosinaga1@gmail.com', '05358399879', 'Jl.Sumbangsih V', 'su', 'su123', 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_log`
--
ALTER TABLE `app_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_notification`
--
ALTER TABLE `email_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peta_rawan`
--
ALTER TABLE `peta_rawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_log`
--
ALTER TABLE `app_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `email_notification`
--
ALTER TABLE `email_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `peta_rawan`
--
ALTER TABLE `peta_rawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
