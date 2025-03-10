<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CityClub
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar-fitness">
	<div class="sidebar-inner">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="sidebar-widgets">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		<?php else : ?>
			<!-- Default sidebar content when no widgets are added -->
			<div class="sidebar-cta">
				<h3 class="sidebar-title">Join CityClub Today</h3>
				<p>Experience premium fitness with over 42 clubs across Morocco.</p>
				<a href="#" class="sidebar-button">Get Started</a>
			</div>
			
			<div class="sidebar-hours">
				<h3 class="sidebar-title">Opening Hours</h3>
				<ul class="hours-list">
					<li><span>Monday - Friday:</span> 6:00 - 22:00</li>
					<li><span>Saturday - Sunday:</span> 8:00 - 20:00</li>
				</ul>
			</div>
			
			<div class="sidebar-contact">
				<h3 class="sidebar-title">Contact Us</h3>
				<p><i class="fas fa-phone"></i> +212 522 123 456</p>
				<p><i class="fas fa-envelope"></i> info@cityclubmaroc.com</p>
			</div>
		<?php endif; ?>
	</div>
</aside><!-- #secondary -->
