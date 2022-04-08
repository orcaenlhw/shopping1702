<?php

	$id= $_POST['id'];
	$html="";

	 include('admin/conn.php');
                    $sql="select * from product where id=$id";
                    $result=$conn -> query($sql);

                    if ($result->num_rows>0) {
                      while ($row=$result->fetch_assoc()) {
                     // print_r($row); echo "<br>";
                     $name=$row['name'];
                     $id=$row['id'];
                     $price=$row['price'];
                     $description=$row['description'];
                     $photo=$row['photo'];
                     $photo="admin/".$photo;

                     $html.= '
                     <div class="col-sm-8 col-lg-8 col-md-8">
                        <div class="thumbnail">
                            <img src=" ' .$photo. '" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$price.'</h4>
                                <h4><a href="#">'.$name.'</a>
                                </h4>
                                <p>'.$description.'</p>
                            </div>
                            <div class="ratings">
                                <button class="btn btn-success " onclick="addtocart('.$id.')" >Add To Cart</button>

                            </div>
                        </div>
                    </div>
                     ';
                    }

                    }else{
                    	$html="There is no result!";
                    }
                  
                    echo $html;

?>