<?php 
function editar_cadastro(){
	
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
	$avatar = isset($_POST['avatar']) ? $_POST['avatar'] : null;
	$postId = isset($_POST['idPost']) ? $_POST['idPost'] : null;

	//Updade Post
	$post = array(
	      'ID'           => $postId,
	      'post_title'   => $nome,
	      'post_content' => ''
	);
	wp_update_post( $post );
	
	//update estado
	wp_set_object_terms( $postId, $estado, 'estado');

	//Update Fields
	update_field( 'email', $email, $postId );
	update_field( 'whatsapp', $whats, $postId );
	update_field( 'numero_leclub', $card, $postId );
	update_field( 'cep', $cep, $postId );
	update_field( 'endereco', $endereco, $postId );
	update_field( 'numero_endereco', $numero, $postId );
	update_field( 'complemento', $complemento, $postId );
	update_field( 'cidade', $cidade, $postId );
	update_field( 'avatar', $avatar, $postId );
	update_field( 'id_user', $user_id, $postId );

	echo json_encode($postId);
	die;
};