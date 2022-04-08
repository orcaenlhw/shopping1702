<?php
include 'conn.php';
if (isset($_POST['vid'])) {
$vid=$_POST['vid'];
$sql="SELECT p.*,od.voucherid as vid,od.qty as itemqty FROM orderdetail as od INNER JOIN product as p ON p.id=od.itemid WHERE voucherid='$vid' ";
$res=$conn->query($sql);
$no=0;
$total=0;
if ($res->num_rows > 0) {
	while ($row=$res->fetch_assoc()) {
		$no++;
		$itemname=$row['name'];
		$peramount=$row['price'];
		$photo=$row['photo'];
		$qty=$row['itemqty'];
		$vid=$row['vid'];
		$subamount=$qty*$peramount;
		$total+=$subamount;
		echo "<tr><td>$no</td>
		<td>$itemname</td>
		<td>$qty</td>
		<td>$peramount</td>
		<td>$subamount</td>
		<td><img src='$photo' width='100px' ></td></tr>
		";
	}
	echo "<tr><td colspan='4'>Total</td><td>$total</td><td></td></tr>";
}
}
?>