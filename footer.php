<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Iamronald
 */
?>

		</div><!-- #content -->

		<footer id="footer" class="site-footer" role="contentinfo">
			<div class="row">
				<div class="col-xs-6">
					<p class="copyright">Copyright <?=date('Y')?> <a href="<?=get_bloginfo('url')?>"><?=get_bloginfo('name')?></a>. All Rights Reserved.</p>
				</div>
				<div class="col-xs-6">
					<ul>
						<li><a href=""><img src="<?php bloginfo('template_directory'); ?>/assets/img/github.png"></a></li>
						<li><a href=""><img src="<?php bloginfo('template_directory'); ?>/assets/img/twitter.png"></a></li>
						<li><a href=""><img src="<?php bloginfo('template_directory'); ?>/assets/img/soundcloud.png"></a></li>
					</ul>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- .container -->
</div> <!-- #main -->

<div id="sidenav" data-state="closed">
	<?php get_sidebar(); ?>
</div>
<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/prettify/prettify.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/iamronald.js" type="text/javascript"></script>
</body>
</html>
