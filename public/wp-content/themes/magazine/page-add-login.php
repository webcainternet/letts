<?php
session_start();

$letts_nome = "VISITANTE";
$_SESSION["lettslogin"] = 1;

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){
  // Informe o seu App ID abaixo
  $appId = '1540707736203396';
 
  // Digite o App Secret do seu aplicativo abaixo:
  $appSecret = '683c7a9441b1c1657a9a6c9171227a01';
 
  // Url informada no campo "Site URL"
  $redirectUri = urlencode('https://letts.com.br/add-login/');
 
  // Obtém o código da query string
  $code = $_GET['code'];
 
  // Monta a url para obter o token de acesso e assim obter os dados do usuário
  $token_url = "https://graph.facebook.com/oauth/access_token?"
  . "client_id=" . $appId . "&redirect_uri=" . $redirectUri
  . "&client_secret=" . $appSecret . "&code=" . $code;
 

  //pega os dados
  $response = @file_get_contents($token_url);
  if($response){
    $params = null;
    parse_str($response, $params);
    if(isset($params['access_token']) && $params['access_token']){
      $graph_url = "https://graph.facebook.com/me?access_token="
      . $params['access_token'];
      $user = json_decode(file_get_contents($graph_url));
 
    // nesse IF verificamos se veio os dados corretamente
      if(isset($user->email) && $user->email){
 
    /*
    *Apartir daqui, você já tem acesso aos dados usuario, podendo armazená-los
    *em sessão, cookie ou já pode inserir em seu banco de dados para efetuar
    *autenticação.
    *No meu caso, solicitei todos os dados abaixo e guardei em sessões.
    */
        $facedados_email = $user->email;
        $facedados_nome = $user->name;
        $facedados_localizacao = $user->location->name;
        $facedados_uid_facebook = $user->id;
        $facedados_user_facebook = $user->username;
        $facedados_link_facebook = $user->link;
      }
    }else{
      echo "Erro de conexão com Facebook";
      exit(0);
    }
 
  }else{
    echo "Erro de conexão com Facebook";
    exit(0);
  }
}else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])){
  echo 'Permissão não concedida';
}
?>

