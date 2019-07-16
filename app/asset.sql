DROP TABLE IF EXISTS asset;

CREATE TABLE `asset` (
  `GUID` int(11) NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `ASSIGNEE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `MAKE` varchar(255) NOT NULL,
  `MODEL` varchar(255) NOT NULL,
  `SERIALNO` varchar(255) NOT NULL,
  `COUNTYNO` int(11) NOT NULL,
  `ACDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COST` varchar(255) NOT NULL,
  `COMMENTS` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `BINVENT` int(11) NOT NULL,
  `SUBLOCATION` varchar(255) NOT NULL,
  `BUREAU` varchar(255) NOT NULL,
  `ASSET_IMAGE` varchar(255) NOT NULL,
  `LOCATION_IMAGE` varchar(255) NOT NULL,
  `ASSIGNEE_IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`GUID`, `LOCATION`, `ASSIGNEE`, `DESCRIPTION`, `MAKE`, `MODEL`, `SERIALNO`, `COUNTYNO`, `ACDATE`, `COST`, `COMMENTS`, `STATUS`, `CATEGORY`, `BINVENT`, `SUBLOCATION`, `BUREAU`, `ASSET_IMAGE`, `LOCATION_IMAGE`, `ASSIGNEE_IMAGE`) VALUES
(1, 'Arcadia', 'Unassigned', 'black', 'Chevy', 'black', '123456', 65432, '2019-01-29 11:34:50', '111456', 'N/A', 'F', 'Trailer', 18742, 'N/A', 'USER', 'assetImages/iPhone.jpg', 'locationImages/warehousebuildings.jpg', 'employeeImages/22610.jpg'),
(2, 'South Gate', 'Unassigned', 'Blue', 'Nissan', 'Blue', '1234dws', 65432, '2019-01-29 19:34:50', '$221,456.00', 'ecx', 'P', 'Trailer3', 18740, 'N/A', 'USER', 'assetImages/385.png', 'locationImages/warehousebuildings.jpg', 'employeeImages/_WVkn2guvm.jpg'),
(65, 'Arcadia', 'Unassigned', 'Black', 'Ford ', 'Black', '456789', 345, '2019-04-22 00:27:00', '$6,780.00', 'N/A', 'F', 'trailer', 18732, 'N/A', 'ADMIN', 'assetImages/12468.jpg', 'locationImages/warehousebuildings.jpg', 'employeeImages/7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`GUID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;