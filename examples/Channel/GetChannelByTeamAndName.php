<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\GetChannelByIdRequest;
use Fiyo\Mattermost\Request\Channel\GetChannelByNameAndTeamName;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$teamName = '';
$channelName = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new GetChannelByNameAndTeamName($teamName, $channelName);

/** @var Channel $channel */
$channel = $client->request($channelRequest);