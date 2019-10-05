<?php
require 'BootstrapRenderer.php';
use \Armanco\BootstrapRenderer\Bootstrap;
$bootstrap = new Bootstrap();
$bootstrap->start();
$bootstrap->containerOpen();
$bootstrap->rowOpen();
$bootstrap->columnOpen('lg', 6);
$bootstrap->alert('TEST');
$bootstrap->columnClose();
$bootstrap->rowClose();
$bootstrap->containerClose();
$bootstrap->end();
$bootstrap->render();