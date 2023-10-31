=== List Subsites ===
Contributors: menj
Tags: multisite, subdomains, subsites, list, sorting
Requires at least: 4.0
Tested up to: 6.0
Stable tag: 1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple plugin to list all subsites in a WordPress Multisite installation with sorting options.

== Description ==

The List Subsites plugin provides a shortcode `[list_subsites]` that you can use in any post or page on the main network site to display a list of all subsites in your WordPress Multisite installation. The list will include the subsite name, URL, and tagline. You can also sort the list by name, URL, or tagline in ascending or descending order using the `sort` and `order` shortcode attributes.

== Installation ==

1. Upload the `list-subsites` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the `[list_subsites]` shortcode in your posts or pages on the main network site to display the list of subsites. Optionally, use the `sort` and `order` attributes to customize the sorting of the list.

== Usage ==

1. Create a new post or page on your main network site.
2. Add the `[list_subsites]` shortcode where you want the list of subsites to appear.
3. Optionally, add the `sort` and `order` attributes to customize the sorting of the list. For example, `[list_subsites sort="url" order="desc"]` will display the list of subsites sorted by URL in descending order.
4. Save and publish the post or page.
5. View the post or page to see the list of subsites.

== Frequently Asked Questions ==

= How do I use the plugin? =

After activating the plugin, simply use the `[list_subsites]` shortcode in any post or page on the main network site to display the list of subsites. Optionally, use the `sort` and `order` attributes to customize the sorting of the list.

= Can I customize the list's appearance? =

Yes, the list is wrapped in a `ul` element with the class `list-subsites`, so you can add your own CSS styles to customize its appearance.

== Changelog ==

= 1.1 =
* Added sorting options.
* Updated to reflect that the plugin should be used on the main network site.
* Added more instructions on how to use the plugin.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.1 =
* Added sorting options.
* Updated to reflect that the plugin should be used on the main network site.
* Added more instructions on how to use the plugin.

= 1.0 =
* Initial release.