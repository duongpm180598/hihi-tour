<?php

function hihi_scripts()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
    wp_enqueue_style('flatpickr_css', get_theme_file_uri('/assets/css/flatpickr.css'));
    wp_enqueue_style('lightgallery_css', get_theme_file_uri('/assets/css/lightgallery.css'));
    wp_enqueue_style('hihi_main_style', get_theme_file_uri('/style.css'));
    wp_enqueue_style('font-custom', '//fonts.googleapis.com/css2?family=Phudu:wght@500;600;700;800&family=Dela+Gothic+One:wght@400&display=swap');
    wp_enqueue_style('aos_style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

    // Ha Giang layout pages
    if (is_page_template('ha-giang-tour.php') || is_page_template('cao-bang-tour.php') || is_page_template('mu-cang-chai.php')) {
        wp_enqueue_style('ha_giang_style', get_theme_file_uri('/assets/css/ha-giang.css'));
    }

    wp_enqueue_script('jquery');
    wp_enqueue_script('aos_script', 'https://unpkg.com/aos@2.3.4/dist/aos.js');
    wp_enqueue_script('flatpickr_script', 'https://cdn.jsdelivr.net/npm/flatpickr', array(), '4.6.13', true);
    wp_enqueue_script('lightgallery_script', get_theme_file_uri('/assets/js/lightgallery.js'));
    wp_enqueue_script('custom_date_picker', get_theme_file_uri('/assets/js/date-picker.js'), array('flatpickr_script'), '1.0', true);
    wp_enqueue_script('main_script', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('itinerary_script', get_theme_file_uri('/assets/js/itinerary.js'), array('jquery'), '1.2', true);
    if (is_page_template('ha-giang-tour.php') || is_page_template('cao-bang-tour.php') || is_page_template('mu-cang-chai.php') || is_page_template('ninh-thuan.php') || is_page_template('cat-ba-tour.php')) {
        wp_enqueue_script('weather_script', get_theme_file_uri('/assets/js/weather.js'), array(), '1.0', true);
    }
    wp_enqueue_script('ionicons_script', '//unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js');
    wp_enqueue_script('ionicons_esm_script', '//unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js');
}

add_action('wp_enqueue_scripts', 'hihi_scripts');

function hihi_sync_tour_page_slugs()
{
    $template_slugs = [
        'ha-giang-tour.php' => 'ha-giang',
        'cao-bang-tour.php' => 'cao-bang',
        'ninh-thuan.php' => 'ninh-thuan',
        'mu-cang-chai.php' => 'mu-cang-chai',
    ];

    foreach ($template_slugs as $template => $slug) {
        $pages = get_posts([
            'post_type' => 'page',
            'post_status' => ['publish', 'draft', 'pending', 'private'],
            'posts_per_page' => -1,
            'fields' => 'ids',
            'meta_key' => '_wp_page_template',
            'meta_value' => $template,
        ]);

        foreach ($pages as $page_id) {
            $page = get_post($page_id);
            if (!$page || $page->post_name === $slug) {
                continue;
            }

            $existing = get_page_by_path($slug);
            if ($existing && (int) $existing->ID !== (int) $page_id) {
                continue;
            }

            wp_update_post([
                'ID' => $page_id,
                'post_name' => $slug,
            ]);
        }
    }
}

add_action('init', 'hihi_sync_tour_page_slugs', 20);

function post_feature_image_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'post_feature_image_setup');

// get lang by permalink
function get_translated_permalink_by_slug($slug) {
    $page = get_page_by_path($slug);
    if (!$page) {
        $template_by_slug = [
            'ha-giang' => 'ha-giang-tour.php',
            'cao-bang' => 'cao-bang-tour.php',
            'ninh-thuan' => 'ninh-thuan.php',
            'mu-cang-chai' => 'mu-cang-chai.php',
            'cat-ba-tour' => 'cat-ba-tour.php',
        ];

        if (!empty($template_by_slug[$slug])) {
            $pages = get_posts([
                'post_type' => 'page',
                'post_status' => ['publish', 'draft', 'pending', 'private'],
                'posts_per_page' => 1,
                'meta_key' => '_wp_page_template',
                'meta_value' => $template_by_slug[$slug],
            ]);
            $page = $pages[0] ?? null;
        }
    }

    if (!$page) return '#';

    $page_id = $page->ID;

    // Nếu Polylang đang hoạt động, lấy ID của bản dịch
    if (function_exists('pll_get_post')) {
        $translated_id = pll_get_post($page_id, pll_current_language());
        if ($translated_id) {
            $page_id = $translated_id;
        }
    }

    return get_permalink($page_id);
}

