<?php
/**
 * KSP Mission Tracker Frontend
 * @version 0.0.0
 * @package KSP Mission Tracker
 */

class KSPMT_Frontend {
	/**
	 * Parent plugin class
	 *
	 * @var   class
	 * @since NEXT
	 */
	protected $plugin = null;

	/**
	 * Constructor
	 *
	 * @since  NEXT
	 * @param  object $plugin Main plugin object.
	 * @return void
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks
	 *
	 * @since  NEXT
	 * @return void
	 */
	public function hooks() {
		add_filter( 'the_content', array( $this, 'the_content' ) );
	}

	/**
	 * Output mission info with it's contents.
	 *
	 * @since NEXT
	 * @param string $content The post content.
	 * @return [type] [description]
	 */
	public function the_content( $content ) {
		if ( ! 'kspmt-mission' == get_post_type() ) {
			return $content;
		}

		ob_start();
		?>
		<div class="kspmt-mission-details">
			<h3><?php esc_html_e( 'Mission Details', 'ksp-mission-details' ); ?></h3>
			<ul>
				<li>
					<?php printf( __( '%1$sGoal:%2$s %3$s at %4$s', 'ksp-mission-details' ),
						'<b>',
						'</b>',
						esc_html( ucfirst( get_post_meta( get_the_id(), 'kspmt_mission_goal', true ) ) ),
						esc_html( ucfirst( get_post_meta( get_the_id(), 'kspmt_mission_body', true ) ) )
					); ?>
				</li>
				<li>
					<?php printf( __( '%1$sLaunched:%2$s Year %3$s, Day %4$s', 'ksp-mission-details' ),
						'<b>',
						'</b>',
						esc_html( ucfirst( get_post_meta( get_the_id(), 'kspmt_mission_game_launch_year', true ) ) ),
						esc_html( ucfirst( get_post_meta( get_the_id(), 'kspmt_mission_game_launch_day', true ) ) )
					); ?>
				</li>
			</ul>
		</div>
		<?php

		return $content . ob_get_clean();
	}
}
