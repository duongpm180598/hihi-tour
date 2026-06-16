<?php
/*
Template Name: Helps
Template Post Type: page
*/
$theme_uri = get_template_directory_uri();

$icons = [
    'jcb'     => $theme_uri . '/assets/icons/jcb.svg',
    'visa'   => $theme_uri . '/assets/icons/visa.svg',
    'amex'   => $theme_uri . '/assets/icons/amex.svg',
    'money'   => $theme_uri . '/assets/icons/money.svg',
    'threads'  => $theme_uri . '/assets/images/threads-logo.png',
];

$current_lang = pll_current_language('slug');
$t = load_lang();

$faqs_data = [];

if ($current_lang === 'vi') {
    $faqs_data = [
        [
            'question' => 'Tour Hi Hi có giới hạn độ tuổi không?',
            'answer' => 'Khi đi vùng núi cao như Cao Bằng - Cao Bằng, chúng tôi khuyến khích du khách đi trong độ tuổi từ 8 đến 75. Dù hầu hết các điểm đến đều có thể tiếp cận bằng xe máy hoặc ô tô, nhưng việc di chuyển nhiều giờ trên đường đèo có thể gây mệt mỏi cho trẻ quá nhỏ hoặc người cao tuổi. Ngược lại, đảo Cát Bà với cung đường dễ dàng và thoải mái hơn, sẽ là lựa chọn phù hợp cho mọi lứa tuổi.',
        ],
        [
            'question' => 'Xác nhận tour',
            'answer' => 'Chúng tôi chốt tour trực tiếp qua tin nhắn. Bạn có thể liên hệ với Hi Hi qua Threads để được hỗ trợ nhanh nhất.<br/>Ngoài ra, bạn cũng có thể điền thông tin vào mẫu đăng ký tại phần chi tiết tour. Đơn hàng sẽ được gửi đến hệ thống và tụi mình sẽ chủ động liên lạc lại để tư vấn kỹ hơn trong vòng 2 ngày. Bạn yên tâm là bước này hoàn toàn miễn phí, chúng mình chưa thu bất kỳ khoản phí nào và thông tin của bạn luôn được bảo mật tuyệt đối.',
        ],
        [
            'question' => 'Tôi có thể đi một mình được không? Có an toàn không?',
            'answer' => 'Bạn hoàn toàn có thể đi một mình, có người dẫn đường hoặc không, dù bạn là nam hay nữ. Chúng tôi vẫn khuyên bạn tỉnh táo, giữ gìn sức khỏe và an toàn cá nhân, tuy nhiên nhìn chung bạn sẽ được an toàn. Tại Hi Hi tour, chúng tôi có nhiều khách nữ tự lái xe, đi 1 - 1 với Hi Hi lắm. Chúng tôi luôn làm việc minh bạch và cung cấp đầy đủ thông tin liên lạc để bạn có thể dễ dàng kết nối với chúng tôi trong mọi tình huống.<br/>Bên cạnh đó, nếu bạn thích không khí sôi nổi hơn, chúng mình cũng rất sẵn lòng sắp xếp để bạn tham gia tour ghép nhóm nhỏ của Hi Hi Tour.',
        ],
        [
            'question' => 'Tôi có phải trả thêm chi phí nào so với giá đã công bố không?',
            'answer' => "Giá công khai của chúng tôi đã bao gồm chi phí đi lại, ăn ở, các vé vào cửa, thuê hướng dẫn viên và thuê lái xe, thuê xe (nếu có). Bạn không cần trả thêm bất cứ chi phí nào.<br/>Ngoài giá đã nêu, bạn chỉ phải trả các chi phí cá nhân như trà, cà phê, ăn vặt hay mua quà lưu niệm.",
        ],
        [
            'question' => "Ngoài giá công bố, tôi có phải trả thêm phí nào không?",
            'answer' => "Giá công khai của chúng tôi đã bao gồm chi phí đi lại, ăn ở, các vé vào cửa, thuê hướng dẫn viên và thuê lái xe, thuê xe (nếu có). Bạn không cần trả thêm bất cứ chi phí nào.<br/>Ngoài giá đã nêu, bạn chỉ phải trả các chi phí cá nhân như trà, cà phê, ăn vặt hay mua quà lưu niệm.",
        ],
        [
            'question' => "Tiền tip (tiền boa) có bắt buộc không?",
            'answer' => "Đội ngũ hướng dẫn viên, tài xế và nhân viên phục vụ của chúng mình luôn nỗ lực hết mình để mang đến cho bạn một hành trình tuyệt vời nhất. Tại đây, tiền tip không phải là quy định bắt buộc, nhưng đó là một cách tinh tế để bạn thể hiện sự trân trọng đối với dịch vụ tận tâm. Bạn có thể gửi tip trực tiếp cho những người đã đồng hành và hỗ trợ bạn trong suốt chuyến đi.",
        ],
    ];
} else {
    $faqs_data = [
        [
            'question' => 'Does Hi Hi tour have age limit?',
            'answer' => 'For mountainous areas such as Cao Bang and Cao Bang, we kindly recommend for people under 75 and above 8. Though most destination can reach by bike or car, spending long hours on the road can be tiring. For Cat Ba island, which is much easier and more comfortable to travel, is accessible for any ages.',
        ],
        [
            'question' => 'Booking confirmation',
            'answer' => 'We confirm your tour through direct messages. You can contact us on Threads for the fastest response.<br/>You also can fill in forms from any tour details, your order will be sent to us, and we’ll get in touch for more information within 2 days—no charges will apply just yet. Rest assured, your information is secure with us.',
        ],
        [
            'question' => 'Can I go alone? Is it safe?',
            'answer' => 'Vietnam is consistently ranked as one of the safest nations in Southeast Asia and Asia, making it an excellent destination for solo travelers of any gender. While we always encourage standard precautions for your personal safety and belongings, you can feel very secure exploring here.<br/>For a focused and supported experience, Hi Hi Tour provides personalized 1:1 tours (one guest, one guide), which many of our previous solo guests have chosen. We maintain full transparency and provide accessible contact information so you can easily reach us in any situation.<br/>Alternatively, if you prefer traveling with others, we are happy to arrange for you to join one of our small group tours.',
        ],
        [
            'question' => "Are Hi Hi Tour's tours group tours or private tours?",
            'answer' => "Our original tours include a well-planned itinerary that ensures you experience the best of each destination, whether it's your first visit or a return trip.<br/>But if you have specific requests or preferences, please let us know. Our travel experts will gladly assist you in customizing the itinerary to suit your needs.",
        ],
        [
            'question' => "Aside from public pricing, do I have to pay any extra fee?",
            'answer' => "Our prices already include transportation, accommodation, meals, entrance fees, guides or hiring drivers. You won’t have to worry about any hidden costs. You only have to pay for your personal expenses such as coffee, tea at stops and any souvenirs you want to buy.",
        ],
        [
            'question' => "Is tipping required?",
            'answer' => "Our team of guides, drivers, and service staff are dedicated to providing you with an exceptional experience. While tipping is not mandatory, it is a wonderful way to show your appreciation for outstanding service. Tips can be given directly to those who have enhanced your journey.",
        ],
    ];
}