function hihi_related_destinations($current_slug)
{
    $theme_uri = get_template_directory_uri();
    $destinations = [
        'ha-giang' => [
            'slug' => 'ha-giang',
            'label_en' => 'Ha Giang',
            'label_vi' => 'Hà Giang',
            'img' => $theme_uri . '/assets/images/ha-giang/ha_giang_loop.jpg',
        ],
        'cao-bang' => [
            'slug' => 'cao-bang',
            'label_en' => 'Cao Bang',
            'label_vi' => 'Cao Bằng',
            'img' => $theme_uri . '/assets/images/cao-bang/cao_bang.jpg',
        ],
        'cat-ba-tour' => [
            'slug' => 'cat-ba-tour',
            'label_en' => 'Cat Ba',
            'label_vi' => 'Cát Bà',
            'img' => $theme_uri . '/assets/images/cat-ba/cat_ba_island.jpg',
        ],
        'ninh-thuan' => [
            'slug' => 'ninh-thuan',
            'label_en' => 'Ninh Thuan',
            'label_vi' => 'Ninh Thuận',
            'img' => $theme_uri . '/assets/images/ninh-thuan/bai-da-trung.webp',
        ],
        'mu-cang-chai' => [
            'slug' => 'mu-cang-chai',
            'label_en' => 'Mu Cang Chai',
            'label_vi' => 'Mù Cang Chải',
            'img' => $theme_uri . '/assets/images/mu-cang-chai/mu_cang_chai3.webp',
        ],
    ];

    $related = [
        'ha-giang' => ['cao-bang', 'mu-cang-chai', 'cat-ba-tour'],
        'cao-bang' => ['ha-giang', 'cat-ba-tour', 'mu-cang-chai'],
        'cat-ba-tour' => ['ninh-thuan', 'cao-bang', 'ha-giang'],
        'ninh-thuan' => ['cat-ba-tour', 'mu-cang-chai', 'ha-giang'],
        'mu-cang-chai' => ['ha-giang', 'cao-bang', 'ninh-thuan'],
    ];

    $lang = function_exists('pll_current_language') ? pll_current_language('slug') : 'vi';
    $items = $related[$current_slug] ?? array_values(array_diff(array_keys($destinations), [$current_slug]));

    echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6">';
    foreach (array_slice($items, 0, 3) as $slug) {
        if (!isset($destinations[$slug])) {
            continue;
        }

        $destination = $destinations[$slug];
        $label = $lang === 'en' ? $destination['label_en'] : $destination['label_vi'];
        ?>
        <a href="<?php echo esc_url(get_translated_permalink_by_slug($destination['slug'])); ?>" class="group block">
            <div class="overflow-hidden rounded-xl mb-3" style="aspect-ratio:4/3;">
                <img
                    src="<?php echo esc_url($destination['img']); ?>"
                    alt="<?php echo esc_attr($label); ?>"
                    class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105" />
            </div>
            <p style="font-size:15px; font-weight:700; text-transform:uppercase; color:#1D292C;">
                <?php echo esc_html($label); ?>
            </p>
        </a>
        <?php
    }
    echo '</div>';
}

// load lang
function load_lang() {
    // Lấy ngôn ngữ hiện tại từ Polylang (mặc định là 'vi' nếu không lấy được)
    $lang = function_exists('pll_current_language') ? pll_current_language('slug') : 'vi';
    
    // Đường dẫn tới file json
    $file_path = get_template_directory() . "/lang/{$lang}.json";

    if (file_exists($file_path)) {
        $json_content = file_get_contents($file_path);
        return json_decode($json_content, true);
    }

    return []; // Trả về mảng rỗng nếu không tìm thấy file
}

