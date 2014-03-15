<?php

// function jhp_init() {
// 	remove_filter('th_post_metadata', 'tarski_post_categories_link');
// }
// add_action( 'after_setup_theme', 'jhp_init' );

function jhp_comments_template( $file = '/comments.php', $separate_comments = false ) {
	global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;

	if ( empty($file) )
		$file = '/comments.php';

	$req = get_option('require_name_email');

	/**
	 * Comment author information fetched from the comment cookies.
	 *
	 * @uses wp_get_current_commenter()
	 */
	$commenter = wp_get_current_commenter();

	/**
	 * The name of the current comment author escaped for use in attributes.
	 */
	$comment_author = $commenter['comment_author']; // Escaped by sanitize_comment_cookies()

	/**
	 * The email address of the current comment author escaped for use in attributes.
	 */
	$comment_author_email = $commenter['comment_author_email'];  // Escaped by sanitize_comment_cookies()

	/**
	 * The url of the current comment author escaped for use in attributes.
	 */
	$comment_author_url = esc_url($commenter['comment_author_url']);

	/** @todo Use API instead of SELECTs. */
	if ( $user_ID) {
		$comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND (comment_approved = '1' OR ( user_id = %d AND comment_approved = '0' ) )  ORDER BY comment_date_gmt", $post->ID, $user_ID));
	} else if ( empty($comment_author) ) {
		$comments = get_comments( array('post_id' => $post->ID, 'status' => 'approve', 'order' => 'ASC') );
	} else {
		$comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND ( comment_approved = '1' OR ( comment_author = %s AND comment_author_email = %s AND comment_approved = '0' ) ) ORDER BY comment_date_gmt", $post->ID, wp_specialchars_decode($comment_author,ENT_QUOTES), $comment_author_email));
	}

	// keep $comments for legacy's sake
	$wp_query->comments = apply_filters( 'comments_array', $comments, $post->ID );
	$comments = &$wp_query->comments;
	$wp_query->comment_count = count($wp_query->comments);
	update_comment_cache($wp_query->comments);

	if ( $separate_comments ) {
		$wp_query->comments_by_type = &separate_comments($comments);
		$comments_by_type = &$wp_query->comments_by_type;
	}

	$overridden_cpage = false;
	if ( '' == get_query_var('cpage') && get_option('page_comments') ) {
		set_query_var( 'cpage', 'newest' == get_option('default_comments_page') ? get_comment_pages_count() : 1 );
		$overridden_cpage = true;
	}

	if ( !defined('COMMENTS_TEMPLATE') || !COMMENTS_TEMPLATE)
		define('COMMENTS_TEMPLATE', true);

	$include = apply_filters('comments_template', STYLESHEETPATH . $file );
	if ( file_exists( $include ) )
		require( $include );
	elseif ( file_exists( TEMPLATEPATH . $file ) )
		require( TEMPLATEPATH . $file );
	else // Backward compat code will be removed in a future release
		require( ABSPATH . WPINC . '/theme-compat/comments.php');
}