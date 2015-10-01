<?php 

	$conn=mysqli_connect('localhost','root','','dashboard') or die('fatal!!');

	function read_csv()
	{
		global $conn;
		$temp=array();
		$handle=fopen('sample.csv', 'r');
			if(!$handle)
			{
				echo "error";
			}

		$temp=fgetcsv($handle);//skip the heading...

		while(!feof($handle))
		{
			$temp=fgetcsv($handle);
			$dname=$temp[1];
			$rest=$temp[2];
			$query1="INSERT into dishes(dname,resturant) values('$dname','$rest')";
			$status=mysqli_query($conn,$query1);
			if(!$status)
			{
				echo "problem";
				//return false;
			}
		}
		return True;

	}
		
	$flag=0;
	

	$query2="SELECT * from dishes where uploaded=0";

	$result=mysqli_query($conn,$query2);
	$fetched=mysqli_num_rows($result);

	if($fetched==0) // means table is empty or all photos are uploaded...
	{
		$check="SELECT * from dishes";
		$check_row=mysqli_query($conn,$check);
		$fetched=mysqli_num_rows($check_row);
		if($fetched==0)
		{
			//table is empty
			read_csv();
			$result=mysqli_query($conn,$query2);
		}
		//all photos are uploaded...
		else
		{
			echo "all photos done...";
		}
		
	}
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>dash board</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
		<div class="container">
		 	<h3>Dashboard</h3>
		 	
		 	<table class="table table-hover">
		 		<tr>
		 			<th>Dish</th>
		 			<th>Resturant</th>
		 			<th>Select Image</th>
		 			<th>Submit</th>
		 		</tr>
		 	<?php 
		 	
		 			while($rs=mysqli_fetch_array($result))
		 			{
		 	
		 		 ?>
		 		 <form action="dash_up.php?id=<?php echo $rs['did']; ?>" method="post" enctype="multipart/form-data">
		 		<tr>
		 			<td><?php echo $rs['dname']; ?></td>
		 			<td><?php echo $rs['resturant']; ?></td>
		 			<td><input  name="upload" type="file" value="upload"></td>
		 			<td><input class="btn btn-primary" type="submit" value="submit" name="submit"></td>
		 			<input type="hidden" value="<?php echo $rs['did']; ?>" name="id">
		 		</tr>
		 		</form>
		 		<?php 
		 			}
		 		
		 		 ?>
		 	</table>
		 	

		</div>
</body>
</html>


