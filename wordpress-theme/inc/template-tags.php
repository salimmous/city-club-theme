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
 * Display social media links
 */
function cityclub_social_links() {
    $facebook = get_theme_mod('cityclub_facebook_url');
    $instagram = get_theme_mod('cityclub_instagram_url');
    $twitter = get_theme_mod('cityclub_twitter_url');
    $youtube = get_theme_mod('cityclub_youtube_url');
    
    if (!$facebook && !$instagram && !$twitter && !$youtube) {
        return;
    }
    
    echo '<div class="social-links">';
    
    if ($facebook) {
        echo '<a href="' . esc_url($facebook) . '" target="_blank" rel="noopener noreferrer" class="social-link facebook"><i class="fab fa-facebook-f"></i></a>';
    }
    
    if ($instagram) {
        echo '<a href="' . esc_url($instagram) . '" target="_blank" rel="noopener noreferrer" class="social-link instagram"><i class="fab fa-instagram"></i></a>';
    }
    
    if ($twitter) {
        echo '<a href="' . esc_url($twitter) . '" target="_blank" rel="noopener noreferrer" class="social-link twitter"><i class="fab fa-twitter"></i></a>';
    }
    
    if ($youtube) {
        echo '<a href="' . esc_url($youtube) . '" target="_blank" rel="noopener noreferrer" class="social-link youtube"><i class="fab fa-youtube"></i></a>';
    }
    
    echo '</div>';
}

/**
 * Display contact information
 */
function cityclub_contact_info($type = 'all') {
    if ($type === 'all' || $type === 'phone') {
        $phone = cityclub_get_contact_info('phone');
        if ($phone) {
            echo '<div class="contact-item phone"><i class="fas fa-phone"></i> <a href="tel:' . esc_attr(preg_replace('/[^0-9+]/', '', $phone)) . '">' . esc_html($phone) . '</a></div>';
        }
    }
    
    if ($type === 'all' || $type === 'email') {
        $email = cityclub_get_contact_info('email');
        if ($email) {
            echo '<div class="contact-item email"><i class="fas fa-envelope"></i> <a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></div>';
        }
    }
    
    if ($type === 'all' || $type === 'hours') {
        $hours = cityclub_get_contact_info('hours');
        if ($hours) {
            echo '<div class="contact-item hours"><i class="fas fa-clock"></i> ' . esc_html($hours) . '</div>';
        }
    }
}
