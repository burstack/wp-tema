<?php
/**
 * The template for displaying 404 pages (not found).
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<div class="notice-404">404</div>

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Woopsie Daisy!' . ' We Broke Something.', 'greatmag' ); ?></h1>
					<h3 class="page-title"><?php esc_html_e( '(Or You Can&rsquo;t Type!)', 'greatmag' ); ?></h3>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Maybe go back home or see the latest posts below.', 'greatmag' ); ?></p>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn back-to-page"><?php esc_html_e( 'Back home', 'greatmag'); ?></a>

					<?php
						the_widget( 'Athemes_Posts_Carousel' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
