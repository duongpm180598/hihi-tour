<?php get_header() ?>
<?php
$current_lang = pll_current_language('slug');
$theme_uri    = get_template_directory_uri();

$HaGiangLoop = $theme_uri . '/assets/images/ha-giang/ha_giang_loop.jpg';
$CaoBangTrip = $theme_uri . '/assets/images/cao-bang/cao_bang.jpg';
$CatBaIsland = $theme_uri . '/assets/images/cat-ba/cat_ba_island.jpg';
$HueImperialPalace = $theme_uri . '/assets/images/hue/imperial-palace.webp';
$MuCangChaiHarvest = $theme_uri . '/assets/images/mu-cang-chai/mu_cang_chai3.webp';
$NinhThuanBaiDaTrung = $theme_uri . '/assets/images/ninh-thuan/bai-da-trung.webp';
$NhaTrangSunrise = $theme_uri . '/assets/images/nha-trang/sunrise-nha-trang.webp';
$TaiwanTaipei101 = $theme_uri . '/assets/images/taiwan/taipei-101.webp';

$qrs = [
    'whatsapp_qr'  => $theme_uri . '/assets/images/whatsapp_qr.jpg',
    'instagram_qr' => $theme_uri . '/assets/images/instagram_qr.png',
    'facebook_qr'  => $theme_uri . '/assets/images/facebook_qr.png',
];
$social = [
    'whatsapp'  => $theme_uri . '/assets/images/whatsapp.png',
    'instagram' => $theme_uri . '/assets/images/instagram.png',
    'facebook'  => $theme_uri . '/assets/images/facebook.png',
];

