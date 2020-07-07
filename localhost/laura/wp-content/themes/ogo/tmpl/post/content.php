<?php
defined( 'ABSPATH' ) or die();
?>

	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner">
			<div class="post-header">
				<?php ogo__post_title() ?>
			</div>

			<?php echo ogo__post_featured() ?>

			<div class="post-content">
				<?php
					echo ogo__the_content(get_theme_mod('blog_chars_count'));
				?>

				<?php if ( !post_password_required() && ( comments_open() || get_comments_number() ) && !empty(ogo__the_content()) ): ?>
					<span class="post-comments">
						<?php comments_popup_link( esc_html__( '0', 'ogo' ), esc_html__( '1', 'ogo' ), esc_html__( '%', 'ogo' ) ); ?>
					</span>
				<?php endif ?>
			</div>
			
		</div>
	</div>
