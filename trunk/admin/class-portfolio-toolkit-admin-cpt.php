<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dmitrymayorov.com/
 * @since      1.0.0
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/admin
 * @author     Dmitry Mayorov <iamdmitrymayorov@gmail.com>
 */
class Portfolio_Toolkit_Admin_CPT {

	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register Portfolio post type.
	 *
	 * @since 1.0.0
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
			'not_found_in_trash' => __( 'No projects found in Trash.',          'portfolio-toolkit' )
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
			'wpcom-markdown'
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
			'taxonomies'           => array( 'portfolio_category', 'portfolio_tag' ),
			'has_archive'          => true,
			'rewrite'              => array('slug' => 'portfolio', ),
			'query_var'            => 'portfolio',
			'can_export'           => true,
			'delete_with_user'     => null,
		) );
	}

	/**
	 * Register Portfolio taxonomies.
	 *
	 * @since 1.0.0
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
		register_taxonomy( 'portfolio_category', array( 'portfolio' ), array(
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
		register_taxonomy( 'portfolio_tag', array( 'portfolio' ), array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => false,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'project-tag' ),
			'query_var'         => true,
		) );

	}

	/**
	 * Gets featured image.
	 *
	 * @since 1.0.0
	 */
	public function post_type_get_featured_image( $post_ID ) {
		$featured_image_id = get_post_thumbnail_id($post_ID);

		if ( $featured_image_id ) {
			$post_thumbnail_img = wp_get_attachment_image_src( $featured_image_id, 'thumbnail' );
			return $post_thumbnail_img[ 0 ];
		}
	}

	/**
	 * Adds image column to Portfolio post listing screen.
	 *
	 * @since 1.0.0
	 */
	public function post_type_admin_columns( $columns ) {
		// change 'Title' to 'Project' Jetpack Style.
		$columns['title'] = __( 'Project', 'portfolio-toolkit' );
		
		// Add Image Column if current theme supports thumbnails.
		if ( current_theme_supports( 'post-thumbnails' ) ) {
			$columns = array_slice( $columns, 0, 1, true ) +
		               array( 'thumbnail' => __( 'Image', 'portfolio-toolkit' ) ) +
		               array_slice( $columns, 1, NULL, true );
		}
		
		return $columns;
	}

	/**
	 * Displays Featured image or a placeholder.
	 *
	 * @since 1.0.0
	 */
	public function post_type_admin_columns_content( $column_name, $post_ID ) {
		// Quick return if current theme does not support thumbnails.
		if ( ! current_theme_supports( 'post-thumbnails' ) ) {
			return;
		}

		if ( $column_name == 'thumbnail' ) {

			// Try to get featured image ID.
			$post_featured_image = $this->post_type_get_featured_image( $post_ID );
			
			// Build an 'edit post' link.
			printf( '<a href="%s">', get_edit_post_link( $post_ID ) );

				// Display image or placeholder.
				if ( $post_featured_image ) {
					printf( '<img src="%s">', $post_featured_image );
				} else {
					echo '<span class="no-image dashicons dashicons-format-image">';
				}

			echo '</a>';

		}

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'css/portfolio-toolkit-admin.css',
			array(), $this->version,
			'all'
		);

	}

}
