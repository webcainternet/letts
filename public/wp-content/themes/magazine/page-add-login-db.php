<?php
session_start();

$letts_nome = "VISITANTE";
$_SESSION["lettslogin"] = 1;

function GetImageFromUrl($link)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch,CURLOPT_URL,$link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($ch);
    curl_close($ch);

    return $result;
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

					<?php

					$titulo = $_POST['nomecompleto'];

					$novasenha = $_POST['senha'];
					if ($novasenha == "facebook") {
						$novasenha = "lettsappface";
					}

					$faceimg = $_POST['faceimg'];

						switch ($_POST['tipodeconta']) {
							case 'profissional':
								# Profissional
								$my_post = array(
									'post_type'     => 'profissional',
									'post_title'    => $titulo,
									'post_status'   => 'publish',
									'post_author'   => 1
									);

									// Insere e retorna o id do post
									$pid = wp_insert_post( $my_post );

									// Salva os Custom content type de acordo com o Post_id retornado
									update_post_meta($pid, 'profissao', $_POST['atletaesporte']);


									//Profile
									if ($novasenha == "lettsappface") {
										//Get Facebook image
										mkdir('/srv/httpd/letts.com.br/public/wp-content/uploads/users/'.$pid);
										$path = "wp-content/uploads/users/".$pid."/"; 

										$sourcecode = GetImageFromUrl($faceimg);
										$savefile = fopen('/srv/httpd/letts.com.br/public/wp-content/uploads/users/'.$pid.'/profilepic.jpg', 'w');
										fwrite($savefile, $sourcecode);
										fclose($savefile);

										$filename = 'http://letts.com.br/wp-content/uploads/users/'.$pid.'/profilepic.jpg';
										$wp_filetype = wp_check_filetype(basename($filename), null );
										$attachment = array(
											'post_mime_type' => $wp_filetype['type'],
											'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
											'post_content' => '',
											'post_status' => 'inherit'
										);
										$attach_id = wp_insert_attachment( $attachment, $filename, $cur_post_id );
									} else {
										$attach_id = "2908";					
									}
									add_post_meta($pid, '_thumbnail_id', $attach_id, true);
									add_post_meta($pid, 'post_image', $filename, true);
									add_post_meta($pid, 'basicaimagem', $attach_id, true);

									//Background
									$attach_id2 = "2909";
									add_post_meta($pid, 'atletaimagembackground', $attach_id2, true);
								break;

							case 'marca':
								# Marca
								$my_post = array(
									'post_type'     => 'marca',
									'post_title'    => $titulo,
									'post_status'   => 'publish',
									'post_author'   => 1
									);

									// Salva os Custom content type de acordo com o Post_id retornado

									// Insere e retorna o id do post
									$pid = wp_insert_post( $my_post );

									$attach_id = "2925";
									add_post_meta($pid, '_thumbnail_id', $attach_id, true);
									add_post_meta($pid, 'post_image', $filename, true);
									add_post_meta($pid, 'logo', $attach_id, true);


									$attach_id2 = "2909";
									add_post_meta($pid, 'basicaimagem', $attach_id2, true);
								break;
							
							default:
								# Atleta
								$my_post = array(
									'post_type'     => 'atleta',
									'post_title'    => $titulo,
									'post_status'   => 'publish',
									'post_author'   => 1
									);

									// Insere e retorna o id do post
									$pid = wp_insert_post( $my_post );

									// Salva os Custom content type de acordo com o Post_id retornado
									update_post_meta($pid, 'atletaesporte', $_POST['atletaesporte']);


									//Profile
									if ($novasenha == "lettsappface") {
										//Get Facebook image
										mkdir('/srv/httpd/letts.com.br/public/wp-content/uploads/users/'.$pid);
										$path = "wp-content/uploads/users/".$pid."/"; 

										$sourcecode = GetImageFromUrl($faceimg);
										$savefile = fopen('/srv/httpd/letts.com.br/public/wp-content/uploads/users/'.$pid.'/profilepic.jpg', 'w');
										fwrite($savefile, $sourcecode);
										fclose($savefile);

										$filename = 'http://letts.com.br/wp-content/uploads/users/'.$pid.'/profilepic.jpg';
										$wp_filetype = wp_check_filetype(basename($filename), null );
										$attachment = array(
											'post_mime_type' => $wp_filetype['type'],
											'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
											'post_content' => '',
											'post_status' => 'inherit'
										);
										$attach_id = wp_insert_attachment( $attachment, $filename, $cur_post_id );
									} else {
										$attach_id = "2908";					
									}
									add_post_meta($pid, '_thumbnail_id', $attach_id, true);
									add_post_meta($pid, 'post_image', $filename, true);
									add_post_meta($pid, 'basicaimagem', $attach_id, true);

									//Background
									$attach_id2 = "2909";
									add_post_meta($pid, 'atletaimagembackground', $attach_id2, true);
								break;
						}

						update_post_meta($pid, 'basicaemail', $_POST['basicaemail']);
						update_post_meta($pid, 'senha', $novasenha);




						

						$letts_loginid = $pid;
					
						if ($letts_loginid == "") {
							echo "<script> window.location.assign(\"/login/?error=invalid_login\") </script>";
						}
						else {
							$_SESSION["lettslogin"] = $letts_loginid;
							echo "<script> window.location.assign(\"http://letts.com.br/?p=".$_SESSION["lettslogin"]."\") </script>";
						}
						exit;
					?>


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