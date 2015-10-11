<?php 
	
	require_once('database.php');
	$did=$db->mysqlready($_GET['did']);
	$query="SELECT dname,resturant,tags from dishes where did=$did";
	$result=$db->query($query);
	$check=mysqli_num_rows($result);
	if($check>0)
	{
		$temp=mysqli_fetch_array($result);
		$dname=$temp['dname'];
		$resturant=$temp['resturant'];
		$tags=$temp['tags'];
		$to_send = array('state' => '1','dname' => $dname,
						  'resturant' => $resturant,'tag' => $tags);
		//echo '"'.implode('","', $to_send).'"';
		$to_send=json_encode($to_send);
		echo $to_send;
	}
	else
	{
		$to_send = array('state' => '0');
		echo json_encode($to_send);
	}


 ?>