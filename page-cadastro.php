<?php
/**
 * Template Name: Cadastro
 */
get_header(); ?>
<?php 
	$args = array(
	    'author'        => get_current_user_id(),
	    'post_type'		=> 'criancas',
	    'orderby'       => 'post_date',
	    'order'         => 'ASC',
	    'posts_per_page' => 1
    );
	$post = get_posts( $args );
	// echo "<pre>";
	// print_r( $post );
	// echo "</pre>";
	$postId = $post[0]->ID;
	$responsavel = $post[0]->post_title;
	$email 	= get_field('email', $postId );
	$leclub	= get_field('numero_leclub', $postId );
	$whats	= get_field('whatsapp', $postId );
	$avatar = get_field('avatar', $postId );
	$cep = get_field('cep', $postId );
	$endereco = get_field('endereco', $postId );
	$numero = get_field('numero_endereco', $postId );
	$complemento = get_field('complemento', $postId );
	$cidade = get_field('cidade', $postId );
	$estado = get_the_terms($postId, 'estado');
	$estado = $estado[0]->name;
	// echo "<pre>";
	// print_r( $estado );
	// echo "</pre>";
?>
<div id="cadastro" class="archives">
	<?php wp_get_current_user(); ?>
	<header class="<?php echo $avatar; ?>">
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
			<h3>Bem-Vindo<br /><span><?php echo $responsavel;?></span></h3>
			<h4>E-mail<span><?php echo $email?></span></h4>
			<h4>Cartão Le Club AccorHotels<span><?php echo $leclub?></span></h4>
			<h4>Whatsapp<span><?php echo $whats?></span></h4>
			<?php if( !empty($endereco) ){ ?>
				<h4>Endereço<span><?php echo $endereco .", ". $numero .", ". $complemento ."<br /> ". $estado .", ".  $cidade ." - ". $cep; ?></span></h4>
			<?php }//if Endereco ?>
			<button class="btn_verde editCadastro">Editar Dados</button>
			<button class="btn_verde">Alterar Senha</button>
		</div>
	</header>
	<div class="container-fluid content">
		<h3>Dados das Crianças</h3>
		<section>
		<form id="formCrianca" >
			<div class="row">
			<?php
				// check if the repeater field has rows of data
				if( have_rows('crianca', $postId ) ):
					$count = 1;
				    while ( have_rows('crianca', $postId ) ) : the_row();
						$nome_crianca = get_sub_field('nome');
						$data_nasc = get_sub_field('data_nasc');
						$genero = get_sub_field('genero');
					?>
					<article id="cri<?php echo $count; ?>" class="col-md-4 col-lg-4 crianca">
						<div class="row">
							<div class="col-md-7 col-lg-7">
								<h5>Nome <span class="nome"><?php echo $nome_crianca; ?></span></h5>
								<h5>Data de Nascimento <span class="idade"><?php echo $data_nasc; ?></span></h5>
								<h5>Gênero <span class="genero"><?php echo $genero; ?></span></h5>
							</div>
							<div class="col-md-5 col-lg-5">
								<button class="btn_verde editarCrianca">Editar Dados</button>
								<button class="excluiCrianca btn_rosa">Remover</button>
							</div>
						</div>
						<div class="form">
							<h4>Editar <?php echo $nome_crianca; ?></h4>
	                   		<div class="form-group">
							    <input type="text" class="required nome_crianca" name="nome_crianca[]" value="<?php echo $nome_crianca; ?>" />
							</div>
							<div class="form-group">
							    <input type="text" class="required data_nasc" name="data_nasc[]" value="<?php echo $data_nasc; ?>" />
							</div>
							<div class="form-group">
							    <input type="text" class="required genero" name="genero[]" value="<?php echo $genero; ?>" /> 
							</div>
	                   		<button type="submit" class="btn_verde">Confirmar</button>
	                   		<button class="btn_rosa cancelEdit">Cancelar</button>
						</div>
					</article>
				<?php
					$count++; 
					endwhile; 
				?>
			<?php endif; ?>
			</div>
			<input type="hidden" id="idPost" name="idPost" value="<?php echo $postId; ?>" />
		</form>
			<div class="col-md-12 col-lg-12 ">
				<button class="btn_verde" id="add_crianca">Adicionar mais uma criança</button>
				<a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn_rosa">Sair</a>
			</div>
			<article class="criancaHide col-md-4 col-lg-4 criancaadd">
           		<h4>Criança</h4>
           		<div class="form-group">
				    <input type="text" class="required nome_crianca" name="nome_crianca[]"  placeholder="Nome Completo">
				</div>
				<div class="form-group">
				    <input type="text" class="required data_nasc" name="data_nasc[]"  placeholder="Data de Nascimento">
				</div>
				<div class="form-group">
				    <input type="text" class="required genero" name="genero[]"  placeholder="Gênero">
				</div>
				<button type="submit" class="btn_verde">Confirmar</button>
	            <button type="button" class="btn_rosa cancelAdd">Cancelar</button>
            </article>
		</section>
	</div>