// booking
function register_booking_statuses()
{
    // Trạng thái: Chờ xử lý (Pending)
    register_post_status('booking-pending', array(
        'label'                     => _x('Chờ xử lý', 'booking status label', 'textdomain'),
        'public'                    => false,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => true,
        // Đã thay đổi thành false để không tạo tab lọc riêng trên màn danh sách
        'show_in_admin_status_list' => false,
        'label_count'               => _n_noop('Chờ xử lý (%s)', 'Chờ xử lý (%s)', 'textdomain'),
    ));

    // Trạng thái: Đã xử lý (Processed/Completed)
    register_post_status('booking-processed', array(
        'label'                     => _x('Đã xử lý', 'booking status label', 'textdomain'),
        'public'                    => false,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => true,
        // Đã thay đổi thành false để không tạo tab lọc riêng trên màn danh sách
        'show_in_admin_status_list' => false,
        'label_count'               => _n_noop('Đã xử lý (%s)', 'Đã xử lý (%s)', 'textdomain'),
    ));

    // Trạng thái: Đã hủy (Cancelled)
    register_post_status('booking-cancelled', array(
        'label'                     => _x('Đã hủy', 'booking status label', 'textdomain'),
        'public'                    => false,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => true,
        // Đã thay đổi thành false để không tạo tab lọc riêng trên màn danh sách
        'show_in_admin_status_list' => false,
        'label_count'               => _n_noop('Đã hủy (%s)', 'Đã hủy (%s)', 'textdomain'),
    ));
}
add_action('init', 'register_booking_statuses');

/**
 * Đăng ký Custom Post Type (CPT) cho Bookings.
 */
function register_booking_cpt()
{
    $labels = array(
        'name'                  => _x('Bookings', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Booking', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Quản lý Booking', 'textdomain'),
        'all_items'             => __('Tất cả Bookings', 'textdomain'),
        'add_new_item'          => __('Thêm Booking mới', 'textdomain'),
        'add_new'               => __('Thêm mới', 'textdomain'),
        'new_item'              => __('Booking mới', 'textdomain'),
        'edit_item'             => __('Chỉnh sửa Booking', 'textdomain'),
        'update_item'           => __('Cập nhật Booking', 'textdomain'),
        'view_item'             => __('Xem Booking', 'textdomain'),
        'view_items'            => __('Xem Bookings', 'textdomain'),
    );
    $args = array(
        'label'                 => __('Booking', 'textdomain'),
        'labels'                => $labels,
        // Dùng custom-fields cho các dữ liệu booking
        'supports'              => array('title', 'editor', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-calendar-alt', // Icon cho menu
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        // Thiết lập callback để đăng ký Meta Box quản lý trạng thái
        'register_meta_box_cb'  => 'add_booking_status_metabox',
    );
    register_post_type('booking', $args);
}
add_action('init', 'register_booking_cpt', 0);


/**
 * === SỬA LỖI: Đảm bảo các Custom Post Status được hiển thị trên trang danh sách CPT Booking. ===
 * Khi xem trang "Tất cả" trong Admin, cần thêm các trạng thái tùy chỉnh vào truy vấn.
 */
function include_custom_booking_statuses_in_admin_list($query)
{
    // Chỉ chạy trong khu vực Admin và là truy vấn chính trên màn hình CPT 'booking'
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'booking') {

        // Lấy post_status hiện tại
        $status = $query->get('post_status');

        // Nếu status rỗng hoặc 'any' (thường là trường hợp "Tất cả")
        if (empty($status) || $status === 'all' || $status === 'any') {

            // Danh sách các trạng thái muốn hiển thị
            $custom_statuses = array(
                'booking-pending',
                'booking-processed',
                'booking-cancelled',
                'publish' // Bao gồm trạng thái mặc định nếu có bản ghi đã từng được publish
            );

            // Gán lại post_status cho truy vấn
            $query->set('post_status', $custom_statuses);
        }
    }
}
add_action('pre_get_posts', 'include_custom_booking_statuses_in_admin_list');


/**
 * Xử lý dữ liệu form khi được gửi đi
 */
