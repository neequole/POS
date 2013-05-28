CREATE TABLE IF NOT EXISTS `customers` (
	`customer_id` int(8) NOT NULL AUTO_INCREMENT,
	`customer_name` varchar(125) NOT NULL,
	`balance` float(8) NOT NULL,
	PRIMARY KEY(`customer_id`)
);

insert into `customers` (`customer_id`, `customer_name`, `balance`) values
	('1', 'Juan Dela Crus', 250.5),
	('2', 'Juana Change', 10);	

CREATE TABLE IF NOT EXISTS `transactions` (
	`trans_id` int(8) NOT NULL AUTO_INCREMENT,
	`customer_id` int(8) NOT NULL,
	`trans_date` date NOT NULL,
	/* 
	`item_count` int(8) NOT NULL,
	`total_amount` float(8) NOT NULL,
	*/
	PRIMARY KEY(`trans_id`),
	key `fk_trans_customers` (`customer_id`)
);

insert into `transactions` (`trans_id`, `customer_id`, `trans_date`) values 
	(1, 1, '2013-05-27'),
	(2, 1, '2013-05-28'),
	(3, 2, '2013-05-28');

CREATE TABLE IF NOT EXISTS `trans_details` (
	`trans_id` int(8) NOT NULL,
	`item_code` varchar(125) NOT NULL,
	`quantity` int(8) NOT NULL,
	`price` float(8) NOT NULL,
	key `fk_details_trans` (`trans_id`)
);

insert into `trans_details` (`trans_id`, `item_code`, `quantity`, `price`) values 
	(1, 'CHA151', 1, 23.50),
	(1, 'CEN43', 2, 5),
	(2, 'CHA151', 2, 23.50),
	(3, 'CL151', 1, 10);



CREATE TABLE IF NOT EXISTS `supplier` (
	`supplier_id` int(8) NOT NULL AUTO_INCREMENT,
	`supplier_name` varchar(125) NOT NULL,
	`manufacturer` varchar(125) NOT NULL,
	PRIMARY KEY(`supplier_id`)
);

insert into `supplier` (`supplier_id`, `supplier_name`) values 
	('1', 'Supplier 1'),
	('2', 'Supplier 2'),
	('3', 'Supplier 3');

CREATE TABLE IF NOT EXISTS `delivery` (
	`supplier_id` int(8) NOT NULL,
	`delivery_id` int(8) NOT NULL AUTO_INCREMENT,
	`date_delivered` date NOT NULL,
	PRIMARY KEY(`delivery_id`),
	KEY `fk_delivery_supplier` (`supplier_id`)
);

insert into `delivery` (`supplier_id`,`delivery_id`, `date_delivered`) values
	('1', '001', '2013-05-26'),
	('1', '002', '2013-05-30'),
	('2', '003', '2013-05-30');

CREATE TABLE IF NOT EXISTS `delivered_item` (
	`delivery_id` int(8) NOT NULL,
	`item_code` varchar(125) NOT NULL,
	`quantity` int(8) NOT NULL,
	`price` float(8) NOT NULL,
	KEY `fk_delivered_delivery` (`delivery_id`)
);

insert into `delivered_item` (`delivery_id`, `item_code`, `quantity`, `price`) values
	('003', 'CHA151', '20', '100.50'),
	('001', 'CHA151', '20', '100.50'),
	('001', 'CEN43', '10', '10.00'),
	('001', 'DEL216', '5', '50.25'),
	('002', 'AIR51', '2', '20'),
	('002', 'CL151', '30', '240'),
	('002', 'SHA11', '12', '55');


CREATE table if not exists `item` (
	`item_code` varchar(125) NOT NULL,
	`bar_code` int(125) NOT NULL,
	`desc1` varchar(125) DEFAULT NULL,
	`desc2` varchar(125) DEFAULT NULL,
	`desc3` varchar(125) DEFAULT NULL,
	`desc4` varchar(125) DEFAULT NULL,
	`group` varchar(125) DEFAULT NULL,
	`class1` varchar(125) DEFAULT NULL,
	`class2` varchar(125) DEFAULT NULL,
	`cost` float(25) not null,
	`retail_price` float(25) not null,
	`model_quantity` varchar(125) DEFAULT NULL,
	`supplier_code` varchar(125) DEFAULT NULL,
	`manufacturer` varchar(125) DEFAULT NULL,
	`quantity` int(8) NOT NULL,
	`reorder_point` int(8) DEFAULT NULL,
	PRIMARY KEY(`item_code`)
);

create table if not exists `supplier_items` (
	`supplier_id` int(8) NOT NULL,
	`item_code` varchar(125) NOT NULL,
	KEY `fk_supplied_item` (`supplier_id`) 
);