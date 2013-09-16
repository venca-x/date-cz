<?php

function loader($class) {
    require_once './src/' . $class . '.php';
}

spl_autoload_register('loader');