$faqs_ha_giang_data = [
    [
        'question' => $current_lang === 'en' ?
            'Does Ha Giang tour have age limitation?' :
            'Tour Hà Giang có giới hạn độ tuổi không?',
        'answer' => $current_lang === 'en' ?
            "We highly recommend this tour for guests between 8 and 75 years old. On average, we will be traveling for about 8 hours each day. Throughout the journey, we will take short breaks every 20 to 40 minutes, or more frequently depending on your comfort and condition. You'll quickly adapt to the rhythm of the road, and the breathtaking scenery will certainly distract you from any fatigue! However, please be aware that the long travel time might still be challenging for very small children or older travelers." :
            "Chúng tôi khuyến khích tour dành cho độ tuổi từ 8 - 75. Hành trình Hà Giang sẽ cần di chuyển 7 - 8 tiếng một ngày. Xuyên suốt hành trình sẽ có nhiều chặng nghỉ sau mỗi 20 - 40 phút. Bạn sẽ sớm thích nghi với nhịp điệu của chuyến đi, quên đi cái mệt bởi cảnh sắc ven đường. Tuy nhiên, cường độ di chuyển cao cũng có thể gây mệt mỏi cho trẻ nhỏ và người cao tuổi.",
    ],
    [
        'question' => $current_lang === 'en' ?
            'How challenging to travel in Ha Giang?' :
            'Đường đi Hà Giang có khó lắm không?',
        'answer' => $current_lang === 'en' ?
            "Ha Giang is known for its thrilling motorbike rides and stunning cliffside views. While some roads may be challenging, especially in remote villages, rest assured that our experienced guides and drivers prioritize your safety. We carefully select routes to ensure a secure and unforgettable experience in Ha Giang." :
            "Hà Giang nổi tiếng bởi những cung đường đèo khúc khuỷu. Tuy vậy, các cung đường chính ở Hà Giang đều đã được làm khá đẹp. Dù có khá nhiều đường nhỏ, đặc biệt khi đi vào bản vùng cao, chúng tôi đảm bảo bạn luôn được đi an toàn bởi đội ngũ vững tay lái đằng trước.",
    ],
    // [
    //     'question' => $current_lang === 'en' ?
    //         "I’ve never rode a bike. Do I need training beforehand?" :
    //         "Tôi chưa bao giờ đi xe máy. Tôi có cần tập luyện trước không?",
    //     'answer' => $current_lang === 'en' ?
    //         "Don’t worry, you don’t have to do any training. Our drivers are skilled, we will drive you safe. Just believe in your driver and follow the instruction.<br/>We suggest that you don’t wiggling or spread wide your arms on the road because it’s dangerous." :
    //         "Đừng lo lắng, bạn không cần phải tập luyện trước. Các tài xế của chúng tôi đều lành nghề, chúng tôi sẽ đưa bạn đi an toàn. Chỉ cần tin tưởng vào tài xế và làm theo hướng dẫn.<br/>Chúng tôi khuyên bạn không nên lắc lư hoặc dang rộng tay khi đang di chuyển vì điều đó rất nguy hiểm.",
    // ],
    [
        'question' => $current_lang === 'en' ?
            "I'm planning to self-drive a motorbike in Ha Giang. How challenging are the roads, and what license requirements do I need?" :
            "Tôi dự định sẽ tự lái xe máy. Liệu tôi có thể đi được không?",
        'answer' => $current_lang === 'en' ?
            "If you plan to drive yourself, an International Driving Permit (IDP) is required. You can certainly drive your own motorbike in Ha Giang, as most main roads are now paved for better safety.<br/>With Hi Hi Tour, our guides will choose the best roads to make sure your trip is safe and complete.<br/>Important Note: When the weather is bad (rain or fog), roads can get slippery, and visibility is low. If you haven't driven in these tough conditions before, we strongly recommend hiring a local driver for your safety." :
            "Chủ yếu hành trình bạn sẽ đi các con đường đèo núi. Cung đường chính của Hà Giang nay đã được làm khá đẹp và được sửa chữa thường xuyên. Nếu bạn có tay lái cứng, dù là nam hay nữ cũng có thể chinh phục các đoạn đường này. Hi Hi sẽ lựa chọn cung đường tùy thuộc vào khả năng lái của bạn. Nếu vào sâu các bản, thường đường đi sẽ khá nhỏ, chủ yếu là đường bê tông, dốc và khó đi hơn.<br/>Lưu ý đặc biệt, nếu thời tiết xấu (mưa to hay sương mù), đường trơn trượt và khó quan sát hơn. Nếu bạn không có nhiều kinh nghiệm đi trong điều kiện thời tiết xấu, chúng tôi vẫn khuyên bạn thuê người lái để đảm bảo an toàn.",
    ],
    [
        'question' => $current_lang === 'en' ?
            "How much should I pack for my trip to Ha Giang?" :
            "Tôi có nên mang vali khi đi Hà Giang không?",
        'answer' => $current_lang === 'en' ?
            "Since you will be staying in a different location almost every day and your luggage will be carried on the back of the motorbikes, please pack light and keep it simple. You only need to bring the necessary essentials for the trip, packed in a bag with a maximum volume of under 50L.<br/>Any heavier or extra luggage can be safely left at KiKi House (our base/office) and collected when you return after the tour.<br/>Besides seasonal clothing, we recommend bringing insect repellent just in case. You don't need to carry water; we will prepare and provide drinking water for you. Also, we frequently stop at rest points during the trip, where all kinds of drinks are available for purchase if you want anything extra." :
            "Trên hành trình, gần như mỗi đêm bạn sẽ ở một nơi khác nhau. Nếu bạn đi xe máy, đồ của bạn sẽ được chằng sau xe. Vì vậy, hãy mang gọn nhẹ, đủ đồ cần thiết trong túi khoảng 50L để tiện di chuyển nhé.<br/>Nếu các bạn có vali không cần mang theo, bạn có thể gửi lại KiKi house (nơi xuất phát) và lấy lại khi kết thúc chuyến đi.<br/>Đồ đạc mang đi: ngoài quần áo, bạn có thể mang theo xịt côn trùng. Bạn không cần đem theo nước, chúng tôi sẽ chuẩn bị nước lọc cho bạn mỗi ngày. Ngoài ra, ở các điểm dừng nghỉ đều bán cà phê, trà, nước ngọt, bạn có thể mua thêm nếu cần.",
    ],
    [
        'question' => $current_lang === 'en' ?
            "I'm not a party person, I hear that all the activities in Ha Giang are quite lively—is that true?" :
            "Tôi không thật sự thích tiệc tùng. Tôi nghe nói các hoạt động ở Hà Giang đều sôi động, náo nhiệt có phải không?",
        'answer' => $current_lang === 'en' ?
            "You are absolutely free to enjoy the atmosphere of Ha Giang in your own way. Aside from activities like karaoke or communal cultural events that might be a bit lively, Ha Giang always offers peaceful spaces. You can simply sit in the main square, relax on the homestay porch, and breathe in the refreshing air of Northern Vietnam mountains.<br/>During mealtimes, you might see people cheering and enjoying 'happy water' (local spirits). In Vietnam, offering a drink is a gesture of hospitality; if you wish to join, we would love to share the joy with you. However, if you prefer not to drink, there is absolutely no pressure—we will all continue to be just as cheerful and enjoy the meal together!" :
            "Bạn hoàn toàn có thể tự do tận hưởng bầu không khí của Hà Giang theo cách riêng của mình. Ngoài những hoạt động như karaoke hay các buổi giao lưu văn nghệ có phần náo nhiệt, Hà Giang luôn có những không gian cực kỳ yên bình. Bạn đơn giản chỉ cần ngồi ở quảng trường trung tâm, thư giãn ngoài hiên homestay và hít hà bầu không khí trong lành của núi rừng miền Bắc.<br/>Trong các bữa ăn, bạn có thể bắt gặp cảnh mọi người chúc rượu sôi nổi. Đây là một cử chỉ hiếu khách, nếu bạn có thể uống, chúng tôi rất vui được uống cùng bạn vài ly. Tuy nhiên, nếu bạn không thích uống cũng không sao cả, không có bất kỳ áp lực nào đâu. Tất cả chúng ta vẫn sẽ vui vẻ dùng bữa cùng nhau như bình thường!",
    ],
];

