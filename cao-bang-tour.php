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

// itinerary
$plan_options = [
    '3' => $current_lang === 'en' ? '3 days 2 nights' : '3 ngày 2 đêm',
    '2' => $current_lang === 'en' ? '2 days 1 night' : '2 ngày 1 đêm',
];
$default_plan = '3';
$default_days_count = intval($default_plan);
$default_days = range(0, $default_days_count);
$timeline_day_0 = $default_itinerary[0] ?? [];

$locations = [
    'caobang' => ['display' => $current_lang === 'en' ? 'Cao Bang City' : 'TP.Cao Bằng', 'api_query' => 'latitude=22.6825&longitude=106.2735&current=temperature_2m,relative_humidity_2m'],
    'bangioc' => ['display' => $current_lang === 'en' ? 'Ban Gioc Waterfall' : 'Thác Bản Giốc', 'api_query' => 'latitude=22.8509&longitude=106.7184&current=temperature_2m,relative_humidity_2m'],
    'lenin'  => ['display' => $current_lang === 'en' ? 'Lenin Stream' : 'Suối Lenin', 'api_query' => 'latitude=22.9584&longitude=106.0455&current=temperature_2m,relative_humidity_2m'],
];
$icon_root_path = $theme_uri . '/assets/icons/';

// Danh sách ảnh cho phần Image Grid (số từ 1 đến 4)
$image_grid_count = 3;

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
    [
        'q' => 'faq_q_age_caobang',
        'a' => 'faq_a_age_caobang',
    ],
    [
        'q' => 'faq_q_challenge_caobang',
        'a' => 'faq_a_challenge_caobang',
    ],
    [
        'q' => 'faq_q_diff_hagiang',
        'a' => 'faq_a_diff_hagiang',
    ],
    [
        'q' => 'faq_q_packing_caobang',
        'a' => 'faq_a_packing_caobang',
    ],
    [
        'q' => 'faq_q_cancel',
        'a' => 'faq_a_cancel',
    ],
    [
        'q' => 'faq_q_tip',
        'a' => 'faq_a_tip',
    ],
];

