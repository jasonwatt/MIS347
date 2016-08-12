--
-- Database: `skecomplaints`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Address_ID` int(11) NOT NULL,
  `Street` text NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_ID` int(11) NOT NULL,
  `Status_Change` varchar(255) NOT NULL,
  `Visibility` set('Admin','Manager','Team','Public') NOT NULL DEFAULT 'Public',
  `Comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_ID`, `Status_Change`, `Visibility`, `Comments`) VALUES
(123, 'Hello', 'Public', 'YAYAYAAY');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `Start_Date` varchar(255) DEFAULT NULL,
  `End_Date` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Locations` varchar(255) DEFAULT NULL,
  `Group_ID` int(255) NOT NULL,
  `Address_ID` int(11) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Status` enum('Setup','Pre_Event','Open','Post_Event','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Event_Name`, `Start_Date`, `End_Date`, `Address`, `Locations`, `Group_ID`, `Address_ID`, `User_ID`, `Status`) VALUES
(0, 'dddd', '2016-08-07', '2016-08-22', 'ddd ddd AK ddd', 'dddd', 0, 0, 0, 'Setup');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `Group_ID` int(11) NOT NULL,
  `Group_Name` varchar(255) NOT NULL,
  `Event_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Group_Permissions` enum('View','Modify','Edit','Delete','Create') NOT NULL DEFAULT 'View'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`Group_ID`, `Group_Name`, `Event_ID`, `User_ID`, `Group_Permissions`) VALUES
(66, 'hchgj', 63565, 55, 'View');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `Issues_ID` int(11) NOT NULL,
  `Summary` mediumtext NOT NULL,
  `Created_Timestamp` datetime DEFAULT NULL,
  `Last_Update_Timestamp` datetime DEFAULT NULL,
  `First_Response_Timestamp` datetime DEFAULT NULL,
  `First_Response_User` varchar(255) DEFAULT NULL,
  `Completed_Timestamp` datetime DEFAULT NULL,
  `Assign_User` varchar(255) DEFAULT NULL,
  `Description` mediumtext,
  `Location` varchar(255) DEFAULT NULL,
  `Label` varchar(255) DEFAULT NULL,
  `Status` enum('New','Awaiting_User_Response','Assigned','In_Progress','Complete','Invalid') NOT NULL DEFAULT 'New',
  `Comment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`Issues_ID`, `Summary`, `Created_Timestamp`, `Last_Update_Timestamp`, `First_Response_Timestamp`, `First_Response_User`, `Completed_Timestamp`, `Assign_User`, `Description`, `Location`, `Label`, `Status`, `Comment_ID`) VALUES
(11, 'hello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', 0),
(12, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(13, 'dd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(14, 'ddsddcs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(15, 'sssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Profile_Pic` blob,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `Groups` varchar(255) DEFAULT NULL,
  `Events` varchar(255) DEFAULT NULL,
  `Group_ID` int(11) DEFAULT NULL,
  `Event_ID` int(11) DEFAULT NULL,
  `Permissions` set('View','Edit','Modify','Create','Delete') NOT NULL DEFAULT 'View',
  `User_Type` enum('Admin','OPS_Team','Patron','OPS_Manager','Event_Staff','Volunteer') NOT NULL DEFAULT 'Patron',
  `Last_Active` varchar(255) NOT NULL,
  `User_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Profile_Pic`, `Email`, `Password`, `Status`, `Groups`, `Events`, `Group_ID`, `Event_ID`, `Permissions`, `User_Type`, `Last_Active`, `User_Name`) VALUES
(55, 'testuser9', NULL, 'testuser9gmail', 'hello', 'Active', 'old firend', 'new friend', NULL, NULL, 'View', 'Patron', '', 'test user 9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Issue_ID` (`Comment_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `Group_ID` (`Group_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Address_ID` (`Address_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Group_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`Issues_ID`),
  ADD KEY `Issues_ID` (`Issues_ID`),
  ADD KEY `Comment_ID` (`Comment_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Group_ID` (`Group_ID`),
  ADD KEY `Event_ID` (`Event_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `Issues_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Group_ID`) REFERENCES `groups` (`Group_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
