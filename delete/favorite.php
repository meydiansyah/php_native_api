<?php 
	include '../conn.php';


    $response = array();

    $id = $_POST['id'];
    $userId = $_POST['user_id'];

    $query = "DELETE FROM favorite WHERE id = '$id' and user_id = '$userId' ";

	$results = mysqli_query($conn, $query);

    if($results){
        $response['value'] = 0;
        $response['message'] = ' berhasil dihapus';
        echo json_encode($response);

    } else{
        $response['value'] = 1;
        $response['message'] = "Proses gagal !";
        echo json_encode($response);
    }	


 ?>