<?php
$current_lang = pll_current_language('slug');
$theme_uri = get_template_directory_uri();
$t = load_lang();
$icons = [
    'logo'      => $theme_uri . '/assets/images/logo_new.png',
    'messenger' => $theme_uri . '/assets/icons/messenger_logo.svg',
    'threads'   => $theme_uri . '/assets/images/threads-logo.png',
    'cat'       => $theme_uri . '/assets/images/mascot_cat.png',
];
?>
<div class="fixed w-12 h-12 z-50" style="bottom: 40px; right: 20px;">
    <a href="https://m.me/826106243930106" target="_blank">
        <div class="transition-all cursor-pointer flex items-center">
            <img src="<?php echo $icons['messenger'] ?>" alt="messenger" />
        </div>
    </a>
</div>

<footer style="background-color: #7B63F7;" class="relative text-white overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex flex-col md:flex-row items-start md:items-center py-8 gap-10" style="gap: 24px;">

            <!-- Left: Brand + contact info -->
            <div class="flex-shrink-0 space-y-3 z-10 min-w-[200px]">
                <!-- Logo + brand name -->
                <div class="flex items-center space-x-2">
                    <img width="48" height="48" src="<?php echo esc_url($icons['logo']); ?>" alt="cari wiki logo" class="rounded-md" />
                    <span class="text-lg font-bold tracking-tight">cari wiki</span>
                </div>

                <!-- Location -->
                <div class="flex items-center space-x-2 text-sm text-white/90">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Somewhere today</span>
                </div>

                <!-- Email -->
                <div class="flex items-center space-x-2 text-sm text-white/90">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Email <a href="mailto:contact@hihi-tour.vn" class="font-semibold hover:underline">contact@hihi-tour.vn</a></span>
                </div>

                <!-- Social links -->
                <div class="flex items-center space-x-4 text-sm pt-1">
                    <a href="https://www.threads.com/@timmotchonam" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-1 hover:opacity-80 transition-opacity">
                        <img width="20" height="20" src="<?php echo esc_url($icons['threads']); ?>" alt="<?php echo esc_attr($t['global']['social_threads_icon_alt']); ?>" />
                        <span><?php echo esc_html($t['global']['social_threads_label']); ?></span>
                    </a>
                </div>
            </div>

            <!-- Center: Nav links -->
            <div class="z-10 space-y-2">
                <h4 class="text-xs font-bold tracking-widest text-white/70 uppercase mb-3">Find somethings?</h4>
                <ul class="space-y-2 text-sm text-white/90">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white hover:underline transition-colors">Explore the world</a></li>
                    <li><a href="<?php echo esc_url(get_translated_permalink_by_slug('my-trips')); ?>" class="hover:text-white hover:underline transition-colors">My Trips</a></li>
                    <li><a href="#about-us" class="hover:text-white hover:underline transition-colors">About us</a></li>
                </ul>
            </div>

            <!-- Right: Large watermark text + cat mascot -->
            <!-- Cat mascot: absolute, dính sát mép dưới của footer -->
            <div class="hidden md:block" style="position: absolute; bottom: -30px; right: 0; z-index: 10; pointer-events: none;">
                <img
                    src="<?php echo esc_url($icons['cat']); ?>"
                    alt="cari wiki cat mascot"
                    style="max-width: 480px; width: auto; object-fit: contain; object-position: bottom; display: block;"
                />
            </div>

        </div>
    </div>
</footer>

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Hi Hi tour",
        "url": "https://hihitour.com/",
        "logo": "<?php echo esc_url($icons['logo']); ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Cat Ba island, Hai Phong, Vietnam",
            "addressLocality": "Ha Giang",
            "addressRegion": "Ha Giang",
            "postalCode": "22000",
            "addressCountry": "VN"
        },
        "telephone": "+84 936766696"
    }
</script>

<?php include get_template_directory() . '/components/itinerary-feedback-modal.php'; ?>
<?php wp_footer(); ?>
</body>

</html>
