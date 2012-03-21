<?php
/**
 * A Youtube API Method Map
 *
 * Refer to the apis plugin for how to build a method map
 * https://github.com/ProLoser/CakePHP-Api-Datasources
 *
 */
$config['Apis']['Youtube']['hosts'] = array(
	'oauth' => 'accounts.google.com/o/oauth2/auth',
	'rest' => 'gdata.youtube.com/feeds/api',
);
// http://developer.github.com/v3/oauth/
$config['Apis']['Youtube']['oauth'] = array(
	'version' => '2.0',
	'authorize' => 'authorize', // Example URI: https://github.com/login/oauth/authorize
	'request' => 'requestToken', //client_id={$this->config['login']}&redirect_uri
	'access' => 'access_token', 
	'login' => 'authenticate', // Like authorize, just auto-redirects
	'logout' => 'invalidateToken', 
);
$config['Apis']['Youtube']['read'] = array(
	// field
	'uploads' => array(	
		'users/default/uploads' => array()
	),
);

$config['Apis']['Youtube']['create'] = array(
	'repos' => array(
		'repos/fork' => array(
			'owner',
			'repo',
		),
		'repos/create' => array(
			'name',
			'optional' => array(
				'description',
				'homepage',
				'public',
			),
		),
	),
	'issues' => array(
		'issues/open' => array(
			'user',
			'repo',
			'title',
			'body',
		)
	)
);

$config['Apis']['Youtube']['update'] = array(
	'repos' => array(
		'repos/set/private' => array(
			'private',
			'owner',
			'repo',
		),
		'repos/set/public' => array(
			'public',
			'owner',
			'repo',
		),
	)
);

$config['Apis']['Youtube']['delete'] = array(
	'repos' => array(
		'repos/delete' => array(
			'owner',
			'repo',
			'optional' => array(
				'delete_token',
			),
		),
	),
);