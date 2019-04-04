<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>

			</div>
		</div><!-- .container -->
	</div><!-- #content -->

	<?php do_action('greatmag_before_footer'); ?>
	
	<footer id="colophon" class="site-footer">
		<?php do_action('greatmag_footer'); ?>
	</footer><!-- #colophon -->

	<?php do_action('greatmag_after_footer'); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Defer parsing JavaScript to reduce blocking of page rendering. -->
<script type="text/javascript">
function parseJSAtOnload() {
var links = ["defer1.js", "defer2.js", "defer3.js"],
headElement = document.getElementsByTagName("head")[0],
linkElement, i;
for (i = 0; i < links.length; i++) {
linkElement = document.createElement("script");
linkElement.src = links[i];
headElement.appendChild(linkElement);
}
}
if (window.addEventListener)
window.addEventListener("load", parseJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", parseJSAtOnload);
else window.onload = parseJSAtOnload;
</script>
<!-- Defer parsing JavaScript to reduce blocking of page rendering end. -->

</body>
</html>
