<?php
/**
 * Page Template
 * Default template for displaying standard pages
 */

get_header();
?>

<main id="main-content" class="page-content">
    <?php
    while (have_posts()) : the_post();
        ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Page Header -->
            <header class="page-header">
                <div class="container">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <div class="page-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="page-featured-image">
                    <div class="container">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Page Content -->
            <div class="page-body">
                <div class="container">
                    <div class="content-area">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('الصفحات:', 'alalma-2026'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </div>
            </div>

            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="page-comments">
                    <div class="container">
                        <?php comments_template(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
?>
