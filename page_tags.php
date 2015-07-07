<?php /* Template Name: Etiquetas: autores y editores */ ?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>     
<div class="caja">       
   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



		<div class="caja-post">
               <h1><?php the_title(); ?></h1>	
		
        	<?php the_content(); ?>

       <div class="clear"></div>
       <table border="0" style="background-color:" width="100%" cellpadding="3" cellspacing="3">
	<tr>
		<td style="list-style-type: none"><h2>Etiquetas</h2><?php 
	$args = array(
		'taxonomy' => array( 'post_tag', 'category' ), 
	); 

	wp_tag_cloud( $args );
?></td>
		
	</tr>
</table>



       <div class="clear"></div>
<table border="0" width="100%" cellpadding="3" cellspacing="3">
	<tr>
		<td><?php echo wp_list_categories('taxonomy=autor&echo=0&show_count=1&title_li=<h2>Autores</h2>');?></td>
		<td><?php
$variable = wp_list_categories('taxonomy=editor&echo=0&show_count=1&title_li=<h2>Editores y promotores</h2>');
$variable = preg_replace('~\((\d+)\)(?=\s*+<)~', '($1)', $variable);
echo $variable;
?></td>
	</tr>
</table>
               
   </div>
		
	<div class="pagelink"><?php wp_link_pages(); ?></div>                
	 
                <div class="clear"></div>
				

                </div>
          
       </div>
       
		<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
