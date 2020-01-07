-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 05:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(23, 'admin'),
(24, 'author'),
(25, 'nature'),
(26, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(4, '12/10/2019', 'CodingBridz', 'CodingBridz', 11, 'codingbridz@gmail.com', 'mediaocean.com', 'user.svg', 'Contact Us For Web Developement\r\nDeepak : +918198001907\r\nNavi :+917009613185', 'approved'),
(5, '12/10/2019', 'Deepak', 'ShreeGanesh', 11, 'deepak.dv818@gmail.com', 'CodingBridz.com', 'user.svg', 'Comments Down!!', 'approved'),
(6, '1576001068', 'Deepak Verma', 'ShreeGanesh', 11, 'deepak.dv818@gmail.com', 'CodingBridz.com', 'user.svg', 'Hello Deepak How are you', 'approved'),
(13, '1577093086', ' ', 'admin', 11, '', '', '', ',zdfn,ksdnf', 'approved'),
(14, '1577093109', ' ', 'admin', 11, '', '', '', ',zdfn,ksdnf', 'approved'),
(15, '1577093311', ' ', 'admin', 11, '', '', '', 'aksjbdkjasbfkjfkj', 'approved'),
(16, '1577093689', ' ', 'admin', 11, '', '', '', 'aksjbdkjasbfkjfkj', 'approved'),
(17, '1577094059', ' ', 'admin', 11, '', '', '', 'helllo', 'approved'),
(18, '1577094181', ' ', 'admin', 11, '', '', '', 'helllo', 'approved'),
(19, '', ' ', 'admin', 11, '', '', '', 'Deepak', 'approved'),
(20, '1577106725', ' ', 'admin', 11, '', '', '', 'Deepak', 'approved'),
(21, '1577106829', ' ', 'admin', 11, '', '', '', 'Deepak', 'approved'),
(22, '1577175932', ' ', 'admin', 11, '', '', '', 'hello deepak how r u', 'approved'),
(23, '1578032842', 'Deepak Verma', 'ShreeGanesh', 26, 'deepak.dv818@gmail.com', 'CodingBridz.com', 'user.svg', ' Hello World', 'approved'),
(24, '1578032852', 'Deepak Verma', 'ShreeGanesh', 26, 'deepak.dv818@gmail.com', 'CodingBridz.com', 'user.svg', ' Hello World', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`) VALUES
(19, 'admin-login.jpg'),
(20, 'avatar-1.jpg'),
(21, 'avatar-2.jpg'),
(22, 'avatar-3.jpg'),
(23, 'bg-01.jpg'),
(24, 'blog-1.jpg'),
(25, 'blog-2.jpg'),
(26, 'blog-3.jpg'),
(27, 'blog-post-1.jpeg'),
(28, 'blog-post-2.jpg'),
(29, 'blog-post-3.jpeg'),
(30, 'blog-post-4.jpeg'),
(31, 'divider-bg.jpg'),
(32, 'favicon.ico'),
(33, 'featured-pic-1.jpeg'),
(34, 'featured-pic-2.jpeg'),
(35, 'featured-pic-3.jpeg'),
(36, 'gallery-1.jpg'),
(37, 'gallery-2.jpeg'),
(38, 'gallery-2.jpg'),
(39, 'admin-login.jpg'),
(40, 'avatar-1.jpg'),
(41, 'avatar-2.jpg'),
(42, 'avatar-3.jpg'),
(43, 'bg-01.jpg'),
(44, 'blog-1.jpg'),
(45, 'blog-2.jpg'),
(46, 'blog-3.jpg'),
(47, 'blog-post-1.jpeg'),
(48, 'blog-post-2.jpg'),
(49, 'blog-post-3.jpeg'),
(50, 'blog-post-4.jpeg'),
(51, 'ShoppingCart.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `author_image`, `image`, `categories`, `tags`, `post_data`, `views`, `status`) VALUES
(23, '1578032659', 'Deepak Verma', 'admin', 'admin-login.jpg', 'blog-2.jpg', 'author', '#author', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.', 1, 'publish'),
(26, '1578032815', 'Home of Nature', 'admin', 'admin-login.jpg', 'Hydrangeas.jpg', 'nature', '#nature', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.', 4, 'publish'),
(27, '1578032926', 'Welcome Home', 'admin', 'admin-login.jpg', 'Lighthouse.jpg', 'home', '#home', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.', 0, 'publish'),
(28, '1578033005', 'Coding Bridz', 'admin', 'admin-login.jpg', 'template-mac.png', 'admin', '#admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.', 0, 'publish'),
(29, '1578033083', 'Narinder Singh', 'admin', 'admin-login.jpg', 'blog-3.jpg', 'author', '#author', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere ullam obcaecati quia quis harum, unde, neque, voluptatum eveniet tenetur, laborum reiciendis adipisci nobis nesciunt quas dolorem magni est quos reprehenderit.', 0, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$hellodeepakvermanaviii',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `image`, `password`, `roll`, `details`, `salt`, `email`) VALUES
(21, 1576400611, 'admin', 'admin', 'admin', 'admin-login.jpg', '$2y$10$hellodeepakvermanaviie1BkBJz0t5.zXKR27HiWSQl5am6utUme', 'admin', '0', '$2y$10$hellodeepakvermanaviii', 'admin@gmail.com'),
(30, 1577085026, 'Deepak', 'Verma', 'deepak', 'bg-01.jpg', '$2y$10$hellodeepakvermanaviiefZTeRuDJ48DjQep.R2M4tRVCdZ1J0rO', 'author', '', '$2y$10$hellodeepakvermanaviii', 'deepak.dv818@gmail.com'),
(31, 1577085045, 'Narinder', 'Singh', 'navi', 'admin-login.jpg', '$2y$10$hellodeepakvermanaviiefZTeRuDJ48DjQep.R2M4tRVCdZ1J0rO', 'author', '', '$2y$10$hellodeepakvermanaviii', 'snavi4551@gamil.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
