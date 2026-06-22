# Implementation Plan: Thailand Destination Page

## Goal

Create a new WordPress destination template for Thailand based on `taiwan.php`.

The page should be a 6-day itinerary covering Bangkok and Chiang Mai highlights, with page-local content in both `lang/en.json` and `lang/vi.json`.

## Required User Review

> [!IMPORTANT]
> This is a new full destination page with new locale content, template wiring, image manifest data, homepage linking, pricing, highlights, weather, transport, FAQ, and itinerary data.
>
> Per project rules, source edits should start only after explicit approval.

## Source Pattern

Use `taiwan.php` as the structural base:

- Page template header.
- Page-local namespace variable.
- Image manifest groups through `hihi_image_url()` and `hihi_image_group()`.
- Overview hero + vibe card.
- Itinerary section with one plan.
- Gallery.
- Transportation.
- Weather.
- Highlights + shared highlight modal.
- Culture section.
- How to book / FAQ / related destinations if available in the source template.
- Inline itinerary data exported as JSON for `assets/js/itinerary.js`.

## New Page Scope

### New Template

Create:

- `thailand.php`

Template metadata:

- `Template Name: Thailand`
- `Template Post Type: page`

Page namespace:

- `thailand`

Local variable:

- `$thailand = $t['thailand'];`

### Homepage Link

Update `front-page.php`:

- Change Thailand destination `slug` from `null` to a real slug, likely `thailand-trip`.
- Keep current card filtering metadata.

### Image Manifest

Update `inc/image-assets.php`:

- Add `thailand` group.
- Use stable external image URLs only if already known/provided or safe existing local placeholders if not.
- Required groups:
  - `hero`
  - `gallery`
  - `highlight`
  - `bangkok`
  - `chiang_mai`
  - `transport`
  - `weather`
  - `culture`

If no Thailand-specific images exist locally, use a small curated set of remote URLs and keep them easy to replace later.

### Locale Files

Update:

- `lang/en.json`
- `lang/vi.json`

Add full `thailand` namespace to both files before using keys.

Required content areas:

- Destination title.
- Hero vibe copy.
- Owner take / quote.
- 6-day itinerary labels, descriptions, note, pricing, included/excluded.
- Day-by-day itinerary items.
- Gallery title/description/alt.
- Transportation section for flights, Bangkok transit, train/flight to Chiang Mai, ride-hailing, songthaew/tuk-tuk.
- Weather section for hot, rainy, cool seasons.
- Highlights section for Bangkok and Chiang Mai.
- Culture section.
- FAQ.

Use short travel-facing English and natural Vietnamese, not placeholder copy.

## Content Direction

### Destination Vibe

Thailand page should feel:

- Easy first Southeast Asia trip.
- Food-heavy.
- City energy in Bangkok.
- Softer mountain/temple/cafe rhythm in Chiang Mai.
- Flexible and friendly for first-time visitors.

### 6-Day Itinerary Draft

Plan key:

- `6` => `6 days`

Proposed route:

1. Day 1: Arrive Bangkok, hotel check-in, easy food walk, night market or Chinatown.
2. Day 2: Grand Palace / Wat Pho / river ferry, ICONSIAM or Chinatown dinner.
3. Day 3: Bangkok markets and modern city day, fly or overnight train to Chiang Mai.
4. Day 4: Chiang Mai Old City temples, cafes, night bazaar.
5. Day 5: Doi Suthep, mountain view, local food, optional ethical elephant sanctuary.
6. Day 6: Slow breakfast, Nimman / Warorot Market, fly home.

### Highlights

Create 8-9 highlights:

- Bangkok river temples.
- Chinatown / Yaowarat food.
- Chatuchak or local markets.
- Bangkok skytrain / modern city pockets.
- Chiang Mai Old City.
- Doi Suthep.
- Nimman cafes.
- Night Bazaar / Sunday Walking Street.
- Ethical elephant sanctuary or mountain day trip.

Each highlight needs:

- tag
- title
- desc
- summary
- keywords

## Technical Notes

- Avoid hardcoded new user-facing strings in PHP.
- Use `esc_html`, `esc_attr`, `esc_url`.
- Keep page-local data in `thailand`, not `taiwan` or `ha_giang`, unless using existing global shared labels.
- For weather with 3 cards, use responsive full-width grid and no next/back actions.
- Add `overview-hero-media` wrapper to avoid compact vibe-card/nav overlap.
- Add `itinerary-pricing-summary` where price and note share a row, if that pattern is used.
- Before implementation, manually inspect dynamic keys:
  - `highlight_item_{$i}_title`
  - `highlight_item_{$i}_tag`
  - `highlight_item_{$i}_desc`
  - `highlight_item_{$i}_summary`
  - `highlight_item_{$i}_keywords`
  - itinerary day item keys

## Proposed File Changes

- `thailand.php`: new page template based on `taiwan.php`.
- `lang/en.json`: add `thailand` namespace.
- `lang/vi.json`: add `thailand` namespace.
- `inc/image-assets.php`: add `thailand` image groups.
- `front-page.php`: link Thailand card to new page slug.
- `task.md`: implementation checklist after approval.
- `walkthrough.md`: final summary and validation after implementation.

## Verification Plan

Before implementation:

- Taiwan preflight already checked:
  - `taiwan.php taiwan taiwan`
  - direct `$taiwan` keys pass in both locales.

After implementation:

- Run locale preflight:
  - `/Applications/XAMPP/xamppfiles/bin/php ~/.codex/skills/hihi-tour-locale-preflight/scripts/validate-locale-keys.php thailand.php thailand thailand`
- Manually inspect dynamic highlight and itinerary keys.
- Validate PHP:
  - `/Applications/XAMPP/xamppfiles/bin/php -l thailand.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l front-page.php`
  - `/Applications/XAMPP/xamppfiles/bin/php -l inc/image-assets.php`
- Validate JSON:
  - parse `lang/en.json`
  - parse `lang/vi.json`
- Search stale weather carousel code:
  - `rg "season-scroll|scrollBy\\(\\{left|dragging" thailand.php`
- Run:
  - `git diff --check`
