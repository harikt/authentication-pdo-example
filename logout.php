<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();
Dotenv::load(__DIR__);

$auth_factory = new \Aura\Auth\AuthFactory($_COOKIE);
$auth = $auth_factory->newInstance();

$pdo = new \PDO(getenv('DB_DSN'), getenv('DB_USERNAME'),getenv('DB_PASSWORD'));
$cols = array(
    'username', // "AS username" is added by the adapter
    'password', // "AS password" is added by the adapter
    'email',
    'fullname',
    'website'
);
$from = 'users';
$where = 'active = 1';
$hash = new \Aura\Auth\Verifier\PasswordVerifier(PASSWORD_DEFAULT);
$pdo_adapter = $auth_factory->newPdoAdapter($pdo, $hash, $cols, $from, $where);

$logout_service = $auth_factory->newLogoutService($pdo_adapter);
$logout_service->logout($auth);

if ($auth->isAnon()) {
    echo "You are now logged out.";
} else {
    echo "Something went wrong; you are still logged in.";
}

echo $auth->getStatus();
