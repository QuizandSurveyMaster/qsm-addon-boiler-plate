<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Registers your tab in the quiz settings page
 *
 * @since 0.1.0
 * @return void
 */
function qsm_addon_xxxxx_register_quiz_settings_tabs() {
  global $mlwQuizMasterNext;
  if ( ! is_null( $mlwQuizMasterNext ) && ! is_null( $mlwQuizMasterNext->pluginHelper ) && method_exists( $mlwQuizMasterNext->pluginHelper, 'register_quiz_settings_tabs' ) ) {
    $mlwQuizMasterNext->pluginHelper->register_quiz_settings_tabs( "Plugin Name", 'qsm_addon_xxxxx_quiz_settings_tabs_content' );
  }
}

/**
 * Generates the content for your quiz settings tab
 *
 * @since 0.1.0
 * @return void
 * @todo Replace the xxxxx with your addon's name
 */
function qsm_addon_xxxxx_quiz_settings_tabs_content() {
  // Display your quiz settings here!
}
?>
