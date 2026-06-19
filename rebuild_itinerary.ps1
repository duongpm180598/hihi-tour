$f = 'c:\xampp\htdocs\hihi-tour\wp-content\themes\hihi-tour\assets\js\itinerary.js'
$c = [System.IO.File]::ReadAllText($f, [System.Text.Encoding]::UTF8)

$marker = "ALL_ITINERARY_PLANS_DATA = {"
$mLen   = $marker.Length

# Find the 4 blocks
$p1 = $c.IndexOf($marker)           # VI Ha Giang
$p2 = $c.IndexOf($marker, $p1+1)    # VI Cao Bang
$p3 = $c.IndexOf($marker, $p2+1)    # EN Ha Giang
$p4 = $c.IndexOf($marker, $p3+1)    # EN Cao Bang

# Separator between blocks: "        }`r`n    } else {`r`n        "
$sep = "        }`r`n    } else {`r`n        "

$viHGEnd = $p2 - $sep.Length   # where VI Ha Giang DATA ends
$enHGEnd = $p4 - $sep.Length   # where EN Ha Giang DATA ends

# ── NEW VI HA GIANG DATA ──────────────────────────────────────────────────────
$viNew = @'

            4: {
                // Ngay 0: Ha Noi -> Ha Giang
                0: [
                    { time: '21:00', description: 'Lên xe giường nằm đi Hà Giang.' },
                    { time: '03:00', description: 'Đến thành phố Hà Giang. Nghỉ lại tại chỗ thuê xe máy.' },
                ],
                // Ngay 1: Ha Giang -> Dong Van
                1: [
                    { time: '08:00', description: 'Ăn sáng.' },
                    { time: '09:00', description: 'TP. Hà Giang - Quản Bạ - Yên Minh. Thích đâu dừng đó.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa ở thị trấn Yên Minh.' },
                    { time: '14:00', description: 'Yên Minh - Đồng Văn.' },
                    { time: '17:00', description: 'Tới Đồng Văn. Check-in homestay.' },
                    { time: '19:00', description: 'Ăn tối ở phố cổ Đồng Văn tại các nhà hàng bản địa. Ăn lẩu gà đen, thắng cố, ăn vặt linh tinh.' },
                    { time: 'Night time', description: 'Buổi tối (đặc biệt là cuối tuần) ở Đồng Văn có đốt lửa trại, mọi người cùng nhau ca hát, nhảy múa khá là vui nhộn. Đi dạo quanh phố cổ nhỏ nhỏ cũng vui vui, còn có thể đi mát-xa ở các nhà trong phố nữa siêu thích.' },
                ],
                // Ngay 2: Dong Van -> Meo Vac
                2: [
                    { time: '08:00', description: 'Ăn sáng ở Đồng Văn.' },
                    { time: '09:00', description: 'Qua đèo Mã Pí Lèng, một trong tứ đại đỉnh đèo ở Việt Nam. Siêu đẹp siêu thích. Có thể dừng lại ở đỉnh đèo ngắm cảnh.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Dừng lại ăn trưa ở thị trấn Mèo Vạc.' },
                    { time: '14:00', description: 'Ngược về bến thuyền sông Nho Quế. 120k/người, đi thuyền khoảng 30 - 45 phút.' },
                    { time: '15:00', description: 'Đi loanh quanh khu này, đường nào đẹp thì rẽ.' },
                    { time: '17:00', description: `Về homestay. Có thể ở làng du lịch H'Mong hoặc ở trong thị trấn, 2 nơi này cách nhau 3km thôi.` },
                    { time: '19:00', description: 'Ăn tối ở homestay (nếu có) hoặc ăn ở thị trấn.' },
                    { time: 'Night time', description: 'Buổi tối ở Mèo Vạc sẽ yên bình hơn Đồng Văn dù cũng vẫn có các hoạt động văn nghệ giao lưu.' },
                ],
                // Ngay 3: Meo Vac -> Du Gia
                3: [
                    { time: '08:00', description: 'Nếu ngày này là Chủ Nhật, phải đi chợ phiên Mèo Vạc! Một trong những chợ phiên lớn ở vùng cao Hà Giang. Đồ ăn sáng trong chợ siêu ngon, siêu bản địa. Phải thử phở lợn, phở gà đen, xôi,...' },
                    { time: '10:00', description: 'Về Du Già theo đường qua cua chữ M.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa ở cua chữ M, view đẹp.' },
                    { time: '14:00', description: 'Tiếp tục về Du Già.' },
                    { time: '16:00', description: 'Đến Du Già, check-in homestay. Nếu thích tắm thác có thể ghé thác Du Già, khá là đông vui du khách tắm ở đây.' },
                    { time: '17:00 - 18:00', description: 'Về homestay ăn tối.' },
                    { time: 'Night time', description: 'Có thể dạo quanh làng Du Già, có một vài quán cà phê và thậm chí là nhiều quán bar dưới tầng hầm, mọi người rất hay hát karaoke ở đấy.' },
                ],
                // Ngay 4: Du Gia -> Ha Giang
                4: [
                    { time: '08:00', description: 'Ăn sáng ở Du Già.' },
                    { time: '09:00', description: 'Về thành phố theo google map. Hỏi homestay trước xem đường nào đang đẹp không bị sạt thì đi.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa.' },
                    { time: '16:00', description: 'Ghé check-in km0. Giờ này check-in vừa vắng vừa đẹp.' },
                    { time: '17:00', description: 'Kết thúc hành trình. Đón xe về Hà Nội, thường có chuyến 4 rưỡi - 5h.' },
                    { time: '23:00', description: 'Về đến Hà Nội.' },
                ],
            },
            3: {
                // Ngay 0: Ha Noi -> Ha Giang
                0: [
                    { time: '21:00', description: 'Lên xe giường nằm đi Hà Giang.' },
                    { time: '03:00', description: 'Đến thành phố Hà Giang. Nghỉ lại tại chỗ thuê xe máy.' },
                ],
                // Ngay 1: Ha Giang -> Dong Van
                1: [
                    { time: '08:00', description: 'Ăn sáng.' },
                    { time: '09:00', description: 'TP. Hà Giang - Quản Bạ - Yên Minh. Thích đâu dừng đó.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa ở thị trấn Yên Minh.' },
                    { time: '14:00', description: 'Yên Minh - Đồng Văn.' },
                    { time: '17:00', description: 'Tới Đồng Văn. Check-in homestay.' },
                    { time: '19:00', description: 'Ăn tối ở phố cổ Đồng Văn tại các nhà hàng bản địa. Ăn lẩu gà đen, thắng cố, ăn vặt linh tinh.' },
                    { time: 'Night time', description: 'Buổi tối (đặc biệt là cuối tuần) ở Đồng Văn có đốt lửa trại, ca hát, nhảy múa. Đi dạo quanh phố cổ, hoặc đi mát-xa ở các nhà trong phố.' },
                ],
                // Ngay 2: Dong Van -> Du Gia
                2: [
                    { time: '08:00', description: 'Ăn sáng ở Đồng Văn.' },
                    { time: '09:00', description: 'Qua đèo Mã Pí Lèng, một trong tứ đại đỉnh đèo ở Việt Nam. Siêu đẹp siêu thích. Có thể dừng lại ở đỉnh đèo ngắm cảnh.' },
                    { time: '11:00', description: 'Đi xuống bến thuyền sông Nho Quế. 120k/người, đi thuyền khoảng 30 - 45 phút.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa ở thị trấn Mèo Vạc. Hoặc có thể đặt trước ăn trưa ở nhà hàng ở ngay hẻm Tu Sản luôn.' },
                    { time: '14:00', description: 'Về Du Già.' },
                    { time: '16:00', description: 'Check-in homestay. Nếu đến sớm và có nhiều thời gian thì ghé thác Du Già, có thể tắm và bơi ở đây.' },
                    { time: '19:00', description: 'Ăn tối ở homestay.' },
                    { time: 'Night time', description: 'Có thể dạo quanh làng Du Già, có một vài quán cà phê và thậm chí là nhiều quán bar dưới tầng hầm, mọi người rất hay hát karaoke ở đấy.' },
                ],
                // Ngay 3: Du Gia -> Ha Giang
                3: [
                    { time: '08:00', description: 'Ăn sáng ở Du Già.' },
                    { time: '09:00', description: 'Về thành phố theo google map. Hỏi homestay trước xem đường nào đang đẹp không bị sạt thì đi.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa.' },
                    { time: '16:00', description: 'Về đến thành phố Hà Giang. Ghé check-in km0. Giờ này check-in vừa vắng vừa đẹp.' },
                    { time: '17:00', description: 'Kết thúc hành trình. Đón xe về Hà Nội, thường có chuyến 4 rưỡi - 5h.' },
                    { time: '23:00', description: 'Về đến Hà Nội.' },
                ],
            },
            2: {
                // Ngay 0: Ha Noi -> Ha Giang
                0: [
                    { time: '21:00', description: 'Lên xe giường nằm đi Hà Giang.' },
                    { time: '03:00', description: 'Đến thành phố Hà Giang. Nghỉ lại tại chỗ thuê xe máy.' },
                ],
                // Ngay 1: Ha Giang -> Dong Van
                1: [
                    { time: '08:00', description: 'Ăn sáng.' },
                    { time: '09:00', description: 'TP. Hà Giang - Quản Bạ - Yên Minh. Thích đâu dừng đó.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa ở thị trấn Yên Minh.' },
                    { time: '14:00', description: 'Qua dốc Thẩm Mã. Rất nhiều khách du lịch. Thích thì dừng cũng được.' },
                    { time: '15:00', description: `Đi thẳng lên cột cờ Lũng Cú, chân cột cờ là làng Lô Lô Chải. Chú ý: nếu book homestay ở Đồng Văn thì phải lên đây trước 3h chiều và bắt đầu về trước 4h, không thì trời tối quá, đi nguy hiểm.` },
                    { time: '17:00', description: 'Về đến Đồng Văn, check-in homestay.' },
                    { time: '19:00', description: 'Ăn tối ở phố cổ Đồng Văn tại các nhà hàng bản địa. Ăn lẩu gà đen, thắng cố, ăn vặt linh tinh.' },
                    { time: 'Night time', description: 'Buổi tối (đặc biệt là cuối tuần) ở Đồng Văn có đốt lửa trại, ca hát, nhảy múa. Đi dạo quanh phố cổ, hoặc đi mát-xa ở các nhà trong phố.' },
                ],
                // Ngay 2: Dong Van -> Nho Que -> Ha Giang
                2: [
                    { time: '08:00', description: 'Ăn sáng ở Đồng Văn.' },
                    { time: '09:00', description: 'Đi xuống bến thuyền sông Nho Quế. 120k/người, đi thuyền khoảng 30 - 45 phút.' },
                    { time: '13:00', short: 'Ăn trưa', description: 'Ăn trưa ở thị trấn Mèo Vạc. Hoặc có thể đặt trước ăn trưa ở nhà hàng ở ngay hẻm Tu Sản luôn.' },
                    { time: '14:00', description: 'Lên đường quay về thành phố Hà Giang.' },
                    { time: '17:00', description: 'Kết thúc hành trình. Đón xe về Hà Nội, thường có chuyến 4 rưỡi - 5h.' },
                    { time: '23:00', description: 'Về đến Hà Nội.' },
                ],
            },
        
