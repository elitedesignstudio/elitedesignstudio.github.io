<?php
defined( 'ABSPATH' ) or die();

global $wp_query;

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$index = 1 + ( ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'] );
?>

	<?php get_header() ?>

		<?php if ( have_posts() ): ?>
			<div class="content blog_large" role="main" itemprop="mainContentOfPage">
				<div class="container">
					<?php get_search_form() ?>

					<?php 
						while ( have_posts() ): the_post(); 

						$extra_class = 'post';
					?>
						<div id="post-<?php the_ID() ?>" <?php post_class( $extra_class ) ?>>
							<div class="post-inner">
								<!-- Featured Media -->
								<?php echo ogo__post_featured() ?>

								<div class="post-info-wrapper">
									<!-- Post Categories -->
									<?php ogo__post_category() ?>

									<!-- Post Title -->
									<?php ogo__post_title() ?>

									<!-- Post Meta -->
									<?php ogo__post_meta() ?>

									<!-- Post Content -->
									<?php if( !empty(ogo__the_content()) ) : ?>
										<!-- Post Content -->
										<div class="post-content">
											<?php echo ogo__the_content('180') ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endwhile ?>
				</div>
			</div>
			
			<?php ogo__pagination() ?>
		<?php else: ?>
			<div class="content">
				<div class="search-no-results">
					<h3><?php echo esc_html_x( 'Nothing Found', 'Search form', 'ogo' ) ?></h3>
					<p><?php echo esc_html_x( 'Sorry, no posts matched your criteria. Please try another search', 'Search form', 'ogo' ) ?></p>
					
					<p><?php echo esc_html_x( 'You might want to consider some of our suggestions to get better results:', 'Search form', 'ogo' ) ?></p>
					<ul>
						<li><?php echo esc_html_x( 'Check your spelling.', 'Search form', 'ogo' ) ?></li>
						<li><?php echo esc_html_x( 'Try a similar keyword, for example: tablet instead of laptop.', 'Search form', 'ogo' ) ?></li>
						<li><?php echo esc_html_x( 'Try using more than one keyword.', 'Search form', 'ogo' ) ?></li>
					</ul>
				</div>
				<?php get_search_form() ?>
			</div>
		<?php endif ?>

	<?php get_footer() ?>