/**
 * Alalama Tech Theme - Main JavaScript
 * Version: 1.0.0
 * Author: Rasma Marketing
 */

(function($) {
    'use strict';

    // ============================================
    // Document Ready
    // ============================================
    $(document).ready(function() {
        initMobileMenu();
        initScrollEffects();
        initBackToTop();
        initSmoothScroll();
        initLazyLoading();
        initAnimations();
        initCounters();
        initPortfolioFilter();
        initContactForm();
    });

    // ============================================
    // Mobile Menu
    // ============================================
    function initMobileMenu() {
        const $toggle = $('.mobile-menu-toggle');
        const $menu = $('.mobile-menu');
        const $body = $('body');

        // Toggle menu
        $toggle.on('click', function() {
            $(this).toggleClass('active');
            $menu.toggleClass('active');
            $body.toggleClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mobile-menu, .mobile-menu-toggle').length) {
                $toggle.removeClass('active');
                $menu.removeClass('active');
                $body.removeClass('menu-open');
            }
        });

        // Close menu when clicking on a link
        $menu.find('a').on('click', function() {
            $toggle.removeClass('active');
            $menu.removeClass('active');
            $body.removeClass('menu-open');
        });
    }

    // ============================================
    // Scroll Effects
    // ============================================
    function initScrollEffects() {
        const $header = $('.site-header');
        let lastScroll = 0;

        $(window).on('scroll', function() {
            const currentScroll = $(this).scrollTop();

            // Add scrolled class
            if (currentScroll > 50) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }

            // Hide/show header on scroll
            if (currentScroll > lastScroll && currentScroll > 100) {
                // Scrolling down
                $header.css('transform', 'translateY(-100%)');
            } else {
                // Scrolling up
                $header.css('transform', 'translateY(0)');
            }

            lastScroll = currentScroll;
        });
    }

    // ============================================
    // Back to Top Button
    // ============================================
    function initBackToTop() {
        const $backToTop = $('<button>', {
            id: 'back-to-top',
            html: '<i class="fas fa-arrow-up"></i>',
            'aria-label': 'العودة للأعلى'
        });

        $('body').append($backToTop);

        // Show/hide button
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.css('display', 'flex').fadeIn();
            } else {
                $backToTop.fadeOut();
            }
        });

        // Smooth scroll to top
        $backToTop.on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 800);
        });
    }

    // ============================================
    // Smooth Scroll for Anchor Links
    // ============================================
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const href = $(this).attr('href');
            
            if (href.length > 1) {
                e.preventDefault();
                const target = $(href);
                
                if (target.length) {
                    const offset = $('.site-header').outerHeight() || 70;
                    $('html, body').animate({
                        scrollTop: target.offset().top - offset
                    }, 800);
                }
            }
        });
    }

    // ============================================
    // Lazy Loading Images
    // ============================================
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.getAttribute('data-src');
                        
                        if (src) {
                            img.src = src;
                            img.removeAttribute('data-src');
                            img.classList.add('loaded');
                        }
                        
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        } else {
            // Fallback for browsers that don't support IntersectionObserver
            $('img[data-src]').each(function() {
                $(this).attr('src', $(this).attr('data-src'));
                $(this).removeAttr('data-src');
            });
        }
    }

    // ============================================
    // Scroll Animations
    // ============================================
    function initAnimations() {
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                animationObserver.observe(el);
            });
        }
    }

    // ============================================
    // Counter Animation
    // ============================================
    function initCounters() {
        const counters = document.querySelectorAll('.stat-number');
        
        if (counters.length && 'IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-count'));
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        let current = 0;

                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                counter.textContent = Math.floor(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };

                        updateCounter();
                        counterObserver.unobserve(counter);
                    }
                });
            });

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
        }
    }

    // ============================================
    // Portfolio Filter
    // ============================================
    function initPortfolioFilter() {
        const $filterButtons = $('.portfolio-filter button');
        const $portfolioItems = $('.portfolio-item');

        $filterButtons.on('click', function() {
            const filter = $(this).data('filter');
            
            // Update active button
            $filterButtons.removeClass('active');
            $(this).addClass('active');

            // Filter items
            if (filter === '*') {
                $portfolioItems.fadeIn();
            } else {
                $portfolioItems.hide();
                $(`.portfolio-item[data-category="${filter}"]`).fadeIn();
            }
        });
    }

    // ============================================
    // Contact Form
    // ============================================
    function initContactForm() {
        const $form = $('.contact-form');
        
        if (!$form.length) return;

        $form.on('submit', function(e) {
            e.preventDefault();
            
            const $submitBtn = $(this).find('button[type="submit"]');
            const formData = new FormData(this);
            
            // Add nonce
            formData.append('action', 'alalama_contact_form');
            formData.append('nonce', alalama_data.nonce);

            // Disable submit button
            $submitBtn.prop('disabled', true).addClass('loading');

            // Send AJAX request
            $.ajax({
                url: alalama_data.ajax_url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        showMessage('success', response.data.message);
                        $form[0].reset();
                    } else {
                        showMessage('error', response.data.message);
                    }
                },
                error: function() {
                    showMessage('error', 'حدث خطأ. يرجى المحاولة مرة أخرى.');
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).removeClass('loading');
                }
            });
        });

        // Form validation
        $form.find('input, textarea').on('blur', function() {
            validateField($(this));
        });
    }

    // ============================================
    // Form Validation Helper
    // ============================================
    function validateField($field) {
        const value = $field.val().trim();
        const type = $field.attr('type');
        let isValid = true;

        // Required check
        if ($field.prop('required') && !value) {
            isValid = false;
        }

        // Email check
        if (type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(value);
        }

        // Phone check
        if (type === 'tel' && value) {
            const phoneRegex = /^[0-9+\s()-]+$/;
            isValid = phoneRegex.test(value);
        }

        // Update field state
        if (isValid) {
            $field.removeClass('error').addClass('valid');
        } else {
            $field.removeClass('valid').addClass('error');
        }

        return isValid;
    }

    // ============================================
    // Show Message Helper
    // ============================================
    function showMessage(type, message) {
        const $message = $('<div>', {
            class: `form-message ${type}`,
            html: message
        });

        $('.contact-form').prepend($message);

        setTimeout(() => {
            $message.fadeOut(() => {
                $message.remove();
            });
        }, 5000);
    }

    // ============================================
    // WhatsApp Button
    // ============================================
    function initWhatsAppButton() {
        const phoneNumber = '218915222252';
        const message = 'مرحباً، أود الاستفسار عن خدماتكم';
        const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

        $('.whatsapp-button').on('click', function(e) {
            e.preventDefault();
            window.open(whatsappUrl, '_blank');
        });
    }

    // Initialize WhatsApp button
    initWhatsAppButton();

    // ============================================
    // Search Functionality
    // ============================================
    function initSearch() {
        const $searchToggle = $('.search-toggle');
        const $searchForm = $('.search-form');
        const $searchInput = $('.search-input');

        $searchToggle.on('click', function(e) {
            e.preventDefault();
            $searchForm.toggleClass('active');
            
            if ($searchForm.hasClass('active')) {
                setTimeout(() => {
                    $searchInput.focus();
                }, 300);
            }
        });

        // Close search on ESC
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27 && $searchForm.hasClass('active')) {
                $searchForm.removeClass('active');
            }
        });
    }

    // Initialize search
    initSearch();

    // ============================================
    // Print Functionality
    // ============================================
    $('.print-button').on('click', function(e) {
        e.preventDefault();
        window.print();
    });

    // ============================================
    // Share Buttons
    // ============================================
    function initShareButtons() {
        $('.share-facebook').on('click', function(e) {
            e.preventDefault();
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        });

        $('.share-twitter').on('click', function(e) {
            e.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.title);
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
        });

        $('.share-linkedin').on('click', function(e) {
            e.preventDefault();
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank', 'width=600,height=400');
        });
    }

    // Initialize share buttons
    initShareButtons();

    // ============================================
    // Copy to Clipboard
    // ============================================
    $('.copy-link').on('click', function(e) {
        e.preventDefault();
        const url = window.location.href;
        
        if (navigator.clipboard) {
            navigator.clipboard.writeText(url).then(() => {
                showMessage('success', 'تم نسخ الرابط بنجاح!');
            });
        } else {
            // Fallback
            const $temp = $('<input>');
            $('body').append($temp);
            $temp.val(url).select();
            document.execCommand('copy');
            $temp.remove();
            showMessage('success', 'تم نسخ الرابط بنجاح!');
        }
    });

    // ============================================
    // Parallax Effect
    // ============================================
    function initParallax() {
        $(window).on('scroll', function() {
            const scrolled = $(this).scrollTop();
            $('.parallax').css('transform', `translateY(${scrolled * 0.5}px)`);
        });
    }

    // Initialize parallax if elements exist
    if ($('.parallax').length) {
        initParallax();
    }

    // ============================================
    // Accessibility Improvements
    // ============================================
    
    // Skip to content link
    $('body').prepend('<a href="#main-content" class="skip-to-content">انتقل إلى المحتوى الرئيسي</a>');

    // Focus trap for modals
    $('.modal').on('shown', function() {
        const $modal = $(this);
        const $focusableElements = $modal.find('a, button, input, select, textarea');
        const $firstElement = $focusableElements.first();
        const $lastElement = $focusableElements.last();

        $firstElement.focus();

        $modal.on('keydown', function(e) {
            if (e.keyCode === 9) { // Tab key
                if (e.shiftKey) {
                    if (document.activeElement === $firstElement[0]) {
                        e.preventDefault();
                        $lastElement.focus();
                    }
                } else {
                    if (document.activeElement === $lastElement[0]) {
                        e.preventDefault();
                        $firstElement.focus();
                    }
                }
            }
        });
    });

    // ============================================
    // Performance Monitoring (Development only)
    // ============================================
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        window.addEventListener('load', function() {
            const perfData = window.performance.timing;
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            console.log(`Page load time: ${pageLoadTime}ms`);
        });
    }

})(jQuery);
