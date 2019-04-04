<?php
/**
 * The header for our theme.
 *
 * The template that displays all of the <head> and everything until <div id="content">
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" data-bodyimg="<?php header_image(); ?>" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'greatmag' ); ?></a>

	<?php 
	do_action('greatmag_before_header');

	do_action('greatmag_header');

	do_action('greatmag_after_header');
	?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
