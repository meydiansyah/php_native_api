<?php 
	include '../conn.php';


    if($_SERVER['REQUEST_METHOD'] == "POST"){
	    $response = array();

	    $type = mysqli_real_escape_string($conn, $_POST['type']);
	    $typeId = mysqli_real_escape_string($conn, $_POST['type_id']);
	    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
	    

	    $res_typeId = mysqli_fetch_array(mysqli_query($conn, "select type_id from favorite where type_id = '$typeId' && user_id = '$userId' "));


    	if(isset($res_typeId)) {
    		$response['value'] = 2;
	    	$response['message']= ' is already saved';
	    	echo json_encode($response);
    	} else {
			$query = "INSERT INTO favorite VALUES (NULL, '$type', '$typeId', '$userId', NOW())";

    		$results = mysqli_query($conn, $query);

		    if($results > 0){
		        $response['value'] = 0;
		        $response['message'] = ' berhasil ditambahkan ke favorite';
		        echo json_encode($response);

		    } else{
	            $response['value'] = 1;
	            $response['message'] = "Coba ulangi !";
	            echo json_encode($response);
		    }	
    	}
    }

 ?>