

CREATE TABLE `employee` (

  `employee_id` int(11) NOT NULL,

  `employee_name` varchar(500) NOT NULL,

  `dob` varchar(500) NOT NULL,

  `dept` varchar(500) NOT NULL,

  `join_date` varchar(50) NOT NULL

) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;




ALTER TABLE `employee` ADD PRIMARY KEY (`employee_id`);


ALTER TABLE `employee`  MODIFY `employee_id` int(11) NOT NULL  AUTO_INCREMENT,AUTO_INCREMENT=8;













CREATE TABLE `supplier` (

  `supplier_id` int(11) NOT NULL,

  `supplier_name` varchar(500) NOT NULL,

  `s_city` varchar(500) NOT NULL,

  `dept` varchar(500) NOT NULL,

  `material_name` varchar(50) NOT NULL,

  `cost_per_unit` int(50) NOT NULL,

  `no_of_units` int(50) NOT NULL,

  `status` varchar(50) NOT NULL

) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;






ALTER TABLE `supplier` ADD PRIMARY KEY (`supplier_id`);


ALTER TABLE `supplier`  MODIFY `supplier_id` int(11) NOT NULL  AUTO_INCREMENT,AUTO_INCREMENT=8;
















CREATE TABLE `product` (

  `product_id` int(11) NOT NULL,

  `product_name` varchar(50) NOT NULL,

  `cost` int(50) NOT NULL,

  `availability` varchar(1) NOT NULL

  

) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;






ALTER TABLE `product` ADD PRIMARY KEY (`product_id`);


ALTER TABLE `product`  MODIFY `product_id` int(11) NOT NULL  AUTO_INCREMENT,AUTO_INCREMENT=8;