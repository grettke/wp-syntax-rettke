=== wp-syntax-rettke ===
Contributors: grettke
Donate link: http://ryan.mcgeary.org/wp-syntax/
Tags: syntax highlighting, syntax, highlight, code, formatting
Requires at least: 2.0
Tested up to: 2.6.0
Stable tag: 1.2

wp-syntax-rettke serves as an example for the programmatic 
"Advanced Configuration" of GeSHi in Ryan McGeary's excellent WP-Syntax plugin.

== Description ==

Out of the box, [WP-Syntax](http://wordpress.org/extend/plugins/wp-syntax/) 
colors code using the default [GeSHi](http://qbnz.com/highlighter/) colors. 
Per the authors advice in the 'Advanced Customization' section of
[Other Notes](http://wordpress.org/extend/plugins/wp-syntax/other_notes/),
you can configure GeSHi yourself by handling the `wp_syntax_init_geshi`
hook and configuring it programmatically. 

Since I wanted to do just that, I decided to publish a generic plugin 
for folks who wanted to configure GeSHi following this approach.

== Installation ==

1. Upload wp-syntax-rettke.zip to your Wordpress plugins directory, 
usually `/wp-content/plugins/` and unzip the file. It will create a `/wp-content/plugins/wp-syntax-rettke/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Create a post/page that contains a code snippet following the proper usage syntax.

== Frequently Asked Questions ==

= Why is your theme so sparse? =

I don't like distractions. 

My blog has a black and white theme, so I don't want any colors in the syntax
highlighting. The formatting that I care about the most is for Lisp. 

When reading Lisp (as opposed to writing it), I find that bold brackets and
italic comments make it very easy to follow the structure and flow. 

Taking the theme a little further, I also configured the `wp-syntax.css` to
use `SmokeWhite` colored borders, and tweaked the GeSHi `scheme.php` 
configuration to better reflect how you really code in Scheme (both are included
as examples).

= How should I change the settings of the API calls? =

You may customize the GeSHi settings manually in `wp-syntax-rettke.php` 
using whatever method you prefer. One option for doing so is using the built 
in 'Plugin Editor'. If you want to use the 'Plugin Editor', you should set 
permissions on `wp-syntax-rettke.php` to '666'. I keep the file under version
control, so I make my changes locally and ftp them to the server.

= Where do I start? =

Go the GeSHi [demo page](http://qbnz.com/highlighter/demo.php) and play
around with the settings to get a idea of what you can change.

= How do I know what GeSHi API calls to make? =

Read the GeSHi [API Documentation](http://qbnz.com/highlighter/geshi-doc.html)
and look for the call in there. Once you find it, double check that the call
hasn't changed or been deprecated by going right to the source: download
the version of GeSHi listed in the release notes for this plugin. Then have a 
look at `geshi.php`. 

= How do I make my changes take effect? =

1. Deactivate this plugin.
2. Apply your change (see How should I change the setting of API calls?).
3. Activate this plugin.
4. Your change should apply immediately upon reloading the test page of your choosing.

= The API calls are not changing the highlighting in the manner that I expect it to be changed. What should I do? =

Some of the API calls *appear* to be too general, or vague. Take, for example,
`set\_keyword\_group\_style`. 

You can specify the number for any group, and while the groups are discussed in
the documentation (see Setting Keyword Styles), 
even there it is not very clear what tokens show up in 
what group. *This*, is *by design*. 

The language formatting configuration file
authors are free to put whatever tokens into whatever groups they wish. So,
if you are not getting the results you desire for a particular languge, then
you need to go right to the language file itself 
(located in `/wp-content/plugins/wp-syntax/geshi/geshi/<your-lang>.php`) 
to figure out which group you should be setting, but are not setting, 
and make the change.

= What if I don't like how Wp-Syntax works? =

Then you need to go the the 
[WP-Syntax Website](http://wordpress.org/extend/plugins/wp-syntax/).
They've got great forums and documentation there. 

= What if I don't like how wp-syntax-rettke works? =

The best thing for you to do is to use my theme as a template, follow my
notes, and create a theme of your own!

= What if I don't like how GeSHi parses my code? =

You've got the option to tweak the language files yourself. They are located
in `/wp-content/plugins/wp-syntax/geshi/geshi/<your-lang>.php`. The process is quite simple, you will get
great results in no time.

== Screenshots ==

1. Scheme, an alternate syntax for let.
2. Scheme, a non-hygienic, anaphoric macro.
3. Scheme, an Ruby-like loop syntax.

== Release Notes ==

**1.2** : Set keyword expansion in the plugin file. Uses Wp-Syntax 0.9, which depends on GeSHi 1.0.7.22.

**1.1** : Fixed grammatical errors in the readme.txt. Uses Wp-Syntax 0.9, which depends on GeSHi 1.0.7.22.

**1.0** : First public release. Uses Wp-Syntax 0.9, which depends on GeSHi 1.0.7.22.
