<?php
$conn = mysqli_connect("xxx", "xxxx", "xxxx", "xxx");
if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
	{	
	$output = array();
	$query = "SELECT * FROM tbl_user";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0 ){
	while($row = mysqli_fetch_array($result)) {
	$output[] = $row;
	}
	echo json_encode($output);
	}
	}
?>