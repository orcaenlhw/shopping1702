<?php
		$name=$_POST['name'] ;
		$password=$_POST['password'];

		 	include('conn.php');

$sql="select * from user where name='$name' AND password='$password' ";
	
	$result= $conn->query($sql);

	if( $result->num_rows >0)
	{
		session_start();
		$_SESSION['login']=true;
		$_SESSION['name']=$name;
		header("location:index.php");
		}else{
			header("location:login.php");
		}


?>