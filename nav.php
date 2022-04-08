  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Online Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li >
                        <a href="#" class="showcart">My Cart <!-- <i class="glyphicon glyphicon-cart"></i> --></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="modal fade" id='addtocartmodal'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                    <h2 class="modal-title">My Cart</h2>
                </div>
                <div class="modal-body">
                    <div class="table-responsive"> 
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Per Amount</th>
                                <th>Photo</th>
                                <th>Sub Amount</th>
                                <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="cartlist">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" id='ordermodal'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                    <h2 class="modal-title">Order Form</h2>
                </div>
                <div class="modal-body">
                  <form action="addorder.php" method="POST"> 
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" required="">
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" required="">
                      </div>
                       <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phone" class="form-control" required="">
                      </div>
                      <div class="form-group">
                          <label>Address</label>
                       <textarea class="form-control" name="address" rows="3" required=""></textarea>
                      </div>
                      <button class="btn btn-success">Order</button>
                  </form>
                </div>
            </div>
        </div>
    </div> 
    <script type="text/javascript">
    function openorder(){
                $('#addtocartmodal').modal('hide');
                $('#ordermodal').modal('show');

    }
    function removecart(id){
          $.ajax({
            url:'carttask.php',
            type:'post',
            data:{'id':id,'remove':'true'},
            //processData:false,
            //contentType:false,
           //dataType:'json',
            success:function(data){
                    //alert(data);
                       $('#cartlist').html(data);
            }
        });
    }
    function changeqty(id,item){
      var qty=item.value;
      if(qty>10){
        item.value=10;
       qty=10;
      } 
      else if(qty < 1){
              item.value=1;
       qty=1;
      }
      // var Data=new FormData();
      // Data.append('id',id);
      // Data.append('qty',qty);
         $.ajax({
            url:'carttask.php',
            type:'post',
            data:{'id':id,'qty':qty},
            //processData:false,
            //contentType:false,
           //dataType:'json',
            success:function(data){
                    //alert(data);
                       $('#cartlist').html(data);
            }
        });
    }
        function cartlist() {
            $.get('carttask.php',function(data){
               alert(data);
                $('#cartlist').html(data);
            });
        }


        $(document).ready(function(){
            //cartlist();
            $('.showcart').click(function(){
                cartlist();
                $('#addtocartmodal').modal('show');
            })
        })
    </script>