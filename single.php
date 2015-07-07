<?php
/**
 * Single post template
 */

?>
<?php get_header(); ?>




	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>     
<div class="caja">       
   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if(get_field('video') == ""): ?>
<?php if ( has_post_thumbnail() ) { ?>
  <div style="background: #000000;" class="pinbin-image"><center><?php the_post_thumbnail( 'detail-image' );  ?></center></div>
  <div class="pinbin-category"><p><?php the_category(', ') ?></p></div>
<?php } ?>

<?php if ( !has_post_thumbnail() ) { ?>
  <div class="pinbin-category2"><p><?php the_category(', ') ?></p></div>
<?php } ?>
<?php endif; ?>

<?php if(get_field('video') != ""): ?><div class="pinbin-category3"><p><?php the_category(', ') ?></p></div><div style="background: #000000;" class="pinbin-image"><center><div class="video-container"><?php _e( wp_oembed_get( get_field( 'video' ) ) ); ?></div></center></div><?php endif; ?>


		<div class="caja-post">
               <h1><?php the_title(); ?></h1>
			
		
          <strong>
	  <?php previous_post_link('%link', 'Siguiente'); ?>
          <?php next_post_link('%link', 'Anterior'); ?>
          </strong>
		
		
		
           	<?php the_content(); ?>
		
		<?php if(get_field('documento') != ""): ?>
		<div class="clear"></div>
               <center> <a title="Descargar archivo adjunto" href="<?php echo the_field('documento');?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/descargar.png" alt="Descargar"></a></center>
		 <?php  endif; ?>

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
		
  <?php if(get_field('fuente-url') != ""): ?><center><strong>[<a target="_blank" title="Abrir fuente en otra pestaña" href="<?php echo the_field('fuente-url');?>">FUENTE</a>]</strong></center><?php endif; ?>
 <p class="pinbin-date"><strong>Publicado: </strong><?php the_time(get_option('date_format')); ?></p>


   </div>
		
	<div class="pagelink"><?php wp_link_pages(); ?></div>                
	 
                <div class="clear"></div>
				<?php comments_template(); ?>

                </div>
          
       </div>
       
		<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
