<div class="mkdf-comment-holder clearfix" id="comments">
	<div class="mkdf-comment-number">
		<div class="mkdf-comment-number-inner">
			<h6><?php comments_number( esc_html__('No Comments','piquant'), esc_html__(' Comment ', 'piquant'), esc_html__(' Comments ', 'piquant')); ?></h6>
		</div>
	</div>
<div class="mkdf-comments">
<?php if ( post_password_required() ) : ?>
				<p class="mkdf-no-password"><?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'piquant'); ?></p>
			</div></div>
<?php
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>

	<ul class="mkdf-comment-list">
		<?php wp_list_comments(array( 'callback' => 'piquant_mikado_comment')); ?>
	</ul>


<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'piquant'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'Leave a Reply', 'piquant'),
	'title_reply_to' => esc_html__( 'Post a Reply to %s', 'piquant'),
	'cancel_reply_link' => esc_html__( 'Cancel Reply', 'piquant'),
	'label_submit' => esc_html__( 'Submit', 'piquant'),
	'comment_field' => '<div class="mkdf-comment-form-field mkdf-comment-form-textarea"><textarea id="comment" placeholder="'.esc_html__( 'Comment *', 'piquant').'" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="mkdf-comment-row"><div class="mkdf-comment-form-field"><input id="author" name="author" placeholder="'. esc_html__( 'Name *', 'piquant') .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div>',
		'email' => '<div class="mkdf-comment-form-field"><input id="email" name="email" placeholder="'. esc_html__( 'E-mail Address *', 'piquant') .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div>',
		'url' => '<div class="mkdf-comment-form-field"><input id="url" name="url" type="text" placeholder="'. esc_html__( 'Website', 'piquant') .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>'
		 ) ) );
 ?>
<?php if(get_comment_pages_count() > 1){
	?>
	<div class="mkdf-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
 <div class="mkdf-comment-form">
	<?php comment_form($args); ?>
</div>
								
							


