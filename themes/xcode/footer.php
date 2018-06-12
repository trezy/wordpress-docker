<?php
/**
 * Template for footer.
 *
 * @package Xcode
 * @author CodeGear Themes
 * 
 */

?>
            </div>
        </div>
	</div> <!-- #content -->
 </div>
  
    <?php if( get_theme_mod( 'xcode_social_enable' , false ) || has_nav_menu( 'footer-menu' ) ): ?>
    <section id="sec_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php if( get_theme_mod( 'xcode_social_enable' , false )): ?>
                    <?php xcode_social(); ?>
                    <?php endif; ?>
                    <?php if ( has_nav_menu( 'footer-menu' ) ): ?>
                    <?php xcode_footer_menu(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

	<div id="footer" class="site-footer">

		<footer class="footerWraper">
			<?php xcode_footer_text(); ?> 
		</footer>

	</div>
<?php wp_footer(); ?>

</body>
</html>
