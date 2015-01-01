<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

$auth_factory = new \Aura\Auth\AuthFactory($_COOKIE);
$auth = $auth_factory->newInstance();

$logout_service = $auth_factory->newLogoutService($pdo_adapter);

$logout_service->logout($auth);

if ($auth->isAnon()) {
    echo "You are now logged out.";
} else {
    echo "Something went wrong; you are still logged in.";
}

echo $auth->getStatus();
