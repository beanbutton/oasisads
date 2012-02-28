<?php

/*
 * page.php
 */
?>

<?php get_header();?>

<!-- Contents -->
<div id="main">
	<div class="container">
		<div class="textbox">
			<h3 class="title"><?php the_title();?></h3>
			<?php if (have_posts()) :
			?>
			<?php while (have_posts()) : the_post();
			?>

			<div class="post">
				<?php the_content();?>
			</div><!-- /.post -->
			<?php endwhile;?>

			<?php else :?>

			<h2 class="title">There are no contents yet.</h2>
			<p>
				Please go to WordPress CMS site and enter contents.
			</p>
			<?php endif;?>
		</div>
	</div>
</div><!--.main-->
</div><!--.content-->
</div><!--.bodyWrapper-->
<?php get_footer();?>

