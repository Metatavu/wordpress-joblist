<?php
  namespace Metatavu\JobList\Wordpress\Settings;
  
  if (!defined('ABSPATH')) { 
    exit;
  }
  
  require_once('settings-ui.php');  
  
  define("JOBLIST_SETTINGS_OPTION", 'joblist');
  
  if (!class_exists( '\Metatavu\JobList\Wordpress\Settings\Settings' ) ) {

    class Settings {

      /**
       * Returns setting value
       * 
       * @param string $name setting name
       * @return string setting value
       */
      public static function getValue($name) {
        $options = get_option(JOBLIST_SETTINGS_OPTION);
        if ($options) {
          return $options[$name];
        }

        return null;
      }
      
      /**
       * Sets a value for settings
       * 
       * @param string $name setting name
       * @param string $value setting value
       */
      public static function setValue($name, $value) {
        $options = get_option(JOBLIST_SETTINGS_OPTION);
        if (!$options) {
          $options = [];
        } 
        
        $options[$name] = $value;
        
        update_option(JOBLIST_SETTINGS_OPTION, $options);
      }
      
    }

  }
  

?>