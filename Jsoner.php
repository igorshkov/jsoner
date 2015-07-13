<?php

class Jsoner
{

    private $filename;
    private $array;


    public function __construct($filename)
    {
        if(!end(explode('.', $filename))==='json') {
            $this->filename = $filename.'.json';
        } else {
            $this->filename = $filename;
        }


        $this->array = json_decode($filename);
    }

    public function init()
    {

    }

    public function add($where = [], $name, $value)
    {

    }

    public function set($filename)
    {
        $this->filename = $filename;
    }

    public function get()
    {
        return json_decode($this->$filename);
    }

    public function save($save_filename)
    {
        file_put_contents($save_filename, $this->array);
    }

    public function tree()
    {

    }
}