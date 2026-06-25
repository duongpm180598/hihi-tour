<?php

require_once get_template_directory() . '/inc/image-assets.php';

define('HIHI_ITINERARY_FEEDBACK_VERSION', '2026-06-19-1');
define('HIHI_ITINERARY_FEEDBACK_DB_VERSION', '1.0.0');

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
    wp_enqueue_script('main_script', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.2', true);
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

function hihi_itinerary_feedback_table_name()
{
    global $wpdb;
    return $wpdb->prefix . 'hihi_itinerary_feedback';
}

function hihi_itinerary_feedback_install_table()
{
    if (get_option('hihi_itinerary_feedback_db_version') === HIHI_ITINERARY_FEEDBACK_DB_VERSION) {
        return;
    }

    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $table_name = hihi_itinerary_feedback_table_name();
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE {$table_name} (
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        email VARCHAR(190) NOT NULL,
        option_id VARCHAR(60) NOT NULL,
        file_name VARCHAR(190) NOT NULL DEFAULT '',
        file_url VARCHAR(500) NOT NULL DEFAULT '',
        status VARCHAR(20) NOT NULL DEFAULT 'pending',
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL,
        PRIMARY KEY  (id),
        KEY email (email),
        KEY status (status)
    ) {$charset_collate};";

    dbDelta($sql);

    update_option('hihi_itinerary_feedback_db_version', HIHI_ITINERARY_FEEDBACK_DB_VERSION, false);
}

add_action('after_switch_theme', 'hihi_itinerary_feedback_install_table');
add_action('init', 'hihi_itinerary_feedback_install_table');

function hihi_itinerary_feedback_option_label($option_id)
{
    $options = hihi_itinerary_feedback_options();
    $translations = load_lang();
    $global = $translations['global'] ?? array();

    foreach ($options as $index => $option) {
        if ($option['id'] === $option_id) {
            $label_key = "feedback_modal_0_option_{$index}_label";
            return $global[$label_key] ?? $option_id;
        }
    }

    return $option_id;
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

// Surfaces the real SMTP error (e.g. Gmail/hosting auth failure) in the PHP error log,
// since wp_mail() only returns a boolean and the UI shows a generic failure notice.
function hihi_log_itinerary_feedback_mail_error($wp_error)
{
    error_log('Hihi itinerary feedback mail error: ' . $wp_error->get_error_message());
}

add_action('wp_mail_failed', 'hihi_log_itinerary_feedback_mail_error');

function hihi_render_itinerary_feedback_email_html($subject, $message, $file_name)
{
    ob_start();
    include get_template_directory() . '/inc/email-templates/itinerary-feedback-email.php';
    return ob_get_clean();
}

function hihi_itinerary_feedback_mail_content_type()
{
    return 'text/html';
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
    $email_html = hihi_render_itinerary_feedback_email_html($subject, $message, $file_name ?: basename($file_path));

    add_filter('wp_mail_content_type', 'hihi_itinerary_feedback_mail_content_type');
    $mail_sent = wp_mail($email, $subject, $email_html, array(), array($file_path));
    remove_filter('wp_mail_content_type', 'hihi_itinerary_feedback_mail_content_type');
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

    global $wpdb;
    $now = current_time('mysql');
    $wpdb->insert(
        hihi_itinerary_feedback_table_name(),
        array(
            'email' => $email,
            'option_id' => $option_id,
            'file_name' => $file_name ?: basename($file_path),
            'file_url' => $file_url,
            'status' => 'pending',
            'created_at' => $now,
            'updated_at' => $now,
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
    );
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

function hihi_register_itinerary_feedback_admin_page()
{
    add_menu_page(
        'Feedback',
        'Feedback',
        'manage_options',
        'hihi-itinerary-feedback',
        'hihi_render_itinerary_feedback_admin_page',
        'dashicons-email-alt',
        26
    );
}

add_action('admin_menu', 'hihi_register_itinerary_feedback_admin_page');

function hihi_handle_feedback_status_update()
{
    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền thực hiện hành động này.');
    }

    check_admin_referer('hihi_feedback_status_update');

    $id = isset($_POST['id']) ? absint($_POST['id']) : 0;
    $status = isset($_POST['status']) ? sanitize_key(wp_unslash($_POST['status'])) : '';

    if ($id && in_array($status, array('pending', 'completed'), true)) {
        global $wpdb;
        $wpdb->update(
            hihi_itinerary_feedback_table_name(),
            array('status' => $status, 'updated_at' => current_time('mysql')),
            array('id' => $id),
            array('%s', '%s'),
            array('%d')
        );
    }

    wp_safe_redirect(wp_get_referer() ?: admin_url('admin.php?page=hihi-itinerary-feedback'));
    exit;
}

add_action('admin_post_hihi_feedback_status_update', 'hihi_handle_feedback_status_update');

function hihi_handle_feedback_send_email()
{
    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền thực hiện hành động này.');
    }

    check_admin_referer('hihi_feedback_send_email');

    $id = isset($_POST['id']) ? absint($_POST['id']) : 0;
    $subject = isset($_POST['subject']) ? sanitize_text_field(wp_unslash($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
    $redirect_url = admin_url('admin.php?page=hihi-itinerary-feedback');

    global $wpdb;
    $row = $id ? $wpdb->get_row($wpdb->prepare(
        'SELECT * FROM ' . hihi_itinerary_feedback_table_name() . ' WHERE id = %d',
        $id
    )) : null;

    if (!$row || $subject === '' || $message === '') {
        wp_safe_redirect(add_query_arg('hihi_feedback_notice', 'email_failed', $redirect_url));
        exit;
    }

    $sent = wp_mail($row->email, $subject, $message);

    if ($sent) {
        $wpdb->update(
            hihi_itinerary_feedback_table_name(),
            array('status' => 'completed', 'updated_at' => current_time('mysql')),
            array('id' => $id),
            array('%s', '%s'),
            array('%d')
        );
    }

    wp_safe_redirect(add_query_arg('hihi_feedback_notice', $sent ? 'email_sent' : 'email_failed', $redirect_url));
    exit;
}

add_action('admin_post_hihi_feedback_send_email', 'hihi_handle_feedback_send_email');

function hihi_render_itinerary_feedback_admin_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    global $wpdb;
    $table_name = hihi_itinerary_feedback_table_name();

    $status_filter = isset($_GET['status_filter']) ? sanitize_key(wp_unslash($_GET['status_filter'])) : 'all';
    $per_page = 20;
    $paged = isset($_GET['paged']) ? max(1, absint($_GET['paged'])) : 1;
    $offset = ($paged - 1) * $per_page;

    $where = '';
    $where_args = array();
    if (in_array($status_filter, array('pending', 'completed'), true)) {
        $where = 'WHERE status = %s';
        $where_args[] = $status_filter;
    }

    $total_sql = "SELECT COUNT(*) FROM {$table_name} {$where}";
    $total = (int) ($where_args ? $wpdb->get_var($wpdb->prepare($total_sql, $where_args)) : $wpdb->get_var($total_sql));

    $list_sql = "SELECT * FROM {$table_name} {$where} ORDER BY created_at DESC LIMIT %d OFFSET %d";
    $rows = $wpdb->get_results($wpdb->prepare($list_sql, array_merge($where_args, array($per_page, $offset))));

    $total_pages = (int) ceil($total / $per_page);
    $notice = isset($_GET['hihi_feedback_notice']) ? sanitize_key(wp_unslash($_GET['hihi_feedback_notice'])) : '';
?>
    <div class="wrap">
        <h1>Feedback</h1>

        <?php if ($notice === 'email_sent') : ?>
            <div class="notice notice-success is-dismissible">
                <p>Đã gửi email feedback thành công.</p>
            </div>
        <?php elseif ($notice === 'email_failed') : ?>
            <div class="notice notice-error is-dismissible">
                <p>Gửi email thất bại, vui lòng thử lại.</p>
            </div>
        <?php endif; ?>

        <ul class="subsubsub">
            <li>
                <a href="<?php echo esc_url(admin_url('admin.php?page=hihi-itinerary-feedback')); ?>" class="<?php echo $status_filter === 'all' ? 'current' : ''; ?>">Tất cả</a> |
            </li>
            <li>
                <a href="<?php echo esc_url(admin_url('admin.php?page=hihi-itinerary-feedback&status_filter=pending')); ?>" class="<?php echo $status_filter === 'pending' ? 'current' : ''; ?>">Đang chờ</a> |
            </li>
            <li>
                <a href="<?php echo esc_url(admin_url('admin.php?page=hihi-itinerary-feedback&status_filter=completed')); ?>" class="<?php echo $status_filter === 'completed' ? 'current' : ''; ?>">Hoàn tất</a>
            </li>
        </ul>

        <table class="widefat striped" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Lựa chọn</th>
                    <th>File</th>
                    <th>Trạng thái</th>
                    <th>Ngày gửi</th>
                    <th style="width:320px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$rows) : ?>
                    <tr>
                        <td colspan="6">Chưa có dữ liệu feedback.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?php echo esc_html($row->email); ?></td>
                            <td><?php echo esc_html(hihi_itinerary_feedback_option_label($row->option_id)); ?></td>
                            <td><?php echo esc_html($row->file_name); ?></td>
                            <td>
                                <span class="hihi-feedback-status hihi-feedback-status--<?php echo esc_attr($row->status); ?>">
                                    <?php echo $row->status === 'completed' ? 'Hoàn tất' : 'Đang chờ'; ?>
                                </span>
                            </td>
                            <td><?php echo esc_html(mysql2date('d/m/Y H:i', $row->created_at)); ?></td>
                            <td>
                                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-bottom:8px;">
                                    <?php wp_nonce_field('hihi_feedback_status_update'); ?>
                                    <input type="hidden" name="action" value="hihi_feedback_status_update">
                                    <input type="hidden" name="id" value="<?php echo esc_attr($row->id); ?>">
                                    <input type="hidden" name="status" value="<?php echo $row->status === 'completed' ? 'pending' : 'completed'; ?>">
                                    <button type="submit" class="button button-small">
                                        <?php echo $row->status === 'completed' ? 'Đánh dấu đang chờ' : 'Đánh dấu hoàn tất'; ?>
                                    </button>
                                </form>

                                <details>
                                    <summary style="cursor:pointer;">Gửi email feedback</summary>
                                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:8px;">
                                        <?php wp_nonce_field('hihi_feedback_send_email'); ?>
                                        <input type="hidden" name="action" value="hihi_feedback_send_email">
                                        <input type="hidden" name="id" value="<?php echo esc_attr($row->id); ?>">
                                        <p style="margin:4px 0;">
                                            <input type="text" name="subject" class="regular-text" placeholder="Chủ đề email" required>
                                        </p>
                                        <p style="margin:4px 0;">
                                            <textarea name="message" class="regular-text" rows="3" placeholder="Nội dung email" required></textarea>
                                        </p>
                                        <button type="submit" class="button button-primary button-small">Gửi email</button>
                                    </form>
                                </details>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($total_pages > 1) : ?>
            <div class="tablenav">
                <div class="tablenav-pages">
                    <?php
                    echo paginate_links(array(
                        'base' => add_query_arg('paged', '%#%'),
                        'format' => '',
                        'current' => $paged,
                        'total' => $total_pages,
                    ));
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <style>
        .hihi-feedback-status {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .hihi-feedback-status--pending {
            background: #fef3c7;
            color: #92400e;
        }

        .hihi-feedback-status--completed {
            background: #d1fae5;
            color: #065f46;
        }
    </style>
    <?php
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
