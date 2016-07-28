<?php
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) :
        die( esc_html_e( ' Please do not load this page. Thanks'  , 'tierone'));

        if (empty($post->post_password)) :
             if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) :
            ?>
                <p class="nocomments"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'tierone') ; ?></p>
            <?php
            endif;
            return;
        endif;
    endif;
?>

<?php
/*
* When comments are available show
* Start
*/
if (have_comments()) :?>
    <div class="comments-area">
        <h4 class="comments-title"><?php comments_number(esc_html__(' No Comments ' , 'tierone'), esc_html__('1 Comment','tierone') , esc_html__('% Comments','tierone')); ?></h4>
        <div class="comment-list">
        <?php $args = array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 32,
            ); 
            wp_list_comments($args); 
            ?><!-- .comment-list -->

            <?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                    <h1 class="screen-reader-text"><?php _e( 'Comment Navigation' , 'tierone' );?></h1>
                    <!--Comment Navigation-->
                    <ul class="page-numbers">
                        <li class="previous">
                            <?php previous_comments_link( __('<i class="fa fa-chevron-left"></i> Prev','tierone') ); ?>
                        </li>
                        <li class="next">
                            <?php next_comments_link( __('Next <i class="fa fa-chevron-right"></i>','tierone') ); ?>
                        </li>
                    </ul>
                </nav>
            <?php endif; // check for comment navigation ?>
        </div>
    </div>
<?php endif; // have_comments() ?>

<div id="respond">
    <?php if (comments_open()) : ?>
        <h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
        <?php
            $comment_args = array(
                'title_reply' => '',
                'comment_notes_before' => '',
                'comment_notes_after' => '',
                'label_submit' => esc_html__( 'Submit' ,'tierone' ),
                'cancel_reply_link' => esc_html__( 'Cancel Reply' ,'tierone' ),
                'logged_in_as' => '<p class="logged-user">' . sprintf( wp_kses( __( 'You are logged in as <a href="%1$s">%2$s</a> &#8212; <a href="%3$s">Logout &raquo;</a>', 'tierone' ), array(  'a' => array( 'href' => array() ) ) ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
                'fields' => array(
                    'author' => '<div class="form-group medium"><input type="text" name="author" id="input-name" class="input-s" value="" placeholder="'. esc_html__('Name', 'tierone') .'" /><span class="required">*</span></div>',
                    'email'               =>  '<div class="form-group medium"><input type="text" name="email" id="input-email" class="input-s" value=""  placeholder="'. esc_html__('Email', 'tierone') .'" /><span class="required">*</span></div>',
                    'url' => '<div class="form-group medium"><input type="text" name="url" id="input-email" class="input-s" value="" placeholder="'. esc_html__('Website Url','tierone') .'" /></div>'
                ),
                'comment_field'         =>  '<div class="form-group textarea"><textarea name="comment" id="message" placeholder="'. esc_html__('Message', 'tierone') .'" /></textarea><span class="required">*</span></div>',
               'label_submit' => esc_html__( 'Submit' ,'tierone' )
                );


            comment_form($comment_args);
        ?>
    <?php endif;?>
</div>
