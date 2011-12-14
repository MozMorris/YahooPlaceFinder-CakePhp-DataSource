# YahooPlaceFinder - CakePhp Yahoo PlaceFinder Datasource
* Author:  Moz Morris (moz@earthview.co.uk)
* version 1.0
* http://www.earthview.co.uk
* license: MIT

The purpose of the YahooPlaceFinder datasource is to provide a familiar CakePhp interface for interacting with the Yahoo PlaceFinder API. Provided as plugin with an example MVC implementation demonstrating a simple search.

# Changelog

* 1.0 Sharing it with the world for the very first time.

# Installation

## Get the code

First clone the repository into a new `app/Plugin/YahooPlaceFinder` directory

    git clone git://github.com/MozMorris/YahooPlaceFinder-CakePhp-Datasource.git /path/to/your/app/Plugin/YahooPlaceFinder
	
## Typical setup

1. Load plugin
2. Configure datasource
3. Set as datasource

Loading the plugin (*bootstrap.php*):
    
    /**
     * Load YahooPlaceFinder Plugin
     */
    CakePlugin::load(array('YahooPlaceFinder));
    
    
Datasource configuration (*database.php*)

    public $yahooPlaceFinder = array(
      'datasource' => 'YahooPlaceFinder.YahooPlaceFinderSource',
      'appid'      => 'ABC123'
    );

Set as datasource (*YourModel.php*)

    public $useDbConfig = 'yahooPlaceFinder';

    public $useTable = false;

    
# Usage

Typical usage from controller:

    $results = $this->Location->find('all', array(
      'conditions' => array(
        'location' => $this->request->data['Location']['location'],
        'flags' => 'JE',
        'gflags' => 'ACR',
      )
    ));


There is also an example MVC setup demonstrating a simple search:

    app/Plugin/YahooPlaceFinderSource/Controller/LocationsController.php
    app/Plugin/YahooPlaceFinderSource/Model/Location.php
    app/Plugin/YahooPlaceFinderSource/View/Locations/search.ctp
  