$faqs_cao_bang_data = [
    [
        'question' => $current_lang === 'en' ?
            'Does Cao Bang tour have age limitation?' :
            'Tour Cao Bằng có giới hạn độ tuổi không??',
        'answer' => $current_lang === 'en' ?
            "We highly recommend this tour for guests between 8 and 75 years old. On average, we will be traveling for about 8 hours each day. Throughout the journey, we will take short breaks every 20 to 40 minutes, or more frequently depending on your comfort and condition. You'll quickly adapt to the rhythm of the road, and the breathtaking scenery will certainly distract you from any fatigue! However, please be aware that the long travel time might still be challenging for very small children or older travelers." :
            "Chúng tôi khuyến khích tour dành cho độ tuổi từ 8 - 75. Hành trình Hà Giang sẽ cần di chuyển 7 - 8 tiếng một ngày. Xuyên suốt hành trình sẽ có nhiều chặng nghỉ sau mỗi 20 - 40 phút. Bạn sẽ sớm thích nghi với nhịp điệu của chuyến đi, quên đi cái mệt bởi cảnh sắc ven đường. Tuy nhiên, cường độ di chuyển cao cũng có thể gây mệt mỏi cho trẻ nhỏ và người cao tuổi.",
    ],
    [
        'question' => $current_lang === 'en' ?
            'How challenging to travel in Cao Bang? How is it compared to Ha Giang?' :
            'Đi Cao Bằng có khó không? So với Hà Giang thì thế nào?',
        'answer' => $current_lang === 'en' ?
            "Cao Bang has a relatively flatter terrain compared to Ha Giang. Generally speaking, aside from a few mountain passes, the roads in Cao Bang are quite easy to drive. If you are an experienced motorcyclist, you can definitely drive yourself and we will lead the way" :
            "Cao Bằng có địa hình bằng phẳng hơn Cao Bằng tương đối, nhìn chung, ngoài một số đoạn đèo dốc, ở Cao Bằng khá dễ lái. Nếu bạn đã có nhiều kinh nghiệm lái xe máy, bạn hoàn toàn có thể tự đi, chúng tôi sẽ dẫn đường cho bạn.",
    ],
    [
        'question' => $current_lang === 'en' ?
            "Are there any differences between Ha Giang and Cao Bằng?" :
            "Cao Bằng với Hà Giang có gì khác biệt?",
        'answer' => $current_lang === 'en' ?
            "The two provinces are very different. Although they are adjacent on the map of Vietnam, Ha Giang and Cao Bằng possess clear differences in landscape, culture, and people.<br/>The terrain in Ha Giang is characterized by towering mountains and deep gorges, resulting in a majestic and grand beauty. Ha Giang's population is also sparser due to its geographical features, with ethnic communities mostly scattered across the mountain ranges.<br/>In contrast, Cao Bằng has a similar altitude but is flatter and more expansive, featuring many small grasslands and valleys, surrounded by numerous streams and rivers. This creates a poetic and romantic beauty, which Vietnamese people affectionately call 'Non Nước Cao Bằng' (The Land of Water and Mountains)" :
            "Hai tỉnh này mang sắc thái hoàn toàn khác nhau. Dù nằm sát nhau trên bản đồ, Hà Giang và Cao Bằng lại sở hữu những nét riêng biệt về cảnh quan, văn hóa và con người.<br/>Địa hình tại Hà Giang bị chi phối bởi những đỉnh núi đá vôi dốc đứng và những hẻm vực sâu thẳm, tạo nên một vẻ đẹp hùng vĩ và choáng ngợp. Dân cư ở đây cũng thưa thớt hơn do địa hình hiểm trở, với các cộng đồng dân tộc thiểu số sống rải rác chủ yếu trên các dãy núi cao.<br/>Ngược lại, Cao Bằng tuy có độ cao tương đương nhưng địa hình lại bằng phẳng và trải rộng hơn, với nhiều thung lũng và đồng cỏ nhỏ được bao quanh bởi vô số dòng sông, con suối. Điều này tạo nên một vẻ đẹp thơ mộng và trữ tình mà người Việt Nam vẫn trìu mến gọi là \"Non nước Cao Bằng\"",
    ],
    [
        'question' => $current_lang === 'en' ?
            "How much should I pack for my trip to Cao Bang?" :
            "Tôi có nên mang vali khi đi Cao Bằng không?",
        'answer' => $current_lang === 'en' ?
            "Since you will be staying in a different location almost every day and your luggage will be carried on the back of the motorbikes, please pack light and keep it simple. You only need to bring the necessary essentials for the trip, packed in a bag with a maximum volume of under 50L.<br/>Any heavier or extra luggage can be safely left at our base/office and collected when you return after the tour.<br/>Besides seasonal clothing, we recommend bringing insect repellent just in case. You don't need to carry water; we will prepare and provide drinking water for you. Also, we frequently stop at rest points during the trip, where all kinds of drinks are available for purchase if you want anything extra." :
            "Trên hành trình, gần như mỗi đêm bạn sẽ ở một nơi khác nhau. Nếu bạn đi xe máy, đồ của bạn sẽ được chằng sau xe. Vì vậy, hãy mang gọn nhẹ, đủ đồ cần thiết trong túi khoảng 50L để tiện di chuyển nhé.<br/>Nếu các bạn có vali không cần mang theo, bạn có thể gửi lại KiKi house (nơi xuất phát) và lấy lại khi kết thúc chuyến đi.<br/>Đồ đạc mang đi: ngoài quần áo, bạn có thể mang theo xịt côn trùng. Bạn không cần đem theo nước, chúng tôi sẽ chuẩn bị nước lọc cho bạn mỗi ngày. Ngoài ra, ở các điểm dừng nghỉ đều bán cà phê, trà, nước ngọt, bạn có thể mua thêm nếu cần.",
    ],
];

