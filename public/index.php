<?php
session_start();

use App\RMVC\App;

require "../vendor/autoload.php";
require "../routes/web.php";

App::run();
