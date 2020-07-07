<?php
defined( 'ABSPATH' ) or die();
?>
	
	<div class="content blog_large" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<?php 
				while ( have_posts() ): the_post();

				$extra_class = 'post';
			?>
				<div id="post-<?php the_ID() ?>" <?php post_class( $extra_class ) ?>>
					<div class="post-inner">
						<?php if( !empty(ogo__post_featured()) ) : ?>
							<div class="post-media-wrapper">
								<!-- Featured Media -->
								<?php echo ogo__post_featured() ?>

								<!-- Post Date -->
								<?php ogo__post_date( '', 'complex' ) ?>
							</div>
						<?php endif; ?>
						
						<!-- Post Categories -->
						<?php ogo__post_category() ?>

						<!-- Post Title -->
						<?php ogo__post_title() ?>

						<!-- Post Meta -->
						<?php ogo__post_meta() ?>

						<?php if( !empty(ogo__the_content()) ) : ?>
							<!-- Post Content -->
							<div class="post-content">
								<?php echo ogo__the_content(get_theme_mod('blog_chars_count')) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile ?>

			<?php ogo__pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->
			