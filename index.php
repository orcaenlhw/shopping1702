<!DOCTYPE html>
<html lang="en">

<?php
    include('head.php');
?>

<body>

    <!-- Navigation -->
  <?php
    include('nav.php');
  ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <?php
            include('side.php');
          ?>

<script type="text/javascript">
function addtocart(id){
$.get('addtocart.php?id='+id,function(data){
   // alert(data);
      if(data=="1"){
            alert("Success !");
      
      }else{
      alert("You Have Max Quantity For this Item");
      }
});
}

 function viewdetail2(event,id){
          //  id=$(this).data('id');
          //  alert(id);
          event.preventDefault();
            $.post("searchbyid.php",
            {
                id:id
            },function(data,status){
                alert(data+status);
                $(".searchresult").html(data);
            });
        }

    $(document).ready(function(){

        $(".viewdetail").click(function(){
            id=$(this).data('id');
          //  alert(id);
// $.ajax({
//     url:"",
//     type:'',
//     data:'',
//     dataType:'',
//     success:function(data){

//     }
// })
            $.post("searchbyid.php",
            {
                id:id
            },function(data,status){
               // alert(data+status);
                $(".searchresult").html(data);
            });
        });

       // $("#viewdetail2").click(function(){
       //      id=$(this).data('id');
       //    //  alert(id);

       //      $.post("searchbyid.php",
       //      {
       //          id:id
       //      },function(data,status){
       //          alert(data+status);
       //          $(".searchresult").html(data);
       //      });
       //  });


        $(".searchcategory").click(function(){
            categoryid=$(this).data('id');
            // alert(categoryid);

            //ages method
            $.post("searchbycategory.php",
            {
                categoryid:categoryid
            },
            function(data,status){
                // alert(data+"=>"+status);
                // $("#mydetail").html(data);
                $(".searchresult").html(data);
            }
                )
            }
            
        )
    });
</script>

            <div class="col-md-9 searchresult">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="image/1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <?php
                    include('product.php');
                ?>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

 

</body>

</html>