$faqs_cat_ba_data = [
    [
        'question' => $current_lang === 'en' ? 'Does Cat Ba tour have age limitation?' : 'Tour Cát Bà có giới hạn độ tuổi không?',
        'answer' => $current_lang === 'en' ? "The Cat Ba tour is designed for ease and relaxation, making it suitable for nearly everyone, from children over 2 years old to seniors up to 80.<br/> Travel logistics involve just a few hours by comfortable car followed by a quick 15-minute ferry ride. Once on the island, all activities are gentle and pleasant, ensuring a relaxing pace for older adults and those seeking tranquility. Feel free to join us!" : "Tour Cát Bà được thiết kế hướng tới sự thuận tiện và thư giãn, phù hợp với hầu hết mọi người, dù là các cháu nhỏ và người cao tuổi.<br/>Việc di chuyển rất đơn giản, chỉ mất vài giờ ngồi xe ô tô thoải mái và thêm 15 phút đi phà nhanh chóng. Khi đã lên đảo, tất cả các hoạt động đều rất nhẹ nhàng và dễ chịu, đảm bảo nhịp điệu nghỉ ngơi thư thái cho người lớn tuổi cũng như những ai đang tìm kiếm sự bình yên. Đừng ngần ngại đồng hành cùng tụi mình nhé!",
    ],
    [
        'question' => $current_lang === 'en' ? 'Is it likely to get seasick when taking the ferry to Cat Ba Island?' : 'Đi phà, tàu ra đảo Cát Bà có dễ bị say sóng không?',
        'answer' => $current_lang === 'en' ? "The journey from the ferry terminal to the island is mostly contained within the bay, meaning the waters are typically very calm. Since the travel time is short (ranging from 10 to 30 minutes depending on the vessel), seasickness is highly unlikely!<br/>On rare, windy days when waves might be slightly stronger, you may want to bring motion sickness medication as a precaution, but generally, you should feel very comfortable." : "Hành trình từ bến phà ra đảo chủ yếu nằm trong vịnh nên mặt nước thường rất êm đềm. Vì thời gian di chuyển cực kỳ ngắn (chỉ khoảng 10 đến 30 phút tùy loại tàu) nên khả năng bị say sóng là rất thấp!<br/>Vào những ngày hiếm hoi có gió lớn khiến sóng mạnh hơn một chút, bạn có thể mang theo thuốc chống say xe để dự phòng cho yên tâm. Tuy nhiên, nhìn chung thì bạn sẽ cảm thấy rất thoải mái trong suốt chuyến đi.",
    ],
];
?>
<?php get_header(); ?>

