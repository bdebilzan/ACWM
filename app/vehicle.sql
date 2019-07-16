DROP TABLE IF EXISTS vehicle;

CREATE TABLE `vehicle` (
  `GUID` int(11) NOT NULL,
  `VNO` varchar(255) NOT NULL,
  `ASSIGNEDTO` varchar(255) NOT NULL,
  `LICENSE` varchar(255) NOT NULL,
  `MAKE` varchar(255) NOT NULL,
  `MODEL` varchar(255) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `HOUSED` varchar(255) NOT NULL,
  `VIN` varchar(255) NOT NULL,
  `UNIT` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `BUREAU` varchar(255) NOT NULL,
  `FUNDINGORG` varchar(255) NOT NULL,
  `EMPLOYEE_IMAGE` varchar(255) NOT NULL,
  `VEHICLE_IMAGE` varchar(255) NOT NULL,
  `LOCATION_IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`GUID`, `VNO`, `ASSIGNEDTO`, `LICENSE`, `MAKE`, `MODEL`, `YEAR`, `HOUSED`, `VIN`, `UNIT`, `DESCRIPTION`, `BUREAU`, `FUNDINGORG`, `EMPLOYEE_IMAGE`, `VEHICLE_IMAGE`, `LOCATION_IMAGE`) VALUES
(58, '56780', 'Unassigned', '456BVF4', 'Chevy', 'Colorado', 2016, 'Arcadia', ' BHJM87654FBN', '18743', 'Black', 'USER', '18452', 'employeeImages/7.jpg', 'assetImages/636572239380824718-AP18077840160536.jpg ', 'locationImages/warehousebuildings.jpg'),
(59, '56789', 'Unassigned', 'FGH4567N', 'Ford ', 'F150', 2018, 'Arcadia', 'VGHJ9876DFVBN', '18743', 'Red', 'ADMIN', '18452', 'employeeImages/1.jpg', 'assetImages/385.png', 'locationImages/warehousebuildings.jpg'),
(60, '20988', 'Unassigned', '456BHJK9', 'Chevy', 'Colorado', 2017, 'Arcadia', 'DFYJ876543DFGH', '18741', 'Black', 'USER', '18452', 'employeeImages/16.jpg', 'assetImages/636572239380824718-AP18077840160536.jpg', 'locationImages/Warehouse-building-300x200.jpg'),
(61, '765432', 'Unassigned', '5678NBG', 'Honda', 'Accord', 2018, 'Arcadia', 'GHJ765678NBG', '18743', 'Blue', 'ADMIN', '18452', 'employeeImages/_WVkn2guvm.jpg', 'assetImages/385.png', 'locationImages/Warehouse-building-300x200.jpg'),
(62, '23456', 'Unassigned', '34BH9HK', 'Ford ', 'F150', 2018, 'Arcadia', 'FJML098765DFGHJ', '18743', 'Red', 'ADMIN', '18452', 'employeeImages/22610.jpg', 'assetImages/385.png', 'locationImages/Warehouse-building-300x200.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`GUID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;