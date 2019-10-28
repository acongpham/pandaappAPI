-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2019 lúc 11:24 AM
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

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkcart` (`p_proid` INT, `p_accid` INT)  BEGIN
        IF(
            EXISTS(
            SELECT
                *
            FROM
                cart_item
            WHERE
                productId = p_proid AND AccountId = p_accid
        )
        ) THEN
    UPDATE
        cart_item
    SET
        productId = p_proid,
        AccountId = p_accid,
        amount = amount +1
    WHERE
        productId = p_proid AND AccountId = p_accid; ELSE
    INSERT INTO cart_item
VALUES(p_proid, p_accid, 1);
    END IF;
END$$

DELIMITER ;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `useName` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `thumbnailCate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`idcategory`, `categoryName`, `thumbnailCate`) VALUES
(1, 'Áo khoác nam', 'image/Cate/aokhoacnam.png'),
(2, 'Áo thun nam', 'image/Cate/aothunnam.png'),
(7, 'Sơ mi nam', 'image/Cate/sominam.png'),
(8, 'Quần Jean nam', 'image/Cate/quanjean.png'),
(9, 'Quần Âu', 'image/Cate/quanau.png'),
(10, 'Áo nỉ', 'image/Cate/aoni.png'),
(11, 'Đầm nữ', 'image/Cate/damnu.png'),
(12, 'Sơ mi nữ', 'image/Cate/sominu.png'),
(13, 'Áo thun nữ', 'image/Cate/thunnu.png'),
(14, 'Giày tây', 'image/Cate/giaytaynam.png'),
(15, 'Giày Sneakers', 'image/Cate/giaysneakernam.png'),
(16, 'Phụ kiện nam', 'image/Cate/thatlungnam.png'),
(17, 'Phụ kiện nữ', 'image/Cate/phukiennu.png'),
(18, 'Đồ lót nam', 'image/Cate/dolotnam.png'),
(19, 'Đồ lót nữ', 'image/Cate/quanlotnu.png'),
(20, 'Quần sooc', 'image/Cate/quansooc.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `productId` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`productId`, `AccountId`) VALUES
(2, 7),
(2, 10),
(3, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`imageId`, `image`, `productId`) VALUES
(1, 'https://cf.shopee.vn/file/a9f72330dfcf65524569077d3235ee24', 2),
(2, 'https://cf.shopee.vn/file/e737ca45ca45087a1d7945a918e1f726', 2),
(5, 'https://vn-test-11.slatic.net/p/462ffb484cf95536520ff9d066fcacba.jpg', 1),
(6, 'https://salt.tikicdn.com/cache/550x550/ts/product/e3/0e/71/4983adc38421996d30b09ce39b63f6da.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `oderId` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `date_created` datetime(3) DEFAULT NULL,
  `totalPrice` double DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`oderId`, `AccountId`, `statusId`, `date_created`, `totalPrice`, `name`, `address`, `phone_number`) VALUES
(1, 9, 1, '2019-10-12 00:00:00.000', 1200000, 'Vũ Thị Hiền', 'Thái Bình Quê Lúa', '0924960076'),
(2, 7, 1, '2019-10-09 00:00:00.000', 500000, 'Phạm Công', 'mi dinh', '0924960076'),
(3, 10, 1, '2019-10-09 00:00:00.000', 670000, 'Nguyễn Văn Đoàn', 'Đồng Nai', '0924960076');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_item`
--

CREATE TABLE `oder_item` (
  `oderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder_item`
--

INSERT INTO `oder_item` (`oderId`, `productId`, `amount`, `total`) VALUES
(1, 2, 1, 100000),
(1, 3, 2, 500000),
(3, 2, 3, 500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `idcategory`, `idShop`, `name`, `price`, `detail`, `discount`) VALUES
(1, 13, 1, 'QUẦN TÂY DÀI CÔNG SỞ CAO CẤP', 250000, 'SIZE : 28 29 30 31 32 34 ( 47-80kg)', 50000),
(2, 13, 1, 'ÁO THUN THÁI NỮ TAY NGẮN CỔ TRÒN THÊU CHỮ CAO ', 1000000, '❤️❤️ẢNH THẬT+ VIDEO SHOP TỰ CHỤP NHA👍👍👍\r\n\r\nÁO THUN THÁI ÔM BODY NỮ CỔ TRÒN TAY NGẮN \r\n✳️✳️✳️ lựa chọn 1 chiếc áo đơn giản. Mà laị tăng phần trẻ trung cá tính. Tại sao không?\r\nHãy về đội của em. E sẽ làm các nàng toả nắng. Tươi ko cần tưới ak\r\n💥💥💥Chất thun thái loại 1. Đanh mịn. Mềm mát. Mặc lại ôm fom tôm dáng. Thấm hút cực tốt. Ko xù lông. Ko bai màu. Đặc biệt giặt máy thoải mái. Ko mất phom nhé. Chỉ có thun  bên e mới làm đc điều đó thôi ak. thiết kế thêu hình xinh xắn\r\n.size 40-57kg\r\nCó màu: ĐEN. TRẮNG. . HỒNG . NUDE. \r\n💋Có nhiều chị tâm sự. E ak áo chị mua bên shop kia. Về mặc giặt vài lần nhão vải xù lông mặc 3 bữa là đem bỏ vì chất quá tệ. Từ khi chị biết và mua bên e là ưng cái bụng. Mặc đã gì đâu. Giá thành phải chăng. Đúng chất ngon bổ rẻ. Và kể từ đó các chị đã là khách hàng thân thiết bên e luôn. Mỗi lần hàng mới về. Là rinh ngay cất tủ mặc dần. Yêu lắm cơ🌷😘😘😘\r\nHÃY TIN TƯỞNG SHOP SHOP SẼ LÀM CÁC CHỊ HÀI LÒNG VỀ CHẤT LƯỢNG 100% 👍👍👍\r\n#ao #áo #áothun #aonu #aophong #aopull #aokieu #thoitrangnu #áopull #áonữ #áothunthái #áophôngthái', 20000),
(3, 13, 1, 'ÁO THUN THÁI NỮ TAY NGẮN CỔ TRÒN THÊU CHỮ CAO CẤP', 450000, '❤️❤️ẢNH THẬT+ VIDEO SHOP TỰ CHỤP NHA👍👍👍\r\n\r\nÁO THUN THÁI ÔM BODY NỮ CỔ TRÒN TAY NGẮN \r\n✳️✳️✳️ lựa chọn 1 chiếc áo đơn giản. Mà laị tăng phần trẻ trung cá tính. Tại sao không?\r\nHãy về đội của em. E sẽ làm các nàng toả nắng. Tươi ko cần tưới ak\r\n💥💥💥Chất thun thái loại 1. Đanh mịn. Mềm mát. Mặc lại ôm fom tôm dáng. Thấm hút cực tốt. Ko xù lông. Ko bai màu. Đặc biệt giặt máy thoải mái. Ko mất phom nhé. Chỉ có thun  bên e mới làm đc điều đó thôi ak. thiết kế thêu hình xinh xắn\r\n.size 40-57kg\r\nCó màu: ĐEN. TRẮNG. . HỒNG . NUDE. \r\n💋Có nhiều chị tâm sự. E ak áo chị mua bên shop kia. Về mặc giặt vài lần nhão vải xù lông mặc 3 bữa là đem bỏ vì chất quá tệ. Từ khi chị biết và mua bên e là ưng cái bụng. Mặc đã gì đâu. Giá thành phải chăng. Đúng chất ngon bổ rẻ. Và kể từ đó các chị đã là khách hàng thân thiết bên e luôn. Mỗi lần hàng mới về. Là rinh ngay cất tủ mặc dần. Yêu lắm cơ🌷😘😘😘\r\nHÃY TIN TƯỞNG SHOP SHOP SẼ LÀM CÁC CHỊ HÀI LÒNG VỀ CHẤT LƯỢNG 100% 👍👍👍\r\n#ao #áo #áothun #aonu #aophong #aopull #aokieu #thoitrangnu #áopull #áonữ #áothunthái #áophôngthái', 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `PromotionID` int(11) NOT NULL,
  `idShop` int(11) DEFAULT NULL,
  `PromotionDetail` longtext DEFAULT NULL,
  `DateStart` datetime(3) DEFAULT NULL,
  `DateEnd` datetime(3) DEFAULT NULL,
  `DiscountRate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`PromotionID`, `idShop`, `PromotionDetail`, `DateStart`, `DateEnd`, `DiscountRate`) VALUES
