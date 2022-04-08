<?php
	   $name= $_POST['name'];
	   $price=$_POST['price'];
	   $categoryid=$_POST['categoryid'];
	   $description=$_POST['description'];

	   $photoname=$_FILES['photo']['name'];
	   
	   $photolink="image/".$photoname;
	  move_uploaded_file($_FILES['photo']["tmp_name"], $photolink);

	   include('conn.php');
	   $sql=" insert into product (name,price,categoryid,photo,description,date) values ('$name' , '$price', '$categoryid', '$photolink', '$description', Now())  ";

	   if($conn->query($sql)==TRUE){
	   	  header("location:index.php?status=1");
	   }else{
	   	echo " Error ".$conn->error . $sql ;
	   }

	/*  $myfile=fopen("student.txt", "a");
	$student="\n".$name.",".$email.",".$phone.",".$photolink ;

	   fwrite($myfile, $student);
	   fclose($myfile);
*/
	








?>