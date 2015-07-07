<?php
/**
 * Single page template
 */

?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>     
<div class="caja">       
   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



		<div class="caja-post">
               <h1><?php the_title(); ?></h1>
			
		
           	<?php the_content(); ?>

               
   </div>
		
	<div class="pagelink"><?php wp_link_pages(); ?></div>                
	 
                <div class="clear"></div>
				<?php comments_template(); ?>

                </div>
          
       </div>
       
		<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
