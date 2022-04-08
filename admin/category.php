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
                           Shooping Category Added Successfully!
                                      </div>";
                            }else if ($status==2){
                             echo "<div class='alert alert-info'>
                           Shooping Category Updated Successfully!
                                      </div>"; 
                            }
                      
                      }
                 

                    ?>
                        <h1 class="page-header">
                            Category Registration Form
                        </h1>
                   
                    </div>
                </div>
                  <div class="row">
                    <div class="col-lg-4">

              <form role="form" action="addcategory.php" method="POST" 
              enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name :</label>
         <input type="text" name="name" class="form-control" placeholder="Enter Name" required="required">
                            </div>
 
                             <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Register">
                            </div>

                        </form>
                    </div>
            </div>

              <div class="row">
                    <div class="col-lg-10">
                        <h2>Category Table</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php
                include('conn.php');
                $sql="SELECT * FROM category";
                      $result=$conn->query($sql);
                      if( $result->num_rows >0){
                        $i=1;
                while ($row=$result->fetch_assoc()) {
                    
                      $id=$row['id'];
                      $name=$row['name'];
                  
      echo "<tr><td>$i</td><td>$name</td>
      <td><a href='#' class='btn btn-info update' data-name='$name'  data-id='$id'> Update</a></td></tr>";
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
        <h4 class="modal-title">Update Category Information</h4>
      </div>
      <div class="modal-body">
      <form role="form" action="updatecategory.php" method="POST" 
              enctype="multipart/form-data">

            <input type="hidden" name="id" id="id" >
            <div class="form-group">
              <label>Name :</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required="required">
                         
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
