<?php
/*
 * index.php
 */
?>
<?php get_header();?>
<!--Contents-->
<div id="main">
	<div class="container">
		<div class="textbox">
			<?php if (have_posts()) :
			?>
			<?php while (have_posts()) : the_post();
			?>
			<div class="post">
				<?php the_content();?>
			</div><!-- /.post -->
			<?php endwhile;?>

			<div class="nav-below">
				<span class="nav-previous"><?php next_posts_link('Old Page')
					?></span>
				<span class="nav-next"><?php previous_posts_link('New Page')
					?></span>
			</div><!-- /.nav-below -->
			<?php else :?>

			<h2 class="title">Sorry, couldn't find Page</h2>
			<?php endif;?>
		</div>
	</div>
</div><!--.main-->
</div><!--.content-->
</div><!--.bodyWrapper-->
<?php get_footer();?>