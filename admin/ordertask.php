<?php
include 'conn.php';
$table="";
$message="";
// Find Start and end date
if (isset($_POST['start'])) {
$start=$_POST['start'];
$end=$_POST['end'];
$start=date('Y-m-d',strtotime($start));
$end=date('Y-m-d',strtotime($end));
$sql="SELECT * FROM `order` WHERE orderdate>='$start' AND orderdate<='$end' ";
}
// Delivery 
elseif(isset($_REQUEST['orderid'])){
$orderid=$_REQUEST['orderid'];
$sql="UPDATE `order` SET status=1 WHERE id='$orderid' ";
if ($conn->query($sql)===TRUE) {
$sql="SELECT * FROM `order` WHERE id='$orderid' ";
$message="<div class='alert alert-success' ><a href='#' class='close' data-dismiss='alert'></a> Success !</div>  ";
}else{
$sql="SELECT * FROM `order` WHERE status!=1";
}
}
// End Delvery Function
// order Cancel
elseif (isset($_REQUEST['cancelid'])) {
$orderid=$_REQUEST['cancelid'];
$sql="UPDATE `order` SET status=3 WHERE id='$orderid' ";
if ($conn->query($sql)===TRUE) {
$sql="SELECT * FROM `order` WHERE id='$orderid' ";
$message="<div class='alert alert-success' ><a href='#' class='close' data-dismiss='alert'></a> Success !</div>  ";
}else{
$sql="SELECT * FROM `order` WHERE status!=1";
}
}
// End Cancel Function
// Return Order
elseif (isset($_REQUEST['returnorderid'])) {
$orderid=$_REQUEST['returnorderid'];
$sql="UPDATE `order` SET status=0 WHERE id='$orderid' ";
if ($conn->query($sql)===TRUE) {
$sql="SELECT * FROM `order` WHERE id='$orderid' ";
$message="<div class='alert alert-success' ><a href='#' class='close' data-dismiss='alert'></a> Success !</div>  ";
}else{
$sql="SELECT * FROM `order` WHERE status!=1";
}
}

//End Retrun Order

// DELETE ORDER
elseif (isset($_REQUEST['deleteid'])) {
$orderid=$_REQUEST['deleteid'];
$sql="DELETE FROM `order` WHERE id='$orderid'";
if ($conn->query($sql)===TRUE) {
$message="<div class='alert alert-success' ><a href='#' class='close' data-dismiss='alert'></a> Success !</div>  ";
}
$sql="SELECT * FROM `order` WHERE status!=1";

}

else{
$sql="SELECT * FROM `order` WHERE status!=1";

}



$res=$conn->query($sql);

if ($res->num_rows > 0) {
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$name=$row['customer_name'];
		$voucherid=$row['voucherid'];
		$id=$row['id'];
		$phone=$row['phone'];
		$email=$row['email'];
		$address=$row['address'];
		$orderdate=$row['orderdate'];
		$status=$row['status'];
		$i++;
		$table.="<tr><td>$i</td>";
		$table.="<td>$name</td>";
		$table.="<td>$voucherid</td>";
		$table.="<td>$orderdate</td>";
		$table.="<td>$phone</td>";
		$table.="<td>$email</td>";
		$table.="<td>$address</td>";
		$table.="<td><button class='btn btn-info updetail' data-vid='$voucherid' >Detail </button></td>";
		 if ($status==0) {
		$table.="<td>Order</td>";
		$table.="<td><a class='btn btn-success' href='order.php?orderid=$id'>Delivery</a>
		</td>";
		$table.="<td><a href='order.php?cancelid=$id'>Cancel</a></td>";
		 }elseif ($status==1) {
		 $table.="<td>Delivery</td>";
		 $table.="<td colspan='2'></td>";
		 }else{
		 $table.="<td>Cancel Order</td>";
		 $table.="<td colspan='2'><a href='order.php?returnorderid=$id' class='btn btn-success' >ReOrder</a></td> ";
		 }
		 if ($status!=1) {
		$table.="<td>
			<a class='btn btn-danger' href='order.php?deleteid=$id' >Delete</a>
		</td></tr>";	
		 }else{
		 	$table.="<td></td>";
		 }
		

	}
}else{
	$table.="<tr><td colspan='10'>Nothing Here!</td></tr>";
}
?>