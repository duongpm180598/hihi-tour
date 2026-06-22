<?php

require_once get_template_directory() . '/inc/image-assets.php';

define('HIHI_ITINERARY_FEEDBACK_VERSION', '2026-06-19-1');

function hihi_scripts()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
    wp_enqueue_style('flatpickr_css', get_theme_file_uri('/assets/css/flatpickr.css'));
    wp_enqueue_style('lightgallery_css', get_theme_file_uri('/assets/css/lightgallery.css'));
    wp_enqueue_style('hihi_main_style', get_theme_file_uri('/style.css'));
    wp_enqueue_style('font-custom', '//fonts.googleapis.com/css2?family=Phudu:wght@500;600;700;800&family=Dela+Gothic+One:wght@400&display=swap');
    wp_enqueue_style('aos_style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

    // Ha Giang layout pages
    if (is_page_template('ha-giang-tour.php') || is_page_template('cao-bang-tour.php') || is_page_template('mu-cang-chai.php') || is_page_template('ninh-thuan.php') || is_page_template('cat-ba-tour.php') || is_page_template('taiwan.php') || is_page_template('hue-tour.php') || is_page_template('thailand.php')) {
        wp_enqueue_style('ha_giang_style', get_theme_file_uri('/assets/css/ha-giang.css'));
    }

    wp_enqueue_script('jquery');
    wp_enqueue_script('aos_script', 'https://unpkg.com/aos@2.3.4/dist/aos.js');
    wp_enqueue_script('flatpickr_script', 'https://cdn.jsdelivr.net/npm/flatpickr', array(), '4.6.13', true);
    wp_enqueue_script('lightgallery_script', get_theme_file_uri('/assets/js/lightgallery.js'));
    wp_enqueue_script('custom_date_picker', get_theme_file_uri('/assets/js/date-picker.js'), array('flatpickr_script'), '1.0', true);
    wp_enqueue_script('main_script', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.1', true);
    wp_localize_script('main_script', 'hihiItineraryFeedback', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('hihi_itinerary_feedback_vote'),
        'action' => 'hihi_itinerary_feedback_vote',
        'optionSetVersion' => HIHI_ITINERARY_FEEDBACK_VERSION,
        'language' => function_exists('pll_current_language') ? pll_current_language('slug') : 'vi',
    ));
    wp_enqueue_script('itinerary_script', get_theme_file_uri('/assets/js/itinerary.js'), array('jquery'), '1.12', true);
    if (is_page_template('ha-giang-tour.php') || is_page_template('cao-bang-tour.php') || is_page_template('mu-cang-chai.php') || is_page_template('ninh-thuan.php') || is_page_template('cat-ba-tour.php') || is_page_template('taiwan.php') || is_page_template('hue-tour.php') || is_page_template('thailand.php')) {
        wp_enqueue_script('weather_script', get_theme_file_uri('/assets/js/weather.js'), array(), '1.1', true);
    }
    wp_enqueue_script('ionicons_script', '//unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js');
    wp_enqueue_script('ionicons_esm_script', '//unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js');
}

add_action('wp_enqueue_scripts', 'hihi_scripts');

function hihi_itinerary_feedback_options()
{
    return array(
        array('id' => 'nha-trang'),
        array('id' => 'phu-yen'),
        array('id' => 'thailand'),
    );
}

function hihi_itinerary_feedback_option_ids()
{
    return array_column(hihi_itinerary_feedback_options(), 'id');
}

function hihi_itinerary_feedback_results($counts)
{
    $counts = is_array($counts) ? $counts : array();
    $total = 0;
    foreach (hihi_itinerary_feedback_option_ids() as $option_id) {
        $total += max(0, (int) ($counts[$option_id] ?? 0));
    }

    $results = array();
    foreach (hihi_itinerary_feedback_option_ids() as $option_id) {
        $count = max(0, (int) ($counts[$option_id] ?? 0));
        $results[$option_id] = array(
            'count' => $count,
            'percent' => $total > 0 ? round(($count / $total) * 100) : 0,
        );
    }

    return array(
        'total' => $total,
        'options' => $results,
    );
}

function hihi_itinerary_feedback_file_path_from_url($file_url)
{
    $theme_uri = trailingslashit(get_theme_file_uri());
    if (strpos($file_url, $theme_uri) !== 0) {
        return '';
    }

    $relative_path = ltrim(substr($file_url, strlen($theme_uri)), '/');
    if ($relative_path === '' || strpos($relative_path, '..') !== false) {
        return '';
    }

    $file_path = get_theme_file_path($relative_path);
    return is_readable($file_path) ? $file_path : '';
}

