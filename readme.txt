=== Blog Birthday ===
Contributors: tychay
Donate link: http://www.kiva.org/lender/tychay
Tags: birthday
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: trunk

Show a user a notification on their blog birthday.

== Description ==

[Plugin Homepage](http://terrychay.com/wordpress-plugins/blog-birthday)

Inspired by @TwBirthday on Twitter, this shows a simple message in the admin panel on
their blog birthday.

"Happy 3rd Blogger Birthday! You've been around since 11 August 2008."

"Happy 7th Blog Birthday! The first post on this blog was on 19 November 2004."

"Happy 1st Blog Birthday! This blog was first registered on 23 July 2010."

Caveats:
- Old WordPress admin accounts have a registration date of 0000-00-00 and never have a
  blogger birthday. 
- Blog registration starts when you turn on WordPress multisite. If you did this, the
  date may be off.
- First post assumes that there a post_id=1 and uses the date off that.

== Installation ==

###Installing The Plugin###

Extract all files from the ZIP file, making sure to keep the file structure intact, and
then upload it to `/wp-content/plugins/`. Then just visit your admin area and activate
the plugin. That's it!

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== ChangeLog ==

**Version 1.1.1**
* Documentation update
* Small optimization (only loads on admin-init, not init).

**Version 1.1**

* Blog birthday renamed to blogger birthday
* Added blog birthday based on registered date
* Added blog birthday based on first post date

**Version 1.0**

* Initial release

== Future Features ==

* Add ability to change the blogger birthday if blank
* Add ability to change the blog registration date if first post is different.
* 4567890012345678900123456789001234567890012345678900123456789001234567890012345678900
