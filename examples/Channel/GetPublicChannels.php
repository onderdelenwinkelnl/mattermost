<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\GetPublicChannelsRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';
$teamId = ''; // You can get the team id from GetTeamsRequest

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new GetPublicChannelsRequest($teamId);
$channelRequest->setPage(0); // Optional
$channelRequest->setLimit(10); // Optional

/** @var Channel[] $channels */
$channels = $client->request($channelRequest);

