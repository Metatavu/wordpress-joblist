# Wordpress JobList
Wordpress plugin for managing Jobs from Kunta API

## Instalation

Download latest release zip-file from https://github.com/Metatavu/wordpress-joblist/archive/master.zip and unzip the file into Wordpress /wp-content/plugins -folder.

After that activate the plugin via 'Plugins' menu from Wordpress administration view.

## Configuration

Plugin can be configured via Wordpress admin menu Settings > Job List.

### API Settings

These settings specify how the plugin connects to the API.

  - API URL - `URL into Kunta API (e.g. https://api.kunta-api.fi/v1)`
  - Organization ID - `Kunta API organization ID`
  - Client ID	- `Kunta API client id`
  - Client Secret	- `Kunta API client secret`

## Usage

You can insert JobList list gutenberg component to a page. Component is found under JobList category.
After inserting the component, you can use parameters to control how jobs are listed:

<ul>
  <li><b>Sort by: Publication start or Publication end</b>
  Sorts jobs either by job publication start date or publication end date.</li>
  <li><b>Sort direction: Ascending or Descending</b>
  Sorts jobs either in ascending or descending order specified by the sort by parameter.</li>
  <li><b>First result: integer</b>
  First result to return from api, meaning skip this many results from start. Usually should be set to 0.
  </li>
  <li><b>Max results: integer</b>
  How many jobs should be listed, usually it is good to define some sensible value here since there is many jobs in Kunta API.
  </li>
</ul>

## Customization

By default plugin renders very basic job list but you can customize the how the list is rendered by adding joblist/jobs.php into you theme.

For example adding following contents into your theme's joblist/jobs.php -file, plugin would render only title and link for all listed jobs:

    <?php
      foreach ($data->jobs as $job) {
        $result = "";

        $result .= '<article>';
        $result .= sprintf('<div><a href="%s"><strong>%s</strong></a></div>',$job['link'], $job['title']);
        $result .= '</article>';

        echo $result;
      }
    ?>

Following is example of the job object returned by the api and contains all the information that there is available to use in template:

    {
        "id": "uuid",
        "title": "Example Job",
        "employmentType": "yli 12 kk",
        "description": "This is a best job in the world! Enroll now!",
        "location": "Mikkeli",
        "organisationalUnit": "Example Co",
        "duration": "12 kk",
        "taskArea": "Amesome things",
        "publicationStart": "2019-06-12T21:00:00Z",
        "publicationEnd": "2019-07-14T20:59:00Z",
        "link": "https://example.com/job/123"
    }