<?php /*
**************************************************************************

Plugin Name:  Blog Bithday
Plugin URI:   http://terrychay.com/wordpress-plugins/blog-birthday/
Version:      1.1
Description:  Displays a simple notice in the admin panel on your blog birthday
Author:       tychay
Author URI:   http://terrychay.com/

**************************************************************************/
/*  Copyright 2011  terry chay  (email : tychay@automattic.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
class BlogBirthday {
	function init() {
		add_action( 'admin_notices', array('BlogBirthday','show_birthday_notice'), 0 );
	}

	/**
	 * Shows the person's blog birthday
	 */
	function show_birthday_notice() {
		global $current_user, $blog_id;
		get_currentuserinfo();
		$user_registered = substr( $current_user->user_registered, 0, 10 );
		if ( !$blog_id ) {
			$blog_details = get_blog_details($blog_id);
			$blog_registered = substr( $blog_details->registered, 0, 10 );
		} else {
			$post_id = 1;
			$first_post = get_post( $post_id );
			$post_start = substr( $first_post->post_date, 0, 10 );
			// Ex post facto upgrade to Multisite
			/*
			if ( isset( $blog_registered ) && ( $post_start < $blog_registered ) ) {
				unset( $blog_registered );
			}
			/* */
		}

		//$post_start = '2004-08-17'; //DEBUGGING
		$today = date('Y-m-d');

		// Only show on their birhday!
		if ( strcmp( substr($user_registered,5,5), substr($today,5,5) ) === 0 ) {
			// compute how "old" they are.
			$years = substr($today,0,4) - substr($user_registered,0,4);
			if ( $years <= 0 ) { return; }
			echo '<div class="updated"><p>' ;
			printf ( __('Happy %s Blogge Birthday! You\'ve been around since %s.'),
				self::add_ordinal_number_suffix( $years ),
				date( 'j F Y', strtotime($user_registered) )
			);
			echo '</p></div>';
		}
		// Do their blog's birthday also!
		if ( isset( $blog_registered ) && (strcmp( substr($blog_registered,5,5), substr($today,5,5) ) === 0 ) ) {
			$years = substr($today,0,4) - substr($blog_registered,0,4);
			if ( $years <= 0 ) { return; }
			echo '<div class="updated"><p>' ;
			printf ( __('Happy %s Blog Birthday! This blog was first registered on %s.'),
				self::add_ordinal_number_suffix( $years ),
				date( 'j F Y', strtotime($blog_registered) )
			);
			echo '</p></div>';
		}
		if ( isset( $post_start ) && (strcmp( substr($post_start,5,5), substr($today,5,5) ) === 0 ) ) {
			$years = substr($today,0,4) - substr($post_start,0,4);
			if ( $years <= 0 ) { return; }
			echo '<div class="updated"><p>' ;
			printf ( __('Happy %s Blog Birthday! The first post on this blog was made on %s.'),
				self::add_ordinal_number_suffix( $years ),
				date( 'j F Y', strtotime($post_start) )
			);
			echo '</p></div>';
		}
	}

	/**
	 * English ordinal number suffix a la 'dS' in date().
	 */
	function add_ordinal_number_suffix($num) {
		if ( !in_array( ($num % 100), array(11,12,13) ) ){
			switch ($num % 10) {
				// Handle 1st, 2nd, 3rd
				case 1:  return $num.'st';
				case 2:  return $num.'nd';
				case 3:  return $num.'rd';
			}
		}
		return $num.'th';
	}
}

// Start this plugin
add_action( 'admin_init', array('BlogBirthday','init'), 12 );
?>
