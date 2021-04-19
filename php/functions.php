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
			//add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'), 9999);
			//add_action('wp_enqueue_scripts', array(&$this, 'wp_enqueue_scripts'), 9999);
			//add_action('admin_init', 'qsm_addon_XXXX_register_settings_tabs');
			//add_action('admin_init', 'qsm_addon_XXXX_register_quiz_settings_tabs');
		}

		public function admin_enqueue_scripts() {
			wp_enqueue_script('qsm-custom-addon-admin-js', QSM_XXXX_ADDON_JS_URL . '/qsm-custom-addon-admin.js', array('jquery'), QSM_XXXX_ADDON_VERSION, true);
			wp_enqueue_style('qsm-custom-addon-admin-css', QSM_XXXX_ADDON_CSS_URL . '/qsm-custom-addon-admin.css');
		}

		public function wp_enqueue_scripts() {
			wp_enqueue_script('qsm-custom-addon-front-js', QSM_XXXX_ADDON_JS_URL . '/qsm-custom-addon-front.js', array('jquery'), QSM_XXXX_ADDON_VERSION, true);
			wp_enqueue_style('qsm-custom-addon-front-css', QSM_XXXX_ADDON_CSS_URL . '/qsm-custom-addon-front.css');
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

	}

}
global $AddonFunctions_XXXX;
$AddonFunctions_XXXX = new AddonFunctions_XXXX();
