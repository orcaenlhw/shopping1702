<?php
session_start();
if (isset($_POST['qty'])) {
	$id=$_POST['id'];
	$qty=$_POST['qty'];
	foreach ($_SESSION['cart'] as $keys => $value) {
		if ($_SESSION['cart'][$keys][0]==$id) {
		$_SESSION['cart'][$keys][4]=$qty;
		}
	}
}elseif(isset($_POST['remove'])){
$id=$_POST['id'];
foreach ($_SESSION['cart'] as $keys => $value) {
		if ($_SESSION['cart'][$keys][0]==$id) {
			unset($_SESSION['cart'][$keys]);
		}
	}
}
if (isset($_SESSION['cart'])) {
	if (count($_SESSION['cart']) > 0) {
		$mycart=$_SESSION['cart'];
		$i=0;
		$total=0;
		foreach ($mycart as $key) {
		$id=$key[0];
		$name=$key[1];
		$price=$key[2];
		$photo=$key[3];
		$qty=$key[4];
		$subamount=$price*$qty;
		$i++;
		$total+=$subamount;
		echo "<tr> <td>$i</td>
			       <td>$name</td>
			       <td><input type='number' value='$qty' size='2' max='10' min='1' class='chqty' onchange='changeqty($id,this)' style='width:50px'></td>
			       <td>$price</td>
			       <td><img src='admin/$photo' width='100px' height='100'> </td>
			       <td id='subamount'>$subamount</td>
			       <td><button class='btn btn-danger' onclick='removecart($id)' > Remove </td>
			       </tr>
		"; 
		}
		echo "<tr><td colspan='5'>total</td><td>$total</td><td><button class='btn btn-success' onclick='openorder()'> Order </button></td></tr>";
	}
	//print_r($_SESSION['cart']);
}
?>