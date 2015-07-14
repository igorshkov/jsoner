<?php

/**
 ** UTF 8 encoding
 **/

mb_internal_encoding("UTF-8");
mb_http_output( "UTF-8" );
ob_start("mb_output_handler");

/**
 ** App autoload
 **/

function autoload($class)
{
    require('app/'.$class.'.php');
}
spl_autoload_register('autoload');

/**
 ** Jsoner
 **/

$jsoner = new Jsoner('sample.json');

/**
 ** App
 **/

//  ~

