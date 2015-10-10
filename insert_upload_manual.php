<?php 
	$up=0;
	$qname="";
		require_once('database.php');
		if(isset($_POST['submit']) && !empty($_FILES['upload']))
		{

			$dish=$db->mysqlready($_POST['dish_name']);
			$rest=$db->mysqlready($_POST['rest_name']);
			$tags=$db->mysqlready($_POST['tags']);
			$count=count($_FILES['upload']['name']);
				//$id=$_POST['id'];
				for($i=0;$i<$count;$i++)
				{
					$name=$_FILES['upload']['name'][$i];
					$tmp=$_FILES['upload']['tmp_name'][$i];
					$path=path_to_save_image.$name;
					//echo $path;
					if(move_uploaded_file($tmp, $path))
					{
						$up++;
					}
					$qname.=$name.",";
				}
				$qname=substr($qname,0,-1);
				$qname=$db->mysqlready($qname);
			$check="SELECT did,uploaded from dishes where dname='$dish' and resturant='$rest'";
			$res_check=$db->query($check);
			$fetched=mysqli_num_rows($res_check);
			//existing....
			if($fetched>0)
			{

				$temp=mysqli_fetch_array($res_check);
				$up=$temp['uploaded']+1;
				$id=$temp['did'];
				$query1="UPDATE dishes set dimage=concat(dimage,',$qname'),
				tags=concat(tags,',$tags'),uploaded=$up where did=$id";
				if($db->query($query1))
				{
					header("Location:upload_manual.php");
				}
				else
				{
					echo "ERROR!!";
				}
			}
			//new record....
			else
			{
				$query2="INSERT into dishes(dname,resturant,dimage,tags,uploaded) 
				VALUES('$dish','$rest','$qname','$tags',$count)";
				if($db->query($query2))
				{
					header("Location:upload_manual.php");
				}
				else
				{
					echo "ERROR";
				}
			}


		}

 ?>

<!--  if(isset($_POST['submit']))
		{
			if(!empty($_FILES['upload']))
			{
				$count=count($_FILES['upload']['name']);
				$id=$_POST['id'];
				for($i=0;$i<$count;$i++)
				{
					$name=$_FILES['upload']['name'][$i];
					$tmp=$_FILES['upload']['tmp_name'][$i];
					$path=path_to_save_image.$name;
					echo $path;
					if(move_uploaded_file($tmp, $path))
					{
						$up++;
					}
					$qname.=$name.",";
				}
				$qname=substr($qname,0,-1);
				$qname=$db->mysqlready($qname);
				if($up==$count)
				{
					$query="UPDATE dishes set uploaded=$count,dimage='$qname' where did=$id";
					$res=$db->query($query);
					if($res)
					{
						header("Location:dash.php");
					}
					else
					{
						echo "problem in storing in database";
					}
				}
				else
				{
					echo "problem in image uploading";
				}
			}
			 -->