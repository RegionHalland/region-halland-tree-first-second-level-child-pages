<?php

	/**
	 * @package Region Halland Tree First Second Level Child Pages
	 */
	/*
	Plugin Name: Region Halland Tree First Second Level Child Pages
	Description: Front-end-plugin som returnerar aktuell sida + alla barn-sidor
	Version: 1.1.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Return all page childs to a page
	function get_region_halland_tree_first_second_level_child_pages()
	{
		
		// Aktuell sida
		global $post;

		// Om det inte är en sida, returnera en tom variabel
		if (!is_a($post, 'WP_Post')) {
			return;
		}

		// Sätt upp variabler för currentPage + currentParentPage
		$intCurrentPageID = $post->ID;
		$intCurrentParentPageID = $post->post_parent;

		// Kalkylera vilken som är final page
		if ($intCurrentParentPageID == 0) {
			$intFinalPageID = $intCurrentPageID;
		} else {
			$myParentPost = get_post($intCurrentParentPageID);
			$intFinalPageID = $myParentPost->ID;
		}

		// Variabel för att lagra page-objektet för aktuell sida
		if ($intCurrentParentPageID == 0) {
			$pages['first_page'] = $post;
		} else {
			$pages['first_page'] = $myParentPost;
		}

		// Addera länk till sida
		$pages['first_page']->url = get_page_link($pages['first_page']->ID);

		// Kolla om första-sidan är den aktiva
		if ($pages['first_page']->ID == $intCurrentPageID) {
			$pages['first_page']->active = 1;
		} else {
			$pages['first_page']->active = 0;
		}

		// Hämta alla barn-sidor
		$args = array( 
			'child_of' => $intFinalPageID, 
			'parent' => $intFinalPageID,
			'hierarchical' => 0,
			'sort_column' => 'menu_order', 
			'sort_order' => 'asc'
		);

		// Variabel för att lagra alla barn-objekt
		$pages['page_children'] = get_pages($args);

		// Loopa igenom alla barn-sidor
		foreach ($pages['page_children'] as $page) {	
			
			// Addera länk till sida
			$page->url = get_page_link($page->ID);
			
			// Kolla om barn-sidan är aktiv
			if ($page->ID == $intCurrentPageID) {
				$page->active = 1;
			} else {
				$page->active = 0;
			}
		}
		
		// Returnera alla sidor
		return $pages;
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_tree_first_second_level_child_pages_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_tree_first_second_level_child_pages_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_tree_first_second_level_child_pages_activate');
	
	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_tree_first_second_level_child_pages_deactivate');

?>