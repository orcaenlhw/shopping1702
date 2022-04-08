<?php
		$id=$_REQUEST['id'];
		$photo=$_REQUEST['photo'];

		include('conn.php');
		$sql="delete from product where id=$id ";

		if($conn->query($sql)==TRUE){
			unset($photo);
			header("location:index.php?status=3");
		}else{
			echo "Error ".$conn->error.$sql ;
		}


?>