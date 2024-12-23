Changelog
=========
## 1.0.9 (23/12/2024)
- Enh #59: update theme while clicking (removes the full page reload)
- #60: Update module image
- Update URL to documentation

## 1.0.8 (19/06/2024)
- Fix colors of new search in HumHub 1.16
- Fix colors of default button in HumHub 1.16

## 1.0.7 (9/5/2024)
- Update styles for HumHub 1.16
- Enh: controller access rules

## 1.0.6 (11/03/2024) 
- Fix #49: module update with error logged when module is inactive
- Fix #51: let guests access the modal window (bug since v1.0.4)
- Enh #53: delete cached settings on deactivation

## 1.0.5 (23/1/2024)
- Fix #47: wrong message category of save button

## 1.0.4 (13/1/2024)
- Enh #43: use static page instead of modal window in account settings
- Enh: Configuration Page: add link to [Guide for Administrators](https://community.humhub.com/u/felixhahn/wiki/Dark+Mode+-+Guide+for+Administrators)
- Themes: small color issues (tables, code in posts and comments)

## 1.0.3 (23/12/2023)
- Fix #38: broken path aliases on Windows
- DarkEnterprise #40: small color issue in top bar and space dropdown menu
- Themes #42: small color issues with external modules (Tasks, Wiki)

## 1.0.2 (04/12/2023)
- Themes: #34 fix background color in Markdown Editor
- Themes: #35 fix small color issues (audio player, color, icon and date pickers)

## 1.0.1 (22/11/2023)
- Themes: #31 fix introduction tour
- Themes: #29 small color issues with external modules (Custom Pages, External Calendar)

## 1.0.0 (14/11/2023)
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
