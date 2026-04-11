<?php
/*
Template Name: Booking
Template Post Type: page
*/
get_header();

$current_lang = pll_current_language('slug');
// Khởi tạo các giá trị mặc định cho form
$formData = [
    'fullName' => '',
    'whatsapp' => '',
    'passengers' => 2,
    'children' => 0,
    'driver_count' => 2, // Mặc định bằng số Passengers
    'motorbike_count' => 1,
    'departureTime' => 'night',
    'accommodation' => 'dormitories', // Giữ lại cho backend nếu cần
];

// Thêm class 'hidden' nếu số trẻ em mặc định là 0
$children_hidden_class = $formData['children'] > 0 ? '' : 'hidden';

$check_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#5B9F05" class="w-4 h-4 mr-2 flex-shrink-0"><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>';

function render_counter($id, $label, $value, $min = 0, $current_lang)
{
    $min_value = $id === 'passengers' ? 1 : $min;
    $label_text = $current_lang === 'en' ? $label : ($id === 'passengers' ? 'Người lớn' : 'Trẻ em (8 - 12 tuổi)');

    return '
        <div class="flex justify-between items-center mb-3">
            <span class="text-gray-700 font-medium">' . $label_text . '</span>
            <div class="flex items-center space-x-2">
                <button
                    type="button"
                    data-target="' . $id . '"
                    data-action="decrement"
                    class="counter-btn w-6 h-6 flex items-center justify-center border border-gray-300 rounded-full bg-white text-gray-700 text-xl hover:bg-gray-100 transition-colors disabled:opacity-50 cursor-pointer"
                    ' . ($value <= $min_value ? 'disabled' : '') . '>
                    &minus;
                </button>
                <input
                    type="number"
                    id="' . $id . '"
                    name="' . $id . '"
                    class="w-10 p-1 text-center rounded-lg bg-white border border-gray-300 text-sm font-bold"
                    value="' . $value . '"
                    min="' . $min_value . '"
                    readonly />
                <button
                    type="button"
                    data-target="' . $id . '"
                    data-action="increment"
                    class="counter-btn w-6 h-6 flex items-center justify-center border border-gray-300 rounded-full bg-white text-gray-700 text-xl hover:bg-gray-100 transition-colors cursor-pointer">
                    &#43;
                </button>
            </div>
        </div>
    ';
}

// Bắt đầu cấu trúc HTML
?>