// ── Topo icon SVGs (filled, matching the provided images) ─────────────────────
// Sea  = blue island/palm  #2563EB
// Mountain = green peaks   #16A34A
// City = purple buildings  #7B63F7
$svg_topo_sea = '<svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Sea"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.7831 8.20833C16.7447 8.21844 16.7063 8.22905 16.668 8.24014C15.6076 8.54731 14.6882 9.21209 14.0679 10.1201C13.5768 10.8389 12.5924 11.026 11.869 10.5382C11.1456 10.0503 10.9572 9.07217 11.4483 8.35343C12.4821 6.84008 14.0145 5.73209 15.7818 5.22015C16.2183 5.09369 16.6624 5.00557 17.1092 4.95544C16.3162 4.5214 15.3923 4.37671 14.4992 4.55145C13.6414 4.71926 12.8091 4.1644 12.6401 3.31208C12.4712 2.45977 13.0297 1.6328 13.8875 1.46497C15.6535 1.11947 17.4855 1.46026 19.0061 2.41711C19.9644 3.02013 20.7529 3.83887 21.3153 4.79596C22.3786 4.40102 23.5272 4.2496 24.6737 4.36478C26.48 4.5462 28.1574 5.3766 29.3909 6.70003C29.9851 7.33736 29.9467 8.3325 29.3052 8.92277C28.6638 9.51301 27.662 9.47482 27.0681 8.8375C26.3587 8.07644 25.3941 7.59889 24.3554 7.49456L24.344 7.49343C24.6306 7.80215 24.8905 8.1382 25.1191 8.49851C26.0822 10.0177 26.4136 11.8495 26.0429 13.6069C25.8637 14.4571 25.0245 15.0019 24.1688 14.8237C23.3131 14.6456 22.7648 13.8119 22.9442 12.9617C23.1464 12.0031 22.9657 11.004 22.4402 10.1753C22.0204 9.51322 21.4068 9.00137 20.6887 8.70366C19.7876 9.31559 19.0292 10.3175 18.4532 11.7036C17.8795 13.084 17.524 14.7637 17.3899 16.5947C18.5451 16.8851 19.6657 17.363 20.724 18.0161C22.359 19.0251 23.806 20.4275 24.996 22.1276C24.3159 22.3088 23.5753 22.6982 23.0803 23.4763C22.8971 23.764 22.7095 23.9993 22.5261 24.1862C21.7321 24.994 20.3321 24.994 19.5381 24.1862C19.3819 24.027 19.2222 23.8326 19.0646 23.5996C18.2475 22.3912 16.8365 22.1289 16.0001 22.1289C15.1636 22.1289 13.7526 22.3912 12.9355 23.5996C12.7779 23.8326 12.6183 24.027 12.462 24.1862C11.668 24.994 10.2681 24.994 9.47408 24.1862C9.29064 23.9993 9.10291 23.764 8.91974 23.4763C8.13659 22.2452 6.7385 21.9872 5.93827 21.987C5.50448 21.9869 4.90234 22.062 4.3159 22.3205C5.53063 20.5335 7.02459 19.063 8.72109 18.0161C10.4361 16.9576 12.315 16.3594 14.2392 16.2734C14.3972 14.2217 14.8074 12.2342 15.5269 10.503C15.8657 9.6875 16.2813 8.91119 16.7831 8.20833ZM7.39096 25.4021C7.14028 24.821 6.56376 24.4456 5.92744 24.4489C5.29115 24.4523 4.71873 24.834 4.47435 25.4178C4.29482 25.8467 4.02138 26.2303 3.67391 26.5411C3.32644 26.8517 2.91367 27.0817 2.46559 27.214C1.62757 27.4617 1.15022 28.3373 1.3994 29.1699C1.64858 30.0026 2.52993 30.4768 3.36795 30.2293C4.26683 29.9638 5.09486 29.5025 5.7919 28.8792C5.84017 28.836 5.88772 28.7922 5.93456 28.7477C6.2996 29.1019 6.70684 29.4148 7.14944 29.6786C9.35907 30.9961 12.5769 30.9961 14.7865 29.6786C15.2286 29.4152 15.6353 29.1027 16 28.749C16.3647 29.1027 16.7715 29.4152 17.2135 29.6786C19.4231 30.9961 22.6409 30.9961 24.8506 29.6786C25.2932 29.4148 25.7004 29.1019 26.0655 28.7477C26.1124 28.7922 26.1599 28.836 26.2082 28.8792C26.9051 29.5025 27.7332 29.9638 28.6321 30.2293C29.4701 30.4768 30.3515 30.0026 30.6006 29.1699C30.8498 28.3373 30.3724 27.4617 29.5344 27.214C29.0863 27.0817 28.6735 26.8517 28.3261 26.5411C27.9786 26.2303 27.7051 25.8467 27.5257 25.4178C27.2813 24.834 26.7088 24.4523 26.0725 24.4489C25.4363 24.4456 24.8597 24.821 24.6091 25.4021C24.325 26.0604 23.8396 26.6128 23.2215 26.9813C22.0146 27.7008 20.0494 27.7008 18.8424 26.9813C18.2244 26.6128 17.7389 26.0604 17.455 25.4021C17.2055 24.8239 16.6332 24.4489 16 24.4489C15.3668 24.4489 14.7945 24.8239 14.545 25.4021C14.2611 26.0604 13.7756 26.6128 13.1576 26.9813C11.9506 27.7008 9.98535 27.7008 8.77837 26.9813C8.16036 26.6128 7.67492 26.0604 7.39096 25.4021Z" fill="#0066FF"/></svg>';

$svg_topo_mountain = '<svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Mountain"><path d="M25.9957 12C28.5612 12 30.1646 9.22226 28.8819 7.00004C28.2865 5.96871 27.1863 5.33337 25.9957 5.33337C23.4301 5.33337 21.8267 8.11115 23.1094 10.3334C23.7048 11.3647 24.805 12 25.9957 12ZM4.9954 26.6667H26.783C28.1911 26.6667 29.3284 25.525 29.3284 24.1209C29.3284 23.6542 29.1992 23.1959 28.9576 22.7959L23.4586 13.7834C23.2878 13.5042 22.9879 13.3334 22.6629 13.3334C22.338 13.3334 22.0381 13.5042 21.8673 13.7792L19.8593 17.0709L14.6144 8.70837C14.3395 8.26671 13.8521 8.00004 13.3314 8.00004C12.8106 8.00004 12.3274 8.26671 12.0483 8.70837L3.02494 23.1C2.79165 23.4709 2.66667 23.9 2.66667 24.3375C2.66667 25.625 3.70814 26.6667 4.9954 26.6667Z" fill="#5B9F05"/></svg>';

