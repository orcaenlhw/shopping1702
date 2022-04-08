<?php
	   $name= $_POST['name'];
	
	   $sql=" insert into category (name) values ('$name')";
	   include('conn.php');
	   if($conn->query($sql)==TRUE){
	   	header("location:category.php?status=1");
	   }else{
	   	echo "Error".$conn->error.$sql ;
	   }


?>