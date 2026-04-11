<?php
$current_lang = pll_current_language('slug');
$theme_uri = get_template_directory_uri();
$icons = [
    'logo'      => $theme_uri . '/assets/images/logo.png',
    'messenger' => $theme_uri . '/assets/icons/messenger_logo.svg',
    'whatsapp'  => $theme_uri . '/assets/images/whatsapp.png',
    'instagram' => $theme_uri . '/assets/images/instagram.png',
    'facebook'  => $theme_uri . '/assets/images/facebook.png',
];
?>
<div class="fixed w-12 h-12 z-50" style="bottom: 40px; right: 20px;">
    <a href="https://m.me/826106243930106" target="_blank">
        <div class="transition-all cursor-pointer flex items-center">
            <img src="<?php echo $icons['messenger'] ?>" alt="messenger" />
        </div>
    </a>
</div>
<footer class="bg-[#31393B] text-white pt-10 pb-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <div class="col-span-1 space-y-4">
                <div class="flex items-center space-x-2">
                    <img width="48" height="48" src="<?php echo esc_url($icons['logo']); ?>" alt="Whatsapp Icon" />
                    <h3 class="text-xl font-bold">HI HI TOUR</h3>
                </div>

                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Cat Ba island, Hai Phong, Vietnam</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:contact@hihi-tour.vn" class="hover:text-white">contact@hihi-tour.vn</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>Hotline: <a href="https://wa.me/84936766696" target="_blank" class="hover:underline">+84 936766696</a></span>
                    </li>
                </ul>

                <div class="flex space-x-4 pt-2 text-sm">
                    <a href="https://wa.me/84936766696" target="_blank" class="flex items-center space-x-1 hover:text-white">
                        <img width="24" height="24" src="<?php echo esc_url($icons['whatsapp']); ?>" alt="Whatsapp Icon" />
                        <span>WhatsApp</span>
                    </a>
                    <a href="https://www.instagram.com/mr_hi_hi_04" target="_blank" class="flex items-center space-x-1 hover:text-white">
                        <img width="24" height="24" src="<?php echo esc_url($icons['instagram']); ?>" alt="Instagram Icon" />
                        <span>Instagram</span>
                    </a>
                    <a href="https://www.facebook.com/ps.r.sau" target="_blank" class="flex items-center space-x-1 hover:text-white">
                        <img width="24" height="24" src="<?php echo esc_url($icons['facebook']); ?>" alt="Facebook Icon" />
                        <span>Facebook</span>
                    </a>
                </div>
            </div>

            <div class="col-span-1">
                <h4 class="uppercase font-bold mb-4 text-white tracking-wider"><?php echo $current_lang === 'en' ? 'TOUR INFORMATION' : 'THÔNG TIN TOUR' ?></h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a class="hover:text-white" href="<?php echo esc_url(get_translated_permalink_by_slug('ha-giang-tour')); ?>"><?php echo $current_lang === 'en' ? 'Ha Giang Loop' : 'Một vòng Hà Giang' ?></a></li>
                    <li><a class="hover:text-white" href="<?php echo esc_url(get_translated_permalink_by_slug('cao-bang-tour')); ?>"><?php echo $current_lang === 'en' ? 'Cao Bang' : 'Cao Bằng' ?></a></li>
                    <li><a class="hover:text-white" href="<?php echo esc_url(get_translated_permalink_by_slug('cat-ba-tour')); ?>"><?php echo $current_lang === 'en' ? 'Cat Ba Island' : 'Đảo Cát Bà' ?></a></li>
                </ul>
            </div>

            <div class="col-span-1">
                <h4 class="uppercase font-bold mb-4 text-white tracking-wider"><?php echo $current_lang === 'en' ? 'USEFUL INFORMATION' : 'THÔNG TIN HỮU ÍCH' ?></h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="#about-us" class="hover:text-white"><?php echo $current_lang === 'en' ? 'About us' : 'Về chúng tôi' ?></a></li>
                    <li><a href="#how-to-book-us" class="hover:text-white"><?php echo $current_lang === 'en' ? 'How to book us?' : 'Làm sao để đặt?' ?></a></li>
                    <li><a class="hover:text-white" href="<?php echo esc_url(get_translated_permalink_by_slug('helps')); ?>" class="hover:text-white"><?php echo $current_lang === 'en' ? 'FAQs' : 'Câu hỏi thường gặp' ?></a></li>
                </ul>
            </div>

            <div class="col-span-1 hidden md:block">
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
        "logo": "https://hihitour.com/wp-content/themes/hihi-theme/assets/images/logo.png",
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

<?php wp_footer(); ?>
</body>

</html>