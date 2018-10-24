<?php
/**
 * Template Name: Page Login
 */

get_header(); ?>

<div id="login" class="archives">
	<header>
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
			<h3>Login<br /><span>Visualização do seu perfil</span></h3>
		</div>
	</header>
	<div class="container-fluid">
		<section>
			<h3>Login</h3>
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
		</section>
	</div>
</div>
<?php get_footer(); ?>