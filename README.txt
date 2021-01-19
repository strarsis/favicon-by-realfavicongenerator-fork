=== Favicon by RealFaviconGenerator ===
Contributors: phbernard
Donate link: http://realfavicongenerator.net/donate
Tags: favicon, favicon icon, favicon image, favicon code, favicon change, favicon manager, short icon, addressbar logo, apple touch icon, icon, iphone, admin, wordpress, realfavicongenerator, real favicon generator
Requires at least: 3.5
Tested up to: 5.6
Stable tag: 1.3.20
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create and install your favicon for all platforms: PC/Mac, iPhone/iPad, Android devices, Windows 8 tablets...

== Description ==

Generate and setup a favicon for desktop browsers, iPhone/iPad, Android devices, Windows 8 tablets and more. In a matter of seconds, design an icon that looks great on all major platforms.

Favicon is not just a single `favicon.ico` file dropped in the middle of your site. Nowadays, with so many different platforms and devices, you need a bunch of pictures to get the job done. With RealFaviconGenerator, generate all the icons you need for desktop browsers, iPhone/iPad, Android devices, Windows 8 devices, and more.

iOS devices use a high resolution Apple touch icon to illustrate bookmarks and home screen shortcuts. A first generation iPhone needs a 57x57 picture, whereas a brand new iPad with Retina screen looks for a 152x152 picture. Android Chrome also use these pictures if it finds them. Windows 8 takes another route with a dedicated set of icons and HTML declarations.

Favicon is not only a matter of pictures with different resolutions. The various platforms coms with different UI guidelines. For example, the classic desktop favicons often use transparency. But iOS requires opaque icons. And Windows 8 has its own recommendations.

Save hours of research and image edition with RealFaviconGenerator and its companion plugin. In a matter of seconds, you setup a favicon compatible with:

-  Windows (IE, Chrome, Firefox, Opera, Safari)
-  Mac (Safari, Chrome, Firefox, Opera, Camino)
-  iOS (Safari, Chrome, Coast)
-  Android (Chrome, Firefox)
-  Surface (IE)
-  And more

We take compatibility very seriously. See http://realfavicongenerator.net/favicon_compatibility for the full list.

** Localization **

