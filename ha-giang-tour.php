<?php
/*
Template Name: Ha Giang Tour
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php
$current_lang = pll_current_language('slug');
$t = load_lang();

$theme_uri = get_template_directory_uri();

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

// itinerary
$plan_options = [
    '4' => $current_lang === 'en' ? '4 days 3 nights' : "4 ngày 3 đêm",
    '3' => $current_lang === 'en' ? '3 days 2 nights' : "3 ngày 2 đêm",
    '2' => $current_lang === 'en' ? '2 days 1 night' : "2 ngày 1 đêm",
];
$default_plan = '4';
$default_days_count = intval($default_plan);
$default_days = range(0, $default_days_count);

$locations = [
    'hagiang' => ['display' => $current_lang === 'en' ? 'Ha Giang city' : 'TP.Hà Giang', 'api_query' => 'latitude=22.8407&longitude=104.9881&current=temperature_2m,relative_humidity_2m'],
    'dongvan' => ['display' => $current_lang === 'en' ? 'Dong Van' : 'Đồng Văn', 'api_query' => 'latitude=23.2779&longitude=105.358&current=temperature_2m,relative_humidity_2m'],
    'meovac'  => ['display' => $current_lang === 'en' ? 'Meo Vac (near Nho Que river)' : 'Mèo Vạc (gần sông Nho Quế)', 'api_query' => 'latitude=23.1618&longitude=105.4056&current=temperature_2m,relative_humidity_2m'],
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
    ['q' => 'ha_giang_faq_q_age', 'a' => 'ha_giang_faq_a_age'],
    ['q' => 'ha_giang_faq_q_challenge', 'a' => 'ha_giang_faq_a_challenge'],
    ['q' => 'ha_giang_faq_q_driving', 'a' => 'ha_giang_faq_a_driving'],
    ['q' => 'ha_giang_faq_q_packing', 'a' => 'ha_giang_faq_a_packing'],
    ['q' => 'ha_giang_faq_q_party', 'a' => 'ha_giang_faq_a_party'],
    ['q' => 'faq_q_cancel', 'a' => 'faq_a_cancel'],
    ['q' => 'faq_q_tip', 'a' => 'faq_a_tip'],
];

$tableOfContents = [
    [
        'id' => 'overview',
        'title' => $t['toc_overview'] ?? 'Tổng quan',
    ],
    [
        'id' => 'itinerary',
        'title' => $t['toc_itinerary'] ?? 'Lịch trình',
    ],
    [
        'id' => 'gallery',
        'title' => $t['toc_gallery'] ?? 'Thư viện ảnh',
    ],
    [
        'id' => 'transportation',
        'title' => $t['toc_transportation'] ?? 'Phương tiện đi lại',
    ],
    [
        'id' => 'accomodations',
        'title' => $t['toc_accomodations'] ?? 'Chỗ ở',
    ],
    [
        'id' => 'weather',
        'title' => $t['toc_weather'] ?? 'Thời tiết',
    ],
    [
        'id' => 'activities',
        'title' => $t['toc_activities'] ?? 'Các hoạt động',
    ],
    [
        'id' => 'how-to-book',
        'title' => $t['toc_how_to_book'] ?? 'Cách đặt tour',
    ],
    [
        'id' => 'faqs',
        'title' => $t['toc_faqs'] ?? 'FAQs',
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
                    $classes .= ' bg-[#F9FBDF] font-semibold border-l-1 border-l-[#7B63F7]';
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

    <!-- ── OVERVIEW: full-width hero image ── -->
    <section id="overview" style="position:relative;">

        <!-- Full-width banner image -->
        <div style="width:100%; height:clamp(260px, 45vw, 560px); overflow:hidden; position:relative;">
            <img
                src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/banner.png'); ?>"
                alt="Ha Giang"
                style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" />
        </div>
    </section>


    <!-- ── "Explore Ha Giang" text block — hidden per design ── -->
    <section class="hidden">
        <div class="container mx-auto max-w-3xl">
            <?php if ($current_lang === 'vi') : ?>
                <h3 class="text-2xl mb-2 font-phudu font-bold uppercase">Khám phá</h3>
                <h2 class="text-4xl md:text-5xl font-bold font-delta-gothic text-[#7B63F7] mb-6">Hà Giang</h2>
                <p class="mb-3 text-[#1D292C] leading-relaxed">
                    Từ 2017, Hi Hi đã tâm huyết tạo nên những hành trình chất lượng, tiêu biểu là cung đường Hà Giang Loop nổi tiếng.
                </p>
                <p class="text-[#1D292C] leading-relaxed">
                    Tại Hi Hi Tour, chúng tôi chọn lối đi riêng, khám phá những con đường lạ xa rời dấu chân du lịch thông thường. Chúng tôi đưa bạn đắm mình vào bức tranh văn hóa bản địa đầy màu sắc với cam kết về một hành trình du lịch trách nhiệm.
                </p>
            <?php else : ?>
                <h3 class="text-2xl mb-2 font-phudu font-bold uppercase">Explore the amazing</h3>
                <h2 class="text-4xl md:text-5xl font-bold font-delta-gothic text-[#7B63F7] mb-6">Ha Giang</h2>
                <p class="mb-3 text-[#1D292C] leading-relaxed">
                    Since 2017, Hi Hi Tour has been dedicated to curating quality journeys, including the famous Ha Giang Loop. We connect you with the heart of Ha Giang through authentic encounters: sharing smiles with children, savoring traditional cuisine, and listening to ancient stories.
                </p>
                <p class="text-[#1D292C] leading-relaxed">
                    At Hi Hi Tour, we forge our own path, exploring uncharted roads far from typical tourist trails, immersing you in a genuine cultural tapestry with a commitment to responsible travel.
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Itinerary -->
    <section class="pt-10 pb-16" id="itinerary" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section label -->
            <p class="text-xs font-bold tracking-widest uppercase text-[#1D292C] mb-4"><?php echo $current_lang === 'en' ? 'Typical Ha Giang Itinerary' : 'Lịch trình Hà Giang điển hình'; ?></p>

            <!-- Solo going / Book a tour tabs -->
            <div class="flex border-b border-gray-200 mb-6" id="itinerary-mode-tabs">
                <button
                    id="tab-solo"
                    class="itinerary-mode-tab pb-3 px-1 mr-8 text-sm font-semibold border-b-2 border-[#7B63F7] text-[#1D292C] transition-colors duration-150"
                    data-mode="solo">
                    <?php echo $current_lang === 'en' ? 'Solo going' : 'Tự đi'; ?>
                </button>
                <button
                    id="tab-book"
                    class="itinerary-mode-tab pb-3 px-1 mr-8 text-sm font-semibold border-b-2 border-transparent text-gray-400 hover:text-[#1D292C] transition-colors duration-150"
                    data-mode="book">
                    <?php echo $current_lang === 'en' ? 'Book a tour' : 'Đặt tour'; ?>
                </button>
            </div>

            <!-- Solo going description -->
            <p id="itinerary-solo-desc" class="text-sm text-[#474E50] mb-6 max-w-2xl leading-relaxed">
                <?php echo $current_lang === 'en'
                    ? 'Stick to big, visible road in Google Maps if you go alone - no guides or whatsoever. Locals are generally friendly but they don\'t usually know English, even basic English, even Vietnamese, especially elderly because Ha Giang is ---- of H\'Mong ethnic and some other ----. So don\'t wander too much if you don\'t know the road, it\'s dangerous. I still recommend hire a guide, they know best routes and manage time to explore.'
                    : 'Nếu tự đi, hãy đi theo các con đường lớn, dễ tìm trên Google Maps. Người địa phương thân thiện nhưng thường không nói được tiếng Anh hay tiếng Kinh, đặc biệt là người lớn tuổi. Đừng đi lạc nếu bạn không biết đường - khá nguy hiểm. Tôi vẫn khuyên nên thuê hướng dẫn viên.'; ?>
            </p>

            <!-- Book a tour description (hidden by default) -->
            <p id="itinerary-book-desc" class="hidden text-sm text-[#474E50] mb-6 max-w-2xl leading-relaxed">
                <?php echo $current_lang === 'en'
                    ? 'Book a guided Ha Giang loop tour with Hi Hi Tour. We handle all logistics - transport, accommodation, meals and easy drivers - so you can focus on the experience.'
                    : 'Đặt tour Hà Giang Loop cùng Hi Hi Tour. Chúng tôi lo toàn bộ phương tiện, chỗ ở, ăn uống và người lái - để bạn chỉ cần tận hưởng.'; ?>
            </p>

            <p class="text-sm font-semibold text-[#1D292C] mb-3">
                <?php echo $current_lang === 'en' ? "How many days do you want to do the loop?" : "Bạn muốn đi bao nhiêu ngày?" ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 mb-8">
                    <div id="itinerary-plans" class="flex flex-wrap gap-2 mb-6">
                        <?php foreach ($plan_options as $value => $text) : ?>
                            <?php
                            $is_active = ($value == $default_plan);
                            $active_class = $is_active
                                ? 'bg-[#7B63F7] text-white rounded-full'
                                : 'bg-white text-[#1D292C] border border-gray-300 hover:bg-gray-50 rounded-full';
                            ?>
                            <a
                                data-plan-value="<?php echo esc_attr($value); ?>"
                                class="plan-pill inline-block cursor-pointer py-2 px-4 rounded-lg text-sm font-medium transition duration-200 <?php echo $active_class; ?>">
                                <?php echo esc_html($text); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <?php
                    $default_days = range(0, $default_days_count);
                    ?>
                    <ul id="itinerary-tabs" class="flex flex-wrap text-sm font-medium text-center text-body border border-[#A1A4A3] rounded-tl-lg rounded-tr-lg border-default">
                        <?php foreach ($default_days as $index) : ?>
                            <?php
                            $border_top_left = ($index === 0) ? 'rounded-tl-lg' : '';
                            $border_top_right = ($index === count($default_days) - 1) ? 'rounded-tr-lg' : '';
                            $is_active = ($index === 0) ? 'border-b border-[#101F23]' : '';
                            ?>
                            <li class="w-full bg-[#E7F15A] flex-1 <?php echo $border_top_left;
                                                                    echo $border_top_right ?>">
                                <a
                                    data--index="<?php echo $index; ?>"
                                    class="inline-block cursor-pointer p-4 text-fg-brand bg-neutral-secondary-soft rounded-t-base w-full tab-link <?php echo $is_active; ?>"
                                    style="border-bottom: <?php echo $is_active ? '1px solid #101F23' : ''; ?>">
                                    <?php echo $current_lang === 'en' ? "Day" : "Ngày" ?> <?php echo $index; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div id="timeline-content" class="relative py-8 pl-6 border border-[#A1A4A3] border-t-0 rounded-bl-lg rounded-br-lg min-h-2/3">
                        <div class="relative">
                            <div class="absolute top-0 left-24 w-0.5 bg-[#F2F2F0] h-full z-0"></div>
                            <ol id="timeline-list" class="relative ml-0 pr-3 list-none">
                            </ol>
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6 mb-6">
                        <img src="<?php echo esc_url($icons['itinerary']); ?>" alt="itinerary" />
                        <div class="flex flex-col">
                            <span class="font-bold">
                                <?php echo $current_lang === 'en' ? 'Our itinerary can be flexible!' : 'Lịch trình không cố định!' ?>
                            </span>
                            <span class="text-[#74797A] text-sm">
                                <?php echo $current_lang === 'en' ? 'If you have ever been to Ha Giang before, we will go different routes every time you return. Also you can always discuss for special request!' : 'Nếu bạn đã từng tới Hà Giang, chúng tôi sẽ tư vấn các lịch trình khác nhau mỗi lần bạn quay lại. Bên cạnh đó, bạn cũng có thể trao đổi với chúng tôi về bất cứ yêu cầu đặc biệt nào.' ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <div class="p-6 rounded-xl" style="background:#7B63F7; color:#fff;">
                        <h2 class="text-2xl font-bold mb-4" style="color:#E7F15A;"><span id="price-per-plan"></span></h2>
                        <p class="mb-4 opacity-80"><?php echo $current_lang === 'en' ? "Per adult" : "một người lớn" ?></p>
                        <?php
                        $check_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                        $close_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                        ?>

                        <p class="text-base font-bold mb-2">
                            <?php echo $current_lang === 'en' ? 'Our price includes' : 'Giá bao gồm' ?>
                        </p>
                        <ul class="space-y-2 text-sm mb-6">
                            <li class="flex items-start">
                                <?php echo $check_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Round-trip sleeper bus ticket: Ha Noi - Ha Giang' : 'Vé xe khứ hồi Hà Nội - Hà Giang' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $check_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Accommodation for the duration of your stay' : 'Homestay xuyên suốt lịch trình' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $check_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Three standard meals per day' : 'Các bữa ăn chính trong ngày: sáng - trưa - tối' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $check_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Motorbike rental' : 'Thuê xe máy' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $check_icon; ?>
                                <?php echo $current_lang === 'en' ? 'Easy drivers' : 'Thuê người lái' ?>
                            </li>
                            <li class="flex items-start">
                                <?php echo $check_icon; ?>
                                <?php echo $current_lang === 'en' ? 'All entrance fees included' : 'Tất cả vé vào cửa' ?>
                            </li>
                        </ul>

                        <p class="text-base font-bold mb-2">
                            <?php echo $current_lang === 'en' ? 'What not includes' : 'Giá chưa bao gồm' ?>
                        </p>
                        <ul class="space-y-2 text-sm mb-6">
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

                    <div class="flex gap-3 mt-6 mb-3">
                        <img src="<?php echo esc_url($icons['human']); ?>" alt="human" />
                        <div class="flex flex-col">
                            <span>
                                <?php echo $current_lang === 'en' ? 'Age: 8 - 75' : 'Độ tuổi: 8 - 75' ?>
                            </span>
                            <span class="text-[#74797A] text-sm">
                                <?php echo $current_lang === 'en' ? 'Feel free to consult with us first about any health concerns!' : 'Đừng ngần ngại liên hệ chúng tôi nếu có do dự về sức khỏe!' ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-3">
                        <img src="<?php echo esc_url($icons['group']); ?>" alt="group" />
                        <div class="flex flex-col">
                            <span>
                                <?php echo $current_lang === 'en' ? 'Private tour / Group with others' : 'Tour riêng / Tour ghép' ?>
                            </span>
                            <span class="text-[#74797A] text-sm">
                                <?php echo $current_lang === 'en' ? 'Private by default. We only group you with others upon request.' : 'Mặc định tour riêng. Chỉ ghép tour khi có yêu cầu.' ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-3">
                        <img src="<?php echo esc_url($icons['schedule']); ?>" alt="schedule" />
                        <div class="flex flex-col">
                            <span>
                                <?php echo $current_lang === 'en' ? 'Start time: Check availability' : 'Ngày bắt đầu: Mọi ngày trong tuần' ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-3">
                        <img src="<?php echo esc_url($icons['globe']); ?>" alt="globe" />
                        <div class="flex flex-col">
                            <span>
                                <?php echo $current_lang === 'en' ? 'Language: Vietnamese, Basic English' : 'Ngôn ngữ: Tiếng Việt, Tiếng Anh cơ bản' ?>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="py-16 bg-white" id="gallery" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Pill header badge -->
            <div class="flex justify-center mb-8">
                <div style="background:#E7F15A; border-radius:999px; padding:14px 36px; text-align:center; display:inline-block;">
                    <div class="flex items-center justify-center gap-3 mb-1">
                        <!-- left diamond -->
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="#7B63F7">
                            <path d="M7 0l1.8 5.2H14L9.6 8.4l1.8 5.2L7 10.4l-4.4 3.2 1.8-5.2L0 5.2h5.2z" />
                        </svg>
                        <span style="font-size:30px; font-weight:800; letter-spacing:.04em; text-transform:uppercase; color:#1D292C;">
                            <?php echo $current_lang === 'en' ? 'Ha Giang Gallery' : 'Ảnh Hà Giang'; ?>
                        </span>
                        <!-- right diamond -->
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="#7B63F7">
                            <path d="M7 0l1.8 5.2H14L9.6 8.4l1.8 5.2L7 10.4l-4.4 3.2 1.8-5.2L0 5.2h5.2z" />
                        </svg>
                    </div>
                    <p style="font-size:12px; color:#1D292C; margin:0;">
                        <?php echo $current_lang === 'en' ? 'Photos I took. View and praise.' : 'Ảnh tôi chụp. Xem và khen đi.'; ?>
                    </p>
                </div>
            </div>

            <?php
            $total_images   = count($images);
            $visible_count  = 5;
            $remaining_count = $total_images - $visible_count;
            ?>

            <!-- 3-col grid: col 1 spans 2 rows, cols 2-3 have 2 rows each -->
            <div style="display:grid; grid-template-columns:repeat(3,1fr); grid-template-rows:auto auto; gap:4px;">

                <?php foreach ($images as $index => $src):
                    if ($index >= $visible_count) break;
                    $image_url = esc_url($theme_uri . $src);
                    $is_last   = ($index === $visible_count - 1);
                ?>

                    <?php if ($index === 0): ?>
                        <!-- Large left image — spans 2 rows -->
                        <div class="group cursor-pointer" style="grid-column:1; grid-row:1/3; overflow:hidden; position:relative;">
                            <img src="<?php echo $image_url; ?>"
                                alt="Ha Giang <?php echo $index + 1; ?>"
                                style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s;"
                                class="group-hover:scale-105" />
                        </div>

                    <?php else: ?>
                        <!-- Smaller image -->
                        <div class="group cursor-pointer" style="overflow:hidden; position:relative; aspect-ratio:4/3;">
                            <img src="<?php echo $image_url; ?>"
                                alt="Ha Giang <?php echo $index + 1; ?>"
                                style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s;"
                                class="group-hover:scale-105" />

                            <?php if ($is_last && $remaining_count > 0): ?>
                                <!-- +N overlay -->
                                <div style="position:absolute; inset:0; background:rgba(0,0,0,0.45); display:flex; align-items:center; justify-content:center;">
                                    <span style="color:#fff; font-size:clamp(1.5rem,4vw,2.5rem); font-weight:800;">+<?php echo $remaining_count; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- Transportation -->
    <div class="pt-16" id="transportation">
        <section class="mb-8 md:mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Section heading -->
                <h2 class="text-center font-black tracking-widest uppercase text-sm mb-8" style="color:#1D292C; letter-spacing:.2em;">
                    <?php echo $current_lang === 'en' ? 'TRANSPORTATION HEY HEY' : 'PHƯƠNG TIỆN DI CHUYỂN'; ?>
                </h2>

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
                        <span class="relative z-10"><?php echo $current_lang === 'en' ? 'Sleep bus' : 'Xe giường nằm'; ?></span>
                    </button>

                    <!-- Inactive tab: Bikes — hidden -->
                    <!-- Inactive tab: Bicycle — hidden -->
                </div>

                <!-- ── BUS TAB CONTENT ── -->
                <div id="trans-content-bus">

                    <!-- Intro text -->
                    <p class="text-center text-sm max-w-xl mx-auto mb-10" style="color:#1D292C;">
                        <?php echo $current_lang === 'en'
                            ? 'Typically, you can ask your hotel to book for you. You can also check availability and price at <strong>Vexere.com</strong> — a transport ticket booking platform in Vietnam, handy and reliable. They might have chat so contact for you to call directly.'
                            : 'Bạn có thể nhờ khách sạn đặt giúp. Hoặc kiểm tra giá và đặt vé trực tiếp tại <strong>Vexere.com</strong> — nền tảng đặt vé xe uy tín tại Việt Nam.'; ?>
                    </p>

                    <!-- 3-column bus type cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                        <?php
                        // Seat icon SVGs
                        // 2-seat row (VIP): 2 seats side by side with gap
                        $seat_svg = '<svg viewBox="0 0 28 32" width="18" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="14" height="18" rx="5" fill="#3D4F52"/><rect x="2" y="24" width="14" height="4" rx="2" fill="#3D4F52"/></svg>';

                        $bus_types = [
                            [
                                'label_en'  => 'VIIIIIIIIIP',
                                'label_vi'  => 'VIIIIIIIIIP',
                                'badge_en'  => 'VIP Cabin',
                                'badge_vi'  => 'VIP Cabin',
                                'img'       => get_template_directory_uri() . '/assets/images/ha-giang/bus-vip.jpg',
                                'desc_en'   => 'If you already experience other kind, this is definitely the VIP of the VIP bus. Each cabin is for 1–2 people (you choose when book) and has curtain for privacy.<br>Typically only departure from Ha Noi.',
                                'desc_vi'   => 'Đây là loại VIP nhất trong các loại xe VIP. Mỗi cabin dành cho 1–2 người (bạn chọn khi đặt) và có rèm riêng tư.<br>Thường chỉ xuất phát từ Hà Nội.',
                                'rows_en'   => '2 rows and 2 floors',
                                'rows_vi'   => '2 hàng và 2 tầng',
                                'price_en'  => '$15 for one way ticket',
                                'price_vi'  => '~350.000đ một chiều',
                                'seats'     => 2,
                            ],
                            [
                                'label_en'  => 'So so',
                                'label_vi'  => 'Tạm được',
                                'badge_en'  => 'Not very VIP',
                                'badge_vi'  => 'Không VIP lắm',
                                'img'       => get_template_directory_uri() . '/assets/images/ha-giang/bus-not-vip.jpg',
                                'desc_en'   => 'More rows, which takes up to 60–80 centimeters each, small but manageable. Also has curtain.<br>Sometimes they overbook (especially during Vietnam holiday). Therefore, for solo female travelers, I recommend booking second floor\'s seats. You don\'t want a stranger lying right next to you in the middle of the night.',
                                'desc_vi'   => 'Nhiều hàng hơn, mỗi chỗ khoảng 60–80cm, nhỏ nhưng chấp nhận được. Cũng có rèm.<br>Đôi khi họ bán quá vé (nhất là dịp lễ). Nếu đi một mình, nên đặt tầng 2 để tránh người lạ nằm cạnh.',
                                'rows_en'   => '3 rows and 2 floors',
                                'rows_vi'   => '3 hàng và 2 tầng',
                                'price_en'  => '$10 for one way ticket',
                                'price_vi'  => '~230.000đ một chiều',
                                'seats'     => 3,
                            ],
                            [
                                'label_en'  => 'Absolute chaos',
                                'label_vi'  => 'Hỗn loạn tuyệt đối',
                                'badge_en'  => 'Economy',
                                'badge_vi'  => 'Phổ thông',
                                'img'       => get_template_directory_uri() . '/assets/images/ha-giang/bus-economy.jpg',
                                'desc_en'   => 'Don\'t expect anything for this kind. Just cheap. It is very common outside big cities; departures vary anywhere.<br>Of course no privacy. If you are a foreigner, you might receive extra attention (in a good way).<br>Time is not a thing with this kind. Good point is, there will be no limit here, you can even bring a motorcycle along.',
                                'desc_vi'   => 'Đừng kỳ vọng gì. Chỉ là rẻ. Rất phổ biến ngoài các thành phố lớn, xuất phát ở khắp nơi.<br>Không có sự riêng tư. Nếu là người nước ngoài, bạn có thể nhận được sự chú ý đặc biệt (theo nghĩa tốt).<br>Không có giờ giấc cố định. Điểm hay là không giới hạn, thậm chí có thể mang theo xe máy.',
                                'rows_en'   => '3 rows and 2 floors',
                                'rows_vi'   => '3 hàng và 2 tầng',
                                'price_en'  => '$5–10 for one way ticket',
                                'price_vi'  => '~120.000–230.000đ một chiều',
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
                                    <?php echo $current_lang === 'en' ? 'The image is for illustrative purpose only' : 'Ảnh mang tính chất minh họa'; ?>
                                </p>
                            </div>

                            <!-- Card label -->
                            <h3 class="text-xl font-bold mb-2" style="color:#1D292C;">
                                <?php echo $current_lang === 'en' ? $bt['label_en'] : $bt['label_vi']; ?>
                            </h3>

                            <!-- Description -->
                            <p class="text-sm mb-4" style="color:#1D292C; line-height:1.7;">
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
                        <a href="#" class="text-sm font-semibold underline" style="color:#7B63F7;">
                            <?php echo $current_lang === 'en' ? 'See an article I wrote about sleep bus' : 'Xem bài viết về xe giường nằm'; ?>
                        </a>
                    </p>

                    <!-- How to book box -->
                    <div class="rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6" style="background:#F9FBDF; border:1px solid #e5e7eb;">
                        <div class="flex-1">
                            <h4 class="font-bold mb-2" style="color:#7B63F7; font-size:1.1rem;">
                                <?php echo $current_lang === 'en' ? 'How to book?' : 'Đặt vé như thế nào?'; ?>
                            </h4>
                            <p class="text-sm" style="color:#1D292C; line-height:1.7;">
                                <?php echo $current_lang === 'en'
                                    ? 'Typically, you can ask your hotel to book for you. You can also check availability and price at <strong>Vexere.com</strong> — a transport ticket booking platform in Vietnam. Book on the site or contact the bus company directly.'
                                    : 'Bạn có thể nhờ khách sạn đặt giúp. Hoặc kiểm tra và đặt vé tại <strong>Vexere.com</strong> — nền tảng đặt vé xe tại Việt Nam. Đặt trên web hoặc liên hệ trực tiếp hãng xe.'; ?>
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
    <section class="py-16 h-full" style="background:#F9FBDF;" id="weather">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-center font-black tracking-widest uppercase text-sm mb-2" style="letter-spacing:.15em; color:#1D292C;">
                <?php echo $current_lang === 'en' ? 'WHEN IS THE BEST TO VISIT HA GIANG?' : 'NÊN ĐI HÀ GIANG MÙA NÀO?'; ?>
            </h2>

            <!-- Live weather strip -->
            <div
                id="weather-data-root"
                data-icon-root="<?php echo esc_url($icon_root_path); ?>"
                class="flex flex-wrap justify-center gap-8 py-6 mb-6 border-b border-[#8A8E8F]">
                <?php foreach ($locations as $id => $location): ?>
                <div class="text-center" data-city="<?php echo esc_attr($location['api_query']); ?>" id="weather-card-<?php echo esc_attr($id); ?>">
                    <p class="text-sm font-semibold mb-2"><?php echo esc_html($location['display']); ?></p>
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
                    'title_en'=> 'Spring (February – Early April)',
                    'title_vi'=> 'Xuân (Tháng 2 – Đầu tháng 4)',
                    'desc_en' => 'Flowers season. You can easily bắt gặp blooming flowers along the road. Sometimes foggy and light rain. You should bring along light jackets as it can be cold at night.',
                    'desc_vi' => 'Mùa hoa. Dọc đường dễ bắt gặp hoa nở rực rỡ. Đôi khi có sương mù và mưa nhẹ. Nên mang áo khoác nhẹ vì đêm có thể lạnh.',
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-2.png',
                    'title_en'=> 'Summer',
                    'title_vi'=> 'Hè',
                    'desc_en' => 'Flowers season. You can easily bắt gặp blooming flowers along the road. Sometimes foggy and light rain. You should bring along light jackets as it can be cold at night.',
                    'desc_vi' => 'Xanh mướt và tươi tốt. Nắng nhiều, đôi khi có mưa rào bất chợt. Mang kem chống nắng và áo mưa nhỏ.',
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-3.png',
                    'title_en'=> 'August – September',
                    'title_vi'=> 'Tháng 8 – Tháng 9',
                    'desc_en' => 'Flowers season. You can easily bắt gặp blooming flowers along the road. Sometimes foggy and light rain. You should bring along light jackets as it can be cold at night.',
                    'desc_vi' => 'Mùa lúa chín vàng. Cảnh đẹp nhất năm nhưng cần theo dõi thời tiết vì dễ có mưa lớn gây sạt lở.',
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-4.png',
                    'title_en'=> 'Autumn',
                    'title_vi'=> 'Thu',
                    'desc_en' => 'Flowers season. You can easily bắt gặp blooming flowers along the road. Sometimes foggy and light rain. You should bring along light jackets as it can be cold at night.',
                    'desc_vi' => 'Thời điểm lý tưởng nhất. Nắng đẹp, ít mưa. Hoa tam giác mạch nở rộ. Sáng sớm có thể săn biển mây.',
                ],
                [
                    'img'     => $theme_uri . '/assets/images/ha-giang/weather-1.png',
                    'title_en'=> 'Winter',
                    'title_vi'=> 'Đông',
                    'desc_en' => 'Flowers season. You can easily bắt gặp blooming flowers along the road. Sometimes foggy and light rain. You should bring along light jackets as it can be cold at night.',
                    'desc_vi' => 'Lạnh, đôi khi có băng giá ở vùng cao. Mang đồ giữ nhiệt. Cuối tháng 12 có hoa cải vàng, tháng 1 có hoa mai anh đào.',
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
                    <div style="flex:0 0 calc((100% - 3 * 12px) / 3.5); scroll-snap-align:start; border-radius:8px; overflow:hidden; background:#fff;">
                        <!-- Image — 3:4 portrait ratio -->
                        <div style="width:100%; padding-bottom:133%; position:relative; overflow:hidden;">
                            <img
                                src="<?php echo esc_url($s['img']); ?>"
                                alt="<?php echo esc_attr($current_lang === 'en' ? $s['title_en'] : $s['title_vi']); ?>"
                                style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; display:block;"
                            />
                        </div>
                        <!-- Caption -->
                        <div style="padding:14px 16px; background:#F9FBDF;">
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

    <!-- Culture -->
    <section class="pt-16" id="activities" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
            <h2 class="text-3xl font-bold mb-8">
                <?php echo $current_lang === 'en' ? "Immerse in Ha Giang culture with Hi Hi tour" : "Khám phá nét văn hóa đặc sắc vùng cao Hà Giang với Hi Hi tour" ?>
            </h2>

            <p class="mb-4">
                <?php echo $current_lang === 'en' ? "Hà Giang is a place rich in distinctive cultural products from the long-standing traditions of over 20 ethnic groups, a memorable tourist destination due to its natural landscapes and the people here. Unlike any other tourist spot in Vietnam, visitors to Hà Giang can witness the unique cultural products of the mountainous people, such as embroidered scarves, fabric bags, and dresses adorned with vibrant patterns. Tourists will participate in the poetic highland markets." : "Hà Giang là vùng đất hội tụ những giá trị văn hóa đặc trưng từ truyền thống lâu đời của hơn 20 dân." ?>
            </p>


            <h3 class="text-base font-bold mb-4">
                <?php echo $current_lang === 'en' ? "The culture of inviting to drink on the dining table of the people of Hà Giang, \"Happy Water\"" : "Văn hóa mời rượu trên bàn ăn" ?>
            </h3>
            <p class="mb-4">
                <?php echo $current_lang === 'en' ? "You’ve likely seen photos of travelers cheering with 'Happy Water' in Ha Giang. This is our local corn wine, and it’s a big part of Vietnamese hospitality. We love to offer a glass to welcome guests to our 'home,' but don't worry—there’s absolutely no pressure to drink!" : "Có thể bạn đã quen thuộc với hình ảnh du khách cùng người bản địa cùng cụng ly. Ở Hà Giang, mời rượu là để tỏ lòng hiếu khách, chào mừng bạn đến \"nhà\", nhưng đừng lo - uống rượu hoàn toàn không bắt buộc!" ?>
            </p>

            <h3 class="text-base font-bold mb-4">
                <?php echo $current_lang === 'en' ? "The weekly ethnic markets that come to life throughout the highland region" : "Chợ phiên vùng cao" ?>
            </h3>
            <p class="mb-4">
                <?php echo $current_lang === 'en' ? "Local markets usually happen every weekend, either Saturday or Sunday. Famous spots like Du Gia, Dong Van, and Meo Vac are where locals gather to trade goods and mountain specialties. The atmosphere is always lively, especially near the Lunar New Year (January - February). If you have the chance, don’t miss out on this unique experience!" : "Chợ phiên thường được tổ chức vào ngày cuối tuần, thường là sáng thứ 7 hoặc sáng Chủ Nhật. Các chợ nằm rải rác ở Đồng Văn, Du Già hay tiêu biểu là Mèo Vạc. Chợ lúc nào cũng đông vui, tập trung người dân từ khắp các vùng xung quanh đổ về. Dịp cận tết Nguyên đán cũng là lúc chợ vào mùa nhộn nhịp nhất. Nếu có cơ hội, đừng bỏ lỡ nét văn hóa độc đáo này nhé." ?>
            </p>

            <h3 class="text-base font-bold mb-4">
                <?php echo $current_lang === 'en' ? "Cultural gathering" : "Văn nghệ văn gừng" ?>
            </h3>
            <p class="mb-4">
                <?php echo $current_lang === 'en' ? "In the evenings, especially around the homestays in Dong Van, the mountain air fills with music. Locals and travelers often gather around a crackling bonfire, sharing songs and dancing together. It’s a simple, genuine way to experience the spirit of the community after a long day on the road" : "Buổi tối ở các khu đông khách du lịch, như Đồng Văn, thị trấn Mèo Vạc, thường hay tổ chức các buổi giao lưu văn nghệ. Người dân bản địa và lữ khách thường quây quần bên ánh lửa bập bùng, cùng nhau hát vang và nhảy múa. Đó là một cách trải nghiệm tinh thần cộng đồng thật giản dị và chân thành sau một ngày dài rong ruổi trên những cung đường." ?>
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

    <!-- Price -->
    <!-- <section class="pt-16 container mx-auto" id="pricing">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Pricing</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Choose your date range</h3>

                    <input
                        type="text"
                        id="date-range-picker"
                        name="date-range"
                        placeholder="Select start and end dates"
                        class="w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />

                </div>

                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">
                        Where can we pick you up?
                    </h3>
                    <form id="pricing-form">
                        <div class="w-full mb-5">
                            <div class="mt-2 grid grid-cols-1">
                                <select
                                    id="country"
                                    name="country"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option>Ha Giang</option>
                                    <option>Cao Bang</option>
                                    <option>Cat Ba</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full mb-5">
                            <label
                                htmlFor="country"
                                class="block text-base  font-bold">
                                Travel options
                            </label>

                            <?php foreach ($radio_options as $value => $label) : ?>

                                <?php
                                // Logic kiểm tra xem tùy chọn nào được chọn
                                $is_checked = ($value === $selected_option);
                                $checked_attr = $is_checked ? 'checked' : '';
                                $id = "travel-radio-{$value}";
                                ?>

                                <div class="flex items-center mb-2">
                                    <input
                                        id="<?php echo esc_attr($id); ?>"
                                        type="radio"
                                        value="<?php echo esc_attr($value); ?>"
                                        name="travel-options"
                                        <?php echo $checked_attr; ?>
                                        class="cursor-pointer transition duration-150 radio-option"
                                        data-label="<?php echo esc_attr($label); ?>" />
                                    <label
                                        for="<?php echo esc_attr($id); ?>"
                                        class="select-none ms-2 text-sm font-medium cursor-pointer">
                                        <?php echo esc_html($label); ?>
                                    </label>
                                </div>

                            <?php endforeach; ?>

                        </div>
                    </form>
                </div>
            </div>

            <div class="w-full">
                <button id="check-price-button" class="w-full py-3 bg-[#E4E4E2] border border-[#31393B] text-[#303030] font-semibold rounded-lg hover:opacity-90 transition">
                    Check the price
                </button>
            </div>
        </div>

        <div class="md:col-span-1">
            <div class="bg-[#ECF5DC] p-6 rounded-xl">
                <h3 class="text-xl font-bold mb-3">Price for each person</h3>
                <p class="text-3xl font-bold mb-6">5,890,000 VND/pax</p>

                <?php
                // Sử dụng SVG inline hoặc icon font thay cho IoMdCheckmark/MdClose
                $check_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                $close_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                ?>

                <p class="text-base font-bold mb-2">Our price includes</p>
                <ul class="space-y-2 text-sm mb-6">
                    <li class="flex items-start"><?php echo $check_icon; ?>Round-trip sleeper bus ticket: Ha Noi - Ha Giang</li>
                    <li class="flex items-start"><?php echo $check_icon; ?>Accommodation for the duration of your stay</li>
                    <li class="flex items-start"><?php echo $check_icon; ?>Three standard meals per day</li>
                    <li class="flex items-start"><?php echo $check_icon; ?>Motorbike rental</li>
                    <li class="flex items-start"><?php echo $check_icon; ?>Easy drivers</li>
                    <li class="flex items-start"><?php echo $check_icon; ?>All entrance fees included</li>
                </ul>

                <p class="text-base font-bold mb-2">What not includes</p>
                <ul class="space-y-2 text-sm mb-6">
                    <li class="flex items-start"><?php echo $close_icon; ?>Personal expenses (beverages at stops, food market,...)</li>
                    <li class="flex items-start"><?php echo $close_icon; ?>Desired souvenirs to bring back home</li>
                    <li class="flex items-start"><?php echo $close_icon; ?>Tips are optional, but appreciated!</li>
                </ul>

                <button class="w-full py-3 bg-black text-white font-semibold rounded-lg hover:opacity-70 transition">
                    Book now (you won't be charged yet)
                </button>
            </div>
        </div>
    </div>
</section> -->

    <!-- How to book us -->
    <!-- May be you will interest in -->
    <section id="how-to-book" style="background:#E7F15A;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <p class="text-xs font-bold tracking-widest uppercase text-center text-[#1D292C] mb-3">
                <?php echo $current_lang === 'en' ? 'May be you will interest in' : 'Có thể bạn cũng muốn khám phá'; ?>
            </p>
            <p class="text-sm text-center text-[#474E50] mb-10 max-w-2xl mx-auto">
                <?php echo $current_lang === 'en'
                    ? 'If you have ample time and seek deep cultural immersion, our extended tours are perfect. We offer diverse options to explore Northern Vietnam or create a custom itinerary to anywhere you desire.'
                    : 'Nếu bạn có nhiều thời gian và muốn trải nghiệm văn hóa sâu sắc hơn, các tour dài ngày của chúng tôi là lựa chọn hoàn hảo.'; ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Cao Bang -->
                <a href="<?php echo esc_url(get_translated_permalink_by_slug('cao-bang-tour')); ?>" class="group block">
                    <div class="overflow-hidden rounded-xl mb-3" style="aspect-ratio:4/3;">
                        <img
                            src="<?php echo esc_url($theme_uri . '/assets/images/cao_bang.jpg'); ?>"
                            alt="Cao Bang"
                            class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105" />
                    </div>
                    <p class="font-bold text-base uppercase tracking-wide text-[#1D292C]">
                        <?php echo $current_lang === 'en' ? 'Cao Bang' : 'Cao Bằng'; ?>
                    </p>
                </a>

                <!-- Cat Ba -->
                <a href="<?php echo esc_url(get_translated_permalink_by_slug('cat-ba-tour')); ?>" class="group block">
                    <div class="overflow-hidden rounded-xl mb-3" style="aspect-ratio:4/3;">
                        <img
                            src="<?php echo esc_url($theme_uri . '/assets/images/cat_ba_island.jpg'); ?>"
                            alt="Cat Ba"
                            class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105" />
                    </div>
                    <p class="font-bold text-base uppercase tracking-wide text-[#1D292C]">
                        <?php echo $current_lang === 'en' ? 'Cat Ba' : 'Cát Bà'; ?>
                    </p>
                </a>

                <!-- Mu Cang Chai (coming soon) -->
                <a href="#" class="group block opacity-70 cursor-not-allowed">
                    <div class="overflow-hidden rounded-xl mb-3 bg-[#d4e04d]" style="aspect-ratio:4/3;">
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-[#1D292C] text-sm font-medium"><?php echo $current_lang === 'en' ? 'Coming soon' : 'Sắp ra mắt'; ?></span>
                        </div>
                    </div>
                    <p class="font-bold text-base uppercase tracking-wide text-[#1D292C]">
                        <?php echo $current_lang === 'en' ? 'Mù Cang Chải' : 'Mù Cang Chải'; ?>
                    </p>
                </a>

            </div>
        </div>
    </section>

    <!-- faqs -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16" id="faqs">
        <h2 class="text-3xl font-bold mb-10">
            <?php echo $t['toc_faqs'] ?? ($current_lang === 'en' ? 'FAQs' : 'Câu hỏi thường gặp'); ?>
        </h2>

        <?php foreach ($faqs_data as $index => $faq): ?>
            <?php
            $question_text = $t[$faq['q']] ?? 'Question key not found';
            $answer_text = $t[$faq['a']] ?? 'Answer key not found';
            ?>
            <div class="border-b border-gray-200">
                <button
                    class="flex justify-between items-center w-full py-4 text-left font-semibold text-lg text-[#101F23] hover:text-[#8CA865] focus:outline-none"
                    onclick="document.getElementById('faq-answer-<?php echo $index; ?>').classList.toggle('hidden');">

                    <?php echo htmlspecialchars($question_text); ?>

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
                <div id="faq-answer-<?php echo $index; ?>" class="hidden pb-4 text-gray-600">
                    <div><?php echo $answer_text; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const pathname = window.location.pathname
        const lang = pathname.includes('/vi') ? 'vi' : 'en'

        function getWeatherState(weatherCode, isDay) {
            if (weatherCode === 0) {
                return isDay ? 'sun.svg' : 'clear_sky.svg';
            }
            if ([1, 2, 3].includes(weatherCode)) {
                if (weatherCode === 3) return 'cloud.svg';
                return isDay ? 'sun_cloud.svg' : 'cloudy_night.svg';
            }
            if ([45, 48].includes(weatherCode)) {
                return 'cloud.svg';
            }
            if ([51, 53, 55, 61, 63, 65, 80, 81, 82].includes(weatherCode)) {
                return 'rain.svg';
            }
            if ([95, 96, 99].includes(weatherCode)) {
                return 'rain_thunder.svg';
            }

            return 'sun.svg';
        }

        async function updateWeatherCard(cardElement) {
            const query = cardElement.getAttribute('data-city');
            const cityId = cardElement.id.split('-').pop();
            const iconRootPath = document.getElementById('weather-data-root').getAttribute('data-icon-root');

            const iconElement = document.getElementById(`icon-${cityId}`);
            const tempElement = document.getElementById(`temp-${cityId}`);
            const conditionElement = document.getElementById(`condition-${cityId}`);

            if (!query || !iconElement || !tempElement || !conditionElement) {
                console.error("Thiếu thuộc tính hoặc phần tử UI.");
                return;
            }

            const url = `https://api.open-meteo.com/v1/forecast?${query}&current=temperature_2m,is_day,weather_code&timezone=auto`;

            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                const data = await response.json();

                const currentTemp = Math.round(data.current.temperature_2m);
                const weatherCode = data.current.weather_code;
                const isDay = data.current.is_day === 1;

                const iconFileName = getWeatherState(weatherCode, isDay);
                iconElement.src = iconRootPath + iconFileName;

                tempElement.textContent = `${currentTemp}°C`;

                const descMap = {
                    0: {
                        vi: "Trời quang",
                        en: "Clear sky"
                    },
                    1: {
                        vi: "Ít mây",
                        en: "Mainly clear"
                    },
                    2: {
                        vi: "Mây rải rác",
                        en: "Partly cloudy"
                    },
                    3: {
                        vi: "U ám",
                        en: "Overcast"
                    },
                    45: {
                        vi: "Sương mù",
                        en: "Foggy"
                    },
                    48: {
                        vi: "Sương muối",
                        en: "Depositing rime fog"
                    },
                    51: {
                        vi: "Mưa phùn nhẹ",
                        en: "Light drizzle"
                    },
                    53: {
                        vi: "Mưa phùn vừa",
                        en: "Moderate drizzle"
                    },
                    55: {
                        vi: "Mưa phùn dày",
                        en: "Dense drizzle"
                    },
                    61: {
                        vi: "Mưa nhẹ",
                        en: "Slight rain"
                    },
                    63: {
                        vi: "Mưa vừa",
                        en: "Moderate rain"
                    },
                    65: {
                        vi: "Mưa to",
                        en: "Heavy rain"
                    },
                    80: {
                        vi: "Mưa rào nhẹ",
                        en: "Slight rain showers"
                    },
                    95: {
                        vi: "Giông bão",
                        en: "Thunderstorm"
                    }
                };
                conditionElement.textContent = descMap[weatherCode][lang] || "Bình thường";

            } catch (error) {
                console.error("Lỗi khi lấy dữ liệu thời tiết:", error);
                iconElement.src = iconRootPath + 'error.svg';
                tempElement.textContent = 'Lỗi';
                conditionElement.textContent = 'Không khả dụng';
            }
        }

        function fetchAllWeather() {
            const weatherCards = document.querySelectorAll('#weather-data-root > div');

            weatherCards.forEach(card => {
                updateWeatherCard(card); // Gọi hàm cập nhật cho từng thẻ
            });
        }

        fetchAllWeather();
    });
</script>

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
</script>

<?php get_footer(); ?>