<?php
  namespace Metatavu\JobList\Wordpress\Settings;
  
  if (!defined('ABSPATH')) { 
    exit;
  }
  
  define("JOBLIST_SETTINGS_OPTION", 'joblist');
  define("JOBLIST_SETTINGS_GROUP", 'joblist');
  define("JOBLIST_SETTINGS_PAGE", 'joblist');
  
  if (!class_exists( 'Metatavu\JobList\Wordpress\SettingsUI' ) ) {

    class SettingsUI {

      public function __construct() {
        add_action('admin_init', array($this, 'adminInit'));
        add_action('admin_menu', array($this, 'adminMenu'));
      }

      public function adminMenu() {
        add_options_page (__( "Job List Settings", 'joblist' ), __( "Job List", 'joblist' ), 'manage_options', JOBLIST_SETTINGS_OPTION, [$this, 'settingsPage']);
      }

      public function adminInit() {
        register_setting(JOBLIST_SETTINGS_GROUP, JOBLIST_SETTINGS_PAGE);
        add_settings_section('api', __( "API Settings", 'joblist' ), null, JOBLIST_SETTINGS_PAGE);
        $this->addOption('api', 'url', 'api-url', __( "API URL", 'joblist'));
        $this->addOption('api', 'text', 'organization-id', __( "Organization ID", 'joblist' ));
        $this->addOption('api', 'text', 'client-id', __( "Client ID", 'joblist' ));
        $this->addOption('api', 'text', 'client-secret', __( "Client secret", 'joblist' ));
      }

      private function addOption($group, $type, $name, $title) {
        add_settings_field($name, $title, [$this, 'createFieldUI'], JOBLIST_SETTINGS_PAGE, $group, [
          'name' => $name, 
          'type' => $type
        ]);
      }

      public function createFieldUI($opts) {
        $name = $opts['name'];
        $type = $opts['type'];
        $value = Settings::getValue($name);
        echo "<input id='$name' name='" . JOBLIST_SETTINGS_PAGE . "[$name]' size='42' type='$type' value='$value' />";
      }

      public function settingsPage() {
        if (!current_user_can('manage_options')) {
          wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }

        echo '<div class="wrap">';
        echo "<h2>" . __( "Job List", 'joblist') . "</h2>";
        echo '<form action="options.php" method="POST">';
        settings_fields(JOBLIST_SETTINGS_GROUP);
        do_settings_sections(JOBLIST_SETTINGS_PAGE);
        submit_button();
        echo "</form>";
        echo "</div>";
      }
    }

  }
  
  if (is_admin()) {
    $settingsUI = new SettingsUI();
  }

?>