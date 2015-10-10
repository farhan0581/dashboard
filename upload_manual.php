 <?php 

	require_once('database.php');

	$query1="SELECT  DISTINCT dname from dishes";
	$query2="SELECT DISTINCT resturant from dishes";
	$res1=$db->query($query1);
	$res2=$db->query($query2);
	$dish=array();
	$rest=array();
	while($result=mysqli_fetch_array($res1))
	{
		$dish[]=$result[0];
	}
	while($result=mysqli_fetch_array($res2))
	{
		$rest[]=$result[0];
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
<meta charset="utf-8">
 <title>upload manual</title>
 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script type="text/javascript">
$(function() {

	var js_array1 = [<?php echo '"'.implode('","', $rest).'"' ?>];
	var js_array2=   [<?php echo '"'.implode('","', $dish).'"' ?>];
	$( "#dish" ).autocomplete({
	source: js_array2,
	messages: {
        noResults: '',
        results: function() {}
    }

	});
	$("#resturant").autocomplete({
	source: js_array1,
	messages: {
        noResults: '',
        results: function() {}
    }

	});
});

</script>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/custom.css">
 </head>
 <body>
 	<div class="container">
 	<div class="jumbotron col-lg-7">
 		<h2>Upload Images Manually</h2>
 		<br>
 		<div class="col-lg-8">
 		<form action="insert_upload_manual.php" method="post" enctype="multipart/form-data">
 			<input class="form-control" placeholder="Dish Name" id="dish" name="dish_name">
 			<br>
 			<input class="form-control" placeholder="Resturant" id="resturant" name="rest_name">
 			<br>
 			<input class="form-control" placeholder="Tags..." name="tags">
 			<br>
 			<input type="file" value="upload" name="upload[]" multiple>
 			<br>
 			<input type="submit" value="submit" name="submit" class="btn btn-primary">
 		</form>
 		</div>
 	</div>
 	</div>
 </body>
 </html>
