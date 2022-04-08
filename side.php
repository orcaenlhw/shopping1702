  <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
        <?php
        
        include('admin/conn.php');
		$sql="select * from category";
		$result=$conn -> query($sql);

        while ($row=$result->fetch_assoc()){
            $id=$row['id'];
        	$name=$row['name'];
			echo"<a href='#' data-id='$id' class='list-group-item searchcategory'>$name</a>";
		}

		?>
        </div>
</div>


