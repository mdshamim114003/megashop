<?php

	session_start();
	ob_start();

	// db_server, db_user, db_password, db_name
	$conn = mysqli_connect('localhost', 'root', '', 'megashop');

	// if ($conn) {
	// 	echo "Connected";
	// }else{
	// 	echo "Not Connected";
	// }

	if(!$conn){
		echo "Not Connected";
	}

?>