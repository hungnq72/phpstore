-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 05:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopeee`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(3) NOT NULL,
  `s_id` int(3) NOT NULL,
  `pd_id` int(3) NOT NULL,
  `cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Hoa quả'),
(2, 'Rau'),
(3, 'Hạt giống');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `s_id` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `s_id`, `customer_id`, `order_date`) VALUES
(96, 1, 1, '2020-12-17'),
(97, 4, 4, '2020-12-17'),
(98, 4, 4, '2020-12-18'),
(99, 1, 1, '2020-12-18'),
(100, 1, 1, '2020-12-18'),
(101, 1, 1, '2020-12-18'),
(102, 1, 1, '2020-12-18'),
(103, 1, 1, '2020-12-18'),
(104, 4, 4, '2020-12-19'),
(105, 4, 4, '2021-01-16'),
(106, 4, 4, '2021-01-16'),
(107, 1, 1, '2021-01-16'),
(108, 1, 1, '2021-01-16'),
(109, 1, 1, '2021-01-16'),
(110, 1, 1, '2021-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `order_detail_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `s_id` int(3) NOT NULL,
  `pd_id` int(3) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_detail_address` varchar(255) NOT NULL,
  `order_detail_total` int(11) NOT NULL,
  `order_detail_total_cart` int(3) NOT NULL,
  `seller_id` int(3) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`order_detail_id`, `order_id`, `s_id`, `pd_id`, `order_quantity`, `order_detail_address`, `order_detail_total`, `order_detail_total_cart`, `seller_id`, `is_confirmed`, `stt`) VALUES
(101, 102, 1, 44, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 400000, 100000, 4, 1, 1),
(104, 104, 4, 37, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 500000, 500000, 1, 1, 1),
(109, 107, 1, 44, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 400000, 100000, 4, 0, 0),
(110, 107, 1, 45, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 400000, 300000, 4, 0, 0),
(111, 109, 1, 37, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 500000, 500000, 1, 0, 0),
(112, 110, 1, 39, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 1500000, 600000, 1, 0, 0),
(113, 110, 1, 46, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 1500000, 300000, 4, 0, 0),
(114, 110, 1, 39, 1, '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội', 1500000, 600000, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pd_name` varchar(255) NOT NULL,
  `pd_price` int(11) NOT NULL,
  `pd_quantity` int(11) NOT NULL,
  `pd_image` varchar(255) NOT NULL,
  `pd_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `user_id`, `cat_id`, `pd_name`, `pd_price`, `pd_quantity`, `pd_image`, `pd_description`) VALUES
(37, 1, 1, 'Cupuacu', 500000, 500, 'loai-qua-hiem-capuca.jpg', 'Cupuacu được tìm thấy chủ yếu trong rừng nhiệt đới hoang dã Amazon và trồng rộng rãi ở Peru. Với kích thước bằng một quả dưa hấu, quả Cupuacu khi chín có màu vàng, thơm vị cacao.\r\nCupuacu được đánh giá là một trong những loại &#34;siêu trái cây&#34; vì hàm lượng dinh dưỡng cực kì cao. Loại quả này được biết đến với khả năng kích thích hệ thống miễn dịch và phòng tránh nguy cơ mắc bệnh tim mạch do đặc tính giàu vitamin B1, B2 và B3...'),
(38, 1, 1, 'Mãng cầu xiêm', 900000, 800, 'loai-qua-hiem-mang-cau-xiem.jpg', 'Trái cây Cherimoya có nguồn gốc từ dãy núi Andes giữa Argentina và Chile. Nó là một trong những trái cây hiếm được trồng ở Nam Mỹ. Các quả cherimoya mềm ngọt và rất thơm. Quả xanh có hình dạng hình bầu dục và nặng tới 500 gram.\r\nCherimoya chứa vitamin thiết yếu, chất chống oxy hóa và khoáng chất. Các bột trái cây này được sử dụng chủ yếu trong ngọn băng kem và xà lách. Các đặc tính chữa bệnh của quả có sức mạnh để loại bỏ các yếu tố độc hại nhỏ từ cơ thể của bạn. Nó cũng giúp huyết áp cân bằng tốt và nhịp tim ổn định.'),
(39, 1, 1, 'Hồng socola', 600000, 80, 'loai-qua-hiem-hong-socola.jpg', 'Hồng đen hay hồng socola là loại cây ăn quả nhiệt đới có nguồn gốc từ Mexico. Quả ăn rất ngon, ngọt có hương vị như socola. Vỏ quả hồng khi chưa chín có màu xanh, bóng sáng. Khi chín, vỏ của quả hồng sô cô la hơi &#34;nhăn&#34;, màu xanh nâu.'),
(41, 2, 0, 'Quả măng cụt', 400000, 800, '', 'Măng cụt (tên khoa học là Garcinia mangostana) là loại cây ăn quả nhiệt đới, rất quen thuộc tại Đông Nam Á. Cây cao từ 7 đến 25 m. Quả khi chín có vỏ ngoài dày, màu đỏ tím đậm. Ruột trắng ngà và chia thành nhiều múi có vị chua ngọt thanh thanh và có mùi thơm thu hút.\r\nQuả măng cụt nhiệt đới không chứa cholesterol và các loại chất béo. Nó cũng là một loại trái cây giàu vitamin C giúp ngăn ngừa nhiễm trùng. Nước măng cụt tìm thấy như là thức uống chính ở các nước Nam Á vào mùa hè. Bên cạnh đó, trái cây cũng có vài đặc tính chữa bệnh. Nước được sử dụng để chữa bệnh tiêu chảy, đề phòng các vấn đề tiết niệu và giúp kích thích hệ thống miễn dịch.'),
(44, 4, 1, 'Quả thần kì', 100000, 150, 'loai-qua-hiem-than-ki.jpg', 'Đúng như tên gọi của nó, loại quả có nguồn gốc Tây Phi này có khả năng biến trái có vị chua (như chanh) trở nên ngọt, khi nước ép của 2 trái hòa với nhau. Có nghĩa là, khi bạn ăn loại quả này cùng với một loại quả chua nào đó, nó sẽ &#34;đánh lừa&#34; vị giác của bạn khiến cho bạn không cảm thấy chua mà chỉ cảm thấy vị ngọt.\r\nTrong lĩnh vực y tế, các bác sĩ sử dụng hiệu ứng ngọt của trái cây để mang lại sự thèm ăn của bệnh nhân ung thư.'),
(45, 4, 1, 'Quả da rắn', 300000, 100, 'loai-qua-hiem-da-ran.jpg', 'Do lớp vỏ bên ngoài giống như những vảy màu nâu đỏ, đôi khi Salak còn được gọi là còn gọi là quả da rắn. Salak là quả họ cọ, mọc thành từng chùm, chủ yếu được trồng ở vùng đất cát núi lửa nên không lạ khi salak trở thành đặc sản của riêng Indonesia. Nó có mùi thơm và vị như tổng hợp từ dứa, chuối với lạc. Vỏ của loại quả này khá cứng nên khi ăn cần phải cẩn thận để không làm đứt tay.'),
(46, 4, 1, 'Sầu riêng', 300000, 100, 'loai-qua-hiem-sau-rieng.jpg', 'Quả sầu riêng được nhiều người ở Đông Nam Á xem như là &#34;vua của các loại trái cây&#34;. Nó có đặc điểm là kích thước lớn, mùi mạnh và nhiều gai nhọn bao quanh vỏ. Tùy thuộc vào từng loài mà quả có hình dáng từ thuôn đến tròn, màu vỏ từ xanh lục đến nâu, màu thịt quả từ vàng nhạt đến đỏ.\r\nThịt quả có thể ăn được và tỏa ra một mùi đặc trưng, nặng và nồng, ngay cả khi vỏ quả còn nguyên. Một số người thấy sầu riêng có một mùi thơm ngọt ngào dễ chịu, nhưng một số khác lại không chịu nổi và khó chịu với mùi này. Do mùi của sầu riêng ám rất lâu cho nên nó bị cấm mang vào một số khách sạn và phương tiện giao thông công cộng.\r\n\r\nThịt quả được sử dụng để tạo hương vị cho nhiều loại món ngọt và món mặn trong ẩm thực Đông Nam Á. Hạt của sầu riêng cũng có thể ăn được sau khi nấu chín.'),
(47, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(48, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(49, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(50, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(51, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(52, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(53, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(54, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(55, 4, 2, 'Súp lơ', 10000, 100, '3zzntu72222222dkyhyz-nhung-ly-do-nen-an-sup-lo-trong-mua-dong.jpg', 'Bông Cải Trắng hay còn gọi là Súp Lơ Trắng là một trong các loại thực phẩm giàu vitamin và ion khoáng nhất, được chứng minh có nhiều lợi ích cho sức khỏe. Súp lơ trắng trải qua quá trình trồng trọt theo tiêu chuẩn Vietgap, đảm bảo sạch và chất lượng. Rau dễ ngấm gia vị và thích hợp khi xào với các thực phẩm khác.\r\nThông tin dinh dưỡng:\r\n\r\nTheo nghiên cứu, súp lơ có chứa hàm lượng vitamin và dưỡng chất và là một thực phẩm đặc biệt bổ dưỡng.Hoạt chất trong súp lơ có tác dụng ngăn ngừa ung thư, duy trì sức khỏe tim mạch, giảm cholesterolVì ít calo nhưng lại giàu protein, chất xơ, súp lơ có thể tạo cảm giác no, thích hợp cho chế độ giảm cân.Súp lơ giàu chất xơ, canxi, vitamin, lutein, zeaxanthin, manganNguồn canxi (không sữa) của súp lơ sẽ hỗ trợ cho việc duy trì sức khỏe của xương, khớpChất lutein và zeaxanthin giúp giảm các nguy cơ mắc bệnh về mắt do tuổi già, để mắt luôn sáng khỏe.\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính  tăng cường miễn dịch, chống lão hóa và chống ung thư.'),
(57, 4, 2, 'rau sống', 200000, 300, '20191125_074902_583796_can-sa-1.max-800x800.jpg', 'Rau sống là tên gọi chỉ chung cho các loại rau và lá ở dạng tươi sống được dùng làm món ăn kèm theo trong các bữa ăn, bữa tiệc ở Việt Nam, thường là các loại rau có lá. Thông thường đây là các loại rau có thể ăn sống hoặc ăn thông qua việc trụng chín. Rau sống thường là các loại rau thơm gia vị, có tác dụng làm ngon mịệng, chống ngán khi ăn các món thịt, cá nhiều dầu, mỡ, hay các món chiên, xào, nướng, quay....Rau sống thường ăn theo các kẹp, cuốn với các món mặn, trụng trong các món lẫu, hoặc thái nhỏ rồi bỏ vào các món mì nước. Rau sống là một món rất thông dụng trong ẩm thực Việt Nam. Một số loại rau thường được dùng ăn sống nhiều nhất như xà lách, xà lách xoong, rau muống, cải bẹ xanh, rau mùi, kinh giới, rau đắng, rau tần ô (cải cúc), rau má, giá đỗ, húng, tía tô, húng quế...[1]'),
(58, 4, 2, 'rau sống', 200000, 300, '20191125_074902_583796_can-sa-1.max-800x800.jpg', 'Rau sống là tên gọi chỉ chung cho các loại rau và lá ở dạng tươi sống được dùng làm món ăn kèm theo trong các bữa ăn, bữa tiệc ở Việt Nam, thường là các loại rau có lá. Thông thường đây là các loại rau có thể ăn sống hoặc ăn thông qua việc trụng chín. Rau sống thường là các loại rau thơm gia vị, có tác dụng làm ngon mịệng, chống ngán khi ăn các món thịt, cá nhiều dầu, mỡ, hay các món chiên, xào, nướng, quay....Rau sống thường ăn theo các kẹp, cuốn với các món mặn, trụng trong các món lẫu, hoặc thái nhỏ rồi bỏ vào các món mì nước. Rau sống là một món rất thông dụng trong ẩm thực Việt Nam. Một số loại rau thường được dùng ăn sống nhiều nhất như xà lách, xà lách xoong, rau muống, cải bẹ xanh, rau mùi, kinh giới, rau đắng, rau tần ô (cải cúc), rau má, giá đỗ, húng, tía tô, húng quế...[1]'),
(59, 4, 2, 'rau sống', 200000, 300, '20191125_074902_583796_can-sa-1.max-800x800.jpg', 'Rau sống là tên gọi chỉ chung cho các loại rau và lá ở dạng tươi sống được dùng làm món ăn kèm theo trong các bữa ăn, bữa tiệc ở Việt Nam, thường là các loại rau có lá. Thông thường đây là các loại rau có thể ăn sống hoặc ăn thông qua việc trụng chín. Rau sống thường là các loại rau thơm gia vị, có tác dụng làm ngon mịệng, chống ngán khi ăn các món thịt, cá nhiều dầu, mỡ, hay các món chiên, xào, nướng, quay....Rau sống thường ăn theo các kẹp, cuốn với các món mặn, trụng trong các món lẫu, hoặc thái nhỏ rồi bỏ vào các món mì nước. Rau sống là một món rất thông dụng trong ẩm thực Việt Nam. Một số loại rau thường được dùng ăn sống nhiều nhất như xà lách, xà lách xoong, rau muống, cải bẹ xanh, rau mùi, kinh giới, rau đắng, rau tần ô (cải cúc), rau má, giá đỗ, húng, tía tô, húng quế...[1]'),
(60, 4, 2, 'rau sống', 200000, 300, '20191125_074902_583796_can-sa-1.max-800x800.jpg', 'Rau sống là tên gọi chỉ chung cho các loại rau và lá ở dạng tươi sống được dùng làm món ăn kèm theo trong các bữa ăn, bữa tiệc ở Việt Nam, thường là các loại rau có lá. Thông thường đây là các loại rau có thể ăn sống hoặc ăn thông qua việc trụng chín. Rau sống thường là các loại rau thơm gia vị, có tác dụng làm ngon mịệng, chống ngán khi ăn các món thịt, cá nhiều dầu, mỡ, hay các món chiên, xào, nướng, quay....Rau sống thường ăn theo các kẹp, cuốn với các món mặn, trụng trong các món lẫu, hoặc thái nhỏ rồi bỏ vào các món mì nước. Rau sống là một món rất thông dụng trong ẩm thực Việt Nam. Một số loại rau thường được dùng ăn sống nhiều nhất như xà lách, xà lách xoong, rau muống, cải bẹ xanh, rau mùi, kinh giới, rau đắng, rau tần ô (cải cúc), rau má, giá đỗ, húng, tía tô, húng quế...[1]'),
(61, 4, 2, 'rau sống', 200000, 300, '20191125_074902_583796_can-sa-1.max-800x800.jpg', 'Rau sống là tên gọi chỉ chung cho các loại rau và lá ở dạng tươi sống được dùng làm món ăn kèm theo trong các bữa ăn, bữa tiệc ở Việt Nam, thường là các loại rau có lá. Thông thường đây là các loại rau có thể ăn sống hoặc ăn thông qua việc trụng chín. Rau sống thường là các loại rau thơm gia vị, có tác dụng làm ngon mịệng, chống ngán khi ăn các món thịt, cá nhiều dầu, mỡ, hay các món chiên, xào, nướng, quay....Rau sống thường ăn theo các kẹp, cuốn với các món mặn, trụng trong các món lẫu, hoặc thái nhỏ rồi bỏ vào các món mì nước. Rau sống là một món rất thông dụng trong ẩm thực Việt Nam. Một số loại rau thường được dùng ăn sống nhiều nhất như xà lách, xà lách xoong, rau muống, cải bẹ xanh, rau mùi, kinh giới, rau đắng, rau tần ô (cải cúc), rau má, giá đỗ, húng, tía tô, húng quế...[1]'),
(62, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(63, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(64, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(65, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(66, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(67, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(68, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(69, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(70, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(71, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(72, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(73, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(74, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(75, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(76, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(77, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(78, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(79, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(80, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(81, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(82, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(83, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(84, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(85, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(86, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(87, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(88, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(89, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(90, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(91, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.'),
(92, 1, 2, 'Rau muống', 50000, 200, '28021.png', 'Rau muống có tên khoa học là Ipomoea, là giống cây thân thảo, thường mọc bò trên mặt nước hoặc trên đất bùn. Chúng có thân dài, rỗng, mỗi khớp thân cách nhau khoảng 5 cm. Đối với giống rau muống mọc bò dưới nước, tại mỗi khớp trên thân sẽ có rễ ngắn xung quanh.\r\n\r\n\r\nỞ Việt Nam, rau muống được chia thành hai loại phổ biến là rau muống trắng và rau muống tía. Rau muống trắng thường được trồng trên cạn, gieo trồng theo luống. Rau muống tía thường mọc hoang dưới nước, có thân đỏ nên còn được gọi là rau muống đồng, rau muống ruộng hay rau muống đỏ.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `address`) VALUES
(1, 'Nguyễn Quốc Hưng', 'zzhungdaikass@gmail.com', 'zzhungdaikass', '$2y$10$CW1zah1as0t.wS3ljZA.Iu33nbI9ldAN9QFCtzDGzsTxJ0sm.zxTS', '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội'),
(4, 'Hưng Nguyễn', 'hungnq72@wru.vn', 'hungnq72', '$2y$10$5VjJmUa8InN6FV6MU.rqe.CBbBctXvqRRN/BzhewNSmDRczeRrFz2', '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội'),
(5, 'Nguyễn Hưng', 'jw@gmail.com', 'jw', '$2y$10$bRpzK/0AlQ6ngVxAUEK8DO4vV93B3VplIBxKaALFwlN2TRye9XNy.', '27/12 Nghĩa Dũng,Phúc Xá, Ba ĐÌnh, Hà Nội');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `order_detail_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
