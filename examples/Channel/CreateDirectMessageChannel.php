<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\CreateDirectMessageChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$userIds = [
    'jka1hnem5b8gdydfxk78bz8qew',
    '1j3kfitn7ig1mfwowmu43t9znc',
];

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$request = new CreateDirectMessageChannelRequest($userIds);

/** @var Channel $channel */
$channel = $client->request($request);
