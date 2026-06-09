# Walkthrough: Taiwan Image Manifest

## Changed Files

- `inc/image-assets.php`: added Taiwan image groups to the centralized manifest.
- `taiwan.php`: replaces local raster image wiring with manifest groups for hero, gallery, highlights, transport, weather, and culture images.
- `task.md`: execution checklist for the Taiwan pass.

## Image URLs Used

- `https://hihitour.com/wp-content/uploads/2025/12/P8210426-1-scaled.jpg`
- `https://hihitour.com/wp-content/uploads/2025/12/P1010033-1-scaled.jpg`
- `https://hihitour.com/wp-content/uploads/2025/12/P8210387-1-scaled.jpg`

## Verification

- `/Applications/XAMPP/xamppfiles/bin/php -l taiwan.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l inc/image-assets.php`
- `rg "assets/images/taiwan" taiwan.php`
- `git diff --check`

All passed. The Taiwan manifest groups also returned non-empty values.

## Remaining Scope

- Other templates and global raster images remain outside this Taiwan page pass.

---

# Walkthrough: Ha Giang And Mu Cang Chai Image Manifest

## Changed Files

- `inc/image-assets.php`: added organized Ha Giang and Mu Cang Chai image groups.
- `ha-giang-tour.php`: migrated hero, gallery, highlights, transport, weather, and culture images.
- `mu-cang-chai.php`: migrated hero, gallery, highlights, transport, weather, and culture images.

## Mapping

- Gallery and highlight images use matching filenames from `url-media.txt`.
- WordPress filename changes such as `_ha_giang.jpg` to `_ha_giang-scaled.jpg` and `khau-mang-thuong (1).webp` to `khau-mang-thuong-1.webp` were mapped explicitly.
- Old generic transport, weather, and culture slots without uploaded filename equivalents use supplied destination-specific images.

## Verification

- `/Applications/XAMPP/xamppfiles/bin/php -l ha-giang-tour.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l mu-cang-chai.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l inc/image-assets.php`
- Confirmed all 50 unique `2026/06` manifest URLs exist in `url-media.txt`.
- Confirmed no `assets/images` or `glob()` usage remains in either template.
- `git diff --check`

All static checks passed. Browser verification was unavailable in this session.

---

# Walkthrough: Hue And Cao Bang CSV Image Mapping

## Changed Files

- `inc/image-assets.php`: added Hue and Cao Bang image groups from `img-url-hihi.CSV`.
- `hue-tour.php`: migrated gallery, hero, highlights, transport, weather, and culture images.
- `cao-bang-tour.php`: migrated banners, gallery, highlights, transport, and weather images.

## Mapping

- Matching local filenames use the exact CSV URL.
- Hue groups include Đại Nội, A Lưới, Hương River, Anor waterfall, food, and heritage images.
- Cao Bang groups include Xuân Trường, Lenin Stream, Khau Cốc Chà, Bảo Lạc, and landscape images.
- `bai-da-trung.webp` maps to Ninh Thuan and `khau-pha.webp` maps to Mu Cang Chai.
- Generic transport/weather slots use destination-specific CSV images where no matching upload filename exists.

## Verification

- Confirmed every URL in `img-url-hihi.CSV` is represented in the manifest.
- `hue.gallery:37`, `hue.highlights:11`, `hue.transport:5`, `hue.weather:4`, `hue.culture:5`.
- `cao_bang.gallery:11`, `cao_bang.banners:5`, `cao_bang.highlights:5`, `cao_bang.transport:3`, `cao_bang.weather:4`.
- PHP lint passed for both templates and `inc/image-assets.php`.
- No `assets/images` or `glob()` references remain in either template.
- `git diff --check` passed.

---

# Walkthrough: Local Transportation Images

## Mapping

- Ha Giang and Cao Bang use local VIP, normal, and economy bus images.
- Mu Cang Chai uses local VIP and economy bus images.
- Hue uses local normal bus, airport, train, motorbike, and bicycle images.
- Ninh Thuan uses local airport, normal vehicle, and motorbike images.
- Taiwan uses the local normal vehicle, airport, train, motorbike, and bicycle set.
- Cat Ba transportation images were already local and remain unchanged.

## Verification

- Confirmed every transport image path exists under `assets/images`.
- PHP lint passed for the manifest and touched template.
- `git diff --check` passed.

---

# Walkthrough: Highlight Quick Peek

## Changed Behavior

- Highlight modals now show a localized quick summary and three keyword chips above the full description.
- Existing highlight descriptions remain unchanged.
- The shared modal implementation covers Ha Giang, Mu Cang Chai, Taiwan, Cao Bang, Hue, and Ninh Thuan.
- Cat Ba remains unchanged because it does not use the shared page-local highlight modal.

## Locale Data

- Added `global.highlight_quick_peek_label` to both language files.
- Generated localized summary and keyword fields for all 53 existing highlight records.
- Added localized quick-peek data for Ha Giang's additional rendered highlight card.

## Verification

- Confirmed all 53 records in each locale have a non-empty summary and three keywords.
- Confirmed every rendered highlight maps to the intended locale record.
- Validated `lang/en.json` and `lang/vi.json`.
- Ran PHP lint on the shared modal and all six destination templates.
- Ran `git diff --check`.

All static checks passed. Browser verification and automated JavaScript parsing were unavailable in this session; the modal script was manually inspected.