<?php
/**
 * Template for page view including query categories
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<style type="text/css">
.wbanner2 {
display: none;
}
.wbanner3 {
display: none;
}
.wbanner4 {
display: none;
}
.wbanner5 {
display: none;
}
.wbanner6 {
display: none;
}
.wbanner7 {
display: none;
}
.post-title {
	font-size: 1.12em;
}
</style>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<div id="contentwrap">

		<?php themify_content_before(); // hook ?>
		<!-- content -->
		<div id="content" class="clearfix" style="margin-top: 10px;">
			<?php themify_content_start(); // hook ?>

			<?php
			/////////////////////////////////////////////
			// 404
			/////////////////////////////////////////////
			if(is_404()): ?>
				<h1 class="page-title" itemprop="name"><?php _e('404','themify'); ?></h1>
				<p><?php _e( 'Page not found.', 'themify' ); ?></p>
			<?php endif; ?>

			<?php
			/////////////////////////////////////////////
			// PAGE
			/////////////////////////////////////////////
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="page-<?php the_ID(); ?>" class="type-page" itemscope itemtype="http://schema.org/Article">

				<!-- page-title -->
				<?php if($themify->page_title != "yes"): ?>
					<h1 class="page-title" itemprop="name"><?php the_title(); ?></h1>
				<?php endif; ?>
				<!-- /page-title -->

				<div class="page-content entry-content" itemprop="articleBody">

					<?php the_content(); ?>

					<div style="border: solid 2px #f57300; float: left; width: 200px; padding: 5px;">
						<img src="//graph.facebook.com/<?php echo $facedados_uid_facebook;?>/picture?type=large" style="margin-bottom: -9px;">
					</div>

					<div style="float: left; margin-left: 15px; color: #333;">
						<h4 class="widgettitle" style="border: 0px; padding: 0px; margin: 0 0 10px;"><?php echo $facedados_nome;?></h4>
						<h1 class="post-title">E-mail: <?php echo $facedados_email;?></h1>
						
						<div style="text-align: center; margin-top: 10px; text-align: left;">
							<p class="post-meta" style="margin-left: 25px;">
								<span class="post-category"><a href="#">Tipo de conta:</a> / </span>
							</p>
							<h1 class="post-title" style="margin-left: 25px; margin-bottom: 10px;font-size: 1.12em;">
								<input id="mostraatleta" type="radio" name="tipodeconta" style="margin-left: 0px;" checked="">Atleta
								<input id="mostraprofissional" type="radio" name="tipodeconta" style="margin-left: 20px;">Profissional
								<input id="mostramarca" type="radio" name="tipodeconta" style="margin-left: 20px;">Marca
							</h1>
						</div>

						<div id="dadosatleta" style="display: block;">
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<p class="post-meta" style="margin-left: 25px;">
												<span class="post-category"><a href="#">Esporte:</a> / </span>
											</p>
											<h1 class="post-title" style="margin-left: 25px;">
												<select id="atletaesporte" name="atletaesporte" style="font-size: 1.12em; font-family: 'Open Sans', sans-serif; font-weight: 100;">
												<option>-- Selecione o esporte --</option>
												<option>Aeromodelismo</option>
												<option>Alpinismo</option>
												<option>Asa Delta</option>
												<option>BMX</option>
												<option>BMX – Free style</option>
												<option>Balonismo</option>
												<option>Base Jumping</option>
												<option>Bodyboard</option>
												<option>Bouldering</option>
												<option>Bungee Jumping</option>
												<option>Canoagem</option>
												<option>Carveboard</option>
												<option>Caça submarina</option>
												<option>Ciclismo</option>
												<option>Cliff Diving</option>
												<option>Corrida aventura</option>
												<option>Drift</option>
												<option>Escalada</option>
												<option>Esqui</option>
												<option>Football Freestyle</option>
												<option>Free Style Motocross</option>
												<option>FreeBoard</option>
												<option>Heli-Skiing</option>
												<option>Highline</option>
												<option>Jet Ski</option>
												<option>Kart</option>
												<option>Kitesurfing</option>
												<option>Liquid Mountaineering</option>
												<option>Longboard skate</option>
												<option>Longboard surf</option>
												<option>Mega ramp</option>
												<option>Mergulho</option>
												<option>Moto Trial</option>
												<option>Moto Wheeling</option>
												<option>Motocross</option>
												<option>Mountain Bike</option>
												<option>Mountain biking</option>
												<option>Mountain boarding</option>
												<option>Off Road/Rally</option>
												<option>Paintball</option>
												<option>Paragliding</option>
												<option>Paragliding</option>
												<option>Parapente</option>
												<option>Parkour</option>
												<option>Patins in Line</option>
												<option>Psicobloc</option>
												<option>Rafting</option>
												<option>Rally</option>
												<option>Rapel</option>
												<option>Sandboard</option>
												<option>Skate - Street</option>
												<option>Skate – Free style</option>
												<option>Skate – Mini ramp</option>
												<option>Sky Surfing</option>
												<option>Skydive</option>
												<option>Slackline</option>
												<option>Snowboard</option>
												<option>Stand Up Paddle</option>
												<option>Street Luge</option>
												<option>Surf</option>
												<option>Surf - Freesurf</option>
												<option>Tow-in</option>
												<option>Trekking</option>
												<option>Triathlon</option>
												<option>UFC (MMA)</option>
												<option>Vela/Iatismo</option>
												<option>Velocidade</option>
												<option>Wakeboard</option>
												<option>Wakeboard Free style</option>
												<option>Windsurf</option>
												<option>WingWalking</option>
											</select>
											</h1>
										</div>
										<div style="text-align: center; margin-top: 0px; text-align: left;">
											<h1 class="post-title" style="margin-left: 25px;">
												<input type="checkbox" name="termos" value="termos">Li e aceito as <a target="_blank" href="http://letts.com.br/politicas-de-privacidade/">políticas de uso</a>
											</h1>
										</div>
										<div style="text-align: right; margin-right: 25px; margin-top: 0px;">
											<input name="submit" type="submit" id="criar" value="Criar Conta">
										</div>
									</div>

					</div>

					<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','themify').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

					<?php edit_post_link(__('Edit','themify'), '[', ']'); ?>

					<!-- comments -->
					<?php if(!themify_check('setting-comments_pages') && $themify->query_category == ""): ?>
						<?php comments_template(); ?>
					<?php endif; ?>
					<!-- /comments -->

				</div>
				<!-- /.post-content -->

				</div><!-- /.type-page -->
			<?php endwhile; endif; ?>

			<?php
			/////////////////////////////////////////////
			// Query Category
			/////////////////////////////////////////////
			?>
			<?php if($themify->query_category != ''): ?>

				<?php query_posts( apply_filters( 'themify_query_posts_page_args', 'cat='.$themify->query_category.'&posts_per_page='.$themify->posts_per_page.'&paged='.$themify->paged.'&order='.$themify->order.'&orderby='.$themify->orderby ) ); ?>

				<?php if(have_posts()): ?>

					<!-- loops-wrapper -->
					<div id="loops-wrapper" class="loops-wrapper <?php echo $themify->layout . ' ' . $themify->post_layout; ?>">

						<?php while(have_posts()) : the_post(); ?>

							<?php get_template_part('includes/loop', 'query'); ?>

						<?php endwhile; ?>

					</div>
					<!-- /loops-wrapper -->

					<?php if ($themify->page_navigation != 'yes'): ?>
						<?php get_template_part( 'includes/pagination'); ?>
					<?php endif; ?>

				<?php else : ?>

				<?php endif; ?>

			<?php endif; ?>

			<?php themify_content_end(); // hook ?>
		</div>
		<!-- /content -->
		<?php themify_content_after(); // hook ?>

	</div>
	<!-- /#contentwrap -->

	<?php 
	/////////////////////////////////////////////
	// Sidebar							
	/////////////////////////////////////////////
	if ($themify->layout != 'sidebar-none'): get_sidebar(); endif; ?>

</div>
<!-- /layout-container -->
	
<?php get_footer(); ?>