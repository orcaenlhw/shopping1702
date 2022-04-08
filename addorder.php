<?php
session_start();
include 'admin/conn.php';
if (isset($_SESSION['cart'])) {
	if (count($_SESSION['cart']) >0) {
		$mycart=$_SESSION['cart'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		date_default_timezone_set("Asia/Rangoon");
		$date=date('Y-m-d');
		$res=$conn->query("SELECT * FROM `order` WHERE orderdate='$date' ORDER BY id desc LIMIT 1 ");
		if ($res->num_rows > 0) {
			while ($row=$res->fetch_assoc()) {
				$vid=$row['voucherid'];
				$vid++;
			}
		}else{
			$vdate=date('Ymd');
			$vid=$vdate.'000001';
		}
		$sql="INSERT INTO `order`(customer_name,phone,address,voucherid,orderdate,status,email) VALUES ('$name','$phone','$address','$vid','$date','0','$email') ";
		//$sql="INSERT INTO `order` VALUES(NULL,'$name','$phone','$address','$vid','$date','0000-00-00','0')";
		if ($conn->query($sql)) {
			foreach ($mycart as $key ) {
				$itemid=$key[0];
				$qty=$key[4];
				$sql="INSERT INTO orderdetail VALUES(NULL,'$vid','$itemid','$qty')";
				$conn->query($sql);
			}
			unset($_SESSION['cart']);
			// session_destroy();
		}
	}

}
header('location:index.php');
?>