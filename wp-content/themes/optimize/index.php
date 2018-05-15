<?php get_header(); ?>
<?php
$GLOBALS['ishome'] = "true"; // Used in the footer.php
global $woo_options;
?>

		<?php 
		// Set the alignment of featured area
		if ( $woo_options['woo_featured_right'] == "true" ) { 
			$float1 = "fr"; $float2 = "fl"; 
		} else {
			$float1 = "fl"; $float2 = "fr"; 
		}
		?>
	
		<!-- Featured Area --> 
        <div id="featured" class="home">
            <div class="col-full">
            	<div class="featured-image <?php echo $float1; ?>">
	                <a href="<?php echo $woo_options['woo_featured_url']; ?>" <?php if ($woo_options['woo_featured_lightbox'] == "true") echo 'rel="prettyPhoto"'; ?> title="<?php echo $woo_options['woo_featured_image_title']; ?>"><img src="<?php echo $woo_options['woo_featured_image']; ?>" alt="" /></a>
                	<?php if ($woo_options['woo_featured_play'] == "true") { ?>
                    <a href="<?php echo $woo_options['woo_featured_url']; ?>" <?php if ($woo_options['woo_featured_lightbox'] == "true") echo 'rel="prettyPhoto"'; ?> title="<?php echo $woo_options['woo_featured_image_title']; ?>" class="play"></a>
                    <?php } ?>
                </div>
                <div class="featured-content <?php echo $float2; ?>">
                	<h2><?php echo stripslashes($woo_options['woo_featured_title']); ?></h2>
                    <p>
					<?php echo stripslashes($woo_options['woo_featured_text']); ?>
                    </p>
                    <?php if ($woo_options['woo_featured_btn1_title']) { ?><a href="<?php echo $woo_options['woo_featured_btn1_url']; ?>" class="button"><span><?php echo stripslashes($woo_options['woo_featured_btn1_title']); ?></span></a><?php } ?>
                    <?php if ($woo_options['woo_featured_btn2_title']) { ?><a href="<?php echo $woo_options['woo_featured_btn2_url']; ?>" class="button"><span><?php echo stripslashes($woo_options['woo_featured_btn2_title']); ?></span></a><?php } ?>
                </div>
            </div>
        </div>
        
		<?php if ($woo_options['woo_sub'] == "true") { 
			$lb = $woo_options['woo_sub_lightbox'];
			if ( $woo_options['woo_sub_gallery'] == "true" ) $gallery = "prettyPhoto[gallery1]"; else $gallery = "prettyPhoto";
		?>
        <div id="breadcrumb" class="home">
        	<div class="col-full">
            	<div class="left <?php echo $float1; ?>">
					<a <?php if ($lb == "true") echo 'rel="'.$gallery.'" '; ?>href="<?php echo $woo_options['woo_sub_thumb1_url']; ?>" title="<?php echo $woo_options['woo_sub_thumb1_title']; ?>" class="thumb"><img src="<?php echo $woo_options['woo_sub_thumb1']; ?>" alt="" class="thumb" /></a>
					<a <?php if ($lb == "true") echo 'rel="'.$gallery.'" '; ?>href="<?php echo $woo_options['woo_sub_thumb2_url']; ?>" title="<?php echo $woo_options['woo_sub_thumb2_title']; ?>" class="thumb"><img src="<?php echo $woo_options['woo_sub_thumb2']; ?>" alt="" class="thumb" /></a>
					<a <?php if ($lb == "true") echo 'rel="'.$gallery.'" '; ?>href="<?php echo $woo_options['woo_sub_thumb3_url']; ?>" title="<?php echo $woo_options['woo_sub_thumb3_title']; ?>" class="thumb"><img src="<?php echo $woo_options['woo_sub_thumb3']; ?>" alt="" class="thumb" /></a>
					<a <?php if ($lb == "true") echo 'rel="'.$gallery.'" '; ?>href="<?php echo $woo_options['woo_sub_thumb4_url']; ?>" title="<?php echo $woo_options['woo_sub_thumb4_title']; ?>" class="thumb"><img src="<?php echo $woo_options['woo_sub_thumb4']; ?>" alt="" class="thumb" /></a>
					<a <?php if ($lb == "true") echo 'rel="'.$gallery.'" '; ?>href="<?php echo $woo_options['woo_sub_thumb5_url']; ?>" title="<?php echo $woo_options['woo_sub_thumb5_title']; ?>" class="thumb"><img src="<?php echo $woo_options['woo_sub_thumb5']; ?>" alt="" class="thumb" /></a>
                </div>
                <div class="right <?php echo $float2; ?>">
                	<h2><?php echo stripslashes($woo_options['woo_sub_title']); ?></h2>
                    <p><?php echo stripslashes($woo_options['woo_sub_text']); ?></p>
                </div>
                <div class="fix"></div>
			</div>
        </div>     
        <?php } ?>
        <!-- /Featured Area --> 
                 
	</div><!-- /#top -->
    
    <div id="content">
    <div class="col-full">
    
    	<!-- Twitter --> 
		<?php if ( $woo_options['woo_twitter'] ) { ?>    
		<div id="twitter"<?php if ( $woo_options['woo_sub'] <> "true" ) echo ' class="twitter-if"'; ?>>
        	<a href="http://www.twitter.com/<?php echo $woo_options['woo_twitter']; ?>" title="<?php _e('Follow us on Twitter', 'woothemes'); ?>" class="fl" ><img src="<?php bloginfo('template_directory'); ?>/images/ico-twitter.png" alt="" /></a>
            <ul id="twitter_update_list" class="twitter_container"><li></li></ul>
        </div>   
        <?php } ?>
        <!-- /Twitter --> 
        
        <!-- Optional page insert #1 --> 
        <?php if ( $woo_options['woo_main_page1'] && $woo_options['woo_main_page1'] <> "Select a page:" ) { ?>
        <div id="main-page1" class="entry">
			<?php query_posts('page_id=' . get_page_id($woo_options['woo_main_page1'])); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
		    <?php the_content(); ?>
            <?php endwhile; endif; ?>
            <div class="fix"></div>
        </div><!-- /#main-page1 -->
        <?php } ?>
        <!-- /Optional page insert #1 --> 
        
        <!-- Mini Features --> 
        <?php if ( $woo_options['woo_main_pages'] == "true" ) { ?>
        <div id="mini-features">
        
        <?php query_posts('post_type=infobox&order=ASC&posts_per_page=20'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); $counter++; ?>		        					

			<?php 
				$icon = get_post_meta($post->ID, 'mini', true); 
				$excerpt = get_post_meta($post->ID, 'mini_excerpt', true);
				$button = get_post_meta($post->ID, 'mini_readmore', true);
			?>
			<div class="block">
				<?php if ( $icon ) { ?>
                <img src="<?php echo $icon; ?>" alt="" class="home-icon" />				
                <?php } ?> 
                                                     
                <div class="<?php if ( $icon ) echo 'feature'; if ( $counter == 2 ) echo ' last'; ?>">
                   <h3><?php echo get_the_title(); ?></h3>
                   <p><?php echo stripslashes($excerpt); ?></p>
                   <?php if ( $button ) { ?><a href="<?php echo $button; ?>" class="btn"><?php _e('Read More', 'woothemes'); ?></a><?php } ?>
                </div>
			</div>
			<?php if ( $counter == 2 ) { $counter = 0; echo '<div class="fix"></div>'; } ?>				
                
        <?php endwhile; endif; ?>

            <div class="fix"></div>
        </div><!-- /#mini-features -->
        <?php } ?>
        <!-- /Mini Features --> 
        
        <!-- Optional page insert #2 --> 
        <?php if ( $woo_options['woo_main_page2'] && $woo_options['woo_main_page2'] <> "Select a page:" ) { ?>
        <div id="main-page1" class="entry">
			<?php query_posts('page_id=' . get_page_id($woo_options['woo_main_page2'])); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
		    <?php the_content(); ?>
            <?php endwhile; endif; ?>
            <div class="fix"></div>
        </div><!-- /#main-page2 -->
        <?php } ?>        
        <!-- /Optional page insert #2 --> 
        
        <!-- Info Box -->                
        <?php if ( $woo_options['woo_info'] == "true" ) { ?>
        <div id="info-box">        	
        	
	        <!-- Info block -->                
        	<div id="info-about" class="block">
            	<img src="<?php bloginfo('template_directory'); ?>/images/ico-info.png" class="icon" alt="" />
                <h3><?php if ( $woo_options['woo_info_about_title'] ) echo $woo_options['woo_info_about_title']; else echo __('Who are we?', 'woothemes'); ?></h3>
                <p><?php echo stripslashes($woo_options['woo_info_about_text']); ?></p>
                <?php
                	$url = $woo_options['woo_info_about_url'];
                	$text = $woo_options['woo_info_about_link']; if ( !text ) $text = __('Read more about us...','woothemes');
                ?>
                <?php if ( $url ) { ?><a href="<?php echo $url; ?>"><?php echo $text; ?></a><?php } ?>
            </div>
	        <!-- /Info Block -->                
            
	        <!-- Testimonials -->                
            <div id="testimonials" class="block last">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico-quotes.png" class="icon" alt="" />            
                <h3><?php if ( $woo_options['woo_info_quote_title'] ) echo $woo_options['woo_info_quote_title']; else echo __('Customer Feedback', 'woothemes'); ?></h3>
            	<div class="quotes">

		        <?php query_posts('post_type=testimonial&order=ASC&posts_per_page=20'); ?>
		        <?php if (have_posts()) : while (have_posts()) : the_post(); $counter++; ?>		
		        <?php 
		        	$author = get_post_meta($post->ID, 'testimonial_author', $single = true);
		        	$url = get_post_meta($post->ID, 'testimonial_url', $single = true);
            	?>
                	<div class="quote">
                        <blockquote><?php the_content(); ?></blockquote>
                        <cite><?php echo $author; ?> <?php if ( $url ) { ?>&nbsp;-&nbsp;<a href="<?php echo $url; ?>"><?php echo $url; ?></a><?php } ?></cite>
                    </div>
	            <?php endwhile; endif; ?>
	            
                </div>
            </div>
	        <!-- /Testimonials -->                
            
            <div class="fix"></div>
        </div><!-- /#info-box -->
        <?php } ?>
        <!-- /Info Box -->                

    </div><!-- /.col-full -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>