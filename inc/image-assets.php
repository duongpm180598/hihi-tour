<?php

function hihi_image_manifest()
{
    $theme_uri = function_exists('get_template_directory_uri') ? get_template_directory_uri() : '';

    return [
        'ninh_thuan' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2026/06/bai-da-trung.webp',
                'https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
            ],
            'highlight' => [
                'https://hihitour.com/wp-content/uploads/2026/06/bai-da-trung.webp',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg',
                'https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg',
            ],
            'transport' => [
                $theme_uri . '/assets/images/san_bay_hue.jpg',
                $theme_uri . '/assets/images/ha-giang/transport-normal.webp',
                $theme_uri . '/assets/images/xe_may_hue.jpg',
                $theme_uri . '/assets/images/ha-giang/transport-normal.webp',
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
        'ha_giang' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2026/06/mountain-du-gia.webp',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2026/06/cuoc-song-du-gia.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cua-chu-m-hg.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/du_gia_ha_giang-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/ganh-co-pho-cao.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/ha-giang-food.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/ha-giang-mua-xuan.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/meo-vac-market.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mountain-du-gia.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/nha-pho-cao.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/nho_que_ha_giang-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/nui_rung_ha_giang-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/pho_bang_ha_giang-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/pho_cao_ha_giang_1-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/pho_cao_ha_giang_2-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/pho_cao_ha_giang_3-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/somewhere-ha-giang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/tre_em_ha_giang-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/tu_san_coffee_ha_giang-scaled.jpg',
            ],
            'highlights' => [
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/sang-tung.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/sang-tung2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/sang-tung-360.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/nha-pho-cao.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/pho_cao_ha_giang_1-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2026/06/pho_cao_ha_giang_3-scaled.jpg',
                ],
                ['https://hihitour.com/wp-content/uploads/2026/06/pho_bang_ha_giang-scaled.jpg'],
                ['https://hihitour.com/wp-content/uploads/2026/06/cua-chu-m-hg.webp'],
                ['https://hihitour.com/wp-content/uploads/2026/06/ha_giang_deo_gio-scaled.jpg'],
                ['https://hihitour.com/wp-content/uploads/2026/06/thi-tran-dong-van.jpg'],
                ['https://hihitour.com/wp-content/uploads/2026/06/xa_phin_ha_giang_mua_lua.webp'],
                ['https://hihitour.com/wp-content/uploads/2026/06/tu_san_coffee_ha_giang-scaled.jpg'],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/nho_que.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/nho_que1.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/nho_que_ha_giang-scaled.jpg',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/ha_giang_du_gia.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/ha_giang_du_gia2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/du_gia_ha_giang-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2026/06/du_gia_du_tien.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/du_gia_homestay.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/du_gia_panorama.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/pho_bang_ha_giang-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2026/06/xa_phin_ha_giang_mua_lua.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/somewhere-ha-giang.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/ha-giang-mua-xuan.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/meo-vac-market.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/ha-giang-food.webp',
                    'https://hihitour.com/wp-content/uploads/2025/12/PA120443-1-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2025/12/PA120435-1-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2025/12/PA120445-1-scaled.jpg',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/ha-giang-mua-xuan.webp',
                    'https://hihitour.com/wp-content/uploads/2025/11/DSCF3030-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2025/11/DSCF3779-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2025/12/DSCF3440-scaled.jpg',
                    'https://hihitour.com/wp-content/uploads/2025/11/DSCF2992-scaled.jpg',
                ],
            ],
            'transport' => [
                $theme_uri . '/assets/images/ha-giang/transport-vip.webp',
                $theme_uri . '/assets/images/ha-giang/transport-normal.webp',
                $theme_uri . '/assets/images/ha-giang/transport-economy.webp',
            ],
            'weather' => [
                $theme_uri . '/assets/images/ha-giang/weather-1.png',
                $theme_uri . '/assets/images/ha-giang/weather-2.png',
                'https://hihitour.com/wp-content/uploads/2026/06/ha_giang_du_gia.webp',
                $theme_uri . '/assets/images/ha-giang/weather-3.png',
                $theme_uri . '/assets/images/ha-giang/weather-4.png',
            ],
            'culture' => [
                'https://hihitour.com/wp-content/uploads/2026/06/cuoc-song-du-gia.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/ha-giang-food.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/meo-vac-market.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/tre_em_ha_giang-scaled.jpg',
                'https://hihitour.com/wp-content/uploads/2026/06/ganh-co-pho-cao.webp',
            ],
        ],
        'mu_cang_chai' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai.webp',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2026/06/gat-lua-mcc.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hang-gang-mu-cang-chai.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-pha.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/lao-chai-mu-cang-chai.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mo-de-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mo_de_to_day.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai_landscape.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai_ngoi_nha_nho.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai_thi_tran.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai_tu_le2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/nui-ho-tu-le.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/tu-le-ben-duong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/tu-le-mua-dong.webp',
            ],
            'highlights' => [
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/tu-le-mua-dong.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/tu-le-ben-duong.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai_tu_le2.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-pha.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-1.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-3.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-3.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-1.webp',
                ],
                ['https://hihitour.com/wp-content/uploads/2026/06/mo_de_to_day.webp'],
            ],
            'transport' => [
                $theme_uri . '/assets/images/ha-giang/transport-vip.webp',
                $theme_uri . '/assets/images/ha-giang/transport-economy.webp',
            ],
            'weather' => [
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mo_de_to_day.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai.webp',
            ],
            'culture' => [
                'https://hihitour.com/wp-content/uploads/2026/06/gat-lua-mcc.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mo_de_to_day.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/tu-le-ben-duong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-mang-thuong-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/mu_cang_chai_ngoi_nha_nho.webp',
            ],
        ],
        'hue' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2026/06/kinh-thanh-hue.webp',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2026/06/a-luoi-building.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/a-luoi-street.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/a-luoi-ven-duong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/a-luoi-welcome.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/a_luoi.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/a_luoi2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bun-bo-hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cau_truong_tien_hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cot-moc-666-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cot-moc-666-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cot-moc-666-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cot-moc-666-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue-ca-hat.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue-ky-dai.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai_noi_hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/doi-thong-a-luoi-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/doi-thong-a-luoi-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/doi-thong-lang-gia-long.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hue_house.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/imperial-palace.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/kim-noi-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/kinh-thanh-hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/lang-gia-long.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/song-huong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/song_huong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-a-luoi.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/tau-hu-song-huong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/thac-anor.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/thac-anor-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/thac-anor3.webp',
            ],
            'highlights' => [
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/dai_noi_hue.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/dai-noi-hue-3.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/kinh-thanh-hue.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/lang-gia-long.webp',
                ],
                ['https://hihitour.com/wp-content/uploads/2026/06/imperial-palace.webp'],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/lang-gia-long.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/doi-thong-lang-gia-long.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/a_luoi.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/a_luoi2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/a-luoi-building.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/thac-anor.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/thac-anor-2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/thac-anor3.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/suoi-a-luoi.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/doi-thong-a-luoi-1.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/doi-thong-a-luoi-2.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/cau_truong_tien_hue.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/song_huong.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/song-huong.webp',
                ],
                ['https://hihitour.com/wp-content/uploads/2026/06/bun-bo-hue.webp'],
                ['https://hihitour.com/wp-content/uploads/2026/06/tau-hu-song-huong.webp'],
                ['https://hihitour.com/wp-content/uploads/2026/06/hue_house.webp'],
            ],
            'transport' => [
                $theme_uri . '/assets/images/ha-giang/transport-normal.webp',
                $theme_uri . '/assets/images/san_bay_hue.jpg',
                $theme_uri . '/assets/images/train_bed.jpg',
                $theme_uri . '/assets/images/xe_may_hue.jpg',
                $theme_uri . '/assets/images/xe_dap_hue2.jpg',
            ],
            'weather' => [
                'https://hihitour.com/wp-content/uploads/2026/06/imperial-palace.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/song_huong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/cau_truong_tien_hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hue_house.webp',
            ],
            'culture' => [
                'https://hihitour.com/wp-content/uploads/2026/06/a_luoi2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/dai_noi_hue.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/song_huong.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hue_house.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/a-luoi-building.webp',
            ],
        ],
        'cao_bang' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2026/06/somewhere-cao-bang.webp',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2026/06/bao-lac-cao-bang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-stop.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/somewhere-cao-bang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/xuan-truong-cao-bang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/xuan-truong-cao-bang2.webp',
            ],
            'banners' => [
                'https://hihitour.com/wp-content/uploads/2026/06/somewhere-cao-bang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/xuan-truong-cao-bang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bao-lac-cao-bang.webp',
            ],
            'highlights' => [
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-1.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-stop.webp',
                ],
                ['https://hihitour.com/wp-content/uploads/2026/06/somewhere-cao-bang.webp'],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin-1.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin-2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin2.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin3.webp',
                ],
                [
                    'https://hihitour.com/wp-content/uploads/2026/06/xuan-truong-cao-bang.webp',
                    'https://hihitour.com/wp-content/uploads/2026/06/xuan-truong-cao-bang2.webp',
                ],
                ['https://hihitour.com/wp-content/uploads/2026/06/bao-lac-cao-bang.webp'],
            ],
            'transport' => [
                $theme_uri . '/assets/images/ha-giang/transport-vip.webp',
                $theme_uri . '/assets/images/ha-giang/transport-normal.webp',
                $theme_uri . '/assets/images/ha-giang/transport-economy.webp',
            ],
            'weather' => [
                'https://hihitour.com/wp-content/uploads/2026/06/xuan-truong-cao-bang.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/suoi-le-nin-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/khau-coc-cha-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/somewhere-cao-bang.webp',
            ],
        ],
        'taiwan' => [
            'hero' => 'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-1.webp',
            'gallery' => [
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-train-station-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-train-station-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-5.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-cape.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/train-taiwan.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/taroko.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/taiwan-train-station.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/taiwan-main-station.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-5.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-5-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-2.webp',
            ],
            'highlight' => [
                'https://hihitour.com/wp-content/uploads/2026/06/taiwan-main-station.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-cape.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/taiwan-train-station.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/taroko.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-1.webp',
            ],
            'bitoujiao' => [
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-cape.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-3.webp',
            ],
            'hualien' => [
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-5.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-train-station-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-train-station-2.webp',
            ],
            'jiufen' => [
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-4.webp',
            ],
            'keelung_trail' => [
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/keelung-trail-4.webp',
            ],
            'liushishi' => [
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-5-1.webp',
            ],
            'qixingtan' => [
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-5.webp',
            ],
            'transport' => [
                'https://hihitour.com/wp-content/uploads/2026/06/taiwan-main-station.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/taiwan-train-station.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/train-taiwan.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-train-station-1.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-train-station-2.webp',
            ],
            'weather' => [
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-3.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-3.webp',
            ],
            'culture' => [
                'https://hihitour.com/wp-content/uploads/2026/06/jiufen-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/hualien-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/bitoujiao-sea-2.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/qixingtan-4.webp',
                'https://hihitour.com/wp-content/uploads/2026/06/liushishi-jinchan-flower-4.webp',
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
