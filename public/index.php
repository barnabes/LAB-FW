<?php

require_once '../vendor/LAB/SplClassLoader.php';

$classLoader = new SplClassLoader('LAB',    '../vendor');
$classLoader->register();

$classLoader = new SplClassLoader('app', '../');
$classLoader->register();

$bootstrap = new \app\Init;
