<?php
/**
 * The template for displaying all single MAP posts.
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="col-xs-12 col-sm-6 col-lg-4">
			<?php
				if ( function_exists( 'pronamic_google_maps' ) ) {
				    pronamic_google_maps( array(
				        'width'  => 280,
				        'height' => 400 
				    ) );
				}
			?>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-8">
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content-single-map', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->
<div style="padding-bottom: 5em;"></div>
<?php get_footer();
