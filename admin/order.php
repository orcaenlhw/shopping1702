<!DOCTYPE html>
<html lang="en">

<?php
        include('head.php');
        include('ordertask.php');

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
                           Shooping Item Added Successfully!
                                      </div>";
                            }else if ($status==2){
                             echo "<div class='alert alert-info'>
                           Shooping Item Update Successfully!
                                      </div>"; 
                            }
                            else if ($status==3){
                             echo "<div class='alert alert-info'>
                           Shooping Item Delete Successfully!
                                      </div>"; 
                            }
                      
                      }
                 

                    ?>
                        <h1 class="page-header">
                          Order Form
                        </h1>

                   
                    </div>
                </div>



                <div class="row">
                  <div class="col-lg-12">
<?=$message?>
                  <form action="" method="POST" >
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>From </label>
  <div  class="input-group date" data-provide="datepicker" data-date="today" data-date-autoclose="true" data-date-format="dd-mm-yyyy" >
    <input type="text" class="form-control" name="start"  required="" id="today"> 
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
                      </div>
                      <div class="form-group">
                        <label>To </label>
  <div  class="input-group date" data-provide="datepicker" data-date="today" data-date-autoclose="true" data-date-format="dd-mm-yyyy" >
    <input type="text" class="form-control" name="end"  required=""> 
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
                      </div>

                      <button class="btn btn-success">Search</button>


                    </div>
                  </form>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Voucher Id</th>
                            <th>Order Date</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Order Detail</th>
                            <th>Status</th>
                          
                            <th colspan="3" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?=$table?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>

          </div>
          </div>
          </div>

          <script type="text/javascript">
            $(document).ready(function(){
              $('.updetail').click(function(){
                var vid=$(this).data('vid');
                // var DATA=new FormData();
                // DATA.append('vid',vid);
                $.ajax({
                  url:"orderdetail.php",
                  type:"POST",
                  data:{'vid':vid},
                  success:function(data){
                    $('#detaillist').html(data);
                  }
                })
                $('#detailmodal').modal('show');

              });
            });
          </script>
<div class="modal fade" id="detailmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a href="#" class="close" data-dismiss='modal'>&times;</a>
        <h2 class="modal-title">Order Detail</h2>
      </div> 
        <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Item </th>
                    <th>Item Quantity</th>
                    <th>Per Amount</th>
                    <th>Sub Amount</th>
                    <th>Photo</th>
                  </tr>
                </thead>
                <tbody id="detaillist">
                  
                </tbody>
              </table>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss='modal'>Close</button>
        </div>
    </div>
  </div>
</div>

          </body>
          </html>