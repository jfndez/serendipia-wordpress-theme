<?php
/**
 * Theme index file
 */

?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<div id="post-area">
<?php while (have_posts()) : the_post(); ?>

   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if(get_field('video') == ""): ?>		 
		<?php if ( has_post_thumbnail() ) { ?>
         <div class="pinbin-image"><a title="Ver entrada" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'summary-image' );  ?></a></div>
          <div class="pinbin-category"><p><?php the_category(', ') ?></p></div>
	
       
		  <?php } ?>
	<?php if ( !has_post_thumbnail() ) { ?>
         
	<div class="pinbin-category2"><p><?php the_category(', ') ?></p></div>
       
		  <?php } ?>
		<?php endif; ?>

		<?php if(get_field('video') != ""): ?>
	           <div class="pinbin-image"><div class="pinbin-category3"><p><?php the_category(', ') ?></p></div><div class="video-container"><?php _e( wp_oembed_get( get_field( 'video' ) ) ); ?></div></div>
		<?php endif; ?>


       			<div class="pinbin-copy"><h2><a title="Ver entrada" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	       		<p class="pinbin-date"><?php the_time(get_option('date_format')); ?></p>
		
		<?php the_excerpt(); ?> 
		
		<?php if(get_field('documento') != ""): ?>
			
               		<center>
			</br><a title="Descargar archivo adjunto" href="<?php echo the_field('documento');?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/descargar.png" alt="Descargar"></a>
			</center>
		 <?php  endif; ?>
<br><br>
		<?php if( has_term( '', 'autor' )): ?> 
			<table border="0">
				<tr>
					<td width="50%"><strong>Autoría</strong></td>
					<td width="50%"><?php $terms = get_the_terms( $post->ID , 'autor' ); 
                    				foreach ( $terms as $term ) {
                      				$term_link = get_term_link( $term, 'autor' );
                       				if( is_wp_error( $term_link ) )
			                        continue;
                    				echo '<b><a href="' . $term_link . '">' . $term->name . '</a><br></b>';
                    							    } 
			                ?></td>
				</tr>
			</table>
                <?php  endif; ?>

		<?php if( has_term( '', 'editor' )): ?> 
			<table border="0">
				<tr>
					<td width="50%"><strong>Edición</strong></td>
					<td width="50%"><?php $terms = get_the_terms( $post->ID , 'editor' ); 
                    				foreach ( $terms as $term ) {
			                        $term_link = get_term_link( $term, 'editor' );
                        			if( is_wp_error( $term_link ) )
                        			continue;
                    				echo '<b><a href="' . $term_link . '">' . $term->name . '</a><br></b>';
                    							    } 
                			?></td>
				</tr>
			</table>
		<?php  endif; ?>

		<?php if( has_term( '', 'fecha' )): ?> 
			<table border="0">
			  <tr>
				<td width="50%"><strong>Fecha</strong></td>
				<td width="50%"><?php $terms = get_the_terms( $post->ID , 'fecha' ); 
                    				foreach ( $terms as $term ) {
                        			$term_link = get_term_link( $term, 'fecha' );
                        			if( is_wp_error( $term_link ) )
                        			continue;
                    				echo '<b><a href="' . $term_link . '">' . $term->name . '</a><br></b>';
                    							    } 
                		?></td>
			   </tr>
			</table>
		<?php endif; ?>
                
		
		<?php if( has_tag()): ?> 
                	<table border="0">
				<tr>
					<td width="50%"><b><?php echo the_tags(); ?></b></td>
				</tr>
			</table>
                <?php endif; ?>
		


                 

               <?php if(get_field('fuente-url') != ""): ?><p class="pinbin-link"><a target="_blank" title="Abrir fuente en otra pestaña" href="<?php echo the_field('fuente-url');?>">&rarr;</a></p><?php endif; ?>
         </div>
       </div>
       
<?php endwhile; ?>
</div>




<?php endif; ?>
    <nav id="nav-below" class="navigation" role="navigation">
        <div class="view-previous"><?php next_posts_link( __( '&#171; Anterior', 'pinbin' ) ) ?> <?php previous_posts_link( __( '  Siguiente &#187', 'pinbin' ) ) ?></div>
        
    </nav> 
<?php get_footer(); ?>
