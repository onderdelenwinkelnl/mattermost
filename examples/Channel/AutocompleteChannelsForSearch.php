<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\AutocompleteChannelsForSearchRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';


$teamId = '';
$searchTerm = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new AutocompleteChannelsForSearchRequest($teamId, $searchTerm);

/** @var Channel[] $channels */
$channels = $client->request($channelRequest);