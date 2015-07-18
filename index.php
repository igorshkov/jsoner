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

$jsoner = new Jsoner('newregions.json');

L::v('Test', 'start...');

$test = new Test();

L::v('Test', 'done!');

if($jsoner->isUnique('id')) {
    L::i('id', 'is unique');
} else {
    L::e('id', 'is NOT unique');
}

////$region = $jsoner->get()[0];
//$ids = $jsoner->getIds();
////L::data($region);
//$a = $jsoner->getById(21);
//$b = $jsoner->getById(43);
//
//L::e(21);
//L::data($a);
//L::e(43);
//L::data($b);
//

//$jsoner = new Jsoner('newregions');

//$r221 = new r221($jsoner);



/**
 ** App
 **/

//  ~

