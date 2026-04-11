<?php

/**
 * Template Name: 404 Page Template
 * Tên file: 404.php
 */

get_header();
$current_lang = pll_current_language('slug');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="error-404 not-found">
            <div class="page-content">
                <div class="flex flex-col items-center py-16 px-4 space-y-8">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/not-found.jpg' ?>" alt="not-found" />
                    <p style="margin-top: 20px;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="w-fit p-3 bg-black text-white font-semibold rounded-lg hover:opacity-70 transition">
                            <?php esc_html_e($current_lang === 'en' ? 'Back to home' : 'Quay về Trang chủ', 'textdomain'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
?>