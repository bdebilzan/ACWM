DROP TABLE IF EXISTS COMPUTER;

CREATE TABLE `COMPUTER` (
  `GUID` int(11) NOT NULL,
  `ASSIGNEE` varchar(255) NOT NULL,
  `ITEM_TYPE` varchar(255) NOT NULL,
  `SERIAL_NO` bigint(20) NOT NULL,
  `MODEL` varchar(255) NOT NULL,
  `MAKE` varchar(255) NOT NULL,
  `CPU_TYPE` varchar(255) NOT NULL,
  `CPU_SPEED` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `HARD_DRIVE` varchar(255) NOT NULL,
  `COMMENTS` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `COUNTY_NO` int(11) NOT NULL,
  `MAP_LOCATION` varchar(255) NOT NULL,
  `WORK_SITE` varchar(255) NOT NULL,
  `BUREAU` varchar(255) NOT NULL,
  `DIVISION` varchar(255) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL,
  `UNIT_CODE` int(11) NOT NULL,
  `ACQ_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_MOVE_DATE` timestamp NULL DEFAULT NULL,
  `ASSIGNEE_IMAGE` varchar(255) NOT NULL,
  `ITEM_IMAGE` varchar(255) NOT NULL,
  `LOCATION_IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COMPUTER`
--

INSERT INTO `COMPUTER` (`GUID`, `ASSIGNEE`, `ITEM_TYPE`, `SERIAL_NO`, `MODEL`, `MAKE`, `CPU_TYPE`, `CPU_SPEED`, `RAM`, `HARD_DRIVE`, `COMMENTS`, `STATUS`, `COUNTY_NO`, `MAP_LOCATION`, `WORK_SITE`, `BUREAU`, `DIVISION`, `PROGRAM`, `UNIT_CODE`, `ACQ_DATE`, `LAST_MOVE_DATE`, `ASSIGNEE_IMAGE`, `ITEM_IMAGE`, `LOCATION_IMAGE`) VALUES
(56797, 'AAA', 'appp', 5432, 'azPPP', 'aaazzppp', 'azzPPPP', 'azz', 'az', 'az', 'a', 'P', 432, 'Olive View', 'az', 'USER', 'azzz', 'azzz', 18742, '2019-04-17 00:51:40', '2019-04-21 23:57:29', 'employeeImages/7.jpg', 'assetImages/iPhone.jpg', 'locationImages/warehousebuildings.jpg'),
(56798, 'qQQQss', 'q', 1234554, 'aq', 'q', 'qsss', 'q', 'q', 'q', 'q', 'P', 890, 'Olive View', 'q', 'USER', 'q', 'q', 18743, '2019-04-17 02:37:31', '2019-04-21 21:22:26', 'employeeImages/_WVkn2guvm.jpg', 'assetImages/12.jpg', 'locationImages/warehousebuildings.jpg'),
(56799, 'dd', 'dd', 43454321, 'd', 'dd', 'd', 'd', 'd', 'd', 'd', 'F', 3244, 'Arcadia', 'd', 'ADMIN', 'd', 'd', 18743, '2019-04-20 02:38:05', '2019-04-21 21:22:04', 'employeeImages/22610.jpg', 'assetImages/12468.jpg', 'locationImages/Warehouse-building-300x200.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COMPUTER`
--
ALTER TABLE `COMPUTER`
  ADD PRIMARY KEY (`GUID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COMPUTER`
--
ALTER TABLE `COMPUTER`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56800;