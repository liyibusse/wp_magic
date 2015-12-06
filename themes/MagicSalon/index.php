<?php get_header();?>
        <div id="home" class="slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
					<?php $main_slider = new WP_Query( array('post_type' => 'main_slider') );
					$i=0;?>
					<?php if ($main_slider->have_posts()) : while ($main_slider->have_posts()) : $main_slider->the_post(); ?>
						<div class="item">
							<?php the_post_thumbnail(); $i++?>
							<div class="carousel-caption">
								<div class="caption-box">
									<div class="caption-inner">
										<div class="caption-title"><?php the_title(); ?> </div>
										<div class="caption-text">
											 <?php the_content(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php endwhile; ?>
					<?php endif; ?>
                </div>
                <ol class="carousel-indicators">
					<?php 
					for($in=0;$in<$i;$in++){
						echo "<li data-target='#carousel-example-generic' data-slide-to='$in' ></li>";
					}
                   ?>
                </ol>
            </div>
            <div class="socials">
				<?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>
            </div>
        </div>
        <div id="team" class="main">
            <div class="styling">
                <div class="container">
                    <h2><span>Hair Styling</span></h2>
					<div class="hair_styling">
						<?php
						$id=3; 
						$n=4;  
						$recent = new WP_Query("cat=$id&showposts=$n"); 
						while($recent->have_posts()) : $recent->the_post();
						?>
							<div class="styling-box col-xs-12">
								<div class="styling-img col-sm-5 col-xs-12">
									<?php the_post_thumbnail();?>
								</div>
								<div class="col-sm-7 col-xs-12">
									<div class="styling-body">
										<div class="styling-text">
											<?php the_content(); ?>
											<div class="styling-foot">
												<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
                </div>
            </div>
            <div class="price">
                <div class="container">
                    <h2><span>Price</span></h2>
                    <div class="row">
                        <div class="col-md-3 col-sm-12" id="woman">
                            <div class="price-subtitle"><?php if(!dynamic_sidebar('pricetext1')):?><?php endif;?></div>
                            <div class="price-aside"><?php if(!dynamic_sidebar('pricetext2')):?><?php endif;?></div>
                        </div>
                        <div class="col-md-8 col-md-offset-1 col-sm-12" id="man">
							<?php
							$id=4; 
							$n=2;  
							$recent = new WP_Query("cat=$id&showposts=$n"); 
							while($recent->have_posts()) : $recent->the_post();
							?>
							<div class="table_post">
                                <h5><span><?php the_title(); ?></span></h5>
								<div class="table-striped">
									<?php the_content(); ?>
								</div>
							</div>
							<?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="gallery" class="gallery">
                <div class="container">
                    <h2><span>Gallery</span></h2>
                    <div id="source">
						 <button class="btn active" data-filter="*">All</li>
						<?php 

						$cat = 11;
						$categories = get_categories('parent='.$cat.''); 
						foreach ($categories as $category) { $i++; }

							echo "";
							foreach ($categories as $category) { ?>
								<button  class="btn" data-filter=".<?php echo $category->name; ?>"><?php echo $category->name; ?></button>
							<?php } 
							echo "";

						?>
                    </div>
                    <div id="destination" class="row">
						<?
						function category_id_class( $classes ) {
							global $post;
							foreach ( ( get_the_category( $post->ID ) ) as $category ) {
								$classes[] = $category->category_nicename;
							}
							return $classes;
						}
						add_filter( 'post_class', 'category_id_class' );
						add_filter( 'body_class', 'category_id_class' );
						?>
						<?php
						$id=11; 
						$n=20; 
						$recent = new WP_Query("cat=$id&showposts=$n"); 
						while($recent->have_posts()) : $recent->the_post();
						?>
						
						<a id="post-<?php the_ID(); ?>" <?php post_class( 'item fancybox col-xs-4 transition' , $classes ); ?> href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); echo $src[0]; ?>" class="" rel="group">
						<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
						</a>
						
						<?php endwhile; ?>
                    </div>
					
                </div>
            </div>
            <div id="contacts" class="contacts">
                <div class="container">
                    <h2><span>Contact</span></h2>
                    <div class="contacts-body">
                            <div class="contacts-block">
                                <div class="contacts-cell">
                                    <div class="contacts-box">
                                        <div class="contacts-title">Magic Salon</div>
                                        <address>
                                            <?php if(!dynamic_sidebar('address')):?><?php endif;?>
                                        </address>
                                        <div class="work-time">
                                             <?php if(!dynamic_sidebar('work_time')):?><?php endif;?>
                                        </div>
                                        <div class="phone">
                                            <?php if(!dynamic_sidebar('phone')):?><?php endif;?>
                                        </div>
                                        <div class="email">
                                             <?php if(!dynamic_sidebar('email')):?><?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="contacts-inner">
                            <div class="contacts-block">
                                <div class="contacts-cell">
                                    <div class="contacts-box">
                                        <div class="contacts-title">Drop us a line</div>
                                        <form role="form" id="form1" onsubmit='return false'>
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="<?php bloginfo(template_url); ?>/public/images/icon_name.png" alt=""></span>
                                                <input type="text" class="form-control" placeholder="name"  name="name_inp" >
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="<?php bloginfo(template_url); ?>/public/images/icon_mail.png" alt=""></span>
                                                <input type="text" class="form-control validate" placeholder="mail" title='this field can not be empty'  name="mail_inp" >
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="<?php bloginfo(template_url); ?>/public/images/icon_phone.png" alt=""></span>
                                                <input type="text" class="form-control" placeholder="phone"  name="phone_inp" >
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><img src="<?php bloginfo(template_url); ?>/public/images/icon_subject.png" alt=""></span>
                                                <input type="text" class="form-control" placeholder="subject"  name="subject_inp" >
                                            </div>
                                            <div class="input-group textarea">
                                                <span class="input-group-addon"><img src="<?php bloginfo(template_url); ?>/public/images/icon_mess.png" alt=""></span>
                                                <textarea class="form-control"  name="text_inp"  rows="4" placeholder="message"></textarea>
                                            </div>
                                            <button class="btn send_button" type='submit' rel='form1'>Send Message!</button>
												<input type="hidden" name="form_name" value="Message from your site"/>
												<input type="hidden" name="action" value='send_form'/>
												<input type="hidden" name="action_type" value='order_form'/> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="map" class="map">
                    <div class="disabler"></div>
                    <?php if(!dynamic_sidebar('map')):?><?php endif;?>
                </div>
            </div>
        </div>
<?php get_footer();?>        