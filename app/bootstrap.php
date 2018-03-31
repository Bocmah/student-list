<?php
use StudentList\App;
use StudentList\Database\{Connection, StudentDataGateway};

$app = App::getInstance();

$app->bind("config", require_once "../config.php");
$app->bind("connection", Connection::getInstance()->make([$app->get("config")]));
$app->bind("studentDataGateway", new StudentDataGateway($app->get("connection")));

