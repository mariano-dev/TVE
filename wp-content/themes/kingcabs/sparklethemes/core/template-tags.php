<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package King_Cabs
 */

if ( ! function_exists( 'kingcabs_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function kingcabs_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted On %s', 'post date', 'kingcabs' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'kingcabs' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		$num_comments = esc_attr( get_comments_number() );

		if ( $num_comments == 0 ) {
			$comments_txt = esc_html__( 'No Comment', 'kingcabs' );
		} elseif ( $num_comments > 1 ) {
			/* translators: %d: number of comments */
			$comments_txt = sprintf( esc_html__( '%d Comments.', 'kingcabs' ), $num_comments );
		} else {
			$comments_txt = esc_html__( '1 Comment', 'kingcabs' );
		}

		$comment_meta = '<span class="comments-link"><a href="' . esc_url( get_comments_link() ).'">' . $comments_txt . '</a></span>';

			echo '<ul class="blog-posttime">
					<li>
						<span class="byline"> ' . wp_kses_post( $byline ) . '</span>
			    	</li> 
			    	<li>
				        <i class="fa fa-clock-o" aria-hidden="true"></i>
				        <span class="posted-on">' . wp_kses_post( $posted_on ) . '</span>
			    	</li>

			    	<li>
				        <i class="fa fa-commenting-o" aria-hidden="true"></i>
				        <span class="posted-on">' . wp_kses_post( $comment_meta ) . '</span>
			    	</li>
			 	</ul>';


	}
endif;

if ( ! function_exists( 'kingcabs_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kingcabs_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'kingcabs' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kingcabs' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'kingcabs' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'kingcabs' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kingcabs' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'kingcabs' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
