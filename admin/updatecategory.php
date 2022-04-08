<?php
		$id= $_POST['id'];
	    $name= $_POST['name'];
	 	include('conn.php');
	 	$sql="update category set name='$name' where id=$id";

	 	if($conn->query($sql)==TRUE){
	 		header("location:category.php?status=2");
	 	}
	 	else{
	 		echo "Error".$conn->error.$sql;
	 	}

?>