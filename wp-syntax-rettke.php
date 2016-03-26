<?php
/*
  Plugin Name: wp-syntax-rettke
  Plugin URI: http://wordpress.org/extend/plugins/wp-syntax-rettke/
  Description: Serves as an example for the programmatic "Advanced Configuration" of GeSHi in Ryan McGeary's excellent WP-Syntax plugin.
  Version: 1.2
  Author: Grant Rettke
  Author URI: http://www.wisdomandwonder.com/
*/

add_action('wp_syntax_init_geshi', 'wp_syntax_cust_custom_geshi_styles');

function wp_syntax_cust_custom_geshi_styles(&$geshi)
{
	$black = 'color: #000000; ';
	$italic = 'font-style: italic; ';
	$bold = 'font-weight: bold; ';

	// Line Numbers (Fancy, Normal, None): None
	$geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);

	// Comments: Black, Italic
	$geshi->set_comments_style(1, $black . $italic);
	// Java.php flags type 2 comments strangely, suspect this
	// is a bug, but leaving the language file alone for now.
	$geshi->set_comments_style(2, $black . $italic);
	$geshi->set_comments_style('MULTI', $black . $italic);

	// Brackets: Black, Bold
	$geshi->set_symbols_style($black . $bold, false, 0);

	// Strings: Black
	$geshi->set_strings_style($black);

	// Numbers: Black
	$geshi->set_numbers_style($black);

	// Keywords: Black
	$geshi->set_keyword_group_style(1, $black);

	// Keywords II: Black
	$geshi->set_keyword_group_style(2, $black);

	// Inbuilt keywords
	$geshi->set_keyword_group_style(3, $black);

	// Data types etc: Black
	$geshi->set_keyword_group_style(4, $black);

	// Escaped chars: Black
	$geshi->set_escape_characters_style($black);

	// Tab width in spaces: 4
	$geshi->set_tab_width(4);

	// Methods: Black
	// This one is less clear. I want methods in any language to be black,
	// so initially I thought I could just call set_methods_style. The
	// problem with this approach is that GeSHi uses an "object splitter"
	// token to determine what is an object and what is a method. I don't
	// know what this would be for every OO language, and set_methods_style
	// expects that you provide a value for the object splitter. In lieu of
	// that, I will turn off *all* method highlighting.
	$geshi->set_methods_highlighting(false);
}
?>
