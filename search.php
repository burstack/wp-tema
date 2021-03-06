<?php
/**
 * The template for displaying search results pages.
 */

get_header();

$slmod = get_theme_mod( 'search_layout' );
$slayout = get_theme_mod( 'search_layout', 'list' );

if( isset($slmod) && $slmod != false ) {
	if ( ($slayout == 'masonry-full') ) {
		$cols = 'fullwidth';
	} else {
		$cols = 'col-md-8';
	}
}else{
	$cols = 'col-md-8';
}

?>

	<section id="primary" class="content-area <?php echo $cols; ?>">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'greatmag' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
if( isset($slmod) && $slmod != false ) {
	if ( $slayout != 'masonry-full' ) {
		get_sidebar();
	}
} else {
	get_sidebar();
}
get_footer();
