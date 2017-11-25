

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registartion`
--
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login`, `pwd`) VALUES
('admin', 'bb0f7e021d52a4e31613d463fc0525d8');
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL DEFAULT 'pending'
)  ENGINE=InnoDB DEFAULT CHARSET=latin1; 

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `login`, `pwd`, `state`) VALUES
(1, 'Ben Belgacem', 'Mohamed', 'benbelgacem.mohamed@', 'medamine95', 'c2c8d5e47a3528dc0636', 'aprooved'),
(2, 'Ben Belgacem', 'Mohamed', 'FGFG@hotmail.com', 'mop', '202cb962ac59075b964b', 'Pending'),
(3, 'Marwen', 'Himdi', 'benbelgacem.mohamed@', 'mkbhd', '202cb962ac59075b964b', 'Pending'),
(4, 'Mnathem', '.txt', 'benbelgacem.mohamed@', 'op', '202cb962ac59075b964b', 'pending');

--
-- Indexes for dumped tables
--
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
