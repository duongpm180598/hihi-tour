# Implementation Plan: Site Image URL Manifest

## Goal Description

Restructure site image usage so PHP templates stop building image `src` values from local theme paths such as `get_template_directory_uri() . '/assets/images/...'`.

Target shape:

- Use externally hosted full URLs, for example `https://hihitour.com/wp-content/uploads/2025/12/PA120443-1-scaled.jpg`.
- Keep image management centralized and organized by purpose/page.
- Keep templates clean by referencing logical image keys instead of scattered URLs.
- Preserve current layouts, gallery order, highlight modal behavior, weather/transport cards, social QR displays, related destinations, favicon/logo output, and existing escaping.

This is a large cross-site refactor. Per `.kiro/steering/planning-mode.md`, implementation waits for explicit approval after this plan.

## User Review Required

> [!IMPORTANT]
> Remote URLs come from WordPress Media Library and include upload year/month plus original filename, for example `https://hihitour.com/wp-content/uploads/2025/12/PA120443-1-scaled.jpg`. Because each image can have a different upload month/year, final mapping must use exact URLs per image key.

Mapping approach:

1. **Use explicit URL manifest.** Create a centralized PHP manifest where every image key maps to one full WordPress upload URL.
2. **Manual mapping supported.** If exact URLs are not available during implementation, keep each key in the manifest with a clear placeholder/comment so URLs can be filled without touching templates.
3. **No single base URL assumption.** Do not generate URLs from one month folder. WordPress upload dates can differ per file.
4. **Optional helper for consistency only.** Helper functions resolve keys and arrays, but they do not invent upload paths.

> [!IMPORTANT]
> Icons are out of scope. Do not replace `assets/icons` paths.

Final scope:

- Convert all `assets/images` raster media to remote URLs.
- Keep `assets/icons` local for UI controls and SVG icons (`download.svg`, `chevron-down.svg`, weather icons, vibe icons), because they are theme UI assets and often loaded by JS/CSS.

## Open Questions

- Are all replacement images already uploaded to WordPress Media Library? Current note says yes.
- Can you provide/export the exact Media Library URLs, or should I create the manifest with image keys and placeholders for manual fill?
- Should local image fallback be disabled completely? Recommended: no local fallback for production correctness, but keep validation checks to catch missing manifest keys.
- Should generated schema/logo URLs in `footer.php` also move to the manifest? Recommended: yes.
- Should placeholder image in `hihi-go-to.php` stay external `placehold.co`, or move to a real uploaded placeholder URL? Recommended: move to manifest if there is a real placeholder.

## Proposed Changes

### [NEW] `inc/image-assets.php`

Central image manifest and helper functions:

- `hihi_image_manifest()` returns organized full WordPress upload URL map.
- `hihi_image_url($key)` returns one URL string by dot key.
- `hihi_image_group($key)` returns arrays for galleries, immersive sections, weather slides, highlights, transport cards, social QR/image sets, and destination cards.
- Missing/placeholder URLs should fail visibly in validation instead of silently falling back to local theme assets.
- Manifest structure example:

```php
[
    'global' => [
        'brand' => [
            'logo' => 'https://hihitour.com/wp-content/uploads/2025/12/logo.png',
            'logo_new' => 'https://hihitour.com/wp-content/uploads/2025/12/logo_new.png',
        ],
        'social' => [
            'whatsapp' => 'https://hihitour.com/wp-content/uploads/2025/12/whatsapp.png',
        ],
    ],
    'ha_giang' => [
        'hero' => 'https://hihitour.com/wp-content/uploads/2025/12/PA120443-1-scaled.jpg',
        'gallery' => [
            'nho_que' => '...',
        ],
    ],
]
```

### [MODIFY] `functions.php`

- Load `inc/image-assets.php`.
- Replace related destination image paths with manifest keys.
- Keep escaping at output (`esc_url`, `esc_attr`, `esc_html`).
- Do not add user-facing strings.

### [MODIFY] Shared Components

- `components/card.php`: accept remote URL values directly.
- `components/highlight-modal.php`: stop prefixing highlight images with `get_template_directory_uri()`; accept manifest URL arrays.
- `components/vibe-card.php`: no planned change. It uses `assets/icons`, and icons stay local.

### [MODIFY] Global Templates

- `header.php`: favicon, apple icon, header logo from manifest.
- `footer.php`: logo, mascot, social icons, schema logo from manifest.
- `front-page.php`: destination cards and social/QR images from manifest.
- `helps.php`: contact/social/QR/payment images from manifest.
- `thank-you.php`: logo from manifest.
- `404.php`: not-found image from manifest.
- `hihi-go-to.php`: keep featured image logic; replace fallback placeholder only if approved/available in manifest.

### [MODIFY] Tour Page Templates

Files:

- `ha-giang-tour.php`
- `cao-bang-tour.php`
- `hue-tour.php`
- `mu-cang-chai.php`
- `ninh-thuan.php`
- `taiwan.php`
- `cat-ba-tour.php`

Changes:

- Replace `$theme_uri . '/assets/images/...'` and `get_template_directory_uri() . '/assets/images/...'` with manifest lookups.
- Replace local relative highlight image paths (`'/assets/images/...'`) with full URL values from manifest.
- Replace dynamic `glob(get_template_directory() . '/assets/images/...')` gallery loading with explicit manifest gallery arrays, because remote URLs cannot be scanned with local filesystem `glob`.
- Keep `assets/icons` references unchanged.
- Preserve gallery order and modal arrays.
- Preserve `data-src`, `src`, `data-image-url`, weather card image arrays, immerse/life images, transport-card images, banner arrays, and social QR/image arrays.
- Do not touch itinerary logic unless image path wiring is directly mixed into it.

### [MODIFY] CSS/JS Only If Needed

- `assets/js/main.js`: inspect and update only if it assumes local image paths.
- `assets/js/lightgallery.js`: no planned change unless local path assumptions are found.
- `style.css`, `src/output.css`, `assets/css/lightgallery.css`: no planned manual edits unless they contain local raster image URLs. Avoid editing generated CSS unless necessary.

### [NEW] `task.md`

Created only after approval. Checklist for:

- Manifest creation.
- Shared helper implementation.
- Global template conversion.
- Tour template conversion.
- Validation.

### [NEW] `walkthrough.md`

Created after implementation and verification. Summarizes:

- Files changed.
- Image groups migrated.
- Validation evidence.
- Any URLs still needing user-provided replacements.

## Verification Plan

Automated/static checks:

- Validate PHP syntax on every touched PHP file:
  - `/Applications/XAMPP/xamppfiles/bin/php -l functions.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l header.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l footer.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l front-page.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l helps.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l thank-you.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l 404.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l hihi-go-to.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l components/card.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l components/highlight-modal.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l ha-giang-tour.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l cao-bang-tour.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l hue-tour.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l mu-cang-chai.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l ninh-thuan.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l taiwan.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l cat-ba-tour.php`
- Validate JSON language files if touched:
  - `/Applications/XAMPP/xamppfiles/bin/php -r "json_decode(file_get_contents('lang/en.json'), true, 512, JSON_THROW_ON_ERROR);"`
  - `/Applications/XAMPP/xamppfiles/bin/php -r "json_decode(file_get_contents('lang/vi.json'), true, 512, JSON_THROW_ON_ERROR);"`
- Search for remaining local raster image path usage:
  - `rg "assets/images|/imgs/|wp-content/themes/.*/assets/images|get_template_directory_uri\\(\\).*assets/images|get_theme_file_uri\\('/assets/images" --glob '*.php' --glob '*.js' --glob '*.css'`
- Search for remote URL helper misuse/missing keys.
- Run `git diff --check`.

Manual/browser checks if local WordPress is available:

- Home page: destination images, social QR modal images.
- Header/footer: logo, favicon where visible, social icons, mascot.
- Each tour page: hero/banner, gallery, highlights modal, transport cards, weather section, immerse/life section.
- `helps`, `thank-you`, `404`, `hihi-go-to` fallback state.

## Risks

- Dynamic local gallery scanning must become explicit remote URL arrays; missing URLs will hide images or break modal counts.
- Some current destination pages reuse Ha Giang images intentionally or accidentally; migration should preserve current visual behavior unless user asks to correct image content.
- Remote filenames with spaces or special characters must be copied exactly and escaped with `esc_url`.
- Network/remote media availability cannot be fully verified offline; browser checks need the local WordPress site and internet access.
