<?php
/**
 * Location Model
 * 
 * An example of how the YahooPlaceFinder Datasource could be used
 *
 * @author Moz Morris <moz@earthview.co.uk>
 * @link http://www.earthview.co.uk
 * @copyright (c) 2011 Moz Morris
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 **/

App::uses('AppModel', 'Model');

class Location extends AppModel {
  
  /**
   * Remember to setup the datasource config in database.php
   * example:
   * public $yahooPlaceFinder = array(
   *  'datasource' => 'YahooPlaceFinder.YahooPlaceFinderSource',
   *  'appid'      => 'ABC123'
   * );
   */
  public $useDbConfig = 'yahooPlaceFinder';
  
  public $useTable = false;
	
}
