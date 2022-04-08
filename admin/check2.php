<?php
		$name=$_POST['name'] ;
		$password=$_POST['password'];

			$host="localhost";
			$user="root";
			$pass="";
			$db="php1702";

			//Create connection
			$conn = new mysqli($host,$user,$pass,$db);

			//Check connection
			if($conn->connect_error){
				die("Connection Failed:".$conn->connect_error);
			}


			$sql="select * from user where name='$name' AND password='$password'";
			
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				print_r($row);
			}
/*
			if($result->num_rows>0){
				echo $result->num_rows;
			}*/

			
			// echo "hi";

		// if($name=="admin" && $password=="root"){
		// 	session_start();
		// $_SESSION['login']=true;
		// $_SESSION['name']=$name;
		// header("location:index.php");
		// }else{
		// 	header("location:login.php");
		// }


?>