<?php

function hihi_image_manifest()
{
    return [
        'ninh_thuan' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
            ],
            'highlight' => [
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
            ],
            'transport' => [
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
            ],
            'weather' => [
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
            ],
            'culture' => [
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
            ],
        ],
    ];
}

function hihi_image_value($key)
{
    $value = hihi_image_manifest();

    foreach (explode('.', $key) as $part) {
        if (!is_array($value) || !array_key_exists($part, $value)) {
            return null;
        }

        $value = $value[$part];
    }

    return $value;
}

function hihi_image_url($key)
{
    $value = hihi_image_value($key);

    return is_string($value) ? $value : '';
}

function hihi_image_group($key)
{
    $value = hihi_image_value($key);

    return is_array($value) ? $value : [];
}
