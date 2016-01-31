-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 
Generation Time: Apr 29, 2015 at 04:06 PM
-- Server version: 5.6.21
-- 
PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8 */;



--
-- Database: `apartments`
--

-- --------------------------------------------------------

--
-- 
Table structure for table `apartment`

--

CREATE TABLE IF NOT EXISTS `apartment`
 (
  `sub_address` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `number_of_rooms` int(11) NOT NULL
)
 ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Dumping data for table `apartment`
--


INSERT INTO `apartment` (`sub_address`, `address`, `price`, `number_of_rooms`) VALUES

('#1', '102 Clinton Street, Campbell, CA 95008', 1800, 4),
('#2', '102 Clinton Street, Campbell, CA 95008', 2200, 5),

('#221', '864 Wood Street, Kernersville, NC 27284', 2500, 4),

('#222', '864 Wood Street, Kernersville, NC 27284', 2500, 4),

('#3', '102 Clinton Street, Campbell, CA 95008', 1600, 4),

('01', '210 Church Street South, Saint Louis, MO 63109', 1400, 4),

('03', '210 Church Street South, Saint Louis, MO 63109', 1300, 3),

('11', '879 Elmwood Avenue, Sevierville, TN 37876', 1700, 3),

('12', '879 Elmwood Avenue, Sevierville, TN 37876', 2100, 5),

('14', '879 Elmwood Avenue, Sevierville, TN 37876', 2000, 4),

('Unit 1', '1000 Aspen Court, Mount Laurel, NJ 08054', 2400, 5);



-- --------------------------------------------------------

--
-- Table structure for table `building`
--


