<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field( 'testimonial' ) ?: 'Your testimonial here...';
$author = get_field( 'name' );
$byline = get_field( 'byline' );
$avatar = get_field( 'avatar' );
$colors = get_field( 'colors' );

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="grid-container grid-parent">
		<blockquote class="testimonial-blockquote">
			<i class="fal fa-quote-left"></i>
			<span class="testimonial-text"><?php echo $text; ?></span>
			<span class="testimonial-author"><?php echo $author; ?></span>
			<span class="testimonial-byline"><?php echo $byline; ?></span>
		</blockquote>
		<div class="testimonial-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $avatar, 'full' ); ?>);">
			<?php echo wp_get_attachment_image( $avatar, 'full' ); ?>
		</div>
	</div>
	<style type="text/css">
		#<?php echo $id; ?> {
			background: <?php echo $colors['background_color']; ?>;
			color: <?php echo $colors['font_color']; ?>;
		}
	</style>
</div>