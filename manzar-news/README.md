# Manzar News — منظر نیوز

A native WordPress block theme for an Urdu newspaper. Requires WordPress 6.7+ and PHP 8.0+. No page builder or frontend JavaScript dependency. Theme code is GPL-2.0-or-later.

## Update from 1.0.0

Version 1.0.1 fixes PHP “Undefined array key slug” warnings and registers the supplied font directly in theme.json. Upload the new ZIP in Appearance → Themes → Add New → Upload Theme, then choose Replace current with uploaded. Clear any page cache and refresh. Set Settings → General → Site Language to اردو for native RTL layout, and set Site Title to منظر نیوز. The theme does not automatically replace your existing posts; import the optional demo XML below to populate the news sections.

## Install

Upload **manzar-news.zip** in **Appearance → Themes → Add New → Upload Theme**, install and activate. The ZIP contains one `manzar-news/` directory. Set **Settings → General → Site Language** to **اردو**, the site title to **منظر نیوز**, tagline to **ہر خبر، ہر منظر**, and the appropriate timezone. WordPress then supplies RTL direction and translated dates; the theme does not force Urdu on an English admin/site.

The dedicated Front Page template supplies the newspaper homepage. Keep “Your latest posts” in Settings → Reading, or select a published static homepage; both use the Front Page template. For a separate latest-news page, publish an empty page and select it as Posts page in Reading settings. Its Home template has native pagination. The homepage latest-news query also has its own pagination; other homepage sections stay independently curated.

## Site Editor and publishing

Use **Appearance → Editor** for templates, styles, navigation, template parts and patterns. Header, footer, sidebar, ads, typography, colors and all homepage sections are editable. Select blocks using List View. Edit Site Title and Site Logo for branding. The masthead follows the configured site title. Date and sharing blocks have editor representations; their final output is generated on the frontend. Sharing links open the user's chosen service only when clicked; no tracking scripts are loaded.

Create articles with native Posts, categories, tags, featured images and authors. Scheduling, revisions, media and search use WordPress core. Create categories with these default slugs to populate the five homepage sections automatically:

| Section | Default slug |
| --- | --- |
| پاکستان | `pakistan` |
| عالمی خبریں | `world` |
| کھیل | `sports` |
| کاروبار | `business` |
| ٹیکنالوجی | `technology` |

Alternatively select each section's **Query Loop → Filters → Categories** in the Site Editor and choose any category. Explicit selections take precedence. A missing default category displays an honest empty state, never unrelated articles. The lead story shows the newest post; secondary cards skip that first post. Latest news deliberately includes those stories too. Related articles share the current article's categories and exclude the current article. The sidebar's editor-selection area is manual; no view tracking or popularity is claimed.

The header Navigation block uses WordPress's native menu selection and responsive overlay. Select/create its navigation in the editor and add Category, Page or Custom Link blocks (including a link to your latest-news page). On an empty site WordPress falls back to published pages. Demo import can create an editable category menu. Footer links, contact copy and social links are placeholders: replace them with real information before publication. Add a Categories List block to the footer if desired.

## Advertising

Find the dashed **اشتہار** groups in header, below navigation, homepage, sidebar, article and footer. Replace their text with an Image block linked to your destination, native blocks, or Custom HTML where your WordPress permissions permit. Delete the group to remove a placement. The reusable Advertisement pattern can be inserted anywhere, including between article paragraphs in the post editor. The article template's default placement is after Post Content, so the theme never injects ads into editorial paragraphs.

## Supplied Urdu font

The supplied **Jameel Noori Nastaleeq.ttf** is bundled unchanged as `assets/fonts/jameel-noori-nastaleeq.ttf`. WordPress Font Face support registers it locally with `font-display: swap` in the frontend and editor. Browser-local fallbacks remain available during loading. No external font requests are made. Font rights remain with their respective owner; the theme GPL license does not relicense this supplied font.

## Optional fictional demo content

Nothing imports automatically on activation. All demo stories are explicitly labeled **[ڈیمو]** and are fictional, dated samples, not current reporting. Original neutral geometric illustrations represent no real event or person.

- Dashboard: **Tools → Import → WordPress** (install the official importer), select `demo-content/manzar-demo.xml`, and map the author. This imports nine fictional posts and categories, with no remote media dependency. Set featured images manually from `assets/images/` through the Media Library.
- Local WP-CLI: run `wp eval-file wp-content/themes/manzar-news/demo-content/import.php` from your WordPress root. This imports categories, nine stories, local PNG featured images and an editable category navigation. It skips existing story slugs on repeated runs and leaves existing site settings and articles untouched. Do not use both methods unless you understand WordPress import deduplication. If a menu already exists, choose the demo menu in the header Navigation block yourself.

Delete demo posts/media/menu when finished; remove unused categories only after confirming no real stories use them. The site works with no demo content, absent images or empty categories.

## Development / export

Work in this existing checkout; each cloud task is already isolated, so a worktree is unnecessary. Theme files are under `manzar-news/`. No compile/build step is needed. Install in a local WordPress instance and test with WordPress debug logging enabled. No secrets or application environment variables are required by the theme. Never deploy changes to a live publication as part of local testing.

From the repository root, create the archive with Python:

```sh
python3 - <<'PY'
from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED
with ZipFile('manzar-news.zip', 'w', ZIP_DEFLATED) as archive:
    for path in sorted(Path('manzar-news').rglob('*')):
        if path.is_file():
            archive.write(path, path.as_posix())
PY
```

See the repository-level `TEST-REPORT.md` for actual checks and limitations. Future AI/editorial integrations and view tracking belong in separate plugins. No such services are included in Phase 1.
