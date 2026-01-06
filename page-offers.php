<?php
/**
 * Template Name: Offers Page
 * Description: Template for displaying special offers and discounts
 */

get_header();
?>

<main id="main-content" class="offers-page">
    <!-- Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1 class="page-title">العروض والتخفيضات</h1>
            <p class="page-subtitle">تمتع بأفضل العروض والخصومات على منتجاتنا وخدماتنا</p>
        </div>
    </section>

    <!-- Offers Grid -->
    <section class="offers-section">
        <div class="container">
            <div class="offers-grid">
                <?php
                // Query for offers posts
                $offers_args = array(
                    'post_type' => 'offer',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $offers_query = new WP_Query($offers_args);
                
                if ($offers_query->have_posts()) :
                    while ($offers_query->have_posts()) : $offers_query->the_post();
                        $discount = get_post_meta(get_the_ID(), 'discount_percentage', true);
                        $valid_until = get_post_meta(get_the_ID(), 'valid_until', true);
                        ?>
                        <div class="offer-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="offer-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                    <?php if ($discount) : ?>
                                        <span class="discount-badge">-<?php echo esc_html($discount); ?>%</span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="offer-content">
                                <h3><?php the_title(); ?></h3>
                                <div class="offer-description">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <?php if ($valid_until) : ?>
                                    <p class="offer-validity">
                                        <i class="fas fa-clock"></i>
                                        صالح حتى: <?php echo esc_html($valid_until); ?>
                                    </p>
                                <?php endif; ?>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">المزيد من التفاصيل</a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="no-offers">لا توجد عروض متاحة حالياً. تابعونا للمزيد من العروض المميزة.</p>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-box">
                <h2>اشترك في نشرتنا الإخبارية</h2>
                <p>احصل على آخر العروض والتحديثات مباشرة إلى بريدك الإلكتروني</p>
                <?php echo do_shortcode('[newsletter_form]'); ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
