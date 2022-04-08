<?php
include 'conn.php';
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$status=$_POST['status'];
	if ($status=='adduser') {
	$sql="SELECT * FROM user where name='$username' ";
	$res=$conn->query($sql);
	if ($res->num_rows > 0 ) {
		$data['message']="User is Already Exist";
		$data['status']=0;
	}else{
	$sql="INSERT  INTO user VALUES(NULL,'$username','$password') ";
	$res=$conn->query($sql);
	$data['message']="Add User Successful !";
	$data['status']=1;
	}
	echo json_encode($data);
	}elseif ($status=="edituser") {
	$sql="SELECT * FROM user where name='$username' AND id!='$id' ";
	$res=$conn->query($sql);
	if ($res->num_rows > 0 ) {
		$data['message']="User is Already Exist";
		$data['status']=0;
	}else{
	$sql="UPDATE user SET name='$username',password='$password' WHERE id='$id' ";
	$res=$conn->query($sql);
	$data['message']="Update User Successful !";
	$data['status']=1;
	}
	echo json_encode($data);	
	}


}
elseif (isset($_REQUEST['deleteid'])) {
$id=$_REQUEST['deleteid'];
$sql="DELETE FROM user WHERE id='$id' ";
$conn->query($sql);
echo "Delete User Successful !";	
}

else{

$sql="SELECT * FROM user";
$res=$conn->query($sql);
if ($res->num_rows > 0) {
	$no=0;
	while ($row=$res->fetch_assoc()) {
		$id=$row['id'];
		$name=$row['name'];
		$password=$row['password'];
		$no++;
		echo "<tr><td>$no</td><td>$name</td><td>$password</td><td><button class='btn btn-success' onclick='updateuser($id,\"$name\",\"$password\")'>Update</button></td><td><button class='btn btn-danger' onclick=deleteuser($id)>Delete</button></td></tr>";
	}
}

}

?>