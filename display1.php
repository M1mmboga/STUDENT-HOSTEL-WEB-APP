<?php 

session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"myhostel");

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="styles1.css">
        <?php include('links.php'); ?>
</head>
<body>

<?php include './admin-nav.php'; ?>    
<p class="lead" style="color:black; font-size: 200%; text-align: center;">All accomodations listed</p>

<!-- just display all available places-->
<div class="products">
<table class="table">
<?php
//Echo all table data 
$res=mysqli_query($link,"select * from products order by id DESC");
while($row=mysqli_fetch_array($res))
{
?>
<!--php to display to house side -->
	<tr>
            <td><p style="color:black; "><?php echo $row["house_name"];?></p></td>
            <td><input type="button" name="view" value="View" id="<?php echo $row["id"];?>" class="btn btn-info btn-xs view_data"/></td>
	</tr>
<?php 
}
?>
</table>
</div>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-lg">
            <div class="modal-content" style="color: black; width:100%;">
                <div class="modal-header">
                        <h2 style="text-align: left;">House Details</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="products_modal">		

                </div>
            </div>
        </div>
</div>

<script>
	$(document).ready(function()
	{
		$('.view_data').click(function()
		{
			var house_id = $(this).attr("id");
			$.ajax({
				url:"select.php",
				method:"post",
				data:{house_id:house_id},
				success:function(data)
				{
                                    $('#products_modal').html(data);
                                    $('#dataModal').modal("show");
				}
			});

		});	


		$(document).on('click', '.delete_data', function()
		{
			var house_id = $(this).attr("id");
			var house_name = $("#house_name").val();

			var deleteConfirm = confirm("Delete "+house_name+" ?");

			if(deleteConfirm == true){
				 deleteHouse(house_id);
			}
		});




			function showProducts(){
                            $.ajax({
                                    url:"php/get-products.php",
                                    method:"post",
                                    data:{house_id:house_id},
                                    success:function(data)
                                    {
                                            alert(data);
                                    }
                            });
			}	


			function deleteHouse(house_id){
                            $.ajax({
                                url:"deletehouse.php",
                                method:"post",
                                data:{house_id:house_id},
                                success:function(data)
                                {
                                        alert(data);
                                        location.reload();
                                }
                            });
			}
	});
</script>
<!-- website footer-->
	<footer style="height: 120px;">
		<p>HOME | ABOUT | SERVICES | CONTACT US | LOGIN</p>
				<p>Contact us : myhostelaccommodation@gmail.com</p>
		<p><b>Copyright &copy; 2018. Accommodation</b> </p>
	</footer>
</body>
</html>
