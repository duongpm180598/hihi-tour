<?php get_header() ?>
<?php
$current_lang = pll_current_language('slug');
$theme_uri    = get_template_directory_uri();

$HaGiangLoop = $theme_uri . '/assets/images/ha_giang_loop.jpg';
$CaoBangTrip = $theme_uri . '/assets/images/cao_bang.jpg';
$CatBaIsland = $theme_uri . '/assets/images/cat_ba_island.jpg';

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
$svg_topo_sea = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="#2563EB" aria-label="Sea"><path d="M12 2C9.5 2 7.5 4 7.5 6.5c0 1.5.7 2.8 1.8 3.7L12 12l2.7-1.8c1.1-.9 1.8-2.2 1.8-3.7C16.5 4 14.5 2 12 2z"/><path d="M2 17c1 0 1.5.5 2.5.5S6 17 7 17s1.5.5 2.5.5S11 17 12 17s1.5.5 2.5.5S16 17 17 17s1.5.5 2.5.5S21 17 22 17v2c-1 0-1.5.5-2.5.5S18 19 17 19s-1.5.5-2.5.5S13 19 12 19s-1.5.5-2.5.5S8 19 7 19s-1.5.5-2.5.5S3 19 2 19v-2z"/><path d="M2 21c1 0 1.5.5 2.5.5S6 21 7 21s1.5.5 2.5.5S11 21 12 21s1.5.5 2.5.5S16 21 17 21s1.5.5 2.5.5S21 21 22 21v1H2v-1z"/></svg>';

$svg_topo_mountain = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="#16A34A" aria-label="Mountain"><path d="M1 21L9 5l4 8 2-3 8 11H1z"/><circle cx="18" cy="5" r="2"/></svg>';

$svg_topo_city = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="#7B63F7" aria-label="City"><path d="M3 21V7l6-4v18H3zm6 0V3l6 4v14H9zm6 0V9l6 2v10h-6z"/></svg>';

// ── Transport icon SVGs ───────────────────────────────────────────────────────
$svg_bike = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18.5" cy="17.5" r="3.5"/><circle cx="5.5" cy="17.5" r="3.5"/><circle cx="15" cy="5" r="1"/><path d="M12 17.5V14l-3-3 4-3 2 3h2"/></svg>';
$svg_car  = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17H5a2 2 0 0 1-2-2V9l2-4h14l2 4v6a2 2 0 0 1-2 2z"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/></svg>';
$svg_boat = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2.4 2.4 0 0 0 2 1 2.4 2.4 0 0 0 2-1 2.4 2.4 0 0 1 2-1 2.4 2.4 0 0 1 2 1 2.4 2.4 0 0 0 2 1 2.4 2.4 0 0 0 2-1 2.4 2.4 0 0 1 2-1 2.4 2.4 0 0 1 2 1"/><path d="M4 18l-1-5h18l-2 5"/><path d="M12 2v8"/><path d="M6.8 15L12 2l5.2 13"/></svg>';

