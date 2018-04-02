<?php
use StudentList\App;
use StudentList\Database\{Connection, StudentDataGateway};

$app = new App();

$app->bind("config", require_once "../config.php");
$app->bind("connection", (new Connection)->make($app->get("config")));
$app->bind("studentDataGateway", new StudentDataGateway($app->get("connection")));


