$(document).ready(function() {

	$("#did").on('input',function() {

		var temp=$(this).val();
		$.ajax({

			url:'/dashboard/ajax_called.php',
			data:'did='+temp,
			dataType: 'json',
			success:function(data)
			{
				var status=data.state;
				if(status==='1')
				{
					
					var dname=data.dname;
					var resturant=data.resturant;
					var tags=data.tag;
					$("#dish").val(dname).prop("readonly",true);
					$("#resturant").val(resturant).prop("readonly",true);
		
					if(tags=="")
					{
						$("#tags").val("").prop("readonly",false);
					}
					else
					{
						$("#tags").val(tags);
					}
					
				}
				else
				{
					$("#dish").val("").prop("readonly",false);
					$("#resturant").val("").prop("readonly",false);
					$("#tags").val("");
				}
				
			}
		});

	});
});