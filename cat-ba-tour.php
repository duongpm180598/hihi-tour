<?php
/*
Template Name: Cat Ba Tour
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php
$current_lang = pll_current_language('slug');
$t = load_lang();

$theme_uri = get_template_directory_uri();

$locations = [
    'catba' => ['display' => $current_lang === 'en' ? 'Cat Ba' : 'Cát Bà', 'api_query' => 'latitude=20.7304&longitude=107.0480&current=temperature_2m,relative_humidity_2m'],
];
$icon_root_path = $theme_uri . '/assets/icons/';

// Danh sách ảnh cho phần Image Grid (số từ 1 đến 4)
$image_grid_count = 2;

$image_grid_indices = [1, 2, 3];

// price
$radio_options = [
    '1' => 'Hire easy drivers',
    '2' => 'CheckDrive on my own',
    '3' => 'Limousine car',
];
$selected_option = '1';

// how to book us
$icons = [
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
        'q' => 'faq_q_age_catba',
        'a' => 'faq_a_age_catba',
    ],
    [
        'q' => 'faq_q_seasick',
        'a' => 'faq_a_seasick',
    ],

    [
        'q' => 'faq_q_tip',
        'a' => 'faq_a_tip',
    ],
];

$tableOfContents = [
    [
        'id' => 'overview',
        'title' => $t['toc_overview'] ?? 'Tổng quan'
    ],
    [
        'id' => 'gallery',
        'title' => $t['toc_gallery'] ?? 'Thư viện ảnh'
    ],
    [
        'id' => 'activities',
        'title' => $t['toc_activities'] ?? 'Các hoạt động',
    ],
    [
        'id' => 'weather',
        'title' => $t['toc_weather'] ?? 'Thời tiết'
    ],
    [
        'id' => 'accomodations',
        'title' => $t['toc_accomodations'] ?? 'Chỗ ở'
    ],
    [
        'id' => 'life-in-cat-ba',
        'title' => $t['toc_life_in_cat_ba'] ?? 'Cuộc sống ở Cát Bà'
    ],
    [
        'id' => 'how-to-book',
        'title' => $t['toc_how_to_book'] ?? 'Cách đặt tour'
    ],
    [
        'id' => 'faqs',
        'title' => $t['toc_faqs'] ?? 'FAQs'
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

    <section class="pt-20 pb-16 bg-[#FAF9F7]" id="overview">
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="absolute inset-x-0 md:-bottom-8 rounded-2xl sm:h-96 xl:h-76 bg-[#E5F0FF] z-0"></div>
            <div class="relative grid grid-cols-1 lg:grid-cols-12 gap-8 z-10">
                <div class="lg:col-span-8" data-aos="fade-up" data-aos-duration="1000">
                    <h3 class="text-2xl mb-3 uppercase font-phudu font-bold">
                        <?php echo $current_lang === 'en' ? "the beautiful island" : "hòn đảo xinh đẹp" ?>
                    </h3>
                    <h1 class="text-4xl md:text-6xl font-bold mb-16 font-delta-gothic text-[#0066FF]">
                        <?php echo $current_lang === 'en' ? "Cat Ba" : "Cát Bà" ?>
                    </h1>
                    <p class="mb-3 max-w-3xl">
                        <?php echo $current_lang === 'en' ? "Cat Ba is a perfect blend of the majestic grandeur of limestone mountains and the gentle tranquility of the sea. Recognized by UNESCO as a World Biosphere Reserve, Cat Ba features not only stunning beaches but also the Cat Ba National Park with its rich tropical forest ecosystem." : "Cát Bà là sự kết hợp hoàn hảo giữa vẻ hùng vĩ của những dãy núi đá vôi và sự bình yên dịu dàng của biển cả. Được UNESCO công nhận là Khu dự trữ sinh quyển thế giới, Cát Bà không chỉ sở hữu những bãi biển tuyệt đẹp mà còn có Vườn quốc gia Cát Bà với hệ sinh thái rừng nhiệt đới phong phú." ?>
                    </p>
                    <p>
                        <?php echo $current_lang === 'en' ? "Visitors to Cat Ba will have the opportunity to explore the peaceful Lan Ha Bay, where lush, green limestone islands rise above the emerald waters. Activities such as kayaking through small caves, swimming at pristine white-sand beaches, and savoring fresh seafood are experiences not to be missed." : "Du khách đến với Cát Bà sẽ có cơ hội khám phá vịnh Lan Hạ yên bình, nơi những hòn đảo đá vôi xanh mướt mọc lên giữa làn nước màu ngọc lục bảo. Những hoạt động như chèo thuyền kayak xuyên qua các hang nhỏ, bơi lội tại những bãi cát trắng nguyên sơ và thưởng thức hải sản tươi sống là những trải nghiệm không thể bỏ qua." ?>
                    </p>
                    <p>
                        <?php echo $current_lang === 'en' ? "Cat Ba offers an ideal setting for a retreat: lively enough in the central area but maintaining an untouched serenity and freshness in the bay regions. This destination promises a completely relaxing holiday, ensuring you fully recharge amidst nature." : "Cát Bà mang đến một không gian nghỉ dưỡng lý tưởng khi vừa đủ sôi động ở khu vực trung tâm, vừa giữ được sự tĩnh lặng và trong lành thuần khiết tại các vùng vịnh. Điểm đến này hứa hẹn một kỳ nghỉ thư giãn hoàn toàn, giúp bạn nạp lại năng lượng giữa thiên nhiên đại ngàn." ?>
                    </p>
                </div>

                <div class="lg:col-span-4" data-aos="fade-up" data-aos-duration="1000">
                    <img src="<?php echo $theme_uri . '/assets/images/cat-ba/banner.png' ?>" alt="banner" />
                </div>
            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="pt-16" id="gallery" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-3"><?php echo $current_lang === 'en' ? 'Cat Ba gallery' : 'Hình ảnh Cát Bà' ?></h2>
            <span><?php echo $current_lang === 'en' ? "Admire the natural beauty of Cat Ba Island" : "Chiêm ngưỡng vẻ đẹp của đảo Cát Bà" ?></span>

            <div class="grid grid-cols-1 grid-rows-1 md:grid-cols-3 md:grid-rows-2 mt-8 gap-8 w-full">
                <div
                    class="col-span-1 row-span-1">
                    <img class="w-full rounded-2xl" style="max-height: 340px" data-src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_1.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_1.png') ?>" alt="gallery-1" />
                </div>

                <div
                    class="col-span-2 row-span-1">
                    <img class="w-full rounded-2xl" style="max-height: 340px" style="max-height: 340px" data-src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_2.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_2.png') ?>" alt="gallery-2" />
                </div>

                <div
                    class="col-span-1 row-span-1">
                    <img class="w-full rounded-2xl" style="max-height: 340px" data-src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_3.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_3.png') ?>" alt="gallery-3" />
                </div>

                <div
                    class="col-span-1 row-span-1">
                    <img class="w-full rounded-2xl" style="max-height: 340px" data-src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_4.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_4.png') ?>" alt="gallery-4" />
                </div>

                <div
                    class="col-span-1 row-span-1">
                    <img class="w-full rounded-2xl" style="max-height: 340px" data-src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_5.png') ?>" src="<?php echo ($theme_uri . '/assets/images/cat-ba/gallery_5.png') ?>" alt="gallery-5" />
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
                            <?php echo $current_lang === 'en' ? "How you get to Cat Ba Island" : "Di chuyển đến đảo Cát Bà" ?>
                        </h2>
                        <p>
                            <?php echo $current_lang === 'en' ? "Cat Ba is located approximately 150km east of Hanoi, requiring only about 3 hours of travel time on a relatively short and straightforward route. To reach Cat Ba, you will travel by car to the ferry terminal, and then take a ferry or high-speed boat to the island, a short journey that takes just 10 to 30 minutes, depending on the vessel type." : "Cát Bà nằm cách Hà Nội khoảng 150km về phía Đông với thời gian di chuyển chỉ mất tầm 3 tiếng trên một cung đường khá ngắn và thuận tiện. Để đến được Cát Bà, bạn sẽ đi ô tô đến bến phà rồi tiếp tục lên phà hoặc tàu cao tốc để ra đảo với hành trình ngắn chỉ kéo dài từ 10 đến 30 phút tùy thuộc vào loại phương tiện." ?>
                        </p>
                        <p>
                            <?php echo $current_lang === 'en' ? "With Hi Hi Tour, we <strong>cover all transportation costs</strong> for your convenience: this includes the round-trip bus transfer (Hanoi–Cat Ba), the high-speed boat ticket to the island, and the shuttle service from the ferry terminal directly to your homestay." : "Khi đồng hành cùng Hi Hi Tour, chúng mình đã bao gồm toàn bộ chi phí vận chuyển để bạn có một chuyến đi thuận tiện nhất. Chi phí này đã bao gồm xe đưa đón hai chiều giữa Hà Nội và Cát Bà, vé tàu cao tốc ra đảo cũng như dịch vụ xe trung chuyển từ bến tàu về thẳng homestay của bạn." ?>
                        </p>
                    </div>

                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/cat-ba/how_to_get_to_cat_ba.png' ?>"
                            alt="ship"
                            class="w-full object-cover transform transition-transform duration-300 group-hover:scale-105 rounded-2xl" />
                        <p class="text-center text-[#74797A] text-sm my-2">
                            <?php echo $current_lang === 'en' ? "The image is for illustrative purpose only" : "Ảnh mang tính chất minh họa" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Activities -->
        <section class="pt-8" id="activities">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
                <h2 class="text-center text-3xl font-bold mb-8">
                    <?php echo $current_lang === 'en' ? "Main activities in Cat Ba" : "Làm gì ở Cát Bà?" ?>
                </h2>
                <p>
                    <?php echo $current_lang === 'en' ? "Cat Ba is truly unique, featuring the sea, forest, and mountains all on a single island. This provides for a wide array of diverse activities, and since the island is not overly large, you can easily experience them all." : "Cát Bà thực sự độc đáo khi hội tụ cả biển, rừng và núi non trên cùng một hòn đảo. Điều này mang đến một danh sách các hoạt động vô cùng đa dạng và vì diện tích đảo không quá lớn nên bạn có thể dễ dàng trải nghiệm tất cả những điều thú vị tại đây." ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "Perhaps the most famous activity is cruising the bay (available as a day trip or an overnight experience), where you can admire the signature clear blue waters, enjoy swimming in the tranquil bay, kayak around the coves, and visit small hidden beaches." : "Có lẽ hoạt động nổi tiếng nhất là đi du thuyền tham quan vịnh với các lựa chọn đi trong ngày hoặc nghỉ đêm trên tàu. Bạn sẽ được chiêm ngưỡng làn nước xanh trong đặc trưng, thoải mái bơi lội giữa vùng vịnh yên tĩnh, chèo thuyền kayak quanh các eo biển và ghé thăm những bãi tắm nhỏ ẩn mình giữa thiên nhiên." ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "Heading toward the Cat Ba National Park, you'll encounter 'cat-ear' limestone mountains, much like those found in Cat Ba. Here, you can explore the National Park itself or try several short trekking tours led by local guides." : "Khi đi về phía Vườn quốc gia Cát Bà, bạn sẽ bắt gặp những dãy núi đá vôi \"tai mèo\" nhấp nhô khá giống với cảnh sắc ở Hà Giang. Tại đây, bạn có thể tự mình khám phá Vườn quốc gia hoặc tham gia các tour đi bộ trekking ngắn ngày dưới sự hướng dẫn của các hướng dẫn viên địa phương." ?>
                </p>

                <div class="container mx-auto pt-8">
                    <div
                        id="target-bg"
                        class="h-80 md:h-[540px] bg-cover bg-center rounded-4xl transition-opacity duration-500"></div>
                    <div class="flex justify-center items-center">
                        <div
                            class="flex space-x-2 bg-[#F2F2F0] rounded-4xl w-fit p-2 transform -translate-y-6">
                            <button
                                class="action-button font-bold bg-[#CEE2FF] rounded-3xl p-3"
                                data-image-url="<?php echo ($theme_uri . '/assets/images/cat-ba/action_1.png') ?>">
                                <?php echo $current_lang === 'en' ? 'Cruise' : 'Du thuyền' ?>
                            </button>
                            <button
                                class="action-button rounded-3xl py-3 px-4"
                                data-image-url="<?php echo ($theme_uri . '/assets/images/cat-ba/action_2.png') ?>">
                                <?php echo $current_lang === 'en' ? 'Kayak' : 'Chèo Kayak' ?>
                            </button>
                            <button
                                class="action-button rounded-3xl py-3 px-4"
                                data-image-url="<?php echo ($theme_uri . '/assets/images/cat-ba/action_3.png') ?>">
                                <?php echo $current_lang === 'en' ? 'Strolling around the island' : 'Tản mạn quanh đảo' ?>
                            </button>
                            <button
                                class="action-button rounded-3xl py-3 px-4"
                                data-image-url="<?php echo ($theme_uri . '/assets/images/cat-ba/action_4.png') ?>">
                                <?php echo $current_lang === 'en' ? 'Short trekking' : 'Trekking ngắn' ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-8 md:py-16" id="accomodations">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="overflow-hidden group">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/cat-ba/spend_the_night.png' ?>"
                            alt="Cat Ba hotel"
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
                        Throughout your journey, you will always be provided with private accommodation in all homestays and hotels. This ensures you have a cozy, comfortable, and quiet space to relax." : "Bạn sẽ có phòng riêng!<br />Trong suốt hành trình, chúng tôi sẽ đặt phòng riêng tại tất cả các khách sạn, homestay mà bạn nghỉ tại. Đảm bảo cho bạn không gian riêng tư, thoải mái sau hành trình" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Weather -->
    <section class="py-16 bg-linear-to-b from-[#CEE2FF] to-[#FAF9F7] h-full" id="weather" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <?php echo $current_lang === 'en' ? "Weather in Cat Ba" : "Thời tiết ở Cát Bà" ?>

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
                    <?php echo $current_lang === 'en' ? "When is the best to visit Cat Ba?" : "Nên đi Cát Bà mùa nào?" ?>
                </h5>
                <p class="">
                    <?php echo $current_lang === 'en' ? "The high tourism season in Cat Ba runs from <strong>late April through the end of October</strong>, with the peak period typically falling between mid-May and July. During this time, temperatures hover around 30°C to 35°C. The sun warms the beaches, but the sea air remains wonderfully cool and refreshing, making it perfect for swimming and water activities. A quick note: We advise guests to check the weather forecast frequently between July and September, as this period has the highest potential for tropical storms." : "Mùa du lịch cao điểm tại Cát Bà bắt đầu từ cuối tháng 4 cho đến hết tháng 10 với giai đoạn đông khách nhất thường rơi vào khoảng giữa tháng 5 đến tháng 7. Trong thời gian này, nhiệt độ dao động trong khoảng từ 30°C đến 35°C. Nắng ấm bao phủ các bãi biển nhưng không khí biển vẫn luôn mát mẻ và sảng khoái, rất lý tưởng cho việc bơi lội cũng như các hoạt động dưới nước. Một lưu ý nhỏ là chúng mình khuyên du khách nên theo dõi dự báo thời tiết thường xuyên từ tháng 7 đến tháng 9 vì đây là khoảng thời gian dễ có bão nhất." ?>
                </p>
                <p>
                    <?php echo $current_lang === 'en' ? "Conversely, from November through March (Winter/Spring), Cat Ba becomes remarkably quiet and tranquil. With cooler, brisk weather, this is the ideal time to fully embrace the island’s serenity, explore its pristine nature, and enjoy an escape from the busy summer crowds." : "Ngược lại, từ tháng 11 đến tháng 3 năm sau là mùa đông và mùa xuân, lúc này Cát Bà trở nên đặc biệt yên tĩnh và thanh bình. Với thời tiết se lạnh và trong lành, đây là thời điểm lý tưởng để tận hưởng trọn vẹn sự tĩnh lặng của hòn đảo, khám phá thiên nhiên nguyên sơ và tận hưởng một kỳ nghỉ tách biệt khỏi sự đông đúc của mùa hè." ?>
                </p>
            </div>

            <div class="grid grid-cols-2 gap-3 mt-8">
                <?php for ($i = 1; $i <= $image_grid_count; $i++) : ?>
                    <div class="w-full overflow-hidden">
                        <img
                            data-src="<?php echo esc_url($theme_uri . "/assets/images/cat-ba/weather_{$i}.png"); ?>"
                            src="<?php echo esc_url($theme_uri . "/assets/images/cat-ba/weather_{$i}.png"); ?>"
                            alt="Weather in Cat Ba <?php echo $i; ?>"
                            class="w-full object-cover" />
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Life in Cat Ba -->
    <section class="pt-16" id="life-in-cat-ba" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-[#101F23]">
            <h2 class="text-3xl font-bold mb-8">
                <?php echo $current_lang === 'en' ? "Life in Cat Ba island" : "Cuộc sống trên đảo Cát Bà" ?>
            </h2>

            <p class="font-bold mb-4">
                <?php echo $current_lang === 'en' ? "Chaos or peaceful?" : "Nhộn nhịp hay bình yên?" ?>
            </p>

            <p>
                <?php echo $current_lang === 'en' ? "In the central town, life revolves heavily around tourism, especially during the high season. You’ll find a bustling, energetic atmosphere with restaurants, hotels, and markets catering to visitors, giving the town a lively, commercial pulse." : "Tại thị trấn trung tâm, nhịp sống xoay quanh hoạt động du lịch và điều này thể hiện rõ nét nhất trong mùa cao điểm. Bạn sẽ cảm nhận được bầu không khí sôi động, tràn đầy năng lượng với các nhà hàng, khách sạn và khu chợ luôn tấp nập khách ghé thăm, tạo nên một nhịp sống thương mại nhộn nhịp." ?>
            </p>
            <p class="mb-4">
                <?php echo $current_lang === 'en' ? "However, once you venture beyond the main hub towards the fishing villages or the National Park, the pace shifts dramatically. Life here is much more relaxed and centered on the sea and nature. Locals primarily work in fishing, aquaculture (fish farming in the bay), or within the tourism sector. The daily rhythm is often influenced by the tides and the tourist calendar" : "Tuy nhiên, khi bạn rời xa khu vực trung tâm để tiến về phía các làng chài hoặc Vườn quốc gia, nhịp sống sẽ thay đổi một cách đáng kể. Cuộc sống ở đây thư thái hơn nhiều khi mọi hoạt động đều tập trung vào biển cả và thiên nhiên. Người dân địa phương chủ yếu làm nghề đánh bắt, nuôi trồng thủy sản trên vịnh hoặc tham gia vào các dịch vụ du lịch" ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">

                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/cat-ba/life_in_cat_ba_1.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/cat-ba/life_in_cat_ba_1.png'); ?>"
                    alt="Cultural Aspect 1"
                    class="w-full h-full object-cover" />
                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/cat-ba/life_in_cat_ba_2.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/cat-ba/life_in_cat_ba_2.png'); ?>"
                    alt="Cultural Aspect 2"
                    class="w-full h-full object-cover" />
                <img
                    data-src="<?php echo esc_url($theme_uri . '/assets/images/cat-ba/life_in_cat_ba_3.png'); ?>"
                    src="<?php echo esc_url($theme_uri . '/assets/images/cat-ba/life_in_cat_ba_3.png'); ?>"
                    alt="Cultural Aspect 1"
                    class="w-full h-full object-cover" />
            </div>
        </div>
    </section>

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
                <a href="<?php echo esc_url(get_translated_permalink_by_slug('ha-giang')); ?>" class="group block">
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

                <!-- Cao Bang -->
                <a href="<?php echo esc_url(get_translated_permalink_by_slug('cao-bang')); ?>" class="group block">
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

                <!-- Mu Cang Chai (coming soon) -->
                <a href="#" class="group block opacity-70 cursor-not-allowed">
                    <div class="overflow-hidden rounded-xl mb-3" style="aspect-ratio:4/3;">
                        <img
                            src="<?php echo esc_url($theme_uri . '/assets/images/mu-cang-chai/mu_cang_chai3.webp'); ?>"
                            alt="Mu Cang Chai"
                            class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105" />
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
