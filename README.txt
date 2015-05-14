=== myGWD RSS ShortCode ===
Contributors: leewells
Donate link: http://goldsborowebdevelopment.com/product/mygwd-rss/
Tags: RSS, ShortCode, Customizable, Custom, Buddypress, bbPress
Requires at least: 4.0.0
Tested up to: 4.2.2
Stable tag: 1.0.0
License: Copyright (C) 2015 Goldsboro Web Development, AGPLv3
License URI: http://www.gnu.org/licenses/agpl.html

Stop hunting, here it is.  Insanely customizable RSS shortcode to let you drop in 1, 2, or 100 posts from feeds around the net ( or your own site :S ).

== Description ==

Simple code, real customization.  

Shortcode:

`[GWDrss feed='https://goldsborowebdevelopment.com/feed/']`

The following values can be "tweaked":

* limit (default 5) - limit the number of items
* container (default ul) - specify the HTML tag for the list container
* container_class (default null) - add a class to the list container
* list (default li) - specify the HTML tag for the list item
* list_class (default null) - add a class to the list item
* title (default 25) - specifies how long the title is (0 to remove the title)
* link (default true) - hyperlinks the item (false to disable linking)
* target (default _blank) - specifies how to open a link
* desc (default 150) - specifies how long the excerpt is (0 to remove the except)
* auth (default true) - displays the author (false to disable)
* before_link (default null) - HTML to place before a link
* after_link (default null) - HTML to place after a link
* date (default null) - use PHP Date code to enable (ie: `date='M j, Y'`)
* thumb (default false) - (buggy) true to enable a thumbnail

== Upgrade Notice ==
If you have previous versions, simply hit the "upgrade" button.

== Installation ==

1. Upload the `mygwd-rss` folder and ALL its contents to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use `[GWDrss feed='https://goldsborowebdevelopment.com/feed/']`
 
== Frequently Asked Questions ==
= My feed isn't displaying =

Make sure limit is not 0.  Also ensure the feed URL works.

= HTML isn't showing in the feeds =

To prevent a feed from hosing the HTML on your site or injecting JavaScripts, we have stripped all html tags from feed text.  Sorry but it is bad security practice to allow this.

= Aren't you those guys that created [Super CAPTCHA](https://wordpress.org/plugins/super-captcha/)? =
Yep.

== Screenshots ==

1. Example Output

== Changelog ==
= 1.0.0 =
* Innitial release - Yay.