// ── Destination data ──────────────────────────────────────────────────────────
// geo:  'vietnam' | 'sea' | 'europe'
// topo: array of 'sea' | 'mountain' | 'city'
// types: transport array
$destinations = [
    [
        'slug'  => 'ha-giang-tour',
        'en'    => 'Hà Giang', 'vi' => 'Hà Giang',
        'img'   => $HaGiangLoop,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['bike', 'car'],
        'kw_en' => 'ha giang loop motorbike mountain north vietnam majestic landscape rice terraces',
        'kw_vi' => 'hà giang vòng lặp xe máy núi miền bắc việt nam hùng vĩ ruộng bậc thang',
    ],
    [
        'slug'  => 'cao-bang-tour',
        'en'    => 'Cao Bằng', 'vi' => 'Cao Bằng',
        'img'   => $CaoBangTrip,
        'geo'   => 'vietnam',
        'topo'  => ['mountain'],
        'types' => ['bike', 'car'],
        'kw_en' => 'cao bang waterfall ban gioc northeast vietnam nature mountain',
        'kw_vi' => 'cao bằng thác bản giốc đông bắc việt nam thiên nhiên núi',
    ],
    [
        'slug'  => null,
        'en'    => 'Huế', 'vi' => 'Huế',
        'img'   => null,
        'geo'   => 'vietnam',
        'topo'  => ['city', 'sea'],
        'types' => ['car', 'boat'],
        'kw_en' => 'hue imperial city history central vietnam heritage',
        'kw_vi' => 'huế cố đô lịch sử miền trung việt nam di sản',
    ],
    [
        'slug'  => null,
        'en'    => 'Nha Trang', 'vi' => 'Nha Trang',
        'img'   => null,
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
        'slug'  => null,
        'en'    => 'Ninh Thuận', 'vi' => 'Ninh Thuận',
        'img'   => null,
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
        'slug'  => null,
        'en'    => 'Mù Cang Chải', 'vi' => 'Mù Cang Chải',
        'img'   => null,
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
        'slug'  => null,
        'en'    => 'Đài Loan', 'vi' => 'Đài Loan',
        'img'   => null,
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
            <?php foreach ($destinations as $d):
                $label      = $current_lang === 'en' ? $d['en'] : $d['vi'];
                $has_page   = !empty($d['slug']);
                $url        = $has_page ? esc_url(get_translated_permalink_by_slug($d['slug'])) : null;
                $kw         = $current_lang === 'en' ? $d['kw_en'] : $d['kw_vi'];
                $search_str = esc_attr(strtolower($d['en'] . ' ' . $d['vi'] . ' ' . $kw));
                $geo_cls    = 'dg-' . $d['geo'];
                $topo_cls   = implode(' ', array_map(fn($t) => 'dt-' . $t, $d['topo']));
                $type_cls   = implode(' ', array_map(fn($t) => 'dtr-' . $t, $d['types']));
                $tag        = $has_page ? 'a' : 'div';
                $href_attr  = $has_page ? 'href="' . $url . '"' : '';
            ?>
            <<?php echo $tag; ?>
                <?php echo $href_attr; ?>
                class="dest-card group overflow-hidden transition-all duration-200 <?php echo $geo_cls . ' ' . $topo_cls . ' ' . $type_cls; ?> <?php echo $has_page ? 'cursor-pointer' : 'cursor-default'; ?>"
                style="background:#000; border-radius:4px; position:relative;"
                data-search="<?php echo $search_str; ?>"
            >
                <!-- Image — fills card, slight zoom on hover -->
                <div class="aspect-[4/5] overflow-hidden" style="background:#1a1a1a;">
                    <?php if ($d['img']): ?>
                        <img
                            src="<?php echo esc_url($d['img']); ?>"
                            alt="<?php echo esc_attr($label); ?>"
                            loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-500 <?php echo $has_page ? 'group-hover:scale-105' : ''; ?>"
                        />
                    <?php else: ?>
                        <div class="w-full h-full" style="background:#2a2a2a;"></div>
                    <?php endif; ?>
                </div>

                <!-- Overlay: name + icons sit on top of the image, bottom of card -->
                <div style="position:absolute; bottom:0; left:0; right:0; padding:24px 10px 8px; background:linear-gradient(to top, rgba(0,0,0,0.65) 0%, transparent 100%); display:flex; align-items:flex-end; justify-content:space-between; gap:6px;">
                    <span style="font-size:clamp(13px, 1.5vw, 20px); font-weight:700; letter-spacing:.05em; text-transform:uppercase; color:#fff; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                        <?php echo esc_html($label); ?>
                    </span>
                    <div style="display:flex; align-items:center; gap:3px; flex-shrink:0;">
                        <?php foreach ($d['topo'] as $t):
                            if ($t === 'sea')      echo $svg_topo_sea;
                            if ($t === 'mountain') echo $svg_topo_mountain;
                            if ($t === 'city')     echo $svg_topo_city;
                        endforeach; ?>
                    </div>
                </div>
            </<?php echo $tag; ?>>
            <?php endforeach; ?>
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

    window.destApplyFilters = function () {
        var query   = (document.getElementById('dest-search').value || '').toLowerCase().trim();
        var cards   = document.querySelectorAll('.dest-card');
        var visible = 0;

        /* show/hide clear button */
        var clearBtn = document.getElementById('dest-clear');
        if (clearBtn) clearBtn.style.display = query ? 'block' : 'none';

        cards.forEach(function (card) {
            var sd     = (card.dataset.search || '').toLowerCase();
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
