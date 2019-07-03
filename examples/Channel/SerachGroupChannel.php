<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\SearchGroupChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$userSearchTerm = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$request = new SearchGroupChannelRequest($user);

/** @var Channel[] $channels */
$channels = $client->request($request);
