<div class="formularios mensagem_acessorio">
	<div class="mensagem_marca">
		<h1 class="post-title entry-title">Envie mensagem para <?php echo $_GET['nome']; ?></h1>
		<form action="" method="post" id="formulario_mensagem">
			<input type="text" id="nome_msg" name="nome_msg" placeholder="Seu Nome">
			<input type="text" id="email_msg" name="email_msg" placeholder="Seu E-mail">
			<input type="text" id="produto" name="produto" placeholder="Produto" value="<?php echo $_GET['produto']; ?>">
			<textarea id="mensagem" name="mensagem" placeholder="Mensagem para"></textarea>
			<input type="button" id="botao_mensagem" value="Enviar Mensagem">
		</form>
	</div>	
</div>