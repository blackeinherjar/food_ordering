<!DOCTYPE html>
<html>

<?php 	
	
	$i=1;
	$x=1;
	include 'navbar.php';

	$user_id = $_SESSION['user_id'];

	$sql_order = "SELECT * FROM orders WHERE `user_id` = '$user_id' AND `status` = 'pending'";

	$result_order = mysqli_query($conn,$sql_order);




	$sql_order_close = "SELECT * FROM orders WHERE `user_id` = '$user_id' AND `status` = 'close'";

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

<!--         <td style="color:green"><h6><i>Processing</i></h6></td> -->
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







</body>

</html>