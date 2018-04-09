<?php
use StudentList\{App, AuthManager};
use StudentList\Validators\StudentValidator;
use StudentList\Helpers\{UrlManager, Util, Pager};
use StudentList\Database\{Connection, StudentDataGateway};

$app = new App();

$app->bind("config", require_once "../config.php");
$app->bind("connection", (new Connection)->make($app->get("config")));
$app->bind("authManager", new AuthManager());
$app->bind("studentDataGateway", new StudentDataGateway($app->get("connection")));
$app->bind("studentValidator", new StudentValidator(
            $app->get("studentDataGateway"),
                  $app->get("authManager")
            ));
$app->bind("urlManager", new UrlManager());
$app->bind("util", new Util());
$app->bind("pager", new Pager());