$svg_topo_city = '<svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="City"><path d="M30 26H29V11C29 10.7348 28.8946 10.4804 28.7071 10.2929C28.5196 10.1054 28.2652 10 28 10H20C19.7348 10 19.4804 10.1054 19.2929 10.2929C19.1054 10.4804 19 10.7348 19 11V16H13V5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4H4C3.73478 4 3.48043 4.10536 3.29289 4.29289C3.10536 4.48043 3 4.73478 3 5V26H2C1.73478 26 1.48043 26.1054 1.29289 26.2929C1.10536 26.4804 1 26.7348 1 27C1 27.2652 1.10536 27.5196 1.29289 27.7071C1.48043 27.8946 1.73478 28 2 28H30C30.2652 28 30.5196 27.8946 30.7071 27.7071C30.8946 27.5196 31 27.2652 31 27C31 26.7348 30.8946 26.4804 30.7071 26.2929C30.5196 26.1054 30.2652 26 30 26ZM9 23C9 23.2652 8.89464 23.5196 8.70711 23.7071C8.51957 23.8946 8.26522 24 8 24C7.73478 24 7.48043 23.8946 7.29289 23.7071C7.10536 23.5196 7 23.2652 7 23V21C7 20.7348 7.10536 20.4804 7.29289 20.2929C7.48043 20.1054 7.73478 20 8 20C8.26522 20 8.51957 20.1054 8.70711 20.2929C8.89464 20.4804 9 20.7348 9 21V23ZM9 17C9 17.2652 8.89464 17.5196 8.70711 17.7071C8.51957 17.8946 8.26522 18 8 18C7.73478 18 7.48043 17.8946 7.29289 17.7071C7.10536 17.5196 7 17.2652 7 17V15C7 14.7348 7.10536 14.4804 7.29289 14.2929C7.48043 14.1054 7.73478 14 8 14C8.26522 14 8.51957 14.1054 8.70711 14.2929C8.89464 14.4804 9 14.7348 9 15V17ZM9 11C9 11.2652 8.89464 11.5196 8.70711 11.7071C8.51957 11.8946 8.26522 12 8 12C7.73478 12 7.48043 11.8946 7.29289 11.7071C7.10536 11.5196 7 11.2652 7 11V9C7 8.73478 7.10536 8.48043 7.29289 8.29289C7.48043 8.10536 7.73478 8 8 8C8.26522 8 8.51957 8.10536 8.70711 8.29289C8.89464 8.48043 9 8.73478 9 9V11ZM17 23C17 23.2652 16.8946 23.5196 16.7071 23.7071C16.5196 23.8946 16.2652 24 16 24C15.7348 24 15.4804 23.8946 15.2929 23.7071C15.1054 23.5196 15 23.2652 15 23V21C15 20.7348 15.1054 20.4804 15.2929 20.2929C15.4804 20.1054 15.7348 20 16 20C16.2652 20 16.5196 20.1054 16.7071 20.2929C16.8946 20.4804 17 20.7348 17 21V23ZM25 23C25 23.2652 24.8946 23.5196 24.7071 23.7071C24.5196 23.8946 24.2652 24 24 24C23.7348 24 23.4804 23.8946 23.2929 23.7071C23.1054 23.5196 23 23.2652 23 23V21C23 20.7348 23.1054 20.4804 23.2929 20.2929C23.4804 20.1054 23.7348 20 24 20C24.2652 20 24.5196 20.1054 24.7071 20.2929C24.8946 20.4804 25 20.7348 25 21V23ZM25 17C25 17.2652 24.8946 17.5196 24.7071 17.7071C24.5196 17.8946 24.2652 18 24 18C23.7348 18 23.4804 17.8946 23.2929 17.7071C23.1054 17.5196 23 17.2652 23 17V15C23 14.7348 23.1054 14.4804 23.2929 14.2929C23.4804 14.1054 23.7348 14 24 14C24.2652 14 24.5196 14.1054 24.7071 14.2929C24.8946 14.4804 25 14.7348 25 15V17Z" fill="#7B63F7"/></svg>';

