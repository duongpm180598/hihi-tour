# Implementation Plan: Itinerary Download Feedback Pop-up

## Goal

Show a bilingual feedback modal after a visitor starts downloading a real itinerary file on any destination page.

The modal asks which destination should be covered next:

- Nha Trang
- Phu Yen
- Thailand

Choices must be easy to replace later without rewriting modal markup or JavaScript.

## Required User Review

> [!IMPORTANT]
> Browsers do not expose a reliable event for “file download fully finished.” The modal will open shortly after the browser accepts the itinerary download click. The file download itself will continue normally.

Recommended vote behavior:

- Submit votes anonymously through WordPress AJAX.
- Store aggregate counts in one WordPress option.
- Show totals in a small WordPress dashboard widget.
- Prevent repeat voting in the same browser for the current option set with `localStorage`.
- Do not collect names, email addresses, IP addresses, or other personal data.
- Allow dismissing the modal without voting.

Only real itinerary file links will trigger the modal. Existing “coming soon” buttons will not trigger it because no download occurs.

## Open Questions

- Is aggregate vote storage in WordPress and a dashboard totals widget approved?
- Should the modal appear after every download when the visitor dismisses it, or only once per browser? Recommended: show again after dismissal, but stop showing after a successful vote for the current option set.
- Should “Phu Yen” display as “Phu Yen” in English and “Phú Yên” in Vietnamese? Recommended: yes.

## Proposed Changes

### [NEW] `components/itinerary-feedback-modal.php`

- Render one shared dialog near the footer so all templates can use it.
- Load all visible copy from `load_lang()`.
- Render the choices from one flat configuration array.
- Include:
  - dialog title and description
  - three radio-style destination choices
  - submit button
  - close button and accessible close label
  - success and error messages
- Escape all labels and attributes.
- Use `role="dialog"`, `aria-modal`, focus management hooks, and keyboard-safe controls.

### [MODIFY] `footer.php`

- Include the shared feedback modal once before `wp_footer()`.
- Do not duplicate modal markup in destination templates.

### [MODIFY] `functions.php`

- Define the stable feedback option IDs and localized labels.
- Pass AJAX URL, nonce, option-set version, and modal settings to `assets/js/main.js` with `wp_localize_script()`.
- Add logged-in and logged-out AJAX handlers.
- Validate the nonce and sanitize the submitted option ID.
- Reject IDs outside the configured allowlist.
- Increment aggregate counts in a dedicated WordPress option.
- Add an admin dashboard widget showing vote totals.
- Keep storage anonymous and aggregate-only.

Suggested stable IDs:

```php
[
    'nha-trang',
    'phu-yen',
    'thailand',
]
```

Changing options later requires updating the configured IDs, both locale files, and the option-set version.

### [MODIFY] `assets/js/main.js`

- Use delegated click handling for real itinerary links marked with a shared data attribute.
- Let the browser begin the file download, then open the modal after a short delay.
- Do not trigger for placeholder or “coming soon” buttons.
- Support:
  - close button
  - backdrop click
  - Escape key
  - focus trap and focus restoration
  - submit loading state
  - AJAX success/error states
- Save the current option-set version in `localStorage` after successful voting.
- Skip future prompts for that browser until the option-set version changes.
- Fail safely if storage is unavailable.

### [MODIFY] Destination Templates With Real Downloads

Current real download links found in:

- `ha-giang-tour.php`
- `hue-tour.php`
- `ninh-thuan.php`
- `taiwan.php`

Changes:

- Add a shared attribute such as `data-itinerary-download` to real itinerary file links.
- Keep native `href` and `download` behavior unchanged.
- Do not mark “coming soon” buttons in `mu-cang-chai.php`.
- Scan all destination templates again during implementation so any additional real download link is covered.

Future pages can opt in by adding the same attribute to their itinerary download link.

### [MODIFY] `style.css`

- Add isolated modal styles with an `itinerary-feedback` prefix.
- Match the theme colors and typography.
- Provide responsive mobile layout, visible focus states, selected-choice state, loading state, and reduced-motion behavior.
- Avoid editing generated Tailwind output.

### [MODIFY] `lang/en.json`

Add shared keys under `global`, following the required key format:

- `feedback_modal_0_title`
- `feedback_modal_0_description`
- `feedback_modal_0_option_0_label`
- `feedback_modal_0_option_1_label`
- `feedback_modal_0_option_2_label`
- `feedback_modal_0_submit_label`
- `feedback_modal_0_close_label`
- `feedback_modal_0_success_message`
- `feedback_modal_0_error_message`

### [MODIFY] `lang/vi.json`

Add matching Vietnamese keys with the same structure.

### [NEW AFTER APPROVAL] `task.md`

Replace the previous completed checklist with the execution checklist for this feature.

### [UPDATE AFTER IMPLEMENTATION] `walkthrough.md`

Document changed files, behavior, storage format, and verification results.

## Verification Plan

Automated/static checks:

- Parse `lang/en.json` and `lang/vi.json`.
- Run PHP lint on:
  - `functions.php`
  - `footer.php`
  - `components/itinerary-feedback-modal.php`
  - every touched destination template
- Run JavaScript syntax check if Node is available.
- Search touched templates for new hardcoded visible strings.
- Confirm every real itinerary download link has the trigger attribute.
- Confirm placeholder buttons do not have it.
- Run `git diff --check`.

Behavior checks:

1. Click a real XLSX itinerary link and confirm the download still starts.
2. Confirm the modal opens shortly afterward.
3. Submit each valid option and confirm the count increments.
4. Submit an invalid option directly and confirm the server rejects it.
5. Confirm successful voters do not see the same option-set prompt again.
6. Change the option-set version and confirm the prompt becomes eligible again.
7. Confirm dismissing without voting allows a later download to show the modal again.
8. Test close button, backdrop, Escape, Tab focus, and focus restoration.
9. Test English and Vietnamese copy.
10. Confirm dashboard totals display for administrators.

## Risks

- Download completion cannot be detected reliably; the trigger is download initiation.
- Several destination templates currently point to the same Ha Giang XLSX file. This feature will preserve existing file behavior and will not correct itinerary file content unless separately requested.
- Client-side repeat prevention is convenience, not fraud prevention. Clearing browser storage allows another vote.
- WordPress option updates can theoretically race under very high simultaneous traffic. Current site scale likely makes aggregate option storage sufficient; a custom database table would be excessive for three simple choices.
