<?PHP
/**
*** Plugin Name: Greg's Custom Post Types and Taxonomies
*** Description: A simple plugin to add custom post types and taxonomies
*** Version: 1.0
*** Author: Gregory Jacobs
*** License: GPL2
**/

/* Copyright 2016 Gregory Jacobs
Greg's Custom Post Types and Taxonomies is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.
Greg's Custom Post Types and Taxonomies is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. 
You should have received a copy of the GNU General Public License along with Greg's Custom Post Types and Taxonomies. If not, see {URI to Plugin License}. */


// @GJ CUSTOM POST TYPES 
function my_custom_posttypes() {
    
    // SKILLS / PROGRAM KNOWLEDGE
    $labels = array(
        'name'               => 'Skills',
        'singular_name'      => 'Skill',
        'menu_name'          => 'Skills',
        'name_admin_bar'     => 'Skill',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Skill',
        'new_item'           => 'New Skill',
        'edit_item'          => 'Edit Skill',
        'view_item'          => 'View Skill',
        'all_items'          => 'All Skills',
        'search_items'       => 'Search Skills',
        'parent_item_colon'  => 'Parent Skills:',
        'not_found'          => 'No Skills found.',
        'not_found_in_trash' => 'No Skills found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-hammer',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'skills' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 32,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'comments' ),
        'taxonomies'		 => array( 'category', 'post_tag' )
    );
    register_post_type( 'skills', $args );

}
add_action( 'init', 'my_custom_posttypes' );

// Flush rewrite rules to add "review" as a permalink slug
function my_rewrite_flush() {
    my_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );





// CUSTOM TAXONOMIES
function my_custom_taxonomies() {
	
	// Type of Skills
    $labels = array(
        'name'              => 'Type of Skills',
        'singular_name'     => 'Type of Skill',
        'search_items'      => 'Search Types of Skills',
        'all_items'         => 'All Types of Skills',
        'parent_item'       => 'Parent Type of Skill',
        'parent_item_colon' => 'Parent Type of Skill:',
        'edit_item'         => 'Edit Type of Skill',
        'update_item'       => 'Update Type of Skill',
        'add_new_item'      => 'Add New Type of Skill',
        'new_item_name'     => 'New Type of Skill Name',
        'menu_name'         => 'Type of Skill',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'skill-types' ),
    );
    register_taxonomy( 'skill-type', array( 'skills' ), $args );

}
add_action('init', 'my_custom_taxonomies');