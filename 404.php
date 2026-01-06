<?php
/**
 * 404 Error Page Template
 */

get_header();
?>

<main id="main-content" class="error-404">
    <div class="container">
        <div class="error-content">
            <h1 class="error-title">404</h1>
            <h2 class="error-subtitle">عذرًا، الصفحة غير موجودة</h2>
            <p class="error-message">الصفحة التي تبحث عنها غير موجودة أو تم نقلها. يمكنك العودة إلى الصفحة الرئيسية أو استخدام البحث.</p>
            
            <!-- Search Form -->
            <div class="error-search">
                <?php get_search_form(); ?>
            </div>
            
            <!-- Quick Links -->
            <div class="error-links">
                <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">الصفحة الرئيسية</a>
                <a href="<?php echo home_url('/about'); ?>" class="btn btn-secondary">من نحن</a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">اتصل بنا</a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
