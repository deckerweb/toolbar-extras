# Toolbar Extras for Elementor

**General Info**

* [Plugin's own website: toolbarextras.com](https://toolbarextras.com/)
* [Plugin page on WordPress.org: wordpress.org/plugins/toolbar-extras/](https://wordpress.org/plugins/toolbar-extras/)
* [Translate the plugin](https://translate.wordpress.org/projects/wp-plugins/toolbar-extras)
* [**Donate** for the further development & support of the plugin](https://www.paypal.me/deckerweb)
* [Plugin's documentation & knowledge base](https://toolbarextras.com/docs/)
* [Plugin's public roadmap (Trello Board)](https://toolbarextras.com/go/public-roadmap/)

## Changelog of the Plugin

### 1.3.4 - 2018-08-30

* New: Added `composer.json` file to the plugin's root folder - this is great for developers using Composer
* New: Added `README.md` file for plugin's GitHub.com repository to make it more readable there
* New: Added plugin update message also to Plugins page (overview table)
* Tweak: Enhanced "WP-Staging" plugin support - added dynamic list of staging clones, plus, added support for "WP-Staging Pro" version
* Tweak: Enhanced "JetEngine" plugin support - which is out of beta now! (added Meta Boxes)
* Tweak: For "WP Schema Pro" plugin support - respect the advanced setting of menu position (dynamic)
* Tweak: Improved plugin compatibility with sister-plugin "Multisite Toolbar Additions"
* Tweak: Added plugins recommendations library by deckerweb to improve the plugin installer tips (old filter function got removed)
* Tweak: Enhanced, improved and corrected Readme.txt file here
* Tweak: Updated `.pot` file plus all German translations (formal, informal) and language packs


### 1.3.3 - 2018-08-08

* New: Verified support for Business accounts on WordPress.com platform which support installation of other plugins (like Toolbar Extras) - [check the full tutorial on our plugin website](https://toolbarextras.com/docs/how-to-use-toolbar-extras-plugin-on-wordpress-com/)
* Tweak: Improved and corrected Readme.txt file here
* Fix: Respect namespaced classes in "PowerPack Elements" plugin support for their v1.3.4+ release


### 1.3.2 - 2018-07-29

* New: Added "Elements" to the "GeneratePress" Theme support for the Premium Add-On v1.7 or higher (including backwards compat for Page Headers and Hooks)
* New: First few features & tweaks to support the Block Editor (known as "Gutenberg") which is planned for upcoming WordPress 5.0: if "Gutenberg" plugin is active offer an "Editor switch" between "Block Editor" (Gutenberg) and "Classic Editor" when editing any post type content (which in general needs to have post type support for the Editor) -- Please Note: these features are currently only available with `define( 'TBEX_USE_BLOGK_EDITOR_SUPPORT', FALSE );` - support in plugin's settings comes with next major version!
* New: Finally, complete translation of the German plugin page on WordPress.org: [https://de.wordpress.org/plugins/toolbar-extras/](https://de.wordpress.org/plugins/toolbar-extras/) - this translation will also be maintained from now on (note: it can only be in informal German, which is the guideline set by the platform)
* Tweak: On Plugin's settings page, About & Support, enhanced optional System Info
* Tweak: Improved Theme support for "GeneratePress" Theme and its Premium Add-On Plugin
* Tweak: Greatly enhanced plugin support for "Genesis Design Palette Pro"
* Tweak: Added 2 new template types (Single, Archive) to "Jet Theme Parts" template creation - part of the "JetThemeCore" plugin support
* Tweak: Enhanced Astra (Pro) Theme support - Customizer deep links for layouts modules of WooCommerce, LifterLMS, LearnDash
* Tweak: Greatly enhanced plugin support for "Premium Addons for Elementor", plus, added support for their brand new Pro version! -- Note: From now on only the free version 2.5.0 or higher is supported!
* Tweak: Enhanced "Element Pack" plugin support - new settings and resources link
* Tweak: Improved "Genesis Testimonial Slider" plugin support
* Tweak: Once again enhanced "Gravity Forms" plugin support
* Tweak: Enhanced "Duplicator" plugin support (free version)
* Tweak: Added new resources for "Health Check & Troubleshooting" plugin support
* Tweak: Added new resource to "Essential Addons" plugin support
* Tweak: A lot of smaller code improvements, tweaks and fixes
* Tweak: Enhanced, improved and corrected Readme.txt file here - also tweaked formatting/ listing of the included changelogs to improve with translated versions of the readme (WordPress.org Rosetta sites)
* Tweak: Updated `.pot` file plus all German translations (formal, informal) and language packs, including fixes for some translations errors
* Fix: CSS styling for Edit/View Customizer sub-item for singular posts/ post types
* Fix: Proper conditional loading for "Home Page Banner for Astra Theme" plugin support
* Fix: Proper plugin support for "AnyWhere Elementor Pro" Add-On
* Fix: Correct resource link for "UpdraftPlus" plugin support
* Fix: Corrected plugin support for "Health Check & Troubleshooting"
* Fix: Corrected errors in readme.txt here :)
* **New:** *Extended and Enhanced Multisite Support*
  * Multisite is now a "first-class citizen" within Toolbar Extras - this is the begin of prerequisites for a future Multisite Add-On!
  * Added specific support for Network-wide activation on Multisite installs - this then creates the proper plugin defaults on a per site basis
  * Added routine for Multisite installs which have Toolbar Extras plugin activated Network-wide to create the plugin defaults when creating a new Site in the Network
  * Build Group: will no longer appear in Network Admin - as it should have never appeared there (wrong behavior finally fixed!)
  * Site Group: links that don't belong into the Network Admin will no longer appear there
  * User Group: make the items respect Network Admin context
  * Tweak: Made "WP Migrate DB (Pro)" plugin support fully compatible with Multisite (plugin activated Network-wide)
  * Tweak: Made "Local Development" plugin support compatible with Multisite
  * Tweak: Made "GitHub Updater" plugin support compatible with Multisite
* **New:** *Extended the Theme support for:*
  * Niche Pro (Child Theme for Genesis) (Premium, by Design by Bloom)
  * Lifestyle Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Aspire Pro (Child Theme for Genesis) (Premium, by Appfinite)
  * Atmosphere Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Digital Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Executive Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Gallery Pro (Child Theme for Genesis) (Premium, by Design by Bloom)
  * Maker Pro (Child Theme for Genesis) (Premium, by JT Grauke/ Design by Bloom)
  * Market Theme (Child Theme for Genesis) (Premium, by Restored 316 Designs // Lauren Gaige)
  * Metro Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Showcase Pro (Child Theme for Genesis) (Premium, by Design by Bloom)
  * Smart Passive Income Pro (Child Theme for Genesis) (Premium, by StudioPress)
* **New:** *Extended the Plugin support for Elementor Add-Ons:*
  * Split Test For Elementor (free, by Rocket Elements)
  * JetEngine (Premium, by Zemez/ CrocoBlock) - note: plugin is currently in beta
  * Natalie - Personal Theme Builder for Elementor (Premium, by XLDevelopment/ Ashraf)
  * Dashboard Welcome for Elementor (free, by IdeaBox Creations)
  * Massive Addons for Elementor (free, by Blocksera)
  * Dynamic Content for Elementor (Premium, by Dynamic.ooo)
  * Premium Addons PRO (Premium, by Leap13) - the paid Pro Add-On for "Premium Addons for Elementor"
  * Vakka Addons for Elementor (Premium, by MaxxTheme)
  * Funnelmentals (free, by Web Disrupt)
  * Funnelmentals Premium (Premium, by Web Disrupt)
  * Rife Elementor Extensions & Templates (free, by Apollo13 Themes)
* **New:** *Extended the general Plugin support for:*
  * FormCraft 3 (Premium, by nCrafts)
  * WP Synchro (free, by WPSynchro) - for Dev Mode
  * Log Deprecated Notices (free, by Andrew Nacin) - for Dev Mode
  * Log Viewer (free, by Markus Fischbacher) - for Dev Mode
  * BackWPup (free, by Inpsyde GmbH) - including Multisite support
  * Duplicator Pro (Premium, by Snap Creek) - including Multisite support
  * UpdraftPlus Premium (Premium, by Team Updraft, David Anderson) - including Multisite support
  * WPMU Dev Dashboard (Premium, by WPMU DEV) - including Multisite support
  * Everest Forms (free, by WPEverest)
  * MailChimp for WordPress (free, by ibericode)
  * HappyForms (free, by The Theme Foundry)
  * ARForms (Premium, by Repute InfoSystems)
  * SEOPress (free, by Benjamin Denis)
  * SEOPress Pro (Premium, by Benjamin Denis) - Add-On Plugin
  * All in One Schema Rich Snippets (free, by Brainstorm Force)
  * Schema Pro (Premium, by Brainstorm Force)
  * Schema (free, by Hesham)
  * WP Portfolio (Premium, by Brainstorm Force)
  * PHP Code Snippets (Insert PHP) (free, by Webcraftic)
  * Cool Timeline (free, by Cool Plugins) - as a basis for the by the same author, "Cool Timeline Addon For Elementor" (native Elementor widget)


### 1.3.1 - 2018-06-30

* New: Added two upcoming WooCommerce Template types for a future Elementor Pro version
* Tweak: Added icons to the new Customizer link for "Edit" and "View" singular posts for any public post (feature from v1.3.0)
* Tweak: Changed various admin links for "Phlox" Theme support - Note: [Toolbar Extras always only supports the latest versions of supported Themes & Plugins](https://toolbarextras.com/docs/update-policy-for-supported-themes-and-plugins/)
* Tweak: Enhanced "Gravity Forms" plugin support; also further improved filtering and re-hooking
* Tweak: Added a new resource for "Gravity Forms" plugin support
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Tweak: Enhanced, improved and corrected Readme.txt file here :)
* Fix: Proper version check in settings updater for 1.3.x branch
* Fix: Fixing one more instance - proper template type for "Create with Builder" URL for adding new "Single" template (Elementor Pro)
* Fix: "Convert Pro" plugin support - proper check if "Pro Add-On" is active to avoid fatal error
* **New:** *Extended the general Plugin support for:*
  * WP Migrate DB Pro (Premium, by Delicious Brains) - for Dev Mode
  * Contact Form 7 (free, by Takayuki Miyoshi)
  * Caldera Forms (free, by Caldera Labs)
  * Ninja Forms (free, by The WP Ninjas) (only v3.0 or higher supported!)
  * Formidable Forms (Lite) (free, by Strategy11)
  * Formidable Pro (Premium, by Strategy11)
  * WPForms Lite (free, by WPForms)
  * Quform 2 (Premium, by ThemeCatcher) (only v2.0 or higher supported!)
  * Flamingo (free, by Takayuki Miyoshi) - a Contact Form 7 Add-On
  * Ninja Forms - Layout & Styles (Add-On) (Premium, The WP Ninjas)
  * Ninja Forms - File Uploads (Add-On) (Premium, The WP Ninjas)
  * Hustle (free, by WPMU DEV)
  * Bloom (Premium, by Elegant Themes)
  * Decorator – WooCommerce Email Customizer (free, by RightPress)
  * Content Aware Sidebars (free, by Joachim Jensen - DEV Institute)


### 1.3.0 - 2018-06-25

* New: General setting to set link target for "Create with Builder" links (add new templates...) - by default this is now set to "_blank" (means new browser tab/ window)
* New: Added Customizer link for "Edit" and "View" singular posts for any public post - also a new General setting included to display those links or not (on by default)
* New: Build own Theme upload "tab" that can be linked to on its own (uses WordPress Core render function for the upload feature itself!) - see Toolbar under: + New > Install Theme > Upload ZIP file
* New: Smart Tweak setting to remove "Media" from New Content group (to gain more space there) (off by default)
* New: Added full support for CrocoBlock Subscription Service (Premium, by Zemez) - including Kava Pro, Kava free, plus all Jet Plugins with settings pages - this also includes 1-Click template creation for Jet Theme Parts (via JetThemeCore)
* New: Successfully tested with "Dark Mode" (free, by Daniel T. James) plugin - which may land in WordPress Core soon... :) - all CSS styles that Toolbar Extras adds are fully compatible
* Tweak: On plugin's settings page/ tabs added visual separation of settings sections (horizontal lines)
* Tweak: All Customizer deep links that customize the Blog archive/page of a site now use the set Blog URL as the preview URL/page within the Customizer - this applies to all supported themes that have such Customizer panel, section or control
* Tweak: Added new plugin "Home Page Banner for Astra Theme" (free, by Brainstorm Force) to Astra Theme support (Customizer deep link)
* Tweak: Added new plugin "Ocean Stick Anything" (free, by OceanWP) to OceanWP Theme support (settings link)
* Tweak: Added "Integrations" settings to OceanWP theme support
* Tweak: Added new official OceanWP Premium Add-On "Cookie Notice" to OceanWP theme support (Customizer deep link)
* Tweak: Added new "WooCommerce" integration to "Page Builder Framework" Theme support
* Tweak: Added new Elementor developer resource
* Tweak: Added new resource for supported Theme "Page Builder Framework"
* Tweak: Improved plugin support for "Local Development" plugin (free, by Andy Fragen)
* Tweak: Improved plugin support for "Revolution for Elementor Premium" plugin (Premium, by Jan Thielemann)
* Tweak: Styling improvement for resources in Dev Mode
* Tweak: Started a process to reduce the amount of strings: further re-use of strings where possible; reducing the amount of unique strings from supported plugins and themes
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Fix: Proper template type for "Create with Builder" URL for adding new "Single" template (Elementor Pro)
* Fix: Proper Link title labels for "White Label Branding for Elementor" plugin support
* **New:** *Extended the Theme support for:*
  * Kava Pro (Premium, by Zemez/ CrocoBlock) - including the "Kava Extra" plugin
  * Phlox (free, by averta) - including the free Add-Ons "Phlox Core Elements" and "Phlox Portfolio"
  * Buildwall (Premium, by Zemez)
  * Resurrect (Premium, by churchthemes.com)
  * Exodus (Premium, by churchthemes.com)
  * Saved (Premium, by churchthemes.com)
  * Maranatha (Premium, by churchthemes.com)
  * Risen (Premium, by Steven Gliebe/ churchthemes.com) - note: legacy theme!
  * AgentPress Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Altitude Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Author Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Daily Dish Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Infinity Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Magazine Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Parallax Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Wellness Pro (Child Theme for Genesis) (Premium, by StudioPress)
* **New:** *Extended the Plugin support for Elementor Add-Ons:*
  * JetThemeCore (Premium, by Zemez/ CrocoBlock)
  * Briefcase Elementor Widgets (Premium, by BriefcaseWP)
  * Kadence WooCommerce Elementor (free, by Kadence Themes)
  * Kadence WooCommerce Elementor Pro (Premium, by Kadence Themes)
  * Elementor Google Map Extended Pro (Premium, by InternetCSS)
* **New:** *Extended the general Plugin support for:*
  * Kava Extra (Premium, by Zemez/ CrocoBlock)
  * Jet Data Importer (Premium, by Zemez/ CrocoBlock)
  * Jet Plugins Wizard (Premium, by Zemez/ CrocoBlock)
  * Home Page Banner for Astra Theme (free, by Brainstorm Force)
  * OceanWP Sticky Header (free, by Oren Hahiashvili)
  * Front Page Builder (free, by Themes4WP)
  * Customify Pro Add-On (Premium, by PressMaximum)
  * Phlox Core Elements Add-On (free, by averta)
  * Phlox Portfolio Add-On (free, by averta)
  * Church Content (free, by churchthemes.com)
  * GP Social Share (free, by Jon Mather)
  * GP Back To Top (free, by Mai Dong Giang (Peter Mai))
  * Ocean Stick Anything (free, by OceanWP)
  * Cherry Data Importer (Premium, by Zemez)
  * Cherry Plugins Wizard (Premium, by Zemez)
  * Display Featured Image for Genesis (free, by Robin Cornett)


### 1.2.1 - 2018-06-09

* Tweak: Improved logic for some Smart Tweaks so any items are always hidden when the supported plugin is not active (important for the re-hook tweaks)
* Tweak: Improved plugin support for "JetWooBuilder" with the adding of its WooCommerce settings page
* Tweak: Improved plugin support for "DHWC Elementor" with the adding of its Template settings
* Tweak: Removed "Push Notifications" from OceanWP theme support as this feature is now only available in a third-party stand-alone plugin
* Tweak: Improved "Gravity Forms" plugin support and the re-hooking Smart Tweak/ integration
* Tweak: Some string & formatting optimizations
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Fix: Removed duplicate item for Elementor Core support in code
* Fix: Proper default status "no" in setting description for Frontend Toolbar color Smart Tweak
* Fix: Proper check for white label settings in "Ultimate Addons for Elementor" plugin support


### 1.2.0 - 2018-05-31

* New: General setting to remove all title attributes (Tooltips) from links in the Toolbar, including from all items added by Toolbar Extras (Toolbar Extras Settings > General)
* New: Smart Tweak setting to re-hook "WP Rocket" items from the top-level to the Site Group > More Stuff (off by default) (Plugin: WP Rocket - Premium, by WP Rocket)
* New: Smart Tweak setting to re-hook "Autoptimize" items from the top-level to the Site Group > More Stuff (off by default) (Plugin: Autoptimize - free, by ?)
* New: Smart Tweak setting to re-hook "Swift Performance" (Premium) or "Swift Performance Lite" (free) items from the top-level to the Site Group > More Stuff (off by default) (Plugin: Swift Performance - free/Premium, by ?)
* New: Smart Tweak setting to remove new "User" from New Content group (to gain more space there) (off by default)
* New: Smart Tweak setting specifically for WooCommerce plugin to remove new "Order" and new "Coupon" from New Content Group (to gain more space there) (off by default)
* New: Smart Tweak setting to optionally unload translations for Elementor and Elementor Pro (so it falls back to English default strings) (off by default)
* New: Smart Tweak setting to optionally unload translations for this plugin, Toolbar Extras (so it falls back to English default strings) (off by default)
* New: Smart Tweak setting to optionally remove all WordPress Widgets from the Elementor Live Editor (left-hand Elementor Panel) (off by default)
* New: Thanks to the amazing user community, this plugin is now available in 3 different English language variants: `en_GB` (for the UK), `en_CA` (for Canada) and `en_AU` (for Australia)
* Tweak: Made support for "Dynamik Website Builder" Child Theme compatible with their newest version 2.4.0/2.4.1 or higher (versions 2.3.4 or lower are still supported, though)
* Tweak: Added preview links for "Dynamik Website Builder" theme support
* Tweak: Improved full view (preview) links for "Genesis DevKit" plugin support, and same for "Freelancer DevKit" plugin support
* Tweak: Updated Smart Tweak for "All In One SEO Pack" plugin to also support their Pro version
* Tweak: Updated the plugin's few CSS styles for the Toolbar so that they work better on tablets and smartphones
* Tweak: Improved the Customizer support for "OceanWP" Theme, including full support activating/ deactivating Customizer panels via "Ocean Extra" plugin
* Tweak: Added more Pro resources for "Page Builder Framework" Premium Add-On
* Tweak: Added Developer resources for the "Astra" Theme
* Tweak: Added more resources for "PowerPack Elements" plugin support
* Tweak: Made the "Use Admin Color Scheme also for Frontend" Smart Tweak turned off by default. Makes more sense. (*Note:* [Also be aware of this Knowledge Base article on the topic](https://toolbarextras.com/docs/conflicts-with-body-background-color/))
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Tweak: Changed plugin author avatar image to local file instead of external hashed Gravatar image
* Tweak: Enhanced, improved and corrected Readme.txt file here :)
* **New:** *Extended the Theme support for:*
  * Customify (free, by WPCustomify/ PressMaximum)
  * Flexia (free) - including Flexia Core (free) and Flexia Pro (Premium) plugins (all three by Codedic)
  * Eletheme (free, by Liviu Duda)
  * Essence Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Corporate Pro (Child Theme for Genesis) (Premium, by SEO Themes)
  * Business Pro (Child Theme for Genesis) (Premium, by SEO Themes)
  * Studio Pro (Child Theme for Genesis) (Premium, by SEO Themes)
  * Academy Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Authority Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Outfitter Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Boss Pro (Child Theme for Genesis) (Premium, by Design by Bloom)
  * Refined Pro (Child Theme for Genesis) (Premium, by Restored 316 Designs // Lauren Gaige)
  * Monochrome Pro (Child Theme for Genesis) (Premium, by StudioPress)
  * Slush Pro (Child Theme for Genesis) (Premium, by zigzagpress)
  * Foodie Pro (Child Theme for Genesis) (Premium, by Feast Design Co.)
  * Cook'd Pro (Child Theme for Genesis) (Premium, by Feast Design Co.)
  * Brunch Pro (Child Theme for Genesis) (Premium, by Feast Design Co.)
  * Genesis Sample (the default Child Theme for Genesis) (Premium, by StudioPress) - only for version 2.6.0 or higher
* **New:** *Extended the Plugin support for Elementor Add-Ons:*
  * White Label Branding for Elementor (Premium, by IdeaBox Creations) - including Toolbar Extras support for some of the white label features (where applicable)
  * JetWooBuilder (Product Templates for WooCommerce) (Premium, by Zemez/ CrocoBlock)
  * JetBlocks (Premium, by Zemez/ CrocoBlock)
  * DHWC Elementor (Product Templates for WooCommerce) (Premium, by Sitesao Team)
  * Revolution for Elementor (free/Premium, by Jan Thielemann)
  * Archivescode Addons for Elementor (free, by Archivescode)
  * Contact Form DB (free, by Michael Simpson)
  * Eleslider (free, by wpmasters)
  * SJ Elementor Addon (free, by sandesh055)
* **New:** *Extended the general Plugin support for:*
  * Lightweight Sidebar Manager (free, by Brainstorm Force)
  * TM Timeline (free, by Jetimpex/ Zemez)
  * Convert Pro (Premium, by Brainstorm Force)
  * Convert Pro Addon (Premium, by Brainstorm Force)
  * Convert Plus (Premium, by Brainstorm Force)
  * OptinMonster API (free/Premium, by OptinMonster Team/ Retyp, LLC)
  * Testimonial Rotator (free, by Hal Gatewood)
  * Widget Options (free/Premium, by Phpbits Creative Studio)


### 1.1.3 - 2018-04-30

* New: [Launched plugin's own website at toolbarextras.com](https://toolbarextras.com/) with full listing of theme and plugin support, features, blog as well as documentation, knowledge base and changelogs
* New: Added plugin support for "Genesis DevKit" (Premium, by Cobalt Apps)
* Tweak: Added appropriate EDD Customizer deep links for the "StartWP Extended" plugin support
* Tweak: Added settings page link for "Genesis Testimonial Slider" plugin support
* Tweak: Added preview links for "Freelancer DevKit" plugin support
* Tweak: Added preview links for "Themer Pro" plugin support
* Tweak: Added preview links for "Extender Pro" plugin support
* Tweak: Add "&use-location" query_arg to create new menu for Toolbar (link in plugins page notice)
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Tweak: Added or updated URLs throughout the plugin and Readme file to use links to the plugin's own website where appropriate
* Fix: Proper filter name for 'tbex_filter_meta_target'


### 1.1.2 - 2018-04-23

* Tweak: Made support for "Genesis Extender" plugin compatible with their newest version 1.9.0 or higher (versions below v1.9.0 are still supported, though)
* Fix: Proper dismissal parameter for admin notices
* Fix: Re-added /assets/ folder within plugin - really sorry for that mistake in v1.1.1!


### 1.1.1 - 2018-04-20

* New: Added theme support for "Kava Theme" (free, by Zemez & CrocoBlock)
* New: Added plugin support for "WidgetKit for Elementor" (free, by Themesgrove)
* New: Added plugin support for "Genesis Extender" (Premium, by Cobalt Apps)
* Tweak: Added new settings to plugin support for "Extra Privacy for Elementor" (free, by Marian Heddesheimer)
* Tweak: Removed "Widget" Template type from Add New items (Elementor Pro), as Widgets (Global Widgets) cannot be created that way at all (only from the Live Builder itself)
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Fix: Proper template type for "New Page Template with Builder" (Elementor Core)
* Fix: Proper array for the 'tbex_filter_elementor_template_types' filter
* Fix: Changed update settings functionality & checks for the new options added in v1.1.0
* Fix: Add Thickbox JS & CSS on settings page if needed (for video tour)


### 1.1.0 - 2018-04-18

* New: Successfully tested with Elementor Pro 2.0 final release (and many Beta versions before)
* New: Successfully tested with "Laragon" app on Windows 10 - automatic detection of local sites with `.test` domain worked great
* New: Added button to Video feature introduction tour on settings page welcome message
* New: Added links to YouTube tutorial videos on tab "About & Support" on plugin's settings page
* New: Smart Tweak setting to re-hook "NextGen Gallery" items from the top-level to the Site Group > Galleries (off by default)
* New: Smart Tweak setting to re-hook "iThemes Security" items from the top-level to the Site Group (off by default)
* New: Smart Tweak setting to remove "All In One SEO Pack" items from the top-level because they have no real use at all (on by default)
* Tweak: Improved "Add new Template with Builder" for all Elementor Template Types since Elementor 2.0/ Pro 2.0 - Special Thanks to the Elementor Dev Team! ;-)
* Tweak: Respect white label settings for Elementor Add-On "PowerPack Elements" (and only show if those settings were not hidden)
* Tweak: Only show "Astra Pro" white label settings if those settings were not hidden
* Tweak: Only show "Ultimate Addons for Elementor" white label settings if those settings were not hidden
* Tweak: Added Google Maps settings options for "Ultimate Addons for Elementor" (since v1.1.0 of this Add-On)
* Tweak: Extended plugin support for the "WooCommerce" plugin
* Tweak: Improved the support for re-hooking the "Smart Slider 3" plugin items
* Tweak: Improved and enhanced the "About & Support" page content
* Tweak: Improved uninstall functionality: properly delete all (site) Transients
* Tweak: Updated `.pot` file plus all German translations (formal, informal)
* Tweak: Enhanced, improved and corrected Readme.txt file here :)
* Fix: White label name for OceanWP for Library in "New Content" Group
* Fix: Inline documentation and typo fixes all around
* **New:** *Extended the Theme support for:*
  * Page Builder Framework (free & Premium, by David Vongries & MapSteps)
  * StartWP (free, by Munir Kamal)
  * Dynamik Website Builder for Genesis (Premium, by Cobalt Apps)
  * Freelancer Framework (free, by Cobalt Apps)
  * GBeaver (Child Theme for Genesis) (Premium, by WP Beaver World)
  * Beaver Builder Theme (Premium, by FastLine Media LLC)
  * Hestia (free, by Themeisle)
  * Tiny Hestia (Child Theme for Hestia) (free, by Themeisle)
  * Ofeo (Child Theme for Hestia) (free, by Themeisle)
  * Christmas Hestia (Child Theme for Hestia) (free, by Themeisle)
* **New:** *Extended the Plugin support for Elementor Add-Ons:*
  * Premium Addons for Elementor (free, by Leap13)
  * Elements Plus! (free, by The CSSIgniter Team)
  * Elementor Custom Skin (free, by Liviu Duda)
  * Power-Ups for Elementor (free, by WpPug)
  * Press Elements (free/Premium, by Press Elements & Rami Yushuvaev)
  * JetElements (Premium, by Zemez)
  * JetMenu (Premium, by Zemez)
  * JetBlog (Premium, by Zemez)
  * JetReviews (Premium, by Zemez)
  * Total Recipe Generator for Elementor (Premium, by SaurabhSharma)
  * PT Elementor Addons Lite (free, by ParamThemes)
  * Elementor Addon Elements (free, by WebTechStreet)
  * Elementor Addons & Templates – Sizzify Lite (free, by Themeisle)
  * Orbit Fox Companion (free, by Themeisle)
  * Elementor Google Map Extended (free, by InternetCSS)
* **New:** *Extended the general Plugin support for:*
  * WP Show Posts (free/Pro, by Tom Usborne)
  * StartWP Extended (free, by Munir Kamal)
  * Freelancer DevKit (Add-On) (Premium, by Cobalt Apps)
  * Themer Pro (Premium, by Cobalt Apps)
  * Extender Pro (Premium, by Cobalt Apps)
  * Envira Gallery Lite/Pro (free/Premium, by Envira Gallery Team)
  * Soliloquy Sliders Lite/Pro (free/Premium, by Soliloquy Team)
  * Cherry Testimonials (free, by Zemez)
  * Cherry Team Members (free, by Zemez)
  * Cherry Services List (free, by Zemez)
  * Cherry Projects (free, by Zemez)
  * FooGallery (free, by FooPlugins)
  * MaxGalleria (free, by Max Foundry)


### 1.0.2 - 2018-04-05

* New: Added first language packs via WordPress.org translations platform - for German (de_DE - informal) and German Formal (de_DE_formal) - thanks to Team WordPress DE! ;-)
* New: Added plugin support for "Cleaner Plugin Installer".
* Tweak: Improved localization on plugin activation.
* Fix: Fallback function for main item, now with proper URL, plus slightly tweaked string text.
* Fix: Fatal error related to "Dev Mode" in Multisite context.


### 1.0.1 - 2018-04-04

* Tweak: Improved localization functions.
* Tweak: Improved Readme.txt


### 1.0.0 - 2018-04-03

* *Plugin launch. Everything's new!*
* New: Including support for 17 Themes/ Frameworks (which all work well with Elementor, including the Theme Builder since Pro v2.0+)
* New: Including support for 19 Add-On plugins (free + Premium) for Elementor
* New: Including support for 35 general useful plugins for Non-Coder site builders as well as developers
* New: Including support for 10 Genesis specific plugins


### Version 2018-03-31

* Initial private release on GitHub
