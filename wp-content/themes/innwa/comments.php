<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digit7s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

?>
<?php

// comment_form();
if (have_comments()) :
	wp_list_comments("callback=pressfore_modify_comment_output");
endif;

if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
	wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
}
comment_form();
?>
