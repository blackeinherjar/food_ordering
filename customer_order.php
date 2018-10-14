<!DOCTYPE html>
<html>

<?php 	
	
	$i=1;
	$x=1;
	include 'navbar.php';

	$user_id = $_SESSION['user_id'];

	$sql_order = "SELECT * FROM orders WHERE `status` = 'pending'";

	$result_order = mysqli_query($conn,$sql_order);




	$sql_order_close = "SELECT * FROM orders WHERE `status` = 'close'";

	$result_order_close = mysqli_query($conn,$sql_order_close);



?>



<body>


<div class="container" >
  
               
    	<h4><i style="color:#008000">Pending Order</i></h4>
  <table class="table">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Shipping Address</th>
        <th>Total Price</th>
        <th>Order Date</th>
          <th>Status</th>
          <th>Action</th>

      </tr>
    </thead>
    <tbody>



      <?php while ($row = mysqli_fetch_assoc($result_order)){   ?>
      <tr>
		
		<td><?php echo $i ?></td>
	   	<td hidden><?php echo $row['id']?></td>
	   	<td><?php echo $row['first_name']?></td>
		<td><?php echo $row['last_name']?></td>
		<td><?php echo $row['shipping_address']?></td>
        <td>RM <?php echo $row['total_price']?></td>
        
		<td><?php echo $row['date']?></td>


         <td style="color:red"><i><?php echo $row['status']?></i></td>
                 <td>

                <a class="approve" href="">Approve</a>
                <form name="approveForm" action="approve.php" method="GET" hidden> 
                    <input name="id" type="text" value="<?php echo $row['id']?>">
               </form>
               </td>

		</tr>
		<?php $i++; ?>
	   <?php }?>


   
     
    </tbody>
  </table>



<button class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#closeOrder" >
    Show Complete
  </button>



<div class="collapse" id="closeOrder" style="padding-top:30px ">

    	<h4><i style="color:#B22222">Close Order</i></h4>
  <table class="table">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Shipping Address</th>
        <th>Total Price</th>
        <th>Order Date</th>
      </tr>
    </thead>
    <tbody>


       <?php while ($row = mysqli_fetch_assoc($result_order_close)){   ?>
     
        <tr>
  			<td><?php echo $x ?></td>
  	   <td hidden><?php echo $row['id']?></td>
  	   <td><?php echo $row['first_name']?></td>
  		<td><?php echo $row['last_name']?></td>
  		<td><?php echo $row['shipping_address']?></td>
          <td>RM <?php echo $row['total_price']?></td>
          
  		 <td><?php echo $row['date']?></td>
  		</tr>
  		<?php $x++ ?>
	   <?php }?>


   
     
    </tbody>
  </table>
 
</div>




 












</div>


<script type="text/javascript">
    
     $('.approve').click(function(e)
    {
        $.Event(e).preventDefault();
        $(this).siblings('form').submit();
    });



     $('[name="approveForm"]').submit(function(e)
{
    $.Event(e).preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: $(this).serialize(),
        dataType: 'JSON',
    }).done(function(data)
    {
               
        
            new Noty({          
                type: data.status,
                text: data.msg,            
                timeout: 1000
            }).show();

           
         setTimeout(function()
                {
                    
                        window.location = "customer_order.php";
                    

                    
                }, 1000);
  
    })
});




</script>







</body>

</html>