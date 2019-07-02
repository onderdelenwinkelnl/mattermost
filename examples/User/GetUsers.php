<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\User;
use Fiyo\Mattermost\Request\User\GetUsersRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$postId = '';
$newMessage = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$request = new GetUsersRequest($postId);
$request->setPage(0); // Optional
$request->setLimit(10); // Optional

/** @var User[] $users */
$users = $client->request($request);
