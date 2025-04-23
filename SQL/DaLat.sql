-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 03:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quangbadulich`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `descript` text NOT NULL,
  `img` varbinary(6550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `location`, `descript`, `img`) VALUES
(2, 'Mongo Land Dalat - Đà Lạt', 'Mongo Land Đà Lạt là địa điểm du lịch vui chơi nổi tiếng cách trung tâm thành phố Đà Lạt khoảng 20km về phía Tây Nam. Sau khoảng 30 phút lái xe, bạn có thể đến với Mongo Land nơi được mệnh danh là “tiểu vương quốc” Mông Cổ giữa xứ sở ngàn hoa. Khi đến đây, bạn sẽ có cơ hội hưởng trọn không khí trong lành và cảm nhận những làn gió se lạnh của Đà Lạt. Không những thế, bao quanh Mongo Land là những ngọn đồi núi trập trùng, xa xa là những trang trại cà phê bạt ngàn giữa đồi thông rộng lớn chắc chắn sẽ làm thỏa mãn thị giác của bạn. Theo kinh nghiệm du lịch Đà Lạt đây là điểm đến lý tưởng cho những ai yêu thích trải nghiệm, các gia đình có con nhỏ đang tìm kiếm không gian rộng lớn và mát mẻ cho trẻ em vui chơi, nô đùa. ', 0x123123),
(3, 'Cổng trời Bali Đà Lạt Greenhills - Đà Lạ', 'Nằm trong khu du lịch Greenhills, Cổng trời Bali là một trong những địa điểm tham quan Đà Lạt mới nổi thu hút giới trẻ. Với thiết kế mô phỏng cổng trời Lempuyang nổi tiếng ở Bali, Indonesia, nơi đây mang đến cho bạn những bức ảnh check-in cực \"chất\" với background núi non hùng vĩ. Không chỉ có cổng trời, Greenhills còn sở hữu nhiều tiểu cảnh độc đáo khác như: nấc thang lên thiên đường, xích đu vô cực, tổ chim Bali,... tha hồ cho bạn \"sống ảo\".', 0x1212),
(4, 'Dinh Bảo Đại mùa hè - Đà Lạt', 'Dinh Bảo Đại là tên gọi chung cho những dinh thự sang trọng mang đậm dấu ấn kiến trúc Pháp, từng là nơi ở và làm việc của vị hoàng đế cuối cùng của Việt Nam. Rải rác khắp đất nước, từ Đà Lạt mộng mơ đến Nha Trang biển xanh, mỗi dinh thự đều ghi dấu một giai đoạn lịch sử và sở hữu vẻ đẹp riêng. Với vị trí đắc địa, phong cảnh hữu tình cùng nội thất xa hoa, các Dinh Bảo Đại ngày nay là điểm đến hấp dẫn, đưa du khách ngược dòng thời gian, khám phá cuộc sống vương giả và những câu chuyện thú vị về triều đại xưa.', 0x1313),
(5, 'Thác Datanla - Đà Lạt', 'Là một trong những địa điểm du lịch Đà Lạt nổi tiếng nhất, Thác Datanla sở hữu vẻ đẹp hoang sơ, hùng vĩ giữa núi rừng Tây Nguyên. Bạn có thể men theo những bậc thang để xuống chân thác, tận hưởng không khí mát lạnh và chiêm ngưỡng dòng nước trắng xóa đổ xuống từ trên cao. Đặc biệt, đừng quên trải nghiệm dịch vụ trượt Zipline để \"bay\" qua những tán cây, ngắm nhìn toàn cảnh thác nước từ trên cao và cảm nhận cảm giác mạnh đầy phấn khích.', 0x1414),
(6, 'Nông trại Puppy Farm - Đà Lạt', 'Bạn là một \"con sen\" chính hiệu? Vậy thì đừng bỏ qua Puppy Farm, một trong những địa điểm du lịch ở Đà Lạt được yêu thích nhất hiện nay. Tại đây, bạn có thể thỏa thích vui đùa cùng hơn 100 chú chó thuộc các giống khác nhau như Husky, Alaska, Corgi, Poodle,… Puppy Farm còn có khu vực cà phê ngoài trời với view đồi núi tuyệt đẹp, lý tưởng để bạn thư giãn và tận hưởng không khí trong lành của Đà Lạt.', 0x1616),
(7, 'Khu vui chơi Dalat Wonderland - Đà Lạt', 'Bạn đang tìm kiếm địa điểm tham quan Đà Lạt phù hợp cho cả gia đình? Mua vé vui chơi Dalat Wonderland chính là lựa chọn hoàn hảo! Với quy mô rộng lớn và đa dạng các trò chơi từ cảm giác mạnh đến nhẹ nhàng, Dalat Wonderland sẽ mang đến cho bạn những trải nghiệm vui chơi giải trí tuyệt vời. Đặc biệt, khu vực \"Vương quốc ánh sáng\" với hàng ngàn bóng đèn led rực rỡ sẽ là background \"sống ảo\" cực chất cho những bức ảnh của bạn.', 0x1515),
(8, 'Đồi chè Cầu Đất Farm - Đà Lạt', 'Đồi chè Cầu Đất Farm là một trong các địa điểm du lịch Đà Lạt nổi tiếng với cảnh quan thiên nhiên tuyệt đẹp. Bạn có thể dạo bước giữa những đồi chè xanh mướt, hít thở không khí trong lành và thưởng thức tách trà thơm ngon. Đặc biệt, đừng bỏ lỡ cơ hội săn mây vào buổi sáng sớm để chiêm ngưỡng biển mây bồng bềnh, trải dài vô tận - một trải nghiệm khó quên khi đến với Đà Lạt. Ngoài ra, bạn cũng có thể tham quan Euro Garden trên đồi chè Cầu Đất - một điểm đến hấp dẫn với phong cách châu Âu độc đáo. Du khách có thể hòa mình vào không gian lãng mạn của vườn hoa rực rỡ, thưởng thức đồ uống tại tiệm cà phê tàu hỏa cổ điển và chiêm ngưỡng toàn cảnh thung lũng chè xanh mướt từ trên cao.', 0x1818),
(9, 'Vườn ánh sáng Lumiere - Đà Lạt', 'Lumiere Đà Lạt là địa điểm tham quan Đà Lạt độc đáo kết hợp giữa công nghệ ánh sáng hiện đại và nghệ thuật sắp đặt tinh tế. Khi mua vé Lumiere, bạn như lạc vào một thế giới huyền ảo với hàng triệu ánh đèn led tạo nên những khung cảnh lung linh, kỳ diệu. Đây chắc chắn là nơi cho ra đời những bức ảnh check-in Đà Lạt \"triệu like\" và những kỷ niệm khó quên.\r\n\r\n', 0x1919),
(10, 'Rừng thông núi Voi - Đà Lạt', 'Bạn yêu thích khám phá thiên nhiên và muốn tìm kiếm những địa điểm du lịch ở Đà Lạt mang vẻ đẹp nguyên sơ? Rừng thông núi Voi sẽ là điểm đến lý tưởng. Với những cánh rừng thông bạt ngàn, không khí trong lành, mát mẻ, núi Voi mang đến cảm giác yên bình, thư thái. Bạn có thể tổ chức cắm trại, dã ngoại, trekking và tận hưởng trọn vẹn vẻ đẹp của núi rừng Tây Nguyên.', 0x2020),
(11, 'Fresh Garden - Đà Lạt', 'Fresh Garden là một trong các địa điểm du lịch Đà Lạt kết hợp giữa mô hình nông trại công nghệ cao và khu du lịch sinh thái. Đến đây, bạn không chỉ được tham quan vườn dâu tây công nghệ cao, vườn rau thủy canh, mà còn có thể chụp ảnh giữa những vườn hoa rực rỡ sắc màu. Fresh Garden còn có khu vực nhà hàng phục vụ các món ăn đặc sản Đà Lạt, hứa hẹn mang đến cho bạn một trải nghiệm trọn vẹn.', 0x2121),
(12, 'Đồi Robin - Đà Lạt', 'Đồi Robin là một trong những địa điểm du lịch ở Đà Lạt nổi tiếng với vé cáp treo đồi Robin đưa bạn đến Thiền Viện Trúc Lâm. Ngồi trên cabin cáp treo, bạn sẽ được chiêm ngưỡng toàn cảnh thành phố Đà Lạt với những ngôi nhà xinh xắn, những vườn hoa rực rỡ và hồ Tuyền Lâm thơ mộng. Đây cũng là điểm check-in Đà Lạt lý tưởng cho những ai yêu thích phong cảnh thiên nhiên.', 0x2222),
(13, 'Fairytale Land - Đà Lạt', 'Bạn muốn tìm kiếm địa điểm du lịch Đà Lạt độc đáo và mới lạ? Fairytale Land sẽ đưa bạn lạc vào thế giới cổ tích với những ngôi nhà tí hon, những khu vườn đầy màu sắc và các nhân vật trong truyện tranh. Đây là nơi lý tưởng để bạn chụp ảnh, sống ảo và lưu giữ những khoảnh khắc đáng nhớ bên gia đình và bạn bè.\r\n\r\n', 0x2323),
(14, 'Bảo tàng trà Long Đỉnh - Đà Lạt', 'Nằm giữa đồi chè xanh mướt, Bảo tàng trà Long Đỉnh là địa điểm tham quan Đà Lạt lý tưởng cho những ai yêu thích trà đạo. Mua vé tham quan bảo tàng trà Long Đỉnh, bạn sẽ được tìm hiểu về lịch sử hình thành và phát triển của ngành trà Việt Nam, quy trình sản xuất trà từ truyền thống đến hiện đại, thưởng thức những tách trà hảo hạng và mua sắm các sản phẩm trà đặc sản.', 0x2424),
(15, 'Thung lũng tình yêu - Đà Lạt', 'Thung lũng tình yêu là một trong những địa điểm du lịch ở Đà Lạt nổi tiếng với khung cảnh thiên nhiên thơ mộng, hữu tình. Mua vé tham quan thung lũng tình yêu, bạn có thể dạo bước trên những con đường rợp bóng hoa, chụp ảnh bên hồ nước trong xanh, tham gia các hoạt động vui chơi giải trí như đạp vịt, cưỡi ngựa, hay đơn giản là tận hưởng không khí trong lành, yên bình.', 0x2525),
(16, 'Thị trấn Nobi - Đà Lạt', 'Thị trấn Nobi là địa điểm du lịch Đà Lạt mới lạ, tái hiện lại khung cảnh làng quê Nhật Bản trong bộ truyện tranh nổi tiếng Doraemon. Mua vé tham quan thị trấn Nobi, bạn sẽ được gặp gỡ những nhân vật quen thuộc như Doraemon, Nobita, Shizuka,... tham gia các trò chơi dân gian, thưởng thức ẩm thực Nhật Bản và chụp ảnh lưu niệm.', 0x2626),
(17, 'Hồ Tuyền Lâm - Đà Lạt', 'Hồ Tuyền Lâm là một trong những địa điểm du lịch ở Đà Lạt nổi tiếng với vẻ đẹp thơ mộng, trữ tình. Tại đây, bạn có thể tham gia nhiều hoạt động thú vị như chèo SUP, cắm trại bên hồ, trekking khám phá rừng Quảng Thừa, hay đơn giản là ngồi thuyền ngắm cảnh, tận hưởng không khí trong lành.', 0x2727),
(18, 'Đường hầm điêu khắc đất sét - Đà Lạt', 'Đường hầm điêu khắc là địa điểm tham quan Đà Lạt ấn tượng với những tác phẩm điêu khắc bằng đất sét tái hiện lịch sử hình thành và phát triển của Đà Lạt. Mua vé tham quan đường hầm điêu khắc, bạn sẽ được chiêm ngưỡng những công trình kiến trúc thu nhỏ, những bức tượng sống động và tìm hiểu thêm về văn hóa, lịch sử của thành phố ngàn hoa.', 0x2727),
(19, 'Cao nguyên hoa - Đà Lạt', 'Cao nguyên hoa Đà Lạt là địa điểm du lịch Đà Lạt lý tưởng cho những ai yêu thích hoa. Khi đến đây, bạn sẽ được chiêm ngưỡng hàng trăm loài hoa khoe sắc, từ những loài hoa quen thuộc đến những loài hoa quý hiếm. Đây cũng là nơi lý tưởng để bạn chụp ảnh check-in Đà Lạt và mua sắm các sản phẩm hoa tươi.', 0x2828),
(20, 'Làng Cù Lần - Đà Lạt', 'Làng Cù Lần là địa điểm tham quan Đà Lạt độc đáo, nơi bạn có thể tìm hiểu về văn hóa và đời sống của người dân tộc K\'Ho. Đến đây, bạn sẽ được tham gia các hoạt động văn hóa truyền thống, thưởng thức ẩm thực đặc sắc và mua sắm các sản phẩm thủ công mỹ nghệ.', 0x2929),
(21, 'Madame De - Đà Lạt', 'Madame De Dalat là một biệt thự cổ kính mang đậm dấu ấn kiến trúc Pháp. Mua vé tham quan Bảo tàng và Vườn Madame De Dalat, bạn sẽ được chiêm ngưỡng nội thất sang trọng, tìm hiểu về lịch sử của ngôi biệt thự và gia đình chủ nhân, đồng thời có cơ hội chụp những bức ảnh đậm chất vintage.', 0x3030),
(22, 'Hồ Than Thở - Đà Lạt', 'Theo truyền thuyết địa phương ở Đà Lạt thì Hồ Than Thở là nơi mà một số cặp tình nhân vượt qua rất nhiều khó khăn để gặp nhau nhưng không thể ở bên nhau. Đây là một truyền thuyết buồn, nhưng bản thân hồ rất đẹp và được rất nhiều các cặp vợ chồng chọn làm nơi để chụp ảnh cưới.', 0x3131),
(23, 'Chùa Linh Phước - Đà Lạt', 'Chùa Linh Phước (hay còn gọi là Chùa Ve Chai) là một trong những ngôi chùa nổi tiếng nhất cả nước với tháp chuông sừng sững ở độ cao 37 mét. Đây là tháp chuông cao nhất Việt Nam.\r\n\r\nNgoài ra chùa Linh Phước còn có một sảnh đường trung tâm đầy màu sắc ở đây với một loạt các bức tranh tường kể lại câu chuyện về cuộc đời của Đức Phật.', 0x3232),
(24, 'Ngôi nhà điên - Đà Lạt', 'Đây là một trong những địa điểm du lịch Đà Lạt nổi tiếng kỳ quặc nhất. Tên thật của ngôi nhà là Nhà khách Hằng Nga và Phòng trưng bày nghệ thuật nhưng nơi đây chủ yếu được biết đến với biệt danh Crazy House (ngôi nhà điên).\r\nNgôi nhà được thiết kế vào năm 1990 bởi kiến trúc sư nổi tiếng Đặng Việt Nga. Sở dĩ có cái tên như vậy bởi ngôi nhà được xây dựng giống hình một cái cây với hình dáng rất kì dị cùng cấu trúc bên trong cực kì phức tạp.', 0x3333),
(25, 'Chợ Đà Lạt', 'Nếu bạn muốn thấy một khía cạnh truyền thống của thành phố thì chợ Đà Lạt là một nơi tuyệt vời để ghé thăm. Ở đây bạn sẽ tìm thấy khoảng 1000 cửa hàng và ở đây có tất cả những gì bạn cần luôn.\r\nBạn sẽ thấy những quầy hàng chất đống với những sản phẩm tươi sống đầy màu sắc, bạn cũng có thể tìm thấy các cửa hàng hoa xinh đẹp cũng như các quầy hàng trưng bày những chai rượu nổi tiếng do người địa phương sản xuất.\r\n\r\nĐây cũng là một địa điểm tốt để bạn có thể sở hữu cho mình một số món quà lưu niệm như đồ thủ công mỹ nghệ của những người dân tộc, các vật dụng trang trí xinh xinh được sưu tập từ tự nhiên.', 0x3434),
(26, 'Bờ hồ Xuân Hương - Đà Lạt', 'Hồ Xuân Hương là một hồ nhân tạo cũng là một trong những thắng cảnh chính của Đà Lạt. Bao quanh hồ là những vườn cây xanh mướt vời các loài hoa và thực vật bản địa, bạn có thể đi dạo vào buổi chiều và ngắm nhìn các thắng cảnh xung quanh hồ.\r\nDọc theo bờ hồ là một số quán cà phê nhỏ được trang trí rất xinh, nơi bạn có thể thưởng thức đồ uống và tận hưởng bầu không khí yên tĩnh. Các hoạt động phổ biến khác tại hồ bao gồm cưỡi ngựa, xe đẩy và đạp thuyền trên hồ.', 0x3535),
(27, 'Ga Đà Lạt', 'Ga Đà Lạt được xây dựng vào năm 1943, tuy nhỏ nhưng nó mang đến cho bạn một cái nhìn tuyệt vời về cách mà người xưa dùng để đi lại.\r\nCác cửa sổ bán vé truyền thống vẫn còn ở đây và bạn có thể trải nghiệm một chuyến đi tàu hỏa khoảng 5 km lên một con đèo. Tuy nhiên, một điều cần lưu ý là số hành khách tối thiểu để tàu chạy là 4 người, vì vậy bạn có thể đi chung với bạn bè hoặc tìm thêm những người khác.', 0x3636),
(28, 'Chùa Lâm Tỳ Ni - Đà Lạt', 'Chùa Lâm Tỳ Ni được tạo thành từ một tu viện nhỏ nằm bên trong một khu vườn truyền thống. Tại đây còn có một phòng trưng bày các tác phẩm nghệ thuật do thiền sư Viên Thức quản lý.\r\n\r\nNhư vậy, bạn có thể tham quan tu viện và đồng thời xem các bức tranh của ông ấy và thậm chí chọn một tác phẩm nghệ thuật của tu viện để mang về nhà.\r\n\r\nChùa Lâm Tỳ Ni là một trong những điểm tham quan nổi tiếng ở Đà Lạt mà hầu như tất cả các hướng dẫn viên du lịch đều muốn bạn ghé qua.', 0x3737),
(29, 'Chùa Linh Sơn - Đà Lạt', 'Nếu bạn muốn đến thăm một trong những ngôi chùa ít được biết đến ở Đà Lạt thì hãy cân nhắc một chuyến đi đến chùa Linh Sơn.\r\n\r\nNgôi chùa này nằm trên một ngọn đồi có tầm nhìn hướng về thành phố, một trong những nơi có view đẹp nhất trong list địa điểm du lịch Đà Lạt.\r\n\r\nMột trong những điều tuyệt vời nhất về ngôi chùa là nơi đây cũng có đồn điền trồng trà và cà phê riêng, vì vậy bạn cũng có thể xem các nhà sư thu hoạch trà và cà phê khi vào mùa.', 0x3838),
(30, 'Thác Pongour - Đà Lạt', 'Thác Pongour đổ xuống từ độ cao 20 mét và khi leo lên thác, bạn sẽ có thể nghe thấy tiếng nước va vào những tảng đá bên dưới. Bạn có thể đi bộ dưới làn sương mù mát lạnh được tạo ra bởi ngọn thác, đó sẽ là một trải nghiệm rất tuyệt vời', 0x4040),
(31, 'Samten Hills - Đà Lạt', 'Nếu bạn đang tìm kiếm một địa điểm du lịch Đà Lạt để \"trốn\" khỏi sự ồn ào, náo nhiệt của phố thị, hòa mình vào thiên nhiên và tận hưởng không khí trong lành, thì Samten Hills Dalat chính là điểm đến lý tưởng.\r\n\r\nNằm ẩn mình giữa đồi núi hùng vĩ, Samten Hills là một khu nghỉ dưỡng sinh thái mang đến cho bạn cảm giác bình yên, thư thái tuyệt đối. Tại đây, bạn có thể chiêm ngưỡng khung cảnh thiên nhiên tuyệt đẹp với những đồi thông xanh mướt, những vườn hoa rực rỡ và hồ nước trong xanh.\r\n\r\nSamten Hills Dalat còn cung cấp đa dạng các hoạt động thú vị như:\r\n\r\nDạo bộ, đạp xe, yoga giữa thiên nhiên\r\nThưởng thức trà đạo và thiền định\r\nTham gia các lớp học về văn hóa, nghệ thuật\r\nThưởng thức ẩm thực chay thanh đạm\r\nVới không gian yên tĩnh, cảnh quan tuyệt đẹp và dịch vụ chu đáo, Samten Hills Dalat là địa điểm tham quan Đà Lạt hoàn hảo để bạn nghỉ ngơi, thư giãn và nạp lại năng lượng.', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `income` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `dob`, `gender`, `email`, `income`) VALUES
(1, 'nguyenvana', '$2y$10$1234567890abcdefghijklmnopqrstuv', 'Nguyễn Văn A', '01/1995', 'Nam', 'vana@example.com', '12000000'),
(2, 'tranthib', '$2y$10$abcdefghij1234567890klmnopqrstuv', 'Trần Thị B', '03/1998', 'Nữ', 'thib@example.com', '8500000'),
(3, 'letrongc', '$2y$10$zxcvbnmasdfghjklqwertyuiop123456', 'Lê Trọng C', '07/1992', 'Nam', 'trongc@example.com', '15000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
