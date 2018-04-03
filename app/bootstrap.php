<?php
use StudentList\App;
use StudentList\Validators\StudentValidator;
use StudentList\Helpers\UrlManager;
use StudentList\Database\{Connection, StudentDataGateway};

$app = new App();

$app->bind("config", require_once "../config.php");
$app->bind("connection", (new Connection)->make($app->get("config")));
$app->bind("studentDataGateway", new StudentDataGateway($app->get("connection")));
$app->bind("studentValidator", new StudentValidator($app["studentDataGateway"]));
$app->bind("urlManager", new UrlManager());

