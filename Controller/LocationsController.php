<?php
/**
 * LocationsController
 * 
 * An example of how the YahooPlaceFinder Datasource could be used
 *
 * @author Moz Morris <moz@earthview.co.uk>
 * @link http://www.earthview.co.uk
 * @copyright (c) 2011 Moz Morris
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 **/

App::uses('AppController', 'Controller');

class LocationsController extends AppController {
  
  /**
   * Index action
   */
  public function search()
  {    
		if ($this->request->is('post') && !empty($this->request->data)) {
      
		  /**
		   * See http://developer.yahoo.com/geo/placefinder/guide/requests.html 
		   * for all possible parameters & flags
		   */
      $results = $this->Location->find('all', array(
        'conditions' => array(
          'location' => $this->request->data['Location']['location'],
          'flags' => 'JE',
          'gflags' => 'ACR',
        )
      ));

      $this->set(compact('results'));
    }
  }
}
