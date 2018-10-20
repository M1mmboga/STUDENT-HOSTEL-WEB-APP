<?php 

include 'connect.php';

$res=mysqli_query($conn,"select * from products order by id DESC");

$data="";

while($row = mysqli_fetch_array($res))
{

	$data.='
	<table class="table">
	<tr>
		<td>
	  	<p style="color:black;">'.$row["house_name"].'</p>
		<td><input type="button" name="view" value="View" id="'.$row["id"].'" class="btn btn-info btn-xs view_data"/></td>
		<td><input type="button" name="view" value="Edit" id="'.$row["id"].'"  class="btn btn-warning btn-xs edit_data"/></td>
		<td><input type="button" name="view" value="Delete" id="'.$row["id"].'"  class="btn btn-danger btn-xs delete_data"/></td>
		</tr>
 	</table>
	';

}

$data.='</td>
		</tr>
		</table>';

		echo $data;
?>



