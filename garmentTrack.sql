CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `customizedproduct` (
  `id` int(11) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `colorCode` varchar(20) NOT NULL,
  `fabricType` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `quentity` int(11) NOT NULL,
  `estimatedPayment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `measurements` (
  `id` int(11) NOT NULL,
  `measurementName` varchar(255) NOT NULL,
  `shoulder` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `sleeve` int(11) NOT NULL,
  `hem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Dumping data for table `measurements`
INSERT INTO `measurements` (`id`, `measurementName`, `shoulder`, `chest`, `length`, `sleeve`, `hem`) VALUES
(36, 'kid1', 5, 111, 1, 4, 2);


CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `trackingNo` int(11) NOT NULL,
  `orderNo` int(11) NOT NULL,
  `customerName` varchar(40) NOT NULL,
  `customerAddress` varchar(300) NOT NULL,
  `customerPhoneNo` int(11) NOT NULL,
  `imageName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Dumping data for table `orders`
INSERT INTO `orders` (`id`, `trackingNo`, `orderNo`, `customerName`, `customerAddress`, `customerPhoneNo`, `imageName`) VALUES
(1, 10101010, 101010, 'kane williamson ', '10A, New Zealand ', 2147483647, 'q1.jpeg');


CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Dumping data for table `users`
INSERT INTO `users` (`id`, `firstName`, `middleName`, `lastName`, `address`, `email`, `phoneNumber`, `password`) VALUES
(1, 'Happuthanthrige don', 'Sajindu Shamalka', 'Jinasena', '38/3/1, jaya mawatha cross road', 'sajindushamalka@gmail.com', 717767117, 'cscscs');


-- Indexes for table `contactform`
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customizedproduct`
--
ALTER TABLE `customizedproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customizedproduct`
--
ALTER TABLE `customizedproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16517;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
