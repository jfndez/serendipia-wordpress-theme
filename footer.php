<?php
/**
 * The template for displaying the footer.
 */

?>

<?php if ( is_active_sidebar( 'pinbin_footer')) { ?>     
   <div id="footer-area">
			<?php if( !is_single() ): ?><?php dynamic_sidebar( 'pinbin_footer' ); ?><?php endif; ?>
        </div><!-- // footer area with widgets -->   
<?php }  ?>           
<footer class="site-footer">
	  <div id="copyright">
	 	<?php _e( '<center> Adaptación del tema Pinbin de', 'pinbin' ); ?> <strong><a href="<?php echo esc_url( 'http://colorawesomeness.com/themes/' ); ?>" title="Color Awesomeness" target="_blank"><?php _e( 'Color Awesomeness', 'pinbin' ); ?></a></strong> por <a href="http://www.jose-fernandez.com.es"><strong>José Fernández</strong></a> para la creación de colecciones personales.</center>
	
	 </div>
	 	</div><!-- // copyright -->   
</footer>     
</div><!-- // close wrap div -->   

<?php wp_footer(); ?>

</body>
</html>

