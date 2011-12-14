<?php
/**
 * YahooPlaceFinder DataSource
 * 
 * A Datasource to get data from Yahoo's PlaceFinder REST Web service
 *
 * @author Moz Morris <moz@earthview.co.uk>
 * @link http://www.earthview.co.uk
 * @copyright (c) 2011 Moz Morris
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 **/

App::uses('HttpSocket', 'Network/Http');

class YahooPlaceFinderSource extends DataSource {

  var $config = array(
    'appid' => false
  );
  
  var $_schema = array(
    'Results' => array(
      'quality' => array(
        'type' => 'integer'
      ),
      'latitude' => array(
        'type' => 'float'
      ),
      'longitude' => array(
        'type' => 'float'
      ),
      'offsetlat' => array(
        'type' => 'float'
      ),
      'offsetlon' => array(
        'type' => 'float'
      ),
      'radius' => array(
        'type' => 'integer'
      ),
      'name' => array(
        'type' => 'string'
      ),
      'line1' => array(
        'type' => 'string'
      ),
      'line2' => array(
        'type' => 'string'
      ),
      'line3' => array(
        'type' => 'string'
      ),
      'line4' => array(
        'type' => 'string'
      ),
      'house' => array(
        'type' => 'string'
      ),
      'string' => array(
        'type' => 'string'
      ),
      'xstreet' => array(
        'type' => 'string'
      ),
      'unittype' => array(
        'type' => 'string'
      ),
      'unit' => array(
        'type' => 'string'
      ),
      'postal' => array(
        'type' => 'string'
      ),
      'neighborhood' => array(
        'type' => 'string'
      ),
      'city' => array(
        'type' => 'string'
      ),
      'county' => array(
        'type' => 'string'
      ),
      'state' => array(
        'type' => 'string'
      ),
      'country' => array(
        'type' => 'string'
      ),
      'countycode' => array(
        'type' => 'string'
      ),
      'statecode' => array(
        'type' => 'string'
      ),
      'countycode' => array(
        'type' => 'string'
      ),
      'uzip' => array(
        'type' => 'string'
      ),
      'hash' => array(
        'type' => 'string'
      ),
      'woeid' => array(
        'type' => 'integer'
      ),
      'woetype' => array(
        'type' => 'integer'
      )
    )
  );
  
  function __construct($config) {
    if (empty($config['appid'])) {
      throw new InternalErrorException(__('Yahoo PlaceFinder application ID not configured.'));	  
    }
    $this->config = Set::merge($this->config, $config);
    $this->connection = new HttpSocket(
      "http://where.yahooapis.com"
    );
    parent::__construct($config);
  }

  function describe($model) {
    return $this->_schema['Results'];
  }
  
  function listSources() {
    return array();
  }
    
  function read($model, $queryData = array()) {
        
    // convert 'limit' to 'count'
    if (!empty($queryData['limit'])) {
      $queryData['conditions']['count'] = $queryData['limit'];
    }
    
    // offset
    if (!empty($queryData['offset'])) {
      $queryData['conditions']['start'] = $queryData['offset'];
    }    
    
    $response = $this->connection->get('geocode', Set::merge($this->config, $queryData['conditions']));
    $response = json_decode($response, true);
    $results = array();
    
    if (!empty($response['ResultSet']['Results'])) {
      foreach ($response['ResultSet']['Results'] as $result) {
        $results[] = array($model->alias => $result);
      }
    }
    
    return $results;
  }
  
}