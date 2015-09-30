<?php 

	function read_csv()
	{
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
			if($status)
			{
				echo "row inserted";
			}
		}

	}

	//call this to read file...
	//read_csv();
	$temp=array();
	$flag=0;
	$conn=mysqli_connect('localhost','root','','dashboard') or die('fatal!!');

	
	$query2="SELECT * from dishes where uploaded=0";

	$result=mysqli_query($conn,$query2);
	

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
		 	
		 		if($flag==0)//no use of this...
		 			{	
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
		 			$flag=1;
		 		    }
		 		 ?>
		 	</table>
		 	

		</div>
</body>
</html>