'@

# ── NEW EN HA GIANG DATA ──────────────────────────────────────────────────────
$enNew = @'

            4: {
                // 0: Ha Noi -> Ha Giang
                0: [
                    { time: '21:00', description: 'Board the sleeper bus to Ha Giang.' },
                    { time: '03:00', description: 'Arrive in Ha Giang City. Rest at the motorbike rental place.' },
                ],
                // 1: Ha Giang -> Dong Van
                1: [
                    { time: '08:00', description: 'Breakfast.' },
                    { time: '09:00', description: 'Ha Giang City → Quan Ba → Yen Minh. Stop wherever you like.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch in Yen Minh town.' },
                    { time: '14:00', description: 'Yen Minh → Dong Van.' },
                    { time: '17:00', description: 'Arrive in Dong Van. Check in to your homestay.' },
                    { time: '19:00', description: `Dinner at local restaurants in Dong Van Old Town. Try black chicken hotpot (lẩu gà đen), thắng cố, and local street food.` },
                    { time: 'Night time', description: `Evenings in Dong Van — especially on weekends — feature bonfires, singing and dancing. The old town is great for a stroll. Massages are available at local houses along the street.` },
                ],
                // 2: Dong Van -> Meo Vac
                2: [
                    { time: '08:00', description: 'Breakfast in Dong Van.' },
                    { time: '09:00', description: `Cross Ma Pi Leng Pass — one of Vietnam's four great mountain passes. Stunning scenery. Stop at the summit for photos.` },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch in Meo Vac town.' },
                    { time: '14:00', description: 'Head to the Nho Que River boat dock. Boat ride: 120,000 VND/person, approx. 30–45 minutes.' },
                    { time: '15:00', description: 'Explore the area — take whichever road looks scenic.' },
                    { time: '17:00', description: `Check in to your homestay. Options: H'Mong tourism village or in town — only 3 km apart.` },
                    { time: '19:00', description: 'Dinner at the homestay (if available) or in town.' },
                    { time: 'Night time', description: 'Evenings in Meo Vac are more peaceful than Dong Van, though cultural performances and gatherings still happen.' },
                ],
                // 3: Meo Vac -> Du Gia
                3: [
                    { time: '08:00', description: `If today is Sunday — you must go to the Meo Vac market! One of the biggest highland markets in Ha Giang. The food is incredibly local. Must-try: pork pho, black chicken pho, sticky rice...` },
                    { time: '10:00', description: 'Head to Du Gia via the M-bend road.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch at the M-bend viewpoint. Great views.' },
                    { time: '14:00', description: 'Continue to Du Gia.' },
                    { time: '16:00', description: 'Arrive in Du Gia, check in to your homestay. Want to swim? Head to Du Gia Waterfall — popular with travellers.' },
                    { time: '17:00 - 18:00', description: 'Return to homestay for dinner.' },
                    { time: 'Night time', description: 'Wander around Du Gia village. Cafes and underground bar/karaoke spots are very popular with backpackers here.' },
                ],
                // 4: Du Gia -> Ha Giang
                4: [
                    { time: '08:00', description: 'Breakfast in Du Gia.' },
                    { time: '09:00', description: 'Drive back to Ha Giang City following Google Maps. Ask your homestay which road is clear (no landslides).' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch.' },
                    { time: '16:00', description: 'Stop at the Km0 marker for photos — less crowded and the light is perfect at this hour.' },
                    { time: '17:00', description: 'End of trip. Board your bus back to Hanoi — departures usually around 4:30–5:00 PM.' },
                    { time: '23:00', description: 'Arrive back in Hanoi.' },
                ],
            },
            3: {
                // 0: Ha Noi -> Ha Giang
                0: [
                    { time: '21:00', description: 'Board the sleeper bus to Ha Giang.' },
                    { time: '03:00', description: 'Arrive in Ha Giang City. Rest at the motorbike rental place.' },
                ],
                // 1: Ha Giang -> Dong Van
                1: [
                    { time: '08:00', description: 'Breakfast.' },
                    { time: '09:00', description: 'Ha Giang City → Quan Ba → Yen Minh. Stop wherever you like.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch in Yen Minh town.' },
                    { time: '14:00', description: 'Yen Minh → Dong Van.' },
                    { time: '17:00', description: 'Arrive in Dong Van. Check in to your homestay.' },
                    { time: '19:00', description: `Dinner at local restaurants in Dong Van Old Town. Try black chicken hotpot (lẩu gà đen), thắng cố, and local street food.` },
                    { time: 'Night time', description: `Evenings in Dong Van — especially on weekends — feature bonfires, singing and dancing. Great for wandering the old town. Massages available too.` },
                ],
                // 2: Dong Van -> Du Gia
                2: [
                    { time: '08:00', description: 'Breakfast in Dong Van.' },
                    { time: '09:00', description: `Cross Ma Pi Leng Pass — one of Vietnam's four great mountain passes. Stunning. Stop at the summit for photos.` },
                    { time: '11:00', description: 'Head down to the Nho Que River boat dock. Boat ride: 120,000 VND/person, approx. 30–45 minutes.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch in Meo Vac town. Or pre-book lunch at a restaurant right at Tu San canyon.' },
                    { time: '14:00', description: 'Head to Du Gia.' },
                    { time: '16:00', description: 'Check in to your homestay. If you arrive early, visit Du Gia Waterfall — you can swim here.' },
                    { time: '19:00', description: 'Dinner at the homestay.' },
                    { time: 'Night time', description: 'Wander around Du Gia village. Cafes and underground bar/karaoke spots — people love karaoke here.' },
                ],
                // 3: Du Gia -> Ha Giang
                3: [
                    { time: '08:00', description: 'Breakfast in Du Gia.' },
                    { time: '09:00', description: 'Drive back to Ha Giang City. Ask your homestay which road is clear.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch.' },
                    { time: '16:00', description: 'Arrive in Ha Giang City. Stop at the Km0 marker — less crowded and great light at this hour.' },
                    { time: '17:00', description: 'End of trip. Board your bus back to Hanoi — usually around 4:30–5:00 PM.' },
                    { time: '23:00', description: 'Arrive back in Hanoi.' },
                ],
            },
            2: {
                // 0: Ha Noi -> Ha Giang
                0: [
                    { time: '21:00', description: 'Board the sleeper bus to Ha Giang.' },
                    { time: '03:00', description: 'Arrive in Ha Giang City. Rest at the motorbike rental place.' },
                ],
                // 1: Ha Giang -> Dong Van
                1: [
                    { time: '08:00', description: 'Breakfast.' },
                    { time: '09:00', description: 'Ha Giang City → Quan Ba → Yen Minh. Stop wherever catches your eye.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch in Yen Minh town.' },
                    { time: '14:00', description: 'Cross Tham Ma slope. Very popular with tourists. Stop if you like the view.' },
                    { time: '15:00', description: `Head straight to Lung Cu Flagpole. At the base is Lo Lo Chai Village. Note: if you book a homestay in Dong Van, arrive here before 3 PM and start heading back before 4 PM — it gets dark fast and the road is dangerous.` },
                    { time: '17:00', description: 'Arrive in Dong Van. Check in to your homestay.' },
                    { time: '19:00', description: `Dinner at local restaurants in Dong Van Old Town. Try black chicken hotpot (lẩu gà đen), thắng cố, and local snacks.` },
                    { time: 'Night time', description: `Evenings in Dong Van — especially weekends — feature bonfires, singing and dancing. Great for wandering. Massages available at local houses too.` },
                ],
                // 2: Dong Van -> Nho Que -> Ha Giang
                2: [
                    { time: '08:00', description: 'Breakfast in Dong Van.' },
                    { time: '09:00', description: 'Head down to the Nho Que River boat dock. Boat ride: 120,000 VND/person, approx. 30–45 minutes.' },
                    { time: '13:00', short: 'Lunch time', description: 'Lunch in Meo Vac town. Or pre-book lunch at a restaurant right at Tu San canyon.' },
                    { time: '14:00', description: 'Head back to Ha Giang City.' },
                    { time: '17:00', description: 'End of trip. Board your bus back to Hanoi — departures usually around 4:30–5:00 PM.' },
                    { time: '23:00', description: 'Arrive back in Hanoi.' },
                ],
            },
        
'@

# Reconstruct the file
$preamble        = $c.Substring(0, $p1 + $mLen)
$viCaBangToEnHG  = $c.Substring($viHGEnd, $enHGEnd - $viHGEnd)
$enCaBangToEnd   = $c.Substring($enHGEnd)

$newContent = $preamble + $viNew + $viCaBangToEnHG + $enNew + $enCaBangToEnd

[System.IO.File]::WriteAllText($f, $newContent, [System.Text.Encoding]::UTF8)
Write-Host "Done. Positions: p1=$p1 p2=$p2 p3=$p3 p4=$p4"
