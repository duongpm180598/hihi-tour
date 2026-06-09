# Walkthrough: Itinerary Download Feedback Pop-up

## Behavior

- A feedback modal opens shortly after a real itinerary file download starts.
- Current choices are Nha Trang, Phu Yen, and Thailand.
- English and Vietnamese copy comes from the locale JSON files.
- Visitors can dismiss without voting; the modal can appear on a later download.
- After a successful vote, the current option-set version is stored in `localStorage`, preventing repeat prompts in that browser.
- Changing `HIHI_ITINERARY_FEEDBACK_VERSION` makes a revised option set eligible again.

## Vote Storage

- Votes submit anonymously through WordPress AJAX with nonce validation.
- The server accepts only configured option IDs.
- Aggregate integer counts are stored in `hihi_itinerary_feedback_counts`.
- No names, email addresses, or IP addresses are stored.
- Administrators can see totals in the WordPress dashboard widget.

## Files

- `components/itinerary-feedback-modal.php`: shared accessible modal markup.
- `functions.php`: option configuration, frontend settings, AJAX handler, storage, and dashboard widget.
- `assets/js/main.js`: download trigger, modal controls, focus handling, AJAX submission, and browser repeat control.
- `style.css`: isolated responsive modal styles.
- `footer.php`: renders the shared modal on frontend pages.
- `lang/en.json`, `lang/vi.json`: localized modal and dashboard copy.
- `ha-giang-tour.php`, `hue-tour.php`, `ninh-thuan.php`, `taiwan.php`: mark real itinerary downloads.

## Verification

- PHP lint passed for `functions.php`, `footer.php`, the modal component, and all four touched destination templates.
- PHP JSON parsing passed for both locale files.
- PowerShell JSON parsing passed for both locale files.
- Found four native `download` attributes and four `data-itinerary-download` triggers.
- Confirmed “coming soon” buttons have no feedback trigger.
- Confirmed no new modal copy is hardcoded in touched PHP templates.
- `git diff --check` passed.

Node.js was unavailable, so JavaScript received manual syntax review rather than `node --check`. Browser interaction and live WordPress AJAX testing were not available in this terminal session.
