<!DOCTYPE html>
<html lang="en">

<?php
        include('head.php');
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php
                include('nav.php');
      ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                      if(isset($_REQUEST['status'])){
                            $status=$_REQUEST['status'];
                            if($status==1){
                            echo "<div class='alert alert-success'>
                           Shopping Item Added Successfully!
                                      </div>";
                            }else if ($status==2){
                             echo "<div class='alert alert-info'>
                           Shopping Item Update Successfully!
                                      </div>"; 
                            }
                            else if ($status==3){
                             echo "<div class='alert alert-info'>
                           Shopping Item Delete Successfully!
                                      </div>"; 
                            }
                      
                      }
                 

                    ?>
                        <h1 class="page-header">
                            Product Registration Form
                        </h1>
                   
                    </div>
                </div>
                  <div class="row">
                    <div class="col-lg-4">

    <form role="form" action="addproduct.php" method="POST" 
    enctype="multipart/form-data">
        <div class="form-group">
          <label>Name :</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Name" required="required">
        </div>
        <div class="form-group">
          <label>Price:</label>
          <input  type="number" name="price" class="form-control" placeholder="Enter Price" required="required">
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select name="categoryid" class="form-control">

        <?php
          include('conn.php');
          $sql="select * from category";
          $result=$conn->query($sql);
          while ($row=$result->fetch_assoc()) {
          $id=$row['id'];
          $name=$row['name'];
          echo "<option value='$id'>$name</option>";
          }
        ?>
        <!--   <option value="1">T Shirt</option>
          <option value="2">Bag</option> -->
        </select>
        </div>

        <div class="form-group">
            <label>Photo :</label>
            <input type="file" name="photo" class="form-control" placeholder="Enter Phone" required="required">
        </div>

        <div class="form-group">
            <label>Description :</label>
            <textarea class="form-control" name="description" rows="5"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Register">
        </div>

  </form>
  </div>
  </div>

  <div class="row">
        <div class="col-lg-10">
            <h2>Product Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                include('conn.php');
                $sql="SELECT p.*,c.name as categoryname FROM product p INNER JOIN category c ON p.categoryid=c.id Order by p.id desc";
                      $result=$conn->query($sql);
                      if( $result->num_rows >0){
                        $i=1;
                while ($row=$result->fetch_assoc()) {
                    
                      $id=$row['id'];
                      $name=$row['name'];
                      $price=$row['price'];
                      $categoryid=$row['categoryid'];
                      $categoryname=$row['categoryname'];
                      $description=$row['description'];
                      $photo=$row['photo'];
      echo "<tr><td>$i</td><td>$name</td><td>$price</td><td>$categoryname</td><td><img src='$photo' width=100px height=100px></td><td>$description</td>
      <td><a href='#' class='btn btn-info update' data-name='$name'  data-id='$id' data-price='$price' data-photo='$photo' data-description='$description' data-categoryid='$categoryid'> Update</a></td><td><a href='delete.php?id=$id&photo=$photo' class='btn btn-danger'>Delete</a></td></tr>";
      $i++;
      }

      }

                                  ?>
                </tbody>
            </table>
        </div>
    </div>


                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">
      $(document).ready(function(){

              $("#deletephoto").click(function(){
                  $("#photodiv").hide();
                  $("#photoupload").show();
              })


            $(".update").click(function(){

                $("#photodiv").show();
                $("#photoupload").hide();
                  name=$(this).data('name');
                  id=$(this).data('id');
                  price=$(this).data('price');
                  description=$(this).data('description');
                  photo=$(this).data('photo');
                  categoryid=$(this).data('categoryid');
                  $("select#categoryid").val(categoryid);

              //    alert(name + id + email + phone + photo );
                  $("#id").val(id);
                  $("#oldphoto").val(photo);
                  $("#name").val(name);
                  $("#price").val(price);
                  $("#description").val(description);
                  $("#showphoto").attr("src",photo);
                $("#myModal").modal('show');
            })
      });
    </script>

   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Product Information</h4>
      </div>
      <div class="modal-body">
      <form role="form" action="update.php" method="POST" 
              enctype="multipart/form-data">

            <input type="hidden" name="id" id="id" >
            <input type="hidden" name="oldphoto" id="oldphoto">
      <div class="form-group">
         <label>Name :</label>
         <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required="required">
      </div>
     <div class="form-group">
        <label>Price :</label>
        <input  type="number" name="price" id="price" class="form-control" placeholder="Enter Price" required="required">
    </div>

    <div class="form-group">
        <label>Category:</label>
        <select name="categoryid" id="categoryid" class="form-control">

        <?php
          include('conn.php');
          $sql="select * from category";
          $result=$conn->query($sql);
          while ($row=$result->fetch_assoc()) {
          $id=$row['id'];
          $name=$row['name'];
          echo "<option value='$id'>$name</option>";
          }
        ?>
        <!--   <option value="1">T Shirt</option>
          <option value="2">Bag</option> -->
        </select>
      </div>
      <div class="form-group">
          <label>Description :</label>
          <textarea class="form-control" name="description" id="description"></textarea>
      </div>

      <div id="photodiv" class="form-group">
         <img src="#" id="showphoto" width="100px" height="100px"> &nbsp;&nbsp;&nbsp;&nbsp;  <a href="#" id="deletephoto" class="btn btn-danger">Delete</a>
      </div>

      <div id="photoupload" class="form-group">
          <label>Photo :</label>
          <input type="file" name="photo"  class="form-control"  >
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-success" value="Register">
      </div>

    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

</body>

</html>
