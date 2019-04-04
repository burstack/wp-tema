<?php
/**
 * Template Name: front-page
 * Template Post Type: page
 * The template for displaying the front-page.
 */
get_header();
?>

	<div class="container">
		<div class="row">
			<div class="frontpage">

				<!-- Modal -->
						  <div class="info-dialog">
						    <div class="info-content">

						    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							    	<div class="banner banner-url1">
								      <div class="info-titel">
								      	<h2>HERE. WE. GROW.</h2>
								      	<h3>WE ARE A FARM-TO-FORK COMMUNITY UNITING FOR THE ADVANCEMENT OF ACCESS TO SUSTAINABLE AGRICULTURE</h3>
								      </div>
							    	</div>
						    	</div>


						      <div class="info-body">
						        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 info-height" >
						        	<div class="info-frame info-pic-1">
						        		<a>
							        		<div class="info-overlay">
								        		<h3>Citizen</h3>
								        		<span>Be The Solution to Food Scarcity & Hunger. Find food from local farms. Access convenient, easy ways to participate in community supported, and sustainable agriculture.  Start a farm. Grow your own food. Or try our online learning course to get certified in smart cities, sustainable innovation, and social design. </span>
								        	</div>
								        </a>
						        	</div>
						      	</div>
						        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 info-height">
						        	<div class="info-frame info-pic-2">
						        		<a>
							        		<div class="info-overlay">
								        		<h3>Farmer</h3>
								        		<span>We’re Rooting For You To Keep Growing.  Find the space, info, tech and incentives to maximise crop yield.  Use our peer-to-peer marketplace to connect to new distribution channels and loyal customers.  Join our chorus of farming experts who are teaching the next generation how to grow their own food.</span>
								        	</div>
							        	</a>
						        	</div>
						        </div>
						        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 info-height">
						        	<div class="info-frame info-pic-3">
						        		<a>
							        		<div class="info-overlay">
								        		<h3>Innovator</h3>
								        		<span>Collective Intelligence, Designed to Solve, Impact and Sustain. Collaborate with over 400 featured agricultural Pioneers, Scientists, Engineers, Educators, Visionaries, Organisations, and Businesses committed to achieving the 2030 Sustainable Development Goals, paving the way for the future of food, and humanity.</span>
								        	</div>
							        	</a>
						        	</div>
						        </div>
						        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 info-height">
						        	<div class="info-frame info-pic-4">
						        		<a href="http://skyfarms.io/challenges/">
							        		<div class="info-overlay">
								        		<h3>Developer</h3>
								        		<span>Coding for Crops.  Turn those 1s, and 0s, into access to food.  From layout, UX, and style to designing match*search engines and farming simulators, take a go at one of our Github challenges and earn awards, expand our ability to create a food democracy and address climate change.</span>
								        	</div>
							        	</a>
						        	</div>
						        </div>
						      </div>
						    </div>
						  </div>
				<!-- Modal end -->

				<!-- Modal -->
						  <div class="info-dialog">
						    <div class="info-content">

						    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						    		<a href="http://skyfarms.io/map/">
							    	<div class="banner banner-url2">
								      <div class="info-titel">
								      	<h2>SKYFARMS AGRIHUB</h2>
								      	<h3>IT´S GOOD TO KNOW WHERE TO GROW<br>Access over 300 preferred partners, from 30 countries, on 3 continents<br> sharing technology, information and incentives to grow smarter cities and communities.</h3>
								      </div>
							    	</div>
							    	</a>
						    	</div>


						      <div class="info-body">
						        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 info-height" >
						        	<div class="info-frame info-pic-5">
						        		<a href="http://skyfarms.io/category/info/">
							        		<div class="info-overlay"><h3>INFORMATION</h3>
							        			<div class="sky-info sky-tweak"></div>
								        		
								        		<span class="centrera">DESIGNED TO SOLVE FOOD SCARCITY</span>
								        	</div>
							        	</a>
						        	</div>
						      	</div>
						        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 info-height">
						        	<div class="info-frame info-pic-6">
						        		<a href="http://skyfarms.io/category/farm/">
							        		<div class="info-overlay"><h3>FARMS</h3>
							        			<div class="sky-farm sky-tweak"></div>
								        		
								        		<span class="centrera">FIND LOCAL, FRESH, HEALTHY FOOD</span>
								        	</div>
							        	</a>
						        	</div>
						        </div>
						        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 info-height">
						        	<div class="info-frame info-pic-7">
						        		<a href="http://skyfarms.io/category/tech/">
							        		<div class="info-overlay"><h3>TECHNOLOGY</h3>
							        			<div class="sky-tech sky-tweak"></div>
								        		
								        		<span class="centrera">HARDWARE & SOFTWARE FOR SMART FARMING</span>
								        	</div>
							        	</a>
						        	</div>
						        </div>
						      </div>
						    </div>
						  </div>
				<!-- Modal end -->

				<!-- front-page content -->			
					<div class="col-xs-12 col-sm-12 col-lg-12">
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
															the_title( '<div class="col-xs-12 col-sm-12 col-lg-12 titel-front"><h1>', '</h1></div>' );
													}

									    		echo '<section id="first-page" class="flx">';

									    			
										    		echo '<div class="col-xs-12 col-sm-6 col-lg-6 sections sectleft shadow" style="background-color:' . 
										    			get_post_meta($post->ID, 'leftcss', true) . ';
										    			background-image: url(' . get_post_meta($post->ID, 'leftimg', true) . '); " >';

										    			$lcs = get_post_meta($post->ID, 'leftimg', true);
												    		if ($lcs) {
												    			echo '<div class="overlay"></div>';
												    		}
												    		
												    	echo get_post_meta($post->ID, 'lefttext', true);
										    		echo '</div>'; 
												    
												    echo '<div class="col-xs-12 col-sm-6 col-lg-6 sections sectright shadow" style="background-color:' . 
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
				<!-- front-page content end -->

			</div><!--/.frontpage-->
		</div><!--/.row-->
	</div><!--/.container-->


<!-- partners -->
	<?php if ( ! empty ( get_theme_mod('partners_box') ) ) {
	echo '<div id="partner" class="partners"><p>Featured AgTech Companies</p>' . do_shortcode(get_theme_mod('partners_box')) . '</div>';
	} ?>
<!-- partners -->


<?php get_footer(); ?>
