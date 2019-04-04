<?php
/**
 * Template Name: Archive
 * Template Post Type: map
 * The template for displaying MAP list page.
 */
get_header(); ?>

<?php

get_header(); ?>

<div class="wrap-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h5 style="text-align: center; margin: 2em 0 0 0; color: #616161; background-color: #eeeeee;">Click the table headers to sort the table accordingly:
				<br>(It can take a second before table organize itself)</h5>

			<table id="myTable" style="background-color: #eeeeee;">
			  <tr>
			    <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer"><h5 style="text-align: center;">Name</h5></th>
			    <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer"><h5 style="text-align: center;">Site</h5></th>
			    <th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer"><h5 style="text-align: center;">Tags</h5></th>
			  </tr>

			  <?php
					$args = array(
					    'post_type' => 'map',
					    'post__not_in' => array (get_the_ID()),
					    'orderby'   => 'meta_value',
			    		'order' => 'ASC',
			    		'posts_per_page' => -1,
					);
					$loop = new WP_Query($args);
					while($loop->have_posts()): $loop->the_post();
				?>

			  <tr class="item">
			    <td><p style="margin:0;padding:0;"><?php echo "<a href=" . get_permalink() . ">";
			    echo the_title() . "</a> " ?></p></td>
			    <?php if (!empty(get_post_meta(get_the_ID(), 'website', TRUE))) { ?>
			    <td><p style="margin:0;padding:0;"><?php echo "<a href=" . get_post_meta(get_the_ID(), 'website', TRUE) . ">" . get_post_meta(get_the_ID(), 'website', TRUE) . "</a> " ?></p></td>
			    <?php } else { ?>
			    <td><?php echo "NaN"; ?></td>
			    <?php } ?>
			    <td><p style="margin:0;padding:0;"><?php echo get_the_category_list( ' ', ', ','' ); ?></p></td>
			  </tr>

				<?php endwhile; ?>

			</table><br>


			<?php
			wp_reset_query();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>

