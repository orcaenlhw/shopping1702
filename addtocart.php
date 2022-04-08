<?php
include 'admin/conn.php';
session_start();
if (isset($_SESSION['cart'])) {
	$mycart=$_SESSION['cart'];
}else{
	$mycart=array();
}

$id=$_REQUEST['id'];
$sql="SELECT p.*,c.name as catname FROM product as p INNER JOIN category as c ON p.categoryid=c.id WHERE p.id='$id' ";
$res=$conn->query($sql);
if ($res->num_rows > 0) {
	while ($rows=$res->fetch_assoc()) {
		$id=$rows['id'];
		$name=$rows['name'];
		$price=$rows['price'];
		$photo=$rows['photo'];
	}
}
$status=0;
foreach ($mycart as $key => $val ) {
	if ($mycart[$key][0]==$id) {
		$qty=$mycart[$key][4];
		//$row=0;
		if ($qty<10) {
		$qty++;
		echo "1";
		}
		// echo "Heloo";
		//$_SESSION['cart'][$key][4]=$qty;
		//	$status=1;
		foreach ($mycart as $ke => $va ) {
		
			if ($mycart[$ke][0]==$id) {
				$_SESSION['cart'][$key][4]=$qty;
				$status=1;
		}
				//$row++;
		}
	}
}
if ($status==0) {
	array_push($mycart, array($id,$name,$price,$photo,1));
	$_SESSION['cart']=$mycart;
	echo "1";
}


?>