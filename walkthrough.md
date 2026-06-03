# Walkthrough: Ninh Thuan Image URL Migration

## What Changed

- Added `inc/image-assets.php` as the central place for image URL management.
- Loaded the image helper from `functions.php`.
- Updated `ninh-thuan.php` so raster images come from `hihi_image_group('ninh_thuan')` and `hihi_image_group('global')`.
- Removed local filesystem gallery scanning from `ninh-thuan.php`; gallery order now comes from the manifest.
- Updated `components/highlight-modal.php` so it accepts full URLs and still supports old local relative paths used by other pages.
- Left `assets/icons` paths unchanged.

## Where To Put Image URLs

Put Ninh Thuan image URLs in `inc/image-assets.php`, inside:

- `global.social` for WhatsApp, Instagram, Facebook images.
- `global.qr` for social QR images.
- `ninh_thuan.hero` for the top hero image.
- `ninh_thuan.highlight.default` for highlight cards and modal image.
- `ninh_thuan.transport.default` for transport cards.
- `ninh_thuan.gallery` for gallery and gallery modal order.
- `ninh_thuan.weather` for weather season cards.
- `ninh_thuan.culture` for culture image grid.

Use exact WordPress URLs when needed:

```php
'hero' => ['url' => 'https://hihitour.com/wp-content/uploads/2025/12/PA120443-1-scaled.jpg'],
```

Or use filename lookup when the Media Library filename is unique:

```php
'hero' => ['file' => 'PA120443-1-scaled.jpg'],
```

## Verification

- `/Applications/XAMPP/xamppfiles/bin/php -l ninh-thuan.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l functions.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l inc/image-assets.php`
- `/Applications/XAMPP/xamppfiles/bin/php -l components/highlight-modal.php`
- `rg "assets/images|get_template_directory\\(\\).*assets/images|get_template_directory_uri\\(\\).*assets/images|theme_uri \\..*/assets/images" ninh-thuan.php`
- `git diff --check`

All checks passed.
