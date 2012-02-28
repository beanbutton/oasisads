<?php
/*
 * index.php
 */
?>
<?php get_header();?>
<!--Contents-->
<div class="container">
	<div id="headmast">
		<!--Jquery meteor carousel-->
		<?php
			if (function_exists('meteor_slideshow')) { meteor_slideshow();
			}
		?>
	</div>
</div>
<div id="main">
	<div class="container">
		<div class="textbox">
			<?php the_content();?>
		</div>
	</div>
</div><!--.main-->
</div><!--.content-->
</div><!--.bodyWrapper-->
<?php get_footer();?>