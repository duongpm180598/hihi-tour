<?php
/**
 * Destination Card Component
 *
 * Required variables (passed from the including file):
 *   $d            — destination array with keys:
 *                     slug, en, vi, img, geo, topo[], types[], kw_en, kw_vi
 *   $current_lang — 'en' | 'vi'
 *   $svg_topo_sea, $svg_topo_mountain, $svg_topo_city — inline SVG strings
 *
 * Usage:
 *   foreach ($destinations as $d) {
 *       include get_template_directory() . '/components/card.php';
 *   }
 */

$label      = $current_lang === 'en' ? $d['en'] : $d['vi'];
$has_page   = !empty($d['slug']);
$url        = $has_page ? esc_url(get_translated_permalink_by_slug($d['slug'])) : null;
$kw         = $current_lang === 'en' ? $d['kw_en'] : $d['kw_vi'];
$search_str = esc_attr(strtolower($d['en'] . ' ' . $d['vi'] . ' ' . $kw));
$geo_cls    = 'dg-' . $d['geo'];
$topo_cls   = implode(' ', array_map(fn($topo_item) => 'dt-' . $topo_item, $d['topo']));
$type_cls   = implode(' ', array_map(fn($type_item) => 'dtr-' . $type_item, $d['types']));
$tag        = $has_page ? 'a' : 'div';
$href_attr  = $has_page ? 'href="' . $url . '"' : '';
?>
<<?php echo $tag; ?>
    <?php echo $href_attr; ?>
    class="dest-card group overflow-hidden transition-all duration-200 <?php echo $geo_cls . ' ' . $topo_cls . ' ' . $type_cls; ?> <?php echo $has_page ? 'cursor-pointer' : 'cursor-default'; ?>"
    style="background:#000; border-radius:4px; position:relative;"
    data-search="<?php echo $search_str; ?>"
>
    <!-- Image — padding-bottom trick guarantees 4:5 height regardless of context -->
    <div style="position:relative; width:100%; padding-bottom:75%; background:#2a2a2a; overflow:hidden;">
        <?php if (!empty($d['img'])): ?>
            <img
                src="<?php echo esc_url($d['img']); ?>"
                alt="<?php echo esc_attr($label); ?>"
                loading="lazy"
                style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition:transform .5s;"
                class="<?php echo $has_page ? 'group-hover:scale-105' : ''; ?>"
            />
        <?php endif; ?>
    </div>

    <div style="position:absolute; bottom:0; left:0; right:0; padding:24px 10px 8px; background:linear-gradient(to top, rgba(0,0,0,0.65) 0%, transparent 100%); display:flex; align-items:flex-end; justify-content:space-between; gap:6px;">
        <span style="font-size:clamp(13px, 1.5vw, 20px); font-weight:700; letter-spacing:.05em; text-transform:uppercase; color:#fff; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
            <?php echo esc_html($label); ?>
        </span>
        <div style="display:flex; align-items:center; gap:3px; flex-shrink:0;">
            <?php foreach ($d['topo'] as $topo_item) {
                if ($topo_item === 'sea')      echo $svg_topo_sea;
                if ($topo_item === 'mountain') echo $svg_topo_mountain;
                if ($topo_item === 'city')     echo $svg_topo_city;
            } ?>
        </div>
    </div>
</<?php echo $tag; ?>>
