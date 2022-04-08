                <div class="row">

                <?php
                    include('admin/conn.php');
                    $sql="select * from product";
                    $result=$conn -> query($sql);
                    while ($row=$result->fetch_assoc()) {
                     // print_r($row); echo "<br>";
                     $name=$row['name'];
                     $id=$row['id'];
                     $price=$row['price'];
                     $description=$row['description'];
                     $photo=$row['photo'];
                     $photo="admin/".$photo;
                      echo '
                     <div class="col-sm-4 col-lg-4 col-md-4">
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
                               <a href="#" class="btn btn-info viewdetail" data-id="'.$id.'"> View detail</a>
                            </div>
                        </div>
                    </div>
                     ';

                    //  echo '
                    //  <div class="col-sm-4 col-lg-4 col-md-4">
                    //     <div class="thumbnail">
                    //         <img src=" ' .$photo. '" alt="">
                    //         <div class="caption">
                    //             <h4 class="pull-right">'.$price.'</h4>
                    //             <h4><a href="#">'.$name.'</a>
                    //             </h4>
                    //             <p>'.$description.'</p>
                    //         </div>
                    //         <div class="ratings">
                    //            <a href="addtocart.php?id='.$id.' " class="btn btn-success">Add to Cart</a>

                    //            <a href="#" class="btn btn-info viewdetail" data-id="'.$id.'"> View detail</a>
                    //         </div>
                    //     </div>
                    // </div>
                    //  ';
                    }
                ?>

                    
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                    </div>

                </div>