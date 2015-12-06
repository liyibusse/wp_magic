<?/* session_start();  $_SESSION['admin_email']=get_option( 'admin_email' ); */?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="<?php bloginfo(template_url); ?>/public/css/jquery.fancybox.css?v=2.1.5" media="screen" >
        <link href="<?php bloginfo(template_url); ?>/public/css/tooltipster.css" rel="stylesheet">
        <link href="<?php bloginfo(template_url); ?>/public/css/tooltipster-shadow.css" rel="stylesheet">
        <link href="<?php bloginfo(template_url); ?>/public/css/styles.css" rel="stylesheet">
		<link href="<?php bloginfo(template_url); ?>/public/css/custom.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
        <link href="<?php bloginfo(template_url); ?>/public/fonts/againts/stylesheet.css" rel="stylesheet">
        <link href="<?php bloginfo(template_url); ?>/public/fonts/henrididot/stylesheet.css" rel="stylesheet">
		<link rel="shortcut icon" href="<?php bloginfo(template_url); ?>/public/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php bloginfo(template_url); ?>/public/favicon.ico" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?php bloginfo(template_url); ?>/public/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo(template_url); ?>/public/js/jquery.fancybox.pack.js?v=2.1.5"></script>
        <script src="<?php bloginfo(template_url); ?>/public/js/jquery.quicksand.js"></script>
        <script src="<?php bloginfo(template_url); ?>/public/js/isotope.pkgd.min.js"></script>
        <script src="<?php bloginfo(template_url); ?>/public/js/jquery.tooltipster.min.js"></script>
        <script src="<?php bloginfo(template_url); ?>/public/js/main.js"></script>
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript">
		$(function(){
			$('.send_button').click(function(){
			 var parentClass=$(this).attr('rel');
			 var paramsFancy={
				'scrolling':0,
				'autoScale': true,
				'transitionIn': 'elastic',
				'transitionOut': 'elastic',
				'speedIn': 500,
				'speedOut': 300,
				'autoDimensions': true,
				'centerOnScroll': true,
				'href' : '#success_popup',
				'padding' : '0',
				'height' : 'auto',
				helpers: {
						overlay: {
						  locked: false
						}
					}
				};
				validate=1;
				validate_msg='';
				form=$('#'+$(this).attr('rel'));
				 jQuery.each(form.find('.validate'), function(key, value) {
					if($(this).val()==''){
						validate_msg+=$(this).attr('title')+'\n';validate=0;
						$(this).focus();
						$(this).addClass('red_input');
						$(this).tooltipster('update', $(this).attr('title'));
						$(this).tooltipster('show');
					}else{
						$(this).tooltipster('hide');
						$(this).removeClass('red_input');
					}
				});
				if(validate==1){
					$.ajax({
						url: '<?php bloginfo(template_url); ?>/msend.php',
						data: 'action=send_form&'+form.serialize(),
						success: function(data){
							$.fancybox.open(paramsFancy);
						}
					});
					
				}else{
					/*alert(validate_msg);*/
				} 
			});
			$('.right').tooltipster({
				trigger: 'custom',
				animation:'grow',
				theme: 'tooltipster-shadow',
				onlyOne: false,
				position: 'right'
			});
			$('.order_consult_inp').tooltipster({
				trigger: 'custom',
				animation:'grow',
				theme: 'tooltipster-shadow',
				onlyOne: false,
				position: 'right'
			});
			$('form input[type="text"]').tooltipster({
				trigger: 'custom',
				animation:'grow',
				theme: 'tooltipster-shadow',
				onlyOne: false,
				position: 'right'
			});
			 $('form textarea').tooltipster({
				trigger: 'custom',
				animation:'grow',
				theme: 'tooltipster-shadow',
				onlyOne: false,
				position: 'bottom'
			});
		});
		</script>
		<?php wp_head(); ?>
    </head>
    <body>
        <header  class=" navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        <a class="logo" href="/" title="">
                            <img src="<?php bloginfo(template_url); ?>/public/images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5">
                        <nav class="top-menu">
                            <div class="navbar-header">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse linked_menu">
                                
								<?php wp_nav_menu( array(
									'container'=>'',
									'menu_class'=>'nav navbar-nav',
									'theme_location'=>'top',
									'walker' => new Bootstrap_Walker_Nav_Menu()
								) ); ?> 
									<!--
								   <li><a href="#" title="">home</a></li>
                                    <li><a href="#" title="">team</a></li>
                                    <li class="dropdown"><a id="dLabel" href="#" title="" data-toggle="dropdown" role="button">price</a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                            <li><a href="#" title="">Woman</a></li>
                                            <li><a href="#" title="">Man</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" title="">gallery</a></li>
                                    <li><a href="#" title="">contacts</a></li>
                                    <li><a href="#" title="">news</a></li>
									-->
                               
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                        <div class="feedback">
                            <a href="http://wp1.sera2007.info/appointment/" class="btn">Make an appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>