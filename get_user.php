<?php
	session_start();
	if (!isset($_SESSION['phone_number'])) {
		http_response_code(401);
		echo json_encode(array('error' => "Not logged in"));
		exit();
	}
	echo json_encode(array('user'=> $_SESSION));
?>
