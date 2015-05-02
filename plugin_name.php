<?php
/**
 * Plugin Name:
 * Plugin URI:
 * Description:
 * Author:
 * Author URI:
 * Version: 0.1.0
 *
 * @author
 * @version 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
  * This class is the main class of the plugin
  *
  * When loaded, it loads the included plugin files and add functions to hooks or filters. The class also handles the admin menu
  *
  * @since 0.1.0
  */
class Plugin_Name
{
    /**
  	  * Main Construct Function
  	  *
  	  * Call functions within class
  	  *
  	  * @since 0.1.0
  	  * @uses Plugin_Name::load_dependencies() Loads required filed
  	  * @uses Plugin_Name::add_hooks() Adds actions to hooks and filters
  	  * @return void
  	  */
    function __construct()
    {
      $this->load_dependencies();
      $this->add_hooks();
    }

    /**
  	  * Load File Dependencies
  	  *
  	  * @since 0.1.0
  	  * @return void
  	  */
    public function load_dependencies()
    {
      include("php/gradebook-main-page.php");
      include("php/gradebook-user-page.php");
    }

    /**
  	  * Add Hooks
  	  *
  	  * Adds functions to relavent hooks and filters
  	  *
  	  * @since 0.1.0
  	  * @return void
  	  */
    public function add_hooks()
    {
      add_action('plugins_loaded', array($this,'setup_settings_pages'));
    }

    /**
     * Sets up settings pages
     *
     * Adds tabs to Addons Settings and Quiz Settings
     *
     * @since 0.1.0
     * @return void
     */
    public function setup_settings_pages()
    {
      global $mlwQuizMasterNext;
      if (!is_null($mlwQuizMasterNext) && !is_null($mlwQuizMasterNext->pluginHelper) && method_exists($mlwQuizMasterNext->pluginHelper, 'register_quiz_settings_tabs'))
      {
        $mlwQuizMasterNext->pluginHelper->register_quiz_settings_tabs("Plugin Name", array($this, 'generate_plugin_quiz_settings'));
        $mlwQuizMasterNext->pluginHelper->register_addon_settings_tab("Plugin Name", array($this, 'generate_plugin_settings'));
      }
    }

    /**
     * Displays contents of Quiz Settings tab
     *
     * @since 0.1.0
     * @return void
     */
    public function generate_plugin_quiz_settings() {
      //Display contents for your Quiz Settings tab here
    }

    /**
     * Displays contents of Addon Settings tab
     *
     * @since 0.1.0
     * @return void
     */
    public function generate_plugin_settings() {
      //Display contents for your Addon Settings tab here
    }
}
$plugin_name = new Plugin_Name();
?>
