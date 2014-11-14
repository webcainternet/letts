<div class="lightbox_inner">
	<form id="themify_builder_load_template_form" method="POST">
		
		<?php if ( count( $posts ) > 0 ): ?>
		<ul class="themify_builder_layout_lists">
			<?php global $post; $temp_post = $post; ?>
			
			<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
			<li class="layout_preview_list">
				<div class="layout_preview">
					<div class="thumbnail" data-layout-slug="<?php echo $post->post_name; ?>">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumbnail', array( 150, 150 ) );
						} else {
							echo sprintf( '<img src="%s">', 'http://placehold.it/150x150' );
						} ?>
					</div>
					<!-- /thumbnail -->
					<div class="layout_action">
						<div class="layout_dropdown_wrapper">
							<span class="menu_icon ti-menu"></span> 
							<ul class="layout_action_dropdown">
								<li>
									<a href='#' class="themify_builder_layout-duplicate-link" data-layout-id="<?php echo $post->ID; ?>"><?php _e('Duplicate', 'themify') ?></a>
								</li>
								<?php if ( ! Themify_Builder_Model::is_prebuilt_layout( $post->ID ) ): ?>
								<li>
									<a href="<?php echo get_permalink() . '#builder_active';?>" target="_blank" class="themify_builder_layout-edit-link" data-layout-id="<?php echo $post->ID; ?>"><?php _e('Edit', 'themify') ?></a>
								</li>
								<li>
									<a href="#" class="themify_builder_layout-delete-link" data-layout-id="<?php echo $post->ID; ?>"><?php _e('Delete', 'themify') ?></a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
						
						<div class="layout_title">
							<?php the_title(); ?>
						</div>
						<!-- /template_title -->
					</div>
					<!-- /template_action -->
				</div>
				<!-- /template_preview -->
			</li>
			<?php endforeach; wp_reset_postdata(); $post = $temp_post; ?>
		</ul>
		<?php endif; ?>
		<div class="clearfix"></div>

		<p class="add_new_template">
			<a href="<?php echo admin_url('post-new.php?post_type=' . $this->layout->post_type_name); ?>" target="_blank">
				<span class="themify_builder_icon add"></span>
				<?php _e('Add new layout', 'themify') ?>
			</a>
		</p>

	</form>
</div> <!-- /lightbox_inner -->