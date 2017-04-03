<?php
$config = array (
  'debug' => 2,
  'App' => 
  array (
    'fullBaseUrl' => 'http://localhost',
    'imageBaseUrl' => 'img/',
    'cssBaseUrl' => 'css/',
    'jsBaseUrl' => 'js/',
    'base' => false,
    'baseUrl' => false,
    'dir' => 'app',
    'webroot' => 'webroot',
    'www_root' => 'C:\\wamp\\www\\edibleoil\\app\\webroot\\',
    'encoding' => 'UTF-8',
  ),
  'Error' => 
  array (
    'handler' => 'ErrorHandler::handleError',
    'level' => 22527,
    'trace' => true,
  ),
  'Exception' => 
  array (
    'handler' => 'ErrorHandler::handleException',
    'renderer' => 'ExceptionRenderer',
    'log' => true,
  ),
  'Routing' => 
  array (
    'prefixes' => 
    array (
      0 => 'admin',
    ),
  ),
  'Session' => 
  array (
    'cookie' => 'CAKEPHP',
    'timeout' => 240,
    'ini' => 
    array (
      'session.use_trans_sid' => 0,
      'session.cookie_path' => '/',
      'session.cookie_lifetime' => 14400,
      'session.name' => 'CAKEPHP',
      'session.gc_maxlifetime' => 14400,
      'session.cookie_httponly' => 1,
    ),
    'defaults' => 'php',
    'cookieTimeout' => 240,
  ),
  'Security' => 
  array (
    'salt' => 'ZAHIDb0qyJfIxfs2guVoUubWwvniR2G0FgaC9mi',
    'cipherSeed' => '12121209657453542496749683645',
  ),
  'Acl' => 
  array (
    'classname' => 'DbAcl',
    'database' => 'default',
  ),
  'Dispatcher' => 
  array (
    'filters' => 
    array (
      0 => 'AssetDispatcher',
      1 => 'CacheDispatcher',
    ),
  ),
  'Config' => 
  array (
    'language' => 'en-us',
  ),
  'site' => 
  array (
    'name' => 'Edible Oil',
    'copyright' => '2013 &copy; Ediable Oil Admin',
    'poweredBy' => 'Powred by Grameen Solutions',
    'poweredByImage' => 'Powered-By-GSL.gif',
  ),
  'meta' => 
  array (
    'description' => 'Vitamin a fortification project.',
    'keywords' => 'Vitamin A, fortification, edible, oil',
    'generator' => 'Developed by Grameen Solutions Ltd.',
  ),
  'Cake' => 
  array (
    'version' => '2.4.0',
  ),
);