function handle_booking_submission()
{
    // 1. KIỂM TRA BẢO MẬT NONCE
    if (! isset($_POST['booking_nonce_field']) || ! wp_verify_nonce($_POST['booking_nonce_field'], 'booking_form_nonce')) {
        wp_die('Security check failed. Vui lòng thử lại.');
    }

    // 2. LẤY DỮ LIỆU & SANITIZE (làm sạch)
    $data = array();
    $data['full_name']          = sanitize_text_field($_POST['fullName']);
    $data['contact_method']     = sanitize_text_field($_POST['contactMethod']);
    $data['whatsapp']           = sanitize_text_field($_POST['whatsapp']);
    $data['date']               = sanitize_text_field($_POST['date']);
    $data['passengers']         = intval($_POST['passengers']);
    $data['children']           = intval($_POST['children']);
    $data['driver_count']       = intval($_POST['driver_count']);
    $data['motorbike_count']    = intval($_POST['motorbike_count']);
    $data['destination']        = sanitize_text_field($_POST['destination']);
    $data['pickup_location']    = sanitize_text_field($_POST['pickup_location']);
    $data['sleep_bus_option']   = sanitize_text_field($_POST['sleep_bus_option']);
    $data['departure_time']     = sanitize_text_field($_POST['departureTime']);
    $data['accommodation']      = sanitize_text_field($_POST['accommodation']);
    $data['car_seats']          = sanitize_text_field($_POST['car_seats']);

    // Kiểm tra dữ liệu bắt buộc (tên và SĐT)
    if (empty($data['full_name']) || empty($data['whatsapp'])) {
        wp_redirect(esc_url(home_url('/error')));
        exit;
    }

    // 3. TẠO TIÊU ĐỀ CHO POST MỚI
    $post_title = $data['full_name'];

    // 4. CHÈN DỮ LIỆU VÀO CPT 'booking'
    $new_post = array(
        'post_title'    => $post_title,
        'post_status'   => 'booking-pending', // Đặt trạng thái là 'Chờ xử lý' (custom status)
        'post_type'     => 'booking', // CPT đã đăng ký ở trên
    );

    $post_id = wp_insert_post($new_post);

    if ($post_id) {
        // 5. LƯU CÁC DỮ LIỆU CÒN LẠI THÀNH CUSTOM FIELDS (Post Meta)
        foreach ($data as $key => $value) {
            update_post_meta($post_id, '_booking_' . $key, $value);
        }

        // Cập nhật post_content để chứa tóm tắt thông tin
        $content = "Thông tin chi tiết Booking:\n";
        $content .= "Nền tảng: {$data['contact_method']})\n";
        $content .= "SĐT: {$data['whatsapp']}\n";
        $content .= "Người lớn: {$data['passengers']}, Trẻ em: {$data['children']}\n";
        $content .= "Thời gian: {$data['date']}\n";
        $content .= "Điểm đến: {$data['destination']}, Điểm đón: {$data['pickup_location']}\n";
        $content .= "Phương tiện: {$data['driver_count']} Easy Rider, {$data['motorbike_count']} Tự lái\n";
        $content .= "Ghế ô tô trẻ em: {$data['car_seats']}\n";
        $content .= "Tùy chọn xe giường nằm: {$data['sleep_bus_option']}\n";


        wp_update_post(array(
            'ID' => $post_id,
            'post_content' => $content,
        ));
    }

    wp_redirect(esc_url(home_url('/thank-you')));
    exit;
}

// Hook cho phép cả khách đã đăng nhập (admin) và chưa đăng nhập (nopriv) gửi form
add_action('admin_post_nopriv_booking_form_submit', 'handle_booking_submission');
add_action('admin_post_booking_form_submit', 'handle_booking_submission');


/**
 * === Quản lý Trạng thái Booking trong Admin (Meta Box) ===
 */

// 1. Thêm Meta Box
function add_booking_status_metabox()
{
    add_meta_box(
        'booking_status_metabox',
        __('Quản lý Trạng thái Booking', 'textdomain'),
        'display_booking_status_metabox',
        'booking',
        'side', // Vị trí bên hông
        'high'
    );
}