// ── Transport icon SVGs ───────────────────────────────────────────────────────
$svg_bike = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18.5" cy="17.5" r="3.5"/><circle cx="5.5" cy="17.5" r="3.5"/><circle cx="15" cy="5" r="1"/><path d="M12 17.5V14l-3-3 4-3 2 3h2"/></svg>';
$svg_car  = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17H5a2 2 0 0 1-2-2V9l2-4h14l2 4v6a2 2 0 0 1-2 2z"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/></svg>';
$svg_boat = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2.4 2.4 0 0 0 2 1 2.4 2.4 0 0 0 2-1 2.4 2.4 0 0 1 2-1 2.4 2.4 0 0 1 2 1 2.4 2.4 0 0 0 2 1 2.4 2.4 0 0 0 2-1 2.4 2.4 0 0 1 2-1 2.4 2.4 0 0 1 2 1"/><path d="M4 18l-1-5h18l-2 5"/><path d="M12 2v8"/><path d="M6.8 15L12 2l5.2 13"/></svg>';

// ── Destination data ──────────────────────────────────────────────────────────
// geo:  'vietnam' | 'sea' | 'europe'
// topo: array of 'sea' | 'mountain' | 'city'
// types: transport array
$destinations = [
    [
        'slug'  => 'ha-giang',
        'en'    => 'Hà Giang', 'vi' => 'Hà Giang',
        'img'   => $HaGiangLoop,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['bike', 'car'],
        'kw_en' => 'ha giang loop motorbike mountain north vietnam majestic landscape rice terraces',
        'kw_vi' => 'hà giang vòng lặp xe máy núi miền bắc việt nam hùng vĩ ruộng bậc thang',
    ],
    [
        'slug'  => 'cao-bang',
        'en'    => 'Cao Bằng', 'vi' => 'Cao Bằng',
        'img'   => $CaoBangTrip,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['bike', 'car'],
        'kw_en' => 'cao bang waterfall ban gioc northeast vietnam nature mountain',
        'kw_vi' => 'cao bằng thác bản giốc đông bắc việt nam thiên nhiên núi',
    ],
    [
        'slug'  => 'hue-trip',
        'en'    => 'Huế', 'vi' => 'Huế',
        'img'   => $HueImperialPalace,
        'geo'   => 'vietnam',
        'topo'  => ['city', 'sea'],
        'types' => ['car', 'boat'],
        'kw_en' => 'hue imperial city history central vietnam heritage',
        'kw_vi' => 'huế cố đô lịch sử miền trung việt nam di sản',
    ],
    [
        'slug'  => null,
        'en'    => 'Nha Trang', 'vi' => 'Nha Trang',
        'img'   => $NhaTrangSunrise,
        'geo'   => 'vietnam',
        'topo'  => ['sea', 'city'],
        'types' => ['car', 'boat'],
        'kw_en' => 'nha trang beach sea south central vietnam island diving',
        'kw_vi' => 'nha trang biển nam trung bộ việt nam đảo lặn biển',
    ],
    [
        'slug'  => null,
        'en'    => 'Sapa', 'vi' => 'Sapa',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['car'],
        'kw_en' => 'sapa rice terraces trekking northwest vietnam fansipan',
        'kw_vi' => 'sapa ruộng bậc thang trekking tây bắc việt nam fansipan',
    ],
    [
        'slug'  => 'ninh-thuan',
        'en'    => 'Ninh Thuận', 'vi' => 'Ninh Thuận',
        'img'   => $NinhThuanBaiDaTrung,
        'geo'   => 'vietnam',
        'topo'  => ['sea', 'mountain'],
        'types' => ['bike'],
        'kw_en' => 'ninh thuan desert sand dunes cham culture beach',
        'kw_vi' => 'ninh thuận sa mạc đồi cát văn hóa chăm biển',
    ],
    [
        'slug'  => null,
        'en'    => 'Phú Yên', 'vi' => 'Phú Yên',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['sea'],
        'types' => ['bike'],
        'kw_en' => 'phu yen yellow flower field ganh da dia beach coast',
        'kw_vi' => 'phú yên hoa dã quỳ gành đá đĩa biển bờ biển',
    ],
    [
        'slug'  => null,
        'en'    => 'Hòa Bình', 'vi' => 'Hòa Bình',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['car'],
        'kw_en' => 'hoa binh mai chau valley ethnic minority mountain',
        'kw_vi' => 'hòa bình mai châu thung lũng dân tộc thiểu số núi',
    ],
    [
        'slug'  => null,
        'en'    => 'Đà Lạt', 'vi' => 'Đà Lạt',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['mountain', 'city'],
        'types' => ['bike'],
        'kw_en' => 'da lat flower city highland cool weather mountain',
        'kw_vi' => 'đà lạt thành phố hoa cao nguyên khí hậu mát mẻ núi',
    ],
    [
        'slug'  => null,
        'en'    => 'Đà Nẵng', 'vi' => 'Đà Nẵng',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['sea', 'city'],
        'types' => ['car', 'boat'],
        'kw_en' => 'da nang beach marble mountains hoi an city sea',
        'kw_vi' => 'đà nẵng biển ngũ hành sơn hội an thành phố',
    ],
    [
        'slug'  => null,
        'en'    => 'Tà Xùa', 'vi' => 'Tà Xùa',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['bike'],
        'kw_en' => 'ta xua cloud hunting northwest vietnam mountain',
        'kw_vi' => 'tà xùa săn mây tây bắc việt nam núi',
    ],
    [
        'slug'  => 'mu-cang-chai',
        'en'    => 'Mù Cang Chải', 'vi' => 'Mù Cang Chải',
        'img'   => $MuCangChaiHarvest,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['bike'],
        'kw_en' => 'mu cang chai rice terraces harvest season mountain',
        'kw_vi' => 'mù cang chải ruộng bậc thang mùa vàng núi',
    ],
    [
        'slug'  => 'cat-ba-tour',
        'en'    => 'Cát Bà', 'vi' => 'Cát Bà',
        'img'   => $CatBaIsland,
        'geo'   => 'vietnam',
        'topo'  => ['sea', 'mountain'],
        'types' => ['bike', 'boat'],
        'kw_en' => 'cat ba island kayak national park halong bay sea',
        'kw_vi' => 'cát bà đảo kayak vườn quốc gia vịnh hạ long biển',
    ],
    [
        'slug'  => null,
        'en'    => 'Hải Phòng', 'vi' => 'Hải Phòng',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['sea', 'city'],
        'types' => ['car', 'boat'],
        'kw_en' => 'hai phong port city do son beach sea',
        'kw_vi' => 'hải phòng thành phố cảng bãi biển đồ sơn',
    ],
    [
        'slug'  => 'taiwan-trip',
        'en'    => 'Đài Loan', 'vi' => 'Đài Loan',
        'img'   => $TaiwanTaipei101,
        'geo'   => 'sea',
        'topo'  => ['mountain', 'city', 'sea'],
        'types' => ['bike', 'boat'],
        'kw_en' => 'taiwan island asia motorbike city mountain sea',
        'kw_vi' => 'đài loan đảo châu á xe máy thành phố núi biển',
    ],
    [
        'slug'  => null,
        'en'    => 'Thailand', 'vi' => 'Thái Lan',
        'img'   => null,
        'geo'   => 'sea',
        'topo'  => ['sea', 'city', 'mountain'],
        'types' => ['bike', 'car', 'boat'],
        'kw_en' => 'thailand bangkok chiang mai beach island sea mountain city',
        'kw_vi' => 'thái lan bangkok chiang mai biển đảo núi thành phố',
    ],
];
?>

