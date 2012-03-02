=== Simple Popup Plugin ===
Contributors: grimmdude, RichH
Donate link: http://www.grimmdude.com/donate/
Tags: popup,simple,tools,music,bands,musicians,pop-up,pop up,window,widget
Requires at least: 2.8
Tested up to: 3.2.1
Stable tag: 4.0

This plugin makes it easy to create a simple, modifiable popup window.
== Description ==

The function of this plugin is to easily create links to simple popup windows.  It supports multiple popup links on posts/pages/widgets and window positioning/centering options.

NEW to 4.0 - You can now adjust the dimensions of each individual popup using the new shortcode attributes like so:
[popup url="http://www.popupurl.com" width="400" height="600"]

== Installation ==

Installation for General Use

1. Upload the whole `simple-popup-plugin` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the Plugins menu in WordPress.
1. In a post or page use the shortcode `[popup url="http://www.popup-url.com"]LINK TEXT[/popup]` to create a popup link.
1. Go to the options page to adjust popup window dimensions and other options.


== Frequently Asked Questions ==

1. To create a popup link in a post or page use `[popup url="http://www.popup-url.com"]Link Text Here[/popup]`.
1. You adjust the dimensions of all popups in the options screen, or each individual popup using the width & height attributes within the shortcode, ie `[popup url="http://www.popup-url.com"]LINK TEXT[/popup]`.
1. If you would like to use the shortcode in a template file simply call it like so: 
`<?php echo do_shortcode('[popup url="http://popupurl.com']LINK TEXT[/popup]'); ?>`

== Screenshots ==

1. Screenshot of the options menu.

== Changelog ==

= 2.0 =
* Added scrollbar option.
* Added widget for displaying links to popups in sidebar.
* Added template tag to create popup links in theme templates.

= 3.0 =
* Added support for multiple popups links.
* Added window positioning options.
* Removed widget (brought back in version 3.1)

= 3.1 =
* Brought back widget by popular demand.

= 3.2 =
* Widget upgraded to support multiple links and window centering option available - contributed by RichH

= 3.3 =
Added class 'simple_popup_link' to links for styling and fixed some bugs.

= 4.0 =
Added shortcode attributes for changing the dimensions of each popup window as needed.  Also added the attribute 'class' to the shortcode for adding a custom class to the link if desired.


== Upgrade Notice ==

= 4.0 =
Added shortcode attributes for changing the dimensions of each popup window as needed.  Also added the attribute 'class' to the shortcode for adding a custom class to the link if desired.