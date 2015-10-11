<?php
	
	//php substr(string,start,length); 
	
	require_once('database.php');

	//this function is to skip any character you want from the csv enteries...
	function check_appro($str)
	{
		for ($i=0; $i<strlen($str); $i++){
   			if ($str[$i]=="`"){
       			$str[$i]='';
   						}

			}
				return $str;
	}
	//to read the csv file and insert into the database....
	function read_csv($db)
    {
        $query="INSERT into dishes(did,dname,resturant) values";
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
            $did=$db->mysqlready($temp[0]);
            $dname=$db->mysqlready($temp[1]);
            $dname=check_appro($dname);
            $rest=$db->mysqlready($temp[2]);
            $rest=check_appro($rest);
            $query.="($did,'$dname','$rest'),";

         }
         $fquery=substr($query, 0,-1);
         $fquery.=";";
         $status=$db->query($fquery);

            if(!$status)
            {
                return false;
            }
            else
            {
                return true;
            }
    }

		
	$flag=0;
	

	$query2="SELECT * from dishes where uploaded=0";

	$result=$db->query($query2);
	$fetched=mysqli_num_rows($result);

	if($fetched==0) // means table is empty or all photos are uploaded...
	{
		$check="SELECT * from dishes";
		$check_row=$db->query($check);
		$fetched=mysqli_num_rows($check_row);
		if($fetched==0)
		{
			//table is empty
			read_csv($db);
			$result=$db->query($query2);
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
	
		 	<h2>Dashboard</h2>
		 	<a href="upload_manual.php">Upload Images Manually...</a>
		 	<table class="table table-hover">
		 		<tr>
		 			<th>Dish</th>
		 			<th>Resturant</th>
		 			<th>Tags</th>
		 			<th>Select Image</th>
		 			<th>Submit</th>
		 		</tr>
		 	<?php 
		 	
		 			while($rs=mysqli_fetch_array($result))
		 			{
		 	
		 		 ?>
		 		 <form action="dash_up_multipe.php" method="post" enctype="multipart/form-data">
		 		<tr>
		 			<td><?php echo $rs['dname']; ?></td>
		 			<td><?php echo $rs['resturant']; ?></td>
		 			<td><input class="form-control" placeholder="tags" name="tags"></td>
		 			<td><input  name="upload[]" type="file" value="upload" multiple></td>
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


