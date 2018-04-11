<?php

$customerid = filter_input(INPUT_GET, "customerId");

$arrcustomer = MysqlConnection::fetchCustom("SELECT * FROM  `customer_master` WHERE id = $customerid ");
echo "<pre>";
print_r($arrcustomer);
echo "</pre>";
$arrcustomercontact = MysqlConnection::fetchCustom("SELECT * FROM  `customer_contact` cust_id = $customerid ");
echo "<pre>";
print_r($arrcustomercontact);
echo "</pre>";
$arrcustomerpayment = MysqlConnection::fetchCustom("SELECT * FROM  `customer_payment`  cust_id = $customerid ");
echo "<pre>";
print_r($arrcustomercontact);
echo "</pre>";

