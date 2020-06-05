DROP database singhe_super;
CREATE database singhe_super;
use singhe_super;
CREATE TABLE users 
( `email_address` VARCHAR(30) NOT NULL , `user_name` VARCHAR(30) NOT NULL , `NIC` INT(10) NOT NULL , `user_type` VARCHAR(15) NOT NULL , `mobile_number` INT(10) NOT NULL , `title` VARCHAR(5) NOT NULL , `password` VARCHAR(20) NOT NULL );
INSERT INTO users(`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('saman@gmail.com', 'Saman Ratnayake', '905555555v', 'Cashier', '0782222222', 'Mr.', 'cashier123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('nayana@gmail.com', 'Nayana Ediriweera', '861111111v', 'Customer', '0761111111', 'Miss', 'customer123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('gayan@gmail.com', 'Gayan Ekanayake', '851111111v', 'Administartor', '0751111111', 'Mr.', 'administraor123');
CREATE TABLE products ( `product_name` VARCHAR(30) NOT NULL , `product_ID` VARCHAR(7) NOT NULL , `description` VARCHAR(30) NOT NULL , `unit_price` VARCHAR(10) NOT NULL, `brand` VARCHAR(20) NOT NULL);
INSERT INTO `products` (`product_name`, `product_ID`, `description`, `unit_price`, `brand`) VALUES ('Cream Crackers', 'BIS2222', '500g', '200', 'Munchee');
INSERT INTO `products` (`product_name`, `product_ID`, `description`, `unit_price`, `brand`) VALUES ('Tooth Brush', 'SAN2222', 'Medium', '60', 'Signal');


DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders (
  `username` varchar(30) NOT NULL,
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `order_status` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double NOT NULL,
  PRIMARY KEY (`orderid`)
);
INSERT INTO orders (username, orderid, order_status, date_time, amount) VALUES('Pasindu', '1', '0', '2020-05-26 13:26:31', '0');
INSERT INTO orders (username, orderid, order_status, date_time, amount) VALUES('Asanka', '2', '0', '2020-05-26 13:27:47', '0');


DROP TABLE IF EXISTS order_details;
CREATE TABLE IF NOT EXISTS order_details (
  `orderid` int(11) NOT NULL,
  `item` varchar(50) NOT NULL
); 

INSERT INTO order_details (`orderid`, `item`) VALUES
(1, 'B onion 1 kg\r'),
(1, 'Dhal 500g\r'),
(1, 'Sugar 2kg'),
(2, 'Wheat flour 2 kg\r'),
(2, 'Alli papadam 2\r'),
(2, 'Maggie noodles 500g');

CREATE TABLE suggestions(  `username` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `suggestion` VARCHAR(200) NOT NULL);

  CREATE TABLE feedback(  `username` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productfeedback` VARCHAR(200) NOT NULL, `stafffeedback` VARCHAR(200) NOT NULL);

  ALTER TABLE products ADD quantity VARCHAR(50) not NULL;

  
-- DROP TABLE cart1;

CREATE TABLE cart1 (
`email_address`  VARCHAR(30) NOT NULL,
`product_name` VARCHAR(30) NOT NULL,
`quantity_needed` DOUBLE NOT NULL
);
 ALTER TABLE cart1 ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY;