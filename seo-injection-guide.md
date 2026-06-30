# SEO Injection Guide — `ha-giang-tour.php`

Specific changes to make in this file and across all pages using the same structure.
Every fix references exact line numbers or code blocks from the file.
Updated with rules from Google Search Central:
- [Valid Page Metadata](https://developers.google.com/search/docs/crawling-indexing/valid-page-metadata)
- [Meta Tags Google Supports](https://developers.google.com/search/docs/crawling-indexing/special-tags)
- [Robots Meta Tag](https://developers.google.com/search/docs/crawling-indexing/robots-meta-tag)

---

## Summary of Issues Found

| # | Issue | Severity | Source | Location |
|---|---|---|---|---|
| 1 | No H1 anywhere on page | Critical | Heading rules | Entire file |
| 2 | `<p>` used for section labels instead of semantic headings | High | Heading rules | L401, L1075 |
| 3 | `<h3>` used for all section headings — skips H2 level entirely | High | Heading rules | L766, L980, L1078, L1157 |
| 4 | `<h2>` used for price display — not a section heading | High | Heading rules | L546 |
| 5 | `<h3>` sub-headings same level as parent section heading | High | Heading rules | L1166, L1173 |
| 6 | `<p>` styled as heading — invisible to SEO | Medium | Heading rules | L1221, L684 |
| 7 | Hero image alt is generic: `"Ha Giang"` | High | Google docs | L340 |
| 8 | Gallery images use generic `alt="Ha Giang 1"` etc. | Medium | Google docs | L723, L740 |
| 9 | Culture images use placeholder `alt="Cultural Aspect 1"` | High | Google docs | L1185–L1210 |
| 10 | FAQ section H2 inverted above H3 section headings | High | Heading rules | L1234 vs L766+ |
| 11 | `<a href="#">` placeholder for transport guide link | Medium | Internal links | L926 |
| 12 | No `<meta name="robots">` awareness — defaults uncontrolled | Medium | Google robots doc | Rank Math admin |
| 13 | No `data-nosnippet` on pricing/legal UI text | Low | Google robots doc | L547, pricing items |
| 14 | No FAQPage JSON-LD schema | High | Schema rules | `rank-math.php` |
| 15 | No TouristTrip schema | Medium | Schema rules | `rank-math.php` |
| 16 | Breadcrumbs not integrated with Rank Math | Medium | Breadcrumb rules | Template |
| 17 | TOC widget not wrapped in `<nav>` | Low | Accessibility/SEO | L309 |
| 18 | `index, follow` robots tag if output by Rank Math — redundant noise | Low | Google robots doc | Rank Math admin |

---

## Fix 1 — Add H1 (Critical)

**Problem:** `$t['ha_giang']['destination_title']` is passed to `vibe-card.php` as `$vibe_destination_title` (line 345) but never output as `<h1>`. Google has no H1 on this page.

Google's guidance on title links: when there is more than one large, prominent headline and it isn't clear which text is the main headline, Google may use the first headline it finds as the title link. Since your page currently has no H1 at all, Google is guessing — likely pulling text from the vibe card or first visible heading.

**Option A — Edit vibe-card.php (preferred)**

Inside `vibe-card.php`, find wherever `$vibe_destination_title` is rendered and change its tag to `<h1>`:

```php
<!-- Inside vibe-card.php — find the destination title element and change to: -->
<h1 style="/* keep all existing visual styles exactly as they are */">
    <?php echo esc_html($vibe_destination_title); ?>
</h1>
```

No visual change. One tag rename. This is the correct fix.

**Option B — Cannot edit vibe-card.php**

Add a visually hidden H1 inside the `.overview-hero-media` div (line 338), before the vibe card include:

```php
<!-- Line 338 — inside overview-hero-media div, before vibe card include -->
<div class="overview-hero-media" style="width:100%; height:clamp(350px, 45vw, 560px); overflow:hidden; position:relative;">
    
    <!-- SEO H1 — visually hidden, semantically present -->
    <h1 style="position:absolute; width:1px; height:1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; margin:0; padding:0;">
        <?php echo esc_html($t['ha_giang']['destination_title']); ?>
    </h1>

    <img
        src="<?php echo esc_url($hero_image); ?>"
        ...
```

**Important:** only one H1 per page. Do not add H1 in both vibe-card.php and the template — pick one location and use it consistently across all destination pages.

---

## Fix 2 — Correct the Full Heading Hierarchy

### Current broken outline (what Google sees now)

```
(no H1)
  H2 — price display (L546)          ← semantic misuse, not a section
  H3 — Transportation heading (L766)  ← should be H2
    H3 — Bus card label (L880)        ← correct level IF parent becomes H2
  H3 — Weather heading (L980)         ← should be H2
  H3 — Highlights subtitle (L1078)    ← should be H2
  H3 — Activities heading (L1157)     ← should be H2
    H3 — Happy Water (L1166)          ← same level as parent — should be H3 under H2
    H3 — Market (L1173)               ← same level as parent — should be H3 under H2
  H2 — FAQs heading (L1234)          ← correct level but sits above H3 sections — inverted
```

### Target outline (after all fixes)

```
H1 — Ha Giang [destination_title]           ← Fix 1
  H2 — Itinerary [itinerary_title]           ← Fix 3a
  H2 — Gallery [gallery_title]               ← Fix 3i
  H2 — Transportation [transport_title]      ← Fix 3b
    H3 — VIP Sleeper Bus                     ← already H3, correct after 3b
    H3 — Standard Sleeper Bus                ← already H3, correct after 3b
    H3 — Sitting Bus                         ← already H3, correct after 3b
  H2 — Weather [weather_title]               ← Fix 3d
  H2 — Highlights [highlight_subtitle]       ← Fix 3e
  H2 — Activities [culture_title]            ← Fix 3f
    H3 — Happy Water [culture_happywater_title] ← already H3, correct after 3f
    H3 — Market [culture_market_title]          ← already H3, correct after 3f
  H2 — Related Destinations [related_title]  ← Fix 3h
  H2 — FAQs [toc_faqs]                       ← already H2, keep as-is
```

---

## Fix 3 — Individual Heading Tag Changes

### 3a — Itinerary label (line 401) — `<p>` → `<h2>`

```php
<!-- BEFORE (line 401): -->
<p style="font-family:'Inter',sans-serif; font-size:12px; font-weight:400; color:#1D292C; text-transform:uppercase; line-height:20px; margin-bottom:16px;" class="mb-4">
    <?php echo $t['ha_giang']['itinerary_title']; ?>
</p>

<!-- AFTER: -->
<h2 style="font-family:'Inter',sans-serif; font-size:12px; font-weight:400; color:#1D292C; text-transform:uppercase; line-height:20px; margin-bottom:16px;">
    <?php echo $t['ha_giang']['itinerary_title']; ?>
</h2>
```

### 3b — Transportation heading (line 766) — `<h3>` → `<h2>`

```php
<!-- BEFORE: -->
<h3 class="font-phudu text-center mb-8" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px; text-transform:uppercase;">
    <?php echo $t['ha_giang']['transport_title']; ?>
</h3>

<!-- AFTER: -->
<h2 class="font-phudu text-center mb-8" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px; text-transform:uppercase;">
    <?php echo $t['ha_giang']['transport_title']; ?>
</h2>
```

### 3c — Bus card labels (line 880) — keep `<h3>`, no change needed

Once 3b makes the Transportation heading an H2, the bus card labels at line 880 (`<h3>`) are already the correct level. No change.

### 3d — Price display (line 546) — `<h2>` → `<p>`

```php
<!-- BEFORE (line 546): -->
<h2 class="text-2xl font-bold" style="color:#7B63F7;"><span id="price-per-plan"></span></h2>

<!-- AFTER: price is not a page section — use p with aria-live for JS updates -->
<p class="text-2xl font-bold" style="color:#7B63F7;" aria-live="polite">
    <span id="price-per-plan"></span>
</p>
```

### 3e — Weather heading (line 980) — `<h3>` → `<h2>`

```php
<!-- BEFORE: -->
<h3 class="font-phudu text-center mb-2" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px; text-transform:uppercase;">
    <?php echo $t['ha_giang']['weather_title']; ?>
</h3>

<!-- AFTER: -->
<h2 class="font-phudu text-center mb-2" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px; text-transform:uppercase;">
    <?php echo $t['ha_giang']['weather_title']; ?>
</h2>
```

### 3f — Highlights section (lines 1075–1079) — `<p>` label stays, `<h3>` → `<h2>`

```php
<!-- BEFORE: -->
<p style="font-family:'Inter',sans-serif; font-size:12px; font-weight:400; color:#1D292C; text-transform:uppercase; line-height:20px;" class="mb-2">
    <?php echo $t['ha_giang']['highlight_title']; ?>
</p>
<h3 class="font-phudu mb-2" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;">
    <?php echo $t['ha_giang']['highlight_subtitle']; ?>
</h3>

<!-- AFTER: decorative label stays <p>, main subtitle becomes <h2> -->
<p style="font-family:'Inter',sans-serif; font-size:12px; font-weight:400; color:#1D292C; text-transform:uppercase; line-height:20px;" class="mb-2">
    <?php echo $t['ha_giang']['highlight_title']; ?>
</p>
<h2 class="font-phudu mb-2" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;">
    <?php echo $t['ha_giang']['highlight_subtitle']; ?>
</h2>
```

### 3g — Activities / Culture heading (line 1157) — `<h3>` → `<h2>`

```php
<!-- BEFORE: -->
<h3 class="font-phudu mb-8" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;">
    <?php echo $t['ha_giang']['culture_title'] ?>
</h3>

<!-- AFTER: -->
<h2 class="font-phudu mb-8" style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;">
    <?php echo $t['ha_giang']['culture_title'] ?>
</h2>
```

### 3h — Happy Water & Market sub-headings (lines 1166, 1173) — already `<h3>`, keep

Once 3g makes Activities an H2, these are already correctly H3 underneath it. No tag change needed — they nest properly.

### 3i — "Related / How to Book" heading (line 1221) — `<p>` → `<h2>`

```php
<!-- BEFORE (line 1221): -->
<p style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;" class="mb-3">
    <?php echo $t['ha_giang']['related_title']; ?>
</p>

<!-- AFTER: -->
<h2 style="font-family:'Phudu',sans-serif; font-size:24px; font-weight:600; color:#1D292C; line-height:36px;" class="mb-3">
    <?php echo $t['ha_giang']['related_title']; ?>
</h2>
```

### 3j — Gallery pill title (lines 684–686) — `<span>` → `<h2>`

```php
<!-- BEFORE: gallery title is only a <span> — invisible to heading outline -->
<span class="font-phudu" style="font-family:'Phudu',sans-serif; font-size:30px; font-weight:800; text-transform:uppercase; color:#1D292C;">
    <?php echo $t['ha_giang']['gallery_title']; ?>
</span>

<!-- AFTER: -->
<h2 class="font-phudu" style="font-family:'Phudu',sans-serif; font-size:30px; font-weight:800; text-transform:uppercase; color:#1D292C; margin:0;">
    <?php echo $t['ha_giang']['gallery_title']; ?>
</h2>
```

---

## Fix 4 — Image Alt Text (Google: "describe what is in the image")

Google's documentation requires alt text to be descriptive. Generic or placeholder alts provide no SEO signal and degrade image discoverability.

### 4a — Hero image (line 340)

```php
<!-- BEFORE: -->
<img
    src="<?php echo esc_url($hero_image); ?>"
    alt="Ha Giang"
    style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" />

<!-- AFTER: descriptive, translatable, contains focus keyword naturally -->
<img
    src="<?php echo esc_url($hero_image); ?>"
    alt="<?php echo esc_attr($t['ha_giang']['hero_img_alt'] ?? 'Ha Giang Loop mountain road through karst limestone plateau'); ?>"
    style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" />
```

Add to lang file: `'hero_img_alt' => 'Ha Giang Loop mountain road through karst limestone plateau'` (EN) and Vietnamese equivalent.

### 4b — Gallery images (lines 723, 740)

```php
<!-- BEFORE: -->
alt="Ha Giang <?php echo $index + 1; ?>"

<!-- AFTER option A — per-image alt keys in lang file (best) -->
alt="<?php echo esc_attr($t['ha_giang']['gallery_img_' . $index . '_alt'] ?? 'Ha Giang Loop scenery ' . ($index + 1)); ?>"

<!-- AFTER option B — minimum viable improvement -->
alt="<?php echo esc_attr($t['ha_giang']['gallery_alt_prefix'] . ' ' . ($index + 1)); ?>"
<!-- lang file: 'gallery_alt_prefix' => 'Ha Giang Loop landscape photo' -->
```

Apply same change to the gallery modal image (line 1383):
```php
<!-- BEFORE (line 1383): -->
document.getElementById('gal-modal-img').alt = 'Ha Giang ' + (i + 1);

<!-- AFTER: pass alt text from PHP into JS -->
<?php
$gallery_alts = [];
foreach ($all_gallery_images as $i => $url) {
    $gallery_alts[] = $t['ha_giang']['gallery_img_' . $i . '_alt'] ?? 'Ha Giang Loop photo ' . ($i + 1);
}
?>
var galleryAlts = <?php echo json_encode($gallery_alts, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG); ?>;
// Then in galRender():
document.getElementById('gal-modal-img').alt = galleryAlts[i];
```

### 4c — Culture images (lines 1185–1210)

```php
<!-- BEFORE — all five images have wrong/duplicate alts: -->
alt="Cultural Aspect 1"
alt="Cultural Aspect 2"
alt="Cultural Aspect 3"  <!-- repeated 3 times -->

<!-- AFTER — use lang file keys: -->
<img src="<?php echo esc_url($culture_images[0] ?? ''); ?>"
     alt="<?php echo esc_attr($t['ha_giang']['culture_img_0_alt'] ?? 'Ha Giang ethnic minority culture'); ?>"
     class="w-full h-full object-cover cursor-pointer rounded-2xl" />

<img src="<?php echo esc_url($culture_images[1] ?? ''); ?>"
     alt="<?php echo esc_attr($t['ha_giang']['culture_img_1_alt'] ?? 'Happy water corn wine tradition Ha Giang'); ?>"
     class="w-full h-full object-cover cursor-pointer rounded-2xl" />

<img src="<?php echo esc_url($culture_images[2] ?? ''); ?>"
     alt="<?php echo esc_attr($t['ha_giang']['culture_img_2_alt'] ?? 'Ha Giang ethnic market Dong Van'); ?>"
     class="w-full h-full object-cover cursor-pointer rounded-2xl" />

<img src="<?php echo esc_url($culture_images[3] ?? ''); ?>"
     alt="<?php echo esc_attr($t['ha_giang']['culture_img_3_alt'] ?? 'Local life Ha Giang highlands'); ?>"
     class="w-full h-full object-cover cursor-pointer rounded-2xl" />

<img src="<?php echo esc_url($culture_images[4] ?? ''); ?>"
     alt="<?php echo esc_attr($t['ha_giang']['culture_img_4_alt'] ?? 'Ha Giang tribal village Meo Vac'); ?>"
     class="w-full h-full object-cover cursor-pointer rounded-2xl" />
```

### 4d — Transport images (line 863)

```php
<!-- BEFORE: uses badge text as alt — too short, badge is just "VIP / Standard / Budget" -->
alt="<?php echo esc_attr($bt['badge_en']); ?>"

<!-- AFTER: full label + context -->
alt="<?php echo esc_attr(($current_lang === 'en' ? $bt['label_en'] : $bt['label_vi']) . ' — Ha Giang sleeper bus'); ?>"
```

### 4e — Decorative icons (throughout file)

Icons like `download.svg`, `chevron-down.svg`, `arrow-right.svg` are decorative. Confirm their alts are empty:

```php
<!-- CORRECT — decorative icons should have empty alt, not missing alt -->
<img src="<?php echo esc_url($theme_uri . '/assets/icons/download.svg'); ?>" alt="" width="15" height="15" />
<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/arrow-right.svg'); ?>" alt="" aria-hidden="true" />
```

---

## Fix 5 — Robots Meta & Indexing Control (Google robots doc)

### 5a — Remove redundant robots tag from Rank Math output

Check Rank Math admin → Titles & Meta → Global Meta. If `index, follow` appears in the global robots setting, remove it. Google states explicitly that `index` and `follow` are defaults — outputting them is redundant noise.

Verify with Google Search Console → URL Inspection → View Crawled Page → check the `<head>` for:
```html
<!-- This is wasted output — remove from Rank Math settings -->
<meta name="robots" content="index, follow">
```

### 5b — Set `noindex` on non-content pages via Rank Math

Pages that must never appear in search results — set in Rank Math metabox → Advanced tab → Robots:

| Page type | Setting |
|---|---|
| Thank-you / booking confirmation | `noindex` |
| Internal search results (if any) | `noindex` |
| Any duplicate destination variant pages | `noindex` + canonical pointing to original |
| Staging/preview copies | block via `robots.txt` (not just noindex) |

**Critical rule:** do not block destination tour pages (like `ha-giang-tour.php`) in `robots.txt`. If a page is disallowed in `robots.txt`, Googlebot never crawls it — meaning the `noindex` meta tag is never read, and the page can still appear in SERPs based on external links alone. Always: allow crawl → control indexing via meta robots.

### 5c — Apply `data-nosnippet` to UI elements you don't want as SERP snippet

Google can use any visible text on the page as the search result description. Protect UI noise:

```php
<!-- Pricing note — you don't want "per person / per day" appearing as meta description -->
<div class="itinerary-pricing-summary mb-4 flex items-baseline justify-between gap-3">
    <p class="text-2xl font-bold" style="color:#7B63F7;" aria-live="polite">
        <span id="price-per-plan"></span>
    </p>
    <p data-nosnippet style="color:#7B63F7; font-size:13px; font-weight:600; white-space:nowrap;">
        <?php echo esc_html($t['ha_giang']['itinerary_price_note']); ?>
    </p>
</div>

<!-- FAQ answer text — already controlled by Rank Math FAQPage schema, exclude from snippet -->
<div id="faq-answer-<?php echo $index; ?>" class="hidden pb-4" style="font-size:15px; line-height:24px; color:#474E50;">
    <div data-nosnippet><?php echo $answer_text; ?></div>
</div>
```

Note: `data-nosnippet` can be applied to `<span>`, `<div>`, and `<section>` elements only.

---

## Fix 6 — Internal Link Placeholder (line 926)

```php
<!-- BEFORE (line 926): dead link -->
<a href="#" class="font-semibold underline" style="color:#7B63F7; font-size:15px;">
    <?php echo $t['ha_giang']['transport_guide_link']; ?>
</a>

<!-- AFTER: real URL from lang file, external opens in new tab with proper rel -->
<a href="<?php echo esc_url($t['ha_giang']['transport_guide_url'] ?? '/ha-giang-transport'); ?>"
   class="font-semibold underline"
   style="color:#7B63F7; font-size:15px;">
    <?php echo $t['ha_giang']['transport_guide_link']; ?>
</a>
```

Add to lang file:
```php
'transport_guide_url' => '/ha-giang-transport-guide',  // or full URL to the guide page
```

---

## Fix 7 — Breadcrumbs (Rank Math BreadcrumbList JSON-LD)

Insert between line 375 (`</section>` end of hero) and line 378 (start of `#why-i-went`):

```php
    </section>
    <!-- /overview hero -->

    <!-- Breadcrumbs — Rank Math outputs BreadcrumbList JSON-LD schema automatically -->
    <?php if (function_exists('rank_math_the_breadcrumbs')): ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-2" style="font-size:13px; color:#74797A; line-height:20px;">
        <?php rank_math_the_breadcrumbs(); ?>
    </div>
    <?php endif; ?>

    <!-- ── "WHY I WENT" HOOK BLOCK ── -->
    <section id="why-i-went" style="background:#F9FBDF; border-bottom:2px solid #E7F15A;">
```

Rank Math renders: `Home > Ha Giang Loop Tour` and auto-outputs the BreadcrumbList schema — no extra code needed.

---

## Fix 8 — FAQPage Schema (rank-math.php)

Wire the existing `$faqs_data` array into Google-readable JSON-LD. This enables FAQ rich results in SERP.

Create or update `/wp-content/themes/your-theme/rank-math.php`:

```php
<?php
/**
 * Rank Math SEO customizations
 */

// 1. Breadcrumb theme support
add_theme_support('rank-math-breadcrumbs');


// 2. FAQPage schema — destination tour pages
add_filter('rank_math/json_ld', function($data, $jsonld) {

    // Target only pages using a tour template
    if (!is_page_template('ha-giang-tour.php') &&
        !is_page_template('other-destination-tour.php')) {
        return $data;
    }

    $t = load_lang();
    $destination = 'ha_giang'; // swap per template or detect from template name

    $faq_keys = [
        ['q' => 'faq_q_price',       'a' => 'faq_a_price'],
        ['q' => 'faq_q_first_timer', 'a' => 'faq_a_first_timer'],
        ['q' => 'faq_q_self_drive',  'a' => 'faq_a_self_drive'],
        ['q' => 'faq_q_days',        'a' => 'faq_a_days'],
        ['q' => 'faq_q_packing',     'a' => 'faq_a_packing'],
        ['q' => 'faq_q_party',       'a' => 'faq_a_party'],
    ];

    $main_entity = [];
    foreach ($faq_keys as $faq) {
        $q = wp_strip_all_tags($t[$destination][$faq['q']] ?? '');
        $a = wp_strip_all_tags($t[$destination][$faq['a']] ?? '');
        if ($q && $a) {
            $main_entity[] = [
                '@type' => 'Question',
                'name'  => $q,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $a,
                ],
            ];
        }
    }

    if (!empty($main_entity)) {
        $data['FAQPage'] = [
            '@type'      => 'FAQPage',
            'mainEntity' => $main_entity,
        ];
    }

    return $data;
}, 99, 2);


// 3. TouristTrip schema — Ha Giang destination page
add_filter('rank_math/json_ld', function($data, $jsonld) {

    if (!is_page_template('ha-giang-tour.php')) return $data;

    $data['TouristTrip'] = [
        '@type'       => 'TouristTrip',
        'name'        => 'Ha Giang Loop Tour',
        'description' => get_the_excerpt() ?: "Explore the Ha Giang Loop — Vietnam's most spectacular motorbike route through karst mountains and ethnic minority villages.",
        'touristType' => ['Backpackers', 'Adventure Travellers', 'Independent Travellers'],
        'itinerary'   => [
            '@type'           => 'ItemList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Ha Giang City'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Quan Ba'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Yen Minh'],
                ['@type' => 'ListItem', 'position' => 4, 'name' => 'Dong Van'],
                ['@type' => 'ListItem', 'position' => 5, 'name' => 'Meo Vac'],
            ],
        ],
        'provider' => [
            '@type' => 'TravelAgency',
            'name'  => get_bloginfo('name'),
            'url'   => home_url(),
        ],
    ];

    return $data;
}, 99, 2);
```

---

## Fix 9 — TOC Widget: Wrap in `<nav>` (line 302–330)

```php
<!-- BEFORE (line 302): -->
<div
    id="toc-content"
    class="absolute -top-12 right-0 w-50 h-fit bg-white overflow-y-auto shadow-xl ...">
    <div class="p-3 text-xs text-[#74797A]">Table of content</div>
    <ul id="toc-list">

<!-- AFTER: use <nav> so crawlers understand this is navigation -->
<nav
    id="toc-content"
    aria-label="Page sections"
    class="absolute -top-12 right-0 w-50 h-fit bg-white overflow-y-auto shadow-xl ...">
    <div class="p-3 text-xs text-[#74797A]">Table of content</div>
    <ul id="toc-list">
```

---

## Lang File Additions Required

Add these keys to your translation file for both `en` and `vi` languages:

```php
// ha_giang group — new keys required by the fixes above
'hero_img_alt'     => 'Ha Giang Loop mountain road through karst limestone plateau',
'gallery_alt_prefix' => 'Ha Giang Loop landscape photo',
'gallery_img_0_alt'  => 'Ha Giang Loop aerial view Ma Pi Leng Pass',
'gallery_img_1_alt'  => 'Dong Van karst plateau sunrise Ha Giang',
'gallery_img_2_alt'  => 'Nho Que river canyon Ha Giang',
'gallery_img_3_alt'  => 'H\'Mong ethnic village Dong Van Ha Giang',
// ... continue per actual image content
'culture_img_0_alt'  => 'Ha Giang ethnic minority culture and traditions',
'culture_img_1_alt'  => 'Happy water corn wine ceremony Ha Giang',
'culture_img_2_alt'  => 'Dong Van Sunday ethnic market Ha Giang',
'culture_img_3_alt'  => 'Local life in Ha Giang highlands',
'culture_img_4_alt'  => 'Meo Vac tribal village Ha Giang Loop',
'transport_guide_url' => '/ha-giang-transport-guide',
```

---

## Pattern for All Other Destination Pages

Apply every fix above identically to other tour template files. Rules that apply globally:

| Element | Rule | Tag |
|---|---|---|
| Destination name in vibe card | One H1 per page, contains primary keyword | `<h1>` |
| Decorative 12px uppercase label | Not a heading — decorative only | `<p>` |
| Section main title (24px Phudu) | Primary section heading | `<h2>` |
| Sub-topic within a section | Secondary heading | `<h3>` |
| Card labels under section heading | Tertiary if nested under H2 | `<h3>` |
| Price display | Not a heading — dynamic UI | `<p aria-live="polite">` |
| Gallery pill title | Semantic section heading | `<h2>` |
| FAQ section title | Section heading | `<h2>` |
| Hero image alt | Scene description + destination keyword | Lang file key |
| Gallery image alt | Specific location/scene description | Lang file key per image |
| Culture image alt | What is actually in the photo | Lang file key per image |
| Decorative icons | Empty alt, not missing alt | `alt=""` + `aria-hidden="true"` |
| `<a href="#">` placeholders | Real URL always | Lang file key `*_url` |
| Pricing text / legal disclaimers | Hide from SERP snippet | `data-nosnippet` on wrapper |

---

## Complete Corrected Heading Outline

```
H1 — [destination_title] e.g. "Ha Giang Loop Tour"
  H2 — [itinerary_title] e.g. "Itinerary"
  H2 — [gallery_title] e.g. "Gallery"
  H2 — [transport_title] e.g. "Getting There"
    H3 — VIP Sleeper Bus
    H3 — Standard Sleeper Bus
    H3 — Sitting Bus
  H2 — [weather_title] e.g. "When to Go"
  H2 — [highlight_subtitle] e.g. "What to See"
  H2 — [culture_title] e.g. "Culture & Activities"
    H3 — [culture_happywater_title]
    H3 — [culture_market_title]
  H2 — [related_title] e.g. "You Might Also Like"
  H2 — [toc_faqs] e.g. "FAQs"
```

---

## Rank Math Admin — Per-Page Settings

For each destination page in WP admin → Rank Math metabox:

| Field | Value for Ha Giang page |
|---|---|
| Focus keyword | `ha giang loop tour` or `ha giang motorbike tour` |
| SEO Title | `Ha Giang Loop Tour — [Site Name]` (under 60 chars) |
| Meta Description | 150–160 chars, include focus keyword + differentiator (easy driver, 4-day, price) |
| Robots | Leave default (index, follow) — do NOT output `index, follow` explicitly |
| Schema type | TouristTrip (set manually or via rank-math.php filter) |
| Social image | Upload hero shot, 1200×630px, in Rank Math → Social tab |
| Pillar content | Check "Pillar Content" — destination pages are highest-value pages |

---

## Verification Checklist

After applying all fixes, verify using Google Search Console → URL Inspection Tool → View Crawled Page:

- [ ] `<head>` contains no invalid elements (`<img>`, `<iframe>`, `<div>`) before `wp_head()` output
- [ ] `<title>` is present and contains focus keyword
- [ ] `<meta name="description">` is present, 150–160 chars, no duplicate
- [ ] `<link rel="canonical">` points to the correct URL (same language version)
- [ ] `<link rel="alternate" hreflang>` present for EN and VI versions
- [ ] `<meta name="robots">` is either absent or has useful directive (never `index, follow`)
- [ ] `<meta name="keywords">` is absent
- [ ] JSON-LD contains `FAQPage` schema with all 6 FAQ questions
- [ ] JSON-LD contains `TouristTrip` schema
- [ ] JSON-LD contains `BreadcrumbList` from Rank Math breadcrumbs
- [ ] Page heading outline has exactly one H1
- [ ] All H2s appear before any H3s that are their children
- [ ] No heading levels are skipped (H1 → H2 → H3 only)
- [ ] Hero image alt is descriptive, not "Ha Giang"
- [ ] No image has alt="Cultural Aspect" or alt="Ha Giang 1" etc.
- [ ] Decorative icons have `alt=""`, not missing alt attribute
- [ ] Transport guide link points to real URL, not `#`
