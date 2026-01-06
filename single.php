<?php
/**
 * Single Post Template
 * Displays individual blog posts and articles
 */

get_header();
?>

<main id="main-content" class="single-post">
    <?php
    while (have_posts()) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Post Header -->
            <header class="post-header">
                <div class="container">
                    <div class="post-meta">
                        <span class="post-date">
                            <i class="fas fa-calendar"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="post-author">
                            <i class="fas fa-user"></i>
                            <?php the_author(); ?>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="post-category">
                                <i class="fas fa-folder"></i>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- Post Content -->
            <div class="post-content">
                <div class="container">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Post Footer -->
            <footer class="post-footer">
                <div class="container">
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <i class="fas fa-tags"></i>
                            <?php the_tags('', ', '); ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Social Share -->
                    <div class="social-share">
                        <h3>شارك المقال:</h3>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" class="share-btn whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Author Bio -->
            <?php
            $author_bio = get_the_author_meta('description');
            if ($author_bio) :
                ?>
                <div class="author-bio">
                    <div class="container">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                        </div>
                        <div class="author-info">
                            <h3 class="author-name"><?php the_author(); ?></h3>
                            <p class="author-description"><?php echo esc_html($author_bio); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>

            <!-- Related Posts -->
            <?php
            $categories = get_the_category();
            if ($categories) :
                $category_ids = array();
                foreach ($categories as $category) {
                    $category_ids[] = $category->term_id;
                }
                
                $related_args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3,
                    'orderby' => 'rand'
                );
                
                $related_query = new WP_Query($related_args);
                
                if ($related_query->have_posts()) :
                    ?>
                    <section class="related-posts">
                        <div class="container">
                            <h2 class="section-title">مقالات ذات صلة</h2>
                            <div class="posts-grid">
                                <?php
                                while ($related_query->have_posts()) : $related_query->the_post();
                                    ?>
                                    <article class="post-card">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                                <?php the_post_thumbnail('medium'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="post-card-content">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p class="post-date"><?php echo get_the_date(); ?></p>
                                        </div>
                                    </article>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php
                endif;
            endif;
            ?>

            <!-- Comments -->
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
?>
