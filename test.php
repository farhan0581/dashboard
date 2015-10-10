<?php 
require_once('database.php');
$id=300;
$path=path_to_save_image;
	$dir=$path.$id;
	if(is_dir($dir))
		{
				echo "yes";		//
		}
		else
		{
			mkdir($dir,0777,true);
			echo "string";
		}
 ?>