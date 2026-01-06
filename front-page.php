<?php
/**
 * Front Page Template
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>من الأفراد إلى المؤسسات، حلول متكاملة تنمو معك</h1>                                    <p><?php echo get_theme_mod('alalama_hero_description', 'الشركة الوحيدة في ليبيا التي تجمع برمجيات محلية، أجهزة عالمية، ودعم فني متخصص - كل شي في مكان واحد.'); ?></p>
                <div class="hero-buttons">                                    <p>الشركة الوحيدة في ليبيا التي تجمع برمجيات محلية، أجهزة عالمية، ودعم فني متخصص - كل شي في مكان واحد.</p>a>

                    <a href="#services" class="btn btn-primary">خدماتنا</a>
                    <a href="#contact" class="btn btn-outline">تواصل معنا</a>
                                    </div></div>
            </div>
        </div>    </section>


    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">عميل راضٍ</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">800+</div>
                    <div class="stat-label">نشاط تجاري بمنظوماتنا</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">مشروع مكتمل</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">مدينة مغطاة</div>
                </div>
            </div>
            <div class="stats-highlight">
                <div class="highlight-text">17+ سنة خبرة في الحلول التقنية المتكاملة</div>
            </div>
        </div>
 
 
     <!-- Why Choose Alalama Section -->
    <section class="why-choose-section">
        <div class="container">
            <h2 class="section-title">لماذا تختار العلامة للتقنية؟</h2>
            <p class="section-subtitle">نحن نجمع بين الخبرة العالمية والجودة المحلية لنقدم لك الأفضل.</p>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">✅</div>
                    <h3>حل شامل متكامل</h3>
                    <p>الشركة الوحيدة في ليبيا التي تقدم برمجيات، أجهزة عالمية، ودعم فني متخصص في حزمة واحدة.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>سرعة التنفيذ</h3>
                    <p>نضمن تركيب وتشغيل الأنظمة في أوقات قياسية لضمان استمرارية أعمالك دون توقف.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚙️</div>
                    <h3>دقة واحترافية</h3>
                    <p>فريقنا مؤهل ومدرب على أعلى المعايير لتقديم حلول تقنية خالية من الأخطاء البرمجية أو الفنية.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📞</div>
                    <h3>دعم فني متواصل</h3>
                    <p>خدمة عملاء ودعم فني متاح على مدار الساعة لحل كافة المشكلات التقنية عبر الهاتف أو ميدانياً.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💻</div>
                    <h3>أجهزة أصلية</h3>
                    <p>نوفر أجهزة من أفضل العلامات التجارية العالمية (Posbank, Epson, Hikvision) مع ضمان حقيقي.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✓️</div>
                    <h3>ضمان الوكيل المعتمد</h3>
                    <p>جميع أجهزتنا أصلية ومضمونة من الوكلاء المعتمدين العالميين مثل Hikvision و Posbank و Epson.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🇱🇾</div>
                    <h3>خبرة محلية ودعم فوري</h3>
                    <p>فريقنا متواجد في طرابلس وكل انحاء ليبيا لتقديم الدعم السريع والتركيب والتدريب بكفاءة عالية.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📈</div>
                    <h3>حلول قابلة للنمو</h3>
                    <p>أنظمتنا مصممة لتنمو مع مشروعك، بدءاً من الحلول الصغيرة وصولاً إلى أنظمة الشركات الكبرى.</p>
                </div>
            </div>
        </div>
    </section>   </section>
    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="section-title">خدماتنا</h2>
            <div class="services-grid">
                <?php
                $services = array(
                    array('icon' => 'fas fa-laptop-code', 'title' => 'تطوير المواقع', 'description' => 'تصميم وتطوير مواقع احترافية متجاوبة'),
                    array('icon' => 'fas fa-mobile-alt', 'title' => 'تطبيقات الجوال', 'description' => 'تطوير تطبيقات iOS و Android'),
                    array('icon' => 'fas fa-database', 'title' => 'قواعد البيانات', 'description' => 'تصميم وإدارة قواعد البيانات'),
                    array('icon' => 'fas fa-shield-alt', 'title' => 'الأمن السيبراني', 'description' => 'حماية بياناتك ومعلوماتك'),
                    array('icon' => 'fas fa-cloud', 'title' => 'الحوسبة السحابية', 'description' => 'حلول سحابية متكاملة'),
                    array('icon' => 'fas fa-headset', 'title' => 'الدعم الفني', 'description' => 'دعم فني على مدار الساعة'),
                );
                
                foreach ($services as $service) :
                ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="<?php echo $service['icon']; ?>"></i>
                        </div>
                        <h3><?php echo $service['title']; ?></h3>
                        <p><?php echo $service['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section" style="background-color: var(--bg-light);">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="section-title" style="text-align: right;">من نحن</h2>
                    <p>شركة العلامة للحاسبات والتقنية هي شركة رائدة في مجال تقنية المعلومات في ليبيا. نقدم حلولاً تقنية متكاملة للشركات والمؤسسات.</p>
                    <p>نتميز بفريق عمل محترف ذو خبرة واسعة في مجال التقنية، ونلتزم بتقديم أفضل الخدمات لعملائنا.</p>
                    <a href="/about" class="btn btn-primary">اعرف المزيد</a>
                </div>
                <div class="col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="من نحن" style="border-radius: 10px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Posts -->
    <section id="blog" class="section">
        <div class="container">
            <h2 class="section-title">أحدث المقالات</h2>
            <div class="blog-grid">
                <?php
                $recent_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                ));
                
                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) :
                        $recent_posts->the_post();
                        get_template_part('template-parts/content');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary">جميع المقالات</a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
