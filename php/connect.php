<?php

$conn = mysqli_connect("localhost","root","","myhostel");


function alert($msg){
	echo '
		<script type="text/javascript">
			alert("'.$msg.'");
		</script>
	';
}
?>
