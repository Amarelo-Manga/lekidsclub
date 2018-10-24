<?php 
//teste
function adicionar_crianca(){
	$nome_crianca 	= isset($_POST['nome_crianca']) ? $_POST['nome_crianca'] : null;
	$data_nasc 		= isset($_POST['data_nasc']) ? $_POST['data_nasc'] : null;
	$genero 		= isset($_POST['genero']) ? $_POST['genero'] : null;
	$idPost 		= isset($_POST['idPost']) ? $_POST['idPost'] : null;

	for ($i = 0; $i < count($nome_crianca); $i++) {
		$value[] = array(
		        "nome"		=> $nome_crianca[$i],
		        "data_nasc"	=> $data_nasc[$i],
		        "genero"	=> $genero[$i],
		    );
	}
	update_field( "crianca", $value, $idPost);

	echo json_encode('ok');
	die;
};