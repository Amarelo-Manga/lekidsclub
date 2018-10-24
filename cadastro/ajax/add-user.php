<?php 
function adicionar_user(){
	
	$nome 	= isset($_POST['nome_completo']) ? $_POST['nome_completo'] : null;
	$email 	= isset($_POST['email']) ? $_POST['email'] : null;
	$whats 	= isset($_POST['whatsapp']) ? $_POST['whatsapp'] : null;
	$card 	= isset($_POST['numero_cartao']) ? $_POST['numero_cartao'] : null;
	$cep 	= isset($_POST['cep']) ? $_POST['cep'] : null;
	$numero 	= isset($_POST['numero']) ? $_POST['numero'] : null;
	$endereco 	= isset($_POST['endereco']) ? $_POST['endereco'] : null;
	$complemento 	= isset($_POST['complemento']) ? $_POST['complemento'] : null;
	$cidade 	= isset($_POST['cidade']) ? $_POST['cidade'] : null;
	$estado 	= isset($_POST['estado']) ? $_POST['estado'] : null;
	$pass 	= isset($_POST['senha']) ? $_POST['senha'] : null;
	$avatar = isset($_POST['avatar']) ? $_POST['avatar'] : null;

	$email_exists = email_exists( $email );
	if ( $email_exists == false ) {

		//Add User
		$user_id = wp_insert_user( 
			$userdata = array(
		    'user_login'     =>  strtolower(str_replace(' ','_',$nome)),
		    'user_email'     =>  $email,
		    'user_pass'   	 =>  $pass,
		    'display_name'   =>  $nome ,
		    'role'			 =>  'subscriber'
		) );

		//Login User
		wp_set_current_user($user_id); // set the current wp user
    	wp_set_auth_cookie($user_id); // start the cookie for the current registered user

		//Add post by user
		$post_id = wp_insert_post( array(
	        'post_title'        => $nome,
	        'post_status'       => 'publish',
	        'post_type'			=> 'criancas',
	        'post_author'       => $user_id,
	        'tax_input'			=> array( $estado )
	    ) );

		//update estado
		wp_set_object_terms( $post_id, $estado, 'estado');

		//Update Fields
		update_field( 'numero_leclub', $card, $post_id );
		update_field( 'email', $email, $post_id );
		update_field( 'whatsapp', $whats, $post_id );
		update_field( 'cep', $cep, $post_id );
		update_field( 'endereco', $endereco, $post_id );
		update_field( 'numero_endereco', $numero, $post_id );
		update_field( 'complemento', $complemento, $post_id );
		update_field( 'cidade', $cidade, $post_id );
		update_field( 'avatar', $avatar, $post_id );
		update_field( 'id_user', $user_id, $post_id );

		echo json_encode($post_id);
		die;
	} else {
		echo json_encode("inscrito");
		die;
	}
};