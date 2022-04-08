<?php
	   $name= $_POST['name'];
	   $price=$_POST['price'];
	   $description=$_POST['description'];
	    $categoryid= $_POST['categoryid'];
	   $oldphoto=$_POST['oldphoto'];
	   $id=$_POST['id'];
	   $newfilepath=$oldphoto;

	   $photoname=$_FILES['photo']['name'];
	   if($photoname!=""){
  $photolink="image/".$photoname;
	  move_uploaded_file($_FILES['photo']["tmp_name"], $photolink);
	  	$newfilepath=$photolink;
	  	unset($oldphoto);
	   }
	 
	   include('conn.php');
	 $sql="update product set name='$name', price='$price' , description='$description', categoryid='$categoryid',photo='$newfilepath' where id=$id"; 

	   if($conn->query($sql)==TRUE){
	   	  header("location:index.php?status=3");
	   }else{
	   	echo " Error ".$conn->error . $sql ;
	   }

	/*  $myfile=fopen("student.txt", "a");
	$student="\n".$name.",".$email.",".$phone.",".$photolink ;

	   fwrite($myfile, $student);
	   fclose($myfile);
*/
	
?>