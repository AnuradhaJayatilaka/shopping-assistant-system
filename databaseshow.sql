use singhe_super;
SELECT * FROM users;
SELECT * FROM products;

-- select * FROM textarea;
SELECT * FROM orders;
SELECT * FROM order_details;
SELECT * FROM feedback;
SELECT * FROM cart1;
SELECT * FROM offers;

-- SELECT * FROM products WHERE product_name LIKE '%sa%';
-- SELECT * FROM products WHERE product_name LIKE '%saltssssssssssssssssss%';
-- SELECT * FROM products WHERE product_name LIKE 'c%';


SELECT* FROM cartorder;
SELECT *FROM cartorder_details;

-- INSERT INTO cartorder_details (cartorderid,product_ID,quantity,product_name) VALUES ('4','DAI2222','1','Milk powder');

-- ALTER TABLE cartorder_details ADD product_name VARCHAR(100) NOT NULL;
-- ALTER TABLE cart1 ADD product_ID VARCHAR(7) NOT NULL;

 SELECT * FROM products  WHERE quantity<=50 ORDER BY product_ID;
--  select SUM(amount) from cartorder WHERE porder_date_time BETWEEN '2020-08-12 19:35:26' and '2020-08-12 19:40:26';
select * from feedback where date_time between '2020-04-26 00:00:00' AND '2020-08-06 23:59:59';


