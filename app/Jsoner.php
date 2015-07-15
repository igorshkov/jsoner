<?php

class Jsoner
{

    private $filename;
    private $array;


    public function __construct($filename)
    {
        $this->setFilename($filename);
        if($this->openJson()) {
            L::v('__construct', 'filename: ' . $this->filename);
            L::v('__construct', 'sizeof array:' . sizeof($this->array));
        }
    }

    public function add($where = [], $name, $value)
    {
        L::v('add','blank');
    }

    public function save($save_filename)
    {
        L::v('save',$save_filename);
        file_put_contents($save_filename, json_encode($this->array));
    }

    public function tree()
    {
        L::v('tree','blank');
        return array_keys($this->array);
    }

    public function addHash($hash)
    {
        L::v('addHash','bulshit here');
    }

    /**
     * DONE
     */

    public function set($array)
    {
        L::v('setArray','doing...');
        $this->array = $array;
    }

    public function get()
    {
        return $this->array;
    }

    public function getIds()
    {
        $vals = [];
        foreach($this->array as $item) {
            $vals[] = $item->id;
        }
//        sort($vals);
//        L::data($vals);

        foreach($vals as $val){
            if(++$dupe_array[$val] > 1){
                L::e('getIds', 'dupes!');
            }
        }

        return $vals;
    }

    public function isUnique($name)
    {
        $dupe_array = [];
        foreach($this->array as $item->{$name}){
            if(++$dupe_array[$item->{$name}] > 1){
                return true;
            }
        }
        return false;
    }

    public function getBy($name, $val)
    {
        foreach ($this->array as $item) {
            if($item->{$name} == $val) {
                return $item;
            }
        }
        L::e('getById', 'no element with such id');
        return false;
    }

//    public function getById($id)
//    {
//        $elms = [];
//        foreach ($this->array as $item) {
//            if($item->id == $id) {
//                $elms[] = [$item->title, $item->id];
//            }
//        }
////        L::e('getById', 'no element with id'.$id);
//        return $elms;
//    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        L::v('set','filename');
        $this->filename = $this->filenameShortener($filename);
    }

    public function init()
    {
        L::v('init','done');
    }

    /**
     * Private
     */

    private function openJson()
    {
        $this->array = json_decode(file_get_contents(__DIR__ . '/' . $this->filename));
        L::i('openJson', __DIR__ . '/' . $this->filename);
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                L::v('json_last_error', 'No errors');
                return true;
            case JSON_ERROR_DEPTH:
                L::e('json_last_error', 'Maximum stack depth exceeded');
                return false;
            case JSON_ERROR_STATE_MISMATCH:
                L::e('json_last_error', 'Underflow or the modes mismatch');
                return false;
            case JSON_ERROR_CTRL_CHAR:
                L::e('json_last_error', 'Unexpected control character found');
                return false;
            case JSON_ERROR_SYNTAX:
                L::e('json_last_error', 'Syntax error, malformed JSON');
                return false;
            case JSON_ERROR_UTF8:
                L::e('json_last_error', 'Malformed UTF-8 characters, possibly incorrectly encoded');
                return false;
            default:
                L::e('json_last_error', 'Unknown error');
                return false;
        }
        return true;
    }

    private function filenameShortener($filename)
    {
        if(!pathinfo($filename, PATHINFO_EXTENSION)=='json') {
            return $filename.'.json';
        } else {
            return $filename;
        }
    }

}