<main>

<!-- ═══════════════════════════════════════════════════════════════════════════
     HERO BANNER
════════════════════════════════════════════════════════════════════════════ -->
<section
    class="relative flex flex-col items-center justify-center text-center overflow-hidden"
    style="min-height: 60vh; background-color: #F8F8F8;"
>
    <!-- Decorative blobs -->
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full opacity-20" style="background:#7B63F7; filter:blur(80px);"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full opacity-15" style="background:#E7F15A; filter:blur(80px);"></div>
    </div>

    <div class="relative z-10 px-4 py-20 w-full max-w-3xl mx-auto">

        <h1
            class="font-black tracking-tight mb-8 font-phudu"
            style="font-size: clamp(2.5rem, 8vw, 5.5rem); color: #1D292C; line-height: 1.05;"
        >
            <?php echo $current_lang === 'en' ? 'GOING SOMEWHERE ?' : 'BẠN MUỐN ĐI ĐÂU ?' ?>
        </h1>

        <!-- Search -->
        <div class="relative max-w-xl mx-auto mb-6">
            <input
                id="dest-search"
                type="text"
                autocomplete="off"
                spellcheck="false"
                placeholder="<?php echo $current_lang === 'en' ? 'Search destinations, activities...' : 'Tìm điểm đến, hoạt động...' ?>"
                oninput="destApplyFilters()"
                style="width:100%; padding:12px 48px 12px 20px; border:2px solid #1D292C; border-radius:1rem; background:#fff; color:#1D292C; font-size:0.875rem; outline:none; appearance:none; -webkit-appearance:none; box-sizing:border-box;"
            />
            <!-- clear button -->
            <button
                id="dest-clear"
                onclick="document.getElementById('dest-search').value=''; destApplyFilters(); this.style.display='none';"
                aria-label="Clear search"
                style="display:none; position:absolute; right:46px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#999; font-size:16px; line-height:1; padding:4px;"
            >&#x2715;</button>
            <!-- search icon button -->
            <button
                aria-label="Search"
                onclick="destApplyFilters()"
                style="position:absolute; right:6px; top:50%; transform:translateY(-50%); width:34px; height:34px; border-radius:0.75rem; background:#7B63F7; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center;"
            >
                <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </button>
        </div>

        <!-- Filter rows -->
        <!-- Row 1: Geography — toggle, no "All" chip -->
        <div class="flex flex-wrap justify-center gap-2 mb-2" role="group" aria-label="Filter by region">
            <?php
            $geo_filters = [
                ['vietnam', 'Vietnam'],
                ['sea',     $current_lang === 'en' ? 'SEA' : 'Đông Nam Á'],
                ['europe',  'Europe'],
            ];
            foreach ($geo_filters as [$val, $lbl]):
            ?>
            <button
                onclick="destFilterGeo('<?php echo $val; ?>')"
                data-geo="<?php echo $val; ?>"
                class="dest-geo-chip"
                style="font-size:11px; font-weight:700; padding:6px 16px; border:2px solid #d1d5db; border-radius:999px; background:#fff; color:#1D292C; cursor:pointer; transition:all .15s;"
            ><?php echo $lbl; ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Row 2: Topo — toggle, no "All" chip -->
        <div class="flex flex-wrap justify-center gap-2" role="group" aria-label="Filter by landscape">
            <?php
            $topo_filters = [
                ['sea',      $current_lang === 'en' ? 'Sea'      : 'Biển'],
                ['mountain', $current_lang === 'en' ? 'Mountain' : 'Núi'],
                ['city',     $current_lang === 'en' ? 'City'     : 'Thành phố'],
            ];
            foreach ($topo_filters as [$val, $lbl]):
            ?>
            <button
                onclick="destFilterTopo('<?php echo $val; ?>')"
                data-topo="<?php echo $val; ?>"
                class="dest-topo-chip"
                style="font-size:11px; font-weight:700; padding:6px 16px; border:2px solid #d1d5db; border-radius:999px; background:#fff; color:#1D292C; cursor:pointer; transition:all .15s;"
            ><?php echo $lbl; ?></button>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════════════
     DESTINATION CARDS