(1, 1, '20-10', '2019-10-20 00:00:00.000', '2019-10-24 00:00:00.000', 5),
(2, 1, '1.6', '2019-10-20 00:00:00.000', '2019-10-30 00:00:00.000', 15),
(3, 5, '20-27', '2019-10-20 00:00:00.000', '2019-10-27 00:00:00.000', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'Khách hàng'),
(2, 'Nhà bán hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `idShop` int(11) NOT NULL,
  `shopName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`idShop`, `shopName`) VALUES
(1, 'Tứ Nguyễn SHop Pet'),
(4, 'Phi Long Shop'),
(5, 'Hoàn Vũ Store'),
(141, 'á'),
(142, 's'),
(143, 's'),
(144, 'sdfjkjn'),
(145, 'tu nguyen  Shop'),
(146, 'tu nguyen  Shop'),
(147, 'Tu nguyen 123 Shop fashion'),
(148, 'dfsfgds'),
(149, 'dfsfgds'),
(150, '11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `detailStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`statusId`, `detailStatus`) VALUES
(1, 'Đang giao'),
(2, 'Đã Giao'),
(3, 'Đã Hủy');

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
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`useName`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Chỉ mục cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`productId`,`AccountId`),
  ADD KEY `AccountId` (`AccountId`),
  ADD KEY `productId` (`productId`,`AccountId`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`oderId`),
  ADD KEY `AccountId` (`AccountId`),
  ADD KEY `statusId` (`statusId`);

--
-- Chỉ mục cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD PRIMARY KEY (`oderId`,`productId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `oderId` (`oderId`,`productId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `idShop` (`idShop`),
  ADD KEY `product_ibfk_1` (`idcategory`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromotionID`),
  ADD KEY `idShop` (`idShop`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`idShop`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `oderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromotionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `shop`
--
ALTER TABLE `shop`
  MODIFY `idShop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`idShop`) REFERENCES `shop` (`idShop`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `role` (`roleId`);

--
-- Các ràng buộc cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fk_favorite_account` FOREIGN KEY (`AccountId`) REFERENCES `account` (`AccountId`),
  ADD CONSTRAINT `fk_favorite_product` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `account` (`AccountId`),
  ADD CONSTRAINT `oder_ibfk_2` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`);

--
-- Các ràng buộc cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD CONSTRAINT `oder_item_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `oder_item_ibfk_2` FOREIGN KEY (`oderId`) REFERENCES `oder` (`oderId`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idShop`) REFERENCES `shop` (`idShop`);

--
-- Các ràng buộc cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_2` FOREIGN KEY (`idShop`) REFERENCES `shop` (`idShop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
