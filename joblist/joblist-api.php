<?php

  namespace Metatavu\JobList\Wordpress;
  
  require_once( __DIR__ . '/../vendor/autoload.php');
  require_once( __DIR__ . '/../settings/settings.php');
  
  if (!defined('ABSPATH')) { 
    exit;
  }
  
  if (!class_exists( '\Metatavu\JobList\Wordpress\Api' ) ) {
    
    /**
     * JobList Api class  
     */
    class Api {

      /**
       * Returns new instance of JobsApi
       * 
       * @param boolean $ptv7Compatibility whether to use PTV 7 compatibility mode
       * @return \KuntaAPI\Api\JobsApi
       */
      public static function getJobsApi($ptv7Compatibility = true) {
        return new \KuntaAPI\Api\JobsApi(self::getClient($ptv7Compatibility));
      }

      
      /**
       * Returns configuration
       * 
       * @param boolean $ptv7Compatibility whether to use PTV 7 compatibility mode
       * @return \KuntaAPI\Configuration configuration
       */
      private function getConfiguration($ptv7Compatibility) {
        $result = \KuntaAPI\Configuration::getDefaultConfiguration();
        $result->setHost(\Metatavu\JobList\Wordpress\Settings\Settings::getValue("api-url"));
        $result->setUsername(\Metatavu\JobList\Wordpress\Settings\Settings::getValue("client-id"));
        $result->setPassword(\Metatavu\JobList\Wordpress\Settings\Settings::getValue("client-secret"));
        if (!$ptv7Compatibility) {
          $result->addDefaultHeader("Kunta-API-PTV7-Compatibility", "false");
        }
        return $result;
      }
      
      /**
       * Returns new client
       * 
       * @param boolean $ptv7Compatibility whether to use PTV 7 compatibility mode
       * @return \KuntaAPI\ApiClient API client
       */
      private function getClient($ptv7Compatibility) {
        return new \KuntaAPI\ApiClient(self::getConfiguration($ptv7Compatibility));
      }
    }
  }

?>