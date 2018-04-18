-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 04:23 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `group_number` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `exam_score` smallint(3) NOT NULL,
  `birth_year` year(4) NOT NULL,
  `residence` enum('resident','nonresident') NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `gender`, `group_number`, `email`, `exam_score`, `birth_year`, `residence`, `hash`) VALUES
(4, 'Артем', 'Трушкин', 'm', '11а', 'atrushkin1@gmail.com', 248, 1996, 'resident', '4acfa0e366e6655b511597aed128894474e2dc5772d85800fa36a68797ab078e'),
(5, 'Леся', 'Лесева', 'f', '12а', 'leseva@gmail.com', 280, 1996, 'nonresident', 'd5eadf084f38cfcfdfc87b5f426158cf4e88030b25e8420b680c0d1a4f65c980'),
(7, 'Артем', 'Коваль', 'm', '11а', 'koval@gmail.com', 220, 1996, 'resident', '44032418cd4ca4b4c58e243450b62d3ac5c54bbbe428ea14e9c01fb18bb3128d'),
(8, 'Джон', 'До', 'm', '11б', 'johndoe@gmail.com', 300, 1996, 'nonresident', 'e492aa6078d0eef3a915c508f2a48740f81d4ae007aa3135f8386ba16ef665be'),
(9, 'Инна', 'Шурыгина', 'f', '11а', 'shurigina@mail.ru', 100, 1999, 'resident', '685f248dc5fa451a45cd8595e476e23ea7e163edbe564c7377676b137f009e91'),
(10, 'Савва', 'Романов', 'm', '21б', 'svetlana.kornilov@inbox.ru', 183, 2006, 'nonresident', '58f70e7d9670844f02be9a34cabb509c8f4f47a0d8231fc9bdc88cee5f4780b3'),
(11, 'Софья', 'Кулакова', 'f', '195а', 'iosif65@gmail.com', 109, 2001, 'nonresident', '72f3a24ea74389282e6367c738b4374bf825354525c2260009c8f9d95430c743'),
(12, 'Василиса', 'Голубева', 'f', '207г', 'adrian84@rambler.ru', 99, 1996, 'resident', 'e51b027f6c1a29f67429a00517ad10da17793234cbb19670eeca6d85d1d8eb11'),
(13, 'Инесса', 'Капустина', 'f', '16в', 'alla51@inbox.ru', 183, 2004, 'resident', 'a835243936b293813010f7288c7c807cd189b602f415134ce263fcbc022e217e'),
(14, 'Давид', 'Силин', 'm', '299а', 'mmakarov@yandex.ru', 177, 2005, 'nonresident', 'e0a5f366c0046c52a4a2c41bed13d5415853f3a9697b871c5b0082b13a7984fc'),
(15, 'Кузьма', 'Кошелев', 'm', '284б', 'dary07@list.ru', 213, 2007, 'resident', '6ad8eb2bb24555ddabe0416da6d8594574d30418062516759c53e39bd0d444b2'),
(16, 'Родион', 'Петров', 'm', '20а', 'dgulyev@rambler.ru', 129, 1997, 'resident', '224612a7acbd1eaaabac520b5cd8467e50de5510565538892cb4848346c0cd53'),
(17, 'Владислав', 'Николаев', 'm', '172в', 'ivanov.varvara@inbox.ru', 251, 1998, 'nonresident', '01e1efec93ae79f02368ed2e4d17a91520db70f2caa933fd37dc9ca2e364b26a'),
(18, 'Оксана', 'Корнилова', 'f', '183в', 'uvarov.emma@inbox.ru', 212, 1999, 'resident', '9d99d1c46d3a9c56975c9268d506c4c8427add24d66ea419fbb729d76ad6dd02'),
(19, 'Эльвира', 'Нестерова', 'f', '30б', 'kkoselev@mail.ru', 158, 1990, 'resident', '74b0e5992e318db0580f6b0155d75c09c97edc1e9a213a893390c03584c1cc18'),
(20, 'Нонна', 'Лукина', 'f', '166б', 'regina.afanasev@rambler.ru', 187, 2002, 'nonresident', '0f3f55dd607a2b524ddcfc8304ed03d976edc3dcd0d65f8d0281d847dc1767fc'),
(21, 'Яна', 'Бобылёва', 'f', '80г', 'nestor86@inbox.ru', 158, 1993, 'resident', '5d2aef8719a8c1d788cbd57acc5a44db3d87af78586a96bd13a9064c7c980e61'),
(22, 'Алексей', 'Абрамов', 'm', '176г', 'evseev.olesy@ya.ru', 138, 1990, 'nonresident', '2423c676c80b63aed8fd2b6bfb1cd204c17766ac42e5fee771636b86ac27eecc'),
(23, 'Всеволод', 'Овчинников', 'm', '292г', 'nbelousov@narod.ru', 155, 1992, 'resident', '9814c8718b61b1a7549eca1b33eb390c021c4d99f6e28d7eb5c8ba594d98c7f1'),
(24, 'Ирина', 'Аксёнова', 'f', '239а', 'wgavrilov@yandex.ru', 112, 1991, 'nonresident', '62a311504d4b1f646ea7055b617cd6a41967a8bcaeb0b78edf8b3ce91b32bf5a'),
(25, 'Эмилия', 'Меркушева', 'f', '119б', 'lgrisin@yandex.ru', 285, 2006, 'nonresident', '7bf560926b102b721fa5d470502ec1b8dbd24f934f4ccf12156a52f82cb6e0b5'),
(26, 'Денис', 'Самсонов', 'm', '211в', 'margarita.afanasev@hotmail.com', 131, 1996, 'resident', '5a1081a1ca4c3410b8c02e7253200ff31d6b7691e67e93c50f6f0ea8a9c46984'),
(27, 'Тамара', 'Рогова', 'f', '235а', 'oovcinnikov@mail.ru', 257, 2000, 'resident', '189fd6483c5976adddbd7663101a73531103f5c42bed17c4df4758b571fcc4b7'),
(28, 'Анастасия', 'Блохина', 'f', '11б', 'nikitin.sofy@inbox.ru', 107, 2008, 'nonresident', '700cc84ac8ca9a89f375c93296a7698db9858c1f30ffbd8db0b0ffe7f197796e'),
(29, 'Герасим', 'Голубев', 'm', '293в', 'tarasov.gennadii@bk.ru', 194, 1992, 'resident', '9ab3deefa8ed2e7fe47363aaa55c8694bee41a8e57764db660372c00a7787a43'),
(30, 'Владимир', 'Волков', 'm', '251б', 'ykov.merkusev@inbox.ru', 284, 2005, 'resident', 'ac5abb97eb3687b9aecff33619535d7a2bd90873b922dcbcb5ce2dc0683ab0fe'),
(31, 'Прохор', 'Мясников', 'm', '219в', 'lada26@mail.ru', 247, 2002, 'nonresident', 'b446b83e1127c9d448427710ecd8de7d89a7e012072ee8c0d8a59989e3fee5d6'),
(32, 'Никодим', 'Стрелков', 'm', '10г', 'odintov.vladislav@gmail.com', 234, 1990, 'nonresident', '50523d7ddc6449ef0d347e27aef8fb6942627d416e70977d0fbcb7ec2ce91da8'),
(33, 'Тит', 'Горшков', 'm', '213в', 'clukin@hotmail.com', 284, 2003, 'resident', '636aaee08b1e38bf1fc3f3fb3a0058ce0059d0abdc2922fc63cf782f29c064ed'),
(34, 'Диана', 'Киселёва', 'f', '181б', 'danilov.roman@ya.ru', 251, 1990, 'nonresident', '953e078f4202fa56162004daf0bc43a8a4ad2c7c5b81c8cff32a6ca6e170d60f'),
(35, 'Лариса', 'Александрова', 'f', '183б', 'kblokin@hotmail.com', 131, 2002, 'nonresident', '694791e7b7a78b0f6fc878896c3ad32f738d220f3bff8d64057b6ccfaabbd56c'),
(36, 'Абрам', 'Сафонов', 'm', '230в', 'lybov.siryev@hotmail.com', 136, 1997, 'nonresident', '7b512ccf77b1ee5ba45b20c10d2ff55231e9389dcc95de9e29eae663bd0d9fc4'),
(37, 'Донат', 'Никифоров', 'm', '65г', 'svetlana.lukin@ya.ru', 220, 1992, 'nonresident', '74ebf121cf6beda8ffecff631b412c6beaf5da4e97051e5eef1695d809d06423'),
(38, 'Анфиса', 'Лебедева', 'f', '135г', 'fodintov@list.ru', 264, 1990, 'nonresident', 'd455b6e3764a21090243ac8e6da09898c877792ec5f122795456e3c6cba6e19b'),
(39, 'Евгений', 'Гуляев', 'm', '230б', 'tatyna38@bk.ru', 111, 1998, 'resident', 'dd4c76589f698a894302394781d07f20e0e0e45ab5243284e1a9c37ac46139d6'),
(40, 'Артём', 'Дьячков', 'm', '247а', 'yliy.melnikov@ya.ru', 189, 1997, 'resident', 'c27d43ff059a01f9e16f7af45c6cafdcba394d3128525ee54416a7c5434846db'),
(41, 'Альберт', 'Максимов', 'm', '180г', 'isakov.adrian@gmail.com', 189, 1998, 'nonresident', '22d25d683903f4603a0073b49215215745f1d6d785d1be4602b4bd8602c35fde'),
(42, 'Диана', 'Белякова', 'f', '179в', 'hgavrilov@yandex.ru', 156, 1995, 'nonresident', '6da67e761ec97ef6dff77436f6aab2a78188c526312a6321be6e464acd444f18'),
(43, 'Филипп', 'Савин', 'm', '124г', 'azimin@gmail.com', 128, 1993, 'resident', '7a0275f7893bf239d2381664be4318bdc4df17a888290e3aa3db0a9620232a98'),
(44, 'Татьяна', 'Пестова', 'f', '282б', 'dmitrii.isaev@rambler.ru', 291, 1990, 'nonresident', 'fa4476609eab2a4df9616e0b421bd8f2250f90d0dfa83117021f9635a24372b9'),
(45, 'Лидия', 'Воронова', 'f', '155г', 'timofeev.nadezda@inbox.ru', 124, 2004, 'nonresident', '5af6a27959372871692d7060b0ad1a44c64c4a5b0d98fd7779904ddaf54fef02'),
(46, 'Дина', 'Цветкова', 'f', '297а', 'aksenov.valeriy@list.ru', 103, 2000, 'resident', '44b29d734c7d7309d29baf5ded41693db3329ed1f4f6f4f4b02f591e011be316'),
(47, 'Варвара', 'Кириллова', 'f', '86а', 'ilin.alla@mail.ru', 288, 2005, 'nonresident', '77623e79946ab68a52f44d8de6d92d372ec9b3d2b23647f7dc8cb4e1cbe3d34e'),
(48, 'Милан', 'Носов', 'm', '21а', 'yroslava.nesterov@bk.ru', 107, 1999, 'nonresident', '43dc5b06eee7cfe7a3adf4e25e7f6ef618161610782ab1adbc14513ac38bac3c'),
(49, 'Ярослава', 'Фомичёва', 'f', '146а', 'kalinin.faina@bk.ru', 222, 1993, 'resident', 'ade3fa9fa2b5932a9296bb87c740d89fba2b38c68d9aa5f5f00c7f1ba45776b1'),
(50, 'Эрик', 'Давыдов', 'm', '105в', 'efimov.oleg@ya.ru', 272, 2003, 'resident', '89a4cc44da2639b81e12b9fdaec5c0ba4270cbbdcfc3d49dbf9b47c73bc73348'),
(51, 'Леонид', 'Королёв', 'm', '216г', 'dina.maslov@hotmail.com', 108, 1994, 'resident', '97dd94e31eb7e59c522738762a423513e599ccdd47800bdb7882a07844677f09'),
(52, 'Валерий', 'Голубев', 'm', '117а', 'rterentev@rambler.ru', 261, 1992, 'nonresident', '90b9a17c1eb4fa0ceb430958e886c1cdcfe120a8c4b7e668fbe8499dcb350076'),
(53, 'Адриан', 'Ларионов', 'm', '256а', 'arkadii36@inbox.ru', 230, 1998, 'resident', '9bc196b355c638124bca107ce3a444daefb7c6b0b6a4b086282ff6e0a0f0ba4a'),
(54, 'Мария', 'Селезнёва', 'f', '82а', 'vyceslav.subbotin@narod.ru', 205, 2004, 'nonresident', '233a4fb85c3b21114dfd08a3a1d2245af0c86b075dd5d43de85aacbc9485e77f'),
(55, 'Вадим', 'Фомин', 'm', '289б', 'permakov@list.ru', 112, 2001, 'nonresident', '1635fea3895337de212460fa963f71e8da9da2be13bb02a7629c3ea2c9e24cb2'),
(56, 'Алина', 'Баранова', 'f', '23в', 'andrei.tikonov@bk.ru', 220, 1996, 'nonresident', '3ca1026c4cd1ab485a5bfafab5d4bd1f1339b2724834397b10a312acabb8285b'),
(57, 'Владислав', 'Алексеев', 'm', '270в', 'pdrozdov@gmail.com', 103, 2000, 'nonresident', 'ebf9a44b498c45e07cb4145296b252b327800235b2cbbe6f83db10dd662156ca'),
(58, 'Владлен', 'Михеев', 'm', '25в', 'lev86@gmail.com', 237, 2004, 'resident', '6b80436d82e507ba08f0c5d3dbe3c4575595daaa2d77021096f8be8935ed5a43'),
(59, 'Ника', 'Данилова', 'f', '58б', 'lykusev@ya.ru', 246, 1992, 'resident', '2995d952224884e0119b4d18f564e8ad00dc98b7b92cdbb70082a3be1df13a77'),
(60, 'Валериан', 'Гуляев', 'm', '60б', 'nonna10@hotmail.com', 280, 1990, 'nonresident', 'b171a139a1e7a597f2c6d67dacc6e6ae27a17fd5d42855abf566040f5c98327d'),
(61, 'София', 'Медведева', 'f', '106г', 'visnykov.mikail@rambler.ru', 166, 1995, 'nonresident', '5938f4bd577672e44dcbc96342a22a84b6f912a5e2bca2094c9d7e0bb6c1f76e'),
(62, 'Диана', 'Гурьева', 'f', '206б', 'tvetkov.lysy@bk.ru', 157, 1996, 'nonresident', '3b276754c3397a22b6661cae9c0fe0415c3e9c16d0fd6c4117d1012827a24293'),
(63, 'Валериан', 'Комаров', 'm', '235а', 'malvina32@inbox.ru', 194, 1996, 'nonresident', '12769aa0a901c67b82bf296865bb9f6917a4e13ab85a81a8ce60318f0f6290ba'),
(64, 'Клементина', 'Пономарёва', 'f', '21б', 'anisimov.matvei@bk.ru', 173, 2006, 'resident', '960ec928c14723fb3cdd453ff4d2fbd3e3fe1d7520990f26ba904d282785a839'),
(65, 'Яков', 'Цветков', 'm', '151а', 'viktor.bespalov@narod.ru', 221, 2004, 'nonresident', 'c42a752faa284fecbedd323b0dde632c1e90c7844d5b10f21730039ea69858d2'),
(66, 'Оксана', 'Мельникова', 'f', '125г', 'dgolubev@bk.ru', 230, 1995, 'resident', '2861f5fbc3cd72142b1ad6dd85f2a385cb0bf9a1fdaf49f7b6d6b5e53b39b441'),
(67, 'Максим', 'Максимов', 'm', '172б', 'grogov@narod.ru', 95, 1996, 'nonresident', 'fb1445efbb46edf5f12c0c2b39ac8d786ce8fc7de255b061f3a2ae3870b58dba'),
(68, 'Ярослава', 'Сафонова', 'f', '93б', 'ygorbunov@mail.ru', 100, 2001, 'nonresident', '8699b8170891f8416fd3de0b29509749c5343a2bfc85e9882ca6563cbbc1e4a3'),
(69, 'Розалина', 'Жданова', 'f', '227в', 'gnikolaev@gmail.com', 262, 1998, 'nonresident', '4d61235a5e99f33c35d629d3a1607542d961699658f21b1cbe7734485ad8f059'),
(70, 'Евгений', 'Константинов', 'm', '225а', 'rkulikov@list.ru', 158, 1991, 'resident', '1f0e33cf4ef8ac2e9a908122020f75f2578db9035f6e4ba9c3d13bcbec3a8ee2'),
(71, 'Рада', 'Константинова', 'f', '283в', 'osokolov@gmail.com', 256, 1998, 'nonresident', '402af5a1f4b0d2b1196d4241e3f45d7a179c9b71c484bc76339eee9793c15303'),
(72, 'Елена', 'Сорокина', 'f', '295б', 'efim77@bk.ru', 158, 2004, 'nonresident', '706c28e2e8507dd1f7bd8d0ea305d4d20dcf80bdabe37e4cbcc5fbc40bef1c9c'),
(73, 'Андрей', 'Сидоров', 'm', '140а', 'qlapin@gmail.com', 170, 2006, 'nonresident', '09a29d4ead19cc27c66d5ab7d7d4344df1364ab0984fdd8a8f49643cd176ee04'),
(74, 'Григорий', 'Некрасов', 'm', '60а', 'sofiy37@narod.ru', 137, 2005, 'resident', '7e12165227cbd2c3d085f76a34933fea1e03fb35a1ad913d6bffc0b127b7f42c'),
(75, 'Давид', 'Селезнёв', 'm', '282б', 'valentina.potapov@hotmail.com', 158, 1993, 'resident', '200c3d69687043765ad87825d02c179a62fe3bd2753af09b5465da10acac0010'),
(76, 'Инесса', 'Филиппова', 'f', '253в', 'olesy66@gmail.com', 94, 2005, 'resident', '422d89fb15d5a9493ebeb3436c41544d0d38df3612d69334ad8799ab6f7c95a2'),
(77, 'Ева', 'Агафонова', 'f', '179б', 'anna.sergeev@mail.ru', 268, 2002, 'resident', '9897211931935b23b530d2a01e3f620bd325ca30054decca8f004878b22e8baa'),
(78, 'Альберт', 'Костин', 'm', '109в', 'lidiy87@mail.ru', 142, 2001, 'nonresident', 'e9f9edc3bdd71e878a529b34bb1b48b9a329858403a05206ecd9136a26aee659'),
(79, 'Семён', 'Быков', 'm', '140б', 'esaskov@bk.ru', 192, 1990, 'resident', 'c84837d13afe4b4b68841a9a778fbcbe1904681bbc82c18a28d1db24f5e36362'),
(80, 'Елизавета', 'Трофимова', 'f', '172а', 'antonina.frolov@mail.ru', 196, 2005, 'nonresident', '7e645c15676f40ffef504bbec317bd90563fd5e6eead4330f4f99087ff3c574e'),
(81, 'Мирослав', 'Крылов', 'm', '170в', 'yrii.zuev@rambler.ru', 259, 2007, 'resident', 'c02b5e778794d7e5a1b131da63513102b2a336ba45bfe299d00d40b6af27cc67'),
(82, 'Иммануил', 'Титов', 'm', '162б', 'valeriy30@gmail.com', 211, 2000, 'nonresident', '9eebb235f75349f72e25347d1cedcc46a969635a66f6c726e66ee295dc07ccdd'),
(83, 'Лев', 'Фокин', 'm', '141г', 'daniil85@narod.ru', 154, 1990, 'resident', '55a35d0d2f1adb2069557b5fb1ad02282dde002dc35447fa95c8018b39dff113'),
(84, 'Тамара', 'Силина', 'f', '137а', 'andrei.bobylev@gmail.com', 263, 2003, 'nonresident', '4b9a8d54e2ef9274510e84f39165c295936602201088b62af4ae06ef59df5949'),
(85, 'Геннадий', 'Зимин', 'm', '281г', 'ekomarov@ya.ru', 112, 2001, 'resident', 'f984d8d5934e0a8b39408cf258a132ff9fa096a29ad04905659258b382b1095d'),
(86, 'Лидия', 'Иванова', 'f', '297в', 'platon31@hotmail.com', 239, 2007, 'resident', '9b7d64557134bd51c99282b2aca3bfdc633f0ddec49dd6fc8fb47da08db801cc'),
(87, 'Святослав', 'Баранов', 'm', '174б', 'faina67@gmail.com', 150, 1993, 'resident', '72a0a26cbb89a63516f732b9bb5a10f92e2362c769318d8b565ec7e63d9a048d'),
(88, 'Сергей', 'Калинин', 'm', '72в', 'petrov.boris@hotmail.com', 150, 1994, 'resident', '362768e7c765c4440e1047983e25a0eca23079b93b4f5eb8b60c9f964b859d19'),
(89, 'Марат', 'Уваров', 'm', '298г', 'dzuev@inbox.ru', 179, 2005, 'nonresident', '66a8dd0c80ef9358a36df61be2ce0b92e243a6f268beeefdc8d1cfe4eb00b06b'),
(90, 'Борис', 'Гордеев', 'm', '116б', 'anna78@ya.ru', 294, 2000, 'nonresident', 'b31aca7a72fa63264de41876baf7a85d90d8d190c667b37146bd05b5d46e6030'),
(91, 'Валериан', 'Шубин', 'm', '210в', 'roman16@gmail.com', 209, 2007, 'nonresident', '23e159eb56ebe921e140654586994d7634c742e7742cda80c3d98ff8d0d9ff98'),
(92, 'Аким', 'Сысоев', 'm', '187г', 'cernov.anna@bk.ru', 290, 2008, 'resident', '26d79bec9bf90cce1f6449c5588d815b168981190ea22f60e18909008ccf9832'),
(93, 'Полина', 'Воробьёва', 'f', '234г', 'galina86@ya.ru', 222, 2004, 'nonresident', '8b6c5c07bb3f39d81fe6d37372edc9e4901e4bc06abd2c4e0d0bced61535c4f5'),
(94, 'Семён', 'Фомин', 'm', '270б', 'lkuzmin@gmail.com', 170, 1993, 'resident', '5e8dbc128f5b6dbef7d4d8c6a7a8d8ecb8716790b6dd0aedfe690c509ce0bd8e'),
(95, 'Евгения', 'Осипова', 'f', '66б', 'varvara.bobylev@gmail.com', 155, 2004, 'resident', 'fa30e0bdf6c5cf373a6203cd48c0f12c4e381f2dd0033fc02fca963eced47413'),
(96, 'Федосья', 'Захарова', 'f', '80г', 'mosipov@yandex.ru', 251, 1996, 'nonresident', 'b2e4db535a78f0393ede20b8ff113c64ff84a9bc5971f2bc5d3bd44c52db271d'),
(97, 'Тимур', 'Соловьёв', 'm', '285б', 'anastasiy.burov@rambler.ru', 181, 2008, 'resident', '3eab76e2c5ba37824be7e876971feace2202262f307c8185384d84e5f5f1a1d2'),
(98, 'Игнатий', 'Кошелев', 'm', '38а', 'rodion.antonov@narod.ru', 261, 2003, 'nonresident', '5f3d58f83e6205279e96843c768152ec2e3fc7f509916f6b0685e395d2172076'),
(99, 'Ирина', 'Орехова', 'f', '191г', 'vyceslav.kapustin@inbox.ru', 245, 2001, 'resident', 'a0e27a49672421c482674993d7617598fa84af32f97deae199915eaf765715f7'),
(100, 'Илья', 'Копылов', 'm', '55а', 'snesterov@hotmail.com', 208, 2004, 'nonresident', '2e3608195b9980684528b4dad67b55e36f0a19eb839aea114fd3aca49cb1a913'),
(101, 'Дина', 'Орехова', 'f', '25г', 'larisa.fomin@list.ru', 97, 2001, 'nonresident', '9eeb1bc8636c4f4b97b5132c26c929c965a9aa764d1690c9bb0c72d5828db65c'),
(102, 'Абрам', 'Григорьев', 'm', '139г', 'vadim.kolesnikov@bk.ru', 287, 1990, 'resident', 'ac2494e9111fc16b8f546b9678fbb012c925268fea7fe89b1d7aaaf8d0f5fdfd'),
(103, 'Тимур', 'Захаров', 'm', '110г', 'egor.zukov@yandex.ru', 259, 1991, 'nonresident', 'd3692e195993bb04b10f796cf7451ddb647ef24bcb2f93969de7bfe55d25fba3'),
(104, 'Марина', 'Исакова', 'f', '298б', 'radislav79@list.ru', 119, 2004, 'nonresident', 'a28492b330e44328be7f25232573a059d94eeb609123c95f3635e7fc7af7bb12'),
(105, 'Инна', 'Щукина', 'f', '221в', 'klara.timofeev@rambler.ru', 207, 1996, 'nonresident', '4b462372c1bca2b6043863d2465c0fbeb7ff9c4042a28d78494d01973e500892'),
(106, 'Сава', 'Бобров', 'm', '218б', 'safonov.taras@bk.ru', 278, 2003, 'nonresident', 'ddeb52469c62f7ec76220c3f6365ebf38023f9c997143fc49c31e7c683f0cff3'),
(107, 'Николай', 'Авдеев', 'm', '197г', 'regina.blokin@hotmail.com', 251, 2001, 'resident', '8e7fcba9f1c56fa9abf11d6ab1dad67b884fa41cce22481eb60433266cc2919a'),
(108, 'Антон', 'Яковлев', 'm', '290а', 'zsarov@narod.ru', 169, 1991, 'resident', 'bd136096785b09b535a673ec54a48a58bfc0640726c4b3be4fc87fa581d5e179'),
(109, 'Галина', 'Иванова', 'f', '236б', 'eva13@bk.ru', 215, 1993, 'nonresident', 'bc17c2b21c8bb6c6b322af5bb279cc8900c68353e99bc2a91b777499550f6136'),
(110, 'Родион', 'Наумов', 'm', '48в', 'raisa16@mail.ru', 98, 1997, 'nonresident', 'fb11b9b94ba56f5b9fef34aecdb219e119838aaebfcbfb4a3a882dbb496de4a5'),
(111, 'Таисия', 'Козлова', 'f', '226в', 'mariy45@ya.ru', 245, 1991, 'nonresident', '79cdf43dbe8467c486dd57c4d2fc5358fc106130009541308f9d89c2516d43f7'),
(112, 'Изабелла', 'Богданова', 'f', '75а', 'suvorov.izolda@yandex.ru', 131, 1993, 'nonresident', 'c5b16785f957a970f5bfaff4c2f7435d9054557f2bcd6f1d6ab85b94d827c1ba'),
(113, 'София', 'Мартынова', 'f', '269б', 'marta.grisin@bk.ru', 215, 2005, 'resident', 'e14a193c872a52f2a523aca7a0d1b0d7b899596ea0f3e3c26a769f263e8ca82f'),
(114, 'Аркадий', 'Тетерин', 'm', '158г', 'ganisimov@hotmail.com', 271, 1995, 'resident', '3a624ccf2c4336dd4109d231db3ea59b956fbbbe72b87ed861d502f7e9ec3387'),
(115, 'Сергей', 'Пахомов', 'm', '253б', 'pdementev@inbox.ru', 236, 1996, 'nonresident', 'b19e6dd38f3f78f417a22df2631b8db6f7856df5f9a641b8f63c3fba8f39b02e'),
(116, 'Рада', 'Рогова', 'f', '120а', 'emma.lobanov@hotmail.com', 135, 2007, 'nonresident', '1525447e1ad8cde8c578a446e45d68572682c2c001e9ae1685264af4f3812561'),
(117, 'Клавдия', 'Полякова', 'f', '101г', 'bogdan.nesterov@hotmail.com', 180, 1991, 'nonresident', '900049233efd4f370f859538aed0a13072d3944a871d2b7ad7db2779bcb9434e'),
(118, 'Полина', 'Белозёрова', 'f', '103б', 'yroslava02@bk.ru', 136, 2000, 'nonresident', 'f61c9c5a3973f02810080188611bb5933135ddb9bf582597f17e91daa411d1ec'),
(119, 'Надежда', 'Фомичёва', 'f', '262г', 'gurev.maiy@mail.ru', 118, 2006, 'resident', '52c1a4a18a0ec8e7020c40fdd3e7a183220721ab7b2c4e6546b1764575c81497'),
(120, 'Егор', 'Федосеев', 'm', '72а', 'lidiy53@ya.ru', 160, 2004, 'nonresident', 'aaf7e3ff7156be7515968983fae23c809b29864d3cd3536ac441a4a9405507ca'),
(121, 'Нелли', 'Хохлова', 'f', '88г', 'oevseev@yandex.ru', 203, 1995, 'nonresident', '8795b357b5d2b875f61ce9251c174eda1b04132d02db994b33ba3ffd50e84318'),
(122, 'Евгений', 'Блохин', 'm', '138г', 'vadim34@inbox.ru', 195, 1990, 'resident', '3945e45bcc1ecb0e8d522d5e856b1bcb6a41b244c22a621da56fed9ccac14b2f'),
(123, 'Мария', 'Лебедева', 'f', '257г', 'gusev.vladlena@yandex.ru', 233, 1999, 'nonresident', 'd962ef949cdd23aed3bd091b3730cd95c45f27a181b88a4163979a34f9fa29b5'),
(124, 'Григорий', 'Матвеев', 'm', '45а', 'ylukin@mail.ru', 279, 1992, 'nonresident', 'dfb1351ea0b8fb5cb73475ee11292ec4ab30a653acf43572f59d1b11da84d837'),
(125, 'Пётр', 'Баранов', 'm', '16б', 'ily66@rambler.ru', 191, 1991, 'resident', '2f858b28790baf51e525b6c3783b03f0e8821c793e9eb47c9361fe94de422ef1'),
(126, 'Ксения', 'Суворова', 'f', '160г', 'wtvetkov@narod.ru', 164, 2007, 'resident', 'c0e190a0e2e69f5ccba8d44e0f1208b8873fd920ae06212df8ad5e58d5392518'),
(127, 'Илья', 'Архипов', 'm', '246в', 'raisa31@yandex.ru', 123, 1993, 'nonresident', '8be2c89972ce95ccae3dec90a528242365d6d765573a81e30ee944ece9abc18e'),
(128, 'Фаина', 'Стрелкова', 'f', '193а', 'radislav.bragin@hotmail.com', 140, 1996, 'resident', 'a333e38be82be43bda68bd596e26b00b84da4fe7fa92414b5b5a28ad0e1b53b6'),
(129, 'Антон', 'Авдеев', 'm', '138б', 'feliks.markov@gmail.com', 288, 1990, 'resident', 'dd4ad2ef4a0eb9af8a6ce6fafbff13409c9495821a74126410edf2105ab1f4e1'),
(130, 'Альбина', 'Савельева', 'f', '99г', 'vkulagin@ya.ru', 247, 1997, 'resident', '1b8e60ec0c26e3305933700b8f3c8db78e923089fc613d1e9ae84c3cd8c5c046'),
(131, 'Наталья', 'Маркова', 'f', '185б', 'klim.agafonov@rambler.ru', 200, 2006, 'resident', 'd0dc03757bcc39b4780a7e77a164450fd588a589deccb0ccd360df688130f2a7'),
(132, 'Кирилл', 'Васильев', 'm', '220в', 'safonov.zoy@narod.ru', 156, 2008, 'nonresident', '79b1f2321582ea8b0c1d0544094892230f5fa48425d9f63c1e9292b1acb67202'),
(133, 'Милан', 'Евсеев', 'm', '133в', 'marat.cernov@list.ru', 267, 2001, 'nonresident', 'c941fb70c1ef87275b6480dec499ff59de3b3c5e7c9f783f1813311a80c66c4e'),
(134, 'Трофим', 'Никифоров', 'm', '136а', 'titov.klara@narod.ru', 164, 2003, 'resident', 'f0dbaf6185cdb7ad1e2bc781dd5ccc8a2e1693fac3de98b7cfe23cec36db2c82'),
(135, 'Олеся', 'Моисеева', 'f', '228г', 'vyceslav55@hotmail.com', 137, 2008, 'nonresident', 'b45bb52c70b92c27e79ce471bbb9e956d62009a640831717cb3696b422d0f03e'),
(136, 'Инга', 'Князева', 'f', '15б', 'igor63@hotmail.com', 96, 2006, 'nonresident', '6252d8874486bfbcdc61c3d6263696f2424cc650503ae8d7ed48e9e142752f2c'),
(137, 'Злата', 'Трофимова', 'f', '277а', 'kolobov.klara@narod.ru', 128, 1996, 'nonresident', '83c1ae66968065ce1d36bb7d8bad0ed15c9c190812a1cf00a9030748abee1ab1'),
(138, 'Алла', 'Дорофеева', 'f', '37г', 'faina00@narod.ru', 200, 1998, 'resident', '652d547383c7a590b33a6ab031a86a04ce0817218942e1505fc6349169b380ff'),
(139, 'Злата', 'Николаева', 'f', '31в', 'merkusev.lybov@hotmail.com', 269, 1993, 'resident', '6662e6ab636255e7e424e5cfaa1c4980546cab4bf25408e08061a238df9162fc'),
(140, 'Степан', 'Пестов', 'm', '273а', 'valerii03@hotmail.com', 219, 1995, 'resident', '12280cdaf0f39db324bdf94c255ee1f11ba77f94e5091016a2fdfdee1c385978'),
(141, 'Филипп', 'Зыков', 'm', '238г', 'malvina.zakarov@yandex.ru', 193, 1998, 'resident', 'fe761e83ca1b9eb112a8a717819512e2fe72d693a4ac1ad8d27e8cfe91d5a547'),
(142, 'Ульяна', 'Рыбакова', 'f', '179г', 'ldrozdov@inbox.ru', 157, 1992, 'nonresident', '8e62969dcba0a6a3ca843975c080738bb7d054aaba086c06a39a065dc19d1e9b'),
(143, 'Мирослав', 'Дроздов', 'm', '150а', 'nrogov@list.ru', 164, 1999, 'nonresident', 'cee80eeaca503427b019f827464dd5144204175b7e3ccb837814fe4d00babce1'),
(144, 'Маргарита', 'Дорофеева', 'f', '90в', 'klara77@hotmail.com', 123, 1992, 'resident', '39cd0fe8f345e324c26be6a6c853f94fe6b2e872e0aaa8e2c274af3de9fb1bf9'),
(145, 'Анатолий', 'Воробьёв', 'm', '282а', 'yroslava.trofimov@yandex.ru', 252, 2008, 'resident', '94cd4b97c8bdf8a65d2c371e996a64f468e20570fa53e1015a9fb936951668ea'),
(146, 'Ульяна', 'Бурова', 'f', '289г', 'pavel.rozkov@hotmail.com', 247, 2003, 'nonresident', '04a1b1225599e2c51da40e6c2683886c7de73ef8adbc464051144404c8d4f411'),
(147, 'Дина', 'Корнилова', 'f', '201в', 'bgrigorev@hotmail.com', 239, 2003, 'resident', 'f0a59798f0a46cda43326ad31fe1148d0a1392a99a14001cee2259edd9457b13'),
(148, 'Анфиса', 'Киселёва', 'f', '284в', 'bogdan.volkov@rambler.ru', 130, 1993, 'nonresident', '5f77b43fcf5271d5e675b0cb1fb5143dbdacc0a25fb2f2c3b5a56d09404d901f'),
(149, 'Эмма', 'Андреева', 'f', '143г', 'zuravlev.kuzma@rambler.ru', 104, 2001, 'resident', '084e69a74b90927d82313a061ca2a60ef69f68e1103868f8f80d301d54628a10'),
(150, 'Олеся', 'Лапина', 'f', '252а', 'stanislav15@hotmail.com', 166, 1996, 'nonresident', '08765b3b4cf583e20e4d29629b38da38bb77fc6395ea47fe33330918ff7018eb'),
(151, 'Марта', 'Савина', 'f', '278б', 'tamara.petrov@yandex.ru', 181, 2000, 'resident', '9321eaea5b9946cf7c21af9c701f324ded5b3134a591426b7a9e3ab1e29e28fa'),
(152, 'Анфиса', 'Кондратьева', 'f', '33б', 'lidiy.drozdov@yandex.ru', 212, 2004, 'nonresident', '08f85b2b17a48b326d49891adfd36b8732db1fac524287691b543db9015cae62'),
(153, 'Регина', 'Зиновьева', 'f', '247в', 'belov.alena@hotmail.com', 189, 2008, 'resident', '4a6ddef4899490b2c671552e3694d2dfd3955b2820ff9b39504bedf8feaca7e4'),
(154, 'Людмила', 'Беляева', 'f', '289г', 'viktoriy90@inbox.ru', 273, 2001, 'resident', 'b6f1608aea1deb734202f1dd848440a81ff67b47ad400cca00555e224c2b65ed'),
(155, 'Нина', 'Николаева', 'f', '132г', 'denis.rogov@list.ru', 282, 1991, 'nonresident', '3b82c0ef79288c905d2f2ec13f81f2b84f1d49ccad2bd7e6f1e04c700bd51369'),
(156, 'Ярослава', 'Бирюкова', 'f', '227в', 'solovev.andrei@yandex.ru', 237, 1991, 'nonresident', '350478094e42f19369c42abea0727233054e93d7b48585d2525279797fdb338c'),
(157, 'Марк', 'Мухин', 'm', '295а', 'lkabanov@gmail.com', 120, 2000, 'resident', '76c30238e937dea3c11271273b3302599931d21b1a154ccf75405a019656c0b4'),
(158, 'Варвара', 'Михеева', 'f', '221в', 'fedor.belozerov@yandex.ru', 208, 2008, 'resident', '5058d7c9a4f120d47c6413c33474a7e0b4021f029f75d904e2d0576de216c22e'),
(159, 'Эдуард', 'Зыков', 'm', '88г', 'alena.ilin@ya.ru', 191, 2003, 'resident', '234314aca3fa3e61a30ae13f00e3046680fa5b0d5a39e0ae39dd3f2173619513'),
(160, 'Искра', 'Юдина', 'f', '126г', 'nestor.veselov@gmail.com', 187, 1998, 'resident', 'c055b1ce82c782ab53bcabe2f66d073cc5a6165f7744c107bd1ec56c98c4e0a8'),
(161, 'Мальвина', 'Кулакова', 'f', '58а', 'tykovlev@gmail.com', 242, 1995, 'resident', '3282b6a468223424bd26c9c22eff9729729e8d56df3800ccc27e962290bbd170'),
(162, 'Федосья', 'Евдокимова', 'f', '80в', 'gleb09@inbox.ru', 299, 2005, 'resident', '0139fe29a7db5e844df5cc4990c22b65472917694df02b16e2e6839a18a7e9b7'),
(163, 'Надежда', 'Гущина', 'f', '74а', 'vteterin@bk.ru', 217, 2008, 'nonresident', '53f075f1f4647b7f1e932a294d26139cccb189925c9a13f97535aab2746f5c4a'),
(164, 'Савва', 'Мишин', 'm', '166в', 'milan36@ya.ru', 201, 1990, 'nonresident', '389c347b323c83b229b4de90bfd2899dff5c503463a830015e36133f42ca20a1'),
(165, 'Дарья', 'Шубина', 'f', '19в', 'iuvarov@gmail.com', 130, 2003, 'resident', '1c90ae6b7784a3c8a773e1961115fdaf7cb1c98bb7494306d92aa1e5e16b9597'),
(166, 'Василиса', 'Рогова', 'f', '266г', 'alina.dmitriev@gmail.com', 154, 2000, 'resident', '21f74bd1accbb4644af36b46184ec7f030e31657be40d43e48353766d502400e'),
(167, 'Вадим', 'Сазонов', 'm', '184б', 'ylii.terentev@gmail.com', 241, 2000, 'resident', '0232cf4b31dca56c0dc142a9e83b7fb4558b86b2c6bc983a84975a22946e4e98'),
(168, 'Матвей', 'Гурьев', 'm', '157г', 'ignatii13@inbox.ru', 277, 1998, 'resident', '4401a1e05b029187563f7cccc3409c09ac651965f4055219eca7fd6b9b088365'),
(169, 'Болеслав', 'Харитонов', 'm', '145б', 'alena.rybov@mail.ru', 293, 1992, 'resident', '12ac5c773541db2b1b546244a26942344fc3ae84e4b7d363a219557c184ef2c5'),
(170, 'Антон', 'Ершов', 'm', '142в', 'wnaumov@gmail.com', 252, 2006, 'nonresident', '7a93ef42838e0eb0ef8849f2505a30ac96f86c633838ea6b2227ac14c302d42f'),
(171, 'Радислав', 'Рогов', 'm', '17в', 'seleznev.galina@list.ru', 171, 2001, 'resident', 'ae33a1bbdfa7e264afce34f677631213a04ef855b62c35607617b747b42ef024'),
(172, 'Кузьма', 'Копылов', 'm', '83в', 'hsarapov@list.ru', 198, 1990, 'resident', '831c1e318537057df2d5ff81be379bbef5ab70e717983c5f5a025950ef61aa44'),
(173, 'Георгий', 'Веселов', 'm', '211а', 'dyckov.miroslav@rambler.ru', 220, 1994, 'nonresident', '2f2c09e61207268c43db57347c4b094e3797edbd5558dc651589ad792d316235'),
(174, 'Дарья', 'Одинцова', 'f', '228б', 'aksenov.lavrentii@list.ru', 148, 1991, 'nonresident', 'f141bfdefaeeae08d2c1bf74c5bb9297e62c23505612858c88781a931d7bcccb'),
(175, 'Фаина', 'Панова', 'f', '281г', 'galina.gurev@inbox.ru', 243, 2000, 'nonresident', 'f33ab2020f42f5f48d39cf8c4215ea0a2399e876b49723a01011a701e361fb26'),
(176, 'Донат', 'Суханов', 'm', '46а', 'tsitnikov@bk.ru', 210, 2006, 'resident', 'caff9d986f569d50a14c2d3480cd8a43b2abef6ec1edd6646fac4d634b7526c6'),
(177, 'Мальвина', 'Журавлёва', 'f', '190в', 'igor.kotov@gmail.com', 271, 1991, 'nonresident', '0d7082a4157b1651026d2f7e906064059e353ff572986100fd2c5861dae8291c'),
(178, 'Ян', 'Громов', 'm', '53г', 'baranov.tit@hotmail.com', 250, 2008, 'resident', 'b1d2e3ffe4058cf715fbc07ab73c7881360365b5e50e554f99454c35e37ed79c'),
(179, 'Раиса', 'Кудряшова', 'f', '26в', 'liliy81@bk.ru', 204, 1996, 'nonresident', 'f09d1fb76ac762132981b334b77a1353b437f939db068fdfb836778b51a37da2'),
(180, 'Абрам', 'Ефимов', 'm', '157б', 'anna26@hotmail.com', 230, 1995, 'resident', 'cffe74ac70120da25273383a6efac85350526bb7bc048aca299bfe5235b739fa'),
(181, 'Афанасий', 'Беспалов', 'm', '58а', 'igor.panfilov@gmail.com', 99, 2005, 'resident', '0bdf21e4b7df59e8094cd846611bbef5b8f22c7909f06530e9bee75ad7570093'),
(182, 'Адам', 'Белозёров', 'm', '272в', 'yrii32@bk.ru', 179, 1998, 'nonresident', '5ea7627a2e4d033ea4643dc51be5e3d987b8629e7348d11faf42fa571e61ca26'),
(183, 'Дина', 'Маслова', 'f', '62а', 'gavriil.blokin@inbox.ru', 98, 1999, 'nonresident', '40a154430c69ce50f3d0167b7b3bd2b344261f447fffee4e9fefa47ddd81a863'),
(184, 'Филипп', 'Субботин', 'm', '255г', 'boleslav.gorbunov@gmail.com', 215, 2003, 'nonresident', '35771fb574f4dcb627ac35e31305b48264473cbc531d25b4caa68f2dcea94fff'),
(185, 'Кузьма', 'Быков', 'm', '166а', 'bnesterov@gmail.com', 97, 2005, 'nonresident', '0f1bac17734e319ff28adc321a9ab4144700a74595580b016e0a88ab6fc27ff0'),
(186, 'Клим', 'Шашков', 'm', '281б', 'irina46@yandex.ru', 262, 2003, 'nonresident', '7e75eb35439d5f7bb3f8a01bf37c05361b1f89f556f246e8d7ddda17bd42faa2'),
(187, 'Стефан', 'Быков', 'm', '71а', 'irina97@rambler.ru', 208, 2002, 'nonresident', '35eda33cfced4512a8e9e068f474fe528129480aa3a7b7a2bac4e9f2b00dfb0b'),
(188, 'Ананий', 'Кошелев', 'm', '289а', 'akim.petrov@hotmail.com', 163, 1990, 'resident', 'c5b8dd672e20dcf04efd2561f6cbaa36caf19f893d67e75d0b94880bf2a88cff'),
(189, 'Рафаил', 'Беспалов', 'm', '21а', 'wisakov@gmail.com', 171, 2002, 'resident', 'c82461075929158726b394231f304a45776b341972c879abab8bc52d3e674f9d'),
(190, 'Яков', 'Князев', 'm', '29в', 'omartynov@narod.ru', 158, 1999, 'nonresident', '5fd9ba2819f68c1766e3f66cf7cee2ccff9aa2bc138e5071a8b64b91e30aa1ca'),
(191, 'Милан', 'Субботин', 'm', '184б', 'vorontov.savva@ya.ru', 136, 2008, 'nonresident', 'e72c3ca02c31bf2088be179386ffc8966b1fc66b80a109c71bcd6d93ef8342e8'),
(192, 'Евгения', 'Лапина', 'f', '191а', 'dementev.kapitolina@yandex.ru', 126, 1993, 'resident', 'afb42e2abe83b01f035a2ceac535ae95a5f2e62652e1927e8442bec8c948d2d6'),
(193, 'Илларион', 'Чернов', 'm', '227б', 'kvorobev@gmail.com', 291, 1994, 'resident', 'd532a6bcbcda88b844815bda8f3d902d7db8359cefc4544c16232642cacca647'),
(194, 'Ярослава', 'Белоусова', 'f', '185в', 'ipolykov@gmail.com', 112, 1991, 'nonresident', '8383738dfbd99067d1e0483c834bc8de2ab569d9f96f93bca7323565ff473531'),
(195, 'Олеся', 'Соловьёва', 'f', '47г', 'nika.krylov@narod.ru', 91, 2008, 'nonresident', '6746bf8f5b5b60a68954f48d9fbfd19464b57bad3301fb6892d567f7696a4ee5'),
(196, 'Рафаил', 'Ситников', 'm', '146в', 'lapin.alla@hotmail.com', 229, 2003, 'nonresident', '3fd10100650b6e454b90a2c9bdee0b02fdecafafc672b910b11de0d81f31dc41'),
(197, 'Макар', 'Жданов', 'm', '131в', 'tamara96@bk.ru', 225, 2003, 'resident', 'cdf2e3e920065106130d2c604e6be7c8414845399d03868021e9b79cd7ed4262'),
(198, 'Добрыня', 'Романов', 'm', '60а', 'iserbakov@gmail.com', 210, 1999, 'nonresident', 'b073d2f2a561970e2dfd2c52dd93d6ee12e8210745a21d6f935f593073834a2e'),
(199, 'Изабелла', 'Давыдова', 'f', '135г', 'faina06@narod.ru', 281, 2008, 'resident', '0bb2cf7fea8f6241ad32a25e7593251332df64d40952eb6aa93ad34804ad6243'),
(200, 'Артём', 'Куликов', 'm', '89в', 'bobrov.stefan@bk.ru', 282, 1991, 'nonresident', '5c857bb1f0bdab9148bf2082e1e31cfee0feb18696878c8d089ac327ad8c61cf'),
(201, 'Анастасия', 'Белоусова', 'f', '258а', 'dary15@hotmail.com', 188, 1998, 'nonresident', 'fea5ff9370e9e20682006831cffb3834c8937a305698ba260381ddfecfced9ee'),
(202, 'Мальвина', 'Белоусова', 'f', '290в', 'kapitolina.kolobov@yandex.ru', 126, 1995, 'nonresident', 'a18e02d46150561b057ccdea7203fad47a06acc65d310f3da16761e7ea65482b'),
(203, 'Василиса', 'Новикова', 'f', '195в', 'izolda.kostin@bk.ru', 180, 1998, 'nonresident', 'd7994dcff6812b85c930b25ef4aef65b4664f89ab3f1c05889ae6a8c97b6aefd'),
(204, 'Зоя', 'Корнилова', 'f', '148г', 'kristina48@list.ru', 210, 1999, 'nonresident', '69e74f21cac4fe4c55f097fdd8f0152e7336cbf16e4d16b8694b677ebf8914ea'),
(205, 'Диана', 'Костина', 'f', '258а', 'afanasii56@mail.ru', 92, 1999, 'resident', '86f501578202d508e07a68b8bd5fae855378bdc29156fbdf54c331298c2e17fd'),
(206, 'Елена', 'Евсеева', 'f', '234б', 'fbelozerov@bk.ru', 131, 2001, 'resident', '9aa368f32f59c4239391fb49ba3535f85d74533fcf5f34bebee7fc95b474c902'),
(207, 'Диана', 'Владимирова', 'f', '96а', 'zsaskov@yandex.ru', 215, 2002, 'resident', '0af354e934fb0c36ae1c63f8e6d616dbe9b374996e3270883a97a79e68df1433'),
(208, 'Зинаида', 'Пахомова', 'f', '211в', 'ulyna23@hotmail.com', 137, 1990, 'nonresident', '804809456c6eb8e39a96b36e41f5473551cf2a322e53fb6abd7af5b2bd82731e'),
(209, 'Полина', 'Бурова', 'f', '111б', 'krykov.taisiy@ya.ru', 139, 1995, 'resident', '075279551fa8391d0bf2136c5e990f7e7d169f1f8614719ddf8fc2e1ee734b85'),
(210, 'Ваня', 'Обломов', 'm', '11б', 'oblomov@gmail.com', 250, 1996, 'nonresident', '0c08685e739c1c6588a6b44fa9a5720c279b7e13fe444468c166b8429e50f3a7'),
(211, 'Антон', 'Вольский', 'm', '11б', 'volskiy@gmail.com', 228, 1999, 'resident', '8088eee5f20b9dd165d446530a8cfa8ad598648877b8c596419a5380e7ac7ba7'),
(212, 'Геннадий', 'Войченко', 'm', '11с', 'voychenko@mail.ru', 220, 1992, 'nonresident', 'e442c91a7ac1426af5d2db90e761bf9f010f501546f72485346f744645e127bf'),
(213, 'Иван', 'Обломов', 'm', '11б', 'i-oblomov@gmail.com', 265, 1996, 'resident', '62addfb5889dd69532572afb35f06f311fe45a9e907c016c1171da18c2e912fc'),
(214, 'Пантелеймон', 'Ланской', 'm', '11а', 'panteley-lanskoy@gmail.com', 255, 1997, 'resident', '5e7b1244bdf64b9d365b9ad821f4b0835f18a9449502bd7ae522f67e582c1f88'),
(215, 'Олеся', 'Иванова', 'f', '200б', 'olesya-ivanova@mail.ru', 199, 1996, 'resident', '78b3cf4d36d75bf0f2ade3fbd46a0a0a5e1fdda352a8f2c41e8b6b6ed969dc02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