$tableOfContents = [
    [
        'id' => 'overview',
        'title' => $current_lang === 'en' ? 'Overview' : 'Tổng quan',
    ],
    [
        'id' => 'itinerary',
        'title' => $current_lang === 'en' ? 'Itinerary' : 'Lịch trình',
    ],
    [
        'id' => 'gallery',
        'title' => $current_lang === 'en' ? 'Gallery' : 'Thư viện ảnh',
    ],
    [
        'id' => 'transportation',
        'title' => $current_lang === 'en' ? 'Transportation' : 'Phương tiện đi lại',
    ],
    [
        'id' => 'accomodations',
        'title' => $current_lang === 'en' ? 'Accomodations' : 'Chỗ ở',
    ],
    [
        'id' => 'weather',
        'title' => $current_lang === 'en' ? 'Weather' : 'Thời tiết',
    ],
    [
        'id' => 'activities',
        'title' => $current_lang === 'en' ? 'Activities' : 'Các hoạt động',
    ],
    [
        'id' => 'how-to-book',
        'title' => $current_lang === 'en' ? 'How to book' : 'Cách đặt tour',
    ],
    [
        'id' => 'faqs',
        'title' => 'FAQs',
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
    <section class="container mx-auto pt-16" id="overview" data-aos="fade-up" data-aos-duration="1000">
        <div class="text-center mb-16">
            <h3 class="text-2xl mb-3 font-delta-gothic text-[#48B190]"><?php echo $current_lang === 'en' ? "The serene" : "Non nước" ?></h3>
            <h1 class="text-4xl md:text-6xl font-bold mb-4 font-delta-gothic text-[#48B190]">
                <?php echo $current_lang === 'en' ? "Cao Bang" : "Cao Bằng" ?>
            </h1>
        </div>
        <div class="grid grid-cols-3 gap-8">
            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_1']); ?>"
                    src="<?php echo esc_url($banner_images['banner_1']); ?>"
                    alt="Banner 1"
                    class="w-full h-full object-cover cursor-pointer rounded-lg shadow-md" />
            </div>

            <div class="col-span-1 row-span-2">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_3']); ?>"
                    src="<?php echo esc_url($banner_images['banner_3']); ?>"
                    alt="Banner 3"
                    class="w-full h-full object-cover cursor-pointer rounded-lg shadow-md" />
            </div>

            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_2']); ?>"
                    src="<?php echo esc_url($banner_images['banner_2']); ?>"
                    alt="Banner 2"
                    class="w-full h-full object-cover cursor-pointer rounded-lg shadow-md" />
            </div>

            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_4']); ?>"
                    src="<?php echo esc_url($banner_images['banner_4']); ?>"
                    alt="Banner 4"
                    class="w-full h-full object-cover cursor-pointer rounded-lg shadow-md" />
            </div>

            <div class="col-span-1 row-span-1 max-h-96">
                <img
                    data-src="<?php echo esc_url($banner_images['banner_5']); ?>"
                    src="<?php echo esc_url($banner_images['banner_5']); ?>"
                    alt="Banner 5"
                    class="w-full h-full object-cover cursor-pointer rounded-lg shadow-md" />
            </div>
        </div>
        <div class="max-w-4xl mt-8 mx-auto">
            <p>
                <?php echo $current_lang === 'en' ? "Cao Bằng is located in Northeast Vietnam. It is known for its beautiful scenery and its important role in the country's history. The name 'Cao Bằng' describes its unique geography: high mountains ('Cao') combined with flat valleys ('Bằng'), creating a landscape of grasslands and rivers between the hills." : "Cao Bằng nằm ở vùng núi Đông Bắc Việt Nam, không chỉ nổi tiếng bởi cảnh sắc nên thơ mà còn là mảnh đất lịch sử hào hùng. Cao Bằng có địa thế \"cao\" mà lại \"bằng\" nên có hệ thống thảo nguyên, sông suối xen giữa thung lũng, núi đồi." ?>
            </p>
            <p>
                <?php echo $current_lang === 'en' ? "Hi Hi Tour has been operating in Cao Bằng since 2018, always maintaining a spirit of true exploration. Hi Hi will take you to pristine, lesser-known locations alongside the region's famous landmarks, ensuring you experience Cao Bằng's untouched beauty" : "Hi Hi Tour hoạt động tại Cao Bằng từ năm 2018 với tinh thần khám phá thực thụ. Hi Hi sẽ đưa bạn đến cả những danh thắng nổi tiếng lẫn những địa điểm hoang sơ ít người biết tới, giúp bạn trải nghiệm trọn vẹn vẻ đẹp nguyên bản của Cao Bằng." ?>
            </p>
        </div>
    </section>

    <!-- Itinerary -->
    <section class="pt-16" id="itinerary" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-8">
                <?php echo $current_lang === 'en' ? "Our Cao Bang Itinerary" : "Lịch trình Cao Bằng" ?>
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
                                ? 'bg-black text-white'
                                : 'bg-white text-gray-800 border border-gray-300 hover:bg-gray-50';
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
                            <li class="w-full bg-[#DCF5ED] flex-1 <?php echo $border_top_left;
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
                                <?php echo $current_lang === 'en' ? 'If you have ever been to Cao Bang before, we will go different routes every time you return. Also you can always discuss for special request!' : 'Nếu bạn đã từng tới Cao Bang, chúng tôi sẽ tư vấn các lịch trình khác nhau mỗi lần bạn quay lại. Bên cạnh đó, bạn cũng có thể trao đổi với chúng tôi về bất cứ yêu cầu đặc biệt nào.' ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <div class="bg-[#DCF5ED] p-6 rounded-xl">
                        <h2 class="text-2xl font-bold mb-4"><span id="price-per-plan"></span></h2>
                        <p class="mb-4"><?php echo $current_lang === 'en' ? "Per adult" : "một người lớn" ?></p>
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
                                <?php echo $current_lang === 'en' ? 'Round-trip sleeper bus ticket: Ha Noi - Cao Bang' : 'Vé xe khứ hồi Hà Nội - Cao Bằng' ?>
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
                            <button class="cursor-pointer w-full py-3 bg-black text-white font-semibold rounded-lg hover:opacity-70 transition">
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
    <section class="pt-16" id="gallery" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 grid-rows-3 gap-8">
                <div
                    class="col-span-1 row-span-2">
                    <img data-src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_1.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_1.png') ?>" alt="gallery-1" />
                </div>

                <div
                    class="col-span-1 row-span-1">
                    <img data-src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_2.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_2.png') ?>" alt="gallery-2" />
                </div>

                <div
                    class="col-span-1 row-span-2">
                    <img data-src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_3.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_3.png') ?>" alt="gallery-3" />
                </div>

                <div
                    class="col-span-1 row-span-2">
                    <img data-src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_5.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_5.png') ?>" alt="gallery-4" />
                </div>

                <div
                    class="col-span-1 row-span-1">
                    <img data-src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_4.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_4.png') ?>" alt="gallery-5" />
                </div>
                <div
                    class="col-span-1 row-span-1">
                    <img data-src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_6.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cao-bang/gallery_6.png') ?>" alt="gallery-6" />
                </div>
            </div>
        </div>
    </section>

    <!-- Accommodation -->
    <div class="pt-16" id="transportation" data-aos="fade-up" data-aos-duration="1000">
        <section class="mb-8 md:mb-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                    <div class="relative">
                        <h2 class="text-3xl font-bold mb-4 ">
                            <?php echo $current_lang === 'en' ? "How you get to Cao Bang city center" : "Di chuyển ở Cao Bằng" ?>
                        </h2>
                        <p>
                            <?php echo $current_lang === 'en' ? "It takes around 7 - 8 hours to travel from Ha Noi to Cao Bang city center by car, so typically people choose night sleep bus and arrive by next morning." : "Phải mất khoảng 7 - 8 giờ để di chuyển từ Hà Nội đến trung tâm thành phố Cao Bằng bằng ô tô, vì vậy mọi người thường chọn xe buýt giường nằm đi đêm và đến nơi vào sáng hôm sau." ?>
                        </p>
                        <p>
                            <?php echo $current_lang === 'en' ? "Our tour provides round-trip bus ticket. You will travel on <strong>VIP sleep bus</strong>, we assure everyone get separate bed on the bus (absolutely no sharing with stranger!)." : "Tour của chúng tôi cung cấp vé xe buýt khứ hồi. Bạn sẽ di chuyển bằng <strong>xe buýt giường nằm VIP</strong>, chúng tôi đảm bảo mọi người đều có giường riêng trên xe (tuyệt đối không nằm chung với người lạ!)." ?>
                        </p>
                        <p>
                            <?php echo $current_lang === 'en' ? "Note that child under 12 must accompany by adult on the bus." : "Lưu ý rằng trẻ em dưới 12 tuổi phải đi cùng người lớn trên xe buýt." ?>
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

        <section class="mb-8 md:mb-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
                <h2 class="text-3xl font-bold mb-4 ">
                    <?php echo $current_lang === 'en' ? "How you will travel around Cao Bang" : "Du lịch vòng quanh Cao Bằng như thế nào" ?>
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
                            <div class="flex gap-2 my-3 bg-[#FEEAC0] px-3 py-1 rounded items-center w-fit">
                                <img width="24" height="24" src="<?php echo esc_url($icons['bike']); ?>" alt="Bike" />
                                <span class="text-fg-brand-strong text-xs font-medium">
                                    <?php echo $current_lang === 'en' ? "Unique experience" : "Trải nghiệm nên có" ?>
                                </span>
                            </div>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? 'Most popular choice when you come to Cao Bang! Enjoy the mountain scenery around you is definitely one of the most special thing of Cao Bang Loop.' : 'Lựa chọn phổ biến nhất khi tới Cao Bang! Ngồi trên xe máy, bạn có thể tận hưởng trọn vẹn không khí và cảnh vật xung quanh.' ?>
                            </p>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? 'Hire easy drivers for easy trip, or you can choose to drive yourself if you have a valid license. Experience Cao Bang to the fullest!' : 'Bạn có thể thuê người lái cho chuyến đi nhàn hạ, hoặc tự lái nếu muốn.' ?>
                            </p>
                        </div>
                    </div>

                    <!-- Card 2: luxury car -->
                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/ha-giang/transportation-2.png' ?>"
                            alt="Hotel Cao Bang"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <div class="p-3">
                            <h3 class="text-xl font-bold mb-2"><?php echo $current_lang === 'en' ? "Luxury limousine" : "Bằng xe ô tô" ?></h3>
                            <div class="flex gap-3 my-3">
                                <div class="flex gap-2 bg-[#FEEAC0] px-3 py-1 rounded items-center w-fit">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['family']); ?>" alt="Family" />
                                    <span class="text-fg-brand-strong text-xs font-medium ">
                                        <?php echo $current_lang === 'en' ? "Family friendly" : "Phù hợp gia đình" ?>
                                    </span>
                                </div>
                                <div class="flex gap-2 bg-[#FEEAC0] px-3 py-1 rounded items-center w-fit">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['group']); ?>" alt="Group" />
                                    <span class="text-fg-brand-strong text-xs font-medium">
                                        <?php echo $current_lang === 'en' ? "Large group" : "Nhóm đông người" ?>
                                    </span>
                                </div>

                            </div>
                            <p class="text-sm">
                                <?php echo $current_lang === 'en' ? "Most chosen by family or large group! <br /> We provide a range of
                            options: vehicles with 9, 16, or 29 seats to fit your needs.
                            Feel free to select a car option whenever you like." : "Thường được chọn cho gia đình hoặc nhóm đông người!<br/>Chúng tôi có xe 9 - 16 - 29 chỗ tùy vào nhu cầu của bạn." ?>
                            </p>
                        </div>
                    </div>
                    <!-- Card 3: ... -->
                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/cao-bang/combine-travel.png' ?>"
                            alt="Combine travel"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <div class="p-3">
                            <h3 class="text-xl font-bold mb-2">
                                <?php echo $current_lang === 'en' ? "Or maybe a combination of both" : "Hoặc là cả 2" ?>
                            </h3>
                            <div class="flex gap-2 my-3 bg-[#FEEAC0] px-3 py-1 rounded items-center w-fit">
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
                        Throughout your journey, you will always be provided with private accommodation in all homestays and hotels. This ensures you have a cozy, comfortable, and quiet space to relax and fully recharge after a long day conquering the majestic routes of Cao Bang." : "Bạn sẽ có phòng riêng!<br />Trong suốt hành trình, chúng tôi sẽ đặt phòng riêng tại tất cả các khách sạn, homestay mà bạn nghỉ tại. Đảm bảo cho bạn không gian riêng tư, thoải mái sau hành trình dài." ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Weather -->
    <section class="py-16 bg-linear-to-b from-[#FEEAC0] to-[#FAF9F7] h-full" id="weather" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4"><?php echo $current_lang === 'en' ? "Weather in Cao Bang" : "Thời tiết ở Cao Bằng" ?></h2>

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

            <div class="py-3">
                <h5 class="mb-3">
                    <?php echo $current_lang === 'en' ? "When is the best to visit Cao Bang?" : "Nên đi Cao Bằng mùa nào?" ?>
                </h5>

                <p class="">
                    <?php echo $current_lang === 'en' ? "Cao Bằng has four relatively distinct seasons, and generally the weather is quite pleasant year-round." : "Cao Bằng có bốn mùa tương đối rõ rệt, và nhìn chung thời tiết khá dễ chịu quanh năm." ?>
                </p>

                <p class="">
                    <?php echo $current_lang === 'en' ? "Spring in Cao Bằng lasts from February to April, with average temperatures ranging from 15°C to 22°C. The weather in Cao Bằng province during this season is often cool, with little rain, gentle sun during the day, and cool at night. March in Cao Bằng is the season for the stunning, fiery red silk floss tree flowers (hoa gạo), where the leaves fall off, leaving only the bright red flowers like fire, contrasting with the lush green color of the mountains and forests." : "Mùa xuân kéo dài từ tháng 2 đến tháng 4 với nhiệt độ trung bình từ 15°C đến 22°C mang đến bầu không khí mát mẻ và ít mưa. Đây cũng là lúc những bông hoa gạo đỏ rực nở rộ giữa phông nền núi rừng xanh ngát, tạo nên sự đối lập đầy ấn tượng với sắc xanh của cây cỏ." ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "From May to July is summer, with an average temperature of approximately 23°C to 30°C. This is the rainy season, especially in June and July, where rain often lasts for a long time and sometimes brings thunderstorms. However, the scenery during this season is very lush and green, Ban Gioc Waterfall and the lakes are full, and the landscape becomes vibrant. If you choose this season, please monitor the weather frequently to avoid days with heavy rain!" : "Từ tháng 5 đến tháng 7 là mùa hè với nhiệt độ trung bình dao động từ 23°C đến 30°C. Mặc dù đây là mùa mưa với những cơn dông bất chợt nhưng bù lại cảnh sắc thiên nhiên rất xanh tươi, các hồ nước và thác Bản Giốc cũng ở thời điểm đầy nước và hùng vĩ nhất. Du khách nên theo dõi dự báo thời tiết thường xuyên trong giai đoạn này để tránh những ngày mưa lớn." ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "Autumn in Cao Bằng, from August to October, is considered the ideal time for tourism. The average temperature is around 18°C to 25°C; the weather is cool, with little rain, clear skies, and pleasant. At this time, golden ripened rice spreads across the valleys, the atmosphere is peaceful, and the majestic mountain scenery is adorned with the brilliant yellow color of the rice season." : "Mùa thu từ tháng 8 đến tháng 10 được coi là thời điểm lý tưởng nhất để du lịch vì tiết trời khô ráo, bầu trời trong xanh và khí hậu ôn hòa. Lúc này những cánh đồng lúa chín vàng trải dài khắp các thung lũng tạo nên khung cảnh vô cùng bình yên và thơ mộng." ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "Winter lasts from November to January, with an average temperature of 10°C to 18°C, sometimes dropping below 5°C on severely cold days. The weather in Cao Bằng is cold, sometimes with fog or frost/ice in the high mountain areas. Winter is suitable for tourists who want to experience quiet spaces, 'hunt' for clouds, and try the warm, typical mountainous hot dishes." : "Mùa đông kéo dài từ tháng 11 đến tháng 1 năm sau với nhiệt độ trung bình từ 10°C đến 18°C và có thể giảm xuống dưới 5°C trong những đợt rét đậm. Vùng núi cao đôi khi sẽ có sương mù hoặc băng giá, rất phù hợp cho những ai muốn trải nghiệm không gian yên tĩnh, đi săn mây và thưởng thức các món ăn vùng cao nóng hổi." ?>
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-8 overflow-x-auto">
                <?php for ($i = 1; $i <= $image_grid_count; $i++) : ?>
                    <div class="w-full overflow-hidden">
                        <img
                            data-src="<?php echo esc_url($theme_uri . "/assets/images/cao-bang/weather-{$i}.png"); ?>"
                            src="<?php echo esc_url($theme_uri . "/assets/images/cao-bang/weather-{$i}.png"); ?>"
                            alt="Weather in Cao Bang <?php echo $i; ?>"
                            class="w-full object-cover max-h-96 rounded-2xl" />
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Serene -->
    <section class="pt-16" id="activities" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
            <h2 class="text-center text-3xl font-bold mb-8">
                <?php echo $current_lang === 'en' ? "The serene Cao Bang" : "Non nước Cao Bằng" ?>
            </h2>
            <p>
                <?php echo $current_lang === 'en' ? "Cao Bằng is a truly exceptional destination, blessed with both dramatic, natural beauty and profound historical depth." : "Cao Bằng là một điểm đến thực sự đặc biệt khi được thiên nhiên ban tặng cả vẻ đẹp hùng vĩ lẫn chiều sâu lịch sử lâu đời." ?>
            </p>
            <p>
                <?php echo $current_lang === 'en' ? "For those seeking adventure, the region features spectacular mountain roads, including the famous 13-Story Pass (Đèo 13 Tầng)—a breathtaking sight that ignites the spirit of exploration as it winds down the mountainside. This 'Land of Water and Mountains' (non nước) is fed by an abundant system of pristine streams." : "Đối với những ai tìm kiếm sự phiêu lưu, vùng đất này sở hữu những cung đường núi ngoạn mục, tiêu biểu là đèo Khau Cốc Chà 15 tầng nổi tiếng. Đây là một cảnh tượng đầy kinh ngạc, khơi dậy tinh thần khám phá khi con đường uốn lượn men theo sườn núi dốc đứng." ?>
            </p>
            <p>
                <?php echo $current_lang === 'en' ? "A must-see is Lenin Stream, renowned for its mesmerizing, rare jade-blue water. Its natural beauty is matched only by its historical significance, as it famously served as a crucial revolutionary base where President Hồ Chí Minh once lived and worked. Prepare to be inspired by nature and history coexisting here." : "Vùng đất \"non nước\" này còn được nuôi dưỡng bởi hệ thống sông suối nguyên sơ phong phú. Một trong những điểm đến không thể bỏ qua là suối Lê-nin, nơi nổi tiếng với làn nước màu xanh ngọc bích hiếm có và đầy mê hoặc. Vẻ đẹp tự nhiên của dòng suối này càng trở nên đặc biệt hơn khi gắn liền với những giá trị lịch sử quan trọng, vì đây từng là căn cứ cách mạng chiến lược nơi Chủ tịch Hồ Chí Minh đã sống và làm việc. Bạn chắc chắn sẽ tìm thấy niềm cảm hứng khi chứng kiến sự hòa quyện tuyệt vời giữa thiên nhiên và lịch sử tại nơi này." ?>
            </p>

            <div class="container mx-auto pt-16">
                <div
                    id="target-bg"
                    class="h-80 md:h-[540px] bg-cover bg-center rounded-4xl transition-opacity duration-500"></div>
                <div class="flex justify-center items-center">
                    <div
                        class="flex space-x-2 bg-[#F2F2F0] rounded-4xl w-fit p-2 transform -translate-y-6">
                        <button
                            class="serene-button font-bold bg-[#A7E1CD] rounded-3xl p-3"
                            data-image-url="<?php echo ($theme_uri . '/assets/images/cao-bang/serene_1.png') ?>">
                            <?php echo $current_lang === 'en' ? 'The mountain passes' : 'Những con đèo' ?>
                        </button>
                        <button
                            class="serene-button rounded-3xl py-3 px-4"
                            data-image-url="<?php echo ($theme_uri . '/assets/images/cao-bang/serene_2.png') ?>">
                            <?php echo $current_lang === 'en' ? 'The streams' : 'Dòng suối' ?>
                        </button>
                        <button
                            class="serene-button rounded-3xl py-3 px-4"
                            data-image-url="<?php echo ($theme_uri . '/assets/images/cao-bang/serene_3.png') ?>">
                            <?php echo $current_lang === 'en' ? 'The valley' : 'Thung lũng' ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Price -->
    <!-- <section class="py-16 container mx-auto" id="pricing">
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
                                    <option>Cao Bang</option>
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
            <div class="bg-[#DCF5ED] p-6 rounded-xl">
                <h3 class="text-xl font-bold mb-3">Price for each person</h3>
                <p class="text-3xl font-bold mb-6">5,890,000 VND/pax</p>

                <?php
                // Sử dụng SVG inline hoặc icon font thay cho IoMdCheckmark/MdClose
                $check_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                $close_icon = '<svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                ?>

                <p class="text-base font-bold mb-2">Our price includes</p>
                <ul class="space-y-2 text-sm mb-6">
                    <li class="flex items-start"><?php echo $check_icon; ?>Round-trip sleeper bus ticket: Ha Noi - Cao Bang</li>
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

                <!-- Ha Giang -->
                <a href="<?php echo esc_url(get_translated_permalink_by_slug('ha-giang-tour')); ?>" class="group block">
                    <div class="overflow-hidden rounded-xl mb-3" style="aspect-ratio:4/3;">
                        <img
                            src="<?php echo esc_url($theme_uri . '/assets/images/ha_giang_loop.jpg'); ?>"
                            alt="Ha Giang"
                            class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105" />
                    </div>
                    <p class="font-bold text-base uppercase tracking-wide text-[#1D292C]">
                        <?php echo $current_lang === 'en' ? 'Ha Giang' : 'Hà Giang'; ?>
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

        // Hàm chính để khởi động:
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