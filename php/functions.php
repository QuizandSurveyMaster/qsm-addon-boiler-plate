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

	}

}
global $AddonFunctions_XXXX;
$AddonFunctions_XXXX = new AddonFunctions_XXXX();
