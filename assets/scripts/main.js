/**
 * scripts.js
 */
(function($) {
	$( document ).ready(function() {
		//Modal Login
		$('#btn-login').on('click', function() {
			$('#modalLogin').modal('show');
		});

		//Modal Cadastro
		$('.btn-cadastro').on('click', function() {
			$('.modal').modal('hide');
			$('#modalCadastro').modal('show');
		});

		//Escolhe Personagem/Avatar
		$('.personagem').on('click', function(){
			var persona = $(this).attr('data');
			$('.personagem').removeClass('active');
			$(this).addClass('active');
			$('#avatar').val(persona);
		});

		//Verifica se o email está cadastrado e se os emails são iguais
		$('.email').on('change', function(){
			var btnClick = $(this);
			var mail = $('#email').val();
			var confirMail = $('#confirma_email').val();
			
			//Verifica se o email e confirmação são iguais
			if( confirMail.length < 1 || confirMail !== mail ){	
				$('#mensagem h3').text('Confirmação de E-mail, não confere! Verifique por favor');
				$('#mensagem').show(100);
				return false;
			}

			btnClick.addClass('loading');
			$.ajax({
                url: vars.ajaxurl + "?action=validaEmail",
                dataType: 'json',
                type: 'POST',
                data: {email: mail},
                success: function(r) { 
                	if( r == "inscrito"){
                       $('#mensagem h3').text('E-mail já cadastrado. Por Favor Insira outro email ou Clique em recuperar senha.');
                       $('#mensagem').append('<button class="btn_verde">Recuperar Senha</button>');
                       $('.desativar').prop('disabled', true);
                       $('#mensagem').show(100);
                    }else{
                    	$('.desativar').prop('disabled', false);
                    	$('#mensagem .btn_verde').remove();
                    	$('#mensagem').hide(100);
                    };
                    btnClick.removeClass('loading');
                },
                error: function(r) {
                    console.log(r);
                }
            });
		});

		//continue form
		$('#formCadastro').on('submit', function(){
			var $form = $(this);
			var nome = $('#nome_completo').val();
			var mail = $('#email').val();
			var confirMail = $('#confirma_email').val();
			var whatsapp = $('#whatsapp').val();
			var senha = $('#senha').val();
			var confirSenha = $('#confirme_senha').val();
			var estado = $('#estado').val();
			var cartao = $('#numero_cartao').val();
			var confiCartao = $('#confirma_numero').val();
			var avatar = $('#avatar').val();

			//Verifica o nome
			if( nome.length < 8 ){	
				$('#mensagem h3').text('Por favor Preencha o nome completo');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica se o email e confirmação são iguais
			if( confirMail.length < 1 || confirMail != mail ){	
				$('#mensagem h3').text('Confirmação de E-mail, não confere! Verifique por favor');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( whatsapp.length < 9 ){	
				$('#mensagem h3').text('Por favor Preencha o Whatsapp para contato');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica se o email e confirmação são iguais
			if( confirSenha.length < 6 || confirSenha != senha ){	
				$('#mensagem h3').text('Confirmação de Senha, não confere!');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( estado.length < 2 ){	
				$('#mensagem h3').text('Por favor Selecione o Estado que reside');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( confiCartao.length != 16 || confiCartao != cartao ){	
				$('#mensagem h3').text('Por favor Preencha o Cartão Le Club com 16 Dígitos');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( avatar.length < 4 ){	
				$('#mensagem h3').text('Por favor Selecione o Avatar para seu perfil');
				$('#mensagem').show(100);
				return false;
			}

			$.ajax({
                url: vars.ajaxurl + "?action=addUser",
                type: 'POST',
                dataType: 'json',
                data: $form.serialize(),
                success: function(r) { 
                	if( r == "inscrito"){
                		console.log('user inscrito');
                    }else{
                    	$('#idPost').val(r);
                       	$('#modalCadastro').modal('hide');
						$('#modalCrianca').modal('show');
                        $('#mensagem').hide(100);
                    };
                },
                error: function(r) {
                    console.log("nao foi: " + r);
                }
            });
            return false;
		});

		$('#formCrianca').on('submit', function(){
			var $form = $(this);
			$.ajax({
                url: vars.ajaxurl + "?action=addCrianca",
                type: 'POST',
                dataType: 'json',
                data: $form.serialize(),
                success: function(r) { 
                	window.location.replace(vars.pagecadastro);
                },
                error: function(r) {
                    console.log("nao foi: " + r);
                }
            });
			return false;
		});

		//Add Crianca
		$('#add_crianca').on('click', function(){
			var count = $('.crianca').length;
			var classCri = 'crianca'+count;
			var crianca = $( ".criancaHide" ).clone().addClass('crianca').removeClass('criancaHide');
			$( ".crianca" ).last().after( crianca );
			var c = 1;
			$( ".crianca" ).each(function() {
			  $( this ).find('h4').text( "Criança " + c);
			  c++;
			});
		});

		//remove criança
		$('.remove_crianca').live('click', function(){
			$(this).closest('.crianca').remove();
			var c = 1;
			$( ".crianca" ).each(function() {
			  	$( this ).find('h4').text( "Criança " + c);
			  	c++;
			});
		});

		//Exclui Criança do Cadastro
		$('.excluiCrianca').on('click', function(e){
			e.preventDefault();
			var crianca = $(this).parents('.crianca');
			var nome = crianca.find('.nome').text();
			var data_nasc = crianca.find('.idade').text();
			var genero = crianca.find('.genero').text();
			var id = crianca.attr('id');

			var html = "<h4>Confirma a exclusão: </h4>";
			html += "<p>Criança: <strong>"+ nome +"</strong></p>";
			html += "<p>Data Nascimento:  <strong>"+ data_nasc +"</strong></p>";
			html += "<p>Gênero:  <strong>"+ genero +"</strong></p>";
			html += "<input type='hidden' id='idExclui' value='"+id+"' />";
			html += "<button type='button' class='btn_verde excluiCon'>Confirmar</button>";
	    	html += "<button type='button' class='btn_rosa excluiCan'>Cancelar</button>";

			$('#modalMensagem .contentModal').append( html );
			$('#modalMensagem').modal('show');
		});

		//Cancelar add Cri
		$(document).on('click', '.cancelAdd', function(e){
			e.preventDefault();
			$('.criancaadd.crianca').remove();
		});

		$(document).on('click', '.excluiCon',function(e){
			e.preventDefault();
			var crianca = $('#idExclui').val();
			var id = '#'+crianca;
			$(id).remove();
			$('#formCrianca').submit();
		});

		$(document).on('click', '.excluiCan', function(e){
			e.preventDefault();
			$('#modalMensagem').modal('hide');
			$('#modalMensagem .contentModal').html('');
		});

		//Galeria Eventos Modal Wordpress
		$("#modal-carousel").carousel({interval:false});
	   	/* when clicking a thumbnail */
	   	$(".gallery-item img").click(function(){
	   		var src = this.src;
	   		$('#imgModal').attr('src', src);
	    // 	var content = $(".carousel-inner");
	    // 	var title = $(".modal-title");
	    // 	content.empty();  
	    // 	title.empty();
	  
	  		// var id = this.id;  
	    //  	var repo = $("#itens .item");
	    //  	var repoCopy = repo.filter("#" + id).clone();
	    //  	var active = repoCopy.first();

	    // 	active.addClass("active");
	    // 	title.html(active.find("img").attr("title"));
	  		// content.append(repoCopy);
	    // 	// show the modal
	  		$("#modal-gallery").modal("show");
	  	});

	  	//Cadastro Editar Criança
	  	$('.editarCrianca').on('click', function(e){
	  		e.preventDefault();
	  		var crianca = $(this).parents('.crianca');
	  		crianca.find('.row').hide(100);
	  		crianca.find('.form').show(100);
	  	});
		//Cadastro Cancelar Editar Criança
	  	$('.cancelEdit').on('click', function(e){
	  		e.preventDefault();
	  		var crianca = $(this).parents('.crianca');
	  		crianca.find('.form').hide(100);
	  		crianca.find('.row').show(100);
	  	});

	  	//Editar Cadastro
	  	$('.editCadastro').on('click', function(e){
	  		e.preventDefault();
	  		$('#modalEditCadastro').modal('show');
	  	});

	  	//Form Editar cadastro
	  	$('#formEdit').on('submit', function(){
			var $form = $(this);
			var nome = $('#nome_completo').val();
			var mail = $('#email').val();
			var confirMail = $('#confirma_email').val();
			var whatsapp = $('#whatsapp').val();
			var estado = $('#estado').val();
			var cartao = $('#numero_cartao').val();
			var confiCartao = $('#confirma_numero').val();
			var avatar = $('#avatar').val();

			//Verifica o nome
			if( nome.length < 8 ){	
				$('#mensagem h3').text('Por favor Preencha o nome completo');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica se o email e confirmação são iguais
			if( confirMail.length < 1 || confirMail != mail ){	
				$('#mensagem h3').text('Confirmação de E-mail, não confere! Verifique por favor');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( whatsapp.length < 9 ){	
				$('#mensagem h3').text('Por favor Preencha o Whatsapp para contato');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( estado.length < 2 ){	
				$('#mensagem h3').text('Por favor Selecione o Estado que reside');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( confiCartao.length != 16 || confiCartao != cartao ){	
				$('#mensagem h3').text('Por favor Preencha o Cartão Le Club com 16 Dígitos');
				$('#mensagem').show(100);
				return false;
			}

			//Verifica o tamanho do cartão
			if( avatar.length < 4 ){	
				$('#mensagem h3').text('Por favor Selecione o Avatar para seu perfil');
				$('#mensagem').show(100);
				return false;
			}

			$.ajax({
                url: vars.ajaxurl + "?action=editCadastro",
                type: 'POST',
                dataType: 'json',
                data: $form.serialize(),
                success: function(r) { 
               		location.reload();
                },
                error: function(r) {
                    console.log("nao foi: " + r);
                }
            });
            return false;
		});
		$('.fechaModal').on('click', function(){
			$('#modalEditCadastro').modal('hide');
		});

	  	//Turminha
	  	$('.persona').on('click', function(){
	  		var person = $(this).attr('data');

	  		$('.persona').removeClass('active');
	  		$('#personagem img').hide(100);
	  		$('#descricao .content').hide(100);

	  		$(this).addClass('active');
	  		$('#personagem img[data='+person+']').show(100);
	  		$('#descricao .content[data='+person+']').show(100);
	  	});
	});
})(jQuery);