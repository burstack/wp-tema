<?php
/**
 * Template part for displaying posts.
 */

?>

	<div class="container">
		<div class="row">
			<div>
				<section>
					<?php
					// get posts & order them
					$posts = get_posts(array(
					    'post_type'         => 'frontpage',
					    'meta_key'          => 'order',
					    'posts_per_page'    => -1,
					    'orderby'           => 'meta_value_num',
					    'order'             => 'ASC'
					));

					if( $posts ):
					    foreach( $posts as $post ): 
					        setup_postdata( $post ); 
					        // get only posts that has order value & then get their content.. 
					        $meta = get_post_meta($post->ID, 'order',true);
							    	if ( ! empty ( $meta ) ) {

											$slct = get_post_meta($post->ID, 'slct', true);
											if (get_post_meta($post->ID, 'slct', true) == 'Show Titel on Front-page') {	
													the_title( '<div class="col-xs-12 col-sm-12 col-lg-12 ttls"><h1>', '</h1></div>' );
											}

							    		echo '<section id="first-page" class="flx">';
							    			
								    		echo '<div class="col-xs-12 col-sm-6 col-lg-6 sections" style="background-color:' . 
								    			get_post_meta($post->ID, 'leftcss', true) . ';
								    			background-image: url(' . get_post_meta($post->ID, 'leftimg', true) .
								    			'); " >';
										    	echo get_post_meta($post->ID, 'lefttext', true);
								    		echo '</div>'; 
										    
										    echo '<div class="col-xs-12 col-sm-6 col-lg-6 sections shadow" style="background-color:' . 
										    	get_post_meta($post->ID, 'rightcss', true) . ' ;">';
										    	echo get_post_meta($post->ID, 'righttext', true);
								    		echo '</div>';
					         		
					         		echo '</section>'; 

												 
							    	}
					     endforeach; ?>
					    <?php wp_reset_postdata(); ?>
					    <?php wp_reset_query(); ?>
					<?php endif; ?>

				</section>

			</div>
		</div><!--/.row-->
	</div><!--/.container-->
