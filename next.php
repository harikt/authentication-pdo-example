<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

$auth_factory = new \Aura\Auth\AuthFactory($_COOKIE);
$auth = $auth_factory->newInstance();

echo " Status " . $auth->getStatus();
