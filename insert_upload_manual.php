<?php 
	$up=0;
	$qname="";
		require_once('database.php');
		if(isset($_POST['submit']) && !empty($_FILES['upload']))
		{
			$count=count($_FILES['upload']['name']);
			$dish=$db->mysqlready($_POST['dish_name']);
			$rest=$db->mysqlready($_POST['rest_name']);
			$tags=$db->mysqlready($_POST['tags']);
			$check="SELECT did,uploaded from dishes where dname='$dish' and resturant='$rest'";
			$res_check=$db->query($check);
			$fetched=mysqli_num_rows($res_check);
			//existing....
			if($fetched>0)
			{

				$temp=mysqli_fetch_array($res_check);
				$id=$_POST['did'];
				//check...and upload
				for($i=0;$i<$count;$i++)
				{
					$name=$_FILES['upload']['name'][$i];
					$tmp=$_FILES['upload']['tmp_name'][$i];
					$path=path_to_save_image.$id."/".$name;
					//echo $path;
					if(move_uploaded_file($tmp, $path))
					{
						$up++;
					}
					$qname.=$name.",";
				}
				$qname=substr($qname,0,-1);
				$qname=$db->mysqlready($qname);
				$upload=$temp['uploaded']+$count;
				$query1="UPDATE dishes set dimage=concat(dimage,',$qname'),
				tags=concat(tags,',$tags'),uploaded=$upload where did=$id";
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
				$qname="";
				$count=count($_FILES['upload']['name']);
				$id=$db->mysqlready($_POST['did']);
				for($i=0;$i<$count;$i++)
				{
					$name=$_FILES['upload']['name'][$i];
					$qname.=$name.",";
				}
				$qname=substr($qname,0,-1);
				$qname=$db->mysqlready($qname);

				$query2="INSERT into dishes(did,dname,resturant,dimage,tags,uploaded) 
				VALUES($id,'$dish','$rest','$qname','$tags',$count)";
				
				if($db->query($query2))
				{
					$cdir=path_to_save_image.$id;
					if(!is_dir($cdir))
					{
						mkdir($cdir,0777,True);
					}

					//pasted here
						$up=0;
						for($i=0;$i<$count;$i++)
						{
							$tmp=$_FILES['upload']['tmp_name'][$i];
							$name=$_FILES['upload']['name'][$i];
							$path=$cdir."/".$name;
							if(move_uploaded_file($tmp, $path))
							{
								$up++;
							}
						}
						if($up==$count)
						{
							header("Location:upload_manual.php");
						}
						else
						{
							echo "photos not uploaded";
						}
				
					
				}
				else
				{
					echo "ERROR";
				}
			}


		}

 ?>