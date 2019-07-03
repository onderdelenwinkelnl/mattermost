<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\User;
use Fiyo\Mattermost\Request\User\GetUserByUsernameRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = 'error_bot';
$password = 'N#-= Z&]6\'i~L C';
$uri = 'https://chat.fiyo.com:10443';


$usernames = ''; // Single string or an array of strings

$usernames = [
    '',
    '',
];


$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$request = new GetUserByUsernameRequest($usernames);

/** @var User[] $users */
$users = $client->request($request);