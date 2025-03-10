<?php
/**
 * Custom template tags for this theme
 *
 * @package CityClub
 */

if ( ! function_exists( 'cityclub_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function cityclub_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'cityclub' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'cityclub_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function cityclub_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cityclub' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'cityclub_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function cityclub_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'cityclub' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cityclub' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cityclub' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cityclub' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintF(
					/* translators: %s: post title */
					esc_html__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cityclub' ),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintF(
				/* translators: %s: Name of current post. Only visible to screen readers */
				esc_html__( 'Edit <span class="screen-reader-text">%s</span>', 'cityclub' ),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'cityclub_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function cityclub_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Custom functions for CityClub theme
 */

if ( ! function_exists( 'cityclub_social_icons' ) ) :
	/**
	 * Display social media icons
	 */
	function cityclub_social_icons() {
		$facebook = get_theme_mod('cityclub_facebook_url');
		$instagram = get_theme_mod('cityclub_instagram_url');
		$twitter = get_theme_mod('cityclub_twitter_url');
		$youtube = get_theme_mod('cityclub_youtube_url');
		
		if (!$facebook && !$instagram && !$twitter && !$youtube) {
			return;
		}
		
		echo '<div class="social-icons flex space-x-4">';
		
		if ($facebook) {
			echo '<a href="' . esc_url($facebook) . '" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a>';
		}
		
		if ($instagram) {
			echo '<a href="' . esc_url($instagram) . '" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>';
		}
		
		if ($twitter) {
			echo '<a href="' . esc_url($twitter) . '" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a>';
		}
		
		if ($youtube) {
			echo '<a href="' . esc_url($youtube) . '" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg></a>';
		}
		
		echo '</div>';
	}
endif;

if ( ! function_exists( 'cityclub_location_selector' ) ) :
	/**
	 * Display location selector
	 */
	function cityclub_location_selector() {
		// Get locations from custom post type
		$locations = get_posts(array(
			'post_type' => 'cityclub_location',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
		));
		
		if (empty($locations)) {
			return;
		}
		
		?>
		<div class="location-selector flex flex-col sm:flex-row items-center gap-2 bg-white rounded-lg p-2 shadow-md">
			<div class="flex items-center gap-2 text-gray-700 font-medium">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
					<circle cx="12" cy="10" r="3"></circle>
				</svg>
				<span><?php echo esc_html__('Choisir un Club:', 'cityclub'); ?></span>
			</div>

			<div class="w-full sm:w-64">
				<select class="location-filter w-full bg-white border-gray-300 focus:ring-primary rounded-md p-2">
					<?php foreach ($locations as $location) : ?>
						<option value="<?php echo esc_attr($location->ID); ?>">
							<?php echo esc_html($location->post_title); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<button class="bg-primary hover:bg-primary/90 text-white whitespace-nowrap relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 py-2 px-4 rounded-md">
				<span class="relative z-10"><?php echo esc_html__('ITINÉRAIRE', 'cityclub'); ?></span>
				<span class="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
			</button>
		</div>
		<?php
	}
endif;
