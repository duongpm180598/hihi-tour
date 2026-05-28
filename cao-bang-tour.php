<?php
/*
Template Name: Cao Bang Tour
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php
$current_lang = pll_current_language('slug');
$t = load_lang();

$theme_uri = get_template_directory_uri();

$banner_images = [
    'banner_1' => $theme_uri . '/assets/images/cao-bang/banner_1.png',
    'banner_2' => $theme_uri . '/assets/images/cao-bang/banner_2.png',
    'banner_3' => $theme_uri . '/assets/images/cao-bang/banner_3.png',
    'banner_4' => $theme_uri . '/assets/images/cao-bang/banner_4.png',
    'banner_5' => $theme_uri . '/assets/images/cao-bang/banner_5.png',
];

// Danh sách các ảnh.
$images = [
    '/assets/images/ha-giang/gallery/nho_que_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/cuoc_song_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/xa_phin_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/pho_cao_ha_giang_2.jpg',
    '/assets/images/ha-giang/gallery/pho_cao_ha_giang_3.jpg',
    '/assets/images/ha-giang/gallery/cua_chu_M_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/du_gia_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/pho_bang_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/dan_trau_tren_doi.jpg',
    '/assets/images/ha-giang/gallery/tre_em_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/doc_tham_ma_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/nui_rung_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/cho_meo_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/tu_san_coffee_ha_giang.jpg',
    '/assets/images/ha-giang/gallery/pho_cao_ha_giang_1.jpg',
];

// Load ALL gallery images dynamically for modal
$gallery_dir   = get_template_directory() . '/assets/images/ha-giang/gallery/';
$gallery_files = glob($gallery_dir . '*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE);
sort($gallery_files);
$all_gallery_images = array_map(function($file) use ($theme_uri) {
    return $theme_uri . '/assets/images/ha-giang/gallery/' . basename($file);
}, $gallery_files);

// itinerary
$plan_options = [
    '3' => $current_lang === 'en' ? '3 days 2 nights' : '3 ngày 2 đêm',
    '2' => $current_lang === 'en' ? '2 days 1 night' : '2 ngày 1 đêm',
];
$default_plan = '3';
$default_days_count = intval($default_plan);
$default_days = range(0, $default_days_count);

$locations = [
    'caobang' => ['display' => $current_lang === 'en' ? 'Cao Bang City' : 'TP.Cao Bằng', 'api_query' => 'latitude=22.6825&longitude=106.2735'],
    'bangioc' => ['display' => $current_lang === 'en' ? 'Ban Gioc Waterfall' : 'Thác Bản Giốc', 'api_query' => 'latitude=22.8509&longitude=106.7184'],
    'lenin'  => ['display' => $current_lang === 'en' ? 'Lenin Stream' : 'Suối Lenin', 'api_query' => 'latitude=22.9584&longitude=106.0455'],
];
$icon_root_path = $theme_uri . '/assets/icons/';

// Danh sách ảnh cho phần Image Grid (số từ 1 đến 4)
$image_grid_count = 4;

$image_grid_indices = [1, 2, 3];

// how to book us
$icons = [
    'itinerary' => $theme_uri . '/assets/icons/itinerary.svg',
    'schedule'  => $theme_uri . '/assets/icons/schedule.svg',
    'human'     => $theme_uri . '/assets/icons/human.svg',
    'globe'     => $theme_uri . '/assets/icons/globe.svg',
    'family'    => $theme_uri . '/assets/icons/family.svg',
    'group'     => $theme_uri . '/assets/icons/group.svg',
    'bike'      => $theme_uri . '/assets/icons/bike.svg',
    'emoji'     => $theme_uri . '/assets/icons/emoji.svg',
    'receipt'   => $theme_uri . '/assets/icons/receipt.svg',
    'payment'   => $theme_uri . '/assets/icons/payment.svg',
    'whatsapp'  => $theme_uri . '/assets/images/whatsapp.png',
    'instagram' => $theme_uri . '/assets/images/instagram.png',
    'facebook'  => $theme_uri . '/assets/images/facebook.png',
];

$qrs = [
    'whatsapp_qr' => $theme_uri . '/assets/images/whatsapp_qr.jpg',
    'instagram_qr' => $theme_uri . '/assets/images/instagram_qr.png',
    'facebook_qr'  => $theme_uri . '/assets/images/facebook_qr.png',
];

// faqs
$faqs_data = [
    ['group' => 'ha_giang', 'q' => 'faq_q_age', 'a' => 'faq_a_age'],
    ['group' => 'ha_giang', 'q' => 'faq_q_challenge', 'a' => 'faq_a_challenge'],
    ['group' => 'ha_giang', 'q' => 'faq_q_driving', 'a' => 'faq_a_driving'],
    ['group' => 'ha_giang', 'q' => 'faq_q_packing', 'a' => 'faq_a_packing'],
    ['group' => 'ha_giang', 'q' => 'faq_q_party', 'a' => 'faq_a_party'],

    ['group' => 'global', 'q' => 'faq_q_tip', 'a' => 'faq_a_tip'],
];

// S3 highlights — "What's here"
$highlights = [
    [
        'img'      => '/assets/images/cao-bang/gallery_1.png',
        'imgs'     => [
            '/assets/images/cao-bang/gallery_1.png',
            '/assets/images/cao-bang/banner_1.png',
        ],
        'category' => 'viewpoints',
        'tag_en' => 'Viewpoint',
        'tag_vi' => 'Điểm ngắm',
        'title_en' => 'Khau Cốc Chà',
        'title_vi' => 'Khau Cốc Chà',
        'desc_en' => 'Description placeholder.',
        'desc_vi' => 'Description placeholder.',
        'span'     => 'tall',
    ],
    [
        'img'      => '/assets/images/cao-bang/gallery_2.png',
        'imgs'     => [
            '/assets/images/cao-bang/gallery_2.png',
            '/assets/images/cao-bang/banner_2.png',
        ],
        'category' => 'nature',
        'tag_en' => 'Waterfall',
        'tag_vi' => 'Thác nước',
        'title_en' => 'Bản Giốc waterfall',
        'title_vi' => 'Thác Bản Giốc',
        'desc_en' => 'Description placeholder.',
        'desc_vi' => 'Description placeholder.',
        'span'     => 'normal',
    ],
    [
        'img'      => '/assets/images/cao-bang/gallery_3.png',
        'imgs'     => [
            '/assets/images/cao-bang/gallery_3.png',
            '/assets/images/cao-bang/banner_3.png',
        ],
        'category' => 'nature',
        'tag_en' => 'History',
        'tag_vi' => 'Lịch sử',
        'title_en' => 'Lenin stream',
        'title_vi' => 'Suối Lenin',
        'desc_en' => 'Description placeholder.',
        'desc_vi' => 'Description placeholder.',
        'span'     => 'normal',
    ],
    [
        'img'      => '/assets/images/cao-bang/gallery_4.png',
        'imgs'     => [
            '/assets/images/cao-bang/gallery_4.png',
            '/assets/images/cao-bang/banner_4.png',
        ],
        'category' => 'viewpoints',
        'tag_en' => 'Viewpoint',
        'tag_vi' => 'Điểm ngắm',
        'title_en' => 'Ba Quáng hill',
        'title_vi' => 'Đồi Ba Quáng',
        'desc_en' => 'Description placeholder.',
        'desc_vi' => 'Description placeholder.',
        'span'     => 'normal',
    ],
    [
        'img'      => '/assets/images/cao-bang/gallery_5.png',
        'imgs'     => [
            '/assets/images/cao-bang/gallery_5.png',
            '/assets/images/cao-bang/banner_5.png',
        ],
        'category' => 'nature',
        'tag_en' => 'Valley',
        'tag_vi' => 'Thung lũng',
        'title_en' => 'Bảo Lâm',
        'title_vi' => 'Bảo Lâm',
        'desc_en' => 'Description placeholder.',
        'desc_vi' => 'Description placeholder.',
        'span'     => 'tall',
    ],
];

$tableOfContents = [
    [
        'id' => 'overview',
        'title' => $t['global']['toc_overview'] ?? 'Tổng quan',
    ],
    [
        'id' => 'itinerary',
        'title' => $t['global']['toc_itinerary'] ?? 'Lịch trình',
    ],
    [
        'id' => 'gallery',
        'title' => $t['global']['toc_gallery'] ?? 'Thư viện ảnh',
    ],
    [
        'id' => 'transportation',
        'title' => $t['global']['toc_transportation'] ?? 'Phương tiện đi lại',
    ],
    [
        'id' => 'accomodations',
        'title' => $t['global']['toc_accomodations'] ?? 'Chỗ ở',
    ],
    [
        'id' => 'weather',
        'title' => $t['global']['toc_weather'] ?? 'Thời tiết',
    ],
    [
        'id' => 'activities',
        'title' => $t['global']['toc_activities'] ?? 'Các hoạt động',
    ],
    [
        'id' => 'how-to-book',
        'title' => $t['global']['toc_how_to_book'] ?? 'Cách đặt tour',
    ],
    [
        'id' => 'faqs',
        'title' => $t['global']['toc_faqs'] ?? 'FAQs',
    ],
];
$activeId = $tableOfContents[0]['id'];
?>

<!-- banner  -->
<div class="fixed top-50 -right-12 z-50">
    <div
        id="btn-table-of-content"
        class="bg-[#dededd] flex items-center gap-1 text-xs font-bold rounded shadow-lg p-2 transform -rotate-90 whitespace-nowrap cursor-pointer hover:opacity-70">
        Table of content <ion-icon class="text-[#101f23]" name="arrow-up-circle-outline"></ion-icon>
    </div>
    <div
        id="toc-content"
        class="
            absolute -top-12 right-0
            w-50 h-fit bg-white overflow-y-auto shadow-xl 
            transform translate-x-full transition duration-300 ease-in-out z-40
        ">
        <div class="p-3 text-xs text-[#74797A]">Table of content</div>
        <ul id="toc-list">
            <?php
            foreach ($tableOfContents as $item) {
                $isActive = $item['id'] === $activeId;
                $classes = 'border-s-1 border-transparent transition-all duration-200';
                if ($isActive) {
                    $classes .= ' bg-[#FAF9F7] font-semibold border-l-1 border-l-[#8ca865]';
                } else {
                    $classes .= ' hover:bg-[#FAF9F7] hover:font-bold border-r-1 hover:border-l-[#8ca865]';
                }
            ?>
                <li class="<?php echo $classes; ?>">
                    <a href="#<?php echo $item['id']; ?>" class="block p-2">
                        <?php echo $item['title']; ?>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<div class="gallery-container overflow-x-hidden">
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 pt-16" id="overview" data-aos="fade-up" data-aos-duration="1000">
        <div class="text-center mb-12">
            <p class="mb-3" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600; color:#1D292C;">
                <?php echo $current_lang === 'en' ? "the calm northeast" : "vùng đông bắc dịu êm" ?>
            </p>
            <h1 class="mb-4" style="font-family:'Phudu',sans-serif; font-size:clamp(32px,7vw,64px); line-height:1.05; font-weight:600; color:#1D292C;">
                <?php echo $current_lang === 'en' ? "Cao Bang" : "Cao Bằng" ?>
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_1']); ?>"
                    src="<?php echo esc_url($banner_images['banner_1']); ?>"
                    alt="<?php echo $current_lang === 'en' ? 'Cao Bang mountain road' : 'Đường núi Cao Bằng'; ?>"
                    class="w-full h-full object-cover cursor-pointer rounded-xl" />
            </div>

            <div class="col-span-1 row-span-2">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_3']); ?>"
                    src="<?php echo esc_url($banner_images['banner_3']); ?>"
                    alt="<?php echo $current_lang === 'en' ? 'Cao Bang landscape' : 'Phong cảnh Cao Bằng'; ?>"
                    class="w-full h-full object-cover cursor-pointer rounded-xl" />
            </div>

            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_2']); ?>"
                    src="<?php echo esc_url($banner_images['banner_2']); ?>"
                    alt="<?php echo $current_lang === 'en' ? 'Cao Bang valley' : 'Thung lũng Cao Bằng'; ?>"
                    class="w-full h-full object-cover cursor-pointer rounded-xl" />
            </div>

            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_4']); ?>"
                    src="<?php echo esc_url($banner_images['banner_4']); ?>"
                    alt="<?php echo $current_lang === 'en' ? 'Cao Bang village' : 'Bản làng Cao Bằng'; ?>"
                    class="w-full h-full object-cover cursor-pointer rounded-xl" />
            </div>

            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_5']); ?>"
                    src="<?php echo esc_url($banner_images['banner_5']); ?>"
                    alt="<?php echo $current_lang === 'en' ? 'Cao Bang river scene' : 'Sông suối Cao Bằng'; ?>"
                    class="w-full h-full object-cover cursor-pointer rounded-xl" />
            </div>
        </div>
        <div class="max-w-4xl mt-8 mx-auto space-y-4" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; color:#1D292C;">
            <p>
                <?php echo $current_lang === 'en' ? "Cao Bang sits in Vietnam's northeast, where limestone peaks, rivers, and open valleys make the road feel properly cinematic." : "Cao Bằng nằm ở vùng núi Đông Bắc Việt Nam, nơi núi đá vôi, sông suối và thung lũng mở ra một cung đường rất đáng đi." ?>
            </p>
            <p>
                <?php echo $current_lang === 'en' ? "We've been riding Cao Bang since 2018, mixing the big-name stops with quieter roads that still feel untouched." : "Hi Hi Tour chạy Cao Bằng từ năm 2018, kết hợp các điểm nổi tiếng với những cung đường yên hơn và còn nguyên bản." ?>
            </p>
        </div>
    </section>

    <!-- ── VIBE ── -->
    <section style="background:#E7F15A;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <p class="mb-5" style="font-family:'Phudu',sans-serif; font-size:24px; line-height:36px; font-weight:600; color:#1D292C;">
                <?php echo $current_lang === 'en' ? 'cao bang at a glance' : 'cao bằng trong một nhịp nhìn'; ?>
            </p>
            <?php
            $vibes = [
                [
                    'icon'  => 'human',
                    'title' => $current_lang === 'en' ? 'trip style' : 'kiểu đi',
                    'val'   => $current_lang === 'en' ? 'calm, scenic, low chaos' : 'êm, đẹp, ít rối',
                ],
                [
                    'icon'  => 'money',
                    'title' => $current_lang === 'en' ? 'budget' : 'ngân sách',
                    'val'   => $current_lang === 'en' ? 'easy to plan' : 'dễ tính trước',
                ],
                [
                    'icon'  => 'globe',
                    'title' => $current_lang === 'en' ? 'best for' : 'hợp với',
                    'val'   => $current_lang === 'en' ? 'waterfalls and backroads' : 'thác nước và đường vắng',
                ],
                [
                    'icon'  => 'clock',
                    'title' => $current_lang === 'en' ? 'pace' : 'nhịp đi',
                    'val'   => $current_lang === 'en' ? '2-3 days' : '2-3 ngày',
                ],
            ];
            ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ($vibes as $v):
                    $icon_url = esc_url($theme_uri . '/assets/icons/' . $v['icon'] . '.svg');
                ?>
                    <div class="flex items-start gap-3">
                        <div style="width:36px; height:36px; border-radius:50%; background:#1D292C; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <img src="<?php echo $icon_url; ?>" alt="" width="18" height="18" style="filter:brightness(0) invert(1);" aria-hidden="true" />
                        </div>
                        <div>
                            <p style="font-family:'Inter',sans-serif; font-size:12px; line-height:20px; font-weight:600; color:rgba(29,41,44,.7); margin:0 0 4px;">
                                <?php echo esc_html($v['title']); ?>
                            </p>
                            <p style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600; color:#1D292C; margin:0;">
                                <?php echo esc_html($v['val']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Itinerary -->
    <section class="pt-16 pb-16" id="itinerary" data-aos="fade-up" data-aos-duration="1000" style="background:#F2F2F0;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="mb-3" style="font-family:'Phudu',sans-serif; font-size:24px; line-height:36px; font-weight:600; color:#1D292C;">
                <?php echo $current_lang === 'en' ? "cao bang itinerary" : "lịch trình cao bằng" ?>
            </h2>

            <p class="mb-6" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:400; color:rgba(29,41,44,.7);">
                <?php echo $current_lang === 'en' ? "Pick your pace. We'll handle the route, rooms, food, and the bits that usually get messy." : "Chọn nhịp đi của bạn. Chúng tôi lo cung đường, chỗ ngủ, bữa ăn và mấy phần dễ rối." ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 mb-8">
                    <div id="itinerary-plans" class="flex flex-wrap gap-2 mb-6">
                        <?php foreach ($plan_options as $value => $text) : ?>
                            <?php
                            $is_active = ($value == $default_plan);
                            $active_class = $is_active
                                ? 'text-[#F2F2F0]'
                                : 'text-[#1D292C] border border-[#1D292C99] hover:bg-[#F9FBDF]';
                            $active_style = $is_active
                                ? 'background:#7B63F7; border:1px solid #7B63F7;'
                                : 'background:transparent;';
                            ?>
                            <a
                                data-plan-value="<?php echo esc_attr($value); ?>"
                                class="plan-pill inline-flex items-center cursor-pointer px-5 rounded-full transition duration-200 <?php echo $active_class; ?>"
                                style="min-height:48px; font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600; <?php echo $active_style; ?>">
                                <?php echo esc_html($text); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <?php
                    $default_days = range(0, $default_days_count);
                    ?>
                    <ul id="itinerary-tabs" class="flex flex-wrap text-center border border-[#1D292C99] rounded-tl-xl rounded-tr-xl overflow-hidden">
                        <?php foreach ($default_days as $index) : ?>
                            <?php
                            $border_top_left = ($index === 0) ? 'rounded-tl-lg' : '';
                            $border_top_right = ($index === count($default_days) - 1) ? 'rounded-tr-lg' : '';
                            $is_active = ($index === 0);
                            ?>
                            <li class="w-full flex-1 <?php echo $border_top_left;
                                                                    echo $border_top_right ?>">
                                <a
                                    data--index="<?php echo $index; ?>"
                                    class="inline-flex items-center justify-center cursor-pointer w-full tab-link"
                                    style="min-height:48px; font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600; background:<?php echo $is_active ? '#7B63F7' : '#F9FBDF'; ?>; color:<?php echo $is_active ? '#F2F2F0' : '#1D292C'; ?>;">
                                    <?php echo $current_lang === 'en' ? "day" : "ngày" ?> <?php echo $index; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div id="timeline-content" class="relative py-8 pl-6 border border-[#1D292C99] border-t-0 rounded-bl-xl rounded-br-xl min-h-2/3" style="background:#F9FBDF;">
                        <div class="relative">
                            <div class="absolute top-0 left-24 w-0.5 bg-[#7B63F7] h-full z-0"></div>
                            <ol id="timeline-list" class="relative ml-0 pr-3 list-none">
                            </ol>
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6 mb-6 p-4 rounded-xl" style="color:#1D292C;">
                        <img src="<?php echo esc_url($icons['itinerary']); ?>" alt="itinerary" />
                        <div class="flex flex-col">
                            <span style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600;">
                                <?php echo $current_lang === 'en' ? 'the route can flex' : 'lịch trình có thể linh hoạt' ?>
                            </span>
                            <span style="font-family:'Inter',sans-serif; font-size:12px; line-height:20px; color:rgba(29,41,44,.7);">
                                <?php echo $current_lang === 'en' ? 'Been here before? We can switch up the route and build around special requests.' : 'Nếu bạn đã từng tới Cao Bằng, chúng tôi có thể đổi cung và điều chỉnh theo yêu cầu riêng.' ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <?php $cb = $t['cao_bang']; ?>
                    <div class="p-6 rounded-xl" style="background:#fff; color:#1D292C;">
                        <h2 class="mb-1" style="font-family:'Phudu',sans-serif; font-size:24px; line-height:36px; font-weight:600;"><span id="price-per-plan"></span></h2>
                        <p class="mb-4" style="font-family:'Inter',sans-serif; font-size:12px; line-height:20px; color:rgba(29,41,44,.7);"><?php echo esc_html($cb['itinerary_price_note']); ?></p>
                        <?php
                        $close_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                        $pricing_items = [
                            [
                                'label' => $cb['itinerary_include_1'],
                                'unit' => 'all',
                                'usd' => 30,
                                'vnd' => 700000,
                            ],
                            [
                                'label' => $cb['itinerary_include_2'],
                                'unit' => 'day',
                                'usd' => 15,
                                'vnd' => 300000,
                            ],
                            [
                                'label' => $cb['itinerary_include_3'],
                                'unit' => 'meal',
                                'usd' => 10,
                                'vnd' => 150000,
                            ],
                            [
                                'label' => $cb['itinerary_include_4'],
                                'type' => 'motorbike',
                                'unit' => 'day',
                                'usd' => 7,
                                'vnd' => 180000,
                            ],
                            [
                                'label' => $cb['itinerary_include_5'],
                                'type' => 'easy-driver',
                                'unit' => 'day',
                                'usd' => 60,
                                'vnd' => 1000000,
                            ],
                            [
                                'label' => $cb['itinerary_include_6'],
                                'unit' => 'all',
                                'usd' => 10,
                                'vnd' => 200000,
                            ],
                        ];
                        ?>

                        <p class="mb-2" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600;">
                            <?php echo esc_html($cb['itinerary_include_title']); ?>
                        </p>
                        <ul class="space-y-2 mb-6" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px;">
                            <?php foreach ($pricing_items as $item): ?>
                                <li>
                                    <label class="flex items-start gap-2 cursor-pointer">
                                        <input
                                            type="checkbox"
                                            class="pricing-include mt-1 h-4 w-4 rounded border-[#1D292C99]"
                                            style="accent-color:#7B63F7;"
                                            data-type="<?php echo esc_attr($item['type'] ?? ''); ?>"
                                            data-unit="<?php echo esc_attr($item['unit']); ?>"
                                            data-usd="<?php echo esc_attr($item['usd']); ?>"
                                            data-vnd="<?php echo esc_attr($item['vnd']); ?>"
                                            <?php checked(($item['type'] ?? '') !== 'motorbike'); ?>
                                        />
                                        <span><?php echo esc_html($item['label']); ?></span>
                                    </label>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <p class="mb-2" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; font-weight:600;">
                            <?php echo $current_lang === 'en' ? "what's not included" : 'giá chưa bao gồm' ?>
                        </p>
                        <ul class="space-y-2 mb-6" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px;">
                            <li class="flex items-start">
                                <?php echo $close_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Personal expenses (beverages at stops, food market,...)' : 'Phí cá nhân: đồ uống ở các trạm dừng nghỉ, đồ ăn vặt,...' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $close_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Desired souvenirs to bring back home' : 'Quà lưu niệm (nếu bạn mua)' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $close_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Tips are optional, but appreciated!' : 'Tiền bo (tip) không bắt buộc' ?>
                            </li>
                        </ul>

                    </div>

                    <div class="flex gap-3 mt-6 mb-3" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; color:#1D292C;">
                        <img src="<?php echo esc_url($icons['human']); ?>" alt="human" />
                        <div class="flex flex-col">
                            <span style="font-weight:600;">
                                <?php echo $current_lang === 'en' ? 'age: 8-75' : 'độ tuổi: 8-75' ?>
                            </span>
                            <span style="font-size:12px; line-height:20px; color:rgba(29,41,44,.7);">
                                <?php echo $current_lang === 'en' ? 'Ask us first if health or comfort is a concern.' : 'Nhắn chúng tôi trước nếu bạn còn lăn tăn về sức khỏe hoặc độ thoải mái.' ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-3" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; color:#1D292C;">
                        <img src="<?php echo esc_url($icons['group']); ?>" alt="group" />
                        <div class="flex flex-col">
                            <span style="font-weight:600;">
                                <?php echo $current_lang === 'en' ? 'private or shared' : 'tour riêng hoặc tour ghép' ?>
                            </span>
                            <span style="font-size:12px; line-height:20px; color:rgba(29,41,44,.7);">
                                <?php echo $current_lang === 'en' ? 'Private by default. Shared only if you ask.' : 'Mặc định là tour riêng. Chỉ ghép khi bạn yêu cầu.' ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-3" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; color:#1D292C;">
                        <img src="<?php echo esc_url($icons['schedule']); ?>" alt="schedule" />
                        <div class="flex flex-col">
                            <span style="font-weight:600;">
                                <?php echo $current_lang === 'en' ? 'start time: check availability' : 'ngày bắt đầu: mọi ngày trong tuần' ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-3" style="font-family:'Inter',sans-serif; font-size:15px; line-height:24px; color:#1D292C;">
                        <img src="<?php echo esc_url($icons['globe']); ?>" alt="globe" />
                        <div class="flex flex-col">
                            <span style="font-weight:600;">
                                <?php echo $current_lang === 'en' ? 'language: Vietnamese, basic English' : 'ngôn ngữ: tiếng Việt, tiếng Anh cơ bản' ?>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Transportation -->
    <div class="pt-16" id="transportation">
        <section class="mb-8 md:mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Section heading -->
                <h3 class="font-phudu text-center mb-8" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px; text-transform:uppercase;">
                    <?php echo $t['ha_giang']['transport_title']; ?>
                </h3>

                <!-- Tab row: Sleep bus (active) | Bikes | Bicycle -->
                <div class="flex items-center justify-center gap-12 mb-8">

                    <!-- Active tab: Sleep bus — purple blob shape -->
                    <button
                        id="tab-bus"
                        onclick="transTab('bus')"
                        class="trans-tab relative flex items-center justify-center font-bold text-white text-sm"
                        style="width:160px; height:72px;"
                        aria-pressed="true"
                    >
                        <!-- Purple blob SVG background -->
                        <svg viewBox="0 0 200 90" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0;width:100%;height:100%;" preserveAspectRatio="none">
                            <path fill="#7B63F7" d="M100,5 C120,5 148,12 162,28 C176,44 178,58 170,70 C162,82 140,88 118,88 C96,88 60,90 44,76 C28,62 22,46 30,30 C38,14 60,5 80,5 Z"/>
                        </svg>
                        <span class="relative z-10"><?php echo $t['ha_giang']['transport_tab_bus']; ?></span>
                    </button>

                    <!-- Inactive tab: Bikes — hidden -->
                    <!-- Inactive tab: Bicycle — hidden -->
                </div>

                <!-- ── BUS TAB CONTENT ── -->
                <div id="trans-content-bus">

                    <!-- Intro text -->
                    <p class="text-center max-w-xl mx-auto mb-10" style="color:#1D292C; font-size:15px;">
                        <?php echo $t['ha_giang']['transport_intro']; ?>
                    </p>

                    <!-- 3-column bus type cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                        <?php
                        // Seat icon SVGs
                        // 2-seat row (VIP): 2 seats side by side with gap
                        $seat_svg = '<svg viewBox="0 0 28 32" width="18" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="14" height="18" rx="5" fill="#3D4F52"/><rect x="2" y="24" width="14" height="4" rx="2" fill="#3D4F52"/></svg>';

                        $bus_types = [
                            [
                                'label_en' => $t['ha_giang']['transport_bus_0_label'],
'label_vi' => $t['ha_giang']['transport_bus_0_label'],
                                'badge_en' => $t['ha_giang']['transport_bus_0_badge'],
'badge_vi' => $t['ha_giang']['transport_bus_0_badge'],
                                'img'       => get_template_directory_uri() . '/assets/images/ha-giang/vip.webp',
                                'desc_en' => $t['ha_giang']['transport_bus_0_desc'],
'desc_vi' => $t['ha_giang']['transport_bus_0_desc'],
                                'rows_en' => $t['ha_giang']['transport_bus_0_rows'],
'rows_vi' => $t['ha_giang']['transport_bus_0_rows'],
                                'price_en' => $t['ha_giang']['transport_bus_0_price'],
'price_vi' => $t['ha_giang']['transport_bus_0_price'],
                                'seats'     => 2,
                            ],
                            [
                                'label_en' => $t['ha_giang']['transport_bus_1_label'],
'label_vi' => $t['ha_giang']['transport_bus_1_label'],
                                'badge_en' => $t['ha_giang']['transport_bus_1_badge'],
'badge_vi' => $t['ha_giang']['transport_bus_1_badge'],
                                'img'       => get_template_directory_uri() . '/assets/images/ha-giang/normal.webp',
                                'desc_en' => $t['ha_giang']['transport_bus_1_desc'],
'desc_vi' => $t['ha_giang']['transport_bus_1_desc'],
                                'rows_en' => $t['ha_giang']['transport_bus_1_rows'],
'rows_vi' => $t['ha_giang']['transport_bus_1_rows'],
                                'price_en' => $t['ha_giang']['transport_bus_1_price'],
'price_vi' => $t['ha_giang']['transport_bus_1_price'],
                                'seats'     => 3,
                            ],
                            [
                                'label_en' => $t['ha_giang']['transport_bus_2_label'],
'label_vi' => $t['ha_giang']['transport_bus_2_label'],
                                'badge_en' => $t['ha_giang']['transport_bus_2_badge'],
'badge_vi' => $t['ha_giang']['transport_bus_2_badge'],
                                'img'       => get_template_directory_uri() . '/assets/images/ha-giang/economy.webp',
                                'desc_en' => $t['ha_giang']['transport_bus_2_desc'],
'desc_vi' => $t['ha_giang']['transport_bus_2_desc'],
                                'rows_en' => $t['ha_giang']['transport_bus_2_rows'],
'rows_vi' => $t['ha_giang']['transport_bus_2_rows'],
                                'price_en' => $t['ha_giang']['transport_bus_2_price'],
'price_vi' => $t['ha_giang']['transport_bus_2_price'],
                                'seats'     => 3,
                            ],
                        ];

                        // Yellow blob SVG (for image badge)
                        $blob_yellow = '<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0;width:100%;height:100%;"><path fill="#E7F15A" d="M50,5 C62,5 74,10 82,20 C90,30 92,44 88,56 C84,68 74,78 62,84 C50,90 36,90 24,84 C12,78 4,66 2,52 C0,38 6,24 16,14 C26,4 38,5 50,5 Z"/></svg>';

                        foreach ($bus_types as $bt):
                        ?>
                        <div>
                            <!-- Image with blob badge -->
                            <div style="position:relative; margin-bottom:8px;">
                                <img
                                    src="<?php echo esc_url($bt['img']); ?>"
                                    alt="<?php echo esc_attr($bt['badge_en']); ?>"
                                    class="w-full object-cover rounded-lg"
                                    style="height:220px; object-fit:cover;"
                                />
                                <!-- Yellow blob badge top-right -->
                                <div style="position:absolute; top:12px; right:12px; width:80px; height:80px;">
                                    <?php echo $blob_yellow; ?>
                                    <span style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; text-align:center; font-size:11px; font-weight:700; color:#1D292C; line-height:1.3; padding:8px;">
                                        <?php echo $current_lang === 'en' ? $bt['badge_en'] : $bt['badge_vi']; ?>
                                    </span>
                                </div>
                                <p class="text-center text-xs mt-1" style="color:#74797A;">
                                    <?php echo $t['ha_giang']['transport_image_note']; ?>
                                </p>
                            </div>

                            <!-- Card label -->
                            <h3 class="text-xl font-bold mb-2" style="color:#1D292C;">
                                <?php echo $current_lang === 'en' ? $bt['label_en'] : $bt['label_vi']; ?>
                            </h3>

                            <!-- Description -->
                            <p class="mb-4" style="color:#1D292C; line-height:1.7; font-size:15px;">
                                <?php echo $current_lang === 'en' ? $bt['desc_en'] : $bt['desc_vi']; ?>
                            </p>

                            <!-- Seat rows indicator -->
                            <div class="flex items-center gap-2 mb-2">
                                <!-- Seat icons: render $bt['seats'] pairs per floor, 2 floors -->
                                <div style="display:flex; flex-direction:column; gap:2px;">
                                    <?php for ($floor = 0; $floor < 2; $floor++): ?>
                                    <div style="display:flex; gap:3px; <?php echo $floor === 0 ? 'border-bottom:1px solid #555;' : ''; ?>">
                                        <?php for ($s = 0; $s < $bt['seats']; $s++): ?>
                                        <svg viewBox="0 0 20 24" width="14" height="18" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="1" width="12" height="14" rx="4" fill="#3D4F52"/>
                                            <rect x="1" y="18" width="12" height="3" rx="1.5" fill="#3D4F52"/>
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-xs" style="color:#1D292C;">
                                    <?php echo $current_lang === 'en' ? $bt['rows_en'] : $bt['rows_vi']; ?>
                                </span>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center gap-2">
                                <!-- Dollar bubble icon -->
                                <svg viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#3D4F52" d="M12 2C6.48 2 2 6.03 2 11c0 2.7 1.2 5.1 3.1 6.8L4 22l4.4-1.4C9.5 21.5 10.7 22 12 22c5.52 0 10-4.03 10-9S17.52 2 12 2z"/>
                                    <text x="12" y="15" text-anchor="middle" font-size="9" font-weight="bold" fill="#000" font-family="sans-serif">$</text>
                                </svg>
                                <span class="text-xs" style="color:#1D292C;">
                                    <?php echo $current_lang === 'en' ? $bt['price_en'] : $bt['price_vi']; ?>
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- See article link -->
                    <p class="text-center mb-10">
                        <a href="#" class="font-semibold underline" style="color:#7B63F7; font-size:15px;">
                            <?php echo $t['ha_giang']['transport_guide_link']; ?>
                        </a>
                    </p>

                    <!-- How to book box -->
                    <div class="rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6" style="background:#F9FBDF; border:1px solid #e5e7eb;">
                        <div class="flex-1">
                            <h4 class="font-bold mb-2" style="color:#7B63F7; font-size:1.1rem;">
                                <?php echo $t['ha_giang']['transport_book_title']; ?>
                            </h4>
                            <p style="color:#1D292C; line-height:1.7; font-size:15px;">
                                <?php echo $t['ha_giang']['transport_book_desc']; ?>
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-3 flex-shrink-0">
                            <!-- Vexere.com blob button -->
                            <a href="https://vexere.com" target="_blank" rel="noopener" style="position:relative; display:inline-flex; align-items:center; justify-content:center; width:120px; height:48px; text-decoration:none;">
                                <svg viewBox="0 0 120 48" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0;width:100%;height:100%;">
                                    <path fill="#E7F15A" d="M60,4 C76,4 96,8 106,18 C116,28 116,36 108,42 C100,48 80,48 60,48 C40,48 20,48 12,42 C4,36 4,28 14,18 C24,8 44,4 60,4 Z"/>
                                </svg>
                                <span style="position:relative; z-index:1; font-size:12px; font-weight:700; color:#1D292C;">Vexere.com</span>
                            </a>
                            <!-- teehee blob button -->
                            <span style="position:relative; display:inline-flex; align-items:center; justify-content:center; width:100px; height:48px;">
                                <svg viewBox="0 0 100 48" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0;width:100%;height:100%;">
                                    <path fill="#E7F15A" d="M50,4 C64,4 82,8 90,18 C98,28 96,36 88,42 C80,48 64,48 50,48 C36,48 20,48 12,42 C4,36 4,28 10,18 C18,8 36,4 50,4 Z"/>
                                </svg>
                                <span style="position:relative; z-index:1; font-size:12px; font-weight:700; color:#1D292C;">teehee</span>
                            </span>
                            <!-- Not an ads blob -->
                            <span style="position:relative; display:inline-flex; align-items:center; justify-content:center; width:110px; height:48px;">
                                <svg viewBox="0 0 110 48" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0;width:100%;height:100%;">
                                    <path fill="#E7F15A" d="M55,4 C70,4 90,8 100,18 C110,28 108,36 100,42 C92,48 72,48 55,48 C38,48 18,48 10,42 C2,36 2,28 10,18 C20,8 40,4 55,4 Z"/>
                                </svg>
                                <span style="position:relative; z-index:1; font-size:11px; font-weight:700; color:#1D292C;">Not an ads</span>
                            </span>
                        </div>
                    </div>

                </div><!-- /trans-content-bus -->

                <!-- Bike & Bicycle tabs hidden (no content yet) -->
                <div id="trans-content-bike" style="display:none;"></div>
                <div id="trans-content-bicycle" style="display:none;"></div>

            </div>
        </section>
    </div>

    <!-- Weather -->
    <section class="py-16" style="background:#F9FBDF;" id="weather">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <h3 class="font-phudu text-center mb-2" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px; text-transform:uppercase;">
                <?php echo $t['ha_giang']['weather_title']; ?>
            </h3>

            <!-- Live weather strip -->
            <div
                id="weather-data-root"
                data-icon-root="<?php echo esc_url($icon_root_path); ?>"
                class="flex flex-wrap justify-center gap-8 py-6 mb-6 border-b border-[#8A8E8F]">
                <?php foreach ($locations as $id => $location): ?>
                <div class="text-center" data-city="<?php echo esc_attr($location['api_query']); ?>" id="weather-card-<?php echo esc_attr($id); ?>">
                    <p style="font-size:15px; font-weight:600;" class="mb-2"><?php echo esc_html($location['display']); ?></p>
                    <div class="flex items-center justify-center gap-3">
                        <img id="icon-<?php echo esc_attr($id); ?>" width="40" height="40" src="<?php echo esc_url($icon_root_path); ?>loading.svg" alt="Loading..." />
                        <p id="temp-<?php echo esc_attr($id); ?>" class="text-4xl font-bold">--°C</p>
                    </div>
                    <span class="text-xs text-gray-500 mt-1 block" id="condition-<?php echo esc_attr($id); ?>">...</span>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Season cards — horizontal scroll with right arrow button -->
            <?php
            $seasons = [
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-1.png',
                    'title_en' => $t['ha_giang']['weather_season_0_title'],
'title_vi' => $t['ha_giang']['weather_season_0_title'],
                    'desc_en' => $t['ha_giang']['weather_season_0_desc'],
'desc_vi' => $t['ha_giang']['weather_season_0_desc'],
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-2.png',
                    'title_en' => $t['ha_giang']['weather_season_1_title'],
'title_vi' => $t['ha_giang']['weather_season_1_title'],
                    'desc_en' => $t['ha_giang']['weather_season_1_desc'],
'desc_vi' => $t['ha_giang']['weather_season_1_desc'],
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-3.png',
                    'title_en' => $t['ha_giang']['weather_season_2_title'],
'title_vi' => $t['ha_giang']['weather_season_2_title'],
                    'desc_en' => $t['ha_giang']['weather_season_2_desc'],
'desc_vi' => $t['ha_giang']['weather_season_2_desc'],
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-4.png',
                    'title_en' => $t['ha_giang']['weather_season_3_title'],
'title_vi' => $t['ha_giang']['weather_season_3_title'],
                    'desc_en' => $t['ha_giang']['weather_season_3_desc'],
'desc_vi' => $t['ha_giang']['weather_season_3_desc'],
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-1.png',
                    'title_en' => $t['ha_giang']['weather_season_4_title'],
'title_vi' => $t['ha_giang']['weather_season_4_title'],
                    'desc_en' => $t['ha_giang']['weather_season_4_desc'],
'desc_vi' => $t['ha_giang']['weather_season_4_desc'],
                ],
            ];
            ?>

            <div class="relative">
                <!-- Left scroll button -->
                <button
                    onclick="document.getElementById('season-scroll').scrollBy({left:-300,behavior:'smooth'})"
                    style="position:absolute; left:0; top:50%; transform:translateY(-50%); z-index:10; width:52px; height:36px; background:#fff; border:2px solid #1D292C; border-radius:999px; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 2px 8px rgba(0,0,0,.12);"
                    aria-label="Scroll left"
                >
                    <svg width="18" height="18" fill="none" stroke="#1D292C" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>

                <!-- Right scroll button -->
                <button
                    onclick="document.getElementById('season-scroll').scrollBy({left:300,behavior:'smooth'})"
                    style="position:absolute; right:0; top:50%; transform:translateY(-50%); z-index:10; width:52px; height:36px; background:#fff; border:2px solid #1D292C; border-radius:999px; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 2px 8px rgba(0,0,0,.12);"
                    aria-label="Scroll right"
                >
                    <svg width="18" height="18" fill="none" stroke="#1D292C" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 18l6-6-6-6"/>
                    </svg>
                </button>

                <!-- Scrollable row -->
                <div id="season-scroll" style="display:flex; gap:12px; overflow-x:auto; scroll-snap-type:x mandatory; padding-bottom:8px; padding-left:60px; padding-right:60px; scrollbar-width:none; -ms-overflow-style:none; cursor:grab;">
                    <style>#season-scroll::-webkit-scrollbar{display:none} #season-scroll.dragging{cursor:grabbing; scroll-snap-type:none;}</style>
                    <?php foreach ($seasons as $s): ?>
                    <div style="flex:0 0 calc((100% - 3 * 12px) / 3.5); scroll-snap-align:start; border-radius:8px; overflow:hidden; display:flex; flex-direction:column;">
                        <!-- Image -->
                        <div style="width:100%; aspect-ratio:3/4; position:relative; overflow:hidden; flex-shrink:0;">
                            <img
                                src="<?php echo esc_url($s['img']); ?>"
                                alt="<?php echo esc_attr($current_lang === 'en' ? $s['title_en'] : $s['title_vi']); ?>"
                                style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; display:block;"
                            />
                        </div>
                        <!-- Caption — flush to image, no gap -->
                        <div style="padding:14px 16px; background:#F9FBDF; flex:1;">
                            <p style="font-size:19px; font-weight:700; color:#7B63F7; margin:0 0 8px; line-height:1.3;">
                                <?php echo $current_lang === 'en' ? $s['title_en'] : $s['title_vi']; ?>
                            </p>
                            <p style="font-size:15px; color:#1D292C; line-height:1.6; margin:0;">
                                <?php echo $current_lang === 'en' ? $s['desc_en'] : $s['desc_vi']; ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- ── S3: "What's here" highlights ── -->
    <section id="highlights" class="py-16" style="background:#fff;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <p style="font-family:'Inter',sans-serif; font-size:12px; font-weight:400; color:#1D292C; text-transform:uppercase; line-height:20px;" class="mb-2">
                <?php echo $t['ha_giang']['highlight_title']; ?>
            </p>
            <h3 class="font-phudu mb-2" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;">
                <?php echo $t['ha_giang']['highlight_subtitle']; ?>
            </h3>
            <p style="font-size:15px; color:#474E50;" class="mb-8 max-w-xl">
                <?php echo $t['ha_giang']['highlight_desc']; ?>
            </p>

            <!-- Category filter tabs -->
            <div id="highlight-tabs" style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:24px;">
                <?php
                $hl_tabs = [
                    'all'        => $current_lang === 'en' ? 'All'           : 'Tất cả',
                    'viewpoints' => $current_lang === 'en' ? 'View points'   : 'Điểm quan sát',
                    'food'       => $current_lang === 'en' ? 'Food'           : 'Ẩm thực',
                    'nature'     => $current_lang === 'en' ? 'Nature to go'  : 'Thiên nhiên',
                ];
                foreach ($hl_tabs as $key => $label):
                    $is_active = ($key === 'all');
                ?>
                <button
                    class="hl-tab"
                    data-cat="<?php echo $key; ?>"
                    style="<?php echo $is_active
                        ? 'background:#7B63F7; color:#fff; border:1.5px solid #7B63F7;'
                        : 'background:transparent; color:#1D292C; border:1.5px solid #A1A4A3;'; ?>
                        padding:6px 18px; border-radius:999px; font-size:13px; font-weight:600;
                        cursor:pointer; transition:all .15s; font-family:Inter,sans-serif;"
                ><?php echo $label; ?></button>
                <?php endforeach; ?>
            </div>

            <!-- 3-column grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="highlight-grid">
                <?php foreach ($highlights as $i => $h): ?>
                <div
                    class="highlight-card group cursor-pointer rounded-xl overflow-hidden relative"
                    data-index="<?php echo $i; ?>"
                    data-category="<?php echo esc_attr($h['category']); ?>"
                    onclick="openHighlight(<?php echo $i; ?>)"
                    role="button"
                    tabindex="0"
                    aria-label="<?php echo esc_attr($current_lang === 'en' ? $h['title_en'] : $h['title_vi']); ?>"
                >
                    <div class="relative overflow-hidden" style="aspect-ratio:4/3;">
                        <img
                            src="<?php echo esc_url($theme_uri . $h['img']); ?>"
                            alt="<?php echo esc_attr($current_lang === 'en' ? $h['title_en'] : $h['title_vi']); ?>"
                            style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s ease;"
                            class="group-hover:scale-105"
                        />
                        <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(29,41,44,.75) 0%, transparent 55%); pointer-events:none;"></div>
                        <div style="position:absolute; top:10px; left:10px; background:#E7F15A; border-radius:999px; padding:3px 10px;">
                            <span style="font-size:11px; font-weight:700; color:#1D292C;">
                                <?php echo esc_html($current_lang === 'en' ? $h['tag_en'] : $h['tag_vi']); ?>
                            </span>
                        </div>
                        <div style="position:absolute; bottom:12px; left:12px; right:12px;">
                            <p style="font-size:15px; font-weight:700; color:#F2F2F0; line-height:1.3; margin:0;">
                                <?php echo esc_html($current_lang === 'en' ? $h['title_en'] : $h['title_vi']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    <?php
    $highlight_modal_highlights = $highlights;
    $highlight_modal_prev_label = $t["ha_giang"]["carousel_prev"];
    $highlight_modal_next_label = $t["ha_giang"]["carousel_next"];
    $highlight_modal_preview_label = $current_lang === "en" ? "Preview image" : "Xem ảnh";
    include get_template_directory() . "/components/highlight-modal.php";
    ?>

    <!-- Culture -->
    <section class="pt-16" id="activities" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
            <h3 class="font-phudu mb-8" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;">
                <?php echo $t['ha_giang']['culture_title'] ?>
            </h3>

            <p class="mb-4" style="font-size:15px; color:#474E50; line-height:1.7;">
                <?php echo $t['ha_giang']['culture_desc'] ?>
            </p>


            <h3 class="mb-2" style="font-family:'Inter',sans-serif; font-size:15px; font-weight:600; color:#1D292C; line-height:24px;">
                <?php echo $t['ha_giang']['culture_happywater_title'] ?>
            </h3>
            <p class="mb-4" style="font-size:15px; color:#474E50; line-height:1.7;">
                <?php echo $t['ha_giang']['culture_happywater_desc'] ?>
            </p>

            <h3 class="mb-2" style="font-family:'Inter',sans-serif; font-size:15px; font-weight:600; color:#1D292C; line-height:24px;">
                <?php echo $t['ha_giang']['culture_market_title'] ?>
            </h3>
            <p class="mb-4" style="font-size:15px; color:#474E50; line-height:1.7;">
                <?php echo $t['ha_giang']['culture_market_desc'] ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-1.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-1.png'); ?>"
                    alt="Cultural Aspect 1"
                    class="w-full h-full object-cover cursor-pointer rounded-2xl" />

                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-2.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-2.png'); ?>"
                    alt="Cultural Aspect 2"
                    class="w-full h-full object-cover cursor-pointer rounded-2xl" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-3.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-3.png'); ?>"
                    alt="Cultural Aspect 3"
                    class="w-full h-full object-cover cursor-pointer rounded-2xl" />
                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-4.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-4.png'); ?>"
                    alt="Cultural Aspect 3"
                    class="w-full h-full object-cover cursor-pointer rounded-2xl" />
                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-5.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/immerse-5.png'); ?>"
                    alt="Cultural Aspect 3"
                    class="w-full h-full object-cover cursor-pointer rounded-2xl" />
            </div>

        </div>
    </section>


    <!-- How to book us -->
    <!-- May be you will interest in -->
    <section id="how-to-book" style="background:#E7F15A;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <p style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;" class="mb-3">
                <?php echo $t['ha_giang']['related_title']; ?>
            </p>
            <p style="font-size:15px; color:#474E50;" class="mb-10">
                <?php echo $t['ha_giang']['related_desc']; ?>
            </p>

            <?php hihi_related_destinations('cao-bang'); ?>
        </div>
    </section>

    <!-- faqs -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16" id="faqs">
        <h2 style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;" class="mb-10">
            <?php echo $t['global']['toc_faqs'] ?? ($t['ha_giang']['faq_title']); ?>
        </h2>

        <?php foreach ($faqs_data as $index => $faq): ?>
            <?php
            $group = $faq['group'] ?? 'global';
            $question_text = $t[$group][$faq['q']] ?? 'Question key not found';
            $answer_text = $t[$group][$faq['a']] ?? 'Answer key not found';
            ?>
            <div class="border-b border-gray-200">
                <button
                    class="flex justify-between items-center w-full py-4 text-left hover:text-[#8CA865] focus:outline-none"
                    style="font-family:'Inter',sans-serif; font-size:15px; font-weight:600; color:#1D292C; line-height:24px;"
                    onclick="document.getElementById('faq-answer-<?php echo $index; ?>').classList.toggle('hidden');">

                    <?php echo htmlspecialchars($question_text); ?>

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
                <div id="faq-answer-<?php echo $index; ?>" class="hidden pb-4" style="font-size:15px; line-height:24px; color:#474E50;">
                    <div><?php echo $answer_text; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script>
function transTab(tab) {
    ['bus','bike','bicycle'].forEach(function(t) {
        var content = document.getElementById('trans-content-' + t);
        if (content) content.style.display = (t === tab) ? '' : 'none';
    });
}

// Mouse drag to scroll season cards
(function() {
    var el = document.getElementById('season-scroll');
    if (!el) return;
    var isDown = false, startX, scrollLeft;
    el.addEventListener('mousedown', function(e) {
        isDown = true;
        el.classList.add('dragging');
        startX = e.pageX - el.offsetLeft;
        scrollLeft = el.scrollLeft;
    });
    el.addEventListener('mouseleave', function() { isDown = false; el.classList.remove('dragging'); });
    el.addEventListener('mouseup',    function() { isDown = false; el.classList.remove('dragging'); });
    el.addEventListener('mousemove',  function(e) {
        if (!isDown) return;
        e.preventDefault();
        var x = e.pageX - el.offsetLeft;
        el.scrollLeft = scrollLeft - (x - startX) * 1.2;
    });
})();

// Solo going / Book a tour tab switcher
(function() {
    var tabs = document.querySelectorAll('.itinerary-mode-tab');
    var soloDesc = document.getElementById('itinerary-solo-desc');
    var bookDesc = document.getElementById('itinerary-book-desc');
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            tabs.forEach(function(t) {
                t.classList.remove('border-[#7B63F7]', 'text-[#1D292C]');
                t.classList.add('border-transparent', 'text-gray-400');
            });
            this.classList.remove('border-transparent', 'text-gray-400');
            this.classList.add('border-[#7B63F7]', 'text-[#1D292C]');
            var mode = this.getAttribute('data-mode');
            if (soloDesc) soloDesc.classList.toggle('hidden', mode !== 'solo');
            if (bookDesc) bookDesc.classList.toggle('hidden', mode !== 'book');
        });
    });
})();

// ── Highlight category filter ──
(function() {
    var tabs  = document.querySelectorAll('.hl-tab');
    var cards = document.querySelectorAll('#highlight-grid .highlight-card');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var cat = tab.getAttribute('data-cat');

            // Update tab styles
            tabs.forEach(function(t) {
                var active = t === tab;
                t.style.background    = active ? '#7B63F7' : 'transparent';
                t.style.color         = active ? '#fff'    : '#1D292C';
                t.style.borderColor   = active ? '#7B63F7' : '#A1A4A3';
            });

            // Show / hide cards
            cards.forEach(function(card) {
                var match = (cat === 'all') || (card.getAttribute('data-category') === cat);
                card.style.transition  = 'opacity .2s, transform .2s';
                card.style.opacity     = match ? '1' : '0.15';
                card.style.pointerEvents = match ? '' : 'none';
                card.style.transform   = match ? '' : 'scale(.97)';
            });
        });
    });
})();

// ── Download dropdown: close on outside click ──
document.addEventListener('click', function(e) {
    var wrap = document.getElementById('itinerary-download-wrap');
    var menu = document.getElementById('itinerary-download-menu');
    if (wrap && menu && !wrap.contains(e.target)) {
        menu.classList.add('hidden');
    }
});

// ── Disable image download sitewide ──
(function() {
    // Block right-click on all images
    document.addEventListener('contextmenu', function(e) {
        if (e.target.tagName === 'IMG') e.preventDefault();
    });
    // Block drag on all images
    document.addEventListener('dragstart', function(e) {
        if (e.target.tagName === 'IMG') e.preventDefault();
    });
})();
</script>

<?php get_footer(); ?>
