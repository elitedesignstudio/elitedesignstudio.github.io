<?php
defined( 'ABSPATH' ) or die();
?>

	<div class="social-share">
		<span><?php echo esc_html_x('Share:', 'frontend', 'ogo'); ?></span>

		<a class="facebook" target="_blank" href="<?php echo esc_url( sprintf( 'https://www.facebook.com/sharer/sharer.php?u=%s', get_permalink() ) ) ?>">
			<i class="fab fa-facebook-square"></i>
		</a>

		<a class="twitter" target="_blank" href="<?php echo esc_url( add_query_arg( array(
				'status' => urlencode( sprintf( esc_html__( 'Check out this article: %s - %s', 'ogo' ), get_the_title(), get_permalink() ) )
			), 'https://twitter.com/home' ) ) ?>">
			<i class="fab fa-twitter-square"></i>
		</a>

		<a class="reddit" target="_blank" href="<?php echo esc_url( sprintf( 'https://reddit.com/submit?url=', get_permalink() ) ) ?>">
			<i class="fab fa-reddit-square"></i>
		</a>

		<?php
			$pinterest_url = add_query_arg( array(
				'url' => get_permalink(),
				'media' => wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ),
				'description' => get_the_title()
			), 'https://pinterest.com/pin/create/button/' );
		?>
		<a class="pinterest" target="_blank" href="<?php echo esc_url( $pinterest_url ) ?>">
			<i class="fab fa-pinterest-square"></i>
		</a>
	</div>