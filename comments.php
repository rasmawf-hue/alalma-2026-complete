<?php
/**
 * Comments Template
 */
if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf(
                _n('%s تعليق', '%s تعليقات', $comments_number, 'alalma-2026'),
                number_format_i18n($comments_number)
            );
            ?>
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>
        <?php the_comments_pagination(); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments">التعليقات مغلقة.</p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