CREATE TABLE IF NOT EXISTS `building` 
(
  `address` varchar(200) NOT NULL,
  `community_features` varchar(45) DEFAULT NULL,
  `price_of_utilities` int(11) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Dumping data for table `building`
--


INSERT INTO `building` (`address`, `community_features`, `price_of_utilities`) VALUES

('1000 Aspen Court, Mount Laurel, NJ 08054', 'Balcony, Yard', 200),

('102 Clinton Street, Campbell, CA 95008', 'Parking, In Unit Laundry', 200),

('210 Church Street South, Saint Louis, MO 63109', 'In Community Laundry', 160),

('377 Glenwood Avenue, Kernersville, NC 27284', 'Parking', 170),

('489 Ivy Court, Champlin, MN 55316', 'Parking', 120),

('600 Rose Lane, Semil, KN, 32100', 'NULL', 200),

('789 Cambridge Road, Ames, IA 50010', 'In Unit Laundry', 200),

('790 Walnut Street, Fort Washington, MD 20744', 'Balcony', 132),

('864 Wood Street, Kernersville, NC 27284', 'Pool, Fitness Center', 230),

('879 Elmwood Avenue, Sevierville, TN 37876', 'Balcony, In Community Laundry', 190),

('996 Aspen Court, The Villages, FL 32162', 'Beachside', 144);



-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--


CREATE TABLE IF NOT EXISTS `rooms` 
(
  `type` varchar(45) NOT NULL,
  `features` varchar(45) DEFAULT NULL,
  `tenant_name` varchar(50) 
DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `sub_address` varchar(10) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Dumping data for table `rooms`
--


INSERT INTO `rooms` (`type`, `features`, `tenant_name`, `address`, `sub_address`) VALUES

('Bedroom', 'Bed', 'Heinrich Kohler', '102 Clinton Street, Campbell, CA 95008', '#3'),

('Living Room', NULL, NULL, '102 Clinton Street, Campbell, CA 95008', '#3'),

('Kitchen', 'Gas Stove, Oven, Wood Countertops', NULL, '102 Clinton Street, Campbell, CA 95008', '#3'),

('Bathroom', 'Bathtub', NULL, '102 Clinton Street, Campbell, CA 95008', '#3'),

('Bedroom', 'Bed, Computer', 'Sarah Spears', '879 Elmwood Avenue, Sevierville, TN 37876', '12'),

('Bedroom', 'Bed, Computer, Walk-in Closet', 'Elizabeth Yerca', '879 Elmwood Avenue, Sevierville, TN 37876', '12'),

('Living Room', 'Television ', NULL, '879 Elmwood Avenue, Sevierville, TN 37876', '12'),

('Bathroom', 'Bathtub, Shower', NULL, '879 Elmwood Avenue, Sevierville, TN 37876', '12'),

('Bedroom', 'Bed', 'Alexander De Sauveterre', '102 Clinton Street, Campbell, CA 95008', '#1'),

('Kitchen', 'Granite Countertops, Oven, Electric Stove', '', '879 Elmwood Avenue, Sevierville, TN 37876', '12');



-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--


CREATE TABLE IF NOT EXISTS `tenant` 
(
  `name` varchar(50) NOT NULL,
  `landlord` varchar(5) NOT NULL,
  `budget_contribution` int(11) DEFAULT NULL,

  `address` varchar(200) NOT NULL,
  `sub_address` varchar(10) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Dumping data for table `tenant`
--


INSERT INTO `tenant` (`name`, `landlord`, `budget_contribution`, `address`, `sub_address`) VALUES

('Agatha Curtis', 'FALSE', 1500, '102 Clinton Street, Campbell, CA 95008', '#1'),

('Alexander De Sauveterre', 'FALSE', 300, '102 Clinton Street, Campbell, CA 95008', '#1'),

('Anna Ware', 'FALSE', 2500, '864 Wood Street, Kernersville, NC 27284', '#221'),

('Elizabeth Yerca ', 'FALSE', 1050, '879 Elmwood Avenue, Sevierville, TN 37876', '12'),

('Heinrich Kohler', 'TRUE', 0, '102 Clinton Street, Campbell, CA 95008', '#3'),

('Kealey Clinton ', 'FALSE', 1300, '864 Wood Street, Kernersville, NC 27284', '#222'),

('Nelson West', 'FALSE', 1200, '864 Wood Street, Kernersville, NC 27284', '#222'),

('Sarah Spears ', 'FALSE', 1050, '879 Elmwood Avenue, Sevierville, TN 37876', '12'),

('Slade Westley ', 'FALSE', 2400, '1000 Aspen Court, Mount Laurel, NJ 08054', 'Unit 1'),

('Sophia St. Pierre ', 'FALSE', 0, '102 Clinton Street, Campbell, CA 95008', '#1');



--
-- Indexes for dumped tables
--

--
-- 
Indexes for table `apartment`
--

ALTER TABLE `apartment`
 ADD PRIMARY KEY (`sub_address`), 
ADD UNIQUE KEY `Sub_Address_UNIQUE` (`sub_address`), 
ADD KEY `Address_idx` (`address`);



--
-- Indexes for table `building`
--

ALTER TABLE `building`
 ADD PRIMARY KEY (`address`), 
ADD UNIQUE KEY `Address_UNIQUE` (`address`);



--
-- Indexes for table `rooms`
--

ALTER TABLE `rooms`
 ADD KEY `fk_Rooms_Tenant1_idx` (`tenant_name`), 
ADD KEY `Room_Address_idx` (`address`,`sub_address`);



--
-- Indexes for table `tenant`
--

ALTER TABLE `tenant`
 ADD PRIMARY KEY (`name`), 
ADD KEY `Sub_Address_idx` (`address`,`sub_address`);



--
-- Constraints for dumped tables
--

--
-- 
Constraints for table `apartment`
--

ALTER TABLE `apartment`
ADD CONSTRAINT 
`Apartment_Address` FOREIGN KEY (`address`) REFERENCES `building` (`Address`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;



--
-- Constraints for table `rooms`
--

ALTER TABLE `rooms`
ADD CONSTRAINT 
`Room_Address` FOREIGN KEY (`address`, `sub_address`) REFERENCES `apartment` (`Address`, `Sub_Address`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;



--
-- Constraints for table `tenant`
--

ALTER TABLE `tenant`
ADD CONSTRAINT
`Tenant_Address` FOREIGN KEY (`address`, `sub_address`) REFERENCES `apartment` (`Address`, `Sub_Address`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
