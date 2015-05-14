<?php
/*
Plugin Name: MyGWD RSS ShortCodes
Plugin URI: http://goldsborowebdevelopment.com/product/mygwd-rss/
Description: A very simple and customizable RSS shortcode to display formatted RSS anywhere on your site.
Author: Goldsboro Web Development
Version: 1.0.0
Author URI: http://goldsborowebdevelopment.com
Copyright (C) 2015 Goldsboro Web Development

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License version 3.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
	This license applies only to this software and not any services
	offered as part of this software such as access to the MyGWD Database
	or customer support.
	
*/
new myGWDrss();
class myGWDrss
	{
	function myGWDrssBC() { $this->myGWDrss(); } // Backwards compatibility...
	function myGWDrss() 
		{
		add_shortcode				( 'GWDrss',					array ( &$this, 'GWDrss') );
		}
	function GWDrss( $atts, $content = null )
		{
		include_once( ABSPATH . WPINC . '/feed.php' );
		$content = null;
		$a = shortcode_atts( array(
			'feed' => '',
			'limit' => '5',
			'container' => 'ul',
			'container_class' => '',
			'list' => 'li',
			'list_class' => '',
			'title' => '24',
			'link' => 'true',
			'desc' => '150',
			'auth' => 'true',
			'target' => '_blank',
			'before_link' => '',
			'after_link' => '',
			'date' => '',
			'thumb' => 'false',
		), $atts );
		if( empty( $a['feed'] ) ) : return '<strong>ERROR: No feed value given</strong>'; endif;
		$rss = fetch_feed( $a['feed'] );
		if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

			// Figure out how many total items there are, but limit it to 5. 
			$maxitems = $rss->get_item_quantity( $a['limit'] ); 

			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items( 0, $maxitems );

		endif;
		if( !empty( $a['container_class'] ) ) : $contclass = ' class="' . $a['container_class'] . '"'; else: $contclass = null; endif;
		if( !empty( $a['list_class'] ) ) : $listclass = ' class="' . $a['list_class'] . '"'; else: $listclass = null; endif;
		$content .= '<' . $a['container'] . $contclass . '>';
		if ( $maxitems == 0 ) : 
			$content .= '<' . $a['list'] . $listclass . '>No items</' . $a['list'] . '>';
		else : 
			foreach ( $rss_items as $item ) :
			$thistitle = (strlen(esc_html( $item->get_title() )) > $a['title']) ? substr(esc_html( $item->get_title() ),0,$a['title']).'...' : esc_html( $item->get_title() );
			$thisconte = (strlen(strip_tags( $item->get_description() )) > $a['desc']) ? substr(strip_tags( $item->get_description() ),0,$a['desc']).'...' : strip_tags( $item->get_description() );
			$content .= '<' . $a['list'] . $listclass . '>';
			$content .= $a['before_link'];
			if( $a['link'] != false ) :
				$content .= '<a href="' . esc_url( $item->get_permalink() ) . '" target="' . $a['target'] . '"';
				$content .= 'title="Posted ' . $item->get_date('j F Y | g:i a') . '">';	
				endif;
			//if( $a['thumb'] != false ) : $content .= '<img src="' . $item->get_image_url() . ' height="20" width="20" alt="' . $thistitle . '" />'; endif;
			if( $a['title'] != 0 ) : $content .= $thistitle; endif;
			if( $a['link'] != false ) : $content .= '</a>'; endif;
			$content .= $a['after_link'];
			if( $a['auth'] != false ) : $author = $item->get_author(); $content .= '<small> by <strong>' . $author->get_name() . '</strong></small>'; endif;
			if( !empty( $a['date'] ) ) : $content .= '<small> on ' . $item->get_date($a['date']) . '</small>'; endif;
			if( $a['desc'] != 0 ) : $content .= '<br />' . $thisconte . ''; endif;
			$content .= '</' . $a['list'] . '>';
			endforeach;
		endif;
		$content .= '</' . $a['container'] . '>';
		return $content;
		}
	}