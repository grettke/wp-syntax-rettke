<?php
/*
Plugin Name: wp-syntax-rettke
Plugin URI: http://wordpress.org/extend/plugins/wp-syntax-rettke/
Description: Serves as an example for the programmatic "Advanced Configuration" of GeSHi in Ryan McGeary's excellent WP-Syntax plugin.
Version: 1.2
Author: Grant Rettke
Author URI: http://www.wisdomandwonder.com/
*/

/*
<
Note:	The following is the GPL-Compatible "Modified BSD" license: 
Source:	http://www.xfree86.org/3.3.6/COPYRIGHT2.html#5
>
Redistribution and use in source and binary forms, with or without 
modification, are permitted provided that the following conditions are met:

1. 	Redistributions of source code must retain the above copyright notice, 
	this list of conditions and the following disclaimer.
2. 	Redistributions in binary form must reproduce the above copyright 
	notice, this list of conditions and the following disclaimer in the 
	documentation and/or other materials provided with the distribution.
3. 	The name of the author may not be used to endorse or promote products 
	derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED 
WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF 
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO 
EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT
OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN 
CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
POSSIBILITY OF SUCH DAMAGE.
 */

/*
$LastChangedDate: 2008-08-11 22:04:11 -0500 (Mon, 11 Aug 2008) $
$LastChangedRevision: 59317 $
$HeadURL: http://svn.wp-plugins.org/wp-syntax-rettke/tags/1.2/wp-syntax-rettke.php $
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
