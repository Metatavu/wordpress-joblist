<?php
/*
 * Created on Jun 19, 2019
 * Plugin Name: Job List
 * Description: Wordpress plugin to list jobs from Kunta API
 * Version: 1.0.0
 * Author: Metatavu Oy
 */

  defined ( 'ABSPATH' ) || die ( 'No script kiddies please!' );

  if (!defined('JOBLIST_PLUGIN_DIR')) {
    define('JOBLIST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
  }

  require_once( __DIR__ . '/joblist/joblist.php');
  require_once( __DIR__ . '/settings/settings.php');
  require_once( __DIR__ . '/gutenberg/gutenberg.php');
  
  add_action('plugins_loaded', function() {
    load_plugin_textdomain('joblist', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
  });
  
?>
