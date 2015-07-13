<?php

class L
{
    public static function i($tag, $message){
        echo "<font color='green'><b>$tag: </b>$message</font></br>";
    }
    public static function e($tag, $message){
        echo "<font color='red'><b>$tag: </b>$message</font></br>";
    }
    public static function v($tag, $message){
        echo "<font color='gray'><b>$tag: </b>$message</font></br>";
    }
    public static function w($tag, $message){
        echo "<font color='yellow'><b>$tag: </b>$message</font></br>";
    }
}