════════════════════════════════════════════════════════════════════════════ -->
<section style="background:#F8F8F8;" class="px-4 py-10">
    <div class="container mx-auto">

        <p id="dest-no-results" class="hidden text-center py-16 text-sm" style="color:#1D292C; opacity:.5;">
            <?php echo $current_lang === 'en' ? 'No destinations found.' : 'Không tìm thấy điểm đến.' ?>
        </p>

        <div id="dest-grid" class="grid grid-cols-3 gap-3 md:gap-4">
            <?php
            $card_template = get_template_directory() . '/components/card.php';
            foreach ($destinations as $d) {
                include $card_template;
            }
            ?>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════════════
     CONTACT / QR
════════════════════════════════════════════════════════════════════════════ -->
<section style="background:#E7F15A;" class="py-12 px-4">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-2" style="color:#1D292C;">
            <?php echo $current_lang === 'en' ? "Can't find what you're looking for?" : "Không tìm thấy điểm đến bạn muốn?" ?>
        </h2>
        <p class="text-sm mb-8" style="color:#1D292C; opacity:.7;">
            <?php echo $current_lang === 'en'
                ? "We customize tours anywhere. Reach out and we'll plan it together."
                : "Chúng tôi tổ chức tour theo yêu cầu đến bất cứ đâu. Liên hệ để lên kế hoạch cùng nhau."; ?>
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img width="36" height="36" src="<?php echo esc_url($social['instagram']); ?>" alt="Instagram" />
                    <div>
                        <p class="text-xs font-bold" style="color:#1D292C;">Instagram</p>
                        <a href="https://www.instagram.com/mr_hi_hi_04" target="_blank" class="text-xs hover:underline" style="color:#1D292C;">@mr_hi_hi_04</a>
                    </div>
                </div>
                <img width="160" height="160" src="<?php echo esc_url($qrs['instagram_qr']); ?>" alt="Instagram QR" class="rounded-xl" />
            </div>
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img width="36" height="36" src="<?php echo esc_url($social['facebook']); ?>" alt="Facebook" />
                    <div>
                        <p class="text-xs font-bold" style="color:#1D292C;">Facebook</p>
                        <a href="https://www.facebook.com/ps.r.sau" target="_blank" class="text-xs hover:underline" style="color:#1D292C;">ps.r.sau</a>
                    </div>
                </div>
                <img width="160" height="160" src="<?php echo esc_url($qrs['facebook_qr']); ?>" alt="Facebook QR" class="rounded-xl" />
            </div>
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img width="36" height="36" src="<?php echo esc_url($social['whatsapp']); ?>" alt="WhatsApp" />
                    <div>
                        <p class="text-xs font-bold" style="color:#1D292C;">WhatsApp</p>
                        <a href="https://wa.me/84936766696" target="_blank" class="text-xs hover:underline" style="color:#1D292C;">+84 936 766 696</a>
                    </div>
                </div>
                <img width="160" height="160" src="<?php echo esc_url($qrs['whatsapp_qr']); ?>" alt="WhatsApp QR" class="rounded-xl" />
            </div>
        </div>
    </div>
