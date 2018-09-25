<table border="1">
			<tr>
			            <th>House Name</th>
						<th>House Price</th>
						<th>Number of rooms</th>
						<th>Image</th>
						<th>Category</th>
						<th>House Description</th>

		</tr>
<?php

$conn=mysqli_connect("localhost","root","","myhostel");
$set=$_POST['search'];
if($set)
{
	$show="select * from products ";
	$result=mysqli_query($conn,$show);

	while($rows = mysqli_fetch_array($result))
	{
		echo  "<tr>";
		
				echo  "<td>";
				echo $rows['house_name'];
				echo  "</td>";

				echo  "<td>";
				echo $rows['house_price'];
				echo  "</td>";



				echo  "<td>";

echo $rows['numberofrooms'];
						echo  "</td>";


				echo  "<td>";

				echo $rows['image'];
						echo  "</td>";



echo  "<td>";

				echo $rows['category'];
						echo  "</td>";


				echo  "<td>";

				echo $rows['house_decription'];
						echo  "</td>";

				echo  "<td>";

				
		echo "<br>";
	}
}
?>
</table>