<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$admin_email = get_option( 'admin_email' );
?>
	
	</section>
	
	<div class="footer-container">
		<div class="wrap">
			<footer>
				<div class="footer-main">
					<div class="column">
						<h3>Quick Links</h3>
						<?php 
						wp_nav_menu( 
							array( 
								'theme_location' => 'footer-overview', 
								'menu_class' => 'nav-menu footer-overview' 
							)
						); 
						?>
					</div>
					<div class="column">
						<h3>Admissions</h3>
						<?php 
						wp_nav_menu( 
							array( 
								'theme_location' => 'footer-students', 
								'menu_class' => 'nav-menu footer-students' 
							)
						); 
						?>
					</div>
					<div class="column">
						<h3>Resources</h3>
						<?php 
						wp_nav_menu( 
							array( 
								'theme_location' => 'footer-faculty', 
								'menu_class' => 'nav-menu footer-faculty' 
							)
						);
						?>
					</div>
					<div class="column brand">
						<div class="sub-column">	
							<img src="<?php bloginfo( 'template_url') ?>/img/logo-black.svg" class="footer-logo">
						</div>
						<div class="sub-column">
							<?php print get_field( 'address', 'option' ) ?>
						</div>
					</div>
				</div>
				<div class="colophon">
					<div class="column social">
						<?php 
						$social_icons = get_field( 'social', 'option' );
						foreach ( $social_icons as $social ) {
							print '<a href="' . $social['link'] . '"><img src="' . get_bloginfo('template_url') . '/img/social/' . $social['network']['value'] . '.svg" title="Visit us on ' . $social['network']['label'] . '" /></a>';
						}
						?>
					</div>
					<div class="column copyright">
						<p>Copyright &copy; <?php print date( 'Y' ) ?>. All Rights Reserved. <a href="/privacy">Privacy Policy</a>.</p>
					</div>
				</div>
			</footer>
		</div>
	</div>

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>