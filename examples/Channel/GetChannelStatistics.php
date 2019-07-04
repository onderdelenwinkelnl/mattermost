<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\ChannelStatistics;
use Fiyo\Mattermost\Request\Channel\GetChannelStatisticsRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new GetChannelStatisticsRequest($channelId);

/** @var ChannelStatistics $channelStatistics */
$channelStatistics = $client->request($channelRequest);