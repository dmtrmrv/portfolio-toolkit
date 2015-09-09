<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dmitrymayorov.com/
 * @since      0.1.0
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/includes
 */

/**
 * Registeres 'portfolio' post type.
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/includes
 * @author     Dmitry Mayorov <iamdmitrymayorov@gmail.com>
 */
class Portfolio_Toolkit_CPT {

	/**
	 * Register Portfolio post type.
	 *
	 * @since 0.1.0
	 */
	public function post_type() {
		$labels = array(
			'name'               => _x( 'Projects',  'post type general name',  'portfolio-toolkit' ),
			'singular_name'      => _x( 'Project',   'post type singular name', 'portfolio-toolkit' ),
			'menu_name'          => _x( 'Portfolio', 'admin menu',              'portfolio-toolkit' ),
			'name_admin_bar'     => _x( 'Project',   'add new on admin bar',    'portfolio-toolkit' ),
			'add_new'            => _x( 'Add New',   'book',                    'portfolio-toolkit' ),
			'add_new_item'       => __( 'Add New Project',                      'portfolio-toolkit' ),
			'new_item'           => __( 'New Project',                          'portfolio-toolkit' ),
			'edit_item'          => __( 'Edit Project',                         'portfolio-toolkit' ),
			'view_item'          => __( 'View Project',                         'portfolio-toolkit' ),
			'all_items'          => __( 'All Projects',                         'portfolio-toolkit' ),
			'search_items'       => __( 'Search Projects',                      'portfolio-toolkit' ),
			'parent_item_colon'  => __( 'Parent Projects:',                     'portfolio-toolkit' ),
			'not_found'          => __( 'No projects found.',                   'portfolio-toolkit' ),
			'not_found_in_trash' => __( 'No projects found in Trash.',          'portfolio-toolkit' ),
		);

		$supports = array(
			'title',
			'editor',
			'author',
			'excerpt',
			'comments',
			'revisions',
			'thumbnail',
			'publicize',
			'custom-fields',
			'wpcom-markdown',
		);

		register_post_type( 'portfolio', array(
			'labels'               => $labels,
			'description'          => __( 'Portfolio Items', 'portfolio-toolkit' ),
			'public'               => true,
			'hierarchical'         => false,
			'menu_icon'            => 'dashicons-portfolio',
			'capability_type'      => 'page',
			'map_meta_cap'         => true,
			'supports'             => $supports,
			'register_meta_box_cb' => null,
			'taxonomies'           => array( 'portfolio-category', 'portfolio-tag' ),
			'has_archive'          => true,
			'rewrite'              => array( 'slug' => 'portfolio' ),
			'query_var'            => 'portfolio',
			'can_export'           => true,
			'delete_with_user'     => null,
		) );
	}

	/**
	 * Register Portfolio taxonomies.
	 *
	 * @since 0.1.0
	 */
	public function post_taxonomies() {

		// Labels for portfolio category taxonomy.
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name',  'portfolio-toolkit' ),
			'singular_name'     => _x( 'Category',   'taxonomy singular name', 'portfolio-toolkit' ),
			'search_items'      => __( 'Search Categories',                    'portfolio-toolkit' ),
			'all_items'         => __( 'All Categories',                       'portfolio-toolkit' ),
			'parent_item'       => __( 'Parent Category',                      'portfolio-toolkit' ),
			'parent_item_colon' => __( 'Parent Category:',                     'portfolio-toolkit' ),
			'edit_item'         => __( 'Edit Category',                        'portfolio-toolkit' ),
			'update_item'       => __( 'Update Category',                      'portfolio-toolkit' ),
			'add_new_item'      => __( 'Add New Category',                     'portfolio-toolkit' ),
			'new_item_name'     => __( 'New Category Name',                    'portfolio-toolkit' ),
			'menu_name'         => __( 'Categories',                           'portfolio-toolkit' ),
		);

		// Register portfolio category taxonomy.
		register_taxonomy( 'portfolio-category', array( 'portfolio' ), array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'project-category' ),
			'query_var'         => true,
		) );

		// Labels for portfolio tag taxonomy.
		$labels = array(
			'name'              => _x( 'Tags', 'taxonomy general name',  'portfolio-toolkit' ),
			'singular_name'     => _x( 'Tag',  'taxonomy singular name', 'portfolio-toolkit' ),
			'search_items'      => __( 'Search Tags',                    'portfolio-toolkit' ),
			'all_items'         => __( 'All Tags',                       'portfolio-toolkit' ),
			'parent_item'       => __( 'Parent Tag',                     'portfolio-toolkit' ),
			'parent_item_colon' => __( 'Parent Tag:',                    'portfolio-toolkit' ),
			'edit_item'         => __( 'Edit Tag',                       'portfolio-toolkit' ),
			'update_item'       => __( 'Update Tag',                     'portfolio-toolkit' ),
			'add_new_item'      => __( 'Add New Tag',                    'portfolio-toolkit' ),
			'new_item_name'     => __( 'New Tag Name',                   'portfolio-toolkit' ),
			'menu_name'         => __( 'Tags',                           'portfolio-toolkit' ),
		);

		// Register portfolio tag taxonomy.
		register_taxonomy( 'portfolio-tag', array( 'portfolio' ), array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => false,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'project-tag' ),
			'query_var'         => true,
		) );

	}
}
