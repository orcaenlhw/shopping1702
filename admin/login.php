<!DOCTYPE html>
<html lang="en">

<?php
        include('head.php');
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php
              //  include('nav.php');
      ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Login 
                        </h1>
                   
                    </div>
                </div>
                  <div class="row">
                    <div class="col-lg-4">

            <form role="form" action="check.php" method="POST"
              enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name :</label>
         <input type="text" name="name" class="form-control" placeholder="Enter Name" required="required">
                            </div>
                             <div class="form-group">
                                <label>Password :</label>
       <input  type="password" name="password" class="form-control" placeholder="Enter Email" required="required">
                            </div>
                            
                             <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Login">
                            </div>

                        </form>
                    </div>
            </div>

             

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

</body>

</html>
