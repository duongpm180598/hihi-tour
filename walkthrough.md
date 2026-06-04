# Walkthrough: Ninh Thuan Image Manifest First

## Changed Files

- `inc/image-assets.php`: added centralized image manifest and dot-key helper functions.
- `functions.php`: loads the manifest helper.
- `ninh-thuan.php`: replaces local raster image wiring with manifest groups for hero, gallery, highlights, transport, weather, and culture images.
- `components/highlight-modal.php`: accepts full remote URLs while keeping existing relative-path support for other pages.
- `task.md`: execution checklist for this first pass.

## Image URLs Used

- `https://hihitour.com/wp-content/uploads/2025/12/Screenshot_20251211_233712_Gallery-1-edited.jpg`
- `https://hihitour.com/wp-content/uploads/2025/12/retouch_2024062019095613-1.jpg`
- `https://hihitour.com/wp-content/uploads/2025/12/retouch_2024061918515652-1.jpg`

## Verification

- `/Applications/XAMPP/xamppfiles/bin/php -l ninh-thuan.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l functions.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l components/highlight-modal.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l inc/image-assets.php`
- `git diff --check`

All passed.

## Remaining Scope

- `functions.php` still has local raster paths for global related-destination cards. That is outside the Ninh Thuan template-first pass and should move after exact URLs are provided for those destination card images.
