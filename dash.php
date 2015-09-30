<?php 

	$temp=array();
	$flag=0;
	$conn=mysqli_connect('localhost','root','','dashboard') or die('fatal!!');
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
		// $query1="INSERT into dishes(dname,resturant) values('$dname','$rest')";
		// $status=mysqli_query($conn,$query1);
		// if($status)
		// {
		// 	echo "row inserted";
		// }
	}

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
		 	<form action="dash.php" method="get" enctype="multipart/formdata">
		 	<table class="table table-hover">
		 		<tr>
		 			<th>Dish</th>
		 			<th>Resturant</th>
		 			<th>Select Image</th>
		 			<th>Submit</th>
		 		</tr>
		 	<?php 
		 	
		 		if($flag==0)
		 			{	
		 			while($rs=mysqli_fetch_array($result))
		 			{
		 	//&tname=<?php echo $_FILES['upload']['tmp_name'];
		 		 ?>

		 		<tr>
		 			<td><?php echo $rs['dname']; ?></td>
		 			<td><?php echo $rs['resturant']; ?></td>
		 			<td><input  name="upload<?php echo $rs['did']; ?>" type="file" value="upload"></td>
		 			<td><a class="btn btn-default" name="submit" href="dash.php?id=<?php echo $rs['did']; ?>">
		 			Submit</a></td>
		 		</tr>
		 		<?php 
		 			}
		 			$flag=1;
		 		    }
		 		 ?>
		 	</table>
		 	</form>

		</div>
</body>
</html>

<?php 
	
	if(isset($_GET['id']))
	{
		$name="upload".$_GET['id'];

		if(empty($_FILES[$name]))
		{
			echo "string";
		}
	}

 ?>

