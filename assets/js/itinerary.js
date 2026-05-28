const pathname = window.location.pathname

const isCatBa = pathname.includes('/cat-ba-tour')
const isHaGiang = pathname.includes('/ha-giang')
const isMuCangChai = pathname.includes('/mu-cang-chai')
const isTaiwan = pathname.includes('/taiwan')
const isHue = pathname.includes('/hue')
const vi = pathname.includes('/vi')

let ALL_ITINERARY_PLANS_DATA = {}

function makeTaiwanItinerary(isVi) {
    return window.hihiTaiwanItineraryData || {}
}

if (vi) {
    if (isTaiwan) {
        ALL_ITINERARY_PLANS_DATA = makeTaiwanItinerary(true)
    } else if (isHue) {
        ALL_ITINERARY_PLANS_DATA = window.hihiHueItineraryData || {}
    } else if (isMuCangChai) {
        ALL_ITINERARY_PLANS_DATA = {
            3: {
                // Ngày 0: Hà Nội -> Tú Lệ
                0: [
                    {
                        time: '21:00',
                        description: 'Xe giường nằm Hà Nội - Tú Lệ. Xe này sẽ đi tít lên tận Lai Châu, bạn có thể dừng ở Nghĩa Lộ, Tú Lệ hoặc Mù Cang Chải tuỳ theo ý thích nhé',
                    },
                    {
                        time: '05:30',
                        description: 'Tới Tú Lệ',
                    },
                ],

                // Ngày 1: Khám phá Tú Lệ
                1: [
                    {
                        time: '06:00',
                        description: 'Ăn sáng. Thử món xôi cồm Tú Lệ nổi tiếng nếu đúng mùa cốm.',
                    },
                    {
                        time: '07:00',
                        description: 'Thuê xe máy, ở dọc chợ Tú Lệ có khá nhiều hàng cho thuê, giá cả ngang nhau, thích nhà nào thuê nhà đó. 180k/ngày (tính trong ngày không phải 24h)',
                    },
                    {
                        time: '09:00',
                        description: 'Về homestay cất đồ, hỏi chủ homestay xem mình nên đi đâu',
                    },
                    {
                        time: '11:00',
                        description: 'Đi theo các con đường nhỏ lên cao, vào làng bản xung quanh Tú Lệ. Đừng đi ra hẳn Lùng Cúng nhé, đường xấu mà xa á',
                    },
                    {
                        time: '15:00',
                        description: 'Đi núi Hổ. Đường rất bé và trơn, nhiều đoạn đường đất. Cân nhắc, view cũng cũng',
                    },
                    {
                        time: '19:00',
                        description: 'Ăn tối ở homestay',
                    },
                    {
                        time: '21:00',
                        description: 'Tự chơi với nhau thôi vì tối ở đây không có hoạt động gì nhiều',
                    },
                ],

                // Ngày 2: Khám phá Mù Cang Chải
                2: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng',
                    },
                    {
                        time: '10:00',
                        description: 'Lên đường đi Mù Cang Chải, qua đèo Khau Phạ. Dừng ở đỉnh đèo ngắm cảnh.',
                    },
                    {
                        time: '12:00',
                        short: 'Ăn trưa',
                        description: 'Ăn trưa ở thị trấn',
                    },
                    {
                        time: '13:00',
                        description: 'Check-in homestay. Hỏi chủ homestay xem nên đi đâu tiếp',
                    },
                    {
                        time: '14:00',
                        description: 'Đi lên Mồ Dề ngắm hoa. 3km cuối siêu siêu siêu xấu, phải có người bản địa chở đi mới đi nổi',
                    },
                    {
                        time: '16:00',
                        description: 'Lang thang loanh quanh. Vẫn còn thừa thời gian nên đi thẳng xuống Kim Nọi.',
                    },
                    {
                        time: 'Night time',
                        description: 'Ăn tối ở thị trấn',
                    },
                ],

                // Ngày 3: Về Hà Nội
                3: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng',
                    },
                    {
                        time: '10:00',
                        description: 'Đi Lao Chải, dừng ở thuỷ điện Khau Mang Thượng siêu siêu đẹp',
                    },
                    {
                        time: '13:00',
                        description: 'Ăn trưa, check-out',
                    },
                    {
                        time: '14:00',
                        description: 'Đón xe về Hà Nội',
                    },
                    {
                        time: '21:00',
                        description: 'Về tới Hà Nội',
                    },
                ],
            },
        }
    } else if (isHaGiang) {
        ALL_ITINERARY_PLANS_DATA = {
            4: {
                // Ngày 0: Hà Nội -> Hà Giang
                0: [
                    {
                        time: '21:00',
                        description: 'Lên xe giường nằm đi Hà Giang.',
                    },
                    {
                        time: '03:00',
                        description: 'Trung tâm thành phố. Nghỉ lại tại chỗ thuê xe máy.',
                    },
                ],

                // Ngày 1: Hà Giang -> Đồng Văn
                1: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng.',
                    },
                    {
                        time: '09:00',
                        description: 'TP. Hà Giang - Quản Bạ - Yên Minh. Thích đâu dừng đó.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Ăn trưa ở thị trấn Yên Minh.',
                    },
                    {
                        time: '14:00',
                        description: 'Yên Minh - Đồng Văn.',
                    },
                    {
                        time: '17:00',
                        description: 'Tới Đồng Văn. Check-in homestay.',
                    },
                    {
                        time: '19:00',
                        description: 'Ăn tối ở phố cổ Đồng Văn tại các nhà hàng bản địa. Ăn lẩu gà đen, thắng cố, ăn vặt linh tinh.',
                    },
                    {
                        time: 'Night time',
                        description: 'Buổi tối (đặc biệt là cuối tuần) ở Đồng Văn có đốt lửa trại, mọi người cùng nhau ca hát, nhảy múa khá là vui nhộn. Đi dạo quanh phố cổ nhỏ nhỏ cũng vui vui, còn có thể đi mát-xa ở các nhà trong phố nữa siêu thích.',
                    },
                ],

                // Ngày 2: Đồng Văn -> Mèo Vạc (Gần Sông Nho Quế)
                2: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng ở Đồng Văn.',
                    },
                    {
                        time: '09:00',
                        description: 'Qua đèo Mã Pí Lèng, một trong tứ đại đỉnh đèo ở Việt Nam. Siêu đẹp siêu thích. Có thể dừng lại ở đỉnh đèo ngắm cảnh.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Dừng lại ăn trưa ở thị trấn Mèo Vạc.',
                    },
                    {
                        time: '14:00',
                        description: 'Ngược về bến thuyền sông Nho Quế. 120k/người, đi thuyền khoảng 30 - 45 phút.',
                    },
                    {
                        time: '15:00',
                        description: 'Đi loanh quanh khu này, đường nào đẹp thì rẽ.',
                    },
                    {
                        time: '17:00',
                        description: 'Về homestay. Có thể ở làng du lịch H\'Mong hoặc ở trong thị trấn, 2 nơi này cách nhau 3km thôi.',
                    },
                    {
                        time: '19:00',
                        description: 'Ăn tối ở homestay (nếu có) hoặc ăn ở thị trấn.',
                    },
                    {
                        time: 'Night time',
                        description: 'Buổi tối ở Mèo Vạc sẽ yên bình hơn Đồng Văn dù cũng vẫn có các hoạt động văn nghệ giao lưu.',
                    },
                ],

                // Ngày 3: Mèo Vạc -> Làng Du Già
                3: [
                    {
                        time: '08:00',
                        description: 'Nếu ngày này là Chủ Nhật, phải đi chợ phiên Mèo Vạc! Phải đi! Một trong những chợ phiên lớn ở vùng cao Hà Giang, bán rất nhiều đồ hay ho, đồ ăn sáng trong chợ siêu ngon siêu bản địa. Phải thử phở lợn, phở gà đen, xôi,...',
                    },
                    {
                        time: '10:00',
                        description: 'Về Du Già theo đường qua cua chữ M.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Ăn trưa ở cua chữ M, view đẹp.',
                    },
                    {
                        time: '14:00',
                        description: 'Tiếp tục về Du Già.',
                    },
                    {
                        time: '16:00',
                        description: 'Đến Du Già, check-in homestay. Nếu thích tắm thác có thể ghé thác Du Già, khá là đông vui du khách tắm ở đây.',
                    },
                    {
                        time: '17:00 - 18:00',
                        description: 'Về homestay ăn tối.',
                    },
                    {
                        time: 'Night time',
                        description: 'Có thể dạo quanh làng Du Già, có một vài quán cà phê và thậm chí là nhiều quán bar dưới tầng hầm, mọi người rất hay hát karaoke ở đấy.',
                    },
                ],

                // Ngày 4: Làng Du Già -> Thành phố Hà Giang
                4: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng ở Du Già.',
                    },
                    {
                        time: '09:00',
                        description: 'Về thành phố theo google map. Hỏi homestay trước xem đường nào đang đẹp không bị sạt thì đi.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Ăn trưa.',
                    },
                    {
                        time: '13:00',
                        description: 'Ghé check-in km0. Giờ này check-in vừa vắng vừa đẹp.',
                    },
                    {
                        time: '17:00',
                        description: 'Kết thúc hành trình. Đón xe về Hà Nội, thường có chuyến 4 rưỡi - 5h.',
                    },
                    {
                        time: '23:00',
                        description: 'Về đến Hà Nội.',
                    },
                ],
            },
            3: {
                // Ngày 0: Hà Nội -> Hà Giang
                0: [
                    {
                        time: '21:00',
                        description:
                            'Xe giường nằm chất lượng cao của chúng tôi sẽ đón quý khách để bắt đầu hành trình đến Hà Giang! Quý khách sẽ được đặt trên xe cabin VIP, mỗi khách có một khoang ngủ riêng tư, cá nhân.',
                    },
                    { time: '03:00', description: 'Đến Thành phố Hà Giang, nhân viên của chúng tôi sẽ hướng dẫn quý khách nhận phòng và nghỉ ngơi.' },
                ],

                // Ngày 1: Hà Giang -> Đồng Văn
                1: [
                    {
                        time: '08:00',
                        description:
                            'Gặp gỡ hướng dẫn viên và tài xế của Hi Hi tour. Thưởng thức bữa sáng đơn giản nhưng ý nghĩa, nạp đầy đủ năng lượng và sẵn sàng để bị rung động bởi vẻ đẹp thiên nhiên sắp tới.',
                    },
                    {
                        time: '09:00',
                        description: `Cùng nhau, chúng ta bắt đầu hành trình tuyệt vời. Chúng ta sẽ không vội vã. Thay vào đó, chúng ta sẽ tận dụng khoảnh khắc để dừng chân tại các điểm ngắm cảnh và đi sâu vào các làng bản địa phương để cảm nhận nhịp sống chân thực nhất của các cộng đồng dân tộc.`,
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description:
                            'Dừng chân tại Yên Minh và thưởng thức bữa trưa ngon miệng với các món ăn địa phương chân thực. Thưởng thức trọn vẹn hương vị núi rừng.<br/>Sau bữa trưa, chúng ta sẽ có một quãng nghỉ ngắn khoảng 15 - 30 phút trước khi tiếp tục hành trình.',
                    },
                    {
                        time: '14:00',
                        description: `Chúng ta tiếp tục từ Yên Minh hướng về Đồng Văn. Hãy chuẩn bị máy ảnh—khung cảnh trở nên ấn tượng và ngoạn mục hơn khi chúng ta lên cao.<br/>Hành trình từ Yên Minh đến Đồng Văn là một bản giao hưởng của những dãy núi đá. Mỗi khúc cua, mỗi con đèo, đều mở ra một cảnh đẹp ngoạn mục mới, khiến chúng ta không ngừng thốt lên kinh ngạc trước sự hùng vĩ của thiên nhiên.`,
                    },
                    {
                        time: '17:00',
                        description: `Đến Đồng Văn và nhận phòng tại homestay ấm cúng của bạn. Hãy dành thời gian này để thư giãn, sảng khoái và đắm mình trong không khí yên bình của phố cổ.`,
                    },
                    {
                        time: '19:00',
                        description: `Thưởng thức bữa tối ngon miệng tại một nhà hàng địa phương, nếm thử các đặc sản núi rừng ngon nhất của khu vực.<br/>Nếu bạn có thể uống, chúng tôi rất sẵn lòng chia sẻ vài chén vui vẻ cùng nhau. Hà Giang nổi tiếng với các loại rượu tự nấu độc đáo ủ từ nguyên liệu rừng, như rượu ngô men lá hoặc rượu chuối. Nếu bạn không uống rượu, điều đó hoàn toàn ổn—chúng tôi chỉ đơn giản mời bạn đắm mình vào không khí nhộn nhịp và sự đồng hành tốt đẹp xung quanh chúng ta.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'Buổi tối là của bạn! Tản bộ qua Phố cổ Đồng Văn dưới ánh sao. Hầu như mỗi đêm, bạn sẽ bắt gặp một buổi giao lưu văn hóa cộng đồng sôi động với âm nhạc và lửa trại, hoặc bạn có thể tìm một góc yên tĩnh để uống một ly và suy ngẫm về những cảnh tượng tuyệt vời trong ngày.',
                    },
                ],

                // Ngày 2: Đồng Văn -> Du Già
                2: [
                    {
                        time: '08:00',
                        description:
                            'Thưởng thức bữa sáng tại Đồng Văn. Thực đơn ở đây có sự kết hợp giữa hương vị truyền thống địa phương và các món ăn quốc tế, đảm bảo bạn được nạp đầy năng lượng cho ngày mới.',
                    },
                    {
                        time: '09:00',
                        description: `Chuyến đi được mong chờ nhất! Chúng ta bắt đầu hành trình vượt qua Đèo Mã Pì Lèng—được công nhận là một trong "Tứ Đại Đỉnh Đèo của Việt Nam." Hãy chuẩn bị để choáng ngợp trước khung cảnh hùng vĩ. Ở đây, bạn sẽ nhận thấy một sự thay đổi rõ rệt: sự xuất hiện của những ngọn núi đá vôi lởm chởm đặc trưng "tai mèo" (núi đá tai mèo) của Mèo Vạc, khác biệt rõ rệt so với cảnh quan ngày đầu tiên. Cảnh tượng này thực sự minh chứng tại sao Hà Giang được mệnh danh là nơi "đá nở hoa."`,
                    },
                    {
                        time: '11:00',
                        description: `Trải nghiệm trái tim Hà Giang - Sông Nho Quế.<br/>Đây là điểm đến bạn không thể bỏ lỡ! Chúng ta sẽ đi xuống bến thuyền để tận hưởng chuyến đi trên Sông Nho Quế. Trên bờ sông sừng sững một ngọn núi cao từ 700 đến 900 mét, tạo thành hẻm vực Tu Sản. Đứng dưới lòng sông, bạn sẽ cảm thấy một sự nhỏ bé trước thiên nhiên hùng vĩ như vậy. Đặc biệt vào mùa Thu và Đông, nước sông mang một màu xanh ngọc bích độc đáo, tuyệt đẹp.`,
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Chúng ta dừng lại ở Thị trấn Mèo Vạc để ăn trưa.',
                    },
                    {
                        time: '14:00',
                        description: `Sau bữa trưa, chúng ta lên đường hướng về Du Già. Trên đường đi, chúng ta sẽ vui vẻ rẽ ngang để đảm bảo không bỏ lỡ bất kỳ vẻ đẹp thiên nhiên bất ngờ nào mà núi rừng ban tặng.`,
                    },
                    {
                        time: '16:00',
                        description: `Đến homestay Du Già, nhanh chóng nhận phòng và đi thẳng đến Thác Du Già. Nước tự nhiên ở đây luôn trong vắt và lạnh buốt, thác khá rộng, rất thích hợp để bạn thỏa sức bơi lội và thư giãn. (Đừng quên đồ bơi để tận hưởng trọn vẹn sự sảng khoái này!)`,
                    },
                    {
                        time: '19:00',
                        description: `Trở về homestay. Tắm rửa và cùng nhau thưởng thức bữa tối với các món ăn "cây nhà lá vườn" đậm đà hương vị địa phương, tạo ra một cảm giác ấm cúng, như ở nhà.`,
                    },
                    {
                        time: 'Night time',
                        description: `Buổi tối ở Du Già thường vui vẻ và sôi động, đặc trưng của cộng đồng du lịch bụi. Bạn có thể dễ dàng kết bạn và giao lưu tại các homestay khác, hát karaoke, hoặc đơn giản là tìm một quán cà phê nhỏ để tận hưởng sự yên bình dưới ánh sao núi.`,
                    },
                ],

                // Ngày 3: Du Già -> Hà Giang (Kết thúc)
                3: [
                    {
                        time: '08:00',
                        description:
                            'Thưởng thức bữa sáng ở Du Già. Bạn có thể dành chút thời gian đi dạo quanh, ngắm cảnh, hoặc chụp ảnh những khung cảnh tuyệt đẹp xung quanh.',
                    },
                    {
                        time: '09:00',
                        description:
                            'Chúng ta rời Du Già, biết rằng những kỷ niệm chúng ta tạo ra vẫn còn ở lại đây, và bắt đầu lái xe về Thành phố Hà Giang. Hãy chú ý sự thay đổi dần dần của cảnh quan khi chúng ta rời khỏi thung lũng và các khu vực núi đá cao. Chúng ta sẽ dừng lại ở một điểm ngắm cảnh đẹp trên đường. Tận dụng khoảnh khắc cuối cùng này để chiêm ngưỡng và hứa với những ngọn núi hùng vĩ rằng chúng ta sẽ quay lại khám phá chúng một lần nữa.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description:
                            'Thưởng thức bữa trưa gần Thành phố Hà Giang. Đây là bữa ăn chung cuối cùng của chúng ta, nơi chúng ta có thể lên kế hoạch cho chuyến phiêu lưu tiếp theo và chia sẻ những khoảnh khắc yêu thích của mình.',
                    },
                    {
                        time: '16:00',
                        description:
                            'Về đến Thành phố Hà Giang! Chúng ta ghé thăm Cột mốc Km 0 để chụp bức ảnh cuối cùng—lúc này vừa vắng vừa đẹp, chính thức đánh dấu sự hoàn thành của chương này trong hành trình.',
                    },
                    {
                        time: '17:00',
                        description:
                            'Cuộc chinh phục Hà Giang tạm kết thúc. Chúng tôi hy vọng bạn mang theo nhiều kỷ niệm tuyệt vời và đã mong chờ đến lần gặp lại tiếp theo trên những cung đường núi tuyệt vời này! Đón xe về Hà Nội, thường có chuyến 4 rưỡi - 5h.',
                    },
                    {
                        time: '23:00',
                        description: 'Quý khách sẽ đến Hà Nội vào khoảng thời gian này. Tạm biệt và hẹn gặp lại sớm!',
                    },
                ],
            },
            2: {
                // Ngày 0: Hà Nội -> Hà Giang
                0: [
                    {
                        time: '21:00',
                        description: 'Lên xe giường nằm đi Hà Giang.',
                    },
                    {
                        time: '03:00',
                        description: 'Trung tâm thành phố. Nghỉ lại tại chỗ thuê xe máy.',
                    },
                ],

                // Ngày 1: Hà Giang -> Đồng Văn
                1: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng.',
                    },
                    {
                        time: '09:00',
                        description: 'TP. Hà Giang - Quản Bạ - Yên Minh. Thích đâu dừng đó.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Ăn trưa ở thị trấn Yên Minh.',
                    },
                    {
                        time: '14:00',
                        description: 'Qua dốc Thẩm Mã. Rất nhiều khách du lịch. Thích thì dừng cũng được.',
                    },
                    {
                        time: '15:00',
                        description: 'Đi thẳng lên cột cờ Lũng Cú, chân cột cờ là làng Lô Lô Chải. Chú ý nếu book homestay ở Đồng Văn thì phải lên đây trước 3h chiều và bắt đầu về trước 4h không thì trời tối quá, đi nguy hiểm.',
                    },
                    {
                        time: '17:00',
                        description: 'Về đến Đồng Văn, check-in homestay.',
                    },
                    {
                        time: '19:00',
                        description: 'Ăn tối ở phố cổ Đồng Văn tại các nhà hàng bản địa. Ăn lẩu gà đen, thắng cố, ăn vặt linh tinh.',
                    },
                    {
                        time: 'Night time',
                        description: 'Buổi tối (đặc biệt là cuối tuần) ở Đồng Văn có đốt lửa trại, mọi người cùng nhau ca hát, nhảy múa khá là vui nhộn. Đi dạo quanh phố cổ nhỏ nhỏ cũng vui vui, còn có thể đi mát-xa ở các nhà trong phố nữa siêu thích.',
                    },
                ],

                // Ngày 2: Đồng Văn -> Mèo Vạc (Gần Sông Nho Quế) -> Hà Giang
                2: [
                    {
                        time: '08:00',
                        description: 'Ăn sáng ở Đồng Văn.',
                    },
                    {
                        time: '09:00',
                        description: 'Đi xuống bến thuyền sông Nho Quế. 120k/người, đi thuyền khoảng 30 - 45 phút.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Ăn trưa ở thị trấn Mèo Vạc. Hoặc có thể đặt trước ăn trưa ở nhà hàng ở ngay hẻm Tu Sản luôn.',
                    },
                    {
                        time: '14:00',
                        description: 'Lên đường quay về thành phố Hà Giang.',
                    },
                    {
                        time: '17:00',
                        description: 'Kết thúc hành trình. Đón xe về Hà Nội, thường có chuyến 4 rưỡi - 5h.',
                    },
                    {
                        time: '23:00',
                        description: 'Về đến Hà Nội.',
                    },
                ],
            },
        }
    } else {
        ALL_ITINERARY_PLANS_DATA = {

            3: {
                //  0: Ha Noi -> Cao Bang
                0: [
                    {
                        time: '21:00',
                        description:
                            'Xe giường nằm chất lượng cao của chúng tôi sẽ đón quý khách để bắt đầu hành trình đến Cao Bằng! Quý khách sẽ được đặt trên xe cabin VIP, mỗi khách có một khoang ngủ riêng tư, cá nhân.',
                    },
                    { time: '04:00', description: 'Đến Thành phố Cao Bằng, nhân viên của chúng tôi sẽ hướng dẫn quý khách nhận phòng và nghỉ ngơi.' },
                ],

                //  1: Cao Bang -> Ban Gioc Waterfall
                1: [
                    {
                        time: '8:00',
                        description:
                            'Gặp gỡ hướng dẫn viên và tài xế của Hi Hi tour. Thưởng thức bữa sáng để đảm bảo quý khách được nạp đầy năng lượng và sẵn sàng trước khi lên đường! Chúng tôi đặc biệt khuyên quý khách nên thử <b>Bánh cuốn Cao Bằng</b>, một đặc sản địa phương độc đáo có hương vị khác biệt rõ rệt so với phiên bản Hà Nội.',
                    },
                    {
                        time: '9:00',
                        description:
                            'Chúng ta sẽ đến <b>Đồi Phật Tích Trúc Lâm Bản Giốc</b>, nơi quý khách chỉ cần leo bộ một đoạn ngắn, khoảng 5 đến 10 phút, để lên đến đỉnh. Tại đây, một khung cảnh rộng lớn và rõ ràng sẽ chào đón tầm mắt quý khách, với màu xanh tươi tốt của <b>Đồi Bản Giốc</b> vào mùa hè/màu trắng vào mùa đông, nó mang một màu sắc độc đáo, nổi bật của cỏ cháy (xanh nâu).',
                    },
                    {
                        time: '10:00',
                        description:
                            'Địa điểm hùng vĩ này được ca ngợi là một trong những thác nước đẹp nhất Việt Nam, và có lẽ là đẹp nhất Đông Nam Á! Nằm ngay trên biên giới giữa Việt Nam và Trung Quốc, quý khách sẽ có thời gian chiêm ngưỡng vẻ tráng lệ của thác hoặc đi thuyền để ngắm nhìn thác nước từ cự ly gần.',
                    },
                    {
                        time: '12:00',
                        short: 'Ăn trưa',
                        description:
                            'Chúng ta sẽ dành thời gian tận hưởng một buổi đi dạo cuối cùng, thong thả quanh khu vực, ngắm nhìn những khung cảnh tráng lệ cuối cùng trong ngày. Sau đó, chúng ta sẽ quay về homestay. Quý khách vui lòng dành thời gian nhận phòng riêng, và tận hưởng sự nghỉ ngơi, thư giãn xứng đáng.',
                    },
                    {
                        time: '14:00',
                        description: `Hành trình của chúng ta tiếp tục đến Thác Bản Giốc tráng lệ. Địa điểm hùng vĩ này được ca ngợi là một trong những thác nước đẹp nhất Việt Nam—và có lẽ là đẹp nhất Đông Nam Á! Nằm ngay trên biên giới giữa Việt Nam và Trung Quốc, quý khách sẽ có thời gian chiêm ngưỡng vẻ tráng lệ của thác hoặc đi thuyền để ngắm nhìn thác nước từ cự ly gần.`,
                    },
                    {
                        time: '17:00',
                        description:
                            'Chúng ta sẽ dành thời gian tận hưởng một buổi đi dạo cuối cùng, thong thả quanh khu vực, ngắm nhìn những khung cảnh tráng lệ cuối cùng trong ngày. Sau đó, chúng ta sẽ quay về homestay để hoàn tất việc nhận phòng, ổn định chỗ nghỉ riêng, và tận hưởng sự nghỉ ngơi, thư giãn xứng đáng.',
                    },
                    {
                        time: '19:00',
                        description:
                            'Thưởng thức bữa tối tại homestay, nhâm nhi một bữa ăn nhà làm ngon miệng, chân thực, kết hợp hoàn hảo giữa hương vị truyền thống Việt Nam và tinh hoa độc đáo của vùng cao.',
                    },
                    {
                        time: 'Night time',
                        description:
                            'Dành buổi tối thư giãn, hít thở không khí trong lành, yên bình, và hoàn toàn đắm mình vào bản chất tĩnh lặng của núi rừng.',
                    },
                ],

                //  2: Ban Gioc -> Ngoan Muc Cao Bằng -> Pác Bó
                2: [
                    {
                        time: '8:00',
                        description: 'Thức dậy và sẵn sàng! Hít một hơi thật sâu không khí buổi sáng trong lành trước khi đi ăn sáng.',
                    },
                    {
                        time: '9:00',
                        description:
                            'Chúng ta sẽ đi về phía <b>Núi Thủng</b>, còn được biết đến với tên gọi nổi tiếng là <b>Mắt Thần Núi</b>.<br/>Ngọn núi có hình dạng nổi bật, khác thường, với một lỗ lớn xuyên thẳng qua đỉnh – nó thực sự trông giống như con mắt của một vị thần trong truyền thuyết nhìn xuống từ đỉnh. Chiêm ngưỡng kỳ quan thiên nhiên này, quý khách có thể cảm thấy như mình vừa bước vào một cảnh trong phim khoa học viễn tưởng.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description:
                            'Chúng ta sẽ nghỉ giải lao và dừng lại ăn trưa tại Hạ Lang. Đây là cơ hội tuyệt vời để thưởng thức ẩm thực địa phương chân thực và nạp lại năng lượng trước khi tiếp tục các cuộc phiêu lưu buổi chiều.',
                    },
                    {
                        time: '16:00',
                        description: `Chúng ta sẽ khởi hành đến <b>Suối Lênin</b>. Trên đường đi, chúng ta sẽ dành thời gian tận hưởng chuyến lái xe ngắm cảnh, dừng lại để chiêm ngưỡng những cảnh đẹp xung quanh.<br/>Suối Lênin có ý nghĩa quan trọng vì hai lý do: không chỉ nổi tiếng với làn nước trong xanh ngọc bích tuyệt đẹp, mà còn mang ý nghĩa lịch sử sâu sắc là căn cứ nơi Chủ tịch Hồ Chí Minh đã sống và làm việc trong thời kỳ kháng chiến chống ngoại xâm.`,
                    },
                    {
                        time: '17:00',
                        description:
                            'Chúng ta sẽ trở về homestay nằm ở làng Pác Bó gần đó, nơi quý khách có thể nhận phòng, thư giãn và ổn định chỗ ở.',
                    },
                    {
                        time: '19:00',
                        description: 'Thưởng thức bữa tối ngon miệng với ẩm thực đặc trưng của Cao Bằng.',
                    },
                    {
                        time: 'Night time',
                        description: `Dành thời gian thực sự thư giãn và tận hưởng không khí thanh bình của buổi tối làng quê. Quý khách có thể hít thở không khí núi rừng trong lành, suy ngẫm về những cuộc phiêu lưu trong ngày, và quan sát nhịp sống truyền thống, yên tĩnh trong cộng đồng`,
                    },
                ],

                //  3: Pác Bó - Xuân Trường -> Cao Bang City
                3: [
                    {
                        time: '8:00',
                        description: 'Thưởng thức bữa sáng trước khi lên đường khám phá các điểm đến cuối cùng trong ngày cuối cùng của hành trình.',
                    },
                    {
                        time: '10:00',
                        description:
                            'Chúng ta sẽ khởi hành đi Xuân Trường, nơi có Đèo Khau Cốc Chà hùng vĩ. Con đường tráng lệ này có tới 15 tầng quanh co đáng kinh ngạc, cho phép bạn chiêm ngưỡng toàn bộ con đường ngoạn mục phía dưới. Đó là một cảnh tượng mạnh mẽ, thể hiện cả sự hùng vĩ của thiên nhiên và sự khéo léo của con người.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Chúng ta sẽ tạm dừng hành trình để nghỉ ngơi và ăn trưa no bụng.',
                    },
                    {
                        time: '14:00',
                        description:
                            'Bây giờ chúng ta sẽ bắt đầu hành trình trở về, hướng về Thành phố Cao Bằng. Vẻ đẹp của tuyến đường này nằm ở tính linh hoạt: chúng ta sẽ giữ một lịch trình mở, thực hiện các chuyến đi vòng ngẫu hứng và dừng lại để khám phá bất kỳ viên ngọc ẩn hoặc điểm tham quan hấp dẫn nào mà chúng ta phát hiện trên đường đi. Điều này cho phép chúng ta tận hưởng trọn vẹn những khoảnh khắc cuối cùng trong cảnh quan thiên nhiên trước khi trở về với cuộc sống đô thị.',
                    },
                    {
                        time: '16:00',
                        description:
                            'Chúng ta trở về Thành phố Cao Bằng, đánh dấu sự kết thúc của hành trình. Vui lòng dành thời gian nghỉ ngơi và thư giãn trước khi lên phương tiện trở về thành phố lớn.',
                    },
                ],
            },
            2: {
                //  0: Ha Noi -> Cao Bang
                0: [
                    {
                        time: '21:00',
                        description:
                            'Xe giường nằm chất lượng cao của chúng tôi sẽ đón quý khách để bắt đầu hành trình đến Cao Bằng! Quý khách sẽ được đặt trên xe cabin VIP, mỗi khách có một khoang ngủ riêng tư, cá nhân.',
                    },
                    { time: '04:00', description: 'Đến Thành phố Cao Bằng, nhân viên của chúng tôi sẽ hướng dẫn quý khách nhận phòng và nghỉ ngơi.' },
                ],

                //  1: Cao Bang -> Lenin Stream -> Nui Thung
                1: [
                    {
                        time: '8:00',
                        description:
                            'Gặp gỡ hướng dẫn viên và tài xế của Hi Hi tour. Thưởng thức bữa sáng đơn giản nhưng ý nghĩa, nạp đầy đủ năng lượng và sẵn sàng để bị rung động bởi vẻ đẹp thiên nhiên sắp tới. Chúng tôi đặc biệt khuyên quý khách nên thử <b>Bánh cuốn Cao Bằng</b>, một đặc sản địa phương độc đáo có hương vị khác biệt rõ rệt so với phiên bản Hà Nội.',
                    },
                    {
                        time: '10:00',
                        description: `Chúng ta sẽ khởi hành đến Suối Lênin. Trên đường đi, chúng ta sẽ dành thời gian tận hưởng chuyến lái xe ngắm cảnh, dừng lại để chiêm ngưỡng những cảnh đẹp xung quanh.<br/>Suối Lênin có ý nghĩa quan trọng vì hai lý do: không chỉ nổi tiếng với làn nước trong xanh ngọc bích tuyệt đẹp, mà còn mang ý nghĩa lịch sử sâu sắc là địa điểm Chủ tịch Hồ Chí Minh đã sống và làm việc trong thời kỳ kháng chiến chống ngoại xâm.`,
                    },
                    {
                        time: '12:00',
                        short: 'Ăn trưa',
                        description:
                            'Chúng ta sẽ nghỉ ngơi thoải mái để <b>ăn trưa</b> tại một nhà hàng địa phương ở Hà Lang. Điểm dừng này nằm ở vị trí chiến lược giữa tuyến đường của chúng ta, đảm bảo chúng ta được nghỉ ngơi đầy đủ và có năng lượng trước khi đến <b>Thác Bản Giốc</b> hùng vĩ. Quý khách sẽ có thời gian thưởng thức một số món ăn địa phương ngon miệng và nạp lại năng lượng trước khi tiếp tục phần đẹp nhất của hành trình.',
                    },
                    {
                        time: '14:00',
                        description:
                            'Hành trình của chúng ta tiếp tục đến <b>Thác Bản Giốc</b> tráng lệ. Địa điểm hùng vĩ này được ca ngợi là một trong những thác nước đẹp nhất Việt Nam, và có lẽ là đẹp nhất Đông Nam Á! Nằm ngay trên biên giới giữa Việt Nam và Trung Quốc, quý khách sẽ có thời gian chiêm ngưỡng vẻ tráng lệ của thác hoặc đi thuyền để ngắm nhìn thác nước từ cự ly gần.',
                    },
                    {
                        time: '17:00',
                        description:
                            'Tối nay, chúng ta sẽ cắm trại dưới chân Núi Thủng (Mắt Thần Núi). Khu cắm trại của chúng tôi được thiết kế đủ ấm áp và trang bị để đáp ứng mọi tiện nghi sinh hoạt cơ bản.<br/>Xin lưu ý: Nếu điều kiện thời tiết không cho phép, hoặc nếu quý khách thích lựa chọn ở trong nhà hơn, chúng tôi sẽ sắp xếp ở tại một homestay thoải mái nằm trong khu vực Núi Thủng thay thế.',
                    },
                    {
                        time: '19:00',
                        description:
                            'Thưởng thức bữa tối tại homestay, nhâm nhi một bữa ăn nhà làm ngon miệng, chân thực, kết hợp hoàn hảo giữa hương vị truyền thống Việt Nam và tinh hoa độc đáo của vùng cao.',
                    },
                    {
                        time: 'Nigh time',
                        description:
                            'Dành buổi tối thư giãn, hít thở không khí trong lành, yên bình, và hoàn toàn đắm mình vào bản chất tĩnh lặng của núi rừng.',
                    },
                ],

                //  2: Núi Thủng - Ban Gioc Waterfall -> Cao Bang City
                2: [
                    {
                        time: '8:00',
                        description: 'Thưởng thức bữa sáng trước khi lên đường khám phá các điểm đến cuối cùng trong ngày cuối cùng của hành trình.',
                    },
                    {
                        time: '9:00',
                        description:
                            'Hành trình của chúng ta tiếp tục đến <b>Thác Bản Giốc</b> tráng lệ. Địa điểm hùng vĩ này được ca ngợi là một trong những thác nước đẹp nhất Việt Nam, và có lẽ là đẹp nhất Đông Nam Á! Nằm ngay trên biên giới giữa Việt Nam và Trung Quốc, quý khách sẽ có thời gian chiêm ngưỡng vẻ tráng lệ của thác hoặc đi thuyền để ngắm nhìn thác nước từ cự ly gần.',
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description:
                            'Chúng ta sẽ nghỉ giải lao và dừng lại để ăn trưa no bụng tại Hà Lang. Đây là cơ hội tuyệt vời để thưởng thức ẩm thực địa phương chân thực và nạp lại năng lượng trước khi tiếp tục các cuộc phiêu lưu buổi chiều.',
                    },
                    {
                        time: '14:00',
                        description:
                            'Bây giờ chúng ta sẽ bắt đầu hành trình trở về, hướng về Thành phố Cao Bằng. Vẻ đẹp của tuyến đường này nằm ở tính linh hoạt; chúng ta sẽ giữ một lịch trình mở, thực hiện các chuyến đi vòng ngẫu hứng và dừng lại để khám phá bất kỳ viên ngọc ẩn hoặc điểm tham quan hấp dẫn nào mà chúng ta phát hiện trên đường đi. Điều này cho phép chúng ta tận hưởng trọn vẹn những khoảnh khắc cuối cùng trong cảnh quan thiên nhiên trước khi trở về với cuộc sống đô thị.',
                    },
                    {
                        time: '17:00',
                        description:
                            'Chúng ta trở về Thành phố Cao Bằng, đánh dấu sự kết thúc của hành trình. Vui lòng dành thời gian nghỉ ngơi và thư giãn trước khi lên phương tiện trở về thành phố lớn.',
                    },
                ],
            },
        }
    }
} else {
    if (isTaiwan) {
        ALL_ITINERARY_PLANS_DATA = makeTaiwanItinerary(false)
    } else if (isHue) {
        ALL_ITINERARY_PLANS_DATA = window.hihiHueItineraryData || {}
    } else if (isMuCangChai) {
        ALL_ITINERARY_PLANS_DATA = {
            3: {
                // Day 0: Hanoi -> Tu Le
                0: [
                    {
                        time: '21:00',
                        description: 'Hanoi - Tu Le sleeper bus. This bus will go all the way to Lai Chau, you can stop in Nghia Lo, Tu Le or Mu Cang Chai depending on your preference.',
                    },
                    {
                        time: '05:30',
                        description: 'To Tu Le',
                    },
                ],

                // Day 1: Explore Tu Le
                1: [
                    {
                        time: '06:00',
                        description: "Have breakfast. Try the famous Tú Lệ sticky rice dish if it's the right season for young rice flakes.",
                    },
                    {
                        time: '07:00',
                        description: 'Motorbike rentals are available at many shops along Tu Le market, with similar prices; choose whichever one you like. 180k/day (calculated for the day, not 24 hours).',
                    },
                    {
                        time: '09:00',
                        description: 'After dropping off our belongings at the homestay, we asked the owner where we should go next.',
                    },
                    {
                        time: '11:00',
                        description: "Follow the small paths uphill, into the villages surrounding Tú Lệ. Don't go all the way to Lùng Cúng; the road is bad and it's far away.",
                    },
                    {
                        time: '15:00',
                        description: 'Going to Tiger Mountain. The road is very narrow and slippery, with many dirt sections. Consider this carefully, the view is also...',
                    },
                    {
                        time: '19:00',
                        description: 'Having dinner at the homestay.',
                    },
                    {
                        time: '21:00',
                        description: "We'll just have to entertain ourselves because there aren't many activities here in the evening.",
                    },
                ],

                // Day 2: Explore Mu Cang Chai
                2: [
                    {
                        time: '08:00',
                        description: 'Have breakfast',
                    },
                    {
                        time: '10:00',
                        description: 'On the way to Mu Cang Chai, we crossed the Khau Pha Pass. We stopped at the top of the pass to admire the view.',
                    },
                    {
                        time: '12:00',
                        short: 'Lunch time',
                        description: 'Lunch in town',
                    },
                    {
                        time: '13:00',
                        description: 'Check in at the homestay. Ask the homestay owner where we should go next.',
                    },
                    {
                        time: '14:00',
                        description: 'Go up to Mo De to see the flowers. The last 3km are extremely bad; you need a local to drive you through them.',
                    },
                    {
                        time: '16:00',
                        description: 'Wandering around aimlessly. Still have time to spare, so head straight down to Kim Noi.',
                    },
                    {
                        time: 'Night time',
                        description: 'Dinner in town',
                    },
                ],

                // Day 3: Back to Hanoi
                3: [
                    {
                        time: '08:00',
                        description: 'Have breakfast',
                    },
                    {
                        time: '10:00',
                        description: 'When going to Lao Chai, stop at the incredibly beautiful Khau Mang Thuong hydroelectric power plant.',
                    },
                    {
                        time: '13:00',
                        description: 'Lunch, check out',
                    },
                    {
                        time: '14:00',
                        description: 'Take a bus back to Hanoi.',
                    },
                    {
                        time: '21:00',
                        description: 'Back in Hanoi',
                    },
                ],
            },
        }
    } else if (isHaGiang) {
        ALL_ITINERARY_PLANS_DATA = {
            4: {
                // Day 0: Hanoi -> Ha Giang
                0: [
                    {
                        time: '21:00',
                        description: 'Board the sleeper bus to Ha Giang.',
                    },
                    {
                        time: '03:00',
                        description: 'Arrive at the city center. Rest at the motorbike rental accommodation.',
                    },
                ],

                //  1: Ha Giang -> Dong Van
                1: [
                    {
                        time: '08:00',
                        description: 'Breakfast.',
                    },
                    {
                        time: '09:00',
                        description: 'Travel from Ha Giang City to Quan Ba and Yen Minh. Stop anywhere that looks interesting.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Lunch in Yen Minh Town.',
                    },
                    {
                        time: '14:00',
                        description: 'Travel from Yen Minh to Dong Van.',
                    },
                    {
                        time: '17:00',
                        description: 'Arrive in Dong Van. Check in to the homestay.',
                    },
                    {
                        time: '19:00',
                        description: 'Dinner in Dong Van Old Quarter at local restaurants. Try black chicken hotpot, thang co, and local snacks.',
                    },
                    {
                        time: 'Night time',
                        description: 'At night, especially on weekends, Dong Van has campfires, singing, and dancing activities. Walking around the old quarter is also enjoyable, and local massage services are available in town.',
                    },
                ],

                //  2: Dong Van -> Meo Vac (near Nho Que River)
                2: [
                    {
                        time: '08:00',
                        description: 'Breakfast in Dong Van.',
                    },
                    {
                        time: '09:00',
                        description: 'Cross Ma Pi Leng Pass, one of the four greatest mountain passes in Vietnam. Stop at the top for scenic views.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Lunch stop in Meo Vac Town.',
                    },
                    {
                        time: '14:00',
                        description: 'Head to the Nho Que River boat station. Boat ticket: around 120,000 VND per person for a 30–45 minute ride.',
                    },
                    {
                        time: '15:00',
                        description: 'Explore the surrounding area and take any beautiful roads along the way.',
                    },
                    {
                        time: '17:00',
                        description: "Return to the homestay. You can stay in the H'Mong tourism village or in town, about 3 km apart.",
                    },
                    {
                        time: '19:00',
                        description: 'Dinner at the homestay or in town.',
                    },
                    {
                        time: 'Night time',
                        description: 'Meo Vac is quieter and more peaceful than Dong Van, though cultural exchange activities are still available.',
                    },
                ],

                //  3: Meo Vac -> Du Gia Village
                3: [
                    {
                        time: '08:00',
                        description: 'If it is Sunday, visit the Meo Vac weekend market. One of the largest highland markets in Ha Giang with unique local products and delicious traditional breakfast dishes such as pork pho, black chicken pho, and sticky rice.',
                    },
                    {
                        time: '10:00',
                        description: 'Travel to Du Gia via the M-shaped curve road.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Lunch at the M-shaped curve viewpoint with a beautiful view.',
                    },
                    {
                        time: '14:00',
                        description: 'Continue to Du Gia.',
                    },
                    {
                        time: '16:00',
                        description: 'Arrive in Du Gia and check in to the homestay. Visit Du Gia Waterfall if you would like to swim.',
                    },
                    {
                        time: '17:00 - 18:00',
                        description: 'Return to the homestay for dinner.',
                    },
                    {
                        time: 'Night time',
                        description: 'Walk around Du Gia Village. There are several cafes and even underground bars where people often sing karaoke.',
                    },
                ],

                //  4: Du Gia Village -> Ha Giang City
                4: [
                    {
                        time: '08:00',
                        description: 'Breakfast in Du Gia.',
                    },
                    {
                        time: '09:00',
                        description: 'Return to the city following Google Maps. Ask the homestay which roads are in good condition and free from landslides.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Lunch.',
                    },
                    {
                        time: '13:00',
                        description: 'Visit Km0 landmark for photos. This time is usually less crowded and good for pictures.',
                    },
                    {
                        time: '17:00',
                        description: 'End of the journey. Take the bus back to Hanoi. Most buses depart around 4:30 PM – 5:00 PM.',
                    },
                    {
                        time: '23:00',
                        description: 'Arrive in Hanoi.',
                    },
                ],
            },
            3: {
                // Day 0: Hanoi -> Ha Giang
                0: [
                    {
                        time: '21:00',
                        description: 'Board the sleeper bus to Ha Giang.',
                    },
                    {
                        time: '03:00',
                        description: 'Arrive at the city center. Rest at the motorbike rental accommodation.',
                    },
                ],

                // Day 1: Ha Giang -> Dong Van
                1: [
                    {
                        time: '08:00',
                        description: 'Have breakfast.',
                    },
                    {
                        time: '09:00',
                        description: 'Travel from Ha Giang City to Quan Ba to Yen Minh. Stop anywhere you like along the way.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Have lunch in Yen Minh town.',
                    },
                    {
                        time: '14:00',
                        description: 'Continue from Yen Minh to Dong Van.',
                    },
                    {
                        time: '17:00',
                        description: 'Arrive in Dong Van and check in to the homestay.',
                    },
                    {
                        time: '19:00',
                        description: 'Have dinner in Dong Van Old Quarter at local restaurants. Try black chicken hotpot, thang co, and local street snacks.',
                    },
                    {
                        time: 'Night time',
                        description: 'In the evening, especially on weekends, Dong Van often has campfires where people sing and dance together. Walking around the small old quarter is also enjoyable, and you can even get a massage at local houses in the area.',
                    },
                ],

                // Day 2: Dong Van -> Du Gia
                2: [
                    {
                        time: '08:00',
                        description: 'Have breakfast in Dong Van.',
                    },
                    {
                        time: '09:00',
                        description: 'Cross Ma Pi Leng Pass, one of the four greatest mountain passes in Vietnam. It is incredibly beautiful. You can stop at the top of the pass to enjoy the view.',
                    },
                    {
                        time: '11:00',
                        description: 'Go down to the Nho Que River boat station. Ticket price is around 120,000 VND per person, and the boat ride lasts about 30 to 45 minutes.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Have lunch in Meo Vac town, or pre-order lunch at a restaurant near Tu San Alley.',
                    },
                    {
                        time: '14:00',
                        description: 'Head back to Du Gia.',
                    },
                    {
                        time: '16:00',
                        description: 'Check in to the homestay. If you arrive early and have extra time, visit Du Gia Waterfall where you can swim and relax.',
                    },
                    {
                        time: '19:00',
                        description: 'Have dinner at the homestay.',
                    },
                    {
                        time: 'Night time',
                        description: 'You can walk around Du Gia village. There are a few cafes and even some basement bars where people often sing karaoke.',
                    },
                ],

                // Day 3: Du Gia -> Ha Giang City
                3: [
                    {
                        time: '08:00',
                        description: 'Have breakfast in Du Gia.',
                    },
                    {
                        time: '09:00',
                        description: 'Return to the city following Google Maps. Ask your homestay which roads are currently safe and free from landslides before departing.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Have lunch.',
                    },
                    {
                        time: '16:00',
                        description: 'Arrive back in Ha Giang City and stop by Km0 for check-in photos. This time of day is usually less crowded and very beautiful.',
                    },
                    {
                        time: '17:00',
                        description: 'End of the journey. Take the bus back to Hanoi, usually departing around 4:30 PM to 5:00 PM.',
                    },
                    {
                        time: '23:00',
                        description: 'Arrive back in Hanoi.',
                    },
                ],
            },

            2: {
                // Day 0: Hanoi -> Ha Giang
                0: [
                    {
                        time: '21:00',
                        description: 'Board the sleeper bus to Ha Giang.',
                    },
                    {
                        time: '03:00',
                        description: 'Arrive at the city center. Rest at the motorbike rental accommodation.',
                    },
                ],

                // Day 1: Ha Giang -> Dong Van
                1: [
                    {
                        time: '08:00',
                        description: 'Have breakfast.',
                    },
                    {
                        time: '09:00',
                        description: 'Travel from Ha Giang City to Quan Ba to Yen Minh. Stop anywhere you like for sightseeing and photos.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Have lunch in Yen Minh town.',
                    },
                    {
                        time: '14:00',
                        description: 'Pass through Tham Ma Slope. There are many tourists here. Stop anywhere you like for photos.',
                    },
                    {
                        time: '15:00',
                        description: 'Continue to Lung Cu Flag Tower. At the foot of the tower is Lo Lo Chai Village where you can walk around and relax.',
                    },
                    {
                        time: '17:00',
                        description: 'Arrive in Dong Van and check in to the homestay.',
                    },
                    {
                        time: '19:00',
                        description: 'Have dinner in Dong Van Old Quarter at local restaurants. Try local specialties and street food.',
                    },
                    {
                        time: 'Night time',
                        description: 'In the evening, especially on weekends, Dong Van often has campfires, music, and dancing activities. Walking around the old quarter is also very enjoyable.',
                    },
                ],

                // Day 2: Dong Van -> Meo Vac (near Nho Que River) -> Ha Giang
                2: [
                    {
                        time: '08:00',
                        description: 'Have breakfast in Dong Van.',
                    },
                    {
                        time: '09:00',
                        description: 'Go down to the Nho Que River boat station. The ticket costs around 120,000 VND per person and the boat trip lasts about 30 to 45 minutes.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'Have lunch in Meo Vac town, or pre-order lunch at a restaurant near Tu San Alley.',
                    },
                    {
                        time: '14:00',
                        description: 'Start the journey back to Ha Giang City.',
                    },
                    {
                        time: '17:00',
                        description: 'End of the trip. Take the bus back to Hanoi, usually departing around 4:30 PM to 5:00 PM.',
                    },
                    {
                        time: '23:00',
                        description: 'Arrive back in Hanoi.',
                    },
                ],
            },
        }
    } else {

        ALL_ITINERARY_PLANS_DATA = {
            3: {
                //  0: Ha Noi -> Cao Bang
                0: [
                    {
                        time: '21:00',
                        description:
                            'Our high-quality sleeper bus will pick you up to commence your journey to Cao Bang! You will be booked on a VIP cabin bus, where each guest enjoys a private, individual sleeping compartment.',
                    },
                    { time: '04:00', description: 'Arrives in Cao Bang City, our staff guide you to check in and rest.' },
                ],

                //  1: Cao Bang -> Ban Gioc Waterfall
                1: [
                    {
                        time: '8:00',
                        description:
                            'Meet up with Hi Hi tour guide and your drivers. Enjoy breakfast to ensure you’re fully fueled and happy before heading to the road! We highly recommend trying <b>Bánh cuốn Cao Bằng</b> (Cao Bang steamed rice rolls), a unique local specialty that tastes distinctly different from the Hanoi version.',
                    },
                    {
                        time: '9:00',
                        description:
                            'We will take you to <b>Phật Tích Trúc Lâm Bản Giốc Hill</b> where you only need to take a short climb, which takes about 5 to 10 minutes, to reach the summit. Once there, a clear and expansive view will greet your eyes, with the lush green of <b>Ban Gioc Hill</b> (green-brown) during the summer/white in the winter, it takes on a striking, unique color of burnt grass (green-brown).',
                    },
                    {
                        time: '10:00',
                        description:
                            "This majestic site is celebrated as one of Vietnam's most beautiful waterfalls, and perhaps even the most beautiful in Southeast Asia! Located right on the border between Vietnam and China, you will have time to simply gaze upon its grandeur or take a boat ride for an up-close view of the cascades.",
                    },
                    {
                        time: '12:00',
                        short: 'Lunch time',
                        description:
                            'We will take time enjoying a final, leisurely stroll around the area, soaking up the last magnificent views of the . Afterward, we will head back to the homestay. Please take some time to settle into your private room, and enjoy some well-deserved rest and relaxation.',
                    },
                    {
                        time: '14:00',
                        description: `Our journey continues to the magnificent Ban Gioc Waterfall. This majestic site is celebrated as one of Vietnam's most beautiful waterfalls—and perhaps even the most beautiful in Southeast Asia! Located right on the border between Vietnam and China, you will have time to simply gaze upon its grandeur or take a boat ride for an up-close view of the cascades.`,
                    },
                    {
                        time: '17:00',
                        description:
                            'We will take our time enjoying a final, leisurely stroll around the area, soaking up the last magnificent views of the . Afterward, we will head back to the homestay to complete your check-in, settle into your private room, and enjoy some well-deserved rest and relaxation.',
                    },
                    {
                        time: '19:00',
                        description:
                            'Enjoy dinner at the homestay, savoring a delicious, authentic home-cooked meal that perfectly blends traditional Vietnamese flavors with the unique essence of the highlands.',
                    },
                    {
                        time: 'Night time',
                        description:
                            'Spend the evening relaxing, breathing in the fresh, peaceful air, and fully immersing yourself in the tranquil essence of the mountains and forests.',
                    },
                ],

                //  2: Ban Gioc -> Ngoan Muc Cao Bằng -> Pác Bó
                2: [
                    {
                        time: '8:00',
                        description: 'Rise and shine! Take a deep breath of the fresh morning air before heading out for breakfast.',
                    },
                    {
                        time: '9:00',
                        description:
                            "We head toward <b>Núi Thủng (God's Eye Mountain)</b>, also famously known as <b>Mắt Thần Núi (God's Eye Mountain)</b>.<br/>The mountain has a striking, unusual shape, featuring a massive hole pierced straight through its crest—it truly looks like a mythical god's eye viewed upon the peak. Viewing this natural wonder, you might feel as though you've stepped right into a scene from science fiction.",
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            "We will take a break and stop for a satisfying lunch in Hạ Lang. This is a great opportunity to enjoy authentic local cuisine and recharge our energy before continuing with the afternoon's adventures.",
                    },
                    {
                        time: '16:00',
                        description: `We will set off for <b>Lenin Stream (Suối Lênin)</b>. Along the way, we'll take our time to enjoy the scenic drive, making stops to admire the beautiful sights around us.<br/>Lenin Stream is significant for two reasons: not only is it renowned for its stunning, clear jade-blue water, but it also holds profound historical meaning as the base where President Hồ Chí Minh lived and worked during the national resistance against foreign powers.`,
                    },
                    {
                        time: '17:00',
                        description:
                            'We will return to the homestay located in the nearby Pác Bó village, where you can check in, relax, and settle into your accommodation.',
                    },
                    {
                        time: '19:00',
                        description: "Enjoy a delightful dinner featuring Cao Bằng's distinctive cuisine.",
                    },
                    {
                        time: 'Night time',
                        description: `Take the time to truly unwind and enjoy the serene atmosphere of the local village evening. You can breathe the crisp, fresh mountain air, reflect on the 's adventures, and observe the quiet, traditional rhythm of life in the community`,
                    },
                ],

                //  3: Pác Bó - Xuân Trường -> Cao Bang City
                3: [
                    {
                        time: '8:00',
                        description: 'Enjoy breakfast before setting off to explore the final destinations on the last  of our journey.',
                    },
                    {
                        time: '10:00',
                        description:
                            'We will depart for Xuân Trường, home to the epic Khau Cốc Chà Pass. This majestic road features an incredible 15 winding tiers, allowing you to witness the entire dramatic pathway below. It is a powerful scene that showcases both the grandeur of nature and the ingenuity of humankind.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'We will pause our journey now for a brief rest and a satisfying lunch',
                    },
                    {
                        time: '14:00',
                        description:
                            'We will now begin our journey back, heading towards Cao Bằng city. The beauty of this route lies in its flexibility: we will keep an open itinerary, taking spontaneous detours and stopping to explore any hidden gems or intriguing sights we discover along the way. This allows us to fully savor our final moments in the natural landscape before returning to urban life',
                    },
                    {
                        time: '16:00',
                        description:
                            'We return to Cao Bằng city, marking the conclusion of our journey. Please take some time to rest and relax before boarding your transportation back to the main city.',
                    },
                ],
            },
            2: {
                //  0: Ha Noi -> Cao Bang
                0: [
                    {
                        time: '21:00',
                        description:
                            'Our high-quality sleeper bus will pick you up to commence your journey to Cao Bang! You will be booked on a VIP cabin bus, where each guest enjoys a private, individual sleeping compartment.',
                    },
                    { time: '04:00', description: 'Arrives in Cao Bang City, our staff guide you to check in and rest.' },
                ],

                //  1: Cao Bang -> Lenin Stream -> Nui Thung
                1: [
                    {
                        time: '8:00',
                        description:
                            'Meet up with Hi Hi tour guide and your drivers. Enjoy a simple yet meaningful breakfast, fully charging your energy and ready to be moved by the upcoming natural beauty. We highly recommend trying <b>Bánh cuốn Cao Bằng</b> (Cao Bang steamed rice rolls), a unique local specialty that tastes distinctly different from the Hanoi version.',
                    },
                    {
                        time: '10:00',
                        description: `We will set off for Lenin Stream (Suối Lê Nin). Along the way, we'll take our time to enjoy the scenic drive, making stops to admire the beautiful sights around us.<br/>Lenin Stream is significant for two reasons: not only is it renowned for its stunning, clear jade-blue water, but it also holds profound historical meaning as the site where President Hồ Chí Minh lived and worked during the national resistance against foreign powers.`,
                    },
                    {
                        time: '12:00',
                        short: 'Lunch time',
                        description:
                            'We will take a pleasant break for <b>lunch</b> at a local restaurant in Ha Lan. This stop is strategically located midway on our route, ensuring we are well-rested and energized before reaching the majestic <b>Ban Gioc Waterfall</b>. You’ll have time to savor some delicious local cuisine and recharge before continuing the most scenic part of our journey.',
                    },
                    {
                        time: '14:00',
                        description:
                            "Our journey continues to the magnificent <b>Ban Gioc Waterfall</b>. This majestic site is celebrated as one of Vietnam's most beautiful waterfalls, and perhaps even the most beautiful in Southeast Asia! Located right on the border between Vietnam and China, you will have time to simply gaze upon its grandeur or take a boat ride for an up-close view of the cascades.",
                    },
                    {
                        time: '17:00',
                        description:
                            "Tonight, we will be camping at the foot of Núi Thủng (God's Eye Mountain). Our campsite is designed to be adequately warm and equipped to meet all basic living amenities.<br/>Please note: If weather conditions do not permit, or if you prefer an indoor option, we will arrange to stay at a comfortable homestay located in the Núi Thủng area instead.",
                    },
                    {
                        time: '19:00',
                        description:
                            'Enjoy dinner at the homestay, savoring a delicious, authentic home-cooked meal that perfectly blends traditional Vietnamese flavors with the unique essence of the highlands.',
                    },
                    {
                        time: 'Nigh time',
                        description:
                            'Spend the evening relaxing, breathing in the fresh, peaceful air, and fully immersing yourself in the tranquil essence of the mountains and forests.',
                    },
                ],

                //  2: Núi Thủng - Ban Gioc Waterfall -> Cao Bang City
                2: [
                    {
                        time: '8:00',
                        description: 'Enjoy breakfast before setting off to explore the final destinations on the last  of our journey.',
                    },
                    {
                        time: '9:00',
                        description:
                            "Our journey continues to the magnificent <b>Ban Gioc Waterfall</b>. This majestic site is celebrated as one of Vietnam's most beautiful waterfalls, and perhaps even the most beautiful in Southeast Asia! Located right on the border between Vietnam and China, you will have time to simply gaze upon its grandeur or take a boat ride for an up-close view of the cascades.",
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            "We will take a break and stop for a satisfying lunch in Ha Lan. This is a great opportunity to enjoy authentic local cuisine and recharge our energy before continuing with the afternoon's adventures.",
                    },
                    {
                        time: '14:00',
                        description:
                            'We will now begin our journey back, heading towards Cao Bang City. The beauty of this route lies in its flexibility; we will keep an open itinerary, taking spontaneous detours and stopping to explore any hidden gems or intriguing sights we discover along the way. This allows us to fully savor our final moments in the natural landscape before returning to urban life.',
                    },
                    {
                        time: '17:00',
                        description:
                            'We return to Cao Bang City, marking the conclusion of our journey. Please take some time to rest and relax before boarding your transportation back to the main city.',
                    },
                ],
            },
        }
    }
}

