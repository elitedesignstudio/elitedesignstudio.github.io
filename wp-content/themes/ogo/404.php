<?php
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<div class="content">
			<img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404.svg') ?>" alt="404" />
			<h3><?php echo esc_html_x( 'Oops! Sorry, we could not find the page.', '404 Page', 'ogo' ) ?></h3>
			<div class="content-404">
				<?php echo esc_html_x( 'We looked everywhere for this page.Are you sure the website URL is correct? Get in touch with the site owner.', '404 Page', 'ogo' ) ?>
			</div>
			<div class="rb_button_wrapper">
				<a href="<?php echo esc_url(home_url( '/' )) ?>" class="rb_button medium"><?php echo esc_html_x( 'GO BACK', '404 Page', 'ogo' ) ?></a>
			</div>
		</div>
		<!-- /.content-inner -->
	<?php get_footer() ?>
