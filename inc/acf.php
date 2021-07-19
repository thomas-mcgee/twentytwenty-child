<?php
/**
 * ACF integrations.
 *
 * Twenty Twenty Child theme.
 */
 
/*--------------------------------------------------------------
# Repeater Field: Team Members
--------------------------------------------------------------*/
function hfm_team_members_content() {
	
	$team_members = get_field( 'team_members' );
	
	/* echo '<pre>';
	print_r( get_field( 'team_members' ) );
	echo '</pre>'; */ ?>
	
	<div class="grid-container">
		
		<?php if( have_rows( 'team_members' ) ) :
		
			// Loop through rows.
			while( have_rows( 'team_members' ) ) : the_row();
				
				$avatar = wp_get_attachment_image_src( get_sub_field( 'avatar' ), 'large_avatar' ); ?>
				
				<div class="grid-25 tablet-grid-50">
				
					<div class="team-member">
						<p>
							<img src="<?php echo $avatar[0]; ?>" />
						</p>
						<h3>
							<?php the_sub_field( 'name' ); ?>
						</h3>
						<p>
							<?php the_sub_field( 'job_title' ); ?>
						</p>
						<?php if ( get_sub_field( 'website' ) ) : ?>
						<p>
							<small>
								<a href="<?php the_sub_field( 'website' ); ?>" target="_blank">
									<i class="fal fa-globe"></i>
								</a>
							</small>
						</p>
						<?php endif; ?>
					</div>
				
				</div>
				
			<?php // End loop.
			endwhile;
		
		endif; ?>

	</div>
	
<?php }
add_action( 'hfm_team_members_content', 'hfm_team_members_content' );

/*--------------------------------------------------------------
# ACF Block: Customer Testimonial
--------------------------------------------------------------*/
function my_acf_init_block_types() {

	// Check function exists.
	if( function_exists('acf_register_block_type') ) {
	
		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'testimonial',
			'title'             => __('Testimonial'),
			'description'       => __('A custom testimonial block.'),
			'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'testimonial', 'quote' ),
			'enqueue_style'		=> get_stylesheet_directory_uri() . '/template-parts/blocks/testimonial/testimonial.css'
		));
		
	}
	
}
add_action('acf/init', 'my_acf_init_block_types');

/*--------------------------------------------------------------
# Flexible Content: Documentation Content Helpers
--------------------------------------------------------------*/
function hfm_documentation_notifications() {
	
	// Check value exists.
	if( have_rows( 'extras' ) ): ?>
		
		<div class="doc-alerts">
			<div class="grid-container">
			<?php // Loop through rows.
			while ( have_rows( 'extras' ) ) : the_row();
				
				if ( get_row_layout() == 'notification' ) : ?>
				<div class="grid-100">
					<div class="doc-alert doc-alert-<?php echo get_sub_field( 'type' ); ?>">
						<?php echo get_sub_field( 'content' ); ?>
					</div>
				</div>
				<?php endif;
				
			// End loop.
			endwhile; ?>
			</div>
		</div>
		
	<?php endif;
	
}

function hfm_documention_extras() {
	
	// Check value exists.
	if( have_rows( 'extras' ) ): ?>
		
		<section class="doc-extras">
			<div class="grid-container">
			<?php // Loop through rows.
			while ( have_rows( 'extras' ) ) : the_row();
				
				if ( get_row_layout() == 'download' ) : ?>
					<div class="grid-100">
						<table class="download-table">
							<tr>
								<td class="description">
									<h3 style="margin: 0;">Related Download</h3>
									<?php if ( !empty( get_sub_field( 'description' ) ) ) : ?>
									<p>
										<?php echo get_sub_field( 'description' ); ?>
									</p>
									<?php endif; ?>
								</td>
								<td class="file">
									<a class="button" href="<?php echo get_sub_field( 'file' ); ?>">
										<?php echo get_sub_field( 'label' ); ?>
									</a>
								</td>
							</tr>
						</table>
					</div>
				<?php endif;
				
				if ( get_row_layout() == 'screenshots' ) : ?>
						<h3>Screenshots</h3>
						
						<div class="grid-container">
						<?php $screenshots = get_sub_field( 'screenshots' );
						foreach ( $screenshots as $screenshot ) { ?>
							<div class="gallery grid-20 tablet-grid-20">
							<a href="<?php echo $screenshot['url']; ?>">
								<img src="<?php echo $screenshot['sizes']['large_avatar']; ?>" alt="" />
							</a>
							</div>
						<?php } ?>
						</div>
							
				<?php endif;
				
			// End loop.
			endwhile; ?>
			</div>
		</section>
		
	<?php endif;
	
}
add_action( 'hfm_documention_extras', 'hfm_documention_extras' );
/*--------------------------------------------------------------
# Options Page: Sitewide Banner
--------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page( array(
		'page_title' 	=> 'Sidewide Banner',
		'menu_title'	=> 'Sitewide Banner',
		'menu_slug' 	=> 'sitewide-banner-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	) );
	
}

function display_sitewide_banner() {
	
	if ( !empty( get_field( 'banner_text', 'option' ) ) ) : ?>
	<div class="sitewide-banner" style="color: <?php the_field( 'banner_text_color', 'option' ); ?>; background-color: <?php the_field( 'banner_background_color', 'option' ); ?>;">
		
		<div class="grid-container">
			
			<div class="grid-70 tablet-grid-70">
				<?php the_field( 'banner_text', 'option' ); ?>
			</div>
			
			<div class="grid-30 tablet-grid-30">
				<a class="button" href="<?php the_field( 'banner_button_url', 'option' ); ?>">
					<?php  the_field( 'banner_button_text', 'option' ); ?>
				</a>
			</div>
			
		</div>
		
	</div>
	<?php endif;
	
}