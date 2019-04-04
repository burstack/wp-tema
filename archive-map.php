<?php get_header(); ?>

<!-- Modal -->
<div class="mod">
	<div class="mod-head">
		<p style="font-weight: bold;"><a STYLE="font-size: 16px;" href="http://skyfarms.io/map/archive/">SEE LIST VIEW</a> HERE YOU WILL CONVENIENTLY SEARCH RESOURCES IN YOUR LOCAL AREA TO:</p>
	</div>
	<div class="mod-body">
		<div class="mod-txt"><img class="mod-icon" src="http://skyfarms.io/wp-content/themes/sky/icons/farm.png"><p>Farm</p><span>: FIND LOCAL, FRESH, HEALTHY FOOD</span></div>
		<div class="mod-txt"><img class="mod-icon" src="http://skyfarms.io/wp-content/themes/sky/icons/info.png"><p>Info</p><span>: DESIGNED TO SOLVE FOOD SCARCITY</span></div>
		<div class="mod-txt"><img class="mod-icon" src="http://skyfarms.io/wp-content/themes/sky/icons/tech.png"><p>Tech</p><span>: HARDWARE & SOFTWARE FOR SMART FARMING</span></div>
	</div>
</div>
<!-- Modal end -->


			<div class="map-margin">

				<?php

				function prefix_pronamic_google_maps_mashup_item( $content ) {
					$content  = '';
					$content .= '<div style="font-size: 16px;">';
					$content .= '<div style="text-align: center;">';
					$content .= '<a href="' . get_permalink() . '">';
					$content .= get_the_title();
					$content .= '</a>';
					$content .= '</div>';
					$content .= '<br /><strong>adress:</strong> ';
					$content .= get_post_meta( get_the_ID(), '_pronamic_google_maps_address', true  );
					$content .= '<br /><strong>category:</strong> ';
					$content .= get_the_category_list( ' ', ', ','' );
					$content .= '</div>';
					$content .= '';
					return $content;
				}
				add_filter( 'pronamic_google_maps_mashup_item', 'prefix_pronamic_google_maps_mashup_item' );

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
									'terms' => array('info', 'tech', 'farm') 
								)
							),
				  	),

						array(
							'width'          => full,
				      'height'         => 710, 
				      'nopaging'       => true,
				      'map_type_id'    => 'terrain',
				      'marker_clusterer_options' => array(
								'gridSize' => 60,
							),
							'marker_options' => array(
								'icon' => '/skyfarms/wp-content/themes/skyfarms/icons/farm.png',
							),

							// COLOR TWEAKS MAP
							'map_options'    => array(
								'styles'     => array(

									(object) array(
										'featureType' => 'water',
										'elementType' => 'geometry',
										'stylers'     => array(
											(object) array( 'visibility' => 'on' ),
											(object) array( 'color' => '#b9d3c2' ),
										),
									),

									(object) array(
										'featureType' => 'water',
										'elementType' => 'labels.text.fill',
										'stylers'     => array(
											(object) array( 'visibility' => 'on' ),
											(object) array( 'color' => '#92998d' ),
										),
									),

									(object) array(
										'featureType' => 'water',
										'elementType' => 'labels.text.stroke',
										'stylers'     => array(
											(object) array( 'visibility' => 'on' ),
											(object) array( 'color' => '#17263c' ),
										),
									),			

									(object) array(
		                'featureType' => 'administrative',
		                'elementType' => 'geometry.stroke',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#c9b2a6' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'administrative.land_parcel',
		                'elementType' => 'geometry.stroke',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#dcd2be' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'administrative.land_parcel',
		                'elementType' => 'labels.text.fill',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#ae9e90' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'landscape.natural',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#dfd2ae' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'poi',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#dfd2ae' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'poi',
		                'elementType' => 'labels.text.fill',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#93817c' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'poi.park',
		                'elementType' => 'geometry.fill',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#a5b076' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'poi.park',
		                'elementType' => 'labels.text.fill',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#447530' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#f5f1e6' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road.arterial',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#fdfcf8' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road.highway',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#f8c967' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road.highway',
		                'elementType' => 'geometry.stroke',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#e9bc62' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road.highway.controlled_access',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#e98d58' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road.highway.controlled_access',
		                'elementType' => 'geometry.stroke',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#db8555' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'road.local',
		                'elementType' => 'labels.text.fill',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#806b63' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'transit.line',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#dfd2ae' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'transit.line',
		                'elementType' => 'labels.text.fill',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#8f7d77' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'transit.line',
		                'elementType' => 'labels.text.stroke',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#ebe3cd' ),
		              	),
		              ),

		              (object) array(
		                'featureType' => 'transit.station',
		                'elementType' => 'geometry',
		                'stylers' 		=> array(
		                	(object) array( 'visibility' => 'on' ),
		                	(object) array( 'color' => '#dfd2ae' ),
		              	),
		              ),

								),
							),
							// COLOR TWEAKS MAP end

						)
					);
				}
				?>
			</div><!-- .map-margin -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();