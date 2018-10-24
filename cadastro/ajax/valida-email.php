<?php 
function valida_email(){
	$email 	= isset($_POST['email']) ? $_POST['email'] : null;
	$email_exists = email_exists( $email );
	if ( $email_exists === false ) {
		echo json_encode("naoinscrito");
		die;
	} else {
		echo json_encode("inscrito");
		die;
	};
};