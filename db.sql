-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 02:34 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(15) NOT NULL AUTO_INCREMENT,
  `post_from_id` int(15) NOT NULL,
  `post_to_id` int(15) NOT NULL,
  `post` longtext NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `datetimer` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_from_id`, `post_to_id`, `post`, `picture`, `datetimer`) VALUES
(12, 1, 1, 'hfksfhs fose fsef sof seufh sodefj soef jsoef jsoejf se ofj seofj soef seof hsoefhsoe fhosefh soefh soefh soefh soefh osehf osehf soehfsoehfsoehf ose fsoehfsoefh osefh seohfsoefh soefh seofh sefhoseofhseofhsoef shefosehfos ehfsoe fhsoefhseohfseof seohfsoefh seofhs efhsefohseofh esfoehfo sehfsoe fshoefo sefsoehfseohfsoe fos efohseofhseofhseofhseo fsoe fshoefose fhsoef ', NULL, '2017-01-05 19:32:59'),
(13, 1, 1, ' feus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps', NULL, '2017-01-05 19:33:20'),
(14, 1, 1, 'd\r\n', NULL, '2017-01-05 19:33:30'),
(15, 1, 1, 'dahkdjawifha qor fnwe fhsd fhowef aeiufh oes fosef hsoef hsoeufh soef soef soefh soehf ose fhsoef osehf osefh soe fhsoe fsoehfsoefh soef hsoefh soefh soefh soef hsoefh soehf soefh soehf seofh seof hseofhseofshefoshefos efhsoe fsoehfsoefh so ef shoe fhsoefhsoefh soefh soef hsoe fose fsoehf\r\n\r\n\r\nseof osef hsoefjsefo sejofose fjseof jsoef sjeof sjf soefjseofj seof sejfosejfsoe fjsoe fseof jsoefj seof jsoe f', NULL, '2017-01-05 19:40:56'),
(16, 2, 2, 'how r u?\r\n', NULL, '2017-01-05 20:56:38'),
(17, 1, 2, 'Hello Henry', NULL, '2017-01-07 22:59:29'),
(18, 1, 3, 'Hello', NULL, '2017-01-07 23:23:56'),
(19, 1, 1, 'Hello There', NULL, '2017-01-07 23:29:28'),
(43, 1, 1, '', 'uploads/post_pics/jxs215yhrg4evt7WallPaperHD 004.jpg', '2017-01-09 17:45:19'),
(44, 1, 1, '', 'uploads/post_pics/jb9zui1fhq5skypWallPaperHD 008.jpg', '2017-01-09 18:03:33'),
(77, 1, 1, 'feus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\n\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\n\r\n\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\n\r\n\r\n\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\n\r\n\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\n\r\n\r\n\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg psfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps\r\n\r\n\r\nfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg psfeus efos efose fosd fseof soef soef soe fsoe fsijoe fose fose fose fosef soe fsoef ose fose fose fosie fose fisefiseof ow idoqw idoqaw doqwa daow doaw doaw dawo daowd aow daow doawd aowd aow doqd owaf soe sof eof awof awd awoi daw doaw dawo dawo doaw daow daowd oawd aowf g orgrpgspegsprg sepg ps', NULL, '2017-01-11 19:25:48'),
(72, 1, 1, 'hello', NULL, '2017-01-11 19:03:29'),
(56, 1, 1, '', 'uploads/post_pics/kcmp57n8rvjbx3oWallPaperHD 008.jpg', '2017-01-09 20:40:36'),
(59, 1, 1, 'Hey..', NULL, '2017-01-09 23:23:44'),
(48, 1, 1, 'Let us see the tutorial how to create infinite scroll for webpage in PHP in below code snippet.\r\nFirst of all create infinite-scroll folder in your root folder of www or htdocs. Create two file which is index,php and get_moredata.php. Here we sending the request for more data using ajax with jquery. As usual for working of javascript here we are including jquery.js library file.', 'uploads/post_pics/imh0jz6qpbcvew1WallPaperHD 011.jpg', '2017-01-09 18:04:47'),
(49, 2, 2, '', 'uploads/post_pics/rl7tqxmnbsp65dgWallPaperHD 007.jpg', '2017-01-09 18:07:59'),
(50, 2, 2, '', 'uploads/post_pics/5aq38edb0sjf7trWallPaperHD 001.jpg', '2017-01-09 18:08:05'),
(52, 2, 2, '', 'uploads/post_pics/nvr8uzw2a7c4egbWallPaperHD 018.jpg', '2017-01-09 18:08:16'),
(54, 2, 2, '', 'uploads/post_pics/bgnvzi5u61pomh3WallPaperHD 031.jpg', '2017-01-09 18:08:27'),
(81, 1, 1, 's', NULL, '2017-01-11 19:30:08'),
(82, 1, 1, 'he;dvftgybnhujm,kop.lk,mjinhuybgf\r\n', NULL, '2017-01-11 19:46:11'),
(112, 1, 1, '', 'uploads/post_pics/a4vgjkn0zt2fw6mchem.pdf', '2017-01-22 14:48:26'),
(108, 1, 1, '', NULL, '2017-01-15 21:20:41'),
(109, 1, 1, '', NULL, '2017-01-15 21:20:43'),
(110, 1, 1, '', 'uploads/post_pics/vexm5i6you12dpz6-wallpaper121qu.jpg', '2017-01-22 14:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
CREATE TABLE IF NOT EXISTS `relationship` (
  `user_one_id` int(15) NOT NULL,
  `user_two_id` int(15) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `action_user_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`user_one_id`, `user_two_id`, `status`, `action_user_id`) VALUES
