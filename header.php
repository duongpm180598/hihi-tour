<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo_48.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo_180.png">

    <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
    <?php
    function get_active_class($slug)
    {
        $active_class = 'border-2 border-[#474E50] py-1 px-3 bg-gray-100';
        $default_class = 'text-[#101F23] py-1 px-3 hover:bg-gray-50';

        global $post;
        $current_post_id = isset($post->ID) ? $post->ID : 0;

        if (is_front_page()) {
            if ($slug === 'home' || $slug === '/') {
                return $active_class;
            }
            return $default_class;
        }

        $target_page = get_page_by_path($slug);

        if ($target_page) {
            $target_post_id = $target_page->ID;
            $active_id = $target_post_id;

            if (function_exists('pll_get_post')) {
                $translated_id = pll_get_post($target_post_id, pll_current_language());
                if ($translated_id) {
                    $active_id = $translated_id;
                }
            }

            if ($current_post_id === $active_id) {
                return $active_class;
            }
        }

        if (isset($post->post_name) && $post->post_name === $slug) {
            return $active_class;
        }

        return $default_class;
    }

    $common_class_desktop = 'mx-2 font-medium transition rounded-full duration-200 hover:opacity-70';
    $common_class_mobile = 'block text-base w-full px-4 py-2 font-medium transition duration-200 hover:bg-gray-100 rounded-md';
    $header_lang = function_exists('load_lang') ? load_lang() : [];
    $header_global = $header_lang['global'] ?? [];
    $destinations_menu = [
        ['slug' => 'ha-giang', 'label' => $header_global['nav_destination_0_label'] ?? 'Ha Giang'],
        ['slug' => 'cao-bang', 'label' => $header_global['nav_destination_1_label'] ?? 'Cao Bang'],
        ['slug' => 'mu-cang-chai', 'label' => $header_global['nav_destination_2_label'] ?? 'Mu Cang Chai'],
        ['slug' => 'ninh-thuan', 'label' => $header_global['nav_destination_3_label'] ?? 'Ninh Thuan'],
        ['slug' => 'cat-ba-tour', 'label' => $header_global['nav_destination_4_label'] ?? 'Cat Ba'],
        ['slug' => 'taiwan', 'label' => $header_global['nav_destination_5_label'] ?? 'Taiwan'],
        ['slug' => 'hue-tour', 'label' => $header_global['nav_destination_6_label'] ?? 'Hue'],
    ];
    ?>

    <style>
        .hihi-explore-wrap:hover .hihi-explore-menu,
        .hihi-explore-wrap:focus-within .hihi-explore-menu {
            opacity: 1;
            pointer-events: auto;
        }

        .hihi-explore-menu {
            opacity: 0;
            pointer-events: none;
            position: absolute;
            left: 0;
            top: 100%;
            z-index: 50;
            width: 720px;
            max-width: calc(100vw - 48px);
            transition: opacity 150ms ease;
        }

        .hihi-explore-menu::before {
            content: "";
            display: block;
            height: 16px;
        }

        .hihi-explore-panel {
            padding: 16px 24px;
        }
    </style>

    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="shrink-0">
                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="text-2xl font-bold text-gray-800 hover:text-indigo-600 transition duration-150">
                    <img width="48" height="48" src="<?php echo get_template_directory_uri() . '/assets/images/logo_new.png' ?>" alt="logo" />
                </a>
            </div>

            <nav class="hidden md:flex flex-1 justify-center items-center">
                <div class="relative hihi-explore-wrap">
                    <a
                        href="<?php echo esc_url(home_url('/')); ?>"
                        class="<?php echo $common_class_desktop; ?> <?php echo str_replace('block text-lg w-full text-center py-3 font-semibold transition duration-200', '', is_front_page() ? 'border-2 border-[#474E50] py-1 px-3 bg-gray-100' : 'text-[#101F23] py-1 px-3 hover:bg-gray-50'); ?>">
                        <?php echo esc_html($header_global['nav_explore_world']); ?>
                    </a>

                    <div class="hihi-explore-menu">
                        <div class="hihi-explore-panel rounded-2xl border border-[#E5E7EB] bg-white shadow-2xl">
                            <div class="grid grid-cols-2 gap-2 lg:grid-cols-3">
                                <?php foreach ($destinations_menu as $destination): ?>
                                    <a
                                        href="<?php echo esc_url(get_translated_permalink_by_slug($destination['slug'])); ?>"
                                        class="rounded-lg border border-transparent px-3 py-2 text-sm font-semibold text-[#101F23] transition hover:bg-[#F9FBFD]"
                                    >
                                        <?php echo esc_html($destination['label']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <a
                    href="<?php echo esc_url(get_translated_permalink_by_slug('hihi-go-to')); ?>"
                    class="<?php echo $common_class_desktop; ?> <?php echo str_replace('block text-lg w-full text-center py-3 font-semibold transition duration-200', '', get_active_class('hihi-go-to')); ?>">
                    <?php echo esc_html($header_global['nav_shower_thoughts']); ?>
                </a>

                <a
                    href="<?php echo esc_url(get_translated_permalink_by_slug('helps')); ?>"
                    class="<?php echo $common_class_desktop; ?> <?php echo str_replace('block text-lg w-full text-center py-3 font-semibold transition duration-200', '', get_active_class('helps')); ?>">
                    <?php echo esc_html($header_global['nav_about_us']); ?>
                </a>
            </nav>

            <div class="shrink-0 flex items-center space-x-2">
                <?php
                if (function_exists('pll_the_languages')) {
                    $current_lang = pll_current_language('slug');
                    $languages = pll_the_languages(array(
                        'raw' => 1,
                    ));
                ?>
                    <div class="hidden md:inline-block relative text-left group">
                        <button aria-label="<?php echo esc_attr($header_global['nav_change_language']); ?>"
                            class="flex items-center space-x-1 transition duration-250 p-2 rounded-md focus:outline-none">
                            <span class="text-sm font-medium">
                                <?php echo esc_html($header_global['nav_language_prefix']); ?>: <?php echo strtoupper($current_lang); ?>
                            </span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div
                            class="hidden group-hover:block absolute right-0 w-32 origin-top-right rounded-md shadow-lg bg-white ring ring-[#8A8E8F] ring-opacity-5 z-10 pt-1"
                            style="top: 100%;">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <?php foreach ($languages as $lang) : ?>
                                    <a href="<?php echo esc_url($lang['url']); ?>"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-indigo-600"
                                        role="menuitem">
                                        <span class="font-semibold">
                                            <?php echo strtoupper($lang['slug']); ?>
                                        </span>
                                        (<?php echo esc_html($lang['name']); ?>)
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <button id="mobile-menu-toggle" aria-label="<?php echo esc_attr($header_global['nav_toggle_menu']); ?>" class="md:hidden p-2 rounded-md hover:bg-gray-100 transition duration-150">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <nav id="mobile-menu" class="hidden md:hidden fixed inset-0 bg-opacity-90 z-40 transform transition-transform duration-300 translate-x-full">
            <div class="absolute right-0 top-0 w-72 max-w-full sm:w-80 bg-white h-full shadow-2xl p-6 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-xl font-bold text-gray-800"><?php echo esc_html($header_global['nav_menu']); ?></h2>
                        <button id="mobile-menu-close" aria-label="<?php echo esc_attr($header_global['nav_close_menu']); ?>" class="p-2 rounded-full hover:bg-gray-100 transition duration-150">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Các Item Menu Mobile -->
                    <div class="flex flex-col space-y-2">
                        <a
                            href="<?php echo esc_url(home_url('/')); ?>"
                            class="<?php echo $common_class_mobile; ?> <?php echo str_replace('py-1 px-3', '', is_front_page() ? 'border-2 border-[#474E50] bg-gray-100' : 'text-[#101F23] hover:bg-gray-50'); ?>">
                            <?php echo esc_html($header_global['nav_explore_world']); ?>
                        </a>

                        <div class="rounded-xl bg-[#F9FBDF] p-3">
                            <p class="mb-2 px-1 text-xs font-semibold uppercase tracking-wide text-[#74797A]">
                                <?php echo esc_html($header_global['nav_destinations_title']); ?>
                            </p>
                            <div class="grid grid-cols-1 gap-1">
                                <?php foreach ($destinations_menu as $destination): ?>
                                    <a
                                        href="<?php echo esc_url(get_translated_permalink_by_slug($destination['slug'])); ?>"
                                        class="rounded-lg px-3 py-2 text-sm font-semibold text-[#101F23] hover:bg-white"
                                    >
                                        <?php echo esc_html($destination['label']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <a
                            href="<?php echo esc_url(get_translated_permalink_by_slug('hihi-go-to')); ?>"
                            class="<?php echo $common_class_mobile; ?> <?php echo str_replace('py-1 px-3', '', get_active_class('hihi-go-to')); ?>">
                            <?php echo esc_html($header_global['nav_shower_thoughts']); ?>
                        </a>

                        <a
                            href="<?php echo esc_url(get_translated_permalink_by_slug('helps')); ?>"
                            class="<?php echo $common_class_mobile; ?> <?php echo str_replace('py-1 px-3', '', get_active_class('helps')); ?>">
                            <?php echo esc_html($header_global['nav_about_us']); ?>
                        </a>
                    </div>
                </div>

                <!-- Language Switcher đặt trong Sidebar -->
                <?php if (function_exists('pll_the_languages')) { ?>
                    <div class="mt-8 pt-4 border-t border-gray-200">
                        <p class="text-sm font-semibold text-gray-500 mb-2"><?php echo esc_html($header_global['nav_change_language']); ?></p>
                        <?php foreach ($languages as $lang) : ?>
                            <a href="<?php echo esc_url($lang['url']); ?>"
                                class="flex justify-between items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-100 transition duration-150 
                                <?php echo ($lang['slug'] === $current_lang) ? 'bg-indigo-50 text-indigo-700' : 'text-gray-700'; ?>">
                                <span><?php echo esc_html($lang['name']); ?></span>
                                <span class="font-bold text-sm"><?php echo strtoupper($lang['slug']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>

            </div>
        </nav>

        <!-- JavaScript cho Mobile Menu -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButton = document.getElementById('mobile-menu-toggle');
                const closeButton = document.getElementById('mobile-menu-close');
                const mobileMenu = document.getElementById('mobile-menu');
                const sidebarContent = mobileMenu.querySelector('div.absolute'); // Chọn nội dung sidebar
                const body = document.body;

                function openMenu() {
                    mobileMenu.classList.remove('hidden');
                    // Sử dụng setTimeout để đảm bảo transition được áp dụng
                    setTimeout(() => {
                        mobileMenu.classList.remove('translate-x-full');
                        sidebarContent.classList.remove('translate-x-full'); // Loại bỏ translate trên nội dung sidebar

                        // Nội dung sidebar sẽ trượt vào từ phải sang
                        mobileMenu.classList.add('translate-x-0');
                        body.style.overflow = 'hidden'; // Ngăn cuộn trang
                    }, 10);
                }

                function closeMenu() {
                    // Trượt nội dung sidebar ra ngoài
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');
                    body.style.overflow = '';

                    // Sau khi transition hoàn tất, ẩn menu hoàn toàn
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300); // Phải khớp với thời gian transition (duration-300)
                }

                toggleButton.addEventListener('click', openMenu);
                closeButton.addEventListener('click', closeMenu);

                // Đóng menu khi click vào overlay (Vùng tối bên trái)
                mobileMenu.addEventListener('click', function(event) {
                    // Kiểm tra xem click có phải vào chính thẻ nav overlay hay không,
                    // và không phải vào nội dung sidebar bên trong
                    if (event.target === mobileMenu) {
                        closeMenu();
                    }
                });

                // Đóng menu khi nhấn phím ESC
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                        closeMenu();
                    }
                });
            });
        </script>
    </header>
