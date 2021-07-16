<?php
/**
 * ACF integrations.
 *
 * Twenty Twenty Child theme.
 */
 
/*--------------------------------------------------------------
# Team Members
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