</section>

</main>

<script>
(function () {
    var activeGeo  = null;  // null = no filter (show all)
    var activeTopo = null;

    /* ── chip toggle helpers ── */
    function setChip(selector, attr, value) {
        document.querySelectorAll(selector).forEach(function (btn) {
            var on = btn.dataset[attr] === value;
            btn.style.background  = on ? '#1D292C' : '#fff';
            btn.style.color       = on ? '#fff'    : '#1D292C';
            btn.style.borderColor = on ? '#1D292C' : '#d1d5db';
        });
    }

    window.destFilterGeo = function (val) {
        // toggle: clicking active chip clears it
        activeGeo = (activeGeo === val) ? null : val;
        setChip('.dest-geo-chip', 'geo', activeGeo);
        destApplyFilters();
    };

    window.destFilterTopo = function (val) {
        activeTopo = (activeTopo === val) ? null : val;
        setChip('.dest-topo-chip', 'topo', activeTopo);
        destApplyFilters();
    };

    /* strip diacritics: "Hà Giang" → "ha giang" */
    function normalize(str) {
        return str
            .normalize('NFD')                        // decompose: à → a + ̀
            .replace(/[\u0300-\u036f]/g, '')         // strip combining marks
            .replace(/đ/g, 'd').replace(/Đ/g, 'd')  // Vietnamese Đ not covered by NFD
            .toLowerCase()
            .trim();
    }

    window.destApplyFilters = function () {
        var raw     = document.getElementById('dest-search').value || '';
        var query   = normalize(raw);
        var cards   = document.querySelectorAll('.dest-card');
        var visible = 0;

        /* show/hide clear button */
        var clearBtn = document.getElementById('dest-clear');
        if (clearBtn) clearBtn.style.display = raw.trim() ? 'block' : 'none';

        cards.forEach(function (card) {
            var sd     = normalize(card.dataset.search || '');
            var textOk = !query || sd.indexOf(query) !== -1;
            var geoOk  = !activeGeo  || card.classList.contains('dg-' + activeGeo);
            var topoOk = !activeTopo || card.classList.contains('dt-' + activeTopo);
            var show   = textOk && geoOk && topoOk;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        var nr = document.getElementById('dest-no-results');
        if (nr) nr.classList.toggle('hidden', visible > 0);
    };

    /* Escape clears search */
    var inp = document.getElementById('dest-search');
    if (inp) {
        inp.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { inp.value = ''; destApplyFilters(); }
        });
    }
})();
</script>

<?php get_footer() ?>
