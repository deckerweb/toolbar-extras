<?php

// includes/tools/dark-mode-automatic

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Extension class for the plugin "Dark Mode" to enable automatic "Dark Mode"
 *   time-controlled enabling/disabling.
 *   Note: Gets only instantiated if the Dark Mode plugin is active and the
 *         (original) "Auto_Dark_Mode" class is not existing.
 *
 * @since 1.4.0
 *
 *   The code of this class is licensed under GPL-2.0-or-later (same as Dark
 *   Mode plugin itself.)
 * @see https://github.com/danieltj27/Dark-Mode/wiki/Help:-Automatically-turning-Dark-Mode-on-or-off
 * @link https://gist.github.com/danieltj27/8624d57c5e0f30465f963bc7838bbb7f
 *
 * ?
 */

if ( class_exists( 'Dark_Mode' ) && ! class_exists( 'Auto_Dark_Mode' ) ) {
	$tbex_auto_dark_mode = new DDW_TBEX_Auto_Dark_Mode;
}

class DDW_TBEX_Auto_Dark_Mode {

	/**
	 * Make WordPress Dark sometimes.
	 * 
	 * @since 1.4.0
	 * 
	 * @return void
	 */
	public function __construct() {

		add_action( 'dark_mode_profile_settings', array( __CLASS__, 'add_profile_fields' ), 10, 1 );
		add_action( 'after_dark_mode_saved', array( __CLASS__, 'save_profile_fields' ), 10, 2 );

		add_filter( 'is_using_dark_mode', array( __CLASS__, 'is_dark_mode_auto' ), 10, 2 );

	}  // end method


	/**
	 * Check if Dark Mode should be enabled
	 * based on the automatic settings.
	 * 
	 * @since 1.4.0
	 * 
	 * @param boolean $return  The return value passed through.
	 * @param int     $user_id The current user's id.
	 * 
	 * @return boolean
	 */
	public static function is_dark_mode_auto( $return, $user_id ) {

		/** Should we check for auto mode */
		if ( TRUE === self::check_dark_mode_auto( $user_id ) ) {

			/** Get the time frames for auto mode */
			$auto_start = date_i18n( 'Y-m-d H:i:s', strtotime( get_user_meta( $user_id, 'dark_mode_start', TRUE ) ) );
			$auto_end = date_i18n( 'Y-m-d H:i:s', strtotime( get_user_meta( $user_id, 'dark_mode_end', TRUE ) ) );

			/** Check the start time is greater than the end time */
			if ( $auto_start > $auto_end ) {

				$auto_end = date_i18n( 'Y-m-d H:i:s', strtotime( '+1 day', strtotime( get_user_meta( $user_id, 'dark_mode_end', TRUE ) ) ) );

			}  // end if

			/** Get the current time */
			$current_time = date_i18n( 'Y-m-d H:i:s' );

			/** Check the current time is between the start and end time */
			if ( $current_time >= $auto_start && $current_time <= $auto_end ) {

				return TRUE;

			} else {

				return FALSE;

			}  // end if

		}  // end if

		return TRUE;

	}  // end method


	/**
	 * Checks if the user is using automatic Dark Mode.
	 * 
	 * This checks if Dark Mode is set to come on automatically
	 * for a given user. This is set to private as it's an extension
	 * of `is_using_dark_mode()` and only checks the auto value is set.
	 * 
	 * @since 1.4.0
	 * 
	 * @param int $user_id The user id to check.
	 * 
	 * @return boolean
	 */
	public static function check_dark_mode_auto( $user_id ) {

		if ( 0 == $user_id ) {

			/** Default to the current user */
			$user_id = get_current_user_id();

		}

		/** Has automatic Dark Mode been turned on */
		if ( 'on' == get_user_meta( $user_id, 'dark_mode_auto', TRUE ) ) {

			return TRUE;

		}

		return FALSE;

	}  // end method


	/**
	 * Print the auto setting HTML.
	 * 
	 * @since 1.4.0
	 * 
	 * @param object $user WP_User object data.
	 * 
	 * @return mixed
	 */
	public static function add_profile_fields( $user ) {

		?>
			<p>
				<label for="dark_mode_auto">
					<input type="checkbox" id="dark_mode_auto" name="dark_mode_auto" class="dark_mode_auto"<?php if ( 'on' == get_user_meta( $user->data->ID, 'dark_mode_auto', TRUE ) ) : ?> checked="checked"<?php endif; ?> />
					<?php _e( 'Automatically enable Dark Mode over night between these times:', 'toolbar-extras' ); ?>
				</label>
			</p>
			<p>
				<label>
					<?php _ex( 'From', 'Time frame starting at', 'toolbar-extras' ); ?> <input type="time" name="dark_mode_start" id="dark_mode_start" placeholder="00:00"<?php if ( FALSE !== get_user_meta( $user->data->ID, 'dark_mode_start' ) ) : ?> value="<?php echo esc_attr( get_user_meta( $user->data->ID, 'dark_mode_start', TRUE ) ); ?>"<?php endif; ?> />
				</label>
				<label>
					<?php _ex( 'To', 'Time frame ending at', 'toolbar-extras' ); ?> <input type="time" name="dark_mode_end" id="dark_mode_end" placeholder="00:00"<?php if ( FALSE !== get_user_meta( $user->data->ID, 'dark_mode_end' ) ) : ?> value="<?php echo esc_attr( get_user_meta( $user->data->ID, 'dark_mode_end', TRUE ) ); ?>"<?php endif; ?> />
				</label>
			</p>
		<?php

	}  // end method


	/**
	 * Save the value of the profile field.
	 * 
	 * @since 1.4.0
	 * 
	 * @param string $option  The Dark Mode preference.
	 * @param int    $user_id The current user's id.
	 * 
	 * @return void
	 */
	public static function save_profile_fields( $option, $user_id ) {

		/** Set the values */
		$dark_mode_auto  = isset ( $_POST[ 'dark_mode_auto' ] ) ? 'on' : 'off';
		$dark_mode_start = isset ( $_POST[ 'dark_mode_start' ] ) ? sanitize_text_field( $_POST[ 'dark_mode_start' ] ) : '';
		$dark_mode_end   = isset ( $_POST[ 'dark_mode_end' ] ) ? sanitize_text_field( $_POST[ 'dark_mode_end' ] ) : '';

		/** Update the user's meta */
		update_user_meta( $user_id, 'dark_mode_auto', $dark_mode_auto );
		update_user_meta( $user_id, 'dark_mode_start', $dark_mode_start );
		update_user_meta( $user_id, 'dark_mode_end', $dark_mode_end );
	
	}  // end method

}  // end of class