(1, 3, 1, 3),
(2, 3, 1, 3),
(1, 18, 1, 18),
(11, 18, 0, 18),
(1, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(15) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dater` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `about` varchar(255) NOT NULL DEFAULT 'Hey I am using this new social networking site dosti time.',
  `work` varchar(255) NOT NULL DEFAULT 'Information Not Availaible',
  `study` varchar(255) NOT NULL DEFAULT 'Information Not Availaible',
  `lives` varchar(255) NOT NULL DEFAULT 'Information Not Availaible',
  `placefrom` varchar(255) NOT NULL DEFAULT 'Information Not Availaible',
  `profile_pic` varchar(255) NOT NULL DEFAULT 'img/profile_default.jpg',
  `cover_pic` varchar(255) NOT NULL DEFAULT 'img/cover_default1.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `password`, `dater`, `about`, `work`, `study`, `lives`, `placefrom`, `profile_pic`, `cover_pic`) VALUES
(1, 'Aayush', 'Sinha', 'aayush', 'aayushsinha44@gmail.com', 947017776, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-02 00:00:00', 'Building this awesome, brand new and fantastic website friendzone.', 'Information Not Availaible', 'Birla Institute of Technology, Mesra', 'Ranchi, Jharkand', 'Sambalpur, Odisha', 'uploads/profile_pics/piklexj9dmbgs166-wallpaper121qu.jpg', 'uploads/cover_pics/p3l7b0a9ijcnstkhacker-wallpapers-5352.jpg'),
(2, 'Henry', 'Watson', 'henry', 'henry@gmail.com', 947017776, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-02 00:00:00', 'Hey I am using this new social networking site friend zone.', 'Warbook Pvt. Limited', 'London Business School', 'Standford', 'Standford', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(3, 'Michael', 'Maxwell', 'michael', 'michael@gmail.com', 947017776, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-03 00:00:00', 'Hey I am using this new social networking site friend zone.', 'Information Not Availaible', 'R.R. Institute of Technology', 'L.A.', 'L.A.', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(10, 'Yashwant', 'Rajput', 'yashwant', 'yashwant@yahoo.in', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:41:00', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(9, 'Glenn', 'Mcgrath', 'glenn', 'glenn@yahoo.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-08 19:12:41', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(11, 'Joe', 'West', 'joe', 'joe@gmail.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:41:24', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(12, 'Iris', 'West', 'iris', 'iris@yahoo.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:41:56', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(13, 'Ram', 'Prasad', 'ram', 'ram@gmail.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:42:23', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(14, 'Barry', 'Allen', 'barry', 'barry@yahoo.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:42:50', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(15, 'Oliver', 'Queen', 'oliver', 'oliver@yahoo.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:43:12', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(16, 'Sarah', 'Lance', 'sarah', 'sarah@gmail.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-11 18:43:34', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(17, 'Laurel', 'Lance', 'laurel', 'laurel@gmail.com', 9470177764, 'c81e728d9d4c2f636f067f89cc14862c', '2017-01-11 18:44:01', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(18, 'Andrew', 'West', 'andrew', 'andrew@fake.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-12 15:42:35', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(19, 'Anna', 'Tim', 'anna', 'anna@gmail.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-12 15:43:10', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg'),
(20, 'Areya', 'Toshi', 'areya', 'areya@fake.com', 9470177764, 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-12 15:43:36', 'Hey I am using this new social networking site dosti time.', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'Information Not Availaible', 'img/profile_default.jpg', 'img/cover_default1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
