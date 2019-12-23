-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 08:12 AM
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
(15, 'deepak'),
(19, 'anything'),
(21, 'navi'),
(22, 'admin king');

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
(6, '1576001068', 'Deepak Verma', 'ShreeGanesh', 11, 'deepak.dv818@gmail.com', 'CodingBridz.com', 'user.svg', 'Hello Deepak How are you', 'approved');

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
(1, '12/11/19', 'Post Setting', 'Deepak Verma', 'avatar-1.jpg', 'blog-post-1.jpeg', 'Nature', '#Money online anythng', 'lorem ipsum fuck', 3, 'publish'),
(3, '12/11/19', 'Post Setting 1', 'Deepak Verma', 'avatar-1.jpg', 'blog-post-2.jpg', 'Nature', '#Money', 'lorem ipsum fuck u', 45, 'publish'),
(4, '12/11/19', 'Post Setting 2', 'Deepak Verma', 'avatar-2.jpg', 'blog-post-3.jpeg', 'Nature', '#Money', 'lorem ipsum fuck u', 45, 'publish'),
(5, '12/11/19', 'Post Setting 3', 'Deepak Verma', 'avatar-3.jpg', 'blog-post-4.jpeg', 'Nature', '#Money', 'lorem ipsum fuck u', 45, 'publish'),
(8, '7/12/19', 'Nothing', 'Mr.Verma', 'avatar-1.jpg', 'avatar-1.jpg', 'Coding', '#Coding', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus quas cum eum, voluptates eos exercitationem in quidem esse? Consequatur sapiente repudiandae iure, commodi unde omnis repellendus quasi reprehenderit harum ut', 55, 'publish'),
(9, '7/12/19', 'Pagination', 'Navi Singh', 'avatar-2.jpg', 'avatar-2.jpg', 'coding', '#money', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus quas cum eum, voluptates eos exercitationem in quidem esse? Consequatur sapiente repudiandae iure, commodi unde omnis repellendus quasi reprehenderit harum ut', 55, 'publish'),
(10, '12/11/19', 'Post Setting 3', 'Deepak Verma', 'avatar-3.jpg', 'blog-post-4.jpeg', 'Nature', '#Money', 'lorem ipsum fuck u', 46, 'publish'),
(11, '12/11/19', 'Post Setting 3', 'Deepak Verma', 'avatar-2.jpg', 'blog-post-4.jpeg', 'Nature', '#Money', 'lorem ipsum fuck u', 54, 'publish');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
