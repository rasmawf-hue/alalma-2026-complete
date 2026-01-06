<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="site-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-left">
                    <span><i class="fas fa-phone"></i> +218 91 5222252</span>
                    <span><i class="fas fa-envelope"></i> info@al3lama.ly</span>
                </div>
                <div class="top-bar-right">
                    <a href="https://www.facebook.com/alalamaly" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://wa.me/218915222252" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-navigation">
        <div class="container">
            <div class="nav-wrapper">
                <!-- Logo -->
                <div class="site-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-label="فتح القائمة">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Navigation Menu -->
                <div class="nav-menu-wrapper">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>

                    <!-- CTA Button -->
                    <div class="header-cta">
                        <a href="https://wa.me/218915222252" class="btn btn-primary" target="_blank">
                            <i class="fab fa-whatsapp"></i> استشارة مجانية
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
