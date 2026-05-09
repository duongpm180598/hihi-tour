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

    <!-- ── OVERVIEW: full-width hero image + summary box overlay ── -->
    <section id="overview" style="position:relative; background:#1D292C;">

        <!-- Full-width banner image -->
        <div style="width:100%; height:clamp(340px, 55vw, 680px); overflow:hidden; position:relative;">
            <img
                src="<?php echo esc_url($theme_uri . '/assets/images/ha-giang/banner.png'); ?>"
                alt="Ha Giang"
                style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" />
            <!-- subtle dark gradient at bottom so box text stays readable -->
            <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 40%, rgba(0,0,0,0.45) 100%);"></div>
        </div>

        <!-- Summary box — overlaid bottom-left on the image -->
        <div style="position:absolute; bottom:32px; left:clamp(16px, 4vw, 64px); z-index:10; max-width:min(480px, calc(100% - 32px));">
            <div style="background:#E7F15A; border-radius:12px; padding:20px 24px;">

                <!-- Tagline -->
                <p style="font-size:13px; color:#1D292C; margin-bottom:16px; line-height:1.7;">
                    <?php echo $current_lang === 'en'
                        ? "It's famous for a reason.<br>Amazing landscape.<br>Yes it's getting more and more crowded now. But still, I love Hà Giang."
                        : "Nổi tiếng là có lý do.<br>Phong cảnh tuyệt đẹp.<br>Đúng là ngày càng đông hơn. Nhưng tôi vẫn yêu Hà Giang."; ?>
                </p>

                <!-- 2×2 info grid -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">

                    <!-- Safety -->
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <div style="width:30px; height:30px; border-radius:50%; background:#7B63F7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1D292C; margin:0 0 2px;"><?php echo $current_lang === 'en' ? 'Safety' : 'An toàn'; ?></p>
                            <p style="font-size:12px; color:#1D292C; line-height:1.5; margin:0;"><?php echo $current_lang === 'en' ? 'Solo traveler safe, even for female. I do it all the time.' : 'An toàn cho khách đi một mình, kể cả nữ.'; ?></p>
                        </div>
                    </div>

                    <!-- Budget -->
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <div style="width:30px; height:30px; border-radius:50%; background:#7B63F7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke-width="2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v2m0 8v2m-4-6h8M9 10h6" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1D292C; margin:0 0 2px;"><?php echo $current_lang === 'en' ? 'Budget' : 'Chi phí'; ?></p>
                            <p style="font-size:12px; color:#1D292C; line-height:1.5; margin:0;"><?php echo $current_lang === 'en' ? 'Typical cost $50 a day' : 'Khoảng 50 USD mỗi ngày'; ?></p>
                        </div>
                    </div>

                    <!-- Accessible -->
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <div style="width:30px; height:30px; border-radius:50%; background:#7B63F7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <circle cx="12" cy="11" r="3" stroke-width="2" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1D292C; margin:0 0 2px;"><?php echo $current_lang === 'en' ? 'Accessible' : 'Dễ tiếp cận'; ?></p>
                            <p style="font-size:12px; color:#1D292C; line-height:1.5; margin:0;"><?php echo $current_lang === 'en' ? 'Easy access from big cities.' : 'Dễ dàng từ các thành phố lớn.'; ?></p>
                        </div>
                    </div>

                    <!-- Typical stay -->
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <div style="width:30px; height:30px; border-radius:50%; background:#7B63F7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2v4M8 2v4M3 10h18" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1D292C; margin:0 0 2px;"><?php echo $current_lang === 'en' ? 'Typical stay' : 'Thời gian lý tưởng'; ?></p>
                            <p style="font-size:12px; color:#1D292C; line-height:1.5; margin:0;"><?php echo $current_lang === 'en' ? 'Should be at least 3 days' : 'Nên đi ít nhất 3 ngày'; ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ── "Explore Ha Giang" text block below the hero ── -->
    <section class="bg-[#FAF9F7] px-4 sm:px-6 lg:px-8 py-12">
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
    <section class="pt-16" id="itinerary" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-8">
                <?php echo $current_lang === 'en' ? "Our Ha Giang Itinerary" : "Lịch trình Hà Giang" ?>
            </h2>

            <p class="text-base font-bold mb-2">
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

                        <a href="<?php echo esc_url(add_query_arg(array('tour' => 'cao_bang'), get_translated_permalink_by_slug('booking'))); ?>">
                            <button class="cursor-pointer w-full py-3 font-semibold rounded-lg hover:opacity-80 transition" style="background:#E7F15A; color:#1D292C;">
                                <?php echo $current_lang === 'en' ? 'Book now (you won\'t be charged yet)' : 'Đặt lịch ngay (không cần thanh toán)' ?>
                            </button>
                        </a>

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
                        <span style="font-size:13px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; color:#1D292C;">
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

    <!-- Accommodation -->
    <div class="pt-16" id="transportation">
        <section class="mb-8 md:mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                    <div class="relative">
                        <h2 class="text-3xl font-bold mb-4 ">
                            <?php echo $current_lang === 'en' ? "How you get to Ha Giang city center" : "Di chuyển tới Hà Giang" ?>
                        </h2>
                        <p>
                            <?php echo $current_lang === 'en' ? "It takes around 7 - 8 hours to travel from Ha Noi to Ha Giang city center by car, so typically people choose night sleep bus and arrive by next morning." : "Thường sẽ mất khoảng 6 tiếng để đi từ Hà Nội (BX Mỹ Đình) tới thành phố Hà Giang. Do vậy, du khách thường chọn đi xe giường nằm buổi đêm, đến nơi vào sáng sớm hôm sau, nghỉ lại tại dorm trước khi lên đường." ?>
                        </p>
                        <?php echo $current_lang === 'en' ? "Our tour provides round-trip bus ticket. You will travel on <strong>VIP sleep bus</strong>, we assure everyone get separate bed on the bus (absolutely no sharing with stranger!)." : "Tour của Hi Hi đã bao gồm vé xe khứ hồi Hà Nội - Hà Giang. Bạn sẽ đi xe cabin VIP, mỗi người có một giường riêng." ?>
                        <p>
                            <?php echo $current_lang === 'en' ? "When you arrive in Ha Giang, our staff will guide you to your dorm to rest until morning. Note that child under 12 must accompany by adult on the bus." : "Khi tới Hà Giang, chúng tôi sẽ đón bạn về phòng nghỉ ngơi tới sáng trước khi lên đường. Nếu có trẻ nhỏ dưới 12 tuổi, trẻ sẽ nằm cùng bạn trên xe giường nằm." ?>

                        </p>
                    </div>

                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/ha-giang/vip-bus.jpg' ?>"
                            alt="vip bus"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <p class="text-center text-[#74797A] text-sm my-2">
                            <?php echo $current_lang === 'en' ? "The image is for illustrative purpose only" : "Ảnh mang tính chất minh họa" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-8 md:mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
                <h2 class="text-3xl font-bold mb-4 ">
                    <?php echo $current_lang === 'en' ? "How you will travel around Ha Giang" : "Di chuyển ở Hà Giang" ?>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1: bike -->
                    <div class="rounded-lg overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/ha-giang/transportation-1.png' ?>"
                            alt=""
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <div class="p-3">
                            <h3 class="text-xl font-bold mb-2"><?php echo $current_lang === 'en' ? "On a motorbike" : "Bằng xe máy" ?></h3>
                            <div class="flex gap-2 my-3 bg-[#E7F15A] px-3 py-1 rounded items-center w-fit">
                                <img width="24" height="24" src="<?php echo esc_url($icons['bike']); ?>" alt="Bike" />
                                <span class="text-fg-brand-strong text-xs font-medium">
                                    <?php echo $current_lang === 'en' ? "Unique experience" : "Trải nghiệm nên có" ?>
                                </span>
                            </div>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? "Most popular choice when you come to Ha Giang! Enjoy the
                            mountain scenery around you is definitely one of the most
                            special thing of Ha Giang Loop." : "Lựa chọn phổ biến nhất khi tới Hà Giang! Ngồi trên xe máy, bạn có thể tận hưởng trọn vẹn không khí và cảnh vật xung quanh. " ?>
                            </p>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? "Hire easy drivers for easy trip, or you can choose to drive
                            yourself if you have a valid license. Experience Ha Giang to
                            the fullest!" : "Bạn có thể thuê người lái cho chuyến đi nhàn hạ, hoặc tự lái nếu muốn." ?>

                            </p>
                        </div>
                    </div>

                    <!-- Card 2: luxury car -->
                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/ha-giang/transportation-2.png' ?>"
                            alt="Hotel Ha Giang"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <div class="p-3">
                            <h3 class="text-xl font-bold mb-2"><?php echo $current_lang === 'en' ? "Luxury limousine" : "Bằng xe ô tô" ?></h3>
                            <div class="flex gap-3 my-3">
                                <div class="flex gap-2 bg-[#E7F15A] px-3 py-1 rounded items-center w-fit">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['family']); ?>" alt="Family" />
                                    <span class="text-fg-brand-strong text-xs font-medium ">
                                        <?php echo $current_lang === 'en' ? "Family friendly" : "Phù hợp gia đình" ?>
                                    </span>
                                </div>
                                <div class="flex gap-2 bg-[#E7F15A] px-3 py-1 rounded items-center w-fit">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['group']); ?>" alt="Group" />
                                    <span class="text-fg-brand-strong text-xs font-medium">
                                        <?php echo $current_lang === 'en' ? "Large group" : "Nhóm đông người" ?>
                                    </span>
                                </div>

                            </div>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? "Most chosen by family or large group! <br /> We provide a range of
                            options: vehicles with 9, 16, or 29 seats to fit your needs.
                            Feel free to select a car option whenever you like." : "Thường được chọn cho gia đình hoặc nhóm đông người!<br />Chúng tôi có xe 9 - 16 - 29 chỗ tùy vào nhu cầu của bạn." ?>

                            </p>
                        </div>
                    </div>
                    <!-- Card 3: ... -->
                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/ha-giang/combine-travel.png' ?>"
                            alt="Combine travel"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <div class="p-3">
                            <h3 class="text-xl font-bold mb-2">
                                <?php echo $current_lang === 'en' ? "Or maybe a combination of both" : "Hoặc là cả 2" ?>
                            </h3>
                            <div class="flex gap-2 my-3 bg-[#E7F15A] px-3 py-1 rounded items-center w-fit">
                                <span class="text-fg-brand-strong text-xs font-medium">
                                    <?php echo $current_lang === 'en' ? "Flexible" : "Linh hoạt" ?>
                                </span>
                            </div>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? "Some of you prefer traveling by car, while others enjoy
                            biking? No worries! We can accommodate both preferences." : "Một số người thích đi ô tô, một số khác lại muốn đi xe máy? Chúng tôi hoàn toàn có thể đáp ứng." ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-8 md:mb-16" data-aos="fade-up" data-aos-duration="1000" id="accomodations">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/ha-giang/room-2.png' ?>"
                            alt="Ha giang hotel"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <p class="text-center text-[#74797A] text-sm my-2">
                            <?php echo $current_lang === 'en' ? "The image is for illustrative purpose only" : "Ảnh mang tính chất minh họa" ?>
                        </p>
                    </div>

                    <div class="w-full">
                        <h2 class="text-3xl font-bold mb-4 ">
                            <?php echo $current_lang === 'en' ? "Where you will spend the nights" : "Nơi ngủ nghỉ" ?>
                        </h2>
                        <p>
                            <?php echo $current_lang === 'en' ? "You will have your own room! <br />
                        Throughout your journey, you will always be provided with private accommodation in all homestays and hotels. This ensures you have a cozy, comfortable, and quiet space to relax and fully recharge after a long day conquering the majestic routes of Ha Giang." : "Bạn sẽ có phòng riêng!<br />Trong suốt hành trình, chúng tôi sẽ đặt phòng riêng tại tất cả các khách sạn, homestay mà bạn nghỉ tại. Đảm bảo cho bạn không gian riêng tư, thoải mái sau hành trình dài." ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Weather -->
    <section class="py-16 h-full" style="background:#F9FBDF;" id="weather">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4"><?php echo $current_lang === 'en' ? "Weather in Ha Giang" : "Thời tiết ở Hà Giang" ?></h2>

            <!-- <div class="flex gap-3 mb-4">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/clock.svg'); ?>" alt="clock" />
                07:00 14 Nov 2025
            </div> -->

            <div
                id="weather-data-root"
                data-icon-root="<?php echo esc_url($icon_root_path); ?>"
                class="grid grid-cols-1 md:grid-cols-3 divide-x-0 md:divide-x divide-[#8A8E8F] border-b border-[#8A8E8F] py-4">
                <?php $index = 0;
                foreach ($locations as $id => $location) : ?>
                    <?php
                    $border_class = ($index < count($locations) - 1) ? 'md:border-r border-[#8A8E8F] pr-4 md:pr-0' : 'pr-4 md:pr-0';
                    $index++;
                    ?>

                    <div
                        class="px-4 py-2"
                        data-city="<?php echo esc_attr($location['api_query']); ?>"
                        id="weather-card-<?php echo esc_attr($id); ?>">
                        <h3 class="text-base font-bold mb-3"><?php echo esc_html($location['display']); ?></h3>
                        <div class="flex items-center gap-8">
                            <div class="flex flex-col">
                                <img
                                    id="icon-<?php echo esc_attr($id); ?>"
                                    width="48"
                                    height="48"
                                    src="<?php echo esc_url($icon_root_path); ?>loading.svg"
                                    alt="Loading..." />
                                <span class="mt-3" id="condition-<?php echo esc_attr($id); ?>">Đang tải...</span>
                            </div>
                            <p id="temp-<?php echo esc_attr($id); ?>" class="text-5xl font-bold my-2">--°C</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="py-3" data-aos="fade-up" data-aos-duration="1000">
                <h5 class="mb-3">
                    <?php echo $current_lang === 'en' ? "When is the best to visit Ha Giang?" : "Nên đi Hà Giang mùa nào?" ?>
                </h5>

                <p class="mb-3">
                    <?php echo $current_lang === 'en' ? "Ha Giang has 4 distinct seasons in a year that welcomes guests at any time, as each season here carries a distinct beauty, promising unique experiences." : "Hà Giang có 4 mùa rõ rệt, mùa nào cũng có cái hay để bạn tới tham quan." ?>
                </p>

                <p class="mb-3">
                    <strong><?php echo $current_lang === 'en' ? "Ha Giang in Spring (February – Early April)" : "Hà Giang vào mùa Xuân (Tháng 2 – Đầu tháng 4)" ?></strong>,
                    <?php echo $current_lang === 'en' ? " when the rocky plateau awakens with vibrant colors: deep pink peach blossoms, and white plum and pear flowers blooming across the mountains. The weather during this time is cool, with light drizzles, and fog often blankets the mornings, creating an ethereal atmosphere. You should bring along light jackets as it can be cold at night." : " là lúc cao nguyên đá thức tỉnh với những sắc màu rực rỡ: sắc hồng thắm của hoa đào, sắc trắng tinh khôi của hoa mận, hoa lê nở rộ khắp các triền núi. Thời tiết lúc này mát mẻ, đôi khi có mưa xuân lưa thưa và sương mù bao phủ vào mỗi sáng sớm, tạo nên một không gian huyền ảo. Bạn nên mang theo áo khoác nhẹ vì đêm về trời vẫn còn se lạnh." ?>
                </p>
                <p class="mb-3">
                    <?php echo $current_lang === 'en' ? "In contrast, " : "Ngược lại, " ?>
                    <strong><?php echo $current_lang === 'en' ? "Summer (May – August)" : "Mùa Hè (Tháng 5 – Tháng 8)" ?></strong>
                    <?php echo $current_lang === 'en' ? " is characterized by the lush green vitality of the foliage, with sunny days occasionally interrupted by sudden rain showers. Daytime temperatures can be high, but the evenings are pleasantly cool and breezy once the sun sets. Guests should prepare summer attire and use sun protection." : " Ngược lại với vẻ dịu dàng của mùa xuân, mùa hè là sự trỗi dậy mạnh mẽ của sức sống xanh mướt. Những ngày nắng vàng rực rỡ đôi khi được nối tiếp bởi những cơn mưa rào bất chợt. Nhiệt độ ban ngày có thể khá cao, nhưng ngay khi mặt trời lặn, không khí sẽ trở nên thoáng đãng và mát mẻ. Bạn nên chuẩn bị trang phục mùa hè và đừng quên bôi kem chống nắng nhé." ?>
                </p>
                <p class="mb-3">
                    <?php echo $current_lang === 'en' ? "The transitional period, around late August to September, you should definitely need to check on weather regularly due to potential heavy rain, which might cause landslide. However, this is precisely the season of the magnificent rice harvest. The sight of entire hillsides of terraced fields simultaneously turning golden yellow creates a vibrant symphony across the vast mountains." : "Trong giai đoạn chuyển mùa, khoảng cuối tháng 8 đến tháng 9, bạn chắc chắn nên kiểm tra thời tiết thường xuyên do có khả năng mưa lớn, có thể gây sạt lở đất. Tuy nhiên, đây chính là mùa lúa chín tráng lệ. Khung cảnh cả sườn đồi ruộng bậc thang đồng loạt chuyển sang màu vàng óng ả tạo nên một bản giao hưởng sống động trên khắp núi rừng rộng lớn." ?>
                </p>
                <p class="mb-3">
                    <strong><?php echo $current_lang === 'en' ? "The transitional period, around late August to September" : "Giai đoạn chuyển mùa (Cuối tháng 8 – Tháng 9)" ?></strong>
                    <?php echo $current_lang === 'en' ? " you should definitely need to check on weather regularly due to potential heavy rain, which might cause landslide. However, this is precisely the season of the magnificent rice harvest. The sight of entire hillsides of terraced fields simultaneously turning golden yellow creates a vibrant symphony across the vast mountains." : " Bạn cần theo dõi dự báo thời tiết thường xuyên vì đây là thời điểm dễ có mưa lớn gây sạt lở. Tuy nhiên, đây lại chính là mùa vàng của những thửa ruộng bậc thang hùng vĩ. Cả một vùng đồi núi đồng loạt thay áo vàng óng, tạo nên một bản giao hưởng màu sắc rực rỡ giữa đại ngàn bao la." ?>
                </p>
                <p class="mb-3">
                    <strong><?php echo $current_lang === 'en' ? "Late Autumn (Late September – End of November)" : "Hà Giang cuối Thu (Cuối tháng 9 – Cuối tháng 11)" ?></strong>
                    <?php echo $current_lang === 'en' ? " is often considered the most ideal time. The weather is favorable, with little rain and beautiful sunshine. Notably, early mornings in the high valleys offer views of the sea of clouds rolling in. The highlands smell faintly of fresh hay, the Nho Que River dons its mythical jade-blue color, Buckwheat Flowers bloom in pink and white across the hillsides." : " Đây được coi là thời điểm lý tưởng nhất trong năm. Thời tiết vô cùng ủng hộ với nắng đẹp và ít mưa. Đặc biệt, bạn có thể săn được biển mây bồng bềnh tại các thung lũng cao vào sáng sớm. Cao nguyên đá lúc này phảng phất mùi rơm rạ mới, dòng sông Nho Quế khoác lên mình màu xanh ngọc bích huyền thoại, và hoa Tam Giác Mạch bắt đầu nở rộ sắc hồng trắng khắp các sườn đồi" ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "Finally, entering " : "Cuối cùng, bước vào " ?>
                    <strong><?php echo $current_lang === 'en' ? "Winter (December – January)" : "Hà Giang mùa Đông (Tháng 12 – Tháng 1)" ?></strong>,
                    <?php echo $current_lang === 'en' ? " Ha Giang quickly turns cold, with temperatures sometimes dropping below 10°C, even bringing frost and ice to the high mountain areas (thermal wear is essential). In the gloomy cold, the feeling of gathering around a village fire, savoring warm local dishes, provides a strange, comforting warmth. Late December also marks the season of charming Yellow Mustard Flowers, and January brings the Apricot Blossom season, though fleeting, it draws many visitors." : " Trời chuyển lạnh rất nhanh, nhiệt độ có lúc xuống dưới 0°, thậm chí xuất hiện băng giá ở các vùng núi cao (đồ giữ nhiệt là vật dụng không thể thiếu). Giữa cái lạnh giá, cảm giác được ngồi quây quần bên bếp lửa, nhấm nháp những món đặc sản ấm nóng sẽ mang lại sự ấm áp lạ kỳ. Cuối tháng 12 cũng là mùa hoa Cải Vàng duyên dáng, và tháng 1 đón mùa hoa mai anh đào rực rỡ tuy ngắn ngủi nhưng vẫn đủ sức níu chân biết bao lữ khách." ?>
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-8">
                <?php for ($i = 1; $i <= $image_grid_count; $i++) : ?>
                    <div class="w-full overflow-hidden" data-aos="fade-up" data-aos-duration="<?php echo $i * 200 ?>">
                        <img
                            src="<?php echo esc_url($theme_uri . "/assets/images/ha-giang/weather-{$i}.png"); ?>"
                            alt="Weather in Ha Giang <?php echo $i; ?>"
                            class="w-full object-cover cursor-pointer" />
                    </div>
                <?php endfor; ?>
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
    <section style="background:#E7F15A;" id="how-to-book">
        <div class="container mx-auto px-4 py-12">
            <h2 class="text-3xl font-bold mb-8">
                <?php echo $current_lang === 'en' ? "How to book us?" : "Làm thế nào để đặt tour?" ?>
            </h2>
            <p>
                <?php echo $current_lang === 'en' ? "Feel free to reach out to us using the options below. We’ll confirm all the necessary details. Alternatively, you can fill out the form in the Pricing section above and click 'Book Now.' Your order will be sent to us, and we’ll get in touch for more information—no charges will apply just yet. Rest assured, your information is secure with us." : "Vui lòng liên hệ với chúng tôi qua các lựa chọn bên dưới. Chúng tôi sẽ xác nhận tất cả các chi tiết cần thiết. Hoặc, bạn có thể điền vào biểu mẫu trong mục Bảng Giá ở trên và nhấp vào 'Đặt Tour Ngay'. Đơn đặt hàng của bạn sẽ được gửi đến chúng tôi và chúng tôi sẽ liên hệ lại để biết thêm thông tin—hiện tại chưa có chi phí nào được áp dụng. Hãy yên tâm, thông tin của bạn được bảo mật an toàn với chúng tôi." ?>
            </p>

            <div class="max-w-5xl py-12">
                <div class="relative flex justify-between items-start pt-6">
                    <div class="absolute top-1/2 left-0 w-[70%] h-1 bg-[#F9BB32] transform -translate-y-1/2"></div>

                    <div class="flex-1 relative z-10">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-[#F9BB32] text-white shadow-xl">
                            <img width="24" height="24" src="<?php echo esc_url($icons['emoji']); ?>" alt="Emoji Icon" />
                        </div>

                        <div class="mt-4 w-fit">
                            <p class="text-sm "><?php echo $current_lang === 'en' ? "Contact us" : "Liên hệ" ?></p>
                        </div>
                    </div>

                    <div class="flex-1 relative z-10">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-[#F9BB32] text-white shadow-xl">
                            <img width="24" height="24" src="<?php echo esc_url($icons['receipt']); ?>" alt="Receipt Icon" />
                        </div>

                        <div class="mt-4 w-fit">
                            <p class="text-sm "><?php echo $current_lang === 'en' ? "Tour confirmation" : "Xác nhận tour" ?></p>
                        </div>
                    </div>

                    <div class="flex-1 relative z-10">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-[#F9BB32] text-white shadow-xl">
                            <img width="24" height="24" src="<?php echo esc_url($icons['payment']); ?>" alt="Payment Icon" />
                        </div>

                        <div class="mt-4 w-fit">
                            <p class="text-sm "><?php echo $current_lang === 'en' ? "D-Day! Pay on arrival!" : "Tới ngày là đi! Đến nơi mới trả tiền!" ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-xl font-bold mb-2"><?php echo $current_lang === 'en' ? "Contact us now" : "Liên hệ với chúng tôi ngay" ?></h2>
            <p class="mb-4"><?php echo $current_lang === 'en' ? "Click the link or scan the QR code below" : "Bấm vào dường link hoặc quét mã QR bên dưới" ?></p>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="block">
                    <div class="flex items-center gap-4 mb-4">
                        <img width="48" height="48" src="<?php echo esc_url($icons['whatsapp']); ?>" alt="Whatsapp Icon" />
                        <div class="text-sm text-gray-600">
                            <p class="">WhatsApp</p>
                            <a href="https://wa.me/84936766696" target="_blank" class="hover:underline">+84 936766696</a>
                        </div>
                    </div>
                    <?php if (isset($qrs['instagram_qr'])) : ?>
                        <img
                            width="240"
                            height="240"
                            src="<?php echo esc_url($qrs['whatsapp_qr']); ?>"
                            alt="whatsapp QR" />
                    <?php endif; ?>
                </div>

                <div class="block">
                    <div class="flex items-center gap-4 mb-4">
                        <img width="48" height="48" src="<?php echo esc_url($icons['instagram']); ?>" alt="Instagram Icon" />
                        <div class="text-sm text-gray-600">
                            <p class="">Instagram</p>
                            <a href="https://www.instagram.com/mr_hi_hi_04" target="_blank" class="hover:underline">@mr_hi_hi_04</a>
                        </div>
                    </div>
                    <?php if (isset($qrs['instagram_qr'])) : ?>
                        <img
                            width="240"
                            height="240"
                            src="<?php echo esc_url($qrs['instagram_qr']); ?>"
                            alt="Instagram QR" />
                    <?php endif; ?>
                </div>

                <div class="block">
                    <div class="flex items-center gap-4 mb-4">
                        <img width="48" height="48" src="<?php echo esc_url($icons['facebook']); ?>" alt="Facebook Icon" />
                        <div class="text-sm text-gray-600">
                            <p class="">Facebook</p>
                            <a href="https://www.facebook.com/ps.r.sau" target="_blank" class="hover:underline">www.facebook.com/ps.r.sau</a>
                        </div>
                    </div>
                    <?php if (isset($qrs['facebook_qr'])) : ?>
                        <img width="240" height="240" src="<?php echo esc_url($qrs['facebook_qr']); ?>" alt="Facebook QR" />
                    <?php endif; ?>
                </div>
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

<?php get_footer(); ?>