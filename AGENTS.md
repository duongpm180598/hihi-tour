# Codex Project Automation

Apply these workspace rules for all work in this theme.

## Language File Organization

- Store all user-facing text in `/Applications/XAMPP/xamppfiles/htdocs/hihi-tour/wp-content/themes/hihi-tour/lang/`.
- Keep English text in `lang/en.json` and Vietnamese text in `lang/vi.json`.
- Do not hardcode new user-facing strings in PHP templates.
- Organize translation keys by page or section using nested objects.
- Use key format `{section}_{element}_{index}_{property}`.
- Add every new text key to both language files before using it in templates.
- Use `global` for shared UI, navigation, buttons, footer text, and reusable strings.
- Use page-specific objects for unique hero text, location content, highlights, FAQs, and page-only copy.
- Before finishing any PHP template change, scan touched templates for new hardcoded user-facing strings.
- If new visible text, alt text, aria labels, labels, captions, modal text, or JavaScript-rendered UI text appears, move it into `lang/en.json` and `lang/vi.json` in the same change.
- Do not use `$current_lang === 'en' ? ... : ...` for user-facing copy. Use language keys from `load_lang()` instead.
- Validate both language files after edits and run `php -l` on every touched PHP template.

## PHP And Planning Mode

- For simple one-off fixes, implement directly.
- For major architecture changes, complex refactors, large-scale string extraction, extensive research, significant ambiguity, or deviation from an approved plan, stop and create `implementation_plan.md` first.
- Planning workflow:
  1. Research the codebase before editing.
  2. Draft `implementation_plan.md` with goal, required user review, open questions, proposed file changes, and verification plan.
  3. Wait for explicit user approval before source edits.
  4. After approval, create `task.md` as a checklist and execute.
  5. Verify with appropriate checks such as `php -l`, then create `walkthrough.md`.
- Follow WordPress theme standards, security escaping and sanitization, SEO, performance, flat data, early returns, and one job per function.

## Caveman Communication Mode

- Caveman mode is active after any activation prompt and remains active for every later response.
- Activation prompts include `/caveman`, `caveman mode`, `talk like caveman`, `/caveman lite`, `/caveman full`, `/caveman ultra`, and `/caveman wenyan`.
- Do not auto-disable caveman mode between turns, after task completion, after context compaction, or when switching task types.
- Default active style: terse, direct, technical.
- Drop filler and unnecessary preamble.
- Implement first, then report concise result.
- Keep code, commits, PRs, and deliverables normal.
- User can disable with `stop caveman`, `normal mode`, or `talk normally`.
- User can re-enable with `/caveman`, `caveman mode`, or `talk like caveman`.
