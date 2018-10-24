<?php
function cadastro_login( $atts ){
	$user = new WP_User(get_current_user_id());
	if( $user->roles[0] == 'subscriber'){
?>
	<a href="<?php echo get_permalink(17) ; ?>" class="btn_verde btn_perfil">Perfil</a>
<?php
	//EndIf Subscriber
	}else{
?>
	<button id="btn-login" class="btn_verde">Login</button>
	<button class="btn-cadastro btn_verde">Cadastre-se</button>
	
	<!-- Modal Login -->
	<div class="modal fade modal-shortcode" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>Login<br /><span>Lorem ipsum dolor sit amet</span></h3>
			        <form name="loginform" id="loginform" action="<?php echo get_site_url();?>/wp-login.php" method="post">
						<p class="login-username">
							<input type="text" name="log" id="user_login" value="" size="20" placeholder="Email de Cadastro" class="required" required="required">
						</p>
						<p class="login-password">
							<input type="password" name="pwd" id="user_pass" value="" size="20" placeholder="Senha" class="required" required="required">
						</p>
						<p class="">
							Esqueceu ou não tem sua senha? <a href="#">Clique aqui</a>
						</p>
						<!-- p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Lembrar-me</label></p -->
						<p class="login-submit">
							<button type="submit" name="wp-submit" id="wp-submit" class="btn_verde">Entrar</button>
							<input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink(17)); ?>">
						</p>
					</form>
					<p>Não é cadastrado ainda? <br />
					<button class="btn-cadastro btn_verde">Cadastre-se</button></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cadastro -->
    <div class="modal fade modal-shortcode" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>Cadastre-se<span>Preecha o formulário abaixo e garanta todas as vantagens de fazer parte do Le Kids Club AccorHotels.<br />É simples e rápido.</span></h3>
                   	<form id="formCadastro">
                    <div class="row">
                    	<div class="col-sm-6 col-md-6" >
                    		<h4>Dados do associado Le Club:</h4>
							<div class="form-group">
						        <input type="text" class="required desativar" id="nome_completo" name="nome_completo"  placeholder="Nome completo">
						    </div>
						    <div class="form-group">
						        <input type="email" class="required email " id="email" name="email"  placeholder="E-mail">
						    </div>
						    <div class="form-group">
						        <input type="email" class="required email" id="confirma_email" name="confirma_email"  placeholder="Confirme seu e-mail">
						    </div>
						    <div class="form-group">
						        <input type="text" class="required desativar" id="whatsapp" name="whatsapp"  placeholder="Whatsapp">
						    </div>
						    <br />
						    <h4>Senha De segurança: </h4>
							<p>Escolha uma senha com no mínimo 8 caracteres</p>
						    <div class="form-group">
						        <input type="password" class="required desativar" id="senha" name="senha"  placeholder="Senha">
						    </div>
						    <div class="form-group">
						        <input type="password" class="required desativar" id="confirme_senha" name="confirme_senha"  placeholder="Confirme Senha">
						    </div>
						</div>
						<div class="col-sm-6 col-md-6" >
							<h4>Endereço:</h4>
							<div class="form-group">
						        <input type="text" class="desativar inline" id="cep" name="cep"  placeholder="CEP">
						        <input type="text" class="desativar inline" id="numero" name="numero"  placeholder="Nº"/>
						    </div>
						    <div class="form-group">
						        <input type="text" class="desativar" id="endereco" name="endereco"  placeholder="Endereço"/>
						    </div>
						    <div class="form-group">
						        <input type="text" class="desativar" id="complemento" name="complemento"  placeholder="Complemento">
						    </div>
						    <div class="form-group">
						        <input type="text" class="desativar inline " id="cidade" name="cidade"  placeholder="Cidade"/>
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
						    </div><br />
						    <h4>Número do Cartão Le Club AccorHotels:</h4>
						    <p>Digite o número ou faça seu cadastro <a href="#">aqui</a>.</p>
						    <div class="form-group">
						        <input type="text" class="required numero_cartao desativar" id="numero_cartao" name="numero_cartao"  placeholder="Número do cartão Le Club">
						    </div>
						    <div class="form-group">
						        <input type="text" class="required confirma_numero desativar" id="confirma_numero" name="confirma_numero"  placeholder="Confirme o número do cartão Le Club">
						    </div>
							
						</div>
						<div class="col-sm-6 col-md-6" >
							<h4>Escolha um Avatar para seu perfil:</h4>
							<div id="pesonagensForm">
								<span class="personagem heloisa" data="heloisa"></span>
								<span class="personagem milu" data="milu"></span>
								<span class="personagem alicia" data="alicia"></span>
								<span class="personagem louis" data="loius"></span>
								<input type="hidden" name="avatar" id="avatar" value="">
							</div>
						</div>
						<div class="col-sm-6 col-md-6" >
							<br />
							<button type="submit" id="continue" class="btn_verde desativar">Continuar</button>
							<p>Para mais infornações sobre o Le Club conheça <a href="#">aqui</a>.</p>
						</div>
                	</div>
                	</form>
                </div>
            </div>
            <div id="mensagem">
            	<h3></h3>
            </div>
        </div>
    </div>

    <!-- Modal Criança -->
    <div class="modal fade modal-shortcode" id="modalCrianca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="header">
                	<h3>Cadastro das Crianças</h3>
                    <p>As crianças ficarão visveis em sua área interna e<br />terão acesso a diversos benefícios do programa</p>
                </div>
                <form id="formCrianca">
	                <div id="criancas" class="modal-body form">
	                    <div class="crianca">
	                    	<h4>Criança 1</h4>
	                   		<div class="form-group">
							    <input type="text" class="required nome_crianca" name="nome_crianca[]"  placeholder="Nome Completo">
							</div>
							<div class="form-group">
							    <input type="text" class="required data_nasc" name="data_nasc[]"  placeholder="Data de Nascimento">
							</div>
							<div class="form-group">
							    <input type="text" class="required genero" name="genero[]"  placeholder="Gênero">
							</div>
	                    </div>
	                   <input type="hidden" id="idPost" name="idPost" value="" />
	                   <button type="button" id="add_crianca" class="btn_verde">Adicionar mais uma criança</button>
	                   <button type="submit" class="btn_verde">Finalizar</button>
	                </div>
            	</form>
            	<div class="criancaHide">
               		<h4>Criança</h4>
					<button class="remove_crianca btn_rosa">Remover</button>
               		<div class="form-group">
					    <input type="text" class="required nome_crianca" name="nome_crianca[]"  placeholder="Nome Completo">
					</div>
					<div class="form-group">
					    <input type="text" class="required data_nasc" name="data_nasc[]"  placeholder="Data de Nascimento">
					</div>
					<div class="form-group">
					    <input type="text" class="required genero" name="genero[]"  placeholder="Gênero">
					</div>
                </div>
            </div>
        </div>
    </div>
<?php
	};//EndIfSubscriber;
}
add_shortcode( 'cadastroLogin', 'cadastro_login' );