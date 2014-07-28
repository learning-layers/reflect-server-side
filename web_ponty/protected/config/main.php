<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
    'language' => 'en',
    'theme' => 'bootstrap', // requires you to copy the theme under your themes directory
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'LearningApp',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.yii-mail.YiiMailMessage',
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),
    ),
    // application components
    'components' => array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'user' => array(
// enable cookie-based authentication
            'allowAutoLogin' => true,
            'autoUpdateFlash' => false,
            'returnUrl' => array('/stack/index'),
            'class' => 'PontyUser',
        ),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'localhost',
                'username' => 'info@barcollect.de',
                'password' => '123456',
                'port' => '25',
				// 'encryption' => 'ssl'
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
          'urlManager' => array(
          'urlFormat' => 'path',
          'rules' => array(
          // REST patterns
          array('api/list', 'pattern' => 'api/<model:\w+>', 'verb' => 'GET'),
          array('api/view', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'GET'),
          array('api/update', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'POST'),
          array('api/delete', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
          array('api/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'),
          array('api/stackswithquestions','pattern'=>'api/user/stackswithquestions', 'verb' => 'GET'),
          array('api/answer','pattern'=>'api/user/<questionid:\d+>/answer', 'verb' => 'POST'),
              // array('honkiponk/index', 'pattern' => 'images/', 'verb' => 'GET'),
          // Other controllers
          '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
          ),
          ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=ponty',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // Debugconsole
                /* array(
                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters'=>array('127.0.0.1','192.168.1.215'),
                ), */
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
    'params' => array(
// this is used in contact page
        'adminEmail' => 'info@barcollect.de',
    ),
);