</div>
<div class="modal fade modal-shortcode" id="modalMensagem" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="contentModal">
            	
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-shortcode" id="modalEditCadastro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="formEdit">
            <div class="row">
            	<div class="col-sm-5 col-md-5 cadastro">
            		<h3>Alterar dados do associado<br />Le Club AccorHotels:</h3>
					<div class="form-group">
				        <input type="text" class="required desativar" id="nome_completo" name="nome_completo" value="<?php echo $responsavel; ?>" placeholder="Nome completo">
				    </div>
				    <div class="form-group">
				        <input type="email" class="required email " id="email" name="email"  placeholder="E-mail"  value="<?php echo $email; ?>">
				    </div>
				    <div class="form-group">
				        <input type="email" class="required email" id="confirma_email" name="confirma_email"  placeholder="Confirme seu e-mail"  value="<?php echo $email; ?>">
				    </div>
				    <div class="form-group">
				        <input type="text" class="required desativar" id="whatsapp" name="whatsapp"  placeholder="Whatsapp"  value="<?php echo $whats; ?>"> 
				    </div>
				    <h4>Número do Cartão Le Club AccorHotels:</h4>
				    <div class="form-group">
				        <input type="text" class="required numero_cartao desativar" id="numero_cartao" name="numero_cartao"  value="<?php echo $leclub; ?>" placeholder="Número do cartão Le Club">
				    </div>
				    <div class="form-group">
				        <input type="text" class="required confirma_numero desativar" id="confirma_numero" name="confirma_numero" placeholder="Confirme o número do cartão Le Club"  value="<?php echo $leclub; ?>">
				    </div>
				    <button type="submit" class="btn_verde desativar">Confirmar</button>
				    <button class="btn_rosa fechaModal">Cancelar</button>
				</div>
				<div class="col-sm-4 col-md-4 endereco">
					<h4>Endereço:</h4>
					<div class="form-group">
				        <input type="text" class="desativar inline" id="cep" name="cep"  placeholder="CEP"  value="<?php echo $cep; ?>">
				    </div>
				    <div class="form-group">
				        <input type="text" class="desativar" id="endereco" name="endereco"  placeholder="Endereço"  value="<?php echo $endereco; ?>"/>
				        <input type="text" class="desativar inline" id="numero" name="numero"  placeholder="Nº"  value="<?php echo $numero; ?>"/>
				    </div>
				    <div class="form-group">
				        <input type="text" class="desativar" id="complemento" name="complemento"  placeholder="Complemento"  value="<?php echo $complemento; ?>">
				    </div>
				    <div class="form-group">
				        <input type="text" class="desativar inline " id="cidade" name="cidade"  placeholder="Cidade"  value="<?php echo $cidade; ?>"/>
				        <select id="estado" name="estado" class="required desativar inline">
				        	<option value="">UF</option>
						    <option value="AC">AC</option>
							<option value="AL">AL</option>
							<option value="AP">AP</option>
							<option value="AM">AM</option>
							<option value="BA">BA</option>
							<option value="CE">CE</option>
							<option value="DF">DF</option>
							<option value="ES">ES</option>
							<option value="GO">GO</option>
							<option value="MA">MA</option>
							<option value="MT">MT</option>
							<option value="MS">MS</option>
							<option value="MG">MG</option>
							<option value="PA">PA</option>
							<option value="PB">PB</option>
							<option value="PR">PR</option>
							<option value="PE">PE</option>
							<option value="PI">PI</option>
							<option value="RJ">RJ</option>
							<option value="RN">RN</option>
							<option value="RS">RS</option>
							<option value="RO">RO</option>
							<option value="RR">RR</option>
							<option value="SC">SC</option>
							<option value="SP">SP</option>
							<option value="SE">SE</option>
							<option value="TO">TO</option>
							<option value="ES">ES</option>
						</select>
				    </div>
				</div>
				<div class="col-sm-3 col-md-3 avatar" >
					<h4> Alterar Avatar:</h4>
					<div id="pesonagensForm">
						<span class="personagem heloisa" data="heloisa"></span>
						<span class="personagem milu" data="milu"></span>
						<span class="personagem alicia" data="alicia"></span>
						<span class="personagem louis" data="louis"></span>
						<input type="hidden" name="avatar" id="avatar" value="">
					</div>
				</div>
        	</div>
        	<input type="hidden" id="idPost" name="idPost" value="<?php echo $postId; ?>" />
        </form>
    </div>
    <div id="mensagem">
    	<h3></h3>
    </div>
</div>
</div>
<?php get_footer(); ?>