<div class="bg-gray-50 min-h-screen py-10">
    <div class="bg-white max-w-5xl mx-auto rounded-xl shadow-2xl p-6 md:p-10">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-900">
            <?php echo $current_lang === 'en' ? "Tour booking confirmation" : "Xác Nhận Đặt Tour" ?>
        </h1>

        <form method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="booking_form_submit">
            <?php wp_nonce_field('booking_form_nonce', 'booking_nonce_field'); ?>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-10">
                <div>
                    <div class="p-6 bg-gray-100 rounded-xl shadow-sm mb-10">
                        <h2 class="text-xl font-bold mb-6 text-gray-800">
                            <?php echo $current_lang === 'en' ? "Contact information" : "Thông Tin Liên Hệ" ?>
                        </h2>

                        <label for="fullName" class="block text-sm font-medium mb-1 text-gray-600">
                            <?php echo $current_lang === 'en' ? "Your name" : "Họ và tên của bạn" ?>
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="fullName"
                            name="fullName"
                            placeholder="<?php echo $current_lang === 'en' ? "Full name" : "Họ và tên" ?>"
                            required
                            value="<?= htmlspecialchars($formData['fullName']) ?>"
                            class="w-full p-3 border border-gray-300 rounded-lg mb-6 bg-white focus:ring-green-500 focus:border-green-500" />

                        <!-- WhatsApp / Zalo -->
                        <h3 class="text-sm font-medium mb-2 text-gray-600">
                            <?php echo $current_lang === 'en' ? "How can we contact you?" : "Chúng tôi có thể liên hệ với bạn bằng cách nào?" ?>
                            <span class="text-red-500">*</span>
                        </h3>
                        <div class="flex space-x-6 mb-4">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <input type="radio" name="contactMethod" value="whatsapp" checked class="mr-2" />
                                WhatsApp
                            </label>
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <input type="radio" name="contactMethod" value="zalo" class="mr-2" />
                                <?php echo $current_lang === 'en' ? "Zalo (Vietnamese phone number)" : "Zalo" ?>
                            </label>
                        </div>
                        <input
                            type="text"
                            id="whatsapp"
                            name="whatsapp"
                            placeholder="eg: (+84) 827 412 721"
                            required
                            value="<?= htmlspecialchars($formData['whatsapp']) ?>"
                            class="w-full p-3 border border-gray-300 rounded-lg mb-8 bg-white focus:ring-green-500 focus:border-green-500" />

                        <!-- People Counter -->
                        <h3 class="text-sm font-medium mb-3 text-gray-600">
                            <?php echo $current_lang === 'en' ? "How many people you have?" : "Số lượng người tham gia" ?>
                        </h3>

                        <?= render_counter('passengers', 'Passengers', $formData['passengers'], 1, $current_lang) ?>
                        <?= render_counter('children', 'Children (8 - 12 years old)', $formData['children'], 0, $current_lang) ?>
                    </div>

                    <div class="">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">
                            <?php echo $current_lang === 'en' ? "Your trip plan" : "Lịch trình của bạn" ?>
                            <span class="text-red-500">*</span>
                        </h2>

                        <input
                            type="text"
                            name="date"
                            id="date-range-picker"
                            placeholder="DD/MM/YYYY"
                            required
                            class="flatpickr-input w-full p-3 border border-gray-300 rounded-lg" />
                    </div>
                </div>


                <div>
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <h2 class="text-lg font-bold mb-4 text-gray-800"><?php echo $current_lang === 'en' ? "Round trip sleep bus" : "Xe khứ hồi " ?> <span id="tour"></span></h2>
                            <div class="flex justify-between items-center p-3 bg-[#DCF5ED] rounded-lg mb-6">
                                <div class="flex items-center text-sm font-medium ">
                                    <?= $check_icon ?>
                                    <?php echo $current_lang === 'en' ? "You will have separate bed." : "Bạn sẽ ngủ giường riêng." ?>

                                </div>
                            </div>
                        </div>
                        <span class="text-sm"><span class="text-[#0066FF] font-bold" id="passenger-price"></span><br /><span class="text-[#74797A]"><?php echo $current_lang === 'en' ? "per pax" : "trên người" ?></span></span>

                    </div>
                    <div class="mb-8 relative pl-2">
                        <div
                            class="absolute top-2 left-[11px] h-9 w-0.5 bg-[#FDE0A2] z-0"></div>

                        <div class="flex items-start mb-4 relative z-10">
                            <span class="w-2 h-2 rounded-full bg-[#F9BB32] mt-2 mr-3 block flex-shrink-0"></span>
                            <div class="flex flex-1 items-start justify-between">
                                <span class="text-sm font-medium mr-4"><?php echo $current_lang === 'en' ? "Pick up location" : "Điểm đón" ?></span>
                                <div class="text-sm text-gray-700 font-medium text-right max-w-[60%]">
                                    <?php echo $current_lang === 'en' ? "Old Quarter, Ha Noi" : "Phố cổ Hà Nội" ?>
                                </div>
                                <input name="pickup_location" value="Hà Nội" hidden />
                            </div>
                        </div>

                        <!-- Drop off -->
                        <div class="flex items-start mt-3 relative z-10">
                            <span class="w-2 h-2 rounded-full bg-[#F9BB32] mt-2 mr-3 block flex-shrink-0"></span>
                            <div class="flex flex-1 items-start justify-between">
                                <span class="text-sm font-medium mr-4"> <?php echo $current_lang === 'en' ? "Drop off location" : "Điểm đến" ?></span>
                                <div class="text-sm text-gray-700 font-medium text-right max-w-[60%]" id="drop-off-location">
                                </div>
                                <input id="destination" name="destination" hidden />
                            </div>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold mb-4 text-gray-800">
                        <?php echo $current_lang === 'en' ? "What is your preferred transportation?" : "Bạn thích sử dụng phương tiện giao thông nào nhất?" ?>
                    </h3>

                    <div class="flex justify-between items-center mb-3">
                        <span class="font-medium text-gray-700"><?php echo $current_lang === 'en' ? "Hire easy driver" : "Thuê tài xế" ?></span>

                        <div class="flex gap-3">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2">
                                    <button
                                        type="button"
                                        data-target="driver_count"
                                        data-action="decrement"
                                        class="counter-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-full bg-gray-100 text-lg hover:bg-gray-200 transition-colors cursor-pointer">
                                        &minus;
                                    </button>
                                    <input
                                        type="number"
                                        id="driver_count_input"
                                        name="driver_count"
                                        class="w-12 p-1.5 text-center rounded-lg bg-white border border-gray-300 font-bold"
                                        value="<?= $formData['driver_count'] ?>"
                                        min="0"
                                        readonly />
                                    <button
                                        type="button"
                                        data-target="driver_count"
                                        data-action="increment"
                                        class="counter-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-full bg-gray-100 text-lg hover:bg-gray-200 transition-colors cursor-pointer">
                                        &#43;
                                    </button>
                                </div>
                            </div>
                            <span class="text-sm"><span class="text-[#0066FF] font-bold" id="easy-drive-price"></span><br /><span class="text-[#74797A]"><?php echo $current_lang === 'en' ? "per day" : "trên ngày" ?></span></span>
                        </div>
                    </div>

                    <div id="child-supervisor" class="flex items-center p-3 bg-[#DCF5ED] rounded-lg text-sm mb-4 font-medium <?= $children_hidden_class ?>">
                        <?= $check_icon ?>
                        <?php echo $current_lang === 'en' ? "Your child can go 1 - 1 with our easy driver, under your supervisor" : "Con bạn có thể đi cùng dưới sự giám sát của tài xế riêng." ?>

                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="font-medium text-gray-700"><?php echo $current_lang === 'en' ? "Self-drive motorbike (adult only)" : "Tự lái (dành cho người lớn)" ?></span>
                        <div class="flex gap-3">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2">
                                    <button
                                        type="button"
                                        data-target="motorbike_count"
                                        data-action="decrement"
                                        class="counter-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-full bg-gray-100 text-lg hover:bg-gray-200 transition-colors cursor-pointer">
                                        &minus;
                                    </button>
                                    <input
                                        type="number"
                                        id="motorbike_count_input"
                                        name="motorbike_count"
                                        class="w-12 p-1.5 text-center rounded-lg bg-white border border-gray-300 font-bold"
                                        value="<?= $formData['motorbike_count'] ?>"
                                        min="0"
                                        readonly />
                                    <button
                                        type="button"
                                        data-target="motorbike_count"
                                        data-action="increment"
                                        class="counter-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-full bg-gray-100 text-lg hover:bg-gray-200 transition-colors cursor-pointer">
                                        &#43;
                                    </button>
                                </div>
                            </div>
                            <span class="text-sm"><span class="text-[#0066FF] font-bold" id="self-drive-price"></span><br /><span class="text-[#74797A]"><?php echo $current_lang === 'en' ? "per day" : "trên ngày" ?></span></span>
                        </div>
                    </div>

                    <h3 class="text-base font-bold mb-3 text-gray-800"><?php echo $current_lang === 'en' ? "Hire a car" : "Thuê xe khách" ?></h3>
                    <div class="mb-8 space-y-2">
                        <!-- <label for="car_not_using" class="flex items-center text-sm font-medium text-gray-700">
                            <input type="radio" id="car_not_using" name="car_seats" value="not_using" checked class="mr-2" />
                            <?php echo $current_lang === 'en' ? "Not using" : "Không sử dụng" ?>
                        </label> -->
                        <div class="flex items-center space-x-6">
                            <label for="car_not_using" class="flex items-center">
                                <input type="radio" id="no" name="car_seats" value="car_not_using" class="mr-2" checked /> <?php echo $current_lang === 'en' ? "No" : "Không sử dụng" ?>
                            </label>
                            <label for="seats_7" class="flex items-center">
                                <input type="radio" id="seats_7" name="car_seats" value="7" class="mr-2" /> 7 <?php echo $current_lang === 'en' ? "seats" : "Chỗ ngồi" ?>
                            </label>
                            <label for="limousine" class="flex items-center">
                                <input type="radio" id="limousine" name="car_seats" value="limousine" class="mr-2" /> Limousine
                            </label>
                        </div>
                    </div>

                    <h3 class="font-bold mb-3"><?php echo $current_lang === 'en' ? "Accommodations" : "Chỗ ở" ?></h3>
                    <div class="mb-3">
                        <h4 class="flex items-center text-sm font-medium mb-2">
                            <?php echo $current_lang === 'en' ? "You have your own room!" : "Bạn sẽ có phòng riêng!" ?>
                        </h4>
                        <p class="text-[#5E6465]">
                            <?php echo $current_lang === 'en' ? "We will confirm room details in direct messages" : "Chúng tôi sẽ xác nhận chi tiết phòng qua tin nhắn riêng." ?>
                        </p>
                    </div>

                    <h3 class="font-bold mb-3 "><?php echo $current_lang === 'en' ? "Meals and entrance fees (if any) are already included!" : "Giá đã bao gồm bữa ăn và phí vào cửa (nếu có)!" ?></h3>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-200">
                <div class="flex justify-between items-center bg-white p-4 rounded-xl">
                    <span class="text-xl font-bold text-gray-800">
                        <?php echo $current_lang === 'en' ? "Total payment" : "Tổng thanh toán" ?>
                    </span>
                    <span id="total-price" class="text-4xl font-extrabold text-[#0066FF]"></span>
                </div>
            </div>

            <button
                type="submit"
                id="submitButton"
                class="mt-6 w-full py-4 bg-black text-white font-semibold rounded-lg hover:opacity-70 transition cursor-pointer">
                <?php echo $current_lang === 'en' ? "Send information" : "Gửi thông tin" ?>

            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pathname = window.location.pathname
        const vi = pathname.includes('/vi')

        function getTourParam() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const tourValue = urlParams.get('tour');
            return tourValue;
        }
        const tourEl = document.getElementById('tour');
        const dropOffEl = document.getElementById('drop-off-location');
        const destinationEl = document.getElementById('destination');

        const tourId = getTourParam() || 'ha_giang';

        if (tourId === 'ha_giang') {
            destinationEl.value = "Hà Giang";
            tourEl.textContent = vi ? 'Hà Nội - Hà Giang' : 'Ha Noi - Ha Giang';
            dropOffEl.textContent = vi ? 'KiKi House, 1348 Lý Tự Trọng, trung tâm Hà Giang' : 'KiKi House, 1348 Ly Tu Trong Str., Ha Giang centre';
        } else {
            destinationEl.value = "Cao Bằng";
            tourEl.textContent = vi ? 'Hà Nội - Cao Bằng' : 'Ha Noi - Cao Bang';
            dropOffEl.textContent = vi ? 'Cốm homestay, Đường 3/10, Nà Cạn, Cao Bằng' : 'Com Homestay, 3/10 Str., Na Can, Cao Bang';
        }

        const counterButtons = document.querySelectorAll('.counter-btn');

        const PASSENGER_UNIT_PRICE = vi ? 700000 : 30;
        const EASY_DRIVER_UNIT_PRICE = vi ? 1500000 : 65;
        const SELF_DRIVE_UNIT_PRICE = vi ? 1200000 : 49;

        const passengerPriceEl = document.getElementById('passenger-price');
        const easyDrivePriceEl = document.getElementById('easy-drive-price');
        const selfDrivePriceEl = document.getElementById('self-drive-price');
        const totalPriceEl = document.getElementById('total-price');

        const passengersInput = document.getElementById('passengers');
        const childrenInput = document.getElementById('children');
        const driverCountInput = document.getElementById('driver_count_input');
        const motorbikeCountInput = document.getElementById('motorbike_count_input');

        const childSupervisorEl = document.getElementById('child-supervisor');

        const fullNameInput = document.getElementById('fullName');
        const whatsappInput = document.getElementById('whatsapp');
        const dateRangePicker = document.getElementById('date-range-picker');
        const submitButton = document.getElementById('submitButton');
        let totalDays = 1;

        flatpickr('#date-range-picker', {
            mode: 'range',
            dateFormat: 'd/m/Y',
            minDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                checkRequiredFields();
                if (selectedDates.length === 2) {
                    const diffTime = Math.abs(selectedDates[1] - selectedDates[0]);
                    totalDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                } else {
                    totalDays = 1;
                }

                calculatePrices();
            }
        });

        function checkRequiredFields() {
            const isNameFilled = fullNameInput.value.trim() !== '';
            const isWhatsappFilled = whatsappInput.value.trim() !== '';
            const isDateRangeFilled = dateRangePicker.value.trim() !== '';
            submitButton.disabled = !(isNameFilled && isWhatsappFilled && isDateRangeFilled);
        }

        fullNameInput.addEventListener('input', checkRequiredFields);
        whatsappInput.addEventListener('input', checkRequiredFields);

        function updateChildSupervisorVisibility() {
            const childrenCount = parseInt(childrenInput.value) || 0;
            const driverCount = parseInt(driverCountInput.value) || 0;
            if (childrenCount > 0 && driverCount > 0) {
                childSupervisorEl.classList.remove('hidden');
            } else {
                childSupervisorEl.classList.add('hidden');
            }
        }

        function calculatePrices() {
            const passengers = parseInt(passengersInput.value) || 0;
            const driverCount = parseInt(driverCountInput.value) || 0;
            const motorbikeCount = parseInt(motorbikeCountInput.value) || 0;

            const passengerPrice = passengers * PASSENGER_UNIT_PRICE;
            const easyDrivePrice = driverCount * EASY_DRIVER_UNIT_PRICE;
            const selfDrivePrice = motorbikeCount * SELF_DRIVE_UNIT_PRICE;

            const subTotal = passengerPrice + easyDrivePrice + selfDrivePrice;
            const finalTotal = subTotal * totalDays;

            passengerPriceEl.textContent = `${PASSENGER_UNIT_PRICE.toLocaleString('vi-VN')} ${vi ? 'VNĐ' : 'USD'}`;
            easyDrivePriceEl.textContent = `${EASY_DRIVER_UNIT_PRICE.toLocaleString('vi-VN')} ${vi ? 'VNĐ' : 'USD'}`;
            selfDrivePriceEl.textContent = `${SELF_DRIVE_UNIT_PRICE.toLocaleString('vi-VN')} ${vi ? 'VNĐ' : 'USD'}`;

            totalPriceEl.textContent = `${finalTotal.toLocaleString('vi-VN')} ${vi ? 'VNĐ' : 'USD'}`;

            const totalDaysEl = document.getElementById('display-total-days');
            if (totalDaysEl) {
                totalDaysEl.textContent = `x ${totalDays} ${vi ? 'ngày' : 'days'}`;
            }
        }


        counterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const targetId = event.currentTarget.getAttribute('data-target');

                let inputElement;
                if (targetId === 'driver_count') {
                    inputElement = driverCountInput;
                } else if (targetId === 'motorbike_count') {
                    inputElement = motorbikeCountInput;
                } else {
                    inputElement = document.getElementById(targetId);
                }

                if (!inputElement) return;

                const action = event.currentTarget.getAttribute('data-action');
                let currentValue = parseInt(inputElement.value);
                const minValue = targetId === 'passengers' ? 1 : 0;

                if (action === 'increment') {
                    currentValue++;
                } else if (action === 'decrement' && currentValue > minValue) {
                    currentValue--;
                }

                inputElement.value = currentValue;

                const decrementBtn = inputElement.previousElementSibling;
                if (decrementBtn && decrementBtn.classList.contains('counter-btn')) {
                    decrementBtn.disabled = currentValue <= minValue;
                }

                if (targetId === 'children') {
                    updateChildSupervisorVisibility();
                }

                calculatePrices();
            });
        });

        calculatePrices();
        updateChildSupervisorVisibility();
    });
</script>

<?php get_footer(); ?>