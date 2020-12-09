-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 09, 2020 lúc 05:50 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `congthucnauan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `MaMon` int(10) UNSIGNED NOT NULL,
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL,
  KEY `binhluan_mamon_foreign` (`MaMon`),
  KEY `binhluan_username_foreign` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `MaLoai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaLoai`, `TenLoai`, `TrangThai`, `created_at`, `updated_at`) VALUES
(1, 'Món nước', 1, NULL, NULL),
(2, 'Món nướng', 1, NULL, NULL),
(3, 'Món chiên, xào', 1, NULL, NULL),
(4, 'Món kho, sốt', 1, NULL, NULL),
(5, 'Cơm', 1, NULL, NULL),
(6, 'Bánh', 1, NULL, NULL),
(7, 'Lẩu', 1, NULL, NULL),
(8, 'Đồ uống', 1, NULL, NULL),
(9, 'Ăn vặt', 1, NULL, NULL),
(10, 'Món chay', 1, NULL, NULL),
(11, 'Món chính', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huongdan`
--

DROP TABLE IF EXISTS `huongdan`;
CREATE TABLE IF NOT EXISTS `huongdan` (
  `MaMon` int(10) UNSIGNED NOT NULL,
  `CacBuocLam` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhAnh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `huongdan_mamon_foreign` (`MaMon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `huongdan`
--

INSERT INTO `huongdan` (`MaMon`, `CacBuocLam`, `HinhAnh`) VALUES
(1, 'Bước 1: Làm bánh canh\r\nCho bột gạo, bột năng, một ít muối và 500ml nước nóng già vào thau để nhào bột. Cho nước nóng già vào hỗn hợp bột và nhào mịn đến khi thấy bột không dính tay nữa thì mang ra cán thật mỏng và cắt sợi.\r\nĐun sôi một nồi nước, thả bánh canh vừa cắt vào luộc đến khi sợi bánh canh.', 'buoc1.jpg'),
(1, 'Bước 2: Sơ chế cua\r\nCua biển mua về rửa sạch, hấp chín, gỡ lấy phần thịt và gạch để riêng. Cho hành băm nhuyễn vào chảo phi thơm với dầu ăn, rồi xào thịt cua cùng ít mắm, tiêu cho thơm.Gạch cua bạn cũng phi hành khô, xào qua, để riêng.', 'buoc2.jpg'),
(1, 'Bước 3: Sơ chế các nguyên liệu khác\r\nNấm rơm rửa sạch, ngâm nước muối loãng, bổ dọc, cho vào chảo xào qua.Thịt chân giò luộc chín, thái khoanh. Trứng cút luộc chín rồi bóc vỏ.', 'buoc3.jpg'),
(1, 'Bước 4: Nấu nước\r\nDùng Xương lợn chần qua nước sôi, rửa sạch rồi cho vào nồi nước lạnh ninh lấy nước dùng. Phi hành thơm vào nồi và đổ nước hầm xương vào .Sau khi nêm nếm vừa ăn thì đợi đến lúc nước sôi nhẹ và cho nấm rơm vào cùng. Hòa một ít bột năng đổ từ từ vào nồi nước dùng, vừa đổ vừa khuấy đều để tạo độ sánh.\r\nXếp bánh canh ra bát, cho thịt chân giò, thịt cua, gạch cua, trứng cút lên trên. Chan nước dùng rồi rắc hành, mùi, hạt tiêu lên trên và thưởng thức.', 'buoc4.jpg'),
(1, 'Bước 5: Thành phẩm\r\nBánh canh cua thơm ngon, hấp dẫn, nước dùng thanh ngọt kết hợp với thịt cua dai chắc và sợi bánh canh mềm không bị cứng chắc chắn sẽ khiến bạn hài lòng.', 'buoc5.jpg'),
(2, 'Bước 1: Sơ Chế Nguyên Liệu\r\nDùng dao khía nhẹ xúc xích thành những đường chéo song song cho đẹp mắt. Giữ nguyên xúc xích chứ không làm bị đứt.\r\nBăm nhuyễn hành tỏi, cà chua rửa sạch để cho ráo nước rồi cắt thành hình hạt lựu, cắt dưa leo thành miếng mỏng vừa ăn.', 'buoc1.jpg'),
(2, 'Bước 2: Công Đoạn Chế Biến\r\nCho chảo lên bếp, chọn loại chảo chống dính nhỏ hoặc chảo gang để giữ đc độ nóng lâu hơn. Đợi cho chảo khô thì cho dầu ăn vào đợi cho dầu nóng, cho xúc xích vào chiên sơ cho chín vừa tới. Đập thêm trứng chảo để ốp la, rắc chút muối và tiêu vào cho trứng thêm đậm đà. Gắp trứng và xúc xích ra khỏi chảo để cho ráo dầu.\r\nGiữ nguyên chảo, cho chút dầu ăn và phi thơm hành tỏi, cho cà chua vào đảo đều cho đến khi nhuyễn thành xốt. Thêm chút ớt và nước lọc vào cùng, nêm nếm thêm gia vị và rắc tiêu lên món ăn.', 'buoc2.jpg'),
(2, 'Bước 3: Hoàn Thành Và Thưởng Thức\r\nSau khi đã có xốt cà chua thơm ngon, cho thêm xúc xích và trứng ốp la vào, pate, cà chua, dưa leo và chút ngò lên trang trí lên cho đẹp mắt rồi thưởng thức.', 'buoc3.jpg'),
(3, 'Bước 1:\r\nDùng kéo cắt bánh tráng thành từng miếng nhỏ vừa ăn.Gọt vỏ xoài xanh, bào nhỏ thành sợi.\r\nRang lạc, xát vỏ, tách đôi hạt.Luộc chín trứng cút, để nguội, bóc vỏ.Xé nhỏ sợi bò khô, để riêng.Rửa sạch rau răm, thái nhỏ.\r\nBóc vỏ hành khô, thái lát mỏng. Cho dầu ăn vào chảo đun nóng. Sau đó cho hành vào phi cho thật thơm cho đến khi hành chuyển sang màu vàng thì trút ra một bát, để nguội.\r\nTép rang khô rồi cho ra bát.', 'buoc1.jpg'),
(3, 'Bước 2:\r\nCác bạn cho sợi xoài đã nạo vào bát có sợi bánh tráng, cho sợi bò khô, tép rang khô vào, cho mỡ hành, hành khô trứng cút vào.\r\nVắt quất, cho 1 thìa xì dầu, 1 thìa muối ớt vào trộn đều cho bánh tráng thấm gia vị.\r\nSau cùng cho lạc rang và rau răm vào, đảo đều một lần nữa là được.', 'buoc2.jpg'),
(4, 'Bước 1: Sơ chế nguyên liệu\r\nTôm cắt đầu, rửa sạch và lấy chỉ lưng. Ướp tôm với 1 thìa cà phê muối, 1 thìa cà phê đường, 1 thìa cà phê tiêu xay và 1 củ hành tím băm nhuyễn.\r\nThịt rửa sạch, trụng qua nước sôi rồi đem thái mỏng. Thịt cũng ướp sơ giống như tôm. Cơm nguội xay nhuyễn với nước cốt dừa.\r\nHành tây lột vỏ, xắt mỏng. Nấm ngâm nước muối loãng, cắt gốc, rửa sạch. Sau đó theo thái sợi chỉ nhỏ. Hành lá rửa sạch, xắt nhỏ.\r\nGiá và các loại rau ăn kèm nhặt, rửa sạch rồi để riêng ra.', 'buoc1.jpg'),
(4, 'Bước 2: Pha bột làm bánh\r\nCho bột gạo, nước cốt dừa và cơm nguội, thêm chút muối vào thau và trộn đều cho đến khi hỗn hợp tan hết và hơi loãng.Sau đó cho hành lá, cơm nguội và bột nghệ vào tiếp tục trộn đều. Nêm nếm thêm ít gia vị: muối, đường, bột ngọt.\r\nĐể cho bột nghỉ khoảng 1 tiếng.', 'buoc2.jpg'),
(4, 'Bước 3: Xào nhân\r\nBắc chảo lên bếp rồi cho 2 muỗng dầu ăn vào. Chờ cho đến khi dầu nóng thì cho thịt, tôm và nấm hương vào. Xào đều cho đến khi các nguyên liệu chín.\r\nNêm thêm khoảng ½ thìa hạt nêm rồi cho ra bát.', 'buoc3.jpg'),
(4, 'Bước 4: Đổ bánh\r\nNếu như bánh xèo miền Trung được đổ trong một cái chảo nhỏ, đáy chảo bằng thì với bánh xèo miền Nam lại ngược lại. Chảo dùng để đổ bánh xèo miền Nam lớn và và đáy chảo trũng hơn.\r\nTheo đó, để đổ bánh, bạn bắc chảo lên bếp và cho dầu vào. Khi dầu nóng thì múc một muỗng bột lớn đổ vào, xoay chảo cho bột tráng đều thánh lớp mỏng.\r\nĐậy nắp lại chừng 3 – 4 phút. Mở nắp ra, cho nhân tôm, thịt, nấm và giá vào rồi gập bánh lại.\r\nTiếp tục nấu cho đến khi bánh vàng đều cả hai mặt thì múc ra khỏi chảo.', 'buoc4.jpg'),
(4, 'Bước 5: Pha nước chấm\r\nNước chấm để ăn kèm với bánh xèo miền Nam được pha theo tỉ lệ: 1 phần nước nước mắm, 1 phần đường, 1 phần giấm hoặc nước cốt chanh cùng với 5 phần nước. Cho thêm ớt và tỏi băm.', 'buoc5.jpg'),
(5, 'Bước 1: Chuẩn bị sốt cho cơm trộn\r\nCho tất cả nguyên liệu: 2 tép tỏi, 1/3 trái táo, 1/2 củ hành tây, nước cốt của 1/2 trái chanh, 2 muỗng canh tương ớt Hàn Quốc Gochujang, 1 muỗng canh rượu Mirin, 1 muỗng canh dầu mè, 1/2 muỗng canh nước tương Hàn Quốc, 1/2 muỗng canh đường nâu, 1/2 muỗng canh siro bắp, 1/4 muỗng cà phê tiêu vào máy xay sinh tố, xay mịn.', 'buoc1.jpg'),
(5, 'Bước 2: Phần cơm trộn\r\nThịt bò rửa sạch, cắt nhỏ, đem ướp với 1 muỗng canh rượu Mirin, 1/2 muỗng canh nước tương Hàn Quốc, 1/2 muỗng canh dầu mè, 1/2 muỗng canh đường nâu, 1/4 muỗng cà phê tiêu, để 15 phút cho thịt thấm gia vị.\r\nSau đó, xào nhanh thịt bò đã ướp với 1 muỗng canh dầu ăn, cho ra đĩa.', 'buoc2.jpg'),
(5, 'Bước 3: Sơ chế, xào rau củ\r\nGiá đỗ và cải bó xôi rửa sạch, cải bó xôi đem cắt khúc khoảng 10cm. Bắc một nồi nước, cho vào 1 ít muối, khi nước sôi bùng thì cho giá đỗ vào luộc trước, sau 2 phút thì vớt giá ra, cho cải bó xôi vào tiếp tục luộc 2 phút, vớt ra. Để riêng 2 loại rau, mỗi loại trộn với 1/2 muỗng cà phê muối tiêu và 1 muỗng cà phê dầu mè.\r\n', 'buoc3.jpg'),
(5, 'Bước 4:\r\nCà rốt, bí ngòi rửa sạch, cắt sợi khoảng 5cm. Nấm đông cô rửa sạch, cắt bỏ chân, đem cắt lát mỏng. Để lửa lớn, cho vào chảo 1 muỗng canh dầu ăn, thêm bí ngòi vào xào đến khi gần chín thì nêm với 1 muỗng cà phê dầu mè, 1/2 muỗng cà phê muối tiêu, trút bí ngòi ra dĩa. Cho lần lượt 2 loại còn lại vào xào riêng, nếu hết dầu thì châm thêm 1 muỗng canh dầu vào, xào và nêm nếm tương tự như bí ngòi.', 'buoc4.jpg'),
(5, 'Bước 5: Nấu cơm\r\nCho vào thố 1 muỗng cà phê dầu mè, dùng cọ phết cho dầu đều đáy thố. Múc cơm vào và dàn đều cơm.', 'buoc5.jpg'),
(5, 'Bước 6:\r\nKhi ăn bạn cho sốt tương vào, trộn đều. Món cơm trộn nóng hổi đầy đủ dưỡng chất đảm bảo hấp dẫn đến từng muỗng cuối cùng.', 'buoc6.jpg'),
(6, 'Bước 1: Sơ chế nguyên liệu\r\nSả, gừng rửa sạch, đập dập.\r\nGiò heo lóc xương. Phần bắp heo cuộn lại, dùng chỉ hoặc sợi lát buộc chắc.\r\nCuộn tròn tấm thịt nạm bò cho chắc tay, buộc chắc lại. Bắp bò cũng dùng dây bó cho chặt (Việc bó thịt lại giúp thịt khi nấu chín ít bị co lại).', 'buoc1.jpg'),
(6, 'Bước 2:\r\nBắc chảo nước sôi trụng sơ xương và bắp bò, nạm bò, gân bò, giò heo.\r\nCắt gân thành miếng vừa ăn.\r\nPha 3 muỗng canh mắm ruốc Huế với ½ chén nước, quậy cho hòa đều', 'buoc2.jpg'),
(6, 'Bước 3: Ướp thịt\r\nƯớp tất cả thịt với 2 muỗng canh đường, 1 muỗng canh muối, ½ muỗng canh bột ngọt, 1 muỗng canh mắm ruốt (đã pha loãng), 2 muỗng canh hành tím băm, 2 muỗng canh tỏi băm, 2 muỗng canh sả băm.', 'buoc3.jpg'),
(6, 'Bước 4: Hầm thịt và xương:\r\nLót 3 cây sả và ½ lượng gừng ở đáy nối áp suất, cho xương heo và thịt giò heo vào, cho nước sâm sấp mặt thịt, đậy kín nắp, đun sôi (nghe tiếng reo) thì hạ nhỏ lửa đun thêm 5 phút. Tắt bếp, đợi nước trong nồi hết reo thì mở nắp, vớt bắp giò heo ra thau nước lạnh (làm như thế thịt sẽ chắc, không bị bở).\r\nLại lót phần sả và gừng còn lại ở đáy nồi áp suất, cho thịt bắp bò, nạm bò và gân bò vào, cho nước sâm sấp mặt thịt. Đậy kín nắp, đun sôi (nghe tiếng reo) thì hạ nhỏ lửa đun thêm 20 phút. Tắt bếp, đợi nước trong nồi hết reo thì mở nắp, vớt bắp bò và nạm bò vào thau nước lạnh cho thịt được chắc.\r\nPhần gân khi vớt ra, nếu thấy mềm, vừa ăn thì để riêng ra. Nếu thích gân mềm hơn thì cho vào phần nước dùng nấu chung.', 'buoc4.jpg'),
(6, 'Bước 5: Nấu nước dùng:\r\nPhần nước hầm thịt bò và nước hầm xương đong chung, thêm nước lạnh cho vừa 5 lít nước.\r\nĐun sôi, nêm gia vị: 3 muỗng canh nước mắm, 2 muỗng canh muối, 2 muỗng canh đường, 2 muỗng café bột ngọt, chén mắm ruốt Huế đã pha loãng. Nếm thử và điều chỉnh gia vị cho vừa khẩu vị nhà bạn.\r\nĐể nước dùng thơm và có màu đẹp: Làm nóng 2 muỗng canh dầu, phi thơm 1,5 muỗng canh sả băm, 1 muỗng canh tỏi băm. Khi sả và tỏi săn lại, thơm thì cho 2-3 muỗng canh dầu màu điều vào. Tắt bếp.\r\nNếu thích cay thì giai đoạn ướp thịt và giai đoạn cuối cho thêm ớt sa tế vào nồi nước dùng.', 'buoc5.jpg'),
(6, 'Bước 6: Trình bày:\r\nChuẩn bị rau mùi: Cắt nhuyễn ít rau răm, hành, ngò và cắt lát mỏng hành tây. Cắt lát thịt. Trụng bún qua nước sôi, xếp thịt, gân, chả, rắc ít rau mùi, chan nước dùng. Dọn kèm rau muống chẻ, bắp chuối bào, giá, rau thơm, chanh ớt... và thưởng thức bún bò Huế nào.', 'buoc6.jpg'),
(7, 'Bước 1:\r\nSơ chế nguyên liệu\r\nĐậu hũ cắt thành từng miếng vuông chiên giòn.\r\nThịt ba chỉ rửa sạch, để ráo nước sau đó cho vào nồi cùng 1 lít nước, luộc chín. Tiếp theo, cắt mỏng thịt ba chỉ và xếp ra đĩa.\r\nThả từng miếng chả cốm vào chảo dầu chiên lên, lật đều 2 mặt cho đến khi chả cốm giòn.', 'buoc1.jpg'),
(7, 'Bước 2. Sơ chế rau\r\nDưa leo rửa sạch, gọt vỏ, thái miếng.\r\nTía tô, rau thơm các loại nhặt bỏ cành, lá già, giập úa sau đó rửa sạch, ngâm nước muối loãng khoảng 30 phút rồi vớt ra rổ, vẩy sạch nước. Bún lá cắt miếng vừa ăn.', 'buoc2.jpg'),
(7, 'Bước 3. Pha mắm tôm\r\nTrộn 1 muỗng canh đường, 1 muỗng canh nước cốt chanh, 1 muỗng cà phê bột ngọt, 1 muỗng cà phê ớt băm vào mắm tôm, khuấy đều.', 'buoc3.jpg'),
(7, 'Bước 4. Thành phẩm\r\nDọn các nguyên liệu đậu hũ, thịt ba chỉ cắt lát, dưa leo, rau thơm lên đĩa hoặc mẹt, trang trí một chút cho món ăn thêm đẹp, hấp dẫn hơn.', 'buoc4.jpg'),
(8, 'Bước 1: Sơ chế cá\r\nNếu không có thời gian, nên nhờ người bán hàng mổ, cắt khúc rồi về sơ chế sau cho nhanh.\r\nSau khi mang cá từ chợ về, tiến hành sơ chế, khử mùi tanh cá. Có nhiều cách khử mùi tanh cá, trong đó bạn có thể ngâm với nước chanh tươi. Dùng chanh tươi vắt lấy nước, ngâm cá khoảng vài phút sau đó làm sạch như bình thường. Cá sẽ sạch nhớt và không bị tanh.\r\nLưu ý, không ngâm quá lâu sẽ làm da cá bị bong và mất đi độ tươi của cá.\r\nNgoài ra, khi mổ cá lóc cần yêu cầu người bán bỏ cả mang cá và cạo sạch màng đen bên trong bụng cá sẽ bớt tanh rất nhiều.\r\n', 'buoc1.jpg'),
(8, 'Bước 2: Sơ chế các nguyên liệu còn lại\r\nHành lá rửa sạch, thái nhỏ, để riêng phần thân trắng và phần lá xanh.\r\nHành khô bóc vỏ, thái lát. Chia đôi chỗ hành khô.\r\nCho phần trắng hành lá và một nửa chỗ hành khô vào cối, giã nát.', 'buoc2.jpg'),
(8, 'Bước 3: Ướp cá\r\nCho hỗn hợp hành này vào bát đựng cá. Thêm cốt dừa caramel (hoặc kẹo đắng hay nước hàng), hạt tiêu, nước mắm, đường vào trộn đều.\r\nƯớp từ 30-35 phút', 'buoc3.jpg'),
(8, 'Bước 4: Làm cá lóc kho tộ\r\nLàm nóng chảo với một chút dầu ăn, cho nửa hành khô còn lại vào phi thơm, tắt bếp.\r\nXếp cá lóc cùng nước ướp cá ra tộ, bật bếp, đun ở mức lửa cỡ trung bình.\r\nSau đó, thêm hành xào thơm vào.\r\nĐun liu riu từ 30-45 phút, trong quá trình này, cứ 10 phút bạn nhẹ nhàng lật cá 1 lần.\r\nKhi nước kho cá cạn gần hết, thêm ít hành lá, hạt tiêu, ớt tươi vào, đun một xíu nữa rồi tắt bếp.\r\nCho cá lóc kho tộ ra đĩa hoặc bát, rưới ít nước kho lên rồi thưởng thức với cơm trắng!', 'buoc4.jpg'),
(9, 'Bước 1: Pha cafe phin\r\nCho bột cafe vào đầy 1/3 phin, rót nước sôi vào xâm xấp mặt cafe và ủ khoảng 10 phút. Tiếp theo, bạn rót nước đầy phin và bắt đầu chiết xuất nước cốt.', 'buoc1.jpg'),
(9, 'Bước 2: Đánh bọt cafe\r\nCho phần cốt cafe vào máy xay sinh tố rồi đổ từ từ 40g đường vào xay cùng. \r\nKhi thấy phần hỗn hợp bông xốp, chuyên màu nâu sáng, có độ dẻo sệt là được. \r\nBạn có thể kiểm tra độ bông chuẩn của bọt cafe bằng cách dùng một chiếc thìa nhấc phần bọt lên nếu tạo thành chóp nhọn, ổn định và không bị chảy là thành công. ', 'buoc2.jpg'),
(9, 'Bước 3: Cách pha cafe bọt biển\r\nCho sữa tươi hoặc sữa đặc vào ly. Nếu bạn muốn uống lạnh có thể kết hợp cho vài viên đá lạnh. Nếu thích ăn ngọt bạn có thể gia giảm thêm đường tùy ý. \r\nMúc hoặc đổ từ từ cafe bọt biển vừa đánh lên phía trên thật khéo léo để ly cafe trông đẹp mắt hơn.', 'buoc3.jpg'),
(10, 'Bước 1: Sơ chế nguyên liệu\r\nCá lóc (cá quả) làm sạch, rửa qua với một chút nước muối hoặc rượu để cá sạch nhớt và không bị tanh. Cắt thành khúc vừa ăn. \r\nBạn ướp cá cùng 1 ít mắm, muối, hạt tiêu, ớt và hành băm nhỏ trong 20 phút để cá ngấm đều gia vị. \r\nDứa gọt vỏ, bỏ mắt, thái miếng nhỏ. Cà chua bổ miếng cau, hành rau răm, thì là, ớt nhặt rửa sạch thái nhỏ. ', 'buoc1.jpg'),
(10, 'Bước 2: Cách nấu canh cá chuẩn vị Nam Bộ\r\nBật bếp, cho dầu đun sôi và phi thơm hành khô đã băm nhuyễn rồi cho cá vào xào sơ qua để thịt cá săn lại và không bị tanh.\r\nSau đó bạn cho cà chua vào và đảo nhẹ tay tránh làm cá bị nát. Khi thấy cá đã chín tới bạn cho nước lọc vào nồi sao cho vừa ăn và 2 quả me chín \r\nĐun đến khi nồi canh sôi thì bạn cho dứa vào đun nhỏ lửa trong 5 phút để dứa chín rồi nêm gia vị sao vừa ăn . Bạn vớt me đã chín dằm lấy nước cốt rồi nêm nếm sao cho độ chua nước canh vừa phải. Nước sôi thêm tầm 2 phút thì bạn cho hành, rau răm, thì là rồi tắt bếp.\r\n', 'buoc2.jpg'),
(10, 'Bước 3: Thành phẩm canh chua cá lóc\r\nCanh chua thơm mùi hành, răm, thì là, nước canh có màu vàng trong, ngọt thanh hấp dẫn. Khi ăn canh có vị chua thanh của me, ngọt dịu của dứa, hòa quyện chút chua của cà và đặc biệt cá lóc chắc thịt, ngọt thơm', 'buoc3.jpg'),
(11, 'Bước 1:\r\nCà rốt rửa sạch, cạo vỏ và xắt thành hình hạt lựu\r\nHành lá nhặt bẹ, rửa sạch, thái nhỏ\r\nHành tím bóc vỏ, băm nhỏ.\r\nĐậu Hà Lan rửa sạch, luộc chín (nếu dùng đậu cô ve thì các Bạn rửa sạch xắt hạt lựu).\r\nTôm sú làm sạch và đem luộc sơ, bỏ đầu, bóc vỏ, xắt hạt lựu\r\nMực là sạch, hấp chín, xắt mỏng. Nếu cơm nóng thì xơi ra đĩa to, đánh tơi và để cơm nguội, còn nếu là cơm nguội thì chỉ cần đánh tơi cơm là được. Khi cơm nguội và tơi thì sẽ giúp cơm chiên được vàng đều và không dính chảo.', 'buoc1.jpg'),
(11, 'Bước 2:\r\nĐặt chảo lên bếp, thêm 1 ít dầu ăn rồi cho hành vào phi thơm, tiếp theo cho cà rốt, đậu Hà Lan, tôm, mực vào xào chín. Sau đó múc ra để riêng.\r\nLấy một cái chảo khác, thêm dầu ăn rồi cho cơ vào chiên cho săn lại, tiếp theo đập trứng ra bát đánh đều rồ đổ vào cơm, trộn đều\r\nKhi cơm đạt đến độ săn nhất định thì cho tất cả nguyên liệu và hành lá vào. Trộn đều tay rồi nêm nếm vừa ăn.', 'buoc2.jpg'),
(11, 'Bước 3:Trút cơm ra đĩa, trang trí thêm nếu muốn và thưởng thức.', 'buoc3.jpg'),
(12, 'Bước 1: Sơ chế và tẩm ướp nguyên liệu\r\nNgâm miến vào thau nước lạnh khoảng 5 phút để miến mềm ra, sau đó rửa qua rồi trần sơ với nước nóng trong vài phút. Tùy từng loại miến mà có thời gian trần thích hợp, tránh cho miến bị nát hoặc quá mềm. Để miến ráo nước, ướp miến với nước tương, dầu mè, đường, hạt tiêu và mè rang với tỉ lệ phù hợp.\r\nThịt bò rửa sạch, thái miếng mỏng vừa ăn rồi ướp với nước tương, tỏi băm, dầu mè, rượu trắng, đường trong khoảng 15 phút cho thịt thấm đều gia vị.\r\nCà rốt gọt vỏ, rửa sạch, thái sợi nhỏ. Ớt chuông xanh, đỏ thái sợi. Cải bó xôi nhặt gốc, rửa sạch, cắt khúc dài 3 – 4cm. Bạn chần sơ các loại rau củ này với nước sôi, vớt ra cho vào nước lạnh để giữ độ giòn. Tiếp đó, đem ướp với dầu mè, đường, muối.\r\nNấm đông cô làm sạch, thái lát mỏng. Nấm kim châm rửa sạch, để ráo nước. Tỏi băm nhỏ. Ướp nấm với hành tỏi, nước tương, dầu mè, đường; đảo đều tay cho nấm thấm gia vị.', 'buoc1.jpg'),
(12, 'Bước 2: Tráng trứng\r\nĐập trứng vào tô, thêm chút muối rồi khuấy đều, đem tráng thật mỏng trên chảo lớn, lật hai mặt để trứng chín vàng đều. Khi trứng nguội, bạn dùng dao thái thành những sợi nhỏ vừa ăn.', 'buoc2.jpg'),
(12, 'Bước 3: Xào rau củ\r\nBắc chảo lên bếp, phi thơm tỏi với chút dầu ăn, cho phần nấm đã ướp vào đảo đều rồi cho cà rốt, ớt chuông, cải bó xôi vào. Bạn lưu ý phải để lửa lớn, đảo đều tay để rau củ không bị ra nước. Sau khi rau củ chín tới và thấm gia vị thì tắt bếp, đổ ra đĩa.', 'buoc3.jpg'),
(12, 'Bước 4: Xào thịt bò\r\nBắc tiếp chảo lên bếp, phi thơm tỏi với dầu ăn. Khi tỏi dậy mùi thơm thì cho thịt bò vào xào với lửa lớn, nhanh tay đảo đều đến khi thịt chín tới, chuyển sang màu vàng nâu là được.', 'buoc4.jpg'),
(12, 'Bước 5: Thành phẩm món ăn\r\nBạn cho miến vào đĩa, đổ hỗn hợp rau củ và nấm lên trên, tiếp đó cho thịt bò vừa xào còn nóng lên trên cùng (đổ cả nước xào bò). Trước khi ăn, rắc một chút vừng rang, trộn đều rồi thưởng thức.', 'buoc5.jpg'),
(13, 'Bước 1: Chế biến nước dùng xương\r\nĐể có một nồi nước dùng ngon và đậm thì trước hết bạn cần nướng hành khô và gừng. Nếu gia đình có vỉ nướng thì bạn có thể đặt vỉ nướng lên bếp ga và nướng cho hành khô và gừng cháy xém. Khi nướng xong thì bóc sạch vỏ và đập dập.\r\nXương ống rửa sạch sắt muối và trần qua nước sôi. Làm khoảng 2 – 3 lần cho đỡ mùi hôi của xương sau đó chặt thành miếng vừa ăn rồi cho vào một nồi áp suất. Cho thêm hành và gừng đã nướng ở bước 1 vào cùng với 2 – 3 thìa gia vị. Nước khoảng 1 lít rưỡi cho đến 2 lít nước. Sau đó ninh xương khoảng 30 phút là được.\r\n', 'buoc1.jpg'),
(13, 'Bước 2: Chế biến cua đồng\r\nSau khi mua cua về, cho vào một nồi nhỏ. Cho vài thìa muối vào và xóc đều tay nhiều lần cho cua ra hết chất bẩn rồi rửa lại nhiều lần với nước. Sau đó bóc bỏ phần mai, dùng tăm hoặc que để tách gạch ra một bát riêng, phần thịt ra một bát riêng. Phần thịt cua bạn cho vào cối giã nhuyễn sau đó dùng nước lọc để gạn lấy nước ( khoảng 1.5 lít nước cua ). Với những bạn ở quê thì công việc này tương đối đơn giản vì rất hay làm. Bên cạnh đó ở ngoài chợ trên thành phố cũng rất hay có các dịch vụ bán cua đã làm sẵn. Bạn có thể mua về và chế biến luôn.\r\n', 'buoc2.jpg'),
(13, 'Bước 3: Rán đậu\r\nĐậu phụ trắng mua về thái miếng hình vuông bằng hai đầu ngón tay rồi cho lên chảo rán vàng', 'buoc3.jpg'),
(13, 'Bước 4: ướp thịt bò và rau\r\nThịt bò thái lát mỏng ướp với gừng đập dập và tỏi nếu bạn mua nguyên cả miếng thịt bò. Nếu không thì khi mua người ta đã thái và ướp sẵn gừng với tỏi cho bạn rồi. Có thể cho thêm một muỗng cà phê muối hoặc bột canh để cho thịt bò ngấm gia vị.\r\nRau rửa sạch ngâm nước muối. Ngoài các loại rau mà chúng tôi đã hướng dẫn ở phần nguyên liệu thì bạn có thể dùng thêm các loại rau khác như là rau cải xoong, nấm, hoặc rau cải chíp.', 'buoc4.jpg'),
(13, 'Bước 5: Chế biến nước lẩu \r\nĐến đây bạn đã có nước hầm xương và nước cua đã lọc. Bạn cho cả hai loại nước này vào một nồi to, sau đó cho thêm cà chua thái lát, sấu xanh cả quả đã nạo vỏ, hành khô. Sau đó đặt lên bếp ga và đun sôi khoảng 10 đến 15 phút là bạn đã có nồi nước lẩu cua đồng đúng chuẩn rồi. ', 'buoc5.jpg'),
(14, 'Bước 1: Nấu Nước Dùng Mì Ramen \r\nCắt khúc 3 cây baro. Cắt củ hành tây làm tư. Cà rốt, khoai tây cắt lát dày. Gừng cắt lát mỏng. Tỏi đập dập. \r\nChần xương ống heo qua nước sôi. Sau đó, vớt ra ngâm vào thau nước đá. \r\nTiếp theo, bạn cho boaro, hành tây, khoai tây, cà rốt, gừng, tỏi, ớt khô, xương ống heo vào nồi hầm với 4 lít nước. \r\nLàm Thịt Xá Xíu', 'buoc1.jpg'),
(14, 'Bước 2: Sơ chế thịt \r\nLóc da ra khỏi thịt ba rọi. Lạng miếng ba rọi làm đôi. Sau đó, cuộn tròn lại rồi quấn chỉ, buộc chặt thịt. Tiếp theo, ướp thịt cùng với muối và tiêu. Bạn đem thịt đi áp chảo cho vàng đều rồi luộc khoảng 10 phút. Sau đó, vớt thịt ra ngâm trong thau nước đá lạnh. \r\n', 'buoc2.jpg'),
(14, 'Bước 3: Làm nước dùng kho thịt \r\nĐun sôi 200ml rượu Sake, 50ml rượu Mirin, tỏi, gừng, 100g đường nâu, 300ml nước tương đậm và 1 lít nước cho các nguyên liệu và gia vị tan đều. Tiếp theo, bạn cho thịt vào kho trong 45 phút. \r\nSau đó, bạn vớt thịt ra để nguội, cắt lát và bảo quản trong tủ mát. \r\n', 'buoc3.jpg'),
(14, 'Bước 4: Cách Làm Trứng Ngâm Tương \r\nLuộc 5 quả trứng trong khoảng 8 phút sau đó lột bỏ vỏ. \r\nCách làm nước tương ngâm trứng: cho 300ml nước, 100ml rượu Sake, 100ml nước tương đậm, 100g đường nâu, gừng vào nồi đun sôi cho các gia vị tan đều thì tắt bếp, để nguội, cho trứng vào ngâm. \r\n', 'buoc4.jpg'),
(14, 'Bước 5: Luộc Mì \r\nĐun nước sôi, cho mì vào luộc chín. Lưu ý là bạn đừng để cho sợi mì quá mềm sẽ làm mất đi độ dai vốn có. ', 'buoc5.jpg'),
(14, 'Bước 6: Trình Bày Và Thưởng Thức \r\nBoaro phần trắng bạn cắt sợi mỏng. Phần xanh cắt lát mỏng. Sau đó ngâm riêng từng loại vào âu nước đá lạnh. \r\nNước cốt mì sẽ bao gồm: nước thịt xá xíu và nước dùng pha theo tỷ lệ 1:3. \r\nCho mì vào tô, đặt thịt xá xíu, trứng ngâm tương cắt làm đôi, boaro lên trên rồi chan nước cốt mì, thêm lá rong biển là đã thưởng thức được rồi đấy! \r\n', 'buoc6.jpg'),
(15, 'Bước 1: Nấu nước đường đen \r\nCho khoảng 40g đường đen và bột cacao vào một lượng nước vừa đủ rồ đun sôi để tạo cho trân châu có màu hấp dẫn, hương vị thơm ngon hơn. ', 'buoc1.jpg'),
(15, 'Bước 2: Làm trân châu\r\nCho bột năng và bột gạo trộn lẫn với nhau. Sau đó từ từ rót nước đường đen vào hỗn hợp bột và khuấy đều cho bột đủ sệt và dẻo để nặn trân châu.\r\nBạn rửa sạch tay rồi nhồi bột trực tiếp để bột không bị vón cục. Nên nhồi bột mạnh và đều tay cho đến khi dẻo, mịn là được. Sau đó phủ một lớp bột năng bên ngoài bột để tránh bột bị dính. Ngắt bột thành những cục nhỏ rồi vo viên có đường kính khoảng 0,5 cm.\r\nBắc một nồi nước, đun sôi, sau đó cho trân châu vào luộc, lúc luộc chú ý khuấy nhẹ tay để trân châu không bị dính vào đáy nồi. Khi thấy các viên trân châu nổi lên mặt nước thì vớt ra cho vào tô nước lạnh ngay để trân châu không bị dính. Tiếp đó vớt ra để ráo.\r\nTiếp theo, cho phần đường đen còn lại vào 150ml nước, đun trên lửa vừa cho đến khi sôi, để sôi khoảng 5 – 7 phút thì tắt bếp rồi cho trân châu vào ngâm khoảng 30 phút đến 1 tiếng cho thấm vị đường.', 'buoc2.jpg'),
(15, 'Bước 3: Trình bày \r\nMúc trân châu ra ly thủy tinh và rót sữa tươi vào, thêm đá viên vào là xong. ', 'buoc3.jpg'),
(16, 'Bước 1: Chần sườn \r\nSườn mua về rửa sạch, chặt khúc dài khoảng 5 cm, bắc nồi nước lên bếp cho thêm một muỗng canh muối hạt vào nước, khi nước sôi cho sườn vào chần qua rồi vớt ra để cho ráo nước. Bước này giúp loại bỏ bớt những chất bẩn còn sót lại trong sườn. \r\n', 'buoc1.jpg'),
(16, 'Bước 2: Ướp sườn \r\nSườn đã ráo, ta vớt ra tô lớn nêm vào nửa thìa bột nêm, 1 thìa nước mắm, thêm chút bột canh và thìa dầu ăn. Sau đó đảo đều tay để sườn ngấm đều gia vị. \r\n', 'buoc2.jpg'),
(16, 'Bước 3: Làm nước sốt\r\nTỏi và hành bóc vỏ rửa sạch, 1 quả ớt bỏ hạt rồi đem băm nhuyễn ( lượng ớt có thể tăng giảm tùy vào độ ăn cay của mỗi gia đình nha).\r\nLấy 1/2 bát nước lọc cho vào một tô khác, cho vào hai thìa đường, 3 thìa nước mắm, 1/2 thìa bột nêm, 2 thìa tương ớt, cho tỏi ớt hành đã băm nhuyễn vào hỗn hợp nước sốt trên rồi quấy đều cho tan hết bột nêm và đường.', 'buoc3.jpg'),
(16, 'Bước 4: Rán sườn \r\nĐặt chảo lên bếp, cho dầu vào đợi khi dầu nóng thì gắp sườn thả vào, rán qua sườn đến độ hơi ngả vàng là được. Các bạn chỉ chú ý khi rán sườn nha, vì nếu rán sườn lâu quá sườn sẽ mất độ ngọt và sẽ dai đấy ạ. Khi sườn ngả vàng gắp ra đĩa. \r\n', 'buoc4.jpg'),
(16, 'Bước 5: Chế biến sườn xào chua ngọt \r\nCà chua rửa sạch thái mỏng rồi cho vào chảo vừa rán sườn xào lên, cà chua mềm nhũn ra thì cùng lúc cho sườn và nước sốt vào đun cùng. \r\nCho 1/2 bát nước còn lại vào đảo sườn đều rồi đun nhỏ lửa đến khi nước sốt gần sệt lại thì tắt bếp. Cho nước cốt canh vào đảo đều, rắc thêm ít hành lá là chúng ta đã có món sườn xào chua ngọt thơm ngon rồi. \r\n', 'buoc5.jpg'),
(16, 'Bước 6: Bày món sườn xào chua ngọt và cùng thưởng thức\r\nKhi đã hoàn thành xong món ăn thì bày ra đĩa và trang trí theo sở thích của các bạn, có thể thêm vài nhánh mùi hành cho bắt mắt bạn nhé!\r\n', 'buoc6.jpg'),
(17, 'Bước 1: Đầu tiên ta vo gạo cho sạch rồi đổ nước vào đầy nồi, sau đó bắt nồi lên bếp và nấu đến khi cháo nhừ ra.', 'buoc1.jpg'),
(17, 'Bước 2: Trong khi đợi cháo nhừ ta sẽ ướp thịt bằm với hỗn hợp: 1 muỗng canh bột nêm, 1 muỗng canh đường, nửa muỗng canh muối và 1 muỗng cafe tiêu.', 'buoc2.jpg'),
(17, 'Bước 3: Rửa nấm rơm thật sạch và để ráo nước', 'buoc3.jpg'),
(17, 'Bước 4: Khi cháo đã nhừ ta cho thịt đã ướp và nấm rơm vào nồi rồi khuấy đều. đợi cháo sôi lại ta nêm cháo với hỗn hợp: 1 muỗng canh đường, 1 muỗng canh bột nêm, nửa muỗng canh muối và 1 muỗng cafe tiêu, khuấy cháo đều tay cho hỗn hợp tan rồi nhất nồi cháo xuống và múc ra chén thưởng thức thôi.', 'buoc4.jpg'),
(18, 'Bước 1: Trét bơ và tỏi lên bánh sandwich, các bạn nhớ là chỉ trét 1 mặt cho mỗi bánh như hình nhé.', 'buoc1.jpg'),
(18, 'Bước 2: Các bạn dùng chảo không dính nhé. Đặt chảo lên bếp, để lửa nhỏ. Sau đó, áp 2 miếng bánh sandwich vào chảo như hình. Kế đến, cho 2 lát phô mai cheddar lên bánh', 'buoc2.jpg'),
(18, 'Bước 3: Các bạn úp bánh lại với nhau, kiên nhẫn áp chảo bằng lửa nhỏ thì bánh mới nóng giòn và phô mai bên trong mới tan chảy nhé.', 'buoc3.jpg'),
(19, 'Bước 1: Rây bột cho mịn, sau đó thêm 1 chút xíu muối. Trộn đều. Sau đó cho nước sôi vào, đảo đều để được 1 khối bột. Kế Tiếp cho 1 ít dầu ăn vào, dùng tay trộn cho đều rồi ủ trong 10 phút. Sau đó, cắt bột thành từng viên, sau đó dùng cán hoặc ly thủy tinh cán mỏng. Càng mỏng thì bột sẽ càng ngon, ăn không bị ngán.', 'buoc1.jpg'),
(19, 'Bước 2: Cho giò sống, miến đã trụng qua nước sôi (cắt nhỏ), hành lá, trứng gà, trộn đều vào nhau. Cho vào 1 muỗng hạt nêm và tiêu, sau đó trộn tiếp.', 'buoc2.jpg'),
(19, 'Bước 3: Khi đã cán bánh xong rồi, thì cho nhân vào giữa bánh. Gập đôi lại rồi dùng ngón tay cái ấn phần đầu lại', 'buoc3.jpg'),
(19, 'Bước 4: Cho bánh vào nồi hấp, hấp khoảng 15 phút. Khi bánh trong lại, thấy được nhân bên trong thì bánh đã chín.', 'buoc4.jpg'),
(19, 'Bước 5: Cho 2 muỗng nước tương, 1 muỗng cafe đường, 2 muỗng nước lọc rồi đảo đều cho đường tan', 'buoc5.jpg'),
(20, 'Bước 1: Hủ tiếu các bạn cho vào nồi nấu cho chín, mềm rồi vớt ra xả với nước lạnh (để ăn sẽ ngon hơn).', 'buoc1.jpg'),
(20, 'Bước 2: Thịt rửa sạch với muối, cắt miếng vừa ăn. Xong đem chiên, mình chiên chung với trứng để đỡ tốn thời gian nha. Chiên cho thịt chín đều là được.', 'buoc2.jpg'),
(20, 'Bước 3: Bước cuối cùng chỉ cần làm mỡ hành là có thể ăn rồi. Cho dầu vào chảo, đợi dầu nóng, bạn đổ hành lá vào. Cho thêm 1 muỗng hạt nêm (hoặc muối cũng được, vì khi trộn mình không cho thêm 1 loại gia vị nào cả). Cho mỡ hành chín, thơm rồi vớt ra chén. Xong sau đó, bạn cho hủ tíu, trứng, thịt, mỡ hành vào tô. Khi ăn thì trộn đều lên (cho thêm 1 chút tiêu vào để ngon hơn nhé).', 'buoc3.jpg'),
(21, 'Bước 1: Cho 10g men vào 200ml nước ấm cho nổi bọt thì thêm vào tô đựng bột, nhào và cứ từ từ thêm nước đến khi bạn có một khối bột đồng nhất, không dính tay thì ủ bột khoảng 1 giờ cho bột nở ra gấp đôi', 'buoc1.jpg'),
(21, 'Bước 2: Đun nóng 10ml dầu ăn, cho hành tây cắt sợi vào chảo xào chín', 'buoc2.jpg'),
(21, 'Bước 3: Chia khối bột làm đôi và cán thành những tấm bột hình tròn có kích thước nhỏ hơn chiếc chảo 1 chút.', 'buoc3.jpg'),
(21, 'Bước 4: Phết đều 10ml dầu ăn vào lòng chảo rồi cho 1 miếng bột vào đun với lửa vừa khoảng 1 phút.', 'buoc4.jpg'),
(21, 'Bước 5: Khi bạn thấy mặt dưới tấm bột chuyển màu vàng thì dùng muỗng lật bánh. Tiếp đó dùng rưới nước sốt pizza lên mặt trên bánh, cho hành tây, ớt chuông và xúc xích cắt nhỏ cùng phô mai bào đều lên mặt bánh.', 'buoc5.jpg'),
(21, 'Bước 6: Đun nhỏ lửa và đậy nắp chảo. Đun bánh trong khoảng 4-5 phút. Trong lúc đun kiểm tra bánh, điều chỉnh lửa sao cho mặt dưới bánh chín vàng mà không bị cháy và phô mai đã tan chảy hết là được.', 'buoc6.jpg'),
(21, 'Bước 7: Lấy bánh ra và dùng dao cắt bánh thành những miếng vừa ăn.', 'buoc7.jpg'),
(22, 'Bước 1: Cải thìa tách bẹ, cắt đôi theo chiều dọc, ngâm nước muối rồi rửa sạch. Tôm bỏ đầu, rửa sạch', 'buoc1.jpg'),
(22, 'Bước 2: Luộc cải thìa chín tới với một ít muối. Vớt ra cho vào thau nước đá lạnh.', 'buoc2.jpg'),
(22, 'Bước 3: Vớt cải thìa ra, phần nước còn luộc cho thêm 1 chút dầu ăn => cho 3 lọn mì trứng vào luộc. Mì nở, vớt ra xả với nước lạnh.', 'buoc3.jpg'),
(22, 'Bước 4: Pha nước sốt xào: hoà tan hỗn hợp 2 muỗng canh xì dầu + 1 muỗng canh nước + 2 muỗng cafe đường + 1 muỗng canh tương ớt.', 'buoc4.jpg'),
(22, 'Bước 5: Phi thơm củ nén đập giập, cho tôm vào xào + 1 muỗng canh hỗn hợp nước sốt => Tiếp theo cho cải thìa vào + 1 muỗng canh nước sốt. Cuối cùng cho mì trứng + phần nước sốt còn lại vào và trộn đều một lần nữa. Thêm một chút tiêu và tắt bếp', 'buoc5.jpg'),
(22, 'Bước 6: Bày mì xào ra đĩa và thưởng thức.', 'buoc6.jpg'),
(23, 'Bước 1: Luộc măng tây vừa chín.', 'buoc1.jpg'),
(23, 'Bước 2: Cho mì trứng vào chần qua nước sôi cho mềm nhưng còn độ dai.', 'buoc2.jpg'),
(23, 'Bước 3: Ba chỉ, bắp bò luộc, thái mỏng ngâm nước mắm cho thấm (có thể chuẩn bị từ trước như món thịt muối).', 'buoc3.jpg'),
(23, 'Bước 4: Cho ít dầu ăn vào chảo chống dính tráng đều, cho vào hộp bò hầm, dằm nhỏ bò thành sợi, nêm ớt tỏi tiêu, một chút dầu hào, cho vào thịt luộc đã thái mỏng, có thể thêm tí nước nếu quá khô, đợi hỗn hợp sôi lên thì cho mì vào đảo đều nhẹ tay cho mì vừa chín không để mì bị nát', 'buoc4.jpg'),
(23, 'Bước 5: Lấy mì ra đĩa, sắp măng tây đã luộc lên, sắp lên bò hầm và thịt luộc, ớt tỏi kèm theo', 'buoc5.jpg'),
(24, 'Bước 1: Cà rốt nạo sạch vỏ rồi khứa hình bông hoa, thái miếng dày. Khoai tây nạo vỏ thái miếng to, rửa lại cho sạch. Cà chua thái hạt lựu.', 'buoc1.jpg'),
(24, 'Bước 2: Thịt bò rửa sạch sẽ, thái miếng to sau đó đun 1 nồi nước sôi thì cho thịt bò vào chần sơ qua, vớt ra rửa lại cho sạch. Cho thịt bò vào tô, thêm 1 muỗng canh nước mắm, 1/2 muỗng cà phê muối, 1/3 muỗng cà phê tiêu, gừng cạo vỏ đập dập, 1/2 chỗ tỏi băm, 1 gói ngũ vị hương, 2 muỗng cà phê đường, 400ml rượu vang, thanh quế sau đó trộn đều và ướp thịt 40 phút cho ngấm gia vị.', 'buoc2.jpg'),
(24, 'Bước 3: Đặt nồi lên bếp cùng với 2 muỗng canh dầu ăn, khi dầu nóng thì cho tỏi băm còn lại vào phi cho thơm. Sau đó, cho cà chua vào xào tới khi cà chua chín mềm mới đổ bát thịt bò đã ướp gia vị vào xào chung. Thêm tương cà và đổ nước sôi xâm xấp mặt thịt rồi hầm cho thịt bò chín mềm, cho khoai tây, cà rốt vào hầm thêm 10-15 phút nữa, nêm 2 muỗng cà phê hạt nêm, 1 muỗng cà phê bột ngọt cho vừa miệng là tắt bếp.', 'buoc3.jpg'),
(24, 'Bước 4: Thịt bò sốt vang béo thơm với thịt bò nhiều nạc, cắt thành những viên nhỏ, dễ dàng ngấm đều gia vị và hỗn hợp sốt rượu vang, tương cà, ... rất hẫn dẫn, chấm ăn cùng bánh mì nướng.', 'buoc4.jpg'),
(25, 'Bước 1: Các bạn cắt khoai tây thành sợi, sau đó ngâm nước muối nhé. Tôm mình làm sạch đầu đuôi, để vỏ', 'buoc1.jpg'),
(25, 'Bước 2: Pha bột chiên giòn 200gr với 170ml nước lọc', 'buoc2.jpg'),
(25, 'Bước 3: Cho tôm, khoai tây sợi vào hỗn hợp bột. Các bạn cắt nhỏ hành lá vào hỗn hợp cho thơm. Nêm hạt nêm, tiêu vào.', 'buoc3.jpg'),
(25, 'Bước 4: Các bạn chiên ngập dầu và để lửa nhỏ, bánh sẽ rất giòn ăn sẽ ngon hơn. Các bạn có thể ăn kèm tương ớt hoặc nước mắm pha tuỳ thích.', 'buoc4.jpg'),
(26, 'Bước 1: Để tiết kiệm thời gian, chúng ta chọn mua thịt heo xay sẵn ở chợ. Thịt xay (bằm) sẽ cho vào tô. Nấm mèo sẽ được thái và băm nhỏ. Thái nhỏ 1 củ hành hương. Các nguyên liệu sẽ được trộn đều cùng với 1 ít tiêu.', 'buoc1.jpg'),
(26, 'Bước 2: Hành lá và ngò sẽ được rửa sạch để ráo. Thái nhỏ hành lá và ngò cho vào chén để riêng. Bắt chảo lên, cho 1 ít dầu ăn vào chảo đợi nóng. Cho phần thịt xay vào chảo đảo đều cho chín (chú ý để lửa vừa). Cho tiếp phần hành đã thái nhỏ vào chảo xào chung (tắt bếp rồi mới cho hành vào để tránh hành bị quá chín). Để sang một bên.', 'buoc2.jpg'),
(26, 'Bước 3: Cho 2 chén nếp vào nồi vo sạch, cho 1/2 muỗng cà phê bột nghệ vào trộn với nếp để xôi thêm hương vị và có màu thu hút hơn (bạn có thể bỏ qua bước này nếu không hợp khẩu vị, chú ý chỉ cho ít bột nghệ thôi để tránh xôi quá hăng). Cho nước lấp xấp với bề mặt nếp (dể tránh xôi bị nhão). Nhấn nút và nấu thôi nào...', 'buoc3.jpg'),
(26, 'Bước 4: Khi nồi xôi vừa nhảy nút, cho phần thịt đã xào vào nồi và dùng đũa đảo đều cho thịt được trộn đều trong xôi. Đậy nắp và chờ đến khi xôi chín. Trong lúc đó, giã nhuyễn 1 ít ớt với tỏi. Cho 2 muỗng nước mắm và 1 muỗng canh đường vào đánh tan (xôi bình thường các bạn có thể thấy ăn kèm với nước tương. Nhưng ở đây chúng tôi không làm như thế :))... Ăn với nước mắm đậm đặc vừa ngọt vừa mặn ngon hơn rất nhiều).', 'buoc4.jpg'),
(26, 'Bước 5: Dọn ra đĩa. Cho một ít xôi ra đĩa nhỏ. Cho lên trên bề mặt 1 ít chà bông, 1 ít hành phi, 1 ít mỳ giòn (bánh mì cắt nhỏ chiên với dầu cho giòn để ráo) Và sau cùng rưới 1 ít nước mắm lên và cùng thưởng thức.', 'buoc5.jpg'),
(27, 'Bước 1: Nấm hương ngâm mềm, rửa sạch, vắt ráo, cắt đôi. Bí đỏ gọt vỏ, rửa sạch, cắt miếng vừa ăn', 'buoc1.jpg'),
(27, 'Bước 2: Bắt lên bếp khoảng 500ml nước, nước sôi thì chi hết nguyên liệu vào. Khi bí gần chín thì nêm hạt nêm, đươing, muối vào. Đến khi bí mềm thì cho hành, ngò, tiêu vào rồi tắt bếp.', 'buoc2.jpg'),
(27, 'Bước 3: Trình bày canh bí đỏ nấm hương ra bát và thưởng thức với cơm nhé!', 'buoc3.jpg'),
(28, 'Bước 1: Bào vỏ mướp, rửa sạch rồi cắt lát vừa ăn.', 'buoc1.jpg'),
(28, 'Bước 2: Nấu sôi 1 nồi nước. Khi nước sôi thì cho mướp vào nấu chín.', 'buoc2.jpg'),
(28, 'Bước 3: Khi mướp đã chín thì thêm bún tàu, gia vị vào nấu thêm 2 phút nữa cho bún nở, thêm đậu hũ cắt khôi nhỏ vào rồi tắt bếp.', 'buoc3.jpg'),
(28, 'Bước 4: Cho canh ra tô, thêm hành lá cắt nhỏ và thưởng thức. Canh mướp bún tàu dễ thực hiện mà rất thanh mát đúng không các bạn. Chúc các bạn ngon miệng nhé.', 'buoc4.jpg'),
(29, 'Bước 1: Ham chay cắt khúc, dùng tay bóp nhuyễn hoặc cho vào máy xay. Trộn đều ham chay bóp nhuyễn với gừng, tỏi băm, thìa là và củ năng. Thêm vào 2 muỗng cà phê muối, 1/2 muỗng cà phê đường, 1 muỗng cà phê tiêu trộn đều ướp khoảng 5-10 phút', 'buoc1.jpg'),
(29, 'Bước 2: Củ năng gọt vỏ, rửa sạch, cắt thành miếng nhỏ rồi xay nhuyễn.', 'buoc2.jpg'),
(29, 'Bước 3: Gừng, tỏi bóc vỏ, băm nhuyễn. Thì là rửa sạch, cắt nhỏ.', 'buoc3.jpg'),
(29, 'Bước 4: Dùng muỗng múc từng vắt chả vào lòng bàn tay và ấn dẹt, nặn thành hình tròn. Rắc 50g bột năng phủ bên ngoài để viên chả không bị nứt khi chiên.', 'buoc4.jpg'),
(29, 'Bước 5: Bắc chảo lên bếp, đổ dầu ăn ngập nửa lòng chảo. Đun dầu nóng, có bọt khí ở đáy chảo thì thả chả vào chiên vàng các mặt.', 'buoc5.jpg'),
(29, 'Bước 6: Chiên lần lượt cho đến hết chả, gắp ra đĩa ăn nóng với tương ớt.', 'buoc6.jpg'),
(30, 'Bước 1: Bóc vỏ hành tỏi rồi rửa sạch. Cắt khúc đầu hành, cắt lát ớt sừng rồi cho hành, tỏi, ớt vào phi thơm cùng ít dầu ăn trong nồi.', 'buoc1.jpg'),
(30, 'Bước 2: Khi các nguyên liệu đã thơm thì thêm các gia vị gồm: nước tương, đường, hạt nêm chay Knorr, bột ngọt, tiêu cùng ít nước lạnh rồi nấu sôi.', 'buoc2.jpg'),
(30, 'Bước 3: Thêm chả chay cắt khối vừa ăn vào, kho nhỏ lửa khoảng 20 phút cho chả thấm gia vị, xốt cạn, sệt thì tắt bếp.\r\n', 'buoc3.jpg'),
(30, 'Bước 4: Cho chả ra dĩa, thêm chén cơm nóng nữa là tuyệt cú mèo. Đừng nghĩ món chay là không ngon miệng nhé. Chúc các bạn thành công theo công thức của mình.', 'buoc4.jpg'),
(31, 'Bước 1: Trộn đều cơm nguội với hạt nêm chay Knorr, rau củ tổng hợp, hành lá cắt nhỏ, tiêu xay. Khi trộn, bóp nhẹ tay cho cơm tơi, rời hạt, thấm đều gia vị, hòa quyện nguyên liệu.', 'buoc1.jpg'),
(31, 'Bước 2: Cho một ít dầu ăn vào chảo, cho toàn bộ cơm đã trộn vào chiên. Vừa chiên, vừa đảo đến khi hạt cơm bông, tơi, xếp, rời thì tắt bếp.', 'buoc2.jpg'),
(31, 'Bước 3: Cho cơm chiên rau củ ngũ sắc ra dĩa dùng nóng cùng ít nước tương nữa là ngon hết sẩy. Chúc các bạn ngon miệng nhé.', 'buoc3.jpg'),
(32, 'Bước 1: Băm nhỏ tỏi. Rửa sạch, bào vỏ rồi cắt sợi su su. Bào vỏ và cắt sợi cà rốt. Cho dầu ăn vào chảo, phi thơm tỏi băm đến khi tỏi thơm thì cho cà rốt, su su vào xào chín', 'buoc1.jpg'),
(32, 'Bước 2: Khi cà rốt, su su chín thì thêm tiếp nấm vào xào chung. Nêm vào hạt nêm, nước tương và đường, đảo đều tay với lửa lớn đến khi su su, cà rốt, nấm chín thì tắt bếp.', 'buoc2.jpg'),
(32, 'Bước 3: Rửa sạch xà lách, để ráo nước. Trải xà lách ra, thêm rau củ xào lên trên, cuốn lại rồi dùng hành lá đã trụng sơ qua nước sôi cột lại thành cuộn. Thêm chén nước tương nữa là hoàn tất món ăn. Đừng nghĩ món chay đơn giản như này là không ngon miệng nhé. Chúc các bạn thành công theo công thức này nhé.', 'buoc3.jpg'),
(33, 'Bước 1: Cho tất cả gia vị gồm: nước mắm chay, hạt nêm chay Knorr, đường, tỏi băm, tương ớt, tương cà và 20ml nước lạnh vào nấu sôi cho tan gia vị.', 'buoc1.jpg'),
(33, 'Bước 2: Cắt nhỏ ớt chuông thành các khối vuông vừa ăn rồi cho vào chảo, đảo đều.', 'buoc2.jpg'),
(33, 'Bước 3: Khi ớt chuông gần chín, thêm tiếp đậu hũ chiên vào đảo đều tay, đến khi đậu hủ thấm xốt lúc lắc thì tắt bếp.', 'buoc3.jpg'),
(33, 'Bước 4: Cho đậu hũ lúc lắc ra dĩa và thưởng thức các bạn nhé. Chúc các bạn thành công theo công thức này nhé.', 'buoc4.jpg'),
(34, 'Bước 1: Làm 30ml nóng dầu trong chảo rồi cho hành vào phi thơm. Sau đó lần lượt cho vào chảo: gừng, cà rốt, nấm hương. Xào nhanh với lửa lớn.', 'buoc1.jpg'),
(34, 'Bước 2: Đậu hũ non rửa sạch và cắt khoanh nhỏ. Sau đó, xếp các khoanh đậu đã cắt vào nồi om nhỏ.', 'buoc2.jpg'),
(34, 'Bước 3: Nấm hương bỏ cuống và khía mặt nấm làm 4 để nấm thấm gia vị. Thái nhỏ cà rốt, gừng và hành tím. Cà rốt tỉa hoa rồi cắt lát mỏng.', 'buoc3.jpg'),
(34, 'Bước 4: Cho thêm rượu gạo vào, đảo đều. Nêm 2 muỗng cà phê hạt nêm chay, 1/2 muỗng canh dầu hào chay và 1/4 muỗng cà phê tiêu', 'buoc4.jpg'),
(34, 'Bước 5: Cho bột bắp (đã hoà với 1 chén nước) vào chảo, đảo đều cho hỗn hợp hơi sệt lại rồi tắt bếp. Rưới hỗn hợp đã xào lên nồi đậu hũ non. Om nồi đậu hũ trong khoảng 15 phút để đậu thấm gia vị rồi tắt bếp', 'buoc5.jpg'),
(34, 'Bước 6: Cho ra đĩa, trang trí thêm với ngò và tiêu, thưởng thức ngay với cơm nóng nhé!', 'buoc6.jpg'),
(35, 'Bước 1: Ngâm nở nấm mèo, rồi trụng qua nước sôi cho sạch, sau đó băm nhỏ. Ngâm nở bún tàu rồi cắt nhỏ 1cm. Cho đậu hũ vào tô, thêm nấm mèo, bún tàu và 10gr hạt nêm chay Knorr vào trộn đều thành khối kết dính.', 'buoc1.jpg'),
(35, 'Bước 2: Khổ qua rửa sạch rồi trụng qua nước sôi có một ít muối và ớt 30 giây, sau đó ngâm nước đá cho nguội. Vớt khổ qua ra rồi cắt khúc dày 2cm. Khéo léo khoét bỏ ruột khổ qua, nhồi nhân đã trộn vào trong. Với cách làm này, khổ qua sẽ mềm và bớt đắng khi hấp.', 'buoc2.jpg'),
(35, 'Bước 3: Chuẩn bị một cái chảo, cho gia vị gồm: 5gr hạt nêm chay Knorr, 40ml nước tương, 10gr đường, tiêu xay, bột ớt, muối vào chảo, nấu tan gia vị.', 'buoc3.jpg'),
(35, 'Bước 4: Cho các khoanh khổ qua nhồi vào chảo rim với lửa to 1 phút mỗi mặt để phần nhân cố định, sau đó thêm nước khoảng 1/2 khổ qua, đậy nắp và rim nhỏ lửa đến khi khổ qua chín, mềm, thấm vị thì tắt bếp.', 'buoc4.jpg'),
(35, 'Bước 5: Cho khổ qua nhồi kho nước tương hấp ra dĩa, dùng kèm cơm nóng. Khổ qua mềm, đăng đắng có phần nhân đậu hũ beo béo, nấm mèo dai dai, vị mằn mặn. Đừng nghĩ món chay là không ngon miệng nhé. Chúc các bạn thành công theo công thức của mình.', 'buoc5.jpg'),
(36, 'Bước 1: Nấm sò cắt phần rễ, rửa sạch với nước, để ráo - xóc với 1 ít bột nêm.', 'buoc1.jpg'),
(36, 'Bước 2: Trút bột chiên giòn ra tô, khuấy đều với nước cho hỗn hợp bột sệt.', 'buoc2.jpg'),
(36, 'Bước 3: Nhúng nấm sò vào hỗn hợp bột và chiên với lửa nhỏ. Hoặc để nhanh gọn, không bị văng dầu khi đứng cạnh bếp lâu, bạn có thể trộn đều hỗn hợp bột chiên giòn đã khuấy với nấm - rồi múc cho vào chảo chiên như rán trứng. Khi mặt này vàng thì trở sáng mặt còn lại.', 'buoc3.jpg'),
(36, 'Bước 4: Nấm chiên vàng chấm cùng tương ớt và sốt mayonnaise.', 'buoc4.jpg'),
(37, 'Bước 1: Sơ chế nguyên liệu \r\n– Ghẹ rửa sạch, chuẩn bị nồi hấp để hấp ghẹ.\r\n– Xương rửa sạch, chần qua nước sôi 1 phút, xả lại dưới vòi nước.\r\n– Hành lá cắt rễ rửa sạch, thái nhỏ.\r\n– Hành khô bóc vỏ, băm nhỏ. Sả bóc hết vỏ, rửa sạch đập dập.\r\n– Rau thơm, rau sống nhặt rửa sạch. Giá đỗ rửa sạch.\r\n', 'buoc1.jpg'),
(37, 'Bước 2: Làm nước dùng canh ghẹ\r\n– Xương rửa sạch rồi cho vào nồi, cho thêm 1 muỗng canh muối, hành tím băm vào ninh. Ninh xương trong 30 phút cho xương mềm và ra nước ngọt, cho thêm vài cọng sả để nước dùng thơm hơn.\r\n', 'buoc2.jpg'),
(37, 'Bước 3: Ghẹ bóc lấy thịt\r\n– Trong lúc ninh xương, cho ghẹ vào hấp chín.\r\n– Ghẹ chín, tách chân, thân, lọc thịt, gạch ra hết. Khi tách lấy thịt ghẹ cẩn thận không để ghẹ bị nát.\r\n', 'buoc3.jpg'),
(37, 'Bước 4: Làm sợi bánh canh \r\n– Cho bột năng và bột gạo vào hòa với 200ml nước rồi cho lên bếp đun. Vừa đun vừa khuấy cho đến khi hỗn hợp đặc lại thì tắt bếp.\r\n– Tiếp tục khuấy hỗn hợp cho quyện thành 1 khối đặc nửa sống nửa chín. Cho tất cả vào một túi bắt bông kem, tùy vào sở thích sợi bánh canh to hay nhỏ mà cắt đầu túi to hoặc nhỏ.\r\n– Đặt nồi nước lên bếp, đun sôi rồi dùng tay bóp nhẹ túi bắt bông kem để được từng sợi bánh canh rơi vào nồi nước sôi. Nếu lượng bột nhiều thì chia thành 2 – 3 lần làm.\r\n– Đun những sợi bánh canh đến khi nổi lên mặt nước thì vớt ra.\r\n', 'buoc4.jpg'),
(37, 'Bước 5: Nấu bánh canh ghẹ \r\n– Hạt điều cho vào chảo có dầu ăn đun sôi, đảo cho đến khi hạt điều ra màu đỏ thì vớt bỏ hạt.\r\n– Thêm hành khô phi thơm rồi cho thịt ghẹ vào xào cùng. Thêm nước xương ninh cùng sả vào đun sôi nhẹ nồi nước dùng trên bếp và nêm nếm lại cho vừa ăn.\r\n– Hòa tan bột năng bằng nước lạnh, thêm 200ml nước cốt dừa và đổ từ từ hỗn hợp bột năng nước cốt dừa vào nồi nước dùng đang sôi nhẹ trên bếp, vừa đổ vừa khuấy để nước dụng có độ sánh và béo.\r\n– Cho bánh canh ra tô, thêm giá đỗ, hành lá rồi chan nước dùng ghẹ vào.\r\n', 'buoc5.jpg'),
(38, 'Bước 1: Sơ chế thịt gà\r\nThịt gà ngâm trong nước khoảng nửa tiếng để loại bỏ tạp chất cùng phần máu dính trên thịt.\r\nRút xương phần đùi gà, chỉ lấy phần thịt.', 'buoc1.jpg'),
(38, 'Bước 2: Ướp gà\r\nƯớp gà cùng rượu nấu ăn, tiêu đen và gia vị trong ít nhất 10 phút.\r\nTrộn các thành phần nguyên liệu của sốt để tạo thành sốt teriyaki như đã kể trên.', 'buoc2.jpg'),
(38, 'Bước 3: Luộc rau củ\r\n\r\nSúp lơ, cà rốt, ngô bao tử luộc chín. Có thể lựa chọn loại rau khác tùy thích.\r\n\r\n', 'buoc3.jpg'),
(38, 'Bước 4: Chiên gà\r\n\r\nCho một chút dầu vào chảo, bỏ thịt gà vào chiên vàng đều 2 mặt.\r\nRưới sốt teriyaki lên gà, đậy nắp và đun nhỏ lửa trong khoảng 5 phút. Sau khi gà chín, lấy ra thái miếng theo thớ thịt.', 'buoc4.jpg'),
(39, 'Bước 1: Cho thịt gà vào bát, thêm bia, mật ong, tỏi, xì dầu, mù tạt, ớt, tiêu đen vào, trộn đều.\r\nCho thịt gà vào ướp trong tủ lạnh ít nhất 1 giờ.', 'buoc1.jpg'),
(39, 'Bước 2: Sau đó, xiên thịt gà vào các que tre, để sang một bên.', 'buoc2.jpg'),
(39, 'Bước 3: Làm nóng chảo, cho ít dầu, thêm hành khô vào xào, sau đó đổ nước ướp gà vào chảo, đun cho sệt lại.', 'buoc3.jpg'),
(39, 'Bước 4: Làm nóng lò nướng ở nhiệt độ cao một chút, cho các xiên thịt gà vào nướng, phết sốt đã đun ban nãy lên trên. Trong quá trình nướng, lật gà 1 lần và phết sốt lên, rồi nướng chín gà.', 'buoc4.jpg'),
(40, 'Bước 1: Sơ chế sườn\r\nSườn chặt khúc dài 4 – 5cm, rửa sạch dưới vòi nước. Đổ sườn vào ngâm trong nước cùng 1 thìa canh rượu nấu ăn để khử mùi hôi và tạp chất trong 30 phút. Sau thời gian này, đổ nước đi, rửa sườn một lần nữa và thấm khô.\r\n\r\n', 'buoc1.jpg'),
(40, 'Bước 2: Chuẩn bị phụ liệu\r\n\r\nBăm nhuyễn hành và tỏi.', 'buoc2.jpg'),
(40, 'Bước 3: Ướp sườn\r\n\r\nCho sườn vào tô lớn. Thêm hành, tỏi, gia vị, dầu hào vào trộn đều. Ướp sườn trong ít nhất 2 tiếng.', 'buoc3.jpg'),
(40, 'Bước 4: Nướng sườn\r\n\r\nVớt sườn ra khỏi bát, cho vào nồi chiên không dầu đã được lót sẵn một lớp giấy bạc.', 'buoc4.jpg'),
(41, 'Đầu tiên cho tỏi vào trong túi, đập nát sau đó tách vỏ, để trong túi như vậy khi đập tỏi sẽ không văng tứ tung.', 'buoc1.jpg'),
(41, 'Gà rửa sạch rồi cho tỏi và trong, chuẩn bị nồi sắt.\r\n\r\nSau đó nhét tim và nội tạng lòng mề gà ở phía ngoài cùng để đóng kín bụng gà, giúp cho tỏi thẩm thấu sâu vào thịt gà.', 'buoc2.jpg'),
(41, 'Dùng lượng muối thích hợp xát ngoài thân gà, sau đó ấn ngoài thân cho gia vị ngấm.\r\n\r\nSau khi gia vị ngấm thì cho gà vào nồi, nhớ là trước đó phải cho 2 cốc nước vào. Đậy nồi để tránh bay hơi làm mất hương vị của gà. Ấn nút sau đó đợi nhảy nút là hoàn thành.', 'buoc3.jpg'),
(42, 'Bước 1: Sơ chế cá\r\n\r\n– Cá rửa sạch, cạo hết vảy. Dùng khăn hoặc giấy thấm hết phần nhớt bên ngoài. Mổ bụng cá, làm sạch. Tiếp tục dùng giấy hoặc khăn thấm sạch phần máu và nước đọng bên trong. Lọc riêng lấy phần thịt cá, cắt thành những miếng kích cỡ 4x8cm thành từng khúc nhỏ', 'buoc1.jpg'),
(42, 'Bước 2: Ướp cá\r\n\r\n– Tỏi, gừng thái lát.\r\n\r\n– Ướp cá với rượu trắng, gừng, tỏi, ½ thìa cà phê hạt tiêu và ½ thìa bột ớt trong khoảng 30 phút. Phần tiêu và ớt bột có thể điều chỉnh tùy vào khả năng ăn cay của gia đình.', 'buoc2.jpg'),
(42, 'Bước 3: Chế biến sốt\r\n\r\n– Trộn xì dầu và mật ong theo tỷ lệ 2:1, để riêng.\r\n\r\n', 'buoc3.jpg'),
(42, 'Bước 4: Nướng cá\r\n\r\n– Làm nóng lò nướng trước khi đưa cá vào lò 10 phút, ở nhiệt độ 210 độ C, chế độ 2 dàn nướng.\r\n\r\n– Lót một lớp giấy bạc lên khay nướng, quết một lớp dầu mỏng lên mặt giấy bạc.\r\n\r\n– Đặt từng khúc cá lên khay, để lại phần tỏi, gừng đã ướp, quết đầu một lớp dầu mỏng lên cá.\r\n\r\n– Nướng cá ở nhiệt độ 210 C độ trong 15 phút. Trong quá trình nướng, có thể quết thêm một lần dầu.\r\n\r\n– Sau 15 phút, quết lên mình cá phần nước sốt đã chuẩn bị sẵn. Rắc thêm một chút lá hương thảo khô.\r\n\r\n– Băm nhỏ phần tỏi, gừng đã dùng để ướp cá trước đó. Đổ dầu vào chảo, phi thơm phần tỏi, gừng này. Rưới phần gừng, tỏi phi cùng chút dầu trong chảo vừa phi lên mình cá.', 'buoc4.jpg'),
(43, 'Nhái lựa những con lớn đem bỏ chân, đầu, ruột, da, chỉ lấy phần lưng và hai đùi mập mạp rửa cho thật sạch. Sau đó bằm nhuyễn với ít muối, đường cùng sả cây.', 'buoc1.jpg'),
(43, 'Trộn thật đều nấm, hành với nhái đã bằm cho thật nhuyễn rồi cuốn vào lá lốt. Khi cuốn phải thật khéo léo và chặt tay để cuốn chả không bị bung ra. Chả được cố định thành từng xâu vào tăm tre cho dễ thao tác khi chiên.', 'buoc2.jpg'),
(43, 'Canh chảo dần nóng già, lần lượt cho từng xâu chả vào chiên. Chiên chả nhái nhớ canh lửa thật vừa để cuốn chả được chín đều, lửa nhỏ thường làm món chả bị dai, còn lửa to chả dễ cháy, khô mất ngon. Khi lá lốt bắt đầu chuyển màu, hơi xém cạnh thì vớt chả ra để ráo dầu.', 'buoc3.jpg'),
(44, 'Gạo nếp vo sạch nấu thành xôi rồi để nguội. Cho gạo nếp vào bát, thêm thịt băm, hành lá thái nhỏ, trứng, muối, nước tương, gừng.\r\n\r\nTrộn đều các nguyên liệu và để yên 30 phút cho các nguyên liệu ngấm vào xôi.\r\n\r\n', 'buoc1.jpg'),
(44, 'Viên xôi thành từng viên tròn nhỏ.\r\n\r\nQuét một lớp mỏng dầu ăn vào khuôn nướng điện, cho viên xôi vào nướng trong khoảng 10 phút là chín vàng giòn. Nếu không có khuôn nướng điện thì bạn viên xôi lại rồi chiên ngập trong dầu ăn cũng được nhé!', 'buoc2.jpg'),
(45, '– Thịt rửa sạch lau khô để ráo. Tiếp đó ướp 2 thìa tỏi băm, 2 thìa hành tím băm, 2 thìa nước mắm ngon, 1 thìa cà phê tiêu sọ đập dập, 2 thìa cà phê bột ngọt.\r\n\r\nSau khi cho các loại gia vị vào đảo đều lên và để 30 phút cho thịt thấm đẫm gia vị. \r\n\r\n', 'buoc1.jpg'),
(45, '– Bắc chảo lên bếp, vặn lửa vừa và cho thêm chút dầu ăn.\r\n\r\nChiên thịt cho đến khi chín 2 mặt vàng đều. Lưu ý trong quá trình chiên thỉnh thoảng lật miếng thịt để chín đều các bên.\r\n\r\nTrong quá trình chiên lưu ý cho toàn bộ gia vị đã ướp thịt vào chảo chiên cùng. Chính những gia vị này sẽ giúp miếng thịt thêm thơm ngon hơn.\r\n\r\nThịt chín, đổ nước dừa vào chảo, đậy nắp lại và vặn lửa nhỏ cho sôi liu riu đến khi thịt cạn nước. Thỉnh thoảng nên lật thịt, múc thêm tỏi băm, hành tím dưới đáy chảo rưới lên miếng thịt.', 'buoc2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_20_144520_create_mon_ans_table', 1),
(4, '2020_11_20_144546_create_huong_dans_table', 1),
(5, '2020_11_20_144557_create_danh_mucs_table', 1),
(6, '2020_11_20_144636_create_mon_an_da_thiches_table', 1),
(7, '2020_11_20_144648_create_binh_luans_table', 1),
(8, '2020_12_03_105748_create_tai_khoans_table', 1),
(9, '2020_12_03_105749_add__foreign__key', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

DROP TABLE IF EXISTS `monan`;
CREATE TABLE IF NOT EXISTS `monan` (
  `MaMon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TenMon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnhDaiDien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` longtext COLLATE utf8mb4_unicode_ci,
  `DoKho` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThoiGianNau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NguyenLieu` text COLLATE utf8mb4_unicode_ci,
  `LuotXem` int(11) NOT NULL,
  `LuotThich` int(11) NOT NULL,
  `NguoiTao` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoaiMon` int(10) UNSIGNED NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaMon`),
  KEY `monan_nguoitao_foreign` (`NguoiTao`),
  KEY `monan_loaimon_foreign` (`LoaiMon`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`MaMon`, `TenMon`, `AnhDaiDien`, `MoTa`, `DoKho`, `ThoiGianNau`, `NguyenLieu`, `LuotXem`, `LuotThich`, `NguoiTao`, `LoaiMon`, `TrangThai`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Canh Cua', 'anhdaidien.jpg', 'Bánh canh cua là món ăn quen thuộc với nhiều người. Vị dai dai của sợi bánh, ngọt thanh của nước lèo và mùi thơm đặc trưng của thịt cua đã làm nên nhiều điều hấp dẫn cho món ăn này. Tuy cách làm đơn giản, không quá cầu kỳ nhưng hương vị của bánh canh cua luôn chiếm được cảm tình của nhiều người. Xì xụp húp một muỗn bánh canh cua bạn sẽ từ từ cảm nhận vị ngon của những cọng bánh làm bằng bột lọc trơn tuột, những thớ thịt cua trắng phau, con tôm tươi rói , nấm rơm thơm ngọt…cùng nước dùng sền sệt, cay cay ngon đến mê ly. ', 'Trung bình', '1 giờ', '300gr xương heo\r\n200 gr thịt đùi heo (hoặc giò heo)\r\n200gr thịt cua\r\n200gr tôm sú\r\n200gr nấm rơm\r\n50gr hành lá và ngò rí có rể½ kg bánh canh bột gạo\r\n04 củ hành khô½ chén bột năng\r\nDầu màu điều, gia vị nêm nếm gồm: nước mắm, muối, đường, tiêu, dầu ăn.', 0, 0, 'KieuNga', 1, 1, NULL, NULL),
(2, 'Bánh Mì Chảo', 'anhdaidien.jpg', 'Không chỉ là món ăn hấp dẫn của giới trẻ sành ăn, món bánh mì chảo hiện nay đã trở nên cực kỳ phổ biến và chinh phục vị giác nhiều người. Hương vị hòa quyện giữa xúc xích, trứng, pate, thịt bò mềm… đắm chìm trong nước xốt đậm đà, sánh mịn khó quên.', 'Trung bình', '30 phút', '1 cái xúc xích xông khói\r\n1 quả trứng gà\r\n2 quả cà chua\r\n50g pate\r\nDưa leo, hành, ớt, rau thơmTiêu, đường, dầu ăn1 – 2 cái bánh mì tùy theo khẩu phần', 0, 0, 'KieuNga', 9, 1, NULL, NULL),
(3, 'Bánh Tráng Trộn', 'anhdaidien.jpg', 'Vị dai của bánh tráng, chua của xoài, đậm vị bò khô, rau răm… khiến bao người Sài Gòn coi đây là món ăn vặt tuyệt vời nhất.Không cần đến cửa hàng hay tìm những gánh hàng rong bạn mới có thể thưởng thức được món bánh tráng trộn yêu thích. Bạn hoàn toàn có thể tự tay chế biến món ăn này để nhâm nhi cùng cả nhà.', 'Dễ', '10 phút', '1 gói bánh tráng\r\nXoài xanh một quả\r\nHành khô\r\nMột mớ rau răm, quất (tắc)\r\nLạc (đậu phộng)\r\nThịt bò khô\r\nTép hoặc tôm đồng nhỏ\r\nTrứng chim cút\r\nGia vị: xì dầu, sa tế, muối ớt ', 0, 0, 'KieuNga', 9, 1, NULL, NULL),
(4, 'Bánh Xèo Miền Nam', 'anhdaidien.jpg', 'Nếu như bánh xèo miền Trung được đổ trong khuôn bằng gang nhỏ, phần vỏ bánh dày và nước chấm có phần đậm đà hơn thì món bánh xèo miền Nam lại gây ấn tượng với kích thước lớn, viền bánh mềm và giòn rụm.', 'Trung bình', '1 giờ 5 phút', '500g bột gạo hoặc bột bánh xèo mua sẵn\r\n3 thìa cà phê nghệ\r\nNước cốt dừa\r\n1 chén cơm nguội\r\n400g tôm\r\n400g thịt ba rọi\r\n500g nấm rơm (hoặc cũng có thể thay thế bằng các loại nấm khác)\r\n400g giá\r\n2 củ hành tây\r\nNước mắm\r\nỚt sừng và tỏi băm nhuyễn\r\nChanh hoặc giấm chua\r\nĐường\r\nXà lách, cải cay\r\nCác loại rau thơm: húng quế, tía tô, diếp cá,…', 0, 0, 'KieuNga', 6, 1, NULL, NULL),
(5, 'BibimBap', 'anhdaidien.jpg', 'Bibimbap là món cơm trộn tràn đầy màu sắc lẫn hương vị, một món ăn không thể thiếu khi chúng ta nhắc đến ẩm thực Hàn Quốc. Điếm độc đáo, ấn tượng của món ăn chính là thành phần nguyên liệu, gia vị kết hợp. Cơm trộn đậm đà, thêm từng miếng thịt bò mềm đủ chín tới, rau củ hài hòa, kim chi cay cay thật xuýt xoa. Và đương nhiên không thể thiếu một miếng trứng ốp la lòng đào tươi rói, rưới nước sốt lên trên, trộn đều là có thể thưởng thức ngay rồi. Không cần đi đâu xa bạn vẫn có thể làm cơm trộn Bibimbap tại nhà đúng kiểu Hàn Quốc.', 'Khó', '30 phút', '2 chén cơm\r\n100gr thịt bò\r\n80gr cà rốt \r\n80gr giá đỗ\r\n80gr nấm đông cô \r\n80gr bí ngòi\r\n80gr cải bó xôi \r\n80gr kim chi cải thảo\r\n1 quả trứng gà\r\nMè trắng rang\r\n2 muỗng canh tương ớt Hàn Quốc (Gochujang)\r\n1/3 trái táo \r\n1/2 củ hành tây\r\n1/2 trái chanh\r\n1 muỗng canh rượu Mirin\r\n1/2 muỗng canh nước tương Hàn Quốc \r\n1 muỗng canh dầu mè\r\n1/2 muỗng canh đường nâu\r\n1/2 muỗng canh siro bắp\r\n1/4 muỗng cà phê tiêu\r\n3 muỗng canh dầu ăn\r\n1 muỗng cà phê muối\r\n5 muỗng cà phê dầu mè\r\n2.5 muỗng cà phê muối tiêu\r\n\r\nGia vị ướp thịt bò:\r\n1/2 muỗng canh dầu mè\r\n1/2 muỗng canh đường nâu\r\n1 muỗng canh rượu Mirin \r\n12 muỗng canh nước tương Hàn Quốc\r\n1/4 muỗng cà phê tiêu\r\n\r\nGia vị nêm:\r\n3 muỗng canh dầu ăn\r\n1 muỗng cà phê muối', 0, 0, 'KieuNga', 9, 1, NULL, NULL),
(6, 'Bún Bò Huế', 'anhdaidien.jpg', 'Bún Bò Huế là đặc sản đặc trưng của xứ Huế, điểm riêng tạo nên sự khác biệt của món bún này là sợi to, nước lèo có màu đỏ cam, vị cay nồng, lát thịt bò mỏng, to bản ăn kèm với rau chuối. Để nấu món bún bò Huế cần thực sự tỉ mỉ ngay từ khâu chọn đồ cũng như gia vị', 'Trung bình', '1 giờ', '600g bắp bò\r\n600g nạm bò\r\n400g gân bò\r\n1 cái giò heo (chọn giò trước) (khoảng 800g)\r\n1kg xương ống hoặc xương giá\r\n3 muỗng canh mắm ruốc Huế\r\n6 cây sả\r\n1 nhánh gừng nhỏ (50g)\r\nHành tím, tỏ\r\nBún, rau sống, rau chuối thái lát mỏng, rau muống chẻ…\r\nChả Huế (tùy thích)\r\nỚt, sa tế', 0, 0, 'KieuNga', 1, 1, NULL, NULL),
(7, 'Bún Đậu Mắm Tôm', 'anhdaidien.jpg', 'Món bún đậu mắm tôm tuy có nhiều thành phần nguyên liệu nhưng lại vô cùng dễ làm và là món ăn kết nối gia đình vào dịp cuối tuần thật thú vị, chúng ta hãy cùng vào bếp và làm ngay thôi!', 'Trung bình', '35 phút', 'Đậu hũ chiên 10 miếng\r\nThịt ba chỉ 500 gr\r\nChả cốm 300 gr\r\nBún tươi 1 kg\r\nMắm tôm 1/2 chén\r\nỚt băm 1 muỗng cà phê\r\nNước cốt chanh 1 muỗng canh\r\nĐường trắng 1 muỗng canh\r\nBột ngọt 1 muỗng cà phê\r\nDầu ăn 6 muỗng canh\r\nTía tô 100 gr\r\nRau thơm các loại 50 gr \r\nDưa leo 200 gr', 0, 0, 'KieuNga', 9, 1, NULL, NULL),
(8, 'Cá Lóc Kho Tộ', 'anhdaidien.jpg', 'Cá là nguyên liệu bổ dưỡng và không thể thiếu trong bữa cơm của người Việt. Ăn cá thường xuyên rất tốt cho sức khỏe, hơn nữa cá là thức ăn dễ tiêu hóa, có tác dụng chống lão hóa với người lớn tuổi và phát triển trí não với trẻ nhỏ.Cá có thể chế biến được thành nhiều món ăn hấp dẫn như canh cá, cá hấp, cá nướng, cá kho... trong đó cá kho là quen thuộc nhất.Trước đây, người Việt thường dùng tộ để kho cá tuy nhiên hiện nay cá có thể dùng nồi nào cũng kho được, tuy nhiên kho tộ vẫn đem lại hương vị đặc trưng. Cá nào cũng có thể kho tộ, trong đó cá lóc kho tộ cũng rất ngon. Cá sẽ có hương vị đậm đà, thơm ngon sẽ có một sức hấp dẫn, lôi cuốn đặc biệt đối với các thành viên trong gia đình bạn.', 'Trung bình', '1 giờ', '1 con cá lóc (1kg), mổ sạch, cắt khúc vừa ăn\r\n4 nhánh hành lá\r\n4 củ hành khô\r\n½ muỗng cà phê cốt dừa caramel (hoặc kẹo đắng, nước hàng)\r\nHạt tiêu đen\r\n2 quả ớt, thái lát\r\nNước mắm, đường, dầu ăn vừa đủ.', 0, 0, 'KieuNga', 4, 1, NULL, NULL),
(9, 'Cafe Dalgona', 'anhdaidien.jpg', 'Cà phê bọt biển là tên gọi của một loại thức uống được nhiều bạn trẻ săn đón trong thời gian gần đây. Loại cà phê này gây ấn tượng bởi lớp bọt mịn phía trên. Đó không phải là kem, đó là cà phê hòa tan với đường và được đánh bông lên. Nếu bạn không có máy đánh trứng, bạn có thể tự đánh bông bằng cây đánh trứng. Và tương truyền nếu bạn đánh đúng 400 lần, lớp bông cà phê đó sẽ đạt tỷ lệ ngon nhất.', 'Dễ', '15 phút', 'Cafe đen pha phin hoặc 2 gói cà phê đen hòa tan\r\n40g đường trắng\r\nNước sôi\r\n100ml sữa tươi hoặc 30ml sữa đặc\r\nDụng cụ: Máy xay sinh tố, tô, thìa đong, phin cafe.', 0, 0, 'KieuNga', 8, 1, NULL, NULL),
(10, 'Canh Chua Cá Lóc', 'anhdaidien.jpg', 'Món canh chua cá lóc là món ăn dân dã quen thuộc với người dân Việt đặc biệt là những vùng quê, sông nước, đồng ruộng. Món canh chua cá lóc có nhiều cách chế biến tùy theo những đặc trưng của từng vùng ở miền Bắc, miền Nam, miền Tây hay miền Trung. Để làm món canh chua này thơm ngon chuẩn vị không bị tanh cũng cần có bí quyết. ', 'Trung bình', '40 phút', 'Cá lóc (cá quả): 800gr (Nên chọn cá có mắt trong sáng, mang cá đỏ hồng, bề ngoài sáng bóng, ấn vào thân có sự đàn hồi tốt thịt khá chắc) \r\nDứa: 1 quả\r\nCà chua: 2 quả\r\nMe chín 2 quả\r\nHành, ớt, tỏi, rau răm, thì là\r\nGia vị: mắm, muối, hạt nêm, dầu ăn, bột tiêu,...', 0, 0, 'KieuNga', 1, 1, NULL, NULL),
(11, 'Cơm Chiên Hải Sản', 'anhdaidien.jpg', 'Món cơm chiên hoàn hảo là khi hạt cơm không quá mềm cũng không quá khô. Hạt cơm rời chứ không dính bết lại với nhau. Hải sản, rau củ, trứng và cơm có vị hơi nhạt để khi ăn chan thêm một ít nước tương nữa là thành một món ăn ngon vừa miệng.', 'Trung bình', '35 phút', 'Cơm trắng: 4 bát con (có thể dùng cơm mới nấu chín hoặc cơm nguội đều được)\r\nDậu Hà Lan: 100gr (đậu cô ve cũng được)\r\nTôm sú: 100gr\r\nMực ống tươi: 200gr\r\nTrứng gà: 4 quả\r\nHành tím: 2 củ\r\nHành lá: 1 nhánh\r\nCà rốt: 1 củ\r\nGia vị: dầu ăn, muối, hạt nêm, bột ngọt, xì dầu (nước tương)', 0, 0, 'KieuNga', 5, 1, NULL, NULL),
(12, 'Japchae Miến Trộn Hàn Quốc', 'anhdaidien.jpg', 'Miến trộn Hàn Quốc – Japchae là một trong những món ăn cung đình, trước đây thường chỉ được dâng lên nhà vua; nay đã trở nên phổ biến trong bữa ăn hằng ngày của người dân Hàn Quốc. Cùng với kimbap, gimbap, bibimbap… miến trộn là món ăn nổi tiếng của Hàn Quốc được yêu thích ở nhiều quốc gia trên thế giới. Nguyên liệu chính của món ăn này là miến, thịt (thường là thịt bò) cùng các loại rau củ theo mùa (cà rốt, nấm, mộc nhĩ, hành tây) ăn không hề ngán, rất ngon mà lại đảm bảo đầy đủ chất dinh dưỡng.', 'Khó', '40 phút', 'Miến : 300g\r\nThịt bò: 100g\r\nCà rốt: 1 củ\r\nCải bó xôi: 100g\r\nNấm đông cô: 100g\r\nNấm kim châm: 100g\r\nỚt chuông xanh: 100g\r\nỚt chuông đỏ: 100g\r\nTrứng gà: 2 – 3 quả\r\nTỏi\r\nMè rang\r\nGia vị: Dầu ăn, dầu mè, nước tương, hạt tiêu, muối, đường, rượu trắng', 0, 0, 'KieuNga', 4, 1, NULL, NULL),
(13, 'Lẩu Cua Đồng', 'anhdaidien.jpg', 'Lẩu Cua Đồng từ lâu đã được xem là một món ăn ngon trong các món lẩu của Việt Nam được mọi người ưa thích và không thể nào bỏ qua được bởi mùi vị thơm ngon đặc trưng của nhiều nguyên liệu hòa vào nhau. Dù được kết hợp với nguyên liệu nào hay biến tấu về cách nấu lẩu cua đồng hà nội thế nào đi nữa thì món ăn vẫn luôn có hương vị ngọt mát, thơm nồng đặc trưng của cua đồng và các loại rau dân dã ăn kèm.', 'Trung bình', '1 giờ 5 phút', 'Cua đồng: 600 – 800 gram cua\r\nThịt bò: 200 – 300 gram thịt bò\r\nSườn sụn: 300 – 500 gram\r\nĐậu phụ: 300 – 400 gram\r\nRau nhúng lẩu: rau chuối, hoa chuối, rau mồng tơi, rau rút, xà lách…\r\nCác loại gia vị: cà chua, hành, váng đậu, sa tế, muối, tiêu, mắm, đường, bột nêm…', 0, 0, 'KieuNga', 7, 1, NULL, NULL),
(14, 'Mì Ramen', 'anhdaidien.jpg', 'Mì Ramen đã trở thành một phần không thể thiếu trong văn hóa ẩm thực của người Nhật Bản. nét tinh túy nhất của tô mì nằm ở phần nước dùng. Nước dùng ngọt thơm được ninh từ xương, thịt heo, rau củ cùng các thành phần gia vị khác. Chính vì vậy, nước dùng Ramen chứa rất nhiều dưỡng chất mà đặc biệt là collagen. Thưởng thức món ăn này, bạn sẽ cảm nhận được sự tinh tế của ẩm thực Nhật Bản từ sợi mì dai ngon quyện chặt trong nước dùng đậm đà và thức ăn kèm đa dạng.', 'Khó', '50 phút', '4 cây hành boaro\r\n1 củ hành tây\r\n1kg xương ống heo\r\n1kg thịt ba rọi\r\n300ml rượu Sake\r\n50ml rượu Mirin\r\n200g đường nâu\r\n600ml nước tương đậm\r\n5 quả trứng gà\r\nMì Ramen (Bạn có thể mua tại các siêu thị)\r\nTỏi\r\nGừng\r\nMuối\r\nTiêu\r\nỚt khô\r\nRong biển khô', 0, 0, 'KieuNga', 1, 1, NULL, NULL),
(15, 'Sữa Tươi Trân Châu Đường Đen', 'anhdaidien.jpg', 'Không bỗng nhiên mà trào lưu trà sữa trân châu và sữa tươi trân châu đường đen lại nổi lên “rần rần” trong giới trẻ suốt thời gian qua. Món uống hấp dẫn này có “ma lực” gây “nghiện” bởi hương vị lôi cuốn và những hạt trân châu dẻo thơm đến khó cưỡng. Đặc biệt trong thời tiết nóng bức, đây vẫn là những món uống được giới trẻ vô cùng ưa chuộng. Cùng học ngay cách làm sữa tươi trân châu đường đen đơn giản tại nhà để “giải nóng” và tìm hiểu thêm các thông tin thú vị về món uống hấp dẫn này nhé!', 'Dễ', '30 phút', 'Sữa tươi không đường: 200ml\r\nBột gạo: 100g\r\nBột năng: 100g\r\nBột cacao: 5g\r\nĐường đen Hàn Quốc: 120g\r\nDụng cụ: nồi, rây lọc, ly thủy tinh, thau inox.', 0, 0, 'KieuNga', 8, 1, NULL, NULL),
(16, 'Sườn Xào Chua Ngọt', 'anhdaidien.jpg', 'Sườn Xào Chua Ngọt là món ăn thường xuyên xuất hiện trong bữa ăn của các gia đình Việt. Một món ăn vừa dinh dưỡng vừa hấp dẫn người ăn, nhất là với trẻ nhỏ. Có thể nói đây là món ăn chính trong bữa cơm gia đình, nó mang vị chua chua ngọt ngọt, hơi cay với nước sốt màu đỏ thẩm đẹp mắt, miếng sườn vàng đượm luôn lôi cuốn được người thưởng thức.', 'Trung bình', '35 phút', '500 gram sườn non.\r\n1/2 củ tỏi.\r\n2 nhánh hành tím.\r\n1 quả chanh (vì chanh có mùi thơm ngon tự nhiên, các bạn có thể thay thế bằng dấm hoặc me đều được nhé).\r\n2 thìa tương ớt (có thể tăng hoặc giảm tùy vào khẩu vị ăn cay).\r\n3 quả cà chua loại vừa.\r\n1 ít hành lá, một quả ớt tươi.\r\n1 bát nước lọc.\r\nGia vị chuẩn bị gồm: bột nêm, nước nắm, bột canh, muối hạt, dầu ăn, đường.', 0, 0, 'KieuNga', 3, 1, NULL, NULL),
(17, 'Cháo Thịt Bằm Nấm Rơm', 'anhdaidien.jpg', 'Cháo Thịt Bằm Nấm Rơm món ăn sáng thơm ngon, nóng hổi và giàu dinh dưỡng cho cả nhà. Cách nấu cháo thịt bằm đơn giản và ngon không hề khó đâu nhé.', 'Dễ', '36 phút', 'Gạo : 1 Lon\r\nHạt nêm : 2 Muỗng canh\r\nĐường trắng : 2 Muỗng canh\r\nMuối : 1 Muỗng canh\r\nTiêu : 2 Muỗng cà phê\r\nNấm rơm : 500 Gr\r\nThịt heo bằm : 500 Gr\r\nNgò rí : 20 Gr\r\nHành lá : 20 Gr', 0, 0, 'DaiNhan', 11, 1, NULL, NULL),
(18, 'Grilled Cheese', 'anhdaidien.jpg', 'Vị béo của phô mai và vị thơm bơ tỏi của bơ hành khi nướng sẽ là sự kết hợp tuyệt vời.', 'Dễ', '20 phút', '2 miếng sandwich\r\nTỏi : 200g', 0, 0, 'DaiNhan', 9, 1, NULL, NULL),
(19, 'Há Cảo Nhân Mọc', 'anhdaidien.jpg', 'Há Cảo Nhân Mọc món ăn sáng thơm ngon, cực hấp dẫn cho cả nhà', 'Trung bình', '40 phút', 'Bột há cảo : 300 Gr\r\nTrứng gà : 2 Quả\r\nGiò sống : 100 Gr\r\nMiến : 100 Gr\r\nHành lá : 2 Gr\r\nNước sôi : 50 ml', 0, 0, 'DaiNhan', 9, 1, NULL, NULL),
(20, 'Hủ Tiếu Trộn Mỡ Hành', 'anhdaidien.jpg', 'Hủ Tiếu Trộn Mỡ Hành món ăn sáng thơm ngon, giàu dưỡng chất cho cả nhà. Cách Làm Hủ Tiếu Trộn Mỡ Hành (hủ tiếu khô) đơn giản với sợi hủ tiếu dai, cùng với trứng chiên, thịt muối ngon khó cưỡng.', 'Trung bình', '36 phút', 'Hủ tiếu : 500 Gr\r\nHành lá : 50 Gr\r\nTrứng gà : 2 Quả\r\nThịt heo : 100 Gr', 0, 0, 'DaiNhan', 9, 1, NULL, NULL),
(21, 'Pizza', 'anhdaidien.jpg', 'Chiếc bánh pizza được nướng bằng chảo trông thật ngon mắt phải không bạn? Món bánh ăn ngon chẳng kém bánh được nướng bằng lò nướng bánh công nghiệp đâu nhé! ', 'Khó', '45 phút', 'Bột mì : 450 Gr\r\nMen nở : 10 Gr\r\nDầu ăn : 30 ml\r\nPhô mai : 220 Gr\r\nHành tây : 1 Củ\r\nXúc xích : 4 Cây', 0, 0, 'DaiNhan', 9, 1, NULL, NULL),
(22, 'Mì Xào Bò Hầm Măng Tây', 'anhdaidien.jpg', 'Đây là món ăn ngon miệng, bắt mắt, dễ thực hiện và đầy đủ chất, dung hòa giữa vị béo của 2 loại thịt, và vị thanh của măng tây. Là món ăn rất có lợi cho sức khỏe mùa dịch bệnh này các chị em nhé', 'Trung bình', '30 phút', 'Măng tây : 50 Gr\r\nBò hầm hộp : 1 Hộp\r\nBắp bò : 30 Gr\r\nThịt heo ba chỉ : 30 Gr\r\nMì trứng : 1 Gói\r\nDầu hào : 1 Muỗng canh', 0, 0, 'DaiNhan', 3, 1, NULL, NULL),
(23, 'Thịt Bò Sốt Vang Béo Thơm', 'anhdaidien.jpg', 'Thịt bò sốt vang béo thơm với thịt bò thăn nhiều nạc, cắt thành những viên nhỏ, dễ dàng ngấm đều gia vị và hỗn hợp sốt rượu vang, tương cà, ... có thể chấm ăn kèm với bánh mì nướng rất ngon.', 'Trung bình', '40 phút', 'Thịt bò 500 Gr \r\nGừng 1 Củ \r\nCà rốt 1 Củ \r\nKhoai tây 2 Củ \r\nTỏi 1 Củ \r\nCà chua 1 Trái \r\nTương cà 2 Muỗng canh \r\nThanh quế 1 Miếng \r\nBột ngũ vị hương 1 Bịch \r\nNước mắm 1 Muỗng canh \r\nTiêu 1/3 Muỗng cà phê \r\nĐường trắng 2 Muỗng cà phê \r\nMuối 1/2 Muỗng cà phê \r\nHạt nêm 2 Muỗng cà phê \r\nRượu vang 400 ml \r\nBột ngọt 1 Muỗng cà phê \r\nDầu ăn 2 Muỗng canh', 0, 0, 'DaiNhan', 4, 1, NULL, NULL),
(24, 'Mì Trứng Xào Tôm Cải Thìa', 'anhdaidien.jpg', 'Mì trứng xào tôm cải thìa là món ăn đổi bữa cho những ai hơi ngán cơm, muốn đổi khẩu vị.', 'Dễ', '20 phút', 'Tôm tươi : 50 Gr \r\nCải thìa : 2 Cây \r\nMì tôm : 2 Gói', 0, 0, 'DaiNhan', 3, 1, NULL, NULL),
(25, 'Tôm Chiên Bột Khoai Tây Sợi', 'anhdaidien.jpg', 'Tôm hoà với khoai tây sợi chiên giòn ăn nóng kèm tương ớt ', 'Trung bình', '30 phút', 'Bột chiên giòn 200 Gr \r\nTôm tươi 500 Gr \r\nKhoai tây 4 Củ \r\nHành lá 1 Nhánh', 0, 0, 'DaiNhan', 3, 1, NULL, NULL),
(26, 'Xôi Thịt', 'anhdaidien.jpg', 'Thịt bằm sẽ được trộn chung vào nếp cùng với nấm mèo, hành lá và một ít gia vị. Món ăn sẽ khiến bạn cảm nhận thêm phần độc đáo cũng như hương vị mới lạ nhưng đủ cho ta thấy cảm giác đủ đầy.', 'Trung bình', '40 phút', 'Nếp ngon 2 Chén \r\nThịt băm 150 Gr \r\nNấm mèo 2 Lá \r\nHành lá 3 Cây \r\nNgò rí 1 Nắm \r\nHành hương 1 Củ \r\nTiêu 1 Muỗng cà phê \r\nỚt đỏ 1 Trái \r\nTỏi 1 Tép \r\nBột nghệ 1/2 Muỗng cà phê \r\nChà bong 10 Gr \r\nHành phi 20 Gr \r\nNước mắm 2 Muỗng canh \r\nĐường 1 Muỗng canh \r\nMì giòn 100 Gr', 0, 0, 'DaiNhan', 9, 1, NULL, NULL),
(27, 'Canh Bí Đỏ Nấm Hương', 'anhdaidien.jpg', 'Món canh khá dễ nấu, dễ ăn, lại còn bổ dưỡng. Cùng tìm hiểu cách làm nhé!', 'Dễ', '30 phút', 'Bí đỏ 500 Gr \r\nNấm hương 20 Gr \r\nHạt nêm chay Knorr Nấm hương 2 Hạt \r\nĐường trắng 2 Muỗng canh \r\nTiêu 1/4 Muỗng cà phê', 0, 0, 'DaiNhan', 1, 1, NULL, NULL),
(28, 'Canh Mướp Bún Tàu', 'anhdaidien.jpg', 'Không biết mọi người có biết món canh này không chứ mình rất mê. Mướp ngọt kết hợp cùng bún tàu trong món canh cực kỳ lạ miệng. Cùng vào bếp thử theo công thức của mình nhé.', 'Trung bình', '31 phút', 'Muớp khía 1 Trái \r\nBún tàu 2 Vắt \r\nĐậu hũ non 50 Gr \r\nNước lạnh 1 Lít \r\nHạt nêm chay Knorr Nấm hương 10 Gr \r\nĐường 3 Gr \r\nMuối 1 Gr \r\nHành lá 20 Gr', 0, 0, 'DaiNhan', 1, 1, NULL, NULL),
(29, 'Chả Cá Chay', 'anhdaidien.jpg', 'Món chả cá chay có hương vị thanh đạm, dễ ăn, khác với món chả cá mặn với nguyên liệu từ ham chay. Cùng tìm hiểu cách làm món chả cá chay siêu đơn giản này ngay nhé!', 'Dễ', '30 phút', 'Củ năng 200 Gr \r\nThì là 300 Gr \r\nHam chay 400 Gr \r\nTỏi 1 Củ \r\nGừng 1 Củ \r\nBột năng 50 Gr \r\nMuối 2 Muỗng cà phê \r\nTiêu 1 Muỗng cà phê \r\nĐường trắng 1/2 Muỗng cà phê \r\nDầu ăn 50 ml', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(30, 'Chả Chay Kho Nước Tương', 'anhdaidien.jpg', 'Chỉ cần dành một ít thời gian vào bếp là sẽ có ngay món chả chay kho nước tương vừa ngon miệng, lại vừa dễ thực hiện dùng chung với cơm nóng', 'Dễ', '30 phút', 'Chả lụa chay 300 Gr\r\nHành tím 1 Củ\r\nHành lá 5 Gr\r\nỚt sừng 3 Gr\r\nTỏi 2 Tép\r\nNước tương 30 ml\r\nĐường 10 Gr\r\nHạt nêm chay Knorr Nấm hương 5 Gr\r\nBột ngọt 2 Gr\r\nTiêu xay 1 Gr\r\nDầu ăn 10 Gr', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(31, 'Cơm Chiên Rau Củ Ngũ Sắc Chay', 'anhdaidien.jpg', 'Cùng vào bếp biến tấu một ít để có được một món ăn mới lạ miệng, thơm ngon theo công thức của mình nhé. Món ăn là sự kết hợp giữa cơm và các loại rau củ thập cẩm rồi được chiên tơi xốp. Cùng thử nhé!', 'Dễ', '30 phút', 'Cơm nguội 1 Chén \r\nRau củ 70 Gr \r\nHành lá 10 Gr \r\nTiêu xay 5 Gr \r\nHạt nêm chay Knorr Nấm hương 10 Gr \r\nDầu ăn 10 ml', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(32, 'Cuốn Diếp Nấm Rau Củ', 'anhdaidien.jpg', 'Su su xào cùng cà rốt, nấm và gia vị, sau đó được cuốn lại bằng là xà lách, khi ăn chấm cùng nước tương đậm đà. Mình nghĩ, đây sẽ là món ăn dinh dưỡng, ngon miệng cho các bạn vào ngày chay.', 'Trung bình', '31 phút', 'Su su 70 Gr \r\nCà rốt 70 Gr \r\nNấm Linh Chi 50 Gr \r\nTỏi 5 Gr \r\nĐường 3 Gr \r\nHạt nêm chay Knorr Nấm hương 5 Gr \r\nNước tương 10 ml \r\nDầu ăn 10 Gr \r\nXà lách 100 Gr', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(33, 'Đậu Hũ Lúc Lắc', 'anhdaidien.jpg', 'Đậu hũ lúc lắc của mình được lấy ý tưởng từ món bò lúc lắc. Là sự kết hợp giữa đậu hủ và ớt chuông trong xốt lúc lắc mằn mặn, ngọt ngọt và the the nhẹ.', 'Trung bình', '32 phút', 'Đậu hũ chiên 100 Gr \r\nỚt chuông xanh 100 Gr \r\nTương ớt 20 Gr \r\nTương cà 5 Gr \r\nTỏi băm 3 Gr \r\nNước mắm chay 5 ml \r\nĐường 5 Gr \r\nHạt nêm chay Knorr Nấm hương 3 Gr', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(34, 'Đậu Hũ Non Om Nấm Hương', 'anhdaidien.jpg', 'Nấm hương không chỉ thơm ngọt mà còn rất bổ dưỡng với nhiều vitamin và khoáng chất. Đặc biệt, bạn có thể dễ dàng kết hợp, chế biến nấm hương cùng nhiều nguyên liệu khác để mang đến những món ngon bổ dưỡng cho cả nhà thưởng thức đấy.', 'Trung bình', '33 phút', 'Đậu hũ non 500 Gr\r\nNấm hương 150 Gr\r\nCà rốt 200 Gr\r\nRượu trắng 50 ml\r\nGừng 30 Gr\r\nHành tím 3 Củ\r\nDầu hào 1/2 Muỗng canh\r\nHạt nêm chay 2 Muỗng cà phê\r\nBột bắp 1 Muỗng cà phê\r\nNgò rí 3 Nhánh\r\nDầu ăn 30 ml\r\nTiêu 1/4 Muỗng cà phê', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(35, 'Khổ Qua Nhồi Đậu Hũ Kho Nước Tương', 'anhdaidien.jpg', 'Chỉ cần dành một ít thời gian vào bếp là sẽ có ngay món khổ qua nhồi kho nước tương vừa ngon miệng, lại vừa dễ thực hiện thưởng thức cho các bữa cơm vào ngày chay', 'Trung bình', '34 phút', 'Khổ qua 1 Trái\r\nĐậu hũ trắng 1 Miếng\r\nNấm mèo 5 Gr\r\nBún tàu 10 Gr\r\nHạt nêm chay Knorr Nấm hương 15 Gr\r\nNước tương 40 ml\r\nĐường 10 Gr\r\nMuối 1 Muỗng cà phê\r\nỚt bột 1/4 Muỗng cà phê\r\nTiêu xay 1/2 Muỗng cà phê', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(36, 'Nấm Sò Chiên Giòn', 'anhdaidien.jpg', 'Nấm sò chiên giòn là món ăn chay rất thích hợp. Và đây cũng là một món nhỏ trong combo mẹt bún đậu mắm tôm. Bạn cứ thử làm ở nhà nhé', 'Trung bình', '35 phút', 'Nấm sò 200 Gr \r\nBột chiên giòn 1 Gói', 0, 0, 'DaiNhan', 10, 1, NULL, NULL),
(37, 'Bánh canh ghẹ', 'anhdaidien.jpg', 'Bánh canh là đặc sản của miền Trung nhưng được rất nhiều người yêu thích và mỗi một địa phương có biến tấu khác nhau. Bánh canh ghẹ là một trong những món bánh canh mà người miền Nam, miền Trung hay miền Bắc đều vô cùng yêu thích. Bánh canh ghẹ thơm vị hải sản, ngon ngọt dịu mát và thêm chút cay nhẹ nhẹ vô cùng hấp dẫn. Để nấu được bát bánh canh ghẹ thơm ngon thì chị em cần chú ý nhiều tới công thức. Bếp Eva hướng dẫn cách làm bánh canh ghẹ cực đơn giản mà thơm ngon đúng vị.', 'Trung bình', '40 phút', 'Ghẹ tươi 2 3 con (1kg)\r\nXương heo 500g\r\nBột năng 150g\r\nBột gạo tẻ 250g\r\nNước cốt dừa 200ml\r\nHạt điều đỏ 50g\r\nGiá đỗ 200g\r\n1 củ sả, 2 củ hành khô\r\nHành lá, rau mùi, rau sống các loại\r\nChanh, ớt, dầu ăn, muối, hạt nêm', 0, 0, 'MinhLuan', 1, 1, NULL, NULL),
(38, 'Đùi Gà Sốt Teriyaki', 'anhdaidien.jpg', 'Bạn cứ thòm thèm món cơm đùi gà teriyaki mà chả muốn ra quán vì mất thời gian và tốn kém tiền bạc. Vậy hãy \"lăn thử vào bếp\" làm món này theo công thực dưới đây.', 'Trung bình', '30 phút', '2 đùi gàrượu nấu ăn\r\n1/5 chiếc súp lơ xanh\r\ncà rốt\r\nngô bao tử\r\nsốt teriyaki (bán nhiều ở siêu thị)\r\n½ thìa cà phê bột tiêu đen\r\n½ thìa cà phê gia vị.', 0, 0, 'MinhLuan', 4, 1, NULL, NULL),
(39, 'Gà Nướng Bia', 'anhdaidien.jpg', 'Thịt gà nướng bia, mật ong không những dễ làm lại thơm ngon hấp dẫn, ai thưởng thức cũng thích.', 'trung bình', '30 phút', '400g thịt gà ngon, thái miếng vuông quân cờ\r\n3 củ hành; 2 tép tỏi, tắt cả băm nhỏ\r\nMật ong vừa đủ\r\n1/2 lon bia\r\n50ml xì dầu\r\n1 muỗng cà phê mù tạt\r\n1 ít ớt nghiền nhuyễn; tiêu đen, rau mùi xắt nhỏ vừa đủ', 0, 0, 'MinhLuan', 11, 1, NULL, NULL),
(40, 'Sườn Nướng Tỏi', 'anhdaidien.jpg', 'Chỉ vài bước đơn giản bạn đã có món sườn nướng thơm nức, ngon đã miệng để thưởng thức rồi.', 'trung bình', '30 phút', '500gr sườn heo\r\n1 thìa canh rượu nấu ăn\r\n2 củ tỏi\r\nhành hoa\r\ngia vị\r\ndầu hào\r\nmật ong\r\ntinh bột ngô.', 0, 0, 'MinhLuan', 2, 1, NULL, NULL),
(41, 'Gà Hấp Tỏi', 'anhdaidien.jpg', 'Gà hấp tỏi bằng nồi cơm điện: Cách làm vừa đơn giản, tiện lợi, thịt vừa mềm ngon đậm đà', 'dễ', '20 phút', 'một con gà\r\nMột túi tỏi nhỏ.\r\nGia vị muối', 0, 0, 'MinhLuan', 11, 1, NULL, NULL),
(42, 'Cá Chép Nướng Tiêu Ớt', 'anhdaidien.jpg', 'Cá chép nướng tiêu ớt thơm lừng cả nhà không thể ngừng ăn', 'trung bình', '30 phút', '1 con cá chép, \r\nchọn con mình dày, \r\ncho những phần thịt cá thơm và dễ nướng.\r\nTỏi, gừng, gia vị, hạt tiêu,\r\nlá hương thảo khô, ớt bột, \r\n1 thìa cà phê mật ong,\r\n2 thìa cà phê, \r\n2 thìa cà phê rượu trắng.', 0, 0, 'MinhLuan', 2, 1, NULL, NULL),
(43, 'Chả Nhái Lá Lốt', 'anhdaidien.jpg', 'Cách làm chả nhái lá lốt nhanh gọn lẹ khiến cả nhà tấm tắc khen ngon', 'dễ', '15 phút', 'Lá lốt\r\nThịt nhái\r\nSả cây, nấm mèo, hành tím.\r\nGia vị', 0, 0, 'MinhLuan', 9, 1, NULL, NULL),
(44, 'Xôi Chiên Trứng', 'anhdaidien.jpg', 'Để làm món xôi chiên trứng giòn không cần bạn phải ra sức tìm mua những nguyên liệu cao cấp, đắt giá gì cả. Thế nhưng thành phẩm cuối cùng lại cực kỳ chất lượng, chị em cứ yên tâm thực hiện tại nhà và thưởng thức cùng gia đình', 'dễ', '15 phút', '150g gạo nếp\r\n3 quả trứng\r\n100g thịt băm\r\n30g hành lá thái nhỏ\r\n5g muối\r\n10g nước tương\r\n1 mẩu gừng băm nhỏ', 0, 0, 'MinhLuan', 9, 1, NULL, NULL),
(45, 'Thịt Khìa Nước Dừa', 'anhdaidien.jpg', 'Thịt heo là món ăn quen thuộc của mỗi gia đình vì có thể chế biến thành nhiều món như nướng, chiên, xào, kho, luộc… Thế nhưng, ít ai biết rằng, từ loại thịt này có thể chế biến thành một món ăn vô cùng lạ miệng khiến nhiều người mê mẩn, đó chính là món thịt khìa nước dừa. Hãy cùng chế biến món ăn lạ mà đậm đà hương vị này nhé! Đảm bảo cả nhà sẽ vét sạch nồi cơm cho xem!', 'trung bình', '30 phút', '600 gr thịt ba rọi\r\n1 trái dừa (lấy nước)\r\nNước mắm ngon\r\nTỏi băm, hành tím băm, tiêu sọ đập dập, bột ngọt, dầu ăn.', 0, 0, 'MinhLuan', 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monandathich`
--

DROP TABLE IF EXISTS `monandathich`;
CREATE TABLE IF NOT EXISTS `monandathich` (
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaMon` int(10) UNSIGNED NOT NULL,
  `TenMon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `monandathich_username_foreign` (`Username`),
  KEY `monandathich_mamon_foreign` (`MaMon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnhDaiDien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoaiTK` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `AnhDaiDien`, `password`, `HoTen`, `SDT`, `Email`, `LoaiTK`, `remember_token`, `TrangThai`, `created_at`, `updated_at`) VALUES
('DaiNhan', 'hinhanh.jpg', '$2y$10$G4WQFfJnxh9aLVgi4FvDS.398LkjxPcWYvQO/CsPIo.pKnTdWeNuC', 'Nguyễn Võ Đại Nhân', '0123456789', 'nhan@gmail.com', 'User', NULL, 0, NULL, NULL),
('HoangLam', 'hinhanh.jpg', '$2y$10$k6FmHcD0qk87T1n.l4vTie.qPH7IFjzqDQ5Zbiw64vpdUSS8HFMOW', 'Vũ Hoàng Lâm', '0123456789', 'lam@gmail.com', 'Admin', NULL, 1, NULL, NULL),
('KieuNga', 'hinhanh.jpg', '$2y$10$Kt0PpYDQX3eqARadVE5lZOaxAlgJUzg6gfbqI9ASl1aQUJrV0o6bm', 'Nguyễn Thị Kiều Nga', '0123456789', 'nga@gmail.com', 'User', NULL, 0, NULL, NULL),
('MinhLuan', 'hinhanh.jpg', '$2y$10$DVh8tJy9rXeU.WLEBQmh0.ycW1GePJBe/rn0J2knlwdjzc70ZvPX6', 'Lê Minh Luân', '0123456789', 'luan@gmail.com', 'User', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_mamon_foreign` FOREIGN KEY (`MaMon`) REFERENCES `monan` (`MaMon`),
  ADD CONSTRAINT `binhluan_username_foreign` FOREIGN KEY (`Username`) REFERENCES `taikhoan` (`username`);

--
-- Các ràng buộc cho bảng `huongdan`
--
ALTER TABLE `huongdan`
  ADD CONSTRAINT `huongdan_mamon_foreign` FOREIGN KEY (`MaMon`) REFERENCES `monan` (`MaMon`);

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_loaimon_foreign` FOREIGN KEY (`LoaiMon`) REFERENCES `danhmuc` (`MaLoai`),
  ADD CONSTRAINT `monan_nguoitao_foreign` FOREIGN KEY (`NguoiTao`) REFERENCES `taikhoan` (`username`);

--
-- Các ràng buộc cho bảng `monandathich`
--
ALTER TABLE `monandathich`
  ADD CONSTRAINT `monandathich_mamon_foreign` FOREIGN KEY (`MaMon`) REFERENCES `monan` (`MaMon`),
  ADD CONSTRAINT `monandathich_username_foreign` FOREIGN KEY (`Username`) REFERENCES `taikhoan` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
