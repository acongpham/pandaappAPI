-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2019 lúc 11:19 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pandaapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `AccountId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `idShop` int(11) DEFAULT NULL,
  `usename` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `accountStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`AccountId`, `roleId`, `idShop`, `usename`, `password`, `name`, `phone_number`, `address`, `gender`, `email`, `DateOfBirth`, `accountStatus`) VALUES
(7, 1, NULL, 'congphambtc', '123456', 'Phạm Công', '097255555', 'Mĩ ĐÌnh Hà Nội', 1, 'congphambtc@gmail.com', '1992-11-09', 1),
(8, 2, 1, 'tunguyen', '12345678', 'Tứ Nguyễn', '0123456789', 'La Hiên, Thái Nguyên', 1, 'tunguyen@gmail.com', '1998-10-20', 1),
(9, 1, NULL, 'hienvu', '12345678', 'Hiền Vũ', '098623525', 'Thái Bình', 0, 'hienmini@gmail.com', '1992-11-09', 1),
(10, 1, NULL, 'nguyenvandoan', '12345678', 'Nguyễn Văn Đoàn', '09125555', 'Đồng Nai', 1, 'nguyenvandoan@gmail.com', '1990-01-12', 1),
(141, 2, 141, 'tunguyen1', '12345678', 'á', 'hjkhgj', 'gfjdhjkh', 0, '', '0000-00-00', 1),
(142, 1, 142, 'tunguyen2', '12345678', 'Tứ Nguyễn', '0972565321', 'La Hiên Thái Nguyên', 1, 'congphambtc@gmail.com', '1998-11-12', 1),
(143, 1, 143, 'tunguyen3', '12345678', 's', 'fdsb', 'hsdkjhj', 0, '', '0000-00-00', 1),
(144, 1, NULL, 'txtusername', 'txtpassword', 'txtnamefull', 'xtphone', 'txtaddress', 1, 'txtemail', '0000-00-00', 1),
(145, 1, 144, 'tunguyen5', '12345678', 'sdfjkjn', 'klgdjfklj', 'kljgkl', 0, '', '0000-00-00', 1),
(147, 2, 146, 'tunguyen6', '123', 'tu nguyen', 'gvsdfsd', 'dáhgf', 0, '', '0000-00-00', 1),
(149, 1, 148, 'tunguyen9', '123', 'dfsfgds', '423423', '54645', 0, '', '0000-00-00', 1),
(150, 2, 149, 'tunguyen10', '123', 'dfsfgds', '423423', '54645', 0, '', '0000-00-00', 1),
(151, 2, 150, 'tunguyen11', '123', 'dfsfgds', '423423', '54645', 0, '', '0000-00-00', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountId`),
  ADD UNIQUE KEY `usename` (`usename`),
  ADD KEY `idShop` (`idShop`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`idShop`) REFERENCES `shop` (`idShop`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `role` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
