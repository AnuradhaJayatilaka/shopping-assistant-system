DROP database singhe_super;
CREATE database singhe_super;
use singhe_super;
CREATE TABLE users 
( `email_address` VARCHAR(30) NOT NULL , `user_name` VARCHAR(30) NOT NULL , `NIC` INT(10) NOT NULL , `user_type` VARCHAR(15) NOT NULL , `mobile_number` INT(10) NOT NULL , `title` VARCHAR(5) NOT NULL , `password` VARCHAR(20) NOT NULL );
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('saman@gmail.com', 'Saman Ratnayake', '905555555v', 'Cashier', '0782222222', 'Mr.', 'cashier123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('nayana@gmail.com', 'Nayana Ediriweera', '861111111v', 'Customer', '0761111111', 'Miss', 'customer123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('gayan@gmail.com', 'Gayan Ekanayake', '851111111v', 'Administartor', '0751111111', 'Mr.', 'administraor123');
CREATE TABLE products ( `product_name` VARCHAR(30) NOT NULL , `product_ID` VARCHAR(7) NOT NULL , `description` VARCHAR(30) NOT NULL , `unit_price` VARCHAR(10) NOT NULL, `brand` VARCHAR(20) NOT NULL);
INSERT INTO `products` (`product_name`, `product_ID`, `description`, `unit_price`, `brand`) VALUES ('Cream Crackers', 'BIS2222', '500g', '200', 'Munchee');
INSERT INTO `products` (`product_name`, `product_ID`, `description`, `unit_price`, `brand`) VALUES ('Tooth Brush', 'SAN2222', 'Medium', '60', 'Signal');
SELECT * FROM `products`;