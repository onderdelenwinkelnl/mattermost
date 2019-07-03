<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Status;
use Fiyo\Mattermost\Request\Channel\DeleteChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new DeleteChannelRequest($channelId);

/** @var Status $status */
$status = $client->request($channelRequest);