<div class="container mx-auto pt-16 pb-8">
    <h1 class="heading-font text-6xl md:text-8xl lg:text-8xl mb-8 font-delta-gothic">
        <?php echo $current_lang === 'en' ? "Help here!" : "Chúng tôi có thể giúp gì?" ?>
    </h1>
    <p class="text-lg [#74797A]"><?php echo $current_lang === 'en' ? "Got questions? We've got answers!" : "Hi Hi đây, ai gọi đó?"; ?></p>
</div>

<div class="container mx-auto">
    <h2 class="text-xl font-bold mb-2"><?php echo $current_lang === 'en' ? "Contact us now" : "Liên hệ với chúng tôi" ?></h2>
    <p class="mb-4"><?php echo esc_html($t['global']['social_contact_link_instruction']); ?></p>

    <div class="grid grid-cols-1 gap-8">
        <div class="block">
            <div class="flex items-center gap-4 mb-4">
                <img width="48" height="48" src="<?php echo esc_url($icons['threads']); ?>" alt="<?php echo esc_attr($t['global']['social_threads_icon_alt']); ?>" />
                <div class="text-sm [#74797A]">
                    <p class="text-[#101F23]"><?php echo esc_html($t['global']['social_threads_label']); ?></p>
                    <a href="https://www.threads.com/@timmotchonam" target="_blank" rel="noopener noreferrer" class="hover:underline"><?php echo esc_html($t['global']['social_threads_handle']); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 mt-10">

    <div class="bg-[#ECF5DC] py-8 md:py-16">
        <div class="mx-auto" style="max-width: 640px">
            <h2 class="text-2xl font-bold mb-4">
                <?php echo $current_lang === 'en' ? "Payment policy" : "Chính sách Thanh toán" ?>
            </h2>
            <p class="text-sm">
                <?php echo $current_lang === 'en' ?
                    "You won’t have to pay upfront, only a small amount for deposit only. The rest of payment is due upon arrival at our facility." :
                    "Bạn không cần trả trước mà chỉ cần đặt cọc một khoản nhỏ. Phần còn lại bạn sẽ thanh toán khi tới nơi."
                ?>
            </p>
            <p class="text-sm">
                <?php echo $current_lang === 'en' ?
                    "We accept payment both in cash or mobile banking. By paying in cash, we accept both VND and USD, making it convenient for both local and international guests." :
                    "Chúng tôi nhận thanh toán chuyển khoản, tiền mặt, thẻ. Khi thanh toán tiền mặt, chúng tôi chấp nhận cả tiền Việt (VNĐ) và tiền đô (USD), tạo điểu kiện cho du khách trong và ngoài nước."
                ?>
            </p>
            <p class="text-sm">
                <?php echo $current_lang === 'en' ?
                    "In addition to cash payments, we also accept card payments, although a <b>5% surcharge</b> will be applied. For your convenience, there are ATMs located in the vicinity of Ha Giang centre where you can withdraw cash." :
                    "Với thanh toán thẻ, chúng tôi sẽ áp dụng 5% phí. Bạn hoàn toàn có thể chuyển khoản hay dùng tiền mặt để không mất thêm phí này."
                ?>
            </p>

            <div class="flex space-x-4 mt-6">
                <img width="64" height="64" src="<?php echo esc_url($icons['visa']); ?>" alt="visa" />
                <img width="64" height="64" src="<?php echo esc_url($icons['jcb']); ?>" alt="jcb" />
                <img width="64" height="64" src="<?php echo esc_url($icons['amex']); ?>" alt="amex" />
                <img width="64" height="64" src="<?php echo esc_url($icons['money']); ?>" alt="money" />
            </div>
        </div>
    </div>

    <div class="bg-[#FFF7E6] py-8 md:py-16">
        <div class="mx-auto" style="max-width: 640px">
            <h2 class="text-2xl font-bold mb-4">
                <?php echo $current_lang === 'en' ? "Re-schedule, Cancel and Refund policy" : "Chính sách Dời dịch, Hủy lịch và Hoàn tiền" ?>
            </h2>
            <p class="text-sm">
                <?php echo $current_lang === 'en' ?
                    "For personal reasons, you may reschedule your tour <b>up to 2 days</b> before departure, with the new date within 1 year of the original. Your deposit will be held during this period." :
                    "Vì bất kỳ lý do cá nhân nào, bạn có thể dời lịch <b>tối đa 2 ngày</b> trước khi tour diễn ra, và có thể dời lịch trong vòng 1 năm kể từ ngày gốc. Chúng tôi sẽ giữ lại khoản đặt cọc trong thời gian này."
                ?>
            </p>
            <p class="text-sm">
                <?php echo $current_lang === 'en' ?
                    "If you cancel for personal reasons <b>at least 7 days</b> before departure, you’ll receive a full refund. After this, your deposit will be retained." :
                    "Chúng tôi hỗ trợ bạn hủy lịch <b>tối đa 7 ngày</b> trước khi tour diễn ra, bạn sẽ được hoàn cọc. Nếu bạn hủy lịch sát giờ, chúng tôi sẽ không hoàn cọc.
