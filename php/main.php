<?php

require 'vendor/autoload.php';
require 'Database.php';
require 'UserHandler.php';

$db = new Database();
$userHandler = new UserHandler();

$userId = 3;

echo $userHandler->getUsers();
echo PHP_EOL;
echo $userHandler->getUserArticles($userId);
