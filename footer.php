<!-- Footer -->
<footer class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-widget">
                    <h3>عن العلامة</h3>
                    <p>من الأفراد إلى المؤسسات، نقدم حلولاً تقنية متكاملة تنمو معك.</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/alalamaly"><i class="fab fa-facebook"></i></a>
                        <a href="https://wa.me/218915222252"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-widget">
                    <h3>روابط سريعة</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'container' => false,
                    ));
                    ?>
                </div>
                <div class="footer-widget">
                    <h3>تواصل معنا</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> طرابلس - حي دمشق</li>
                        <li><i class="fas fa-phone"></i> +218 91 5222252</li>
                        <li><i class="fas fa-envelope"></i> info@al3lama.ly</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> العلامة للحاسبات والتقنية. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
