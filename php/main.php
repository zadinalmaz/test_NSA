<?php

require 'vendor/autoload.php';
require 'Database.php';
require 'UserHandler.php';

$db = new Database();
$userHandler = new UserHandler();

$userId = "Тут id пользователя";

echo $userHandler->getUsers();
echo PHP_EOL;
echo $userHandler->getUserArticles($userId);
