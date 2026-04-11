<style>
    .history-border {
        margin-top: 64px;
        width: fit-content;
        flex-direction: column;
    }

    #btn-history-1,
    #btn-history-2 {
        width: 6px;
        height: 100%;
        max-height: 150px;
    }

    @media screen and (max-width: 996px) {

        .history-border {
            margin-top: 0;
            width: 100%;
            flex-direction: row;
        }

        #btn-history-1,
        #btn-history-2 {
            width: 100%;
            height: 6px;
        }
    }
</style>
<?php get_header() ?>

<?php
$current_lang = pll_current_language('slug');

$theme_uri = get_template_directory_uri();

$banner = $theme_uri . '/assets/images/banner.png';
$HaGiangLoop = $theme_uri . '/assets/images/ha_giang_loop.jpg';
$CaoBangTrip = $theme_uri . '/assets/images/cao_bang.jpg';
$CatBaIsland = $theme_uri . '/assets/images/cat_ba_island.jpg';
$shortTrip1 = $theme_uri . '/assets/images/short_trip_1.jpg';
$shortTrip2 = $theme_uri . '/assets/images/short_trip_2.jpg';
$shortTrip3 = $theme_uri . '/assets/images/short_trip_3.jpg';
$longTrip1 = $theme_uri . '/assets/images/long_trip_1.jpg';
$longTrip2 = $theme_uri . '/assets/images/long_trip_2.jpg';
$aboutUs = $theme_uri . '/assets/images/about_us.jpg';
$gallery1 = $theme_uri . '/assets/images/gallery_1.jpg';
$gallery2 = $theme_uri . '/assets/images/gallery_2.jpg';
$gallery3 = $theme_uri . '/assets/images/gallery_3.jpg';
$gallery4 = $theme_uri . '/assets/images/gallery_4.jpg';
$gallery5 = $theme_uri . '/assets/images/gallery_5.jpg';
$gallery6 = $theme_uri . '/assets/images/gallery_6.jpg';

$icon_helmet = $theme_uri . '/assets/icons/helmet.svg';
$icon_highfive = $theme_uri . '/assets/icons/highfive.svg';
$icon_plump = $theme_uri . '/assets/icons/plump.svg';
$icon_sun = $theme_uri . '/assets/icons/sun.svg';

