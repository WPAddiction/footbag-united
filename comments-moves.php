<?php
/**
 * The template for displaying Move Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comments-moves">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Video Example of a &ldquo;%s&rdquo;', 'comments title', 'twentyfourteen' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Video Example of a &ldquo;%2$s&rdquo;',
						'%1$s Video Examples of a &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'twentyfourteen'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
		?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Videos', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Videos &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 34,
                'max_depth'   => 1,
                'per_page'    => '',
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Videos', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Videos &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Video examples are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>
	
    <?php $comments_args = array(
        'title_reply' => 'Post a Video Example',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Video URL', 'noun' ) . '&nbsp;<span class="req-symbol">*</span></label><input type="url" id="comment" name="comment" placeholder="https://youtu.be/example" pattern="https?://.+" required aria-required="true"></input></p>',
    ); ?>

    <?php comment_form( $comments_args ); ?>

</div><!-- #comments -->
