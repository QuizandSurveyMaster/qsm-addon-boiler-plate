<?php

if (!defined('ABSPATH')) {
	exit;
}
if (!class_exists('AddonFunctions_XXXX')) {

	class AddonFunctions_XXXX {

		public function __construct() {
			/**
			 * Add Hooks & Functions.
			 */
			//add_action('admin_init', 'qsm_addon_XXXX_register_settings_tabs');
			//add_action('admin_init', 'qsm_addon_XXXX_register_quiz_settings_tabs');
		}

		function qsm_get_quiz_url($quiz_id = 0) {
			$permalink = '';
			if (!empty($quiz_id) && $quiz_id > 0) {
				$args = array(
					'posts_per_page' => 1,
					'post_type' => 'qsm_quiz',
					'meta_query' => array(
						array(
							'key' => 'quiz_id',
							'value' => $quiz_id,
							'compare' => '=',
						),
					),
				);
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) {
					while ($the_query->have_posts()) {
						$the_query->the_post();
						$permalink = get_the_permalink(get_the_ID());
					}
					wp_reset_postdata();
				}
			}
			return $permalink;
		}

		/**
		 * Get a specific property of an array without needing to check if that property exists.
		 *
		 * Provide a default value if you want to return a specific value if the property is not set.
		 *
		 * @since  Unknown
		 * @access public
		 *
		 * @param array  $array   Array from which the property's value should be retrieved.
		 * @param string $prop    Name of the property to be retrieved.
		 * @param string $default Optional. Value that should be returned if the property is not set or empty. Defaults to null.
		 *
		 * @return null|string|mixed The value
		 */
		function rgar($array, $prop, $default = null) {

			if (!is_array($array) && !( is_object($array) && $array instanceof ArrayAccess )) {
				return $default;
			}

			if (isset($array[$prop])) {
				$value = $array[$prop];
			} else {
				$value = '';
			}

			return empty($value) && $default !== null ? $default : $value;
		}

	}

}
global $AddonFunctions_XXXX;
$AddonFunctions_XXXX = new AddonFunctions_XXXX();