* English (`en_EN`) by [Philippe Bernard](http://realfavicongenerator.net/)
* French (`fr_FR`) by [Philippe Bernard](http://realfavicongenerator.net/)
* Swedish (`sv_SE`) by [Linus Wileryd](https://twitter.com/wileryd)
* Brazilian Portuguese (`pt_BR`) by Marcelo Volgarini, [Criação de Sites](http://www.techload.com.br/criacao-de-sites-ribeirao-preto)
* Dutch (`nl_NL`) by [Axel Vanderhaeghen](https://eco13.eu)
* Danish (`da_DK`) by [Alexander Leo-Hansen](http://alexanderleohansen.dk/)
* Czech (`cs_CZ`) by an anonymous translator
* Polish (`pl_PL`) by [Maciej Gryniuk](http://maciej-gryniuk.tk/)
* Russian (`ru_RU`) by Natasha Diatko, [UStarCash](https://www.ustarcash.com)
* Indonesian (`id_ID`) by [Jordan Silaen](https://www.chameleonjohn.com/)

[](http://coderisk.com/wp/plugin/favicon-by-realfavicongenerator/RIPS-TVYsdQTMAr)

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'Favicon by RealFaviconGenerator'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard
5. Navigate to the 'Favicon' entry in the Appearance menu
6. Select a master picture from the Media Library (optional)
7. Click the 'Generate Favicon' button and follow the instructions.

= Using FTP =

1. Download `favicon-by-realfavicongenerator.zip`
2. Extract the `favicon-by-realfavicongenerator` directory to your computer
3. Upload the `favicon-by-realfavicongenerator` directory to the `/wp-content/plugins/` directory
4. Activate the plugin on the Plugin dashboard
5. Navigate to the 'Favicon' entry in the Appearance menu
6. Select a master picture from the Media Library (optional)
7. Click the 'Generate Favicon' button and follow the instructions.

== Screenshots ==

1. Initial favicon setup screen. You are invited to setup your favicon.
2. Select a master picture from the Media Library (optional)
3. Once you hit the Generate Favicon button, you are redirected to <a href="http://realfavicongenerator.net/">RealFaviconGenerator</a>,
where you can design your favicon: adding a background to your iOS picture, using a saturated version of your master picture for Windows 8...
4. When you are done with the favicon editor, you are redirected to the WordPress Dashboard. The favicon is installed automatically.
This screen presents you a preview of the favicon you various platforms, so you know how your blog looks like on various platforms.
5. You can also trigger RealFaviconGenerator's favicon checker, to make sure your favicon is correctly setup.

== Changelog ==

= 1.3.20 =

- Fix: media selection works again
- Plugin was tested up to WordPress 5.6

= 1.3.19 =

- Plugin was tested up to WordPress 5.5.3

= 1.3.18 =

- Remove reference to deprecated function screen_icon
- Plugin was tested up to WordPress 5.4

= 1.3.17 =

- Changes to clear security warnings from CodeRisk

= 1.3.16 =

- Plugin was tested up to WordPress 5.3.2

= 1.3.15 =

- Plugin was tested up to WordPress 5.1

= 1.3.14 =

- Plugin was tested up to WordPress 5.0-beta5

= 1.3.13 =

- Plugin was tested up to WordPress 4.9.7

= 1.3.12 =

Never published, no change

= 1.3.11 =

- id/ID translation added, thanks to Jordan Silaen
- Plugin was tested up to WordPress 4.8.1

= 1.3.10 =

- Always access RealFaviconGenerator via HTTPS
- Clarification in local path separators for Windows
- Plugin was tested up to WordPress 4.7.1
- Notice to ask administrator to not deactivate the plugin

= 1.3.9 =

- Plugin was tested up to WordPress 4.7

= 1.3.8 =

- Plugin was tested up to WordPress 4.6

= 1.3.7 =

- Fix: Plugin keywords rephrased (some were not taken into account).

= 1.3.6 =

- Fix: the icons path was sometimes wrong when the upload directory was the root directory

= 1.3.5 =

- pl/PL translation added, thanks to Maciej Gryniuk
- ru/RU translation added, thanks to Natasha Diatko

= 1.3.4 =

- Plugin was tested up to WordPress 4.5

= 1.3.3 =

- Deactivate debug logs

= 1.3.2 =

- Typos in French translations
- Warning fix for PHP7
- Tested up to WordPress 4.4.1
- cs/CZ translation added, thanks to an anonymous translator

= 1.3.1 =

- Hotfix in previous version.

= 1.3.0 =

- The plugin takes advantage of RealFaviconGenerator's non-interactive API to upgrade the favicon automatically whenever a new version is available.

= 1.2.15 =

- Donation link added.
- Plugin now works when access to file system is via FTP (not direct). See https://wordpress.org/support/topic/no-images-created

= 1.2.14 =

- Security improvement.
- Warning fix regarding NONCE_ACTION_NAME.
- Useless PHP closing tags removed.
- Error checking added to favicon package unzipping.

= 1.2.13 =

- XSS vulnerability fixed, reported by [Kacper Szurek](http://security.szurek.pl/)

= 1.2.12 =

- Performance improvements: favicon update checking is now done in the Admin section (not the Public section), locales are not loaded in the Public section anymore.
- Take advantage of the Rewrite API (when available) to make the files appear to be in the root directory. So http://example.com/favicon.ico works (eg. when requested by Yandex).
- nl/NL translation added, thanks to Axel Vanderhaeghen.

= 1.2.11 =

- When the admin's browser cannot get the picture selected from the Media Library, the UI fails gracefully.
- Favicon package unzipping is more robust.
- Notice to ask users to rank the plugin on WordPress.org.

= 1.2.10 =

- Warning fix when used with BuddyPress (bp_setup_current_user). See https://wordpress.org/support/topic/wp_debug-notice-for-bp_setup_current_user.

= 1.2.9 =

- When selected from the Media Library, the master picture is now retrieved by WP administrator's browser to prevent several issues (locally hosted blogs, blogs protected in a way or another, etc.).

= 1.2.8 =

- Plugin successfully tested against WordPress 4.1.

= 1.2.7 =

- Fix for WordPress sites hosted on Windows.

= 1.2.6 =

- The plugin is now compatible with multisite.

= 1.2.5 =

- Fix for login page: favicon code was not injected in this particular page.

= 1.2.4 =

- Remove debug messages to avoid false positives in error log.

= 1.2.3 =

- Update notifications can be dismissed once for all.
- New Settings page to enable/disable update notifications.

= 1.2.2 =

- Fix for the 403 issue with HostGator hosting service (http://wordpress.org/support/topic/403-error-when-generating-favicon).

= 1.2.1 =

- Fix in plugin removal and update checking.

= 1.2.0 =

- The plugin now warns the user when RealFaviconGenerator was updated and the favicon should be generated again.

= 1.1.1 =

- Rewrite API usage disabled. Favicon files do not appear to be in the root directory of the blog anymore.

= 1.1.0 =

- Run RealFaviconGenerator's favicon checker from the admin interface.

= 1.0.7 =

- Deactivate default Genesis favicon when one is configured in FbRFG.

= 1.0.6 =

- Error management improved during favicon install.

= 1.0.5 =

- Do not try to rewrite the favicon files URL when .htaccess is not writable.

= 1.0.4 =

- Option to not rewrite the favicon files URL, even when this is possible.

= 1.0.3 =

- Plugin code syntax changed to fit older versions of PHP.

= 1.0.2 =

- Callback URL was too long for some servers. It has been shorten.

= 1.0.1 =

- Favicon admin settings are now in the Appearance menu.
- Fix in favicon package download.
- Fix in error management during favicon installation.

= 1.0 =

Initial version.
