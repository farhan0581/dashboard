<?php 

		$conn=mysqli_connect('localhost','root','','dashboard') or die('fatal!!');

		if(isset($_POST['submit']))
		{
			if(!empty($_FILES['upload']))
			{
				$id=$_POST['id'];
				$name=$_FILES['upload']['name'];
				$type=pathinfo($name, PATHINFO_EXTENSION);
				$rename = $id.".".$type;
				$tmp=$_FILES['upload']['tmp_name'];
				$path='C:\xampp\htdocs\dashboard\images\\'.$rename;
				if(move_uploaded_file($tmp, $path))
				{
					$query="UPDATE dishes set uploaded=1,dimage='$type' where did=$id";
					$res=mysqli_query($conn,$query);
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