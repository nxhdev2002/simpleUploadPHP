<?php

class Image {
    public $name;
    public $path;
    function __construct($name, $path) {
        $this->name = $name;
        $this->path = $path;
    }
}