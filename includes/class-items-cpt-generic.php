<?php

namespace DDW\TBEX;

// includes/class-items-cpt-generic

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Class to add generic post type (CPT) items to the "theme-creative" hook place
 *   for Themes & Child Themes (for example Portfolio, FAQ etc.).
 *
 * @since 1.4.2
 */
class Items_CPT_Generic {  

	public $type;
	public $label;
	public $priority;


	/**
	 * Init the class with the parameters and set the admin bar hook.
	 *
	 * @since 1.4.2
	 *
	 * @param string $type     Unique ID of the post type (handle).
	 * @param string $label    Optional custom label for the post type.
	 * @param int    $priority Priority for 'admin_bar_menu' hook.
	 */
	public function init( $type = '', $label = '', $priority = 115 ) {

		$this->type     = $type;
		$this->label    = $label;
		$this->priority = $priority;	//isset( $priority ) ? (int) $priority : 115;

		add_action(
			'admin_bar_menu',
			array( $this, 'items_generic_type' ),
			$this->priority
		);

	}  // end method


	/**
	 * Callback function for the 'admin_bar_menu' hook which does the heavy lifting.
	 *
	 * @since 1.4.2
	 *
	 * @uses get_post_type_object()
	 *
	 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
	 */
	public function items_generic_type() {
		
		/** Get variables from the instance */
		//$this->type  = $this->type;
		//$this->label = $this->label;

		/** Sanitize variables */
		$type  = sanitize_key( $this->type );
		$label = esc_attr( $this->label );

		/** Get values from the post type object */
		$type_obj    = get_post_type_object( $type );
		$type_name   = empty( $label ) ? $type_obj->labels->name : $label;
		$type_single = empty( $label ) ? $type_obj->labels->singular_name : $label;

		/** Remove word "item(s)" from labels */
		$type_name   = str_ireplace( ' items', '', $type_name );
		$type_single = str_ireplace( ' item', '', $type_single );

		/** Set the titles, translateable */
		$title_edit = sprintf(
			/* translators: %s - name of a post type (plural label) */
			esc_attr__( 'Edit %s Items', 'toolbar-extras' ),
			$type_name
		);

		$title_all = sprintf(
			/* translators: %s - name of a post type (plural label) */
			esc_attr__( 'All %s Items', 'toolbar-extras' ),
			$type_name
		);

		$title_new = sprintf(
			/* translators: %s - singular name of a post type (singular label) */
			esc_attr__( 'New %s Item', 'toolbar-extras' ),
			$type_single
		);

		$title_builder = sprintf(
			/* translators: %s - singular name of a post type (singular label) */
			esc_attr__( 'New %s Builder', 'toolbar-extras' ),
			$type_single
		);

		/** For: Manage Content */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'manage-content-cpt-' . $type,
				'parent' => 'manage-content',
				'title'  => $title_edit,
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'class'  => 'tbex-mc-cpt-' . $type,
					'target' => '',
					'title'  => $title_edit,
				)
			)
		);

		/**
		 * For: Theme Creative items
		 *
		 * Group, where all generic post types hook in
		 */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'creative-generic-posttypes',
				'parent' => 'theme-creative'
			)
		);

			/** Post type "anker" item */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'generic-cpt-' . $type,
					'parent' => 'creative-generic-posttypes',
					'title'  => $type_name,
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Items for', 'toolbar-extras' ) . ': ' . $type_name,
					)
				)
			);

				/** All items */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'generic-cpt-' . $type . '-all',
						'parent' => 'generic-cpt-' . $type,
						'title'  => $title_all,
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => $title_all,
						)
					)
				);

				/** New item */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'generic-cpt-' . $type . '-new',
						'parent' => 'generic-cpt-' . $type,
						'title'  => $title_new,
						'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => $title_new,
						)
					)
				);

				/** Elementor specific */
				if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'generic-cpt-' . $type . '-builder',
							'parent' => 'generic-cpt-' . $type,
							'title'  => $title_builder,
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => $title_builder,
							)
						)
					);

					/** For: WordPress "New Content" section within the Toolbar */
					if ( ddw_tbex_display_items_new_content() ) {

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'new-cpt' . $type . '-with-builder',
								'parent' => 'new-' . $type,
								'title'  => ddw_tbex_string_newcontent_with_builder(),
								'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target( 'builder' ),
									'title'  => ddw_tbex_string_newcontent_create_with_builder(),
								)
							)
						);

					}  // end if

				}  // end if

				/** Genesis specific */
				if ( post_type_supports( $type, 'genesis-cpt-archives-settings' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'generic-cpt-' . $type . '-archive',
							'parent' => 'generic-cpt-' . $type,
							'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=genesis-cpt-archive-' . $type ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
							)
						)
					);

				}  // end if

	}  // end method

}  // end of class
