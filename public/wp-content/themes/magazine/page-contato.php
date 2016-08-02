<?php
/**
 * Template for page view including query categories
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

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

					<?php // the_content(); ?>
					Utilize os campos abaixo para entrar em contato com um de nossos administradores da Letts, para qualquer tipo de denúncia, duvidas ou reclamação referentes ao site, envie o link do site onde se encontra esta situação. Seu comentário é sempre bem-vindo e agrademos por ajudar a manter o site nas melhores condições.

					<?php
						echo do_shortcode( '[contact-form-7 id="2414" title="Contato"]' );

						if ($_SESSION['lettslogin'] > 1 ) {
							$email = $_SESSION['meuemail'];

							//Conecta bd
							$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							if (mysqli_connect_errno()) {
						    	printf("Connect failed: %s\n", mysqli_connect_error());
								exit();
							}

							$sql = 'SELECT p.ID, p.post_title, pmtelefone.meta_value AS telefone, pmddi.meta_value AS ddi FROM wp_posts p INNER JOIN wp_postmeta pmtelefone ON (p.id = pmtelefone.post_id) INNER JOIN wp_postmeta pmddi ON (p.id = pmddi.post_id) WHERE p.ID = '.$_SESSION["lettslogin"].' AND pmtelefone.meta_key = \'basicatelefones\' AND pmddi.meta_key = \'basicaddi\'';

							//Busca username
							$obj = $mysqli->query($sql)->fetch_object();
							$letts_nome = $obj->post_title;

							$ddistring = $obj->ddi;
							$ddistart  = strpos($ddistring,'(');
							$ddifim  = strpos($ddistring,')');
							$ddilen  = strlen($ddistring);
							$ddiutil = $ddifim - $ddistart - 1;
							$ddivalor = substr($ddistring, $ddistart + 1, $ddiutil);

							$telefone = $ddivalor . ' ' . $obj->telefone;
						}
					?>

					<script type="text/javascript">
						$("input[name=nome]").val('<?php echo $letts_nome; ?>');
						$("input[name=email]").val('<?php echo $email; ?>');
						$("input[name=telefone]").val('<?php echo $telefone; ?>');
					</script>


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
