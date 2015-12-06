<?php/*

Template Name: News

*/?>

<?php get_header();?>
	<div class="divider"></div>
	<div class="main">
	<div class="styling">
	<div class="container">
		<div class="news_wrap">
			<h2><span>News page</span></h2>
			<div class="container">
				<?php $additional_loop = new WP_Query("cat=14&paged=$paged"); ?>

			   <?php while ($additional_loop->have_posts()) : $additional_loop->the_post(); ?>
			   <?
			   
			   $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );

			   
			   ?>
			   <div class="col-md-6 col-xs-12 news_block">
					<div class="col-md-6 col-xs-12 news_block_image" ><a class="news_image" href="<?php the_permalink(); ?>"><img src='<?echo "/timthumb.php?src=$src[0]&h=274&w=255";?>'></a></div>
					<div class="col-md-6 col-xs-12 news_txt">
						<article>
							<h6><?php the_title()?></h6>
							<p><?php the_excerpt(); ?></p> 
							<a href="<?php the_permalink(); ?>">Read more ></a> 
						</article>
					</div>
				</div>
				
			   <?php endwhile; ?>
			   <div class="clear"></div>
			  <nav class="pagination_nav"><?kriesi_pagination($additional_loop->max_num_pages);?></nav>
			</div>
		</div>	
	</div>		
	</div>		
	</div>			
<?php get_footer();?>        