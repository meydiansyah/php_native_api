<?php 

	include_once '../conn.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$data = array();
		$user_id = $_POST['user_id'];
		$type = $_POST['type'];


	    $query = mysqli_query($conn, "SELECT * FROM favorite WHERE type = '$type' and user_id = '$user_id' ORDER BY created_at DESC");

		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}

		echo json_encode($data);
	}
 ?>
