<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/yiibooster');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Globo Smart Tech',

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.AweCrud.components.*', // AweCrud components
        'ext.CJuiDateTimePicker.*', // AweCrud components,
        'ext.CAdvancedArFindBehavior'
	),
    'language' => 'es',

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password'=>'4155126',
            'generatorPaths' => array(
                'ext.AweCrud.generators', // AweCrud generators
            ),
            'ipFilters'=>array($_SERVER['REMOTE_ADDR'],'127.0.0.1','::1'),
        ),
	),

	// application components
	'components'=>array(

		'aes256'=>array(
            'class' => 'application.extensions.aes256.Aes256',
            'privatekey_32bits_hexadecimal'=> '1d2a0f1b5cd45e65a87e41d5b46a6d4e65f809741a13c54f978af41a34f8797a', // be sure that this parameter uses EXACTLY 64 chars of hexa (a-f, 0-9)
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'messages' => array (
            'extensionPaths' => array(
                'AweCrud' => 'ext.AweCrud.messages', // AweCrud messages directory.
            ),
        ),

		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=globo',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'joaquin.waldrop@gmail.com',
	),
);