<?php
/**
 * Youtube Driver for Apis Source
 * 
 * Makes usage of the Apis plugin by Proloser
 *
 * @package Youtube Datasource
 * @author Dean Sofer, Sam S
 * @version 0.0.3
 **/
App::uses('ApisSource', 'Apis.Model/Datasource');
class Youtube extends ApisSource {
	
	/**
	 * The description of this data source
	 *
	 * @var string
	 */
	public $description = 'Youtube DataSource Driver';
	
	/**
	 * Set the datasource to use OAuth
	 *
	 * @param array $config
	 * @param HttpSocket $Http
	 */
	public function __construct($config) {
		$config['method'] = 'OAuthV2';
		parent::__construct($config);
	}
	
	/**
	 * Stores the queryData so that the tokens can be substituted just before requesting
	 *
	 * @param string $model 
	 * @param string $queryData 
	 * @return mixed $data
	 * @author Dean Sofer
	 */
	public function read(&$model, $queryData = array()) {
		$this->tokens = $queryData['conditions'];
		return parent::read($model, $queryData);
	}
	
	/**
	 * Supplement the request object with github-specific data
	 *
	 * @param array $request 
	 * @return array $response
	 */
	public function beforeRequest(&$model, $request) {
		$request['uri']['scheme'] = 'https';
		$request['uri']['query']['key'] = $this->config['login'];
		return $request;
	}
}