;(function ($) {
    $(document).ready(function () {
        if (isCatBa) return

        const $tabsContainer = $('#itinerary-tabs')
        const $timelineList = $('#timeline-list')
        const $priceByPlan = $('#price-per-plan')
        const $pricingIncludes = $('.pricing-include')
        let currentPlan = null

        // --- MỚI: Lấy plan từ URL ---
        const urlParams = new URLSearchParams(window.location.search)
        const planParam = urlParams.get('plan')

        // Xác định plan khởi tạo
        let initialPlan = planParam && ALL_ITINERARY_PLANS_DATA[planParam] ? planParam : isTaiwan ? '8' : isHue ? (window.hihiHueDefaultPlan || 'hue_only_4') : isMuCangChai ? '3' : isHaGiang ? '4' : '3'

        let ITINERARY_DATA = ALL_ITINERARY_PLANS_DATA[initialPlan]
        // ---------------------------

        function renderTimeline(Index = 0) {
            const data = ITINERARY_DATA[Index]
            if (!data) return $timelineList.html('<li class="p-4">No itinerary data available.</li>')

            let html = ''
            data.forEach((item, index) => {
                const isFirstOrLast = index === 0 || index === data.length - 1
                const dotStyle = isFirstOrLast ? 'block' : 'none'
                let dotTopPos = index === data.length - 1 ? '18px' : '-8px'
                const marginBottom = index === data.length - 1 ? '0' : '40px'

                html += `
                    <li class="relative" style="margin-bottom: ${marginBottom}">
                        <div class="flex items-start">
                            <div class="absolute w-2 h-2 bg-[#74797A] rounded-full left-[93px] z-10" 
                                 style="display: ${dotStyle}; top: ${dotTopPos};"></div>
                            <div class="flex items-start gap-16">
                                <div class="flex flex-col space-y-2 min-w-20">
                                    <time class="block mt-1" style="font-family:'Inter',sans-serif;font-size:15px;line-height:24px;font-weight:600;color:#1D292C;">${item.time}</time>
                                    ${item.short ? `<small style="font-family:'Inter',sans-serif;font-size:12px;line-height:20px;color:rgba(29,41,44,.7);">${item.short}</small>` : ''}
                                </div>
                                <p style="font-family:'Inter',sans-serif;font-size:15px;line-height:24px;font-weight:400;color:#1D292C;">${item.description}</p>
                            </div>
                        </div>
                    </li>`
            })
            $timelineList.html(html)
        }

        function renderTabs(totals) {
            let tabsHtml = ''
            for (let i = 0; i <= totals; i++) {
                const isActive = i === 0
                const isLast = i === totals
                const dayNumber = isTaiwan ? i + 1 : i
                const borderClasses = `${i === 0 ? 'rounded-tl-xl' : ''} ${isLast ? 'rounded-tr-xl' : ''}`
                const dayLabel = (window.hihiItineraryLabels && window.hihiItineraryLabels.day) || (vi ? 'ngày' : 'day')

                tabsHtml += `
                    <li class="w-full flex-1 ${borderClasses}">
                        <a data--index="${i}" class="inline-flex items-center justify-center cursor-pointer w-full tab-link"
                           style="min-height:48px;font-family:'Inter',sans-serif;font-size:15px;line-height:24px;font-weight:600;background:${isActive ? '#7B63F7' : '#F9FBDF'};color:${isActive ? '#F2F2F0' : '#1D292C'};">${dayLabel} ${dayNumber}</a>
                    </li>`
            }
            $tabsContainer.html(tabsHtml)
            bindTabClickEvent()
            renderTimeline(0)
        }

        function bindTabClickEvent() {
            $tabsContainer
                .find('.tab-link')
                .off('click')
                .on('click', function () {
                    $tabsContainer.find('.tab-link').css({
                        background: '#F9FBDF',
                        color: '#1D292C',
                    })
                    $(this).css({
                        background: '#7B63F7',
                        color: '#F2F2F0',
                    })
                    renderTimeline($(this).data('-index'))
                })
        }

        function bindPillClickEvent() {
            $('#itinerary-plans').on('click', '.plan-pill', function () {
                const planValue = $(this).data('plan-value').toString()
                $('.plan-pill').removeClass('text-[#F2F2F0]').addClass('text-[#1D292C]').css({
                    background: 'transparent',
                    border: '1px solid #1D292C99',
                    color: '#1D292C',
                })
                $(this).removeClass('text-[#1D292C]').addClass('text-[#F2F2F0]').css({
                    background: '#7B63F7',
                    border: '1px solid #7B63F7',
                    color: '#F2F2F0',
                })

                if (ALL_ITINERARY_PLANS_DATA[planValue]) {
                    ITINERARY_DATA = ALL_ITINERARY_PLANS_DATA[planValue]
                    currentPlan = planValue
                    renderPrice(planValue)
                    renderTabs(Object.keys(ITINERARY_DATA).length - 1)
                }
            })
        }

        function getPricingItemTotal($item, plan) {
            const unit = $item.data('unit')
            const price = Number($item.data(vi ? 'vnd' : 'usd')) || 0
            const planDaysMatch = String(plan).match(/_(\d+)$/)
            const planDays = planDaysMatch ? Number(planDaysMatch[1]) : Number(plan)
            const travelDays = Math.max((planDays || 0) - 1, 0)

            if (unit === 'all') return price
            if (unit === 'meal') return price * travelDays * 3
            if (unit === 'day') return price * travelDays
            return price
        }

        function isPricingItemApplicable($item, plan) {
            const scope = $item.data('plan-scope') || 'all'
            if (scope === 'all') return true
            if (scope === 'central') return String(plan).indexOf('central_') === 0
            if (scope === 'hue_core') return String(plan).indexOf('hue_only_') === 0 || String(plan).indexOf('central_') === 0
            return true
        }

        function updatePricingItemAvailability(plan) {
            $pricingIncludes.each(function () {
                const $item = $(this)
                const applicable = isPricingItemApplicable($item, plan)
                $item.prop('disabled', !applicable)
                $item.closest('.pricing-item-row').toggle(applicable)
            })
        }

        function renderPrice(plan) {
            const fixedPrice = $priceByPlan.data('fixed-price')
            if (fixedPrice) {
                $priceByPlan.text(fixedPrice)
                return
            }
            if ($pricingIncludes.length) {
                updatePricingItemAvailability(plan)
                let total = 0
                $pricingIncludes.each(function () {
                    const $item = $(this)
                    if ($item.is(':checked') && isPricingItemApplicable($item, plan)) {
                        total += getPricingItemTotal($item, plan)
                    }
                })
                $priceByPlan.text(vi ? `${total.toLocaleString('vi-VN')} VNĐ` : `${total.toLocaleString('en-US')} USD`)
                return
            }
            let html = vi ? `${(Number(plan) * 1500000).toLocaleString('vi-VN')} VNĐ` : `${(Number(plan) * 65).toLocaleString('en-US')} USD`
            $priceByPlan.text(html)
        }

        $pricingIncludes.on('change', function () {
            const $item = $(this)
            if ($item.is(':checked') && $item.data('type') === 'easy-driver') {
                $pricingIncludes.filter('[data-type="motorbike"]').prop('checked', false)
            }
            if ($item.is(':checked') && $item.data('type') === 'motorbike') {
                $pricingIncludes.filter('[data-type="easy-driver"]').prop('checked', false)
            }
            if ($item.is(':checked') && $item.data('type') === 'long-transport') {
                $pricingIncludes.filter('[data-type="long-transport"]').not($item).prop('checked', false)
            }
            renderPrice(currentPlan || initialPlan)
        })

        // --- KHỞI CHẠY LẦN ĐẦU ---
        bindPillClickEvent()

        // Highlight pill tương ứng với initialPlan
        $(`.plan-pill[data-plan-value="${initialPlan}"]`).trigger('click')

        // Nếu trigger click không hoạt động do cấu trúc HTML, dùng trực tiếp:
        currentPlan = initialPlan
        renderPrice(initialPlan)
        renderTabs(Object.keys(ITINERARY_DATA).length - 1)
    })
})(jQuery)
