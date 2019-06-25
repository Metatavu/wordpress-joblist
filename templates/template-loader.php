<?php
  namespace Metatavu\JobList;
  
  if (!defined('ABSPATH')) { 
    exit;
  }

  require_once(constant("JOBLIST_PLUGIN_DIR") . '/dependencies/classes/gamajo/template-loader/class-gamajo-template-loader.php');
  
  if (!class_exists( 'Metatavu\JobList\TemplateLoader' ) ) {
    
    /**
     * Template loader for JobList
     */
    class TemplateLoader extends \JobList_Gamajo_Template_Loader {

      /**
       * Constructor
       */
      public function __construct() {
        $this->filter_prefix = 'joblist';
        $this->theme_template_directory = 'joblist';
        $this->plugin_directory = JOBLIST_PLUGIN_DIR;
        $this->plugin_template_directory = 'default-templates';
      }
    }
  }
  
?>
