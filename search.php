<?php
/**
 * Search Results Template
 */
get_header();
?>
<main id="main-content" class="search-results">
    <div class="container">
        <header class="page-header">
            <h1>نتائج البحث عن: <?php echo get_search_query(); ?></h1>
        </header>
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        <?php endif; ?>
                        <div class="post-content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-excerpt"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="read-more">اقرأ المزيد</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p>لم يتم العثور على نتائج.</p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
