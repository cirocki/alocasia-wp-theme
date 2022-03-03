<?php

/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="footer-wrapper">
			<div class="copyrights">
				<p>Copyright &copy; <time><?php echo date('Y'); ?></time> <?php echo get_bloginfo('name') ?>. All&nbsprights&nbspreserved.</p>
			</div>
			<div class="author">
				<p>Designed and developed by <a href="https://cirocki.pl/">CIROCKI.PL</a></p>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>