<?php

/* The template for displaying Search Results pages. */

get_header(); ?>



		<section id="primary" class="site-content">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Resultados para: %s', 'pinbin' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
		<?php while (have_posts()) : the_post(); ?>	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(get_field('video') == ""): ?>
			<?php if ( has_post_thumbnail() ) { ?>
			  <div style="background: #000000;" class="pinbin-image"><center><a title="Ver entrada" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'detail-image' );  ?></a></center></div>
			  <div class="pinbin-category"><p><?php the_category(', ') ?></p></div>
			<?php } ?>

<?php if ( !has_post_thumbnail() ) { ?>
  <div class="pinbin-category2"><p><?php the_category(', ') ?></p></div>
<?php } ?>
<?php endif; ?>

<?php if(get_field('video') != ""): ?><div class="pinbin-category3"><p><?php the_category(', ') ?></p></div><div style="background: #000000;" class="pinbin-image"><center><div class="video-container"><?php _e( wp_oembed_get( get_field( 'video' ) ) ); ?></div></center></div><?php endif; ?>
 
       			<div class="pinbin-copy"><h2><a class="front-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <p class="pinbin-date"><?php the_time(get_option('date_format')); ?>  </p>

                  <?php the_excerpt(); ?> 

<?php if(get_field('documento') != ""): ?>
			
               		<center>
			</br><a title="Descargar archivo adjunto" href="<?php echo the_field('documento');?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/descargar.png" alt="Descargar"></a>
			</center>
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
         </div>
       </div>
				<?php endwhile; ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No se encontró', 'pinbin' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'La búsqueda no tiene resultados.', 'pinbin' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->

<?php get_footer(); ?>
