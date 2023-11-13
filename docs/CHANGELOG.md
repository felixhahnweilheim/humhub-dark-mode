Changelog
=========

## TBA
- Enh: #27 Admin configuration page: added links to Github repository and Donate link
- Enh: #22 Make top bar button optional and add dark Mode setting to Account Menu > General
- Enh: #15 clear theme setting when base theme is changed via UI (also see Fix #23: Crash on theme changing)
- Enh: #15 cache theme setting
- Themes: #17 fix button color in Marketplace
- Themes: #21 small color updates (left border in dropdown menus, Tasks Module: checklist hover)
- Themes: #22 small color updates (account menu)
- Themes: #26 small color update (scroll down arrow in Messenger)

## 1.0.0-beta4 (31/8/2023)
- Enh: only show dark themes in configuration page
- Enh: make options in admin page clearer (and remove recommandation)
- Enh: support themes with dark.css
- Themes: move DarkHumHub to resources
- Themes: reduce CSS file size (only color rules)
- Themes: small color updates (borders, Prosemirror editor, form controls, ...)

## 1.0.0-beta3 (4/8/2023)
- Enh: Compatibility with Enterprise Theme
- allow empty module setting & log error if asset cannot be registered
- HumHub minVersion: 1.15
- DarkHumHub: CSS compiled with HumHubb 1.15
- DarkHumHub: updated color text-color-soft3

## 1.0.0-beta2 (25/7/2023)
- [#7](https://github.com/felixhahnweilheim/humhub-dark-mode/pull/7) Replaced cookies with session and small fixes
- Additionally save setting as user setting to database (if logged in)
- Add option "Follow system" as default
- Make dark theme selectable by administrators (configuration page added)
- Move stylesheet into new "DarkHumHub" theme (taken by default)
- Theme: add "!important" for external modules CSS
- Theme: white text in primary buttons
