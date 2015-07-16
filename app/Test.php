<?php



/**
 * Public essential
 */

/*
 * Constructor:
 *      filenameShortener, setFilename
 * i: filename
 * o: array from json
 */

$jsoner = new Jsoner('sample');
$jsoner2 = new Jsoner('sample.json');


if(! $jsoner->getFilename() === 'sample.json') {
    L::e('Test 1 constructor', 'failed with filename '.'sample');
}

if(! $jsoner2->getFilename() === 'sample.json') {
    L::e('Test 2 constructor', 'failed with filename '.'sample.json');
}

/*
 * i: array
 * o: void
 */

$array = [['id'=> 2]];
$array2 = [['key' => 'value']];
$jsoner->set($array);
$jsoner2->set($array2);

/*
 * i: void
 * o: new array
 */

if(! $jsoner->get() === $array) {
    L::e('Test 1 get function', 'failed');
}

if(! $jsoner2->get() === $array2) {
    L::e('Test 2 get function', 'failed');
}

/*
 * i: void
 * o: array of all ids
 */

if(! $jsoner->getIds() === [2]) {
    L::e('Test 1 getIds function', 'failed');
}

if($jsoner2->getIds()) {
    L::e('Test 2 getIds function', 'failed');
}

/*
 * i: property name
 * o: bool
 */

if(! $jsoner->isUnique('is')) {
    L::e('Test 1 isUnique function', 'failed');
}

$array2 = [['key' => 'value'], ['key' => 'value']];

$jsoner2->set($array2);

if($jsoner2->isUnique('key')) {
    L::e('Test 2 isUnique function', 'failed');
}

/*
 * i: property name
 * o: bool
 */

if($jsoner->has('id', 55)) {
    L::e('Test 1 has function', 'failed');
}

if(! $jsoner2->has('key', 'val')) {
    L::e('Test 2 has function', 'failed');
}

/*
 * i: property value
 * o: array item
 */

if(! $jsoner->getBy('key', '2')) {
    L::e('Test 1 getBy function', 'failed');
}

if($jsoner2->getBy('key', 'value_false')) {
    L::e('Test 2 getBy function', 'failed');
}

/**
 * Public complicated
 */

//public function tree()
//
//public function addHash($hash)
//
//public function add($where = [], $name, $value)
//
//public function save($save_filename)

/**
 * Private and compiling
 */

//private function openJson()
//
//private function filenameShortener($filename)
//
//public function init()