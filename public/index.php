<?php
// die('dfdf');
putenv('APP_ENV=testing');
require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';
$app->run();
