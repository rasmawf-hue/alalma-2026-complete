<?php
/**
 * Archive Template
 * Template for displaying archive pages (categories, tags, dates)
 */

get_header();
?>

<main id="main-content" class="archive-page">
    <!-- Archive Header -->
    <header class="archive-header">
        <div class="container">
            <h1 class="archive-title">
                <?php
                if (is_category()) :
                    single_cat_title('التصنيف: ');
                elseif (is_tag()) :
                    single_tag_title('الوسم: ');
                elseif (is_author()) :
                    echo 'المؤلف: ' . get_the_author();
                elseif (is_day()) :
                    echo 'الأرشيف اليومي: ' . get_the_date();
                elseif (is_month()) :
                    echo 'الأرشيف الشهري: ' . get_the_date('F Y');
                elseif (is_year()) :
                    echo 'الأرشيف السنوي: ' . get_the_date('Y');
                else :
                    echo 'الأرشيف';
                endif;
                ?>
            </h1>
            <?php
            if (is_category() && category_description()) :
                echo '<div class="archive-description">' . category_description() . '</div>';
            elseif (is_tag() && tag_description()) :
                echo '<div class="archive-description">' . tag_description() . '</div>';
            endif;
            ?>
        </div>
    </header>

    <!-- Posts Grid -->
    <section class="archive-content">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="posts-grid">
                    <?php
                    while (have_posts()) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>
                            
                            <div class="post-card-content">
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <?php if (has_category()) : ?>
                                        <span class="post-category">
                                            <i class="fas fa-folder"></i>
                                            <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">اقرأ المزيد</a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-arrow-right"></i> السابق',
                        'next_text' => 'التالي <i class="fas fa-arrow-left"></i>',
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="no-posts">
                    <p>لم يتم العثور على أي محتوى في هذا القسم.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
?>
