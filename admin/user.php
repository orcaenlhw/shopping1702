<!DOCTYPE html>
<html>
<?php
include 'head.php';
?>
<body>
<div id="wrapper">
 <?php
 include 'nav.php';
 ?>
 
        <div id="page-wrapper">

            <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
    <div class="alert " style="display: none;" id="alert">
     <a href="#" id="closealert" class="close">&times;</a>
     <span id="alertmsg"></span>
    </div>
     <h1 class="page-header">User Form <button class="btn btn-success" id="adduser"><i class="fa fa-plus"></i></button> </h1>
    </div>
    <div class="col-lg-12">
     <div class="table-responsive">
      <table class="table table-bordered">
       <thead>
        <tr>
         <th>No</th>
         <th>Name</th>
         <th>Password</th>
         <th>Update</th>
         <th>Delete</th>
        </tr>
       </thead>
       <tbody id="userlist">
        
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>

</div>

<div class="modal fade" id="usermodal">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <a href="#" class="close" data-dismiss='modal'>&times;</a>
    <h1 class="modal-title" id="title"></h1>
   </div>
   <div class="modal-body">
    <form id="userform"> 
     <input type="hidden" name="userid" id="userid">
     <div class="form-group">
      <label for="name">User Name</label>
      <input type="text" name="name" id="name" class="form-control" required="" >
     </div>
     <div class="form-group">
      <label for="password">User Password</label>
      <input type="text" name="password" id="password" class="form-control" required="" >
     </div>
     <button class="btn btn-success" value="" id="status">Submit</button>
    </form>
   </div>
   <div class="modal-footer">
    <button class="btn btn-default" data-dismiss='modal'>Close</button>
   </div>

  </div>
 </div>
</div>
<script type="text/javascript">
 function updateuser(id,name,password){
$('#userid').val(id);
$('#name').val(name);
$('#password').val(password);
$('#status').val("edituser");
$('#usermodal').modal('show');
 }
 function getuserlist(){
  $.get("usertask.php",function(data){
   $('#userlist').html(data);
  });
 }
 function deleteuser(id){
  var com=confirm("Are You Sure ?");
  if (com) {
$.get("usertask.php?deleteid="+id,function(data){
getuserlist();
$('#alert').addClass('alert-success');
$('#alert').removeClass('alert-danger');
$('#alertmsg').text(data);
$('#alert').show();

});
}
 }

 $(document).ready(function(){
  getuserlist();
  $('#adduser').click(function(){
   $('#title').text("Add New User");
   $('#status').val("adduser");
   $('#usermodal').modal('show');
  });
  $('#userform').submit(function(event){
   event.preventDefault();
   var id=$('#userid').val();
   var name=$('#name').val();
   var pass=$('#password').val();
   var status=$('#status').val();
   $.ajax({
    url:"usertask.php",
    type:"post",
    data:{'id':id,'username':name,'password':pass,'status':status},
    dataType:'json',
    success:function(data){
     getuserlist();
     $('#usermodal').modal('hide');
     if (data.status==0) {
      $('#alert').addClass('alert-danger');
      $('#alert').removeClass('alert-success');
      $("#alert").show();
     }else{
      //$('#userform')[0].reset();
      $('#alert').removeClass('alert-danger');
      $('#alert').addClass('alert-success');
      $("#alert").show();
     }
     $('#alertmsg').text(data.message);
    }
   });
  })

$('#closealert').click(function(){
$('#alert').hide('slow');
});

 })

</script>

</body>
</html>