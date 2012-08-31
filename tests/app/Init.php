<?php

//Deve ter o mesmo conteúdo que o arquivo Index.php dentro de public,
//porém sem a inicialização do Bootstrap.
require_once '../vendor/LAB/SplClassLoader.php';

$classLoader = new SplClassLoader('LAB',    '../vendor');
$classLoader->register();

$classLoader = new SplClassLoader('app', '../');
$classLoader->register();

