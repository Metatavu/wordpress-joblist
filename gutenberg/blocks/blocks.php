<?php
namespace Metatavu\JobList\Wordpress\Gutenberg\Blocks;

require_once(__DIR__ . '/../../templates/template-loader.php');

defined ( 'ABSPATH' ) || die ( 'No script kiddies please!' );

if (!class_exists( 'Metatavu\JobList\Wordpress\Gutenberg\Blocks\Blocks' ) ) {

  /**
   * Class for handling Gutenberg blocks
   */
  class Blocks {

    /**
     * Constructor
     */
    public function __construct() {
      add_action('init', [$this, "onInit"]);
    }

    /**
     * Filter method for block categories. Used to add custom category for Kunta API
     * 
     * @param array $categories categories
     * @param \WP_Post post being loaded
     */
    public function blockCategoriesFilter($categories, $post) {
      $categories[] = [
        'slug' => 'joblist',
        'title' => __( 'JobList', 'joblist' ),
      ];
      return $categories;
    }

    /**
     * Action executed on init
     */
    public function onInit() {
      wp_register_script('joblist-blocks', plugins_url( 'js/joblist-blocks.js', __FILE__ ), ['wp-blocks', 'wp-element', 'wp-i18n']);      
      wp_set_script_translations("joblist-blocks", "joblist", dirname(__FILE__) . '/lang/');
      add_filter("block_categories", [ $this, "blockCategoriesFilter"], 10, 2);

      wp_localize_script('joblist-blocks', 'listBlockOptions', [ 
        "apiUrl" => \Metatavu\JobList\Wordpress\Settings\Settings::getValue("api-url"),
        "language" => $this->getCurrentLanguage()
      ]);

      register_block_type('joblist/list-block', [
        'attributes' => [ 
          "sort-by" => [
            'type' => 'string'
          ],
          "sort-dir" => [
            'type' => 'string'
          ],
          "first-result" => [
            'type' => 'string'
          ],
          "max-results" => [
            'type' => 'string'
          ]
        ],
        'editor_script' => 'joblist-blocks',
        'render_callback' => [ $this, "renderListBlock" ]
      ]);
    }
    
    /**
     * Renders a list block
     *
     * Return a HTML representation of jobs
     *
     * @property array $attributes {
     *   block attributes
     * 
     *   @type string $sortBy Sort jobs by
     *   @type string $sortDir Sort direction
     *   @type string $firstResult first result
     *   @type string $maxResults max results
     * }
     */
    public function renderListBlock($attributes) {
      $result = '';
      $jobsApi = \Metatavu\JobList\Wordpress\Api::getJobsApi(false);
      $organizationId = \Metatavu\JobList\Wordpress\Settings\Settings::getValue("organization-id");
      $sortBy = $attributes["sort-by"];
      $sortDir = $attributes["sort-dir"];
      $firstResult = $attributes["first-result"];
      $maxResults = $attributes["max-results"];

      try {
        $jobs = $jobsApi->listOrganizationJobs($organizationId, $sortBy, $sortDir, $firstResult, $maxResults);
        $templateData = [
          "jobs" => $jobs
        ];

        $templateLoader = new \Metatavu\JobList\TemplateLoader();

        ob_start();
        $templateLoader->set_template_data($templateData)->get_template_part('jobs');
        $result = ob_get_contents();
        ob_end_clean();

        if (empty($result) && $_GET["preview"]) {
          return __("No jobs found", "joblist");
        }

      } catch (\KuntaAPI\ApiException $e) {

        $result .= '<div class="error notice">';
        if ($e->getResponseBody()) {
          $result .= print_r($e->getResponseBody());
        } else {
          $result .= $e;
        }
        $result .= '</div>';
      }

      return $result;
    }

    /**
     * Resoles place name in current locale 
     */
    private function getCurrentLanguage() {
      $locale = get_locale();
      return substr($locale, 0, 2);
    }

  }

}

new Blocks();

?>