<?php get_header(); ?>

			<div class="map-margin">
				<?php
				function prefix_pronamic_google_maps_marker_options_icon( $url ) {
					$categories = get_the_category();
					$category   = array_shift( $categories );
					if ( ! empty( $category ) ) {
						// Store icons as .png files in theme root folder /icons/
						$path = '/icons/' . $category->slug . '.png';
						$file = get_stylesheet_directory() . $path;
						if ( file_exists( $file ) ) {
							$url = get_stylesheet_directory_uri() . $path;
						}
					}
					return $url;
				}
				add_filter( 'pronamic_google_maps_marker_options_icon', 'prefix_pronamic_google_maps_marker_options_icon' );

				if ( function_exists( 'pronamic_google_maps_mashup' ) ) {
					pronamic_google_maps_mashup(
						array(
				      'post_type' => 'map',
				      'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => array('farm') 
								)
							),
				  	),

						array(
							'width'          => full,
				      'height'         => 610, 
				      'nopaging'       => true,
				      'map_type_id'    => 'terrain',
				      'marker_clusterer_options' => array(
								'gridSize' => 60,
							),
							'marker_options' => array(
								'icon' => '/skyfarms/wp-content/themes/skyfarms/icons/farm.png',
							),
						)
					);
				}

				?>
			</div><!-- .map-margin -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
