<?php 

	include_once '../conn.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$data = array();
		$user_id = $_POST['user_id'];

	    $query = mysqli_query($conn, "SELECT *
			FROM recent_opens
			WHERE id IN (
			    SELECT MAX(id)
			    FROM recent_opens
			    where user_id = '$user_id'
			    GROUP BY video_id
			)
			ORDER BY id desc
			LIMIT 6");

		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}

		echo json_encode($data);
	}
 ?>
