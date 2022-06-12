<?php

$db_conn = mysqli_connect("localhost", "root", "", "paypal_test");
// Check connection
if($db_conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} //else echo 'success';
error_reporting(E_ALL);
ini_set('display_errors','Off');

/*

CREATE TABLE 'products (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `price` float(10,2) NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





CREATE TABLE `payments` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` float(10,2) NOT NULL,
 `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `payment_amount` float(10,2) NOT NULL,
 `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
 `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
 `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `createdtime` datetime DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;    */

?>