<?php

/**
 * Plugin Name: QSM - Customization
 * Plugin URI: https://quizandsurveymaster.com
 * Description: Customization for your surveys and quizzes
 * Author: QSM Team
 * Author URI: https://quizandsurveymaster.com
 * Version: 1.0.0
 *
 * @author QSM Team
 * @version 1.0.0
 */
/**
 * @todo Follow this list to setup your addon:
 *
 * - Replace the information in the comments at the top of this file
 * - Replace the Plugin_Name class throughout the addon with your addon's main class
 * - Change the XXXXX in the various settings functions to your addon's name
 * - Replace all instances of the plugin name with your addon's name including the folder and the main file
 * - Find all @todo's and fill in the relevant information
 */
if (!defined('ABSPATH')) {
	exit;
}

define('QSM_XXXX_ADDON_VERSION', '1.0.0');
define('QSM_XXXX_ADDON_DIR', plugin_dir_path(__FILE__));
define('QSM_XXXX_ADDON_URL', plugin_dir_url(__FILE__));
define('QSM_XXXX_ADDON_CSS_URL', QSM_XXXX_ADDON_URL . 'css');
define('QSM_XXXX_ADDON_JS_URL', QSM_XXXX_ADDON_URL . 'js');
define('QSM_XXXX_ADDON_PHP_DIR', QSM_XXXX_ADDON_DIR . 'php');
define('QSM_XXXX_ADDON_TXTDOMAIN', 'QSMCustomAddon');

/**
 * Include Required files.
 */
include_once(QSM_XXXX_ADDON_PHP_DIR . '/functions.php');
include_once(QSM_XXXX_ADDON_PHP_DIR . '/qsm-addon-settings.php');
include_once(QSM_XXXX_ADDON_PHP_DIR . '/qsm-quiz-settings.php');

/**
 * Check if QSM is installed and activated
 *
 * @since 1.0.0
 */
function qsm_addon_customization_XXXX_load() {
	if (class_exists('MLWQuizMasterNext')) {
		/**
		 * Load Translation Support
		 */
		load_plugin_textdomain(QSM_XXXX_ADDON_TXTDOMAIN, false, dirname(plugin_basename(__FILE__)) . '/lang/');
	} else {
		add_action('admin_notices', 'qsm_addon_customization_XXXX_missing_qsm');
	}
}

add_action('plugins_loaded', 'qsm_addon_customization_XXXX_load');

/**
 * Display notice if Quiz And Survey Master isn't installed
 *
 * @since 1.0.0
 */
function qsm_addon_customization_XXXX_missing_qsm() {
	echo '<div class="error"><p>Custom Addon requires Quiz And Survey Master. Please install and activate the Quiz And Survey Master plugin.</p></div>';
}