// how to book us
$icons = [
    'bike'      => $theme_uri . '/assets/icons/bike.svg',
    'clock'     => $theme_uri . '/assets/icons/clock.svg',
    'bus'       => $theme_uri . '/assets/icons/bus.svg',
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

$faqs_data = [
    [
        'question' => $current_lang === 'en' ? 'Does Hi Hi tour have age limit?' : 'Tour Hi Hi có giới hạn độ tuổi không?',
        'answer' => $current_lang === 'en' ? 'For mountainous areas such as Ha Giang and Cao Bang, we kindly recommend for people under 75 and above 8. Though most destination can reach by bike or car, spending long hours on the road can be tiring.' : 'Đối với các khu vực miền núi như Hà Giang và Cao Bằng, chúng tôi khuyến nghị độ tuổi phù hợp là dưới 75 và trên 8 tuổi. Mặc dù hầu hết các điểm đến đều có thể đến bằng xe máy hoặc ô tô, nhưng việc dành nhiều giờ trên đường có thể gây mệt mỏi.',
    ],
    [
        'question' => $current_lang === 'en' ? 'Booking confirmation' : 'Xác nhận đặt tour',
        'answer' => $current_lang === 'en' ? 'We confirm your tour through direct messages. You can contact us in WhatsApp, Instagram or Facebook for fastest response. You also can fill in this form here, your order will be sent to us, and we’ll get in touch for more information within 2 days—no charges will apply just yet. Rest assured, your information is secure with us.' : 'Chúng tôi xác nhận tour của bạn qua tin nhắn trực tiếp. Bạn có thể liên hệ với chúng tôi qua WhatsApp, Instagram hoặc Facebook để nhận phản hồi nhanh nhất. Bạn cũng có thể điền vào biểu mẫu này tại đây, đơn đặt hàng của bạn sẽ được gửi đến chúng tôi, và chúng tôi sẽ liên hệ lại để biết thêm thông tin trong vòng 2 ngày—hiện tại chưa có chi phí nào được áp dụng. Hãy yên tâm, thông tin của bạn được bảo mật an toàn với chúng tôi.',
    ],
    [
        'question' => $current_lang === 'en' ? 'Can I go alone? Is it safe?' : 'Có an toàn không khi tôi đi một mình?',
        'answer' => $current_lang === 'en' ? 'Vietnam is consistently ranked as one of the safest nations in Southeast Asia and Asia, making it an excellent destination for solo travelers of any gender. While we always encourage standard precautions for your personal safety and belongings, you can feel very secure exploring here.<br/>For a focused and supported experience, Hi Hi Tour provides personalized 1:1 tours (one guest, one guide), which many of our previous solo guests have chosen. We maintain full transparency and provide accessible contact information so you can easily reach us in any situation.<br/>Alternatively, if you prefer traveling with others, we are happy to arrange for you to join one of our small group tours' : 'Việt Nam luôn được xếp hạng là một trong những quốc gia an toàn nhất Đông Nam Á và châu Á, trở thành điểm đến tuyệt vời cho du khách đi một mình ở mọi giới tính. Mặc dù chúng tôi luôn khuyến khích bạn thực hiện các biện pháp phòng ngừa tiêu chuẩn để đảm bảo an toàn cá nhân và tài sản, bạn vẫn có thể cảm thấy rất an tâm khi khám phá nơi đây.<br/>Để có trải nghiệm tập trung và được hỗ trợ tốt nhất, Hi Hi Tour cung cấp các tour cá nhân 1:1 (một khách, một hướng dẫn viên), lựa chọn của nhiều khách du lịch một mình trước đây. Chúng tôi luôn minh bạch và cung cấp thông tin liên lạc dễ tiếp cận để bạn có thể dễ dàng liên hệ với chúng tôi trong mọi tình huống.<br/>Ngoài ra, nếu bạn thích đi du lịch cùng người khác, chúng tôi rất vui lòng sắp xếp cho bạn tham gia một trong những tour nhóm nhỏ của chúng tôi.',
    ],
    [
        'question' => $current_lang === 'en' ? "Are Hi Hi Tour's tours group tours or private tours?" : 'Các tour của Hi Hi Tour là tour nhóm hay tour riêng?',
        'answer' => $current_lang === 'en' ? 'We offer both options! Unless you specifically request to join a group tour, your booking will automatically default to a private tour' : 'Chúng tôi cung cấp cả hai lựa chọn! Trừ khi bạn yêu cầu tham gia tour nhóm, đặt chỗ của bạn sẽ tự động mặc định là tour riêng.',
    ],
];

$history_steps = [
    [
        'id' => 'history-1',
        'title' => 'Let’s talk history',
        'content' => 'Our founder - Hiếu was born and raised in Cat Ba Island. Growing up, with a thirst for exploration, he spent six years going across Viet Nam and began to work in tourism. Since 2017, he set his foot in Ha Giang and immediately felt a special bond to the place.',
    ],
    [
        'id' => 'history-2',
        'title' => 'Our Vision',
        'content' => 'At Hi Hi Tour, we forge our own path, free from rigid itineraries. We explore uncharted roads, far from typical tourist trails, immersing you in the authentic tapestry of local culture and the embrace of untamed nature.',
    ],
];

?>

<main class="overflow-x-hidden">
    <div class="gallery-container">

        <section
            class="pt-8 pl-8 md:pl-32"
            data-aos="fade-up">
            <h3 class="text-4xl mb-3 font-phudu"><?php echo $current_lang === 'en' ? "Hello world, we are" : "Xin chào, chúng tôi là" ?></h3>
            <h2 class="text-5xl text-[#8CA865] font-delta-gothic">Hi Hi Tour</h2>
        </section>

        <section class="relative" data-aos="fade-up" data-aos-duration="1000">
            <div class="h-auto lg:h-[800px] p-8">
                <img
                    src="<?php echo $banner; ?>"
                    alt="banner"
                    class="object-fill w-full rounded-2xl md:rounded-[64px]" />
            </div>
        </section>

        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-3 md:p-8">
            <div class="p-8 flex items-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-5xl font-light text-center text-[#8CA865] font-delta-gothic">
                    <?php echo $current_lang === 'en' ? "We assure" : "Chúng tôi đảm bảo" ?>
                </h2>
            </div>

            <div class="p-8" data-aos="fade-up" data-aos-duration="1000">
                <img
                    class="mb-5"
                    src="<?php echo $icon_helmet; ?>"
                    width="80"
                    height="80"
                    alt="helmet" />
                <h3 class="text-2xl font-semibold mb-2 text-[#101F23] font-phudu"><?php echo $current_lang === 'en' ? "SAFE" : "AN TOÀN" ?></h3>
                <p class="text-sm leading-relaxed text-[#101F23]">
                    <?php echo $current_lang === 'en' ? "With Hi Hi tour, your safety is our top priority. Our vehicles are regularly inspected and maintained to ensure they meet the highest safety standards. We also provide comprehensive pre-trip briefings to equip you with the knowledge and awareness needed to navigate the region confidently." : "Sự an toàn của bạn là ưu tiên hàng đầu của chúng tôi. Lịch trình luôn được điều chỉnh để phù hợp với nhu cầu khách hàng. Phương tiện di chuyển đều sẽ được kiểm tra và bảo dưỡng trước khi lên đường. Chúng tôi luôn cố gắng cung cấp mọi thông tin cần thiết để bạn có sự chuẩn bị đầy đủ nhất, chuyến đi diễn ra suôn sẻ và an toàn." ?>
                </p>
            </div>

            <div class="p-8" data-aos="fade-up" data-aos-duration="1000">
                <img
                    class="mb-5"
                    src="<?php echo $icon_highfive; ?>"
                    width="80"
                    height="80"
                    alt="highfive" />
                <h3 class="text-2xl font-semibold mb-2 text-[#101F23] font-phudu"><?php echo $current_lang === 'en' ? "FUN" : "VUI VẺ" ?></h3>
                <p class="text-sm leading-relaxed text-[#101F23]">
                    <?php echo $current_lang === 'en' ? "Our tours are built to ignite your spirit of adventure. Our goal is simple: no matter how long or short the trip, we want you to feel completely at ease and enjoy every moment. With Hi Hi Tour, you’ll discover the raw beauty of Vietnam and create memories that truly last." : "Các tour của chúng tôi được thiết kế để khơi dậy tinh thần khám phá trong bạn. Chúng tôi luôn mong muốn rằng, khi đã bước vào hành trình này, dù dài hay ngắn, bạn cũng có thể thoải mái tận hưởng. Cùng với Hi Hi Tour, bạn sẽ khám phá vẻ đẹp hoang sơ của Việt Nam và tạo nên những kỷ niệm đáng nhớ." ?>
                </p>
            </div>

            <div class="lg:col-span-3 flex flex-wrap lg:flex-nowrap gap-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="p-8 w-full lg:w-1/2">
                    <img
                        class="mb-5"
                        src="<?php echo $icon_plump; ?>"
                        width="80"
                        height="80"
                        alt="plump" />
                    <h3 class="text-2xl font-semibold mb-2 text-[#101F23] font-phudu"><?php echo $current_lang === 'en' ? "WILD" : "PHÓNG KHOÁNG" ?></h3>
                    <p class="text-sm leading-relaxed text-[#101F23]">
                        <?php echo $current_lang === 'en' ? "Forget fixed schedules—we'll take you wherever your heart desires. Together with Hi Hi, you'll discover the raw, untouched beauty of every place we visit. After all, the experience isn't just about the destination; it’s about every moment of the journey we share." : "Không lịch trình cố định, chúng tôi sẽ đưa bạn đến bất cứ đâu. Bạn sẽ cùng Hi Hi ngắm nhìn vẻ đẹp nguyên sơ ở những nơi mình đặt chân đến. Vì trải nghiệm không chỉ nằm ở điểm đến, mà còn trên cả hành trình chúng ta đi." ?>
                    </p>
                </div>

                <div class="p-8 w-full lg:w-1/2">
                    <img
                        class="mb-5"
                        src="<?php echo $icon_sun; ?>"
                        width="80"
                        height="80"
                        alt="sun" />
                    <h3 class="text-2xl font-semibold mb-2 text-[#101F23] font-phudu">
                        <?php echo $current_lang === 'en' ? "PEACE" : "BÌNH YÊN" ?>
                    </h3>
                    <p class="text-sm leading-relaxed text-[#101F23]">
                        <?php echo $current_lang === 'en' ? "Our tour is not rushing you to travel, offer a serene escape from the everyday hustle. Imagine yourself surrounded by lush greenery and the soothing sounds of nature. Our itineraries include visits to less well-known places, where you can connect with the local culture and find inner peace. We provide comfortable accommodations and mindful activities to enhance your journey of self-discovery." : "Dù là \"tour\", nhưng chúng tôi không sử dụng một lịch trình cho tất cả mọi người. Chuyến đi không vội vã, mà là một khoảng lặng bình yên để bạn thoát khỏi những xô bồ thường nhật. Hi Hi sẽ đưa bạn đến những nơi ít nổi tiếng hơn — nơi bạn có thể kết nối với văn hóa bản địa và tìm thấy sự thư thái trong tâm hồn. Chúng mình chuẩn bị những chỗ ở thoải mái cùng các hoạt động nhẹ nhàng để hành trình khám phá thêm trọn vẹn." ?>

                    </p>
                </div>
            </div>
        </div>

        <section class="bg-[#8CA865] rounded-t-3xl md:rounded-t-[64px] py-6 md:py-12" data-aos="fade-up" data-aos-duration="1000">
            <h3 class="text-[#101F23] text-3xl md:text-5xl font-bold text-center font-phudu">
                <?php echo $current_lang === 'en' ? "LET'S PLAN YOUR TRIP" : 'Lên kế hoạch nha!' ?>
            </h3>
        </section>

        <div class="bg-linear-to-b from-[#ECF5DC] to-[#FAF9F7]">
            <section class="container mx-auto px-4 pt-8">
                <h2 class="text-3xl font-bold mb-8" data-aos="fade-up" data-aos-duration="1000"><?php echo $current_lang === 'en' ? "Where do you wanna go?" : "Bạn muốn đi đâu?" ?></h2>

                <div class="mx-auto mt-8 mb-20" data-aos="fade-up" data-aos-duration="1000">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">
                            <img
                                width="778"
                                height="428"
                                src="<?php echo $HaGiangLoop; ?>"
                                alt="Ha Giang Loop"
                                class="rounded-3xl w-full h-[428px] object-cover object-bottom" />
                        </div>

                        <div class="w-full md:w-1/2 p-3 md:p-10 flex flex-col justify-center">
                            <h2 class="text-2xl text-[#101F23] font-bold mb-3 font-phudu">
                                <?php echo $current_lang === 'en' ? "Ha Giang Loop" : "Một vòng Hà Giang" ?>
                            </h2>

                            <div class="flex flex-wrap space-x-3">
                                <div class="flex gap-2 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['clock']); ?>" alt="Clock Icon" />
                                    <?php echo $current_lang === 'en' ? "2+ days tour" : "Từ 2 ngày trở lên" ?>
                                </div>
                                <div class="flex gap-2 space-x-3 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['bike']); ?>" alt="Bike Icon" />
                                    <?php echo $current_lang === 'en' ? "Motorbike tour" : "Tour xe máy" ?>

                                </div>
                                <div class="flex gap-2 space-x-3 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['bus']); ?>" alt="Bus Icon" />
                                    <?php echo $current_lang === 'en' ? "Car tour" : "Tour ô tô" ?>
                                </div>
                            </div>

                            <p class="text-[#474E50] text-lg leading-relaxed">
                                <?php echo $current_lang === 'en' ? "Discover the majestic beauty of Ha Giang on our most popular tour. Beyond the famous landmarks, we’ll take you to the hidden gems that few people know about. Come immerse yourself in the grand mountain landscapes and the unique local culture." : "Khám phá vẻ đẹp hùng vĩ Hà Giang. Đây cũng là lịch trình được săn đón nhất tại Hi Hi. Ngoài các nơi đã nổi tiếng, chúng tôi cũng sẽ đưa bạn khám phá những điều đặc biệt ít biết ở Hà Giang. Đắm chìm vào không gian núi rừng kỳ vĩ và văn hóa bản địa đặc sắc." ?>
                            </p>

                            <!-- <div class="mt-3">
                                <button class="flex items-center gap-1 bg-[#2C2C2C] text-[#F5F5F5] py-2 px-3 rounded-md hover:bg-[#3f3f3f] transition duration-300 w-full md:w-auto">
                                    <?php echo $current_lang === 'en' ? "Explore" : "Khám phá" ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                        <path d="M5 12h14" />
                                        <path d="m12 5 7 7-7 7" />
                                    </svg>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="mx-auto my-8 md:my-20" data-aos="fade-up" data-aos-duration="1000">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2 p-3 md:p-10 flex flex-col justify-center">
                            <h2 class="text-2xl text-[#101F23] font-bold mb-3 font-phudu">
                                <?php echo $current_lang === 'en' ? 'Cao Bang' : 'Cao Bằng' ?>
                            </h2>

                            <div class="flex flex-wrap space-x-3">
                                <div class="flex gap-2 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['clock']); ?>" alt="Clock Icon" />
                                    <?php echo $current_lang === 'en' ? "2+ days tour" : "Từ 2 ngày trở lên" ?>
                                </div>
                                <div class="flex gap-2 space-x-3 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['bike']); ?>" alt="Bike Icon" />
                                    <?php echo $current_lang === 'en' ? "Motorbike tour" : "Tour xe máy" ?>

                                </div>
                                <div class="flex gap-2 space-x-3 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['bus']); ?>" alt="Bus Icon" />
                                    <?php echo $current_lang === 'en' ? "Car tour" : "Tour ô tô" ?>
                                </div>
                            </div>

                            <p class="text-[#474E50] text-lg leading-relaxed">
                                <?php echo $current_lang === 'en' ? "Right next to Cao Bang, Cao Bang has stunning natural beauty and rich cultural heritage. Explore the majestic waterfall, the serene stream and enjoy the peaceful Cao Bang." : "Là một tỉnh vùng núi Đông Bắc, Cao Bằng vừa có cảnh đẹp nên thơ, vừa có bề dày lịch sử sâu sắc. Khám phá Non nước Cao Bằng với vẻ đẹp vừa hùng vĩ của núi non, thác nước, vừa nên thơ của thảo nguyên, suối ngà." ?>
                            </p>

                            <!-- <div class="mt-3">
                                <button class="flex items-center gap-1 bg-[#2C2C2C] text-[#F5F5F5] py-2 px-3 rounded-md hover:bg-[#3f3f3f] transition duration-300 w-full md:w-auto">
                                    <?php echo $current_lang === 'en' ? "Explore" : "Khám phá" ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                        <path d="M5 12h14" />
                                        <path d="m12 5 7 7-7 7" />
                                    </svg>
                                </button>
                            </div> -->
                        </div>

                        <div class="w-full md:w-1/2">
                            <img
                                width="778"
                                height="428"
                                src="<?php echo $CaoBangTrip; ?>"
                                alt="Cao Bang Trip"
                                class="rounded-3xl w-full h-[428px] object-cover object-bottom" />
                        </div>
                    </div>
                </div>

                <div class="mx-auto py-8 md:py-20" data-aos="fade-up" data-aos-duration="1000">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">
                            <img
                                width="778"
                                height="428"
                                src="<?php echo $CatBaIsland; ?>"
                                alt="Cat Ba Island"
                                class="rounded-3xl w-full h-[428px] object-cover object-bottom" />
                        </div>

                        <div class="w-full md:w-1/2 p-3 md:p-10 flex flex-col justify-center">
                            <h2 class="text-2xl text-[#101F23] font-bold mb-3 font-phudu">
                                <?php echo $current_lang === 'en' ? "Cat Ba island" : "Đảo Cát Bà" ?>
                            </h2>

                            <div class="flex flex-wrap space-x-3">
                                <div class="flex gap-2 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['clock']); ?>" alt="Clock Icon" />
                                    <?php echo $current_lang === 'en' ? "Day tour" : "Tour ngày" ?>
                                </div>
                                <div class="flex gap-2 space-x-3 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['bike']); ?>" alt="Bike Icon" />
                                    <?php echo $current_lang === 'en' ? "Motorbike renting" : "Cho thuê xe máy" ?>

                                </div>
                                <div class="flex gap-2 space-x-3 bg-[#C9E1A2] text-[#000000] py-2 px-3 rounded-md w-fit mb-3">
                                    <img width="24" height="24" src="<?php echo esc_url($icons['bus']); ?>" alt="Bus Icon" />
                                    <?php echo $current_lang === 'en' ? "Package combo" : "Tour trọn gói" ?>
                                </div>
                            </div>

                            <p class="text-[#474E50] text-lg leading-relaxed">
                                <?php echo $current_lang === 'en' ? "Beautiful island of North Vietnam. You can go kayaking through the stunning limestone karsts, explore hidden lagoons, and relax on pristine beaches. Don't miss the chance to hike in Cat Ba National Park, home to diverse wildlife and lush rainforests." : "Nằm trong quần đảo lớn nhất vịnh Bắc Bộ, Cát Bà luôn đón chào du khách. Bạn có thể chèo kayak quanh những dãy núi đá vôi ngoài vịnh, khám phá các bãi tắm êm đềm. Cũng đừng quên khám phá Vườn Quốc Gia Cát Bà, vẫn còn lưu giữ vẻ đẹp nguyên sinh, cũng là nơi trú ngụ của nhiều loài động vật quý." ?>
                            </p>

                            <!-- <div class="mt-3">
                                <button class="flex items-center gap-1 bg-[#2C2C2C] text-[#F5F5F5] py-2 px-3 rounded-md hover:bg-[#3f3f3f] transition duration-300 w-full md:w-auto">
                                    <?php echo $current_lang === 'en' ? "Explore" : "Khám phá" ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                        <path d="M5 12h14" />
                                        <path d="m12 5 7 7-7 7" />
                                    </svg>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <section class="bg-[#FAF9F7] px-4 py-12">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8"> <?php echo $current_lang === 'en' ? "Best for short trip" : "Chuyến đi ngắn ngày" ?></h2>
                <div class="grid md:grid-cols-3 gap-6 items-center">
                    <div class="overflow-hidden relative" data-aos="fade-up" data-aos-duration="1000">
                        <a href="<?php echo esc_url(add_query_arg('plan', '2', get_translated_permalink_by_slug('cao-bang-tour'))); ?>" target="_blank">
                            <div class="rounded-[40px] relative">
                                <img class="w-full rounded-[40px] object-cover" src="<?php echo $shortTrip1 ?>" alt="short trip 1" />
                                <div class="absolute bottom-4 right-4 py-2 px-3 bg-[#2C2C2C] bg-opacity-50 text-white rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="py-4 bg-[#FAF9F7]">
                                <div class="flex justify-between">
                                    <p class="font-bold">
                                        <?php echo $current_lang === 'en' ? "Just 2 days in Cao Bang?" : "Chỉ có 2 ngày ở Cao Bằng" ?>
                                    </p>
                                    <p class="font-bold">
                                        <?php echo $current_lang === 'en' ? "130 USD" : "3.000.000 VNĐ" ?>
                                    </p>
                                </div>
                                <p class="mt-1">
                                    <?php echo $current_lang === 'en' ? "Short on time? It’s okay. We guarantee you can have best time in Cao Bang. No rush. Still mesmerizing" : "Ít thời gian có đi được không? Được chứ! Chúng tôi đảm bảo bạn vẫn sẽ có khoảng thời gian tuyệt vời ở Cao Bằng. Lịch trình không vội vã nhưng vẫn đáng nhớ." ?>
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="overflow-hidden relative" data-aos="fade-up" data-aos-duration="1000">
                        <a href="<?php echo esc_url(add_query_arg('plan', '3', get_translated_permalink_by_slug('ha-giang-tour'))); ?>" target="_blank">
                            <div class="rounded-[40px] relative">
                                <img class="w-full h-full md:h-[420px] rounded-[40px] object-cover" src="<?php echo $shortTrip2 ?>" alt="short trip 2" />
                                <div class="flex gap-1 absolute font-bold bottom-4 right-4 py-2 px-4 bg-[#F9BB32] bg-opacity-50 text-[#2C2C2C] border-[#2C2C2C] rounded-full">
                                    <?php echo $current_lang === 'en' ? "Most popular choice" : "Lựa chọn phổ biến" ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="py-4 bg-[#FAF9F7]">
                                <div class="flex justify-between">
                                    <p class="font-bold">
                                        <?php echo $current_lang === 'en' ? "Just 3 days in Ha Giang" : "Hà Giang 3 ngày" ?>
                                    </p>
                                    <p class="font-bold">
                                        <?php echo $current_lang === 'en' ? "195 USD" : "4.500.000 VNĐ" ?>
                                    </p>
                                </div>
                                <p class="mt-1">
                                    <?php echo $current_lang === 'en' ? "Popular choice when you want to complete Ha Giang Loop." : "Lựa chọn phổ biến nhất khi đi Hà Giang. Thời gian vừa đủ để khám phá, dù bạn đi một vòng hay đi chuyên sâu vài điểm." ?>
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class=" overflow-hidden relative" data-aos="fade-up" data-aos-duration="1000">
                        <a href="<?php echo esc_url(get_translated_permalink_by_slug('cat-ba-tour')); ?>" target="_blank">
                            <div class="rounded-[40px] relative">
                                <img class="w-full object-cover rounded-[40px]" src="<?php echo $shortTrip3 ?>" alt="short trip 3" />
                                <div class="absolute bottom-4 right-4 py-2 px-3 bg-[#2C2C2C] bg-opacity-50 text-white rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="py-4 bg-[#FAF9F7]">
                                <div class="flex justify-between">
                                    <p class="font-bold">
                                        <?php echo $current_lang === 'en' ? "Cat Ba day trip" : "Cát Bà đi trong ngày" ?>
                                    </p>
                                    <p class="font-bold">
                                        <?php echo $current_lang === 'en' ? "?? USD" : "?? VNĐ" ?>
                                    </p>
                                </div>
                                <p class="mt-1">
                                    <?php echo $current_lang === 'en' ? "Have a fresh breeze of the sea just within 1 day at one of the largest island in North Vietnam, why not?" : "Đi tìm chút 'vitamin sea' trong ngày tại hòn đảo lớn nhất miền Bắc, tại sao không thử nhỉ?" ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12">
            <h2 class="text-3xl font-light mb-2"><?php echo $current_lang === 'en' ? "Plan for a longooooong trip" : "Những chuyến đi dài" ?></h2>
            <p class="text-sm mb-6">
                <?php echo $current_lang === 'en' ? "If you have ample time and seek deep cultural immersion, our extended tours are perfect. We offer diverse options to explore Northern Vietnam or create a custom itinerary to anywhere you desire." : "Nếu bạn có nhiều thời gian và muốn trải nghiệm văn hóa sâu sắc, các tour dài ngày của chúng tôi là lựa chọn hoàn hảo. Chúng tôi cung cấp nhiều lựa chọn để khám phá miền Bắc Việt Nam hoặc tạo lịch trình tùy chỉnh đến bất cứ nơi nào bạn muốn." ?>
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:p-6" data-aos="fade-up" data-aos-duration="1000">
                <div class=" overflow-hidden relative">
                    <div class="relative">
                        <img src="<?php echo $longTrip1 ?>" alt="long trip 1" />
                    </div>
                    <div class="py-4 bg-white">
                        <div class="flex justify-between">
                            <p class="font-bold">
                                <?php echo $current_lang === 'en' ? "Explore Ha Giang and Cao Bang for 5 days" : "5 ngày Hà Giang - Cao Bằng" ?>
                            </p>
                            <p class="font-bold">
                                <?php echo $current_lang === 'en' ? "325 USD" : "7.500.000 VNĐ" ?>
                            </p>
                        </div>
                        <p class="text-[#74797A] mt-1">
                            <?php echo $current_lang === 'en' ? "Explore the two famous provinces of Northeast Vietnam. Although they are adjacent to each other, each place has its own distinct beauty. Ha Giang boasts majestic landscapes, while Cao Bang is renowned for its picturesque scenery." : "Một vòng Hà Giang - Cao Bằng. Dù nằm sát cạnh nhau, nhưng mỗi nơi lại mang một vẻ đẹp riêng biệt. Nếu Cao Bằng gây ấn tượng bởi khung cảnh hùng vĩ, thì Cao Bang lại nức tiếng với vẻ đẹp thơ mộng, hữu tình" ?>
                        </p>
                    </div>
                </div>

                <div class=" overflow-hidden relative" data-aos="fade-up" data-aos-duration="1000">
                    <div class="relative">
                        <img src="<?php echo $longTrip2 ?>" alt="long trip 2" />
                    </div>
                    <div class="py-4 bg-white">
                        <div class="flex justify-between">
                            <p class="font-bold">
                                <?php echo $current_lang === 'en' ? "Run wild till one day who knows when" : "Đi rồi sẽ đến" ?>
                            </p>
                        </div>
                        <p class="text-[#74797A] mt-1">
                            <?php echo $current_lang === 'en' ? "We have extensive experience organizing tours across many provinces in Vietnam. If you have the need to travel anywhere, even embarking on a complete cross-Vietnam journey, we are ready to accommodate your request!" : "Chúng mình có kinh nghiệm dày dặn trong việc tổ chức tour tại khắp các tỉnh thành trên dải đất hình chữ S. Nếu bạn đang có ý định du lịch ở bất cứ đâu, hay thậm chí là thực hiện một chuyến xuyên Việt trọn vẹn, Hi Hi Tour luôn sẵn sàng đồng hành và đáp ứng mọi yêu cầu của bạn!" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12" id="about-us">
            <h2 class="text-3xl font-light mb-8"><?php echo $current_lang === 'en' ? "About Hi Hi Tour" : "Hiểu thêm về Hi Hi tour" ?></h2>
            <div class="flex flex-wrap gap-8 rounded-lg px-4 py-4 lg:py-16">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/about_us.jpg'); ?>" alt="About us" />

                <div class="history-border flex gap-2 shrink-0 py-2">
                    <div style="background: #8CA865" id="btn-history-1" class="history-tab-btn rounded-full cursor-pointer transition-all"></div>
                    <div style="background: #CDCECD" id="btn-history-2" class="history-tab-btn rounded-full cursor-pointer transition-all"></div>
                </div>

                <div class="flex-1 md:py-8 px-4 py-4 rounded-lg w-auto">
                    <div id="history-1">
                        <h3 class="text-2xl font-bold mb-4">
                            <?php echo $current_lang === 'en' ? "Let’s talk history" : "Chuyện cũ giờ mới kể" ?>
                        </h3>
                        <p class="text-sm leading-relaxed">
                            <?php echo $current_lang === 'en' ? "Our founder - Hiếu was born and raised in Cat Ba Island. Growing up, with a thirst for exploration, he spent six years going across Viet Nam and began to work in tourism. Since 2017, he set his foot in Ha Giang and immediately felt a special bond to the place. He has been dedicated to curating tours, including the now-famous loop tour in Ha Giang. At Hi Hi Tour, we forge our own path, free from rigid itineraries. We explore uncharted roads, far from typical tourist trails, immersing you in the authentic tapestry of local culture and the embrace of untamed nature. We don’t rush into things, we go with your pace. Whether you want to seek for inner peace or want to go all out, just go with us." : "Người sáng lập của chúng tôi - Hiếu - sinh ra và lớn lên ở đảo Cát Bà. Từ nhỏ, với khát khao khám phá, anh đã dành sáu năm đi khắp Việt Nam và bắt đầu làm việc trong ngành du lịch. Từ năm 2017, anh đặt chân đến Hà Giang và ngay lập tức cảm nhận được mối liên kết đặc biệt với nơi này. Anh đã dành tâm huyết để thiết kế các tour du lịch, trong đó có tour vòng quanh Hà Giang nổi tiếng. Tại Hi Hi Tour, chúng tôi tự tạo ra con đường riêng, không bị ràng buộc bởi lịch trình cứng nhắc. Chúng tôi khám phá những con đường chưa được khai phá, xa rời những tuyến du lịch quen thuộc, đưa bạn hòa mình vào bức tranh văn hóa địa phương chân thực và vòng tay của thiên nhiên hoang sơ. Chúng tôi không vội vàng, chúng tôi đi theo nhịp độ của bạn. Cho dù bạn muốn tìm kiếm sự bình yên nội tâm hay muốn trải nghiệm hết mình, hãy cứ đi cùng chúng tôi." ?>
                        </p>
                        <p class="text-sm leading-relaxed">
                            <?php echo $current_lang === 'en' ? "Today, Hi Hi Tour primarily operates in Cat Ba, Ha Giang, and Cao Bang, but we also do customize tours anywhere our customers desire." : "Hiện nay, Hi Hi Tour chủ yếu hoạt động tại Cát Bà, Hà Giang và Cao Bằng, nhưng chúng tôi cũng cung cấp các tour du lịch theo yêu cầu đến bất cứ nơi nào khách hàng mong muốn." ?>
                        </p>
                    </div>

                    <div id="history-2" style="display: none;">
                        <h3 class="text-2xl font-bold mb-4 mt-6">
                            <?php echo $current_lang === 'en' ? "How we do toursim" : "Làm du lịch... kiểu Hi Hi" ?>
                        </h3>
                        <p class="text-sm leading-relaxed">
                            <?php echo $current_lang === 'en' ? "We firmly believe that responsible tourism goes hand in hand with preserving local traditions. Inspired by the Vietnamese saying, ’Văn hóa là bản chất. Văn hóa là dân tộc’ (Culture is identity. Culture is the nation), we strive to promote tourism in a way that honors and supports the communities we visit. Beside tourism, we frequently lend a hand to remote villages, providing essentials like warm clothing for children, school supplies, and blankets for families in the highlands. We lead travelers through less known area and make sure not to affect the local’s daily life or the surrounding landscape. We hope that we can share this love with you, our beloved customers." : "Chúng tôi tin rằng du lịch trách nhiệm luôn đi đôi với việc gìn giữ các giá trị truyền thống. Khắc ghi câu nói: 'Văn hóa là bản chất. Văn hóa là dân tộc', chúng tôi nỗ lực phát triển du lịch theo cách tôn trọng và hỗ trợ cộng đồng địa phương. Bên cạnh các hoạt động lữ hành, chúng tôi thường xuyên chung tay giúp đỡ những bản làng xa xôi, gửi tặng những món quà thiết yếu như áo ấm cho trẻ nhỏ, đồ dùng học tập hay chăn ấm cho các gia đình vùng cao. Trong mỗi chuyến đi, chúng tôi dẫn dắt du khách qua những vùng đất ít dấu chân người, luôn ý thức không làm ảnh hưởng đến nhịp sống thường nhật hay cảnh quan thiên nhiên. Chúng tôi hy vọng có thể lan tỏa tình yêu này đến bạn – những vị khách quý của Hi Hi Tour." ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-3xl font-light mb-8"><?php echo $current_lang === 'en' ? 'Hi Hi gallery' : 'Kho tàng của Hi Hi' ?></h2>
            <p><?php echo $current_lang === 'en' ? "Gaze upon the very soul of Vietnam through our lens! We have personally traversed this incredible land, from the South's heart to the North's majesty, and our passion is capturing every cherished moment shared with you, our guests. We believe every single step of your journey is unique, ensuring that when you look back at these photographs, you won't just remember—you will deeply relive the joy, connection, and beauty of those unforgettable memories." : "Hãy cùng chúng tôi ngắm nhìn tâm hồn của Việt Nam qua lăng kính riêng! Chúng tôi đã tự mình đi dọc chiều dài đất nước, từ Nam ra Bắc, với niềm đam mê cháy bỏng là ghi lại từng khoảnh khắc trân quý cùng bạn. Chúng tôi tin rằng mỗi bước chân bạn đi là độc nhất, để khi nhìn lại những thước hình này, bạn không chỉ nhớ về kỷ niệm — mà sẽ thực sự sống lại niềm vui, sự gắn kết và vẻ đẹp của những ngày tháng không thể nào quên" ?></p>
            <div class="columns-2 md:columns-3 gap-4">
                <img
                    data-src="<?php echo $gallery1 ?>"
                    class="w-full mb-4 rounded-xl break-inside-avoid cursor-pointer"
                    src="<?php echo $gallery1 ?>"
                    width="537"
                    height="281"
                    alt="Image 01" />
                <img
                    data-src="<?php echo $gallery4 ?>"
                    class="w-full mb-4 rounded-xl break-inside-avoid cursor-pointer"
                    src="<?php echo $gallery4 ?>"
                    width="537"
                    height="596"
                    alt="Image 04" />

                <img
                    data-src="<?php echo $gallery2 ?>"
                    class="w-full mb-4 rounded-xl break-inside-avoid cursor-pointer"
                    src="<?php echo $gallery2 ?>"
                    width="471"
                    height="459"
                    alt="Image 02" />
                <img
                    data-src="<?php echo $gallery5 ?>"
                    class="w-full mb-4 rounded-xl break-inside-avoid cursor-pointer"
                    src="<?php echo $gallery5 ?>"
                    width="471"
                    height="428"
                    alt="Image 05" />

                <img
                    data-src="<?php echo $gallery3 ?>"
                    class="w-full mb-4 rounded-xl break-inside-avoid cursor-pointer"
                    src="<?php echo $gallery3 ?>"
                    width="537"
                    height="281"
                    alt="Image 03" />
                <img
                    data-src="<?php echo $gallery6 ?>"
                    class="w-full mb-4 rounded-xl break-inside-avoid cursor-pointer"
                    src="<?php echo $gallery6 ?>"
                    width="537"
                    height="596"
                    alt="Image 06" />
            </div>
        </section>

        <section class="bg-[#FFF7E6]" id="how-to-book-us">
            <div class="container mx-auto px-4 py-12">
                <h2 class="text-3xl font-bold mb-8">
                    <?php echo $current_lang === 'en' ? "How to book us?" : "Làm thế nào để đặt lịch?" ?>
                </h2>
                <p>
                    <?php echo $current_lang === 'en' ? "Feel free to reach out to us using the options below. We’ll confirm all the necessary details. Alternatively, you can fill out the form in the Pricing section above and click 'Book Now.' Your order will be sent to us, and we’ll get in touch for more information—no charges will apply just yet. Rest assured, your information is secure with us." : "Đừng ngần ngại liên hệ với chúng tôi qua các kênh bên dưới nhé, chúng tôi sẽ xác nhận lại mọi chi tiết cần thiết. Hoặc ở mỗi tour đều có mục Giá tour và có nút \"Đặt ngay\". Yêu cầu của bạn sẽ được gửi tới hệ thống và tụi mình sẽ chủ động liên hệ lại để tư vấn kỹ hơn. Bước này hoàn toàn không mất phí. Mọi thông tin cá nhân của bạn đều được chúng mình bảo mật và chỉ sử dụng cho mục đích xác nhận thông tin." ?>
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

        <section class="container mx-auto px-4 py-12">
            <h2 class="text-3xl font-bold mb-2"><?php echo $current_lang === 'en' ? 'FAQs' : 'Câu hỏi thường gặp' ?></h2>
            <div class="space-y-4">
                <?php foreach ($faqs_data as $index => $faq): ?>
                    <div class="border-b border-gray-200">
                        <button
                            class="flex justify-between items-center w-full py-4 text-left font-semibold text-lg text-[#101F23] hover:text-[#8CA865] focus:outline-none"
                            onclick="document.getElementById('faq-answer-<?php echo $index; ?>').classList.toggle('hidden');">
                            <?php echo htmlspecialchars($faq['question']); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="faq-answer-<?php echo $index; ?>" class="hidden pb-4 text-gray-600">
                            <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-8">
                <a class="font-bold text-[#0066FF] hover:underline" href="<?php echo esc_url(get_translated_permalink_by_slug('helps')); ?>" target="_blank">
                    <?php echo $current_lang === 'en' ? "See all FAQs" : "Xem thêm các câu hỏi thường gặp" ?>
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn1 = document.getElementById('btn-history-1');
            const btn2 = document.getElementById('btn-history-2');
            const content1 = document.getElementById('history-1');
            const content2 = document.getElementById('history-2');

            const activeColor = '#8CA865'; // Màu xanh active
            const inactiveColor = '#CDCECD'; // Màu xám (gray-300)

            // Hàm chuyển đổi
            function showHistory(index) {
                if (index === 1) {
                    // Hiện 1, ẩn 2
                    content1.style.display = 'block';
                    content2.style.display = 'none';
                    // Cập nhật border
                    btn1.style.backgroundColor = activeColor;
                    btn2.style.backgroundColor = inactiveColor;
                } else {
                    // Hiện 2, ẩn 1
                    content1.style.display = 'none';
                    content2.style.display = 'block';
                    // Cập nhật border
                    btn1.style.backgroundColor = inactiveColor;
                    btn2.style.backgroundColor = activeColor;
                }
            }

            // Gán sự kiện click
            btn1.addEventListener('click', () => showHistory(1));
            btn2.addEventListener('click', () => showHistory(2));
        });
    </script>

</main>


<?php get_footer() ?>