"
                ?>
            </p>
            <p class="text-sm">
                <?php echo $current_lang === 'en' ?
                    "In the event of force majeure, such as natural disasters or severe weather, we will notify you and provide a full refund. However, we cannot cover expenses like airfare or hotel bookings." :
                    "Trong tình huống bất khả kháng, như thiên tai, thời tiết xấu, chúng tôi sẽ thông báo tới bạn và hỗ trợ bạn dời lịch, hủy lịch mà không mất phí. Tuy nhiên, các phí cá nhân như vé máy bay, khách sạn bạn đặt không trong tour, chúng tôi sẽ không hỗ trợ. "
                ?>
            </p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16" id="faq-section">
    <h2 class="text-3xl font-bold mb-3"><?php echo $current_lang === 'en' ? "FAQs" : "Câu hỏi thường gặp" ?></h2>

    <?php foreach ($faqs_data as $index => $faq): ?>
        <div class="border-b border-gray-200">
            <button
                class="flex justify-between items-center w-full py-4 text-left font-semibold text-lg hover:text-[#8CA865] focus:outline-none"
                onclick="document.getElementById('faq-answer-<?php echo $index; ?>').classList.toggle('hidden');">
                <?php echo htmlspecialchars($faq['question']); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="faq-answer-<?php echo $index; ?>" class="hidden pb-4 [#74797A]">
                <p><?php echo htmlspecialchars($faq['answer']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <h2 class="text-3xl te font-bold mt-10 mb-3"><?php echo $current_lang === 'en' ? "Ha Giang’s FAQs" : "Câu hỏi về Hà Giang" ?></h2>

    <?php foreach ($faqs_ha_giang_data as $index => $faq): ?>
        <div class="border-b border-gray-200">
            <button
                class="flex justify-between items-center w-full py-4 text-left font-semibold text-lg hover:text-[#8CA865] focus:outline-none"
                onclick="document.getElementById('faq-answer-hg-<?php echo $index; ?>').classList.toggle('hidden');">
                <?php echo htmlspecialchars($faq['question']); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="faq-answer-hg-<?php echo $index; ?>" class="hidden pb-4 [#74797A]">
                <p><?php echo htmlspecialchars($faq['answer']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <h2 class="text-3xl font-bold mt-10 mb-3"><?php echo $current_lang === 'en' ? "Cao Bang’s FAQs" : "Câu hỏi về Cao Bằng" ?></h2>

    <?php foreach ($faqs_cao_bang_data as $index => $faq): ?>
        <div class="border-b border-gray-200">
            <button
                class="flex justify-between items-center w-full py-4 text-left font-semibold text-lg hover:text-[#8CA865] focus:outline-none"
                onclick="document.getElementById('faq-answer-cb-<?php echo $index; ?>').classList.toggle('hidden');">
                <?php echo htmlspecialchars($faq['question']); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="faq-answer-cb-<?php echo $index; ?>" class="hidden pb-4 [#74797A]">
                <p><?php echo htmlspecialchars($faq['answer']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <h2 class="text-3xl font-bold mt-10 mb-3"><?php echo $current_lang === 'en' ? "Cat ba’s FAQs" : "Câu hỏi về Cát Bà" ?></h2>

    <?php foreach ($faqs_cat_ba_data as $index => $faq): ?>
        <div class="border-b border-gray-200">
            <button
                class="flex justify-between items-center w-full py-4 text-left font-semibold text-lg hover:text-[#8CA865] focus:outline-none"
                onclick="document.getElementById('faq-answer-cab-<?php echo $index; ?>').classList.toggle('hidden');">
                <?php echo htmlspecialchars($faq['question']); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="faq-answer-cab-<?php echo $index; ?>" class="hidden pb-4 [#74797A]">
                <p><?php echo htmlspecialchars($faq['answer']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php get_footer(); ?>
