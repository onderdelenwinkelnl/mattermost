<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\CreateGroupMessageChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

// At least 3 user ID's
$userIds = [
    '',
    '',
    '',
];

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$request = new CreateGroupMessageChannelRequest($userIds);

/** @var Channel $channel */
$channel = $client->request($request);
