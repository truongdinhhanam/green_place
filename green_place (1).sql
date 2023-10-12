-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 18, 2023 lúc 04:43 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `green_place`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `criterias`
--

CREATE TABLE `criterias` (
  `id_criteria` int(11) NOT NULL,
  `criteria` varchar(1000) NOT NULL,
  `id_place_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `places`
--

CREATE TABLE `places` (
  `id_place` int(11) NOT NULL,
  `placeName` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `road` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `star` varchar(11) NOT NULL,
  `ip_map` varchar(50) NOT NULL,
  `id_place_type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `places`
--

INSERT INTO `places` (`id_place`, `placeName`, `country`, `city`, `district`, `ward`, `road`, `image`, `description`, `phone`, `status`, `star`, `ip_map`, `id_place_type`, `id_user`) VALUES
(1, 'Green & Brown Coffee', 'Việt Nam', 'Đà Nẵng', 'Hoà Khê', 'Thanh Khê', '872 Trần Cao Vân', '123', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptas quasi eveniet, at nostrum debitis vitae perferendis a libero, veritatis quidem, unde consequatur beatae itaque ipsa? Id consequatur nobis impedit. Iusto ullam iure earum, nam sed eum accusamus labore suscipit exercitationem ab natus laborum, tempore itaque molestias magnam illum consequatur nostrum cupiditate. Tempore excepturi dolorem sed exercitationem velit? Accusamus, omnis! Id, deleniti esse? Sapiente non enim eius natus possimus recusandae ab iste magni adipisci ratione assumenda eligendi voluptatibus dignissimos, harum rem accusantium maxime perspiciatis culpa aut vel aliquid omnis beatae! Delectus, harum saepe perspiciatis voluptates nulla aperiam at nihil sint adipisci maiores recusandae nostrum minus molestias est velit natus asperiores doloribus illo eos nisi eius eligendi accusamus vitae odio. Autem!', '0123456789', 0, '4.7', '123456', 1, 3),
(2, 'Phúc Drink', 'Việt Nam', 'Đà Nẵng', 'Tam Thuận', 'Thanh Khê', '182 Trần Cao Vân', '12323', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptas quasi eveniet, at nostrum debitis vitae perferendis a libero, veritatis quidem, unde consequatur beatae itaque ipsa? Id consequatur nobis impedit. Iusto ullam iure earum, nam sed eum accusamus labore suscipit exercitationem ab natus laborum, tempore itaque molestias magnam illum consequatur nostrum cupiditate. Tempore excepturi dolorem sed exercitationem velit? Accusamus, omnis! Id, deleniti esse? Sapiente non enim eius natus possimus recusandae ab iste magni adipisci ratione assumenda eligendi voluptatibus dignissimos, harum rem accusantium maxime perspiciatis culpa aut vel aliquid omnis beatae! Delectus, harum saepe perspiciatis voluptates nulla aperiam at nihil sint adipisci maiores recusandae nostrum minus molestias est velit natus asperiores doloribus illo eos nisi eius eligendi accusamus vitae odio. Autem!', '0123456789', 0, '4.5', '123456213123', 2, 3),
(3, 'Công viên 29/3', 'Việt Nam', 'Đà Nẵng', 'Thạc Gián', 'Thanh Khê', 'Điện Biên Phủ', '1232312323', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptas quasi eveniet, at nostrum debitis vitae perferendis a libero, veritatis quidem, unde consequatur beatae itaque ipsa? Id consequatur nobis impedit. Iusto ullam iure earum, nam sed eum accusamus labore suscipit exercitationem ab natus laborum, tempore itaque molestias magnam illum consequatur nostrum cupiditate. Tempore excepturi dolorem sed exercitationem velit? Accusamus, omnis! Id, deleniti esse? Sapiente non enim eius natus possimus recusandae ab iste magni adipisci ratione assumenda eligendi voluptatibus dignissimos, harum rem accusantium maxime perspiciatis culpa aut vel aliquid omnis beatae! Delectus, harum saepe perspiciatis voluptates nulla aperiam at nihil sint adipisci maiores recusandae nostrum minus molestias est velit natus asperiores doloribus illo eos nisi eius eligendi accusamus vitae odio. Autem!', '0123456789', 0, '4.0', '123456', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `place_types`
--

CREATE TABLE `place_types` (
  `id_place_type` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `place_types`
--

INSERT INTO `place_types` (`id_place_type`, `type`) VALUES
(1, 'Quán Cafe'),
(2, 'Nhà hàng'),
(3, 'Khu du lịch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `roleName`) VALUES
(1, 1, 'Nhà cung cấp'),
(2, 2, 'Thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `address`, `username`, `password`, `id_role`) VALUES
(1, 'Thiện Nguyễn', 'thiennguyen1701@gmail.com', '0123456789', '03 Quang Trung', 'thiennguyen', '25f9e794323b453885f5181f1b624d0b', 1),
(3, 'Trần Đức Danh', 'ducdanh123@gmail.com', '0123456789', '254 Nguyễn Văn Linh', 'tranducdanh', '25f9e794323b453885f5181f1b624d0b', 1),
(4, 'Lê Xuân Tạo', 'xuantao456@gmail.com', '0123456789', '15 Trần Cao Vân', 'lexuantao', '25f9e794323b453885f5181f1b624d0b', 2),
(5, 'Trương Đình Hà Nam', 'nam123456@gmail.com', '0123456789', '45 Điện Biên Phủ', 'hanam', '25f9e794323b453885f5181f1b624d0b', 2),
(6, 'Trần Văn Đang', 'vandang456@gmail.com', '0123456789', '85 Phan Thanh', 'vandang', '25f9e794323b453885f5181f1b624d0b', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Chỉ mục cho bảng `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id_criteria`),
  ADD KEY `id_place_type` (`id_place_type`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_place` (`id_place`);

--
-- Chỉ mục cho bảng `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id_place`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place_type` (`id_place_type`);

--
-- Chỉ mục cho bảng `place_types`
--
ALTER TABLE `place_types`
  ADD PRIMARY KEY (`id_place_type`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id_criteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `places`
--
ALTER TABLE `places`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `place_types`
--
ALTER TABLE `place_types`
  MODIFY `id_place_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_place_cmt` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`),
  ADD CONSTRAINT `fk_user_cmt` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `criterias`
--
ALTER TABLE `criterias`
  ADD CONSTRAINT `fk_criteria` FOREIGN KEY (`id_place_type`) REFERENCES `place_types` (`id_place_type`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`);

--
-- Các ràng buộc cho bảng `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_place_type` FOREIGN KEY (`id_place_type`) REFERENCES `place_types` (`id_place_type`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_place_star` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`),
  ADD CONSTRAINT `fk_user_star` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
