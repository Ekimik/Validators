<?php

require __DIR__ . '/../vendor/autoload.php';

// app base directory
define('TESTS_DIR',  __DIR__);

$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory(TESTS_DIR . '/src/Mocks');
$loader->setCacheStorage(new Nette\Caching\Storages\FileStorage(__DIR__ . '/tmp'));
$loader->register();

?>