function hihi_handle_itinerary_feedback_vote()
{
    check_ajax_referer('hihi_itinerary_feedback_vote', 'nonce');

    $option_id = isset($_POST['optionId'])
        ? sanitize_key(wp_unslash($_POST['optionId']))
        : '';
    $email = isset($_POST['email'])
        ? sanitize_email(wp_unslash($_POST['email']))
        : '';
    $file_url = isset($_POST['fileUrl'])
        ? esc_url_raw(wp_unslash($_POST['fileUrl']))
        : '';
    $file_name = isset($_POST['fileName'])
        ? sanitize_file_name(wp_unslash($_POST['fileName']))
        : '';
    $lang = isset($_POST['lang'])
        ? sanitize_key(wp_unslash($_POST['lang']))
        : 'en';

    if (!in_array($option_id, hihi_itinerary_feedback_option_ids(), true)) {
        wp_send_json_error(array('code' => 'invalid_option'), 400);
    }

    if (empty($email) || !is_email($email)) {
        wp_send_json_error(array('code' => 'invalid_email'), 400);
    }

    $file_path = hihi_itinerary_feedback_file_path_from_url($file_url);
    if ($file_path === '') {
        wp_send_json_error(array('code' => 'invalid_file'), 400);
    }

    $translations = load_lang($lang);
    $global = $translations['global'] ?? array();
    $subject = $global['feedback_modal_0_email_subject'] ?? 'Your HiHi Tour itinerary file';
    $message_template = $global['feedback_modal_0_email_body'] ?? 'Your itinerary file is attached.';
    $message = sprintf($message_template, $file_name ?: basename($file_path));

    $mail_sent = wp_mail($email, $subject, $message, array(), array($file_path));
    if (!$mail_sent) {
        wp_send_json_error(array('code' => 'email_failed'), 500);
    }

    $counts = get_option('hihi_itinerary_feedback_counts', array());
    if (!is_array($counts)) {
        $counts = array();
    }

    $counts[$option_id] = isset($counts[$option_id])
        ? max(0, (int) $counts[$option_id]) + 1
        : 1;

    update_option('hihi_itinerary_feedback_counts', $counts, false);

    $submissions = get_option('hihi_itinerary_feedback_submissions', array());
    if (!is_array($submissions)) {
        $submissions = array();
    }

    $submissions[] = array(
        'email' => $email,
        'option_id' => $option_id,
        'file_name' => $file_name ?: basename($file_path),
        'created_at' => current_time('mysql'),
    );

    update_option('hihi_itinerary_feedback_submissions', array_slice($submissions, -500), false);
    wp_send_json_success(array(
        'results' => hihi_itinerary_feedback_results($counts),
    ));
}

add_action('wp_ajax_hihi_itinerary_feedback_vote', 'hihi_handle_itinerary_feedback_vote');
add_action('wp_ajax_nopriv_hihi_itinerary_feedback_vote', 'hihi_handle_itinerary_feedback_vote');

function hihi_register_itinerary_feedback_dashboard_widget()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $translations = load_lang();
    $global = $translations['global'] ?? array();

    wp_add_dashboard_widget(
        'hihi_itinerary_feedback_dashboard',
        $global['feedback_modal_0_admin_title'] ?? '',
        'hihi_render_itinerary_feedback_dashboard_widget'
    );
}

add_action('wp_dashboard_setup', 'hihi_register_itinerary_feedback_dashboard_widget');

function hihi_render_itinerary_feedback_dashboard_widget()
{
    $translations = load_lang();
    $global = $translations['global'] ?? array();
    $counts = get_option('hihi_itinerary_feedback_counts', array());
    $counts = is_array($counts) ? $counts : array();
    $total = 0;

    echo '<ul>';
    foreach (hihi_itinerary_feedback_options() as $index => $option) {
        $count = max(0, (int) ($counts[$option['id']] ?? 0));
        $label_key = "feedback_modal_0_option_{$index}_label";
        $label = $global[$label_key] ?? $option['id'];
        $total += $count;

        echo '<li><strong>' . esc_html($label) . ':</strong> ' . esc_html(number_format_i18n($count)) . '</li>';
    }
    echo '</ul>';
    echo '<p><strong>' . esc_html($global['feedback_modal_0_admin_total_label'] ?? '') . ':</strong> ' . esc_html(number_format_i18n($total)) . '</p>';
}

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
function get_translated_permalink_by_slug($slug)
{
    $page = get_page_by_path($slug);
    if (!$page) {
        $template_by_slug = [
            'ha-giang' => 'ha-giang-tour.php',
            'cao-bang' => 'cao-bang-tour.php',
            'ninh-thuan' => 'ninh-thuan.php',
            'mu-cang-chai' => 'mu-cang-chai.php',
            'cat-ba-tour' => 'cat-ba-tour.php',
            'taiwan' => 'taiwan.php',
            'hue-tour' => 'hue-tour.php',
            'thailand-trip' => 'thailand.php',
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
function load_lang()
{
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

// feedback / voting
