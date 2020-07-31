DROP database singhe_super;
CREATE database singhe_super;
use singhe_super;
SHOW WARNINGS;


CREATE TABLE users 
( `email_address` VARCHAR(30) NOT NULL , `user_name` VARCHAR(30) NOT NULL , `NIC` varchar(12) NOT NULL , `user_type` VARCHAR(15) NOT NULL , `mobile_number` NUMERIC(10) NOT NULL , `title` VARCHAR(5) NOT NULL , `password` VARCHAR(20) NOT NULL );
INSERT INTO users(`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('saman@gmail.com', 'Saman Ratnayake', '905555555v', 'Cashier', '0782222222', 'Mr.', 'cashier123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('nayana@gmail.com', 'Nayana Ediriweera', '861111111v', 'Customer', '0761111111', 'Miss', 'customer123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('kamal@gmail.com', 'Kamal Jayasinghe', '971111111v', 'Customer', '0761555111', 'Mr.', 'kamal123');
INSERT INTO `users` (`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password`) VALUES ('gayan@gmail.com', 'Gayan Ekanayake', '851111111v', 'Administartor', '0751111111', 'Mr.', 'administraor123');
SHOW WARNINGS;

CREATE TABLE products (`product_category`  VARCHAR(30) NOT NULL, `product_name` VARCHAR(30) NOT NULL , `product_ID` VARCHAR(7) NOT NULL , `description` VARCHAR(30) NOT NULL , `unit_price` VARCHAR(10) NOT NULL, `brand` VARCHAR(20) NOT NULL,`quantity` VARCHAR(50) not NULL, `product_image` BLOB );
SHOW WARNINGS;

INSERT INTO `products` (`product_category`,`product_name`, `product_ID`, `description`, `unit_price`, `brand`,`quantity`) VALUES ('Sanitary items','Tooth Brush', 'SAN2222', 'Medium', '60', 'Signal','10');
INSERT INTO `products` (`product_category`,`product_name`, `product_ID`, `description`, `unit_price`, `brand`,`quantity`) VALUES ('Daily essentials','samba rice', 'RIC2222', '5kg bags', '500', 'Nipuna','20');
INSERT INTO `products` (`product_category`,`product_name`, `product_ID`, `description`, `unit_price`, `brand`,`quantity`) VALUES ('Snacks & sweets','chocolate biscuit', 'BIS3333', '250g', '150', 'Maliban','15');
INSERT INTO `products` (`product_category`,`product_name`, `product_ID`, `description`, `unit_price`, `brand`,`quantity`) VALUES ('Snacks & sweets','Marie biscuit', 'BIS4444', '300g', '150', 'Maliban','15');
INSERT INTO `products` (`product_category`,`product_name`, `product_ID`, `description`, `unit_price`, `brand`,`quantity`) VALUES ('Spices','salt', 'SPI3333', '400g', '60', 'Ruhunu','30');
SHOW WARNINGS;

CREATE TABLE suggestions(  `username` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `suggestion` VARCHAR(200) NOT NULL);

  

  CREATE TABLE feedback(  `username` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productfeedback` VARCHAR(200) NOT NULL, `stafffeedback` VARCHAR(200) NOT NULL);

INSERT INTO `feedback` (`username`, `date_time`, `productfeedback`,`stafffeedback`) VALUES ('nayana', '2020-05-26 13:27:47', 'adddark chocolate', 'friendly service');

INSERT INTO `feedback` (`username`, `date_time`, `productfeedback`,`stafffeedback`) VALUES ('nayana', '2020-05-26 13:27:47', 'add papprika powder', 'friendly service');
INSERT INTO `feedback` (`username`, `date_time`, `productfeedback`,`stafffeedback`) VALUES ('nayana', '2020-05-26 13:27:47', 'add diana biscuits', 'friendly service');

  SHOW WARNINGS;

-- DROP TABLE cart1;

CREATE TABLE cart1 (
`email_address`  VARCHAR(30) NOT NULL,
`product_name` VARCHAR(30) NOT NULL,
`quantity_needed` DOUBLE NOT NULL
);
 ALTER TABLE cart1 ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY;
 ALTER TABLE cart1 ADD total int NOT NULL ;
 ALTER TABLE cart1 ADD unit_price VARCHAR(10) NOT NULL ;
  

-- DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders (
  `username` varchar(30) NOT NULL,
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `order_status` varchar(20) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double NOT NULL,
  PRIMARY KEY (`orderid`)
);

 INSERT INTO orders (username, orderid, order_status, date_time, amount) VALUES('Nayana Ediriweera', '1', 'incomplete', '2020-05-26 13:26:31', '0');
INSERT INTO orders (username, orderid, order_status, date_time, amount) VALUES('Asanka', '2', 'incomplete', '2020-05-26 13:27:47', '0');
INSERT INTO orders (username, orderid, order_status, date_time, amount) VALUES('Kamal Jayasinghe', '3', 'incomplete', '2020-05-26 13:27:47', '0');




CREATE TABLE  order_details (
  `orderid` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `product_status` varchar(20) NOT null,
  `item_number` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`item_number`)
); 

INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('1', 'raththi 400g', 'incomplete', 'not added', '1');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('1', 'sugar 3kg', 'incomplete', 'not added', '2');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('1', 'Tea powder 200g', 'incomplete', 'not added', '3');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('1', 'milo 400g', 'incomplete', 'not added', '4');

INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('2', 'rice 10kg', 'incomplete', 'not added', '5');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('2', 'flour 3kg', 'incomplete', 'not added', '6');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('2', 'coconut 5', 'incomplete', 'not added', '7');

INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('3', 'noodles maggie 5', 'incomplete', 'not added', '8');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('3', 'sausages 200g', 'incomplete', 'not added', '9');
INSERT INTO order_details (orderid,item, order_status, product_status,item_number) VALUES('3', 'coconut oil 1l', 'incomplete', 'not added', '10');

create table offers(
  `offerid` int(7) NOT NULL AUTO_INCREMENT,
  `offer` varchar(50) NOT NULL,
  `conditions` varchar(50) DEFAULT NULL,
  
  PRIMARY KEY (`offerid`)
);

insert into offers(offerid, offer, conditions) Values('1','buy 1 astra 250g tub and get 1 free','for purchases above Rs.5000');
insert into offers(offerid, offer, conditions) Values('2','Buy 5 lifebuoy 100g soap bars and get 1 free','for purchases above Rs.3000');
insert into offers(offerid, offer, conditions) Values('3','buy 10 kottu mee packets and get 50% off next 2','for purchases above Rs.1000');

CREATE TABLE category(`product_category` VARCHAR(30)NOT NULL,`cat_code` varchar(3) NOT NULL,`cat_description` VARCHAR(300) NOT NULL,`cat_image` BLOB NOT NULL);
SHOW WARNINGS;

-- INSERT INTO category (product_category, cat_code, cat_description, cat_image) VALUES ('Spices', 'SPI', 'You can buy spices of various brands here.Spices includes salt,pepper,chillie powder,curry powder etc....', LOAD_FILE('C:\wamp64\www\sas\images\spices.jfif'));