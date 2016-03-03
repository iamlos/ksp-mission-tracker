<?php
/**
 * KSP Mission Tracker Mission
 *
 * @version 0.0.0
 * @package KSP Mission Tracker
 */

require_once dirname(__FILE__) . '/../vendor/cpt-core/CPT_Core.php';
require_once dirname(__FILE__) . '/../vendor/cmb2/init.php';

class KSPMT_Mission extends CPT_Core {
	/**
	 * Parent plugin class
	 *
	 * @var class
	 * @since  NEXT
	 */
	protected $plugin = null;

	/**
	 * Constructor
	 * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
	 *
	 * @since  NEXT
	 * @param  object $plugin Main plugin object.
	 * @return void
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();

		// Register this cpt
		// First parameter should be an array with Singular, Plural, and Registered name.
		parent::__construct(
			array( __( 'KSP Mission', 'ksp-mission-tracker' ), __( 'KSP Missions', 'ksp-mission-tracker' ), 'kspmt-mission' ),
			array( 'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ) )
		);
	}

	/**
	 * Initiate our hooks
	 *
	 * @since  NEXT
	 * @return void
	 */
	public function hooks() {
		add_action( 'cmb2_init', array( $this, 'fields' ) );
	}

	/**
	 * Add custom fields to the CPT
	 *
	 * @since  NEXT
	 * @return void
	 */
	public function fields() {
		$prefix = 'kspmt_mission_';

		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'KSP Mission Meta Box', 'ksp-mission-tracker' ),
			'object_types'  => array( 'kspmt-mission' ),
		) );

		$cmb->add_field( array(
			'name' => __( 'Real Launch Date', 'ksp-mission-tracker' ),
			'type' => 'text_date',
			'id'   => $prefix . 'real_launch_date',
		) );

		$cmb->add_field( array(
			'name' => __( 'Game Launch Year', 'ksp-mission-tracker' ),
			'type' => 'text_small',
			'id'   => $prefix . 'game_launch_year',
			'default' => '1',
		) );

		$cmb->add_field( array(
			'name' => __( 'Game Launch Day', 'ksp-mission-tracker' ),
			'type' => 'text_small',
			'id'   => $prefix . 'game_launch_day',
			'default' => '1',
		) );

		$cmb->add_field( array(
			'name' => __( 'Goal', 'ksp-mission-tracker' ),
			'type' => 'select',
			'id'   => $prefix . 'goal',
			'options' => array(
				'flight' => __( 'Flight', 'ksp-mission-tracker' ),
				'orbit' => __( 'Orbit', 'ksp-mission-tracker' ),
				'land' => __( 'Land', 'ksp-mission-tracker' ),
			),
		) );

		$cmb->add_field( array(
			'name' => __( 'Body', 'ksp-mission-tracker' ),
			'type' => 'select',
			'id'   => $prefix . 'body',
			'options' => array(
				'moho' => __( 'Moho', 'ksp-mission-tracker' ),
				'eve' => __( 'Eve', 'ksp-mission-tracker' ),
				'gilly' => __( ' - Gilly', 'ksp-mission-tracker' ),
				'kerbin' => __( 'Kerbin', 'ksp-mission-tracker' ),
				'mun' => __( ' - Mun', 'ksp-mission-tracker' ),
				'minmus' => __( ' - Minmus', 'ksp-mission-tracker' ),
				'duna' => __( 'Duna', 'ksp-mission-tracker' ),
				'ike' => __( ' - Ike', 'ksp-mission-tracker' ),
			),
		) );
	}

	/**
	 * Registers admin columns to display. Hooked in via CPT_Core.
	 *
	 * @since  NEXT
	 * @param  array $columns Array of registered column names/labels.
	 * @return array          Modified array
	 */
	public function columns( $columns ) {
		$new_column = array();
		return array_merge( $new_column, $columns );
	}

	/**
	 * Handles admin column display. Hooked in via CPT_Core.
	 *
	 * @since  NEXT
	 * @param array $column  Column currently being rendered.
	 * @param int   $post_id ID of post to display column for.
	 */
	public function columns_display( $column, $post_id ) {
		switch ( $column ) {
		}
	}
}
