<footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5 text-center">
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                                <a href="/" class="footer-logo" title="">
                                    <img src="<?php bloginfo(template_url); ?>/public/images/footer-logo.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-offset-2 text-center">
                        <div class="copyright"><?php if(!dynamic_sidebar('copy')):?><?php endif;?></div>
                    </div>
                </div>
            </div>
        </footer>
	<?php wp_footer(); ?>
	<div id="success_popup" class="modal_succ">success</div>
    </body>
</html>