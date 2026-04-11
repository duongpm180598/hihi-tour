const pathname = window.location.pathname

const isCatBa = pathname.includes('/cat-ba-tour')
const isHaGiang = pathname.includes('/ha-giang-tour')
const vi = pathname.includes('/vi')

let ALL_ITINERARY_PLANS_DATA = {}

if (vi) {
    if (isHaGiang) {
        ALL_ITINERARY_PLANS_DATA = {
            4: {
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
                        description: `Thưởng thức bữa tối ngon miệng tại một nhà hàng địa phương, nếm thử các đặc sản núi rừng ngon nhất của khu vực. Nếu bạn có thể uống, chúng tôi rất sẵn lòng chia sẻ vài chén vui vẻ cùng nhau. Hà Giang nổi tiếng với các loại rượu tự nấu độc đáo ủ từ nguyên liệu rừng, như rượu ngô men lá hoặc rượu chuối. Nếu bạn không uống rượu, điều đó hoàn toàn ổn—chúng tôi chỉ đơn giản mời bạn đắm mình vào không khí nhộn nhịp và sự đồng hành tốt đẹp xung quanh chúng ta.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'Buổi tối là của bạn! Tản bộ qua Phố cổ Đồng Văn dưới ánh sao. Hầu như mỗi đêm, bạn sẽ bắt gặp một buổi giao lưu văn hóa cộng đồng sôi động với âm nhạc và lửa trại, hoặc bạn có thể tìm một góc yên tĩnh để uống một ly và suy ngẫm về những cảnh tượng tuyệt vời trong ngày.',
                    },
                ],

                // Ngày 2: Đồng Văn -> Mèo Vạc (Gần Sông Nho Quế)
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
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Chúng ta dừng lại ở Thị trấn Mèo Vạc để ăn trưa.',
                    },
                    {
                        time: '14:00',
                        description: `Trải nghiệm trái tim Hà Giang - Sông Nho Quế. Đây là điểm đến bạn không thể bỏ lỡ! Chúng ta sẽ đi xuống bến thuyền để tận hưởng chuyến đi trên Sông Nho Quế. Trên bờ sông sừng sững một ngọn núi cao từ 700 đến 900 mét, tạo thành hẻm vực Tu Sản. Đứng dưới lòng sông, bạn sẽ cảm thấy một sự nhỏ bé trước thiên nhiên hùng vĩ như vậy. Đặc biệt vào mùa Thu và Đông, nước sông mang một màu xanh ngọc bích độc đáo, tuyệt đẹp.`,
                    },
                    {
                        time: '15:00',
                        description:
                            'Sau khi lên bờ, chúng ta sẽ dành thời gian đi dạo quanh, ngắm cảnh, hoặc chụp ảnh những khung cảnh tuyệt đẹp xung quanh.',
                    },
                    {
                        time: '17:00',
                        description: `Nhận phòng tại homestay yên bình ở Mèo Vạc. Dành chút thời gian để thư giãn và cảm nhận không khí tĩnh lặng, đối lập với không khí sôi động hơn ở Đồng Văn.`,
                    },
                    {
                        time: '19:00',
                        description: `Thưởng thức bữa tối ngon miệng với ẩm thực đặc trưng của Mèo Vạc.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'Buổi tối ở Mèo Vạc mang lại cảm giác thân mật và yên bình hơn. Đặc biệt vào cuối tuần, bạn thường có cơ hội tham gia các buổi biểu diễn văn hóa nhỏ và lửa trại, mang đến hương vị đậm đà của văn hóa vùng cao Việt Nam.',
                    },
                ],

                // Ngày 3: Mèo Vạc -> Làng Du Già
                3: [
                    {
                        time: '08:00',
                        description: `Nếu chuyến đi của bạn rơi vào Chủ Nhật, chúng ta sẽ bắt đầu ngày mới bằng việc ghé thăm Chợ phiên Mèo Vạc—một trong những chợ vùng cao lớn và sôi động nhất. Đây là một cuộc tụ họp lớn của người dân địa phương trong trang phục truyền thống, trao đổi hàng hóa và duy trì các phong tục độc đáo. Hãy dùng bữa sáng ngay tại chợ cùng chúng tôi để cảm nhận năng lượng nhộn nhịp và nét quyến rũ chân thực, hiếm có này.`,
                    },
                    {
                        time: '10:00',
                        description: `Sau khi nói lời tạm biệt Mèo Vạc (hoặc sau bữa sáng nếu không phải Chủ Nhật), chúng ta sẽ lên đường hướng về Du Già. Tuyến đường của chúng ta sẽ đi qua những con đường nhỏ uốn lượn qua các thôn bản, nơi bạn có thể tận mắt chứng kiến cảnh quan của những cánh đồng lúa và đồi hoa theo mùa, mang lại cảm giác thư giãn và khám phá liên tục.`,
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: `Chúng ta sẽ dừng lại ăn trưa tại một điểm ngắm cảnh nổi tiếng: Đường hình chữ M. Từ đây, bạn sẽ thấy con đường uốn lượn nhẹ nhàng như một sợi chỉ thêu vắt ngang sườn núi. Bữa trưa tại đây mang đến một trải nghiệm vừa ngon miệng vừa mãn nhãn.`,
                    },
                    {
                        time: '14:00',
                        description: `Chúng ta tiếp tục hành trình hướng về Du Già. Trên đường đi, chúng ta sẽ vui vẻ rẽ ngang để đảm bảo không bỏ lỡ bất kỳ vẻ đẹp thiên nhiên bất ngờ nào mà núi rừng ban tặng.`,
                    },
                    {
                        time: '16:00',
                        description: `Đến homestay Du Già, nhanh chóng nhận phòng và đi thẳng đến Thác Du Già. Nước tự nhiên ở đây luôn trong vắt và lạnh buốt, thác khá rộng, rất thích hợp để bạn thỏa sức bơi lội và thư giãn. (Đừng quên đồ bơi để tận hưởng trọn vẹn sự sảng khoái này!)`,
                    },
                    {
                        time: '17:00 - 18:00',
                        description: `Trở về homestay. Tắm rửa và cùng nhau thưởng thức bữa tối với các món ăn "cây nhà lá vườn" đậm đà hương vị địa phương, tạo ra một cảm giác ấm cúng, như ở nhà. Buổi tối ở Du Già thường vui vẻ và sôi động, đặc trưng của cộng đồng du lịch bụi. Bạn có thể dễ dàng kết bạn và giao lưu tại các homestay khác, hát karaoke, hoặc đơn giản là tìm một quán cà phê nhỏ để tận hưởng sự yên bình dưới ánh sao núi.`,
                    },
                    {
                        time: 'Night time',
                        description: `Buổi tối ở Du Già thường vui vẻ và sôi động, đặc trưng của cộng đồng du lịch bụi. Bạn có thể dễ dàng kết bạn và giao lưu tại các homestay khác, hát karaoke, hoặc đơn giản là tìm một quán cà phê nhỏ để tận hưởng sự yên bình dưới ánh sao núi.`,
                    },
                ],

                // Ngày 4: Làng Du Già -> Thành phố Hà Giang
                4: [
                    {
                        time: '08:00',
                        description:
                            'Thưởng thức bữa sáng yên bình ở Du Già, hít thở những hơi thở trong lành cuối cùng của không khí núi rừng. Đây là khoảnh khắc hoàn hảo để tận hưởng sự tĩnh lặng trước khi trở lại nhịp sống hối hả của thành phố.',
                    },
                    {
                        time: '09:00',
                        description: `Chúng ta rời Du Già, biết rằng những kỷ niệm chúng ta tạo ra vẫn còn ở lại đây, và bắt đầu lái xe về Thành phố Hà Giang. Hãy chú ý sự thay đổi dần dần của cảnh quan khi chúng ta rời khỏi thung lũng và các khu vực núi đá cao. Chúng ta sẽ dừng lại ở một điểm ngắm cảnh đẹp trên đường. Tận dụng khoảnh khắc cuối cùng này để chiêm ngưỡng và hứa với những ngọn núi hùng vĩ rằng chúng ta sẽ quay lại khám phá chúng một lần nữa.`,
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description:
                            'Thưởng thức bữa trưa gần Thành phố Hà Giang. Đây là bữa ăn chung cuối cùng của chúng ta, nơi chúng ta có thể lên kế hoạch cho chuyến phiêu lưu tiếp theo và chia sẻ những khoảnh khắc yêu thích của mình.',
                    },
                    {
                        time: '17:00',
                        description: `Chúng ta ghé thăm Cột mốc Km 0 để chụp bức ảnh cuối cùng, chính thức đánh dấu sự hoàn thành của chương này trong hành trình. Sau đó, chúng ta lên xe để trở về Hà Nội. Cuộc chinh phục Hà Giang tạm kết thúc. Chúng tôi hy vọng bạn mang theo nhiều kỷ niệm tuyệt vời và đã mong chờ đến lần gặp lại tiếp theo trên những cung đường núi tuyệt vời này!`,
                    },
                    {
                        time: '23:00',
                        description: 'Quý khách sẽ đến Hà Nội vào khoảng thời gian này. Tạm biệt và hẹn gặp lại sớm!',
                    },
                ],
            },
            3: {
                // Ngày 0: Hà Nội -> Hà Giang
                0: [
                    {
                        time: '0:00',
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
                        time: '15:00',
                        description: `Chúng ta tiếp tục hành trình hướng về Du Già. Trên đường đi, chúng ta sẽ vui vẻ rẽ ngang để đảm bảo không bỏ lỡ bất kỳ vẻ đẹp thiên nhiên bất ngờ nào mà núi rừng ban tặng.`,
                    },
                    {
                        time: '17:00',
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
                        time: '15:00',
                        description:
                            'Chúng ta ghé thăm Cột mốc Km 0 để chụp bức ảnh cuối cùng, chính thức đánh dấu sự hoàn thành của chương này trong hành trình. Sau đó, chúng ta lên xe để trở về Hà Nội.',
                    },
                    {
                        time: '17:00',
                        description:
                            'Cuộc chinh phục Hà Giang tạm kết thúc. Chúng tôi hy vọng bạn mang theo nhiều kỷ niệm tuyệt vời và đã mong chờ đến lần gặp lại tiếp theo trên những cung đường núi tuyệt vời này!',
                    },
                    {
                        time: '21:00',
                        description: 'Quý khách sẽ đến Hà Nội vào khoảng thời gian này. Tạm biệt và hẹn gặp lại sớm!',
                    },
                ],
            },
            2: {
                // Ngày 0: Hà Nội -> Hà Giang (Giống như mẫu bạn cung cấp)
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
                        description: `Sau khi nghỉ ngơi tại Yên Minh, hành trình của chúng ta tiếp tục hướng tới một trong những điểm dừng mang tính biểu tượng nhất của Hà Giang: Đèo Thẩm Mã. Vị trí này mang đến cho du khách một cái nhìn toàn cảnh ngoạn mục, cho phép chúng ta đánh giá trọn vẹn sự hùng vĩ của thiên nhiên khi những con đường núi quanh co uốn lượn duyên dáng như những dải lụa vắt qua những ngọn núi đá.`,
                    },
                    {
                        time: '16:00',
                        description: `Tiếp theo, chúng ta sẽ đưa quý khách đến Cột cờ Lũng Cú, nằm gần điểm cực Bắc thiêng liêng của Việt Nam. Dưới chân Cột cờ là Làng Lô Lô Chải quyến rũ. Ngôi làng này tự hào được công nhận là Làng Du lịch Tốt nhất Thế giới năm 2023 vì những nỗ lực nổi bật trong việc bảo tồn các giá trị truyền thống trong cả lối sống và thực hành du lịch bền vững.`,
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

                // Ngày 2: Đồng Văn -> Hà Giang (Kết thúc)
                2: [
                    {
                        time: '08:00',
                        description:
                            'Thưởng thức bữa sáng tại Đồng Văn. Thực đơn ở đây có sự kết hợp giữa hương vị truyền thống địa phương và các món ăn quốc tế, đảm bảo bạn được nạp đầy năng lượng cho ngày mới.',
                    },
                    {
                        time: '09:00',
                        description: `Chuyến đi được mong chờ nhất! Chúng ta bắt đầu hành trình vượt qua Đèo Mã Pì Lèng—được công nhận là một trong "Tứ Đại Đỉnh Đèo của Việt Nam." Tiếp theo, chúng ta sẽ đi thẳng về phía bến Sông Nho Quế, trái tim ngọc bích của Hà Giang—đây là điểm đến bạn không thể bỏ lỡ! Chúng ta sẽ đi xuống bến thuyền để tận hưởng chuyến đi trên Sông Nho Quế. Trên bờ sông sừng sững một ngọn núi cao từ 700 đến 900 mét, tạo thành hẻm vực Tu Sản. Đứng dưới lòng sông, bạn sẽ cảm thấy một sự nhỏ bé trước thiên nhiên hùng vĩ như vậy. Đặc biệt vào mùa Thu và Đông, nước sông mang một màu xanh ngọc bích độc đáo, tuyệt đẹp.`,
                    },
                    {
                        time: '13:00',
                        short: 'Ăn trưa',
                        description: 'Chúng ta dừng lại ở Thị trấn Mèo Vạc để ăn trưa.',
                    },
                    {
                        time: '15:00',
                        description: `Sau bữa trưa, chúng ta bắt đầu hành trình trở về thành phố. Chúng ta sẽ dành thời gian đi dạo quanh, ngắm cảnh, hoặc chụp ảnh những khung cảnh tuyệt đẹp xung quanh.`,
                    },
                    {
                        time: '17:00',
                        description: `Cuộc chinh phục Hà Giang tạm kết thúc. Chúng tôi hy vọng bạn mang theo nhiều kỷ niệm tuyệt vời và đã mong chờ đến lần gặp lại tiếp theo trên những cung đường núi tuyệt vời này!`,
                    },
                    {
                        time: '23:00',
                        description: 'Chúng ta sẽ đến Hà Nội vào khoảng thời gian này. Tạm biệt và hẹn gặp lại sớm!',
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
    if (isHaGiang) {
        ALL_ITINERARY_PLANS_DATA = {
            4: {
                0: [
                    {
                        time: '21:00',
                        description:
                            'Our high-quality sleeper bus will pick you up to commence your journey to Ha Giang! You will be booked on a VIP cabin bus, where each guest enjoys a private, individual sleeping compartment.',
                    },
                    { time: '03:00', description: 'Arrives in Ha Giang City, our staff guide you to check in and rest.' },
                ],

                //  1: Ha Giang -> Dong Van
                1: [
                    {
                        time: '08:00',
                        description:
                            'Meet up with Hi Hi tour guide and your drivers. Enjoy a simple yet meaningful breakfast, fully charging your energy and ready to be moved by the upcoming natural beauty.',
                    },
                    {
                        time: '09:00',
                        description: `Together, we set off to the amazing journey. We won't rush. Instead, we'll seize moments to linger at scenic spots and weave into local villages to feel the most authentic rhythm of life of the ethnic communities.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            'Stop at Yen Minh and have a satisfying lunch featuring authentic local dishes. Savor the complete flavor of the mountains.<br/>After lunch we will have a short break for around 15 - 30 minutes before back to our journey.',
                    },
                    {
                        time: '14:00',
                        description: `We press on from Yen Minh toward Dong Van. Prepare your camera—the vistas become more dramatic and breathtaking as we gain elevation.<br/>The journey from Yen Minh to Dong Van is a symphony of rock mountains. Every curve, every pass, reveals a new breathtaking vista, prompting endless exclamations of wonder at nature's grandeur.`,
                    },
                    {
                        time: '17:00',
                        description: `Arrive in Dong Van and check-in to your cozy homestay. Take this time to unwind, refresh, and soak in the peaceful atmosphere of the ancient town.`,
                    },
                    {
                        time: '19:00',
                        description: `Enjoy a delightful dinner at a local restaurant, sampling the region's best mountain specialties. If you can drink, we would be delighted to share a few cheerful drinks together. Ha Giang is famous for its unique homemade liquors brewed from forest ingredients, such as corn wine fermented with forest leaves (rượu ngô men lá) or banana wine. If you prefer not to drink, that is absolutely fine—we simply invite you to immerse yourself in the bustling atmosphere and good company around us.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'The evening is yours! Stroll through Dong Van Old Town under the stars. Almost every nights, you will catch a lively community cultural exchange with music and bonfires, or you can find a quiet spot for a drink and reflect on the ’s amazing sights.',
                    },
                ],

                //  2: Dong Van -> Meo Vac (near Nho Que River)
                2: [
                    {
                        time: '08:00',
                        description:
                            'Enjoy breakfast in Đồng Văn. Here features a mix of traditional local flavors and international dishes, ensuring you are fully energized for the .',
                    },
                    {
                        time: '09:00',
                        description: `The most anticipated drive! We begin our journey over the Mã Pì Lèng Pass—recognized as one of the "Four Great Passes of Việt Nam." Prepare to be overwhelmed by the majestic scenery. Here, you will notice a clear shift: the emergence of the characteristic "cat-ear" jagged limestone mountains (núi đá tai mèo) of Mèo Vạc, distinctly different from the first 's landscape. This sight truly exemplifies why Hà Giang is known as the place where "flowers grow on stones."`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'We stop in Mèo Vạc Town for lunch.',
                    },
                    {
                        time: '14:00',
                        description: `Experience Hà Giang heart - Nho Quế river. This is the destination you simply cannot miss! We will head down to the boat dock to enjoy a trip on the Nho Quế River. On the riverbank stands a towering mountain reaching heights of 700 to 900 meters, forming the Tu Sản canyon. Standing in the river, you’ll feel a sense of insignificance in the face of such majestic nature. Especially during Autumn and Winter, the water takes on a unique, stunning jade-blue color.`,
                    },
                    {
                        time: '15:00',
                        description:
                            'After disembarking, we will take some time to stroll around, sightsee, or take photos of the stunning surroundings.',
                    },
                    {
                        time: '17:00',
                        description: `Settle into your peaceful homestay in Mèo Vạc. Take a moment to relax and feel the calm atmosphere, a contrast to the livelier atmosphere of Dong Van.`,
                    },
                    {
                        time: '19:00',
                        description: `Enjoy a delightful dinner featuring Mèo Vạc's distinctive cuisine.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'Evenings in Mèo Vạc offer a more intimate and peaceful feeling. Especially on weekends, you often have the chance to attend small cultural performances and bonfires, providing a rich taste of Vietnamese highlands culture.',
                    },
                ],

                //  3: Meo Vac -> Du Gia Village
                3: [
                    {
                        time: '08:00',
                        description: `If your trip falls on a Sun, we'll begin the  by visiting the Mèo Vạc Fair Market—one of the largest and most vibrant highland markets. This is a massive gathering of local people in their traditional attire, trading goods, and maintaining unique customs. Join us for breakfast right in the market to feel the bustling energy and this rare, authentic charm.`,
                    },
                    {
                        time: '10:00',
                        description: `After saying goodbye to Me Vạc (or after breakfast if it's not Sun), we'll hit the road toward Du Gia. Our route will take us through small roads winding through hamlets, where you can witness firsthand the scenery of seasonal rice fields and flower hills, offering a continuous feeling of relaxation and discovery.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: `We'll pause for lunch at a famous viewpoint: the "M-Bend" Road. From here, you'll see the road gently curve like an embroidered thread stretched across the mountainside. Lunch here provides an experience that is both delicious and visually stunning.`,
                    },
                    {
                        time: '14:00',
                        description: `We continue our journey toward Du Gia. Along the way, we’ll happily take detours to ensure we don't miss any unexpected natural beauty that the mountains offer.`,
                    },
                    {
                        time: '16:00',
                        description: `Arrive at the Du Gia homestay, quickly check-in, and head straight to the Du Gia Waterfall. The natural water here is always crystal clear and icy cold, and the falls are quite wide, making it perfect for you to freely swim and relax. (Don't forget your swimwear to fully enjoy this refreshment!)`,
                    },
                    {
                        time: '17:00 - 18:00',
                        description: `Return to the homestay. Wash up and enjoy dinner together featuring "home-cooked" dishes rich in local flavors, creating a wonderfully cozy, home-away-from-home feeling. The evening in Du Gia is typically cheerful and lively, characteristic of the backpacker community. You can easily make friends and socialize at other homestays, sing karaoke, or simply find a small café to enjoy the peace under the mountain stars.`,
                    },
                    {
                        time: 'Night time',
                        description: `The evening in Du Gia is typically cheerful and lively, characteristic of the backpacker community. You can easily make friends and socialize at other homestays, sing karaoke, or simply find a small café to enjoy the peace under the mountain stars.`,
                    },
                ],

                //  4: Du Gia Village -> Ha Giang City
                4: [
                    {
                        time: '08:00',
                        description:
                            'Enjoy a serene breakfast in Du Gia, taking in the mountain air’s final clean breaths. This is the perfect moment to savor the stillness before returning to the hustle of city life.',
                    },
                    {
                        time: '09:00',
                        description: `We leave Du Gia, knowing the memories we made remain here, and begin our drive toward Ha Giang City. Notice the gradual shift in scenery as we leave the valley and the high rocky areas behind. We will make a stop at a beautiful viewing point along the way. Take advantage of this final moment to admire and promise the majestic mountains that we will be back to explore them again.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            'Enjoy lunch near Ha Giang City. This is our final shared meal, where we can plan our next adventure and share our favorite moments.',
                    },
                    {
                        time: '17:00',
                        description: `We visit the Zero Kilometer Marker for a final photo, officially marking the completion of this chapter of the journey. We then board the vehicle for the direct drive back to Hanoi. The conquest of Ha Giang concludes for now. We hope you carry many wonderful memories with you and are already looking forward to the next time we meet again on these incredible mountain roads!`,
                    },
                    {
                        time: '23:00',
                        description: 'You will arrive in Ha Noi around this time. Goodbye and see you real soon!',
                    },
                ],
            },
            3: {
                //  0: Ha Noi -> Ha Giang (Giống như mẫu bạn cung cấp)
                0: [
                    {
                        time: '0:00',
                        description:
                            'Our high-quality sleeper bus will pick you up to commence your journey to Ha Giang! You will be booked on a VIP cabin bus, where each guest enjoys a private, individual sleeping compartment.',
                    },
                    { time: '03:00', description: 'Arrives in Ha Giang City, our staff guide you to check in and rest.' },
                ],

                //  1: Ha Giang -> Dong Van
                1: [
                    {
                        time: '08:00',
                        description:
                            'Meet up with Hi Hi tour guide and your drivers. Enjoy a simple yet meaningful breakfast, fully charging your energy and ready to be moved by the upcoming natural beauty.',
                    },
                    {
                        time: '09:00',
                        description: `Together, we set off to the amazing journey. We won't rush. Instead, we'll seize moments to linger at scenic spots and weave into local villages to feel the most authentic rhythm of life of the ethnic communities.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            'Stop at Yen Minh and have a satisfying lunch featuring authentic local dishes. Savor the complete flavor of the mountains.<br/>After lunch we will have a short break for around 15 - 30 minutes before back to our journey.',
                    },
                    {
                        time: '14:00',
                        description: `We press on from Yen Minh toward Dong Van. Prepare your camera—the vistas become more dramatic and breathtaking as we gain elevation.<br/>The journey from Yen Minh to Dong Van is a symphony of rock mountains. Every curve, every pass, reveals a new breathtaking vista, prompting endless exclamations of wonder at nature's grandeur.`,
                    },
                    {
                        time: '17:00',
                        description: `Arrive in Dong Van and check-in to your cozy homestay. Take this time to unwind, refresh, and soak in the peaceful atmosphere of the ancient town.`,
                    },
                    {
                        time: '19:00',
                        description: `Enjoy a delightful dinner at a local restaurant, sampling the region's best mountain specialties.<br/>If you can drink, we would be delighted to share a few cheerful drinks together. Ha Giang is famous for its unique homemade liquors brewed from forest ingredients, such as corn wine fermented with forest leaves (rượu ngô men lá) or banana wine. If you prefer not to drink, that is absolutely fine—we simply invite you to immerse yourself in the bustling atmosphere and good company around us.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'The evening is yours! Stoll through Dong Van Old Town under the stars. Almost every nights, you will catch a lively community cultural exchange with music and bonfires, or you can find a quiet spot for a drink and reflect on the ’s amazing sights.',
                    },
                ],

                //  2: Dong Van -> Du Gia
                2: [
                    {
                        time: '08:00',
                        description:
                            'Enjoy breakfast in Đồng Văn. Here features a mix of traditional local flavors and international dishes, ensuring you are fully energized for the .',
                    },
                    {
                        time: '09:00',
                        description: `The most anticipated drive! We begin our journey over the Mã Pì Lèng Pass—recognized as one of the "Four Great Passes of Việt Nam." Prepare to be overwhelmed by the majestic scenery. Here, you will notice a clear shift: the emergence of the characteristic "cat-ear" jagged limestone mountains (núi đá tai mèo) of Mèo Vạc, distinctly different from the first 's landscape. This sight truly exemplifies why Hà Giang is known as the place where "flowers grow on stones."`,
                    },
                    {
                        time: '11:00',
                        description: `Experience Hà Giang heart - Nho Quế river.<br/>This is the destination you simply cannot miss! We will head down to the boat dock to enjoy a trip on the Nho Quế River. On the riverbank stands a towering mountain reaching heights of 700 to 900 meters, forming the Tu Sản canyon. Standing in the river, you’ll feel a sense of insignificance in the face of such majestic nature. Especially during Autumn and Winter, the water takes on a unique, stunning jade-blue color.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'We stop in Mèo Vạc Town for lunch.',
                    },
                    {
                        time: '15:00',
                        description: `We continue our journey toward Du Gia. Along the way, we’ll happily take detours to ensure we don't miss any unexpected natural beauty that the mountains offer.`,
                    },
                    {
                        time: '17:00',
                        description: `Arrive at the Du Gia homestay, quickly check-in, and head straight to the Du Gia Waterfall. The natural water here is always crystal clear and icy cold, and the falls are quite wide, making it perfect for you to freely swim and relax. (Don't forget your swimwear to fully enjoy this refreshment!)`,
                    },
                    {
                        time: '19:00',
                        description: `Return to the homestay. Wash up and enjoy dinner together featuring "home-cooked" dishes rich in local flavors, creating a wonderfully cozy, home-away-from-home feeling.`,
                    },
                    {
                        time: 'Night time',
                        description: `The evening in Du Gia is typically cheerful and lively, characteristic of the backpacker community. You can easily make friends and socialize at other homestays, sing karaoke, or simply find a small café to enjoy the peace under the mountain stars.`,
                    },
                ],

                //  3: Du Gia -> Ha Giang (Kết thúc)
                3: [
                    {
                        time: '08:00',
                        description:
                            'Enjoy breakfast in Du Gia. You can take some time to stroll around, sightsee, or take photos of the stunning surroundings.',
                    },
                    {
                        time: '09:00',
                        description:
                            'We leave Du Gia, knowing the memories we made remain here, and begin our drive toward Ha Giang City. Notice the gradual shift in scenery as we leave the valley and the high rocky areas behind. We will make a stop at a beautiful viewing point along the way. Take advantage of this final moment to admire and promise the majestic mountains that we will be back to explore them again.',
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            'Enjoy lunch near Ha Giang City. This is our final shared meal, where we can plan our next adventure and share our favorite moments.',
                    },
                    {
                        time: '15:00',
                        description:
                            'We visit the Zero Kilometer Marker for a final photo, officially marking the completion of this chapter of the journey. We then board the vehicle for the direct drive back to Hanoi.',
                    },
                    {
                        time: '17:00',
                        description:
                            'The conquest of Ha Giang concludes for now. We hope you carry many wonderful memories with you and are already looking forward to the next time we meet again on these incredible mountain roads!',
                    },
                    {
                        time: '21:00',
                        description: 'You will arrive in Ha Noi around this time. Goodbye and see you real soon!',
                    },
                ],
            },
            2: {
                //  0: Ha Noi -> Ha Giang (Giống như mẫu bạn cung cấp)
                0: [
                    {
                        time: '21:00',
                        description:
                            'Our high-quality sleeper bus will pick you up to commence your journey to Ha Giang! You will be booked on a VIP cabin bus, where each guest enjoys a private, individual sleeping compartment.',
                    },
                    { time: '03:00', description: 'Arrives in Ha Giang City, our staff guide you to check in and rest.' },
                ],

                //  1: Ha Giang -> Dong Van
                1: [
                    {
                        time: '08:00',
                        description:
                            'Meet up with Hi Hi tour guide and your drivers. Enjoy a simple yet meaningful breakfast, fully charging your energy and ready to be moved by the upcoming natural beauty.',
                    },
                    {
                        time: '09:00',
                        description: `Together, we set off to the amazing journey. We won't rush. Instead, we'll seize moments to linger at scenic spots and weave into local villages to feel the most authentic rhythm of life of the ethnic communities.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description:
                            'Stop at Yen Minh and have a satisfying lunch featuring authentic local dishes. Savor the complete flavor of the mountains.<br/>After lunch we will have a short break for around 15 - 30 minutes before back to our journey.',
                    },
                    {
                        time: '14:00',
                        description: `After resting in Yen Minh, our journey continues toward one of Ha Giang's most iconic stops: Thẩm Mã Pass. This location offers guests a spectacular panoramic view, providing a full appreciation of nature's grandeur as the winding mountain roads curve gracefully like ribbons draped across the rocky mountains.`,
                    },
                    {
                        time: '16:00',
                        description: `Subsequently, we will take you to Lũng Cú Flagpole, located near the sacred northernmost point of Vietnam. At the foot of the Flagpole lies the charming Lô Lô Chải Village. This village was proudly recognized as the Best Tourism Village in the World in 2023 for its outstanding preservation of traditional values in both its lifestyle and sustainable tourism practices.`,
                    },
                    {
                        time: '17:00',
                        description: `Arrive in Dong Van and check-in to your cozy homestay. Take this time to unwind, refresh, and soak in the peaceful atmosphere of the ancient town.`,
                    },
                    {
                        time: '19:00',
                        description: `Enjoy a delightful dinner at a local restaurant, sampling the region's best mountain specialties.<br/>If you can drink, we would be delighted to share a few cheerful drinks together. Ha Giang is famous for its unique homemade liquors brewed from forest ingredients, such as corn wine fermented with forest leaves (rượu ngô men lá) or banana wine. If you prefer not to drink, that is absolutely fine—we simply invite you to immerse yourself in the bustling atmosphere and good company around us.`,
                    },
                    {
                        time: 'Night time',
                        description:
                            'The evening is yours! Stoll through Dong Van Old Town under the stars. Almost every nights, you will catch a lively community cultural exchange with music and bonfires, or you can find a quiet spot for a drink and reflect on the ’s amazing sights.',
                    },
                ],

                //  2: Dong Van -> Ha Giang (Kết thúc)
                2: [
                    {
                        time: '08:00',
                        description:
                            'Enjoy breakfast in Đồng Văn. Here features a mix of traditional local flavors and international dishes, ensuring you are fully energized for the .',
                    },
                    {
                        time: '09:00',
                        description: `The most anticipated drive! We begin our journey over the Mã Pì Lèng Pass—recognized as one of the "Four Great Passes of Việt Nam." Next, we will immediately head towards the Nho Quế River pier, the emerald heart of Hà Giang—this is the destination you simply cannot miss! We will head down to the boat dock to enjoy a trip on the Nho Quế River. On the riverbank stands a towering mountain reaching heights of 700 to 900 meters, forming the Tu Sản canyon. Standing in the river, you’ll feel a sense of insignificance in the face of such majestic nature. Especially during Autumn and Winter, the water takes on a unique, stunning jade-blue color.`,
                    },
                    {
                        time: '13:00',
                        short: 'Lunch time',
                        description: 'We stop in Mèo Vạc Town for lunch.',
                    },
                    {
                        time: '15:00',
                        description: `After lunch, we begin our journey back to the city. We will take some time to stroll around, sightsee, or take photos of the stunning surroundings.`,
                    },
                    {
                        time: '17:00',
                        description: `The conquest of Ha Giang concludes for now. We hope you carry many wonderful memories with you and are already looking forward to the next time we meet again on these incredible mountain roads!`,
                    },
                    {
                        time: '23:00',
                        description: 'We will arrive in Ha Noi around this time. Goodbye and see you real soon!',
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

        // --- MỚI: Lấy plan từ URL ---
        const urlParams = new URLSearchParams(window.location.search)
        const planParam = urlParams.get('plan')

        // Xác định plan khởi tạo
        let initialPlan = planParam && ALL_ITINERARY_PLANS_DATA[planParam] ? planParam : isHaGiang ? '4' : '3'

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
                                    <time class="block text-base font-bold leading-none mt-1">${item.time}</time>
                                    ${item.short ? `<small>${item.short}</small>` : ''}
                                </div>
                                <p class="text-sm font-normal ">${item.description}</p>
                            </div>
                        </div>
                    </li>`
            })
            $timelineList.html(html)
        }

        function renderTabs(totals) {
            let tabsHtml = ''
            for (let i = 0; i <= totals; i++) {
                const isActive = i === 0 ? 'border-b border-[#101F23]' : ''
                const style = isActive ? '1px solid #101F23' : ''
                const isLast = i === totals
                const borderClasses = `${i === 0 ? 'rounded-tl-lg' : ''} ${isLast ? 'rounded-tr-lg' : ''}`

                tabsHtml += `
                    <li class="w-full ${isHaGiang ? 'bg-[#DEE9CA]' : 'bg-[#DCF5ED]'} flex-1 ${borderClasses}">
                        <a data--index="${i}" class="inline-block cursor-pointer p-4 text-fg-brand bg-neutral-secondary-soft rounded-t-base w-full tab-link ${isActive}"
                           style="border-bottom: ${style};">${vi ? 'Ngày' : 'Day'} ${i}</a>
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
                    $tabsContainer.find('.tab-link').removeClass('border-b border-[#101F23]').css('border-bottom', '')
                    $(this).addClass('border-b border-[#101F23]').css('border-bottom', '1px solid #101F23')
                    renderTimeline($(this).data('-index'))
                })
        }

        function bindPillClickEvent() {
            $('#itinerary-plans').on('click', '.plan-pill', function () {
                const planValue = $(this).data('plan-value').toString()
                $('.plan-pill').removeClass('bg-black text-white').addClass('bg-white text-gray-800 border border-gray-300 hover:bg-gray-50')
                $(this).removeClass('bg-white text-gray-800 border border-gray-300 hover:bg-gray-50').addClass('bg-black text-white')

                if (ALL_ITINERARY_PLANS_DATA[planValue]) {
                    ITINERARY_DATA = ALL_ITINERARY_PLANS_DATA[planValue]
                    renderPrice(planValue)
                    renderTabs(Object.keys(ITINERARY_DATA).length - 1)
                }
            })
        }

        function renderPrice(plan) {
            let html = vi ? `${(Number(plan) * 1500000).toLocaleString('vi-VN')} VNĐ` : `${(Number(plan) * 65).toLocaleString('en-US')} USD`
            $priceByPlan.text(html)
        }

        // --- KHỞI CHẠY LẦN ĐẦU ---
        bindPillClickEvent()

        // Highlight pill tương ứng với initialPlan
        $(`.plan-pill[data-plan-value="${initialPlan}"]`).trigger('click')

        // Nếu trigger click không hoạt động do cấu trúc HTML, dùng trực tiếp:
        renderPrice(initialPlan)
        renderTabs(Object.keys(ITINERARY_DATA).length - 1)
    })
})(jQuery)