// 2. Hiển thị nội dung Meta Box
function display_booking_status_metabox($post)
{
    wp_nonce_field('booking_status_save', 'booking_status_nonce');

    $current_status = get_post_status($post->ID);

    $statuses = array(
        'booking-pending' => 'Chờ xử lý',
        'booking-processed' => 'Đã xử lý',
        'booking-cancelled' => 'Đã hủy',
    );
?>
    <p>
        <label for="booking_status_select">Chọn trạng thái:</label>
        <select name="booking_status_select" id="booking_status_select" style="width: 100%;">
            <?php foreach ($statuses as $key => $label) : ?>
                <option value="<?php echo esc_attr($key); ?>" <?php selected($current_status, $key); ?>>
                    <?php echo esc_html($label); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
<?php
}

// 3. Lưu dữ liệu Meta Box (cập nhật trạng thái post)
function save_booking_status_metabox($post_id)
{
    if (!isset($_POST['post_type']) || 'booking' != $_POST['post_type']) {
        return $post_id;
    }

    if (!isset($_POST['booking_status_nonce']) || !wp_verify_nonce($_POST['booking_status_nonce'], 'booking_status_save')) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Cập nhật trạng thái
    if (isset($_POST['booking_status_select'])) {
        $new_status = sanitize_text_field($_POST['booking_status_select']);
        $valid_statuses = array('booking-pending', 'booking-processed', 'booking-cancelled');

        if (in_array($new_status, $valid_statuses)) {
            if (get_post_status($post_id) !== $new_status) {
                remove_action('save_post', 'save_booking_status_metabox');
                wp_update_post(array(
                    'ID' => $post_id,
                    'post_status' => $new_status,
                ));
                add_action('save_post', 'save_booking_status_metabox');
            }
        }
    }
}
add_action('save_post', 'save_booking_status_metabox');


/**
 * === Tùy chỉnh cột hiển thị trong trang danh sách Admin ===
 */

// Thêm cột trạng thái
function booking_columns($columns)
{
    $new_columns = array();
    foreach ($columns as $key => $title) {
        $new_columns[$key] = $title;
        if ($key == 'title') {
            $new_columns['status'] = 'Trạng thái';
        }
    }

    $new_columns['passengers'] = 'Số lượng Khách';
    $new_columns['whatsapp'] = 'WhatsApp';
    $new_columns['tour_dates'] = 'Thời gian Tour';
    return $new_columns;
}
add_filter('manage_booking_posts_columns', 'booking_columns');

// Điền dữ liệu cho các cột tùy chỉnh
function booking_custom_column($column, $post_id)
{
    switch ($column) {
        case 'passengers':
            echo get_post_meta($post_id, '_booking_passengers', true) . ' Người lớn, ' . get_post_meta($post_id, '_booking_children', true) . ' Trẻ em';
            break;
        case 'whatsapp':
            $whatsapp = get_post_meta($post_id, '_booking_whatsapp', true);
            $method = get_post_meta($post_id, '_booking_contact_method', true);
            echo '<a href="tel:' . esc_attr($whatsapp) . '">' . esc_html($whatsapp) . '</a> (' . esc_html($method) . ')';
            break;
        case 'tour_dates':
            $start_date = get_post_meta($post_id, '_booking_date', true);
            echo esc_html($start_date);
            break;
        case 'status':
            $post_status = get_post_status($post_id);
            if ($post_status == 'booking-pending') {
                echo '<span style="color: #ffb900; font-weight: bold; background: #fff2d8; padding: 4px 8px; border-radius: 4px;">Chờ xử lý</span>';
            } elseif ($post_status == 'booking-processed') {
                echo '<span style="color: #46b450; font-weight: bold; background: #dff0d8; padding: 4px 8px; border-radius: 4px;">Đã xử lý</span>';
            } elseif ($post_status == 'booking-cancelled') {
                echo '<span style="color: #a00; font-weight: bold; background: #f2dede; padding: 4px 8px; border-radius: 4px;">Đã hủy</span>';
            } else {
                echo esc_html($post_status);
            }
            break;
    }
}
add_action('manage_booking_posts_custom_column', 'booking_custom_column', 10, 2);
