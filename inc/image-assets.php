<?php
/**
 * Central image URL map.
 *
 * Put WordPress Media Library URLs here when a filename is duplicated or cannot
 * be resolved automatically. Use either:
 * - ['file' => 'original-file-name.webp'] to resolve from WP uploads by filename.
 * - ['url' => 'https://hihitour.com/wp-content/uploads/YYYY/MM/original-file-name.webp'] for exact manual mapping.
 *
 * Prefer exact 'url' values for production. They avoid Media Library lookup.
 */

function hihi_image_manifest()
{
    return [
        'global' => [
            'social' => [
                'whatsapp'  => ['file' => 'whatsapp.png'],
                'instagram' => ['file' => 'instagram.png'],
                'facebook'  => ['file' => 'facebook.png'],
            ],
            'qr' => [
                'whatsapp'  => ['file' => 'whatsapp_qr.jpg'],
                'instagram' => ['file' => 'instagram_qr.png'],
                'facebook'  => ['file' => 'facebook_qr.png'],
            ],
        ],
        'ninh_thuan' => [
            'hero' => ['file' => 'banner.png'],
            'highlight' => [
                'default' => ['file' => 'bai-da-trung.webp'],
            ],
            'transport' => [
                'default' => ['file' => 'bai-da-trung.webp'],
            ],
            'gallery' => [
                ['file' => 'nho_que_ha_giang.jpg'],
                ['file' => 'cuoc_song_ha_giang.jpg'],
                ['file' => 'xa_phin_ha_giang.jpg'],
                ['file' => 'pho_cao_ha_giang_2.jpg'],
                ['file' => 'pho_cao_ha_giang_3.jpg'],
                ['file' => 'cua_chu_M_ha_giang.jpg'],
                ['file' => 'du_gia_ha_giang.jpg'],
                ['file' => 'pho_bang_ha_giang.jpg'],
                ['file' => 'dan_trau_tren_doi.jpg'],
                ['file' => 'tre_em_ha_giang.jpg'],
                ['file' => 'doc_tham_ma_ha_giang.jpg'],
                ['file' => 'nui_rung_ha_giang.jpg'],
                ['file' => 'cho_meo_ha_giang.jpg'],
                ['file' => 'tu_san_coffee_ha_giang.jpg'],
                ['file' => 'pho_cao_ha_giang_1.jpg'],
            ],
            'weather' => [
                ['file' => 'weather-1.png'],
                ['file' => 'weather-2.png'],
                ['file' => 'weather-3.png'],
            ],
            'culture' => [
                ['file' => 'immerse-1.png'],
                ['file' => 'immerse-2.png'],
                ['file' => 'immerse-3.png'],
                ['file' => 'immerse-4.png'],
                ['file' => 'immerse-5.png'],
            ],
        ],
    ];
}

function hihi_image_url($key)
{
    return hihi_image_resolve_value(hihi_image_manifest_value($key));
}

function hihi_image_group($key)
{
    return hihi_image_resolve_group(hihi_image_manifest_value($key));
}

function hihi_image_manifest_value($key)
{
    $value = hihi_image_manifest();
    foreach (explode('.', $key) as $part) {
        if (!is_array($value) || !array_key_exists($part, $value)) {
            return '';
        }
        $value = $value[$part];
    }

    return $value;
}

function hihi_image_resolve_group($value)
{
    if (!is_array($value)) {
        return hihi_image_resolve_value($value);
    }

    if (isset($value['url']) || isset($value['file'])) {
        return hihi_image_resolve_value($value);
    }

    $resolved = [];
    foreach ($value as $key => $item) {
        $resolved[$key] = hihi_image_resolve_group($item);
    }

    return $resolved;
}

function hihi_image_resolve_value($value)
{
    if (is_array($value)) {
        if (!empty($value['url'])) {
            return hihi_normalize_image_url($value['url']);
        }

        if (!empty($value['file'])) {
            return hihi_media_url_by_filename($value['file']);
        }

        return '';
    }

    return hihi_normalize_image_url((string) $value);
}

function hihi_normalize_image_url($value)
{
    $value = trim((string) $value);
    if ($value === '') {
        return '';
    }

    if (preg_match('#^https?://#i', $value)) {
        return $value;
    }

    if (substr($value, 0, 9) === '/assets/') {
        return get_template_directory_uri() . $value;
    }

    return hihi_media_url_by_filename($value);
}

function hihi_media_url_by_filename($filename)
{
    static $cache = [];

    $filename = basename(str_replace('\\', '/', (string) $filename));
    if ($filename === '') {
        return '';
    }

    if (array_key_exists($filename, $cache)) {
        return $cache[$filename];
    }

    global $wpdb;

    if (!$wpdb) {
        $cache[$filename] = '';
        return '';
    }

    $like_with_path = '%' . $wpdb->esc_like('/' . $filename);
    $like_basename = $wpdb->esc_like($filename);
    $attachment_id = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT post_id FROM {$wpdb->postmeta}
             WHERE meta_key = '_wp_attached_file'
             AND (meta_value LIKE %s OR meta_value = %s)
             ORDER BY post_id DESC
             LIMIT 1",
            $like_with_path,
            $like_basename
        )
    );

    $cache[$filename] = $attachment_id ? (wp_get_attachment_url((int) $attachment_id) ?: '') : '';

    return $cache[$filename];
}
