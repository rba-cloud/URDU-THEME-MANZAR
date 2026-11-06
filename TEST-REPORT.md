# Manzar News — Phase 1 test report

Validation date: 6 November 2026. No live deployment performed.

## Environment

- WordPress **6.9**, official WordPress GitHub release archive.
- PHP **8.3** through WordPress Playground CLI **3.1.62**, with its SQLite integration.
- Headless Chromium through Playwright, desktop and mobile viewports.
- Test-only WordPress installations and validation tools were kept outside the theme and final archive.
- RTL checks used a local Urdu locale/direction fixture. The full WordPress Urdu translation pack was not installed; English core labels/dates in the test fixture are not a claim of Urdu translation coverage.

## Passed

- WordPress recognized Manzar News as a block theme, with no theme metadata errors.
- Initial empty site rendered honest no-results states; the theme requires no demo import.
- Nine clearly fictional demo posts, nine categories, three local PNG media attachments, and a native editable navigation were imported by the optional CLI importer. Repeating the importer left the post and media counts unchanged (9 and 3).
- Urdu navigation labels serialize and render correctly, including after correcting JSON escaping during development.
- A newly published test article appeared automatically in homepage/latest feeds and its category archive.
- All five default category sections populated with their corresponding category stories. The default filtering issue found during validation was corrected and retested.
- Article, category, tag, search-results, and 404 requests returned their expected content; the missing article request returned HTTP 404.
- Native homepage pagination returned a different set of articles.
- Related articles use the current article's categories and exclude the current article URL. Sharing produced three links.
- Missing-featured-image articles remained readable without layout overflow.
- Homepage and single-article layouts had no horizontal document overflow at 320, 390, 768, 1024 and 1440 pixels. Final outer-spacing changes were rechecked at all five widths on the homepage.
- Native mobile navigation opened and closed with Escape.
- Site Editor loaded. All 10 templates, all three template parts and all eight patterns parsed as valid WordPress editor blocks, with zero invalid blocks. Final footer changes were included in the last validation.
- Header and footer content was edited and saved through WordPress's native template-part API, verified on the frontend, then restored. Advertising groups are native editable blocks and were included in block validation.
- No browser JavaScript errors or failed CSS/JS/image/font requests were observed in the full functional browser check.
- All 10 PHP files passed PHP parser syntax validation; editor JavaScript passed `node --check`. PHP callbacks and patterns were also exercised by the running WordPress instance.
- `theme.json`, demo JSON and WXR XML parsed successfully. The WXR contains nine demo posts.
- Archive CRC validation and byte-for-byte comparison with all 35 source files passed. The archive contains only the `manzar-news/` directory, without development tools or caches.

## ZIP installation

The final `manzar-news.zip` was uploaded through the native WordPress dashboard in a fresh disposable WordPress 6.9 instance, installed successfully, activated, and its homepage and header rendered successfully. Earlier reinstall attempts hit stale filesystem state in a reused Playground instance; the fresh-instance final-archive check passed.

## Remaining limitations / untested checks

- The supplied Jameel Noori Nastaleeq TTF is now bundled unchanged and registered locally through WordPress Font Face support. The original WordPress checks and included screenshot preceded the font upload and used browser-local fallback typography. Full WordPress and cross-browser visual checks with the newly supplied font remain to be repeated. Font rights are separate from theme code.
- The dashboard WXR importer path was not run; its XML structure was validated. The optional local CLI importer was executed and checked for repeatability.
- Firefox, Safari, physical mobile devices, a full screen-reader audit, production MySQL/MariaDB hosting and WordPress versions other than 6.9 were not tested.
- Real third-party share submission, paid ad integrations, email delivery, analytics and future editorial/AI plugins were not tested or implemented.
- Site-specific logo, contact details, social destinations, editorial copy, menus and licensed images must be configured by the administrator before publication. No SEO rank or performance-score guarantee is made.

## Archive

`manzar-news.zip` version 1.0.1: 36 files, 9,066,390 bytes.

SHA-256: `af1ccc883dd1f13454627705e69ced2cd94696ced433ba7cfe4948549eebc88f`

See `manzar-news/README.md` for installation, customization, category filters, advertisements, font integration, optional demo imports and ZIP export instructions.

## Supplied-font follow-up

The uploaded TTF was verified as Jameel Noori Nastaleeq, included byte-for-byte unchanged, and loaded successfully in a local Chromium font specimen at 390px and 1440px. The specimen showed no horizontal overflow. This follow-up is distinct from the earlier full WordPress validation. The regenerated archive passed CRC validation and contains the exact supplied font.

## Version 1.0.1 font-registration regression

Removed the PHP filter that indexed normalized fontFamilies as a flat list, causing missing-slug warnings after the supplied font was added. Registered the bundled font directly in the source theme.json font family instead. Verified in WordPress 6.9/PHP 8.3 with WP_DEBUG enabled: no PHP warning output, successful HTTP 200 font request, actual Jameel Noori Nastaleeq face loaded, no browser JavaScript errors, and no horizontal overflow at 390px and 1440px. Rebuilt archive passes CRC and byte-for-byte source matching.
