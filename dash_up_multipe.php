<?php 
		require_once('database.php');

		$qname="";
		$i=0;
		$up=0;

		if(isset($_POST['submit']))
		{
			if(!empty($_FILES['upload']))
			{
				$count=count($_FILES['upload']['name']);
				$id=$_POST['id'];
				for($i=0;$i<$count;$i++)
				{
					$name=$_FILES['upload']['name'][$i];
					$tmp=$_FILES['upload']['tmp_name'][$i];
					$dir=path_to_save_image.$id;
					if(!is_dir($dir))
					{
						mkdir($dir,0777,true);
					}
					$path=$dir."/".$name;
					echo $path;

					if(move_uploaded_file($tmp, $path))
					{
						$up++;
					}
					$qname.=$name.",";
				}
				$qname=substr($qname,0,-1);
				$qname=$db->mysqlready($qname);
				$tags=$db->mysqlready($_POST['tags']);
				if($up==$count)
				{
					$query="UPDATE dishes set uploaded=$count,dimage='$qname',tags='$tags' where did=$id";
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
			


		}
 ?>