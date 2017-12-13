<?php get_header(); ?>
	<section id="content" class="first clearfix" role="main">
		<div class="post-container">
		    <div class="singlebox">
			  <div class="not-found-block center">
			  <h1><?php _e('The Page You Are Looking For Doesn&rsquo;t Exist.', 'lustrous'); ?></h1>
	         <h3><?php _e('We are very sorry for the inconvenience.', 'lustrous'); ?></h3>
	         <p><?php _e('Perhaps, Try using the search box below.', 'lustrous'); ?></p>
	                    <form role="search" method="get" id="" action="<?php echo home_url(); ?>/">
	                        <input type="text" value="" name="s" id="s">
                            <input class="button" type="submit" id="searchsubmit" value="<?php _e('Search', 'lustrous'); ?>">
						</form>
					   <p><?php _e('Or', 'lustrous'); ?></p>
					   <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Go to Homepage', 'lustrous'); ?></a>
			  </div>
			</div>
		</div>
	</section> <!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>