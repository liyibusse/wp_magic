<?php get_header();?>
	<div class="divider"></div>
	<div class="main">
	<div class="styling nobg">
	<div class="container">
		<div class="page_box">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h2><span><?php the_title()?></span></h2>
			<?php the_content(); ?>

			<?php endwhile; ?>

			<?php endif; ?>
		</div>	
	</div>		
	</div>		
	</div>		
<